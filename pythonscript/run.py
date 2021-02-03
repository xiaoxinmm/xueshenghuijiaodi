import os
import pythontabol
import time
import progressbar

p = progressbar.ProgressBar()
N = 1000
for i in p(range(N)):
    time.sleep(0.0001)


pythontabol.geturl('http://192.168.0.7:8000/admin/tabolt.php')
