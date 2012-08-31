makefile(																									
   bin:['LeerXMLEvolutivo.exe']																
   src:[
        'LeerXMLEvolutivo.oz'
        'Entradas.oz'																						
       ]																	
   rules:																									
      o('LeerXMLEvolutivo.exe':   ozc('LeerXMLEvolutivo.oz'   [executable]))
   clean:["*.ozf" "*~"]
   veryclean:["LeerXMLEvolutivo.oz" "*.ozf" "*~"]
   )