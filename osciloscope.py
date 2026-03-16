import pygame as py
import serial
import collections
import tkinter as tk
from tkinter import ttk
import serial.tools.list_ports

root = tk.Tk()
root.title("Seleccionar puerto")

ports = [p.device for p in serial.tools.list_ports.comports()]

choose_port = tk.StringVar()

combo = ttk.Combobox(root,textvariable=choose_port)
combo['values'] = ports
combo.pack(padx=20,pady=20)

def choose():

    global selection
    selection = combo.get()
    root.destroy()

button = ttk.Button(root,text='Selecet',command=choose)
button.pack(padx=20,pady=20)


root.mainloop()

if selection:
    ser = None
    try:
        ser = serial.Serial(selection, 9600, timeout=0.1)
    except Exception as e:
        print(e)

    py.init()

    wd = py.display.set_mode((800, 400))
    font = py.font.Font(None, 40)

    clk = py.time.Clock()

    status = True

    points = collections.deque([200] * 800, maxlen=800)

    actual_voltage = 0

    while status:

        for event in py.event.get():
            if event.type == py.QUIT:
                status = False

        if ser and ser.in_waiting > 0:
            line = ser.readline().decode('utf-8').strip()
            try:
                voltage = float(line)
                actual_voltage = voltage
                y = int(400 - (voltage * 40))
                points.append(y)
            except Exception as e:
                print(e)

        wd.fill((20, 20, 30))

        text = font.render(f"voltage: {actual_voltage} V", True, (0, 255, 0))
        wd.blit(text, (10, 10))

        for x in range(0, 800, 50):
            py.draw.line(wd, (60, 60, 60), (x, 0), (x, 400))
        for yl in range(0, 800, 50):
            py.draw.line(wd, (60, 60, 60), (0, yl), (800, yl))
        for i in range(len(points) - 1):
            py.draw.line(wd, (0, 255, 0), (i, points[i]), (i + 1, points[i + 1]), 2)

        py.display.flip()
        clk.tick(60)

    ser.close()
    py.quit()
else:

    window = tk.Tk()
    window.geometry("600x70")
    Text = tk.Label(window,text="Please review the serial port of conect the Arduino and reboot program.",width=100)
    Text.pack(padx=20,pady=20)
    window.mainloop()



