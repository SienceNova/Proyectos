import sympy as sp
import scipy
import numpy as np
import matplotlib.pyplot as plt
from matplotlib.widgets import Slider


fig, ax = plt.subplots()
c = 0


x = sp.symbols("x")
eqt = sp.sympify(input("ingrese la funcion (use la variable x): "))

definite= input("la integral es definida? (y/n):" )

elc = definite.lower()

if elc == "y":
    a = float(input("ingrese el limite inferior: "))
    b = float(input("ingrese el limite superior: "))


    sol1 = sp.integrate(eqt, x)
    sol = sp.integrate(eqt, (x, a, b))

    x_vals = np.linspace(a-10, b+10,400)
    f = sp.lambdify(x, sol1, ["numpy","scipy"])
    y_vals = f(x_vals)

    expr1 = sp.latex(sol1)

    line = plt.plot(x_vals,y_vals,color="red",label=rf"$F(x)= {expr1}$ Area bajo la curva {sol}")
    plt.fill_between(x_vals,y_vals,color="red",where=(x_vals>=a)&(x_vals<=b),alpha=0.5)
    plt.title("Visualizador de area bajo la curva")
    plt.xlabel("x")
    plt.ylabel("y")
    plt.legend()
    plt.grid(True)
    plt.show()

elif elc == "n":

     sol = sp.integrate(eqt,x)
     sol2 = sp.diff(eqt,x)

     expr = sp.latex(sol)
     expr2 = sp.latex(eqt)
     expr3= sp.latex(sol2)

     x_vals = np.linspace(-30, 30,400)
     f1 = sp.lambdify(x, sol, ["numpy","scipy"])
     f2 = sp.lambdify(x,eqt,["numpy","scipy"])
     f3 = sp.lambdify(x,sol2,["numpy","scipy"])

     y_vals = f1(x_vals)
     y2_vals = f2(x_vals)
     y3_vals = f3(x_vals)

     if np.isscalar(y_vals):
         y_vals = np.full_like(x_vals, y_vals)

     if np.isscalar(y2_vals):
         y2_vals = np.full_like(x_vals, y2_vals)

     if np.isscalar(y3_vals):
         y3_vals = np.full_like(x_vals, y3_vals)

     line, = plt.plot(x_vals, y_vals, color="orange", label=rf"$F(x)= {expr} + C$")
     plt.subplots_adjust(bottom=0.25)  # Espacio para el slider

     ax_freq = plt.axes([0.25, 0.1, 0.65, 0.03])
     c_slider = Slider(ax_freq, 'Constante C:', -1000.0, 1000.0, valinit=c)

     ax.plot(x_vals,y2_vals,'--',color="blue",label=rf"$f(x)= {expr2}$")
     ax.plot(x_vals,y3_vals,':',color="red",label=rf'$f´(x)= {expr3} $')
     def act(val):

        c = c_slider.val
        line.set_ydata(y_vals + c )
        fig.canvas.draw_idle()

     c_slider.on_changed(act)
     ax.set_title("Visualizador de cálculo")
     ax.set_xlabel("x")
     ax.set_ylabel("y")
     ax.legend()
     ax.grid(True)
     plt.show()