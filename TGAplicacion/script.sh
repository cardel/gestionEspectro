#!/bin/sh

(./AplicacionAsignacionDelEspectro.exe --motor=2 --f=Entradas/entrada2.xml --pnb=33 --psm=34 --pnc=33 --es=10 --tm=2000 --o=file.xml --rc=1 --ns=100 --nmas=0 --nsep=0 --ntope=0 --nopc=1 & ./AplicacionAsignacionDelEspectro.exe --motor=4 --f=Entradas/entrada2.xml --pnb=33 --psm=34 --pnc=33 --es=10 --tm=2000 --o=file2.xml --rc=1 --ns=100 --nmas=0 --nsep=0 --ntope=0 --nopc=1)


