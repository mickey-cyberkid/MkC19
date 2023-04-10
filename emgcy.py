import os
import sys
import subprocess

def exec(cmd):
    proc = subprocess.getoutput(cmd)
    print(proc)
    
cmd = sys.argv[1]
chck_cmd = cmd.lower().split(" ",1)
if chck_cmd[0] == "cd":
   os.chdir(chck_cmd[1])
   print(os.getcwd())
else :
   exec(cmd)
