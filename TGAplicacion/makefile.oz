makefile(																									
   bin:['AplicacionAsignacionDelEspectro.exe']																
   src:[
        'Entradas.oz'																						
        'AplicacionAsignacionDelEspectro.oz'
        'Distribuidores.oz'
        'FuncionesAuxiliares.oz'
        'Restricciones.oz'
        'FuncionesDeCostos.oz'
        'ProcedimientosMejorSolucion.oz'
       ]																	
   rules:																									
      o('AplicacionAsignacionDelEspectro.exe':   ozc('AplicacionAsignacionDelEspectro.oz'   [executable]))
   clean:["*.ozf" "*~"]
   veryclean:["AplicacionAsignacionDelEspectro.exe" "*.ozf" "*~"]
   )