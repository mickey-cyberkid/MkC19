import os
import sys
import subprocess

def exec(cmd):
    proc = subprocess.getoutput(cmd)
    print(proc)
    
 cmd = sys.argv[1]
 exec(cmd)
