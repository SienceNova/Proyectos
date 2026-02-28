import sympy as sp
import numpy as np
import matplotlib.pyplot as plt


x = sp.symbols("x")
eqt = sp.sympify(input("ingrese la funcion: "))

definite= input("la integral es definida? (y/n):" )

elc = definite.lower()

if elc == "y":
    a = float(input("ingrese el limite inferior: "))
    b = float(input("ingrese el limite superior: "))

    if a>b:
        sol1 = sp.integrate(eqt, x)
        sol = sp.integrate(eqt, (x, a, b))
    elif b>a:
        sol1 = sp.integrate(eqt, x)
        sol = sp.integrate(eqt, (x, b, a))
    else:
        sol1 = sp.integrate(eqt, x)
        sol = 0

    print(f"El resultado es: {sol}")

    x_vals = np.linspace(a-10, b+10)
    f = sp.lambdify(x, sol1, "numpy")
    y_vals = f(x_vals)

    plt.plot(x_vals,y_vals,color="red",label=f"funcion")
    plt.fill_between(x_vals,y_vals,color="red",where=(x_vals>=a)&(x_vals<=b),alpha=0.5)
    plt.legend()
    plt.grid(True)
    plt.show()


elif elc == "n":

     sol = sp.integrate(eqt,x)
     print(f"La primitva es: {sol}")

     x_vals = np.linspace(-30, 30)
     f = sp.lambdify(x, sol, "numpy")
     y_vals= f(x_vals)

     plt.plot(x_vals, y_vals, color="red", label="funcion")
     plt.legend()
     plt.grid(True)
     plt.show()


