import numpy as np
import matplotlib.pyplot as plt
from mpl_toolkits.mplot3d import Axes3D
from matplotlib.widgets import Slider

fig = plt.figure(figsize=(8, 8))
ax = fig.add_subplot(111, projection='3d')

L1, L2 = 1.5, 1.0
theta_init, phi_init, beta_init = 45, 45, 45


def calcular_puntos(t, p, b):
    t_rad, p_rad, b_rad = np.radians(t), np.radians(p), np.radians(b)
    #Codo
    x1 = L1 * np.cos(p_rad) * np.cos(t_rad)
    y1 = L1 * np.cos(p_rad) * np.sin(t_rad)
    z1 = L1 * np.sin(p_rad)

    #Muñeca
    x2 = x1 + L2 * np.cos(p_rad + b_rad) * np.cos(t_rad)
    y2 = y1 + L2 * np.cos(p_rad + b_rad) * np.sin(t_rad)
    z2 = z1 + L2 * np.sin(p_rad + b_rad)

    return x1, y1, z1, x2, y2, z2


#puntos iniciales
x1i, y1i, z1i, x2i, y2i, z2i = calcular_puntos(theta_init, phi_init, beta_init)

#Eslabones
line1, = ax.plot([0, x1i], [0, y1i], [0, z1i],
                 '-', linewidth=6, color='blue', label='Eslabón 1', zorder=1)
line2, = ax.plot([x1i, x2i], [y1i, y2i], [z1i, z2i],
                 '-', linewidth=6, color='red', label='Eslabón 2', zorder=1)

#articulaciones
ax.scatter([0], [0], [0], color='black', s=150, label='Articulaciones', zorder=5)  # Base fija
codo_plot = ax.scatter([x1i], [y1i], [z1i], color='black', s=150, edgecolor='black', zorder=10)
muneca_plot = ax.scatter([x2i], [y2i], [z2i], color='black', s=100, edgecolor='black', zorder=10)

ax.legend()
plt.subplots_adjust(bottom=0.3)

ax_theta = plt.axes([0.25, 0.18, 0.55, 0.03])
ax_phi = plt.axes([0.25, 0.13, 0.55, 0.03])
ax_beta = plt.axes([0.25, 0.08, 0.55, 0.03])

theta_slider = Slider(ax_theta, 'Theta (Base)', 0, 180, valinit=theta_init)
phi_slider = Slider(ax_phi, 'Phi (Hombro)', 0, 180, valinit=phi_init)
beta_slider = Slider(ax_beta, 'Beta (Codo) ', -90, 90, valinit=beta_init)


def act(val):
    t = theta_slider.val
    p = phi_slider.val
    b = beta_slider.val

    x1, y1, z1, x2, y2, z2 = calcular_puntos(t, p, b)

    line1.set_data([0, x1], [0, y1])
    line1.set_3d_properties([0, z1])

    line2.set_data([x1, x2], [y1, y2])
    line2.set_3d_properties([z1, z2])

    codo_plot._offsets3d = ([x1], [y1], [z1])
    muneca_plot._offsets3d = ([x2], [y2], [z2])

    fig.canvas.draw_idle()


theta_slider.on_changed(act)
phi_slider.on_changed(act)
beta_slider.on_changed(act)

ax.set_xlim([-2.5, 2.5])
ax.set_ylim([-2.5, 2.5])
ax.set_zlim([0, 3])
ax.set_xlabel('X')
ax.set_ylabel('Y')
ax.set_zlabel('Z')

plt.show()