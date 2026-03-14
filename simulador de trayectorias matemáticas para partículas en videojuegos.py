import pygame
import pygame as py
import numpy as np
import sympy as sp



x = sp.symbols('x')
eqt = sp.sympify(input("ingrese la ecuacion de la trayectoria de la particula (usea la variable x): "))

f = sp.lambdify(x, eqt, ["numpy","scipy"])

py.init()

wd = py.display.set_mode((600, 600))
font = py.font.Font(None, 40)

clk = py.time.Clock()

status = True

x_pos = 100

v0 = 80


trayectoria = []

while status:

    dt = clk.tick(60)/1000

    for event in pygame.event.get():
        if event.type == pygame.QUIT:
            status = False


    scale = 0.1
    x_pos+= v0*dt
    y = f(x_pos)
    y = max(min(y, 200000), -2000)
    y = y * scale

    if x_pos > 600:
        x_pos = 0
        trayectoria.clear()

    screen_y = 300 - y

    trayectoria.append((x_pos, screen_y))

    wd.fill((20,20,30))

    py.draw.line(wd, (150, 150, 150), (0, 300), (600, 300), 1)
    py.draw.line(wd, (150, 150, 150), (300, 0), (300, 600), 1)

    py.draw.circle(wd, (200,200,100), (int(x_pos),int(screen_y)),10)

    if len(trayectoria) > 1:

        py.draw.lines(wd,(100,200,255), False, trayectoria, 2)

    py.display.flip()
py.quit()
