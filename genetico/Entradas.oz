functor

import
   %Modulos de Mozart para cargar archivos
   Open
   System
   Application
   Parser at 'x-oz://system/xml/Parser.ozf'
export
   %%Variables del modelo
   c:C
   o:O
   n:N
   opp:OPp
   opi:OPi
   opt:OPt
   cic:CIc
   cre:CRe
   cpc:CPc
   bico:BIco
   req:Req
   sep:Sep
   tope:Tope
   apo:APo

   %%Variables de la entrada
   pesoNumeroDeBloques:PesoNumeroDeBloques
   pesoSizeMaxDeCanalesLibre:PesoSizeMaxDeCanalesLibre
   pesoNumeroDeCanalesInutiles:PesoNumeroDeCanalesInutiles
   geograficAssignationType:GeograficAssignationType
   geograficAssignationID:GeograficAssignationID
   bandaDeFrecuencia:BandaDeFrecuencia
   rangoDeFrecuencia:RangoDeFrecuencia

   
   %%Funciones
   leerEntradaXML:LeerEntradaXML
   asignarPesos:AsignarPesos
   estrategia:Estrategia
   ingresarEstrategia:IngresarEstrategia

define

   %%---------------------------------------------------
   %%Clase para eliminar espacios en blanco y saltos de linea
   %%Ademas ordena los elementos por etiqueta y no por hijos
   %%---------------------------------------------------
   class MyParser from Parser.parser
      meth init
         M = {New Parser.spaceManager init}
    in
         {M stripSpace('*' '*')}
         Parser.parser,init
         {self setSpaceManager(M)}
      end
      meth onAttribute(Tag Value)
         {self attributeAppend(Tag.name#Value)}
      end
      meth onStartElement(Tag Alist Children)
       Name = Tag.name
      in
         {self append(
                  Name(
                     alist    : {List.toRecord alist Alist}
                     children : Children))}
      end
   end

   %%---------------------------------------------------------------------------
   %% Datos de entrada
   %%---------------------------------------------------------------------------

   %%Variables del modelo

   %%Nümero de canales
   C

   %%Número de operadores en la banda que requieren asignación
   O

   %%Número de operadores presente en la banda
   N

   %%Conjunto de operadores en la banda
   OPp

   %%Conjunto de operadores que solicitan canales en la banda
   OPi

   %%Unión entre los conjuntos de operadores presentes en la banda y los que solicitan asignación
   OPt

   %%Canales marcados como inutilizables
   CIc

   %%Canales marcados como reservados
   CRe

   %%Canales asignados en las subdivisiones de la región de trabajo
   CPc

   %%Asignación de canales por operadores presentes en la banda
   BIco

   %%Requerimientos de canales de los operadores que solicitan canales
   Req

   %%Separación mínima entre canales exigida en la banda
   Sep

   %%Tope por operador permitido en la banda
   Tope

   %%Número máximo de canales que posee un operador que solicita canales dentro de las subdivisiones de la región de trabajo
   APo

   %%Variables de la entrada
   PesoNumeroDeBloques
   PesoSizeMaxDeCanalesLibre
   PesoNumeroDeCanalesInutiles
   Estrategia

   %%Datos de región de trabajo

   %%Esta indica el tipo de región de trabajo 0 para nacional, 1 para territorial/regional, 2 para departamental, 3 para municipio
   GeograficAssignationType
   GeograficAssignationID

   %%Datos de la banda de frecuencia de trabajo
   BandaDeFrecuencia
   RangoDeFrecuencia
   
 
   %%----------------------------------------------------------------------------
   %%Fin de datos de entrada
   %%----------------------------------------------------------------------------

   %%---------------------------------------------------------------------------
   %%LEER ENTRADAS
   %%--------------------------------------------------------------------------
   proc{LeerEntradaXML Ruta}
      local         
         Datos
         Instancia
         DatosParseados
         DatosAProcesar
        
      in
         try
            File={New Open.file init(name:Ruta flags:[read])}
         in
            {File read(list:Datos size:all)}
            {File close}        
          catch Exception then
            {System.showInfo "File read error"}
            {Application.exit 0}
         end
         Instancia={New MyParser init}
         DatosParseados={Instancia parseVS(Datos $)}
         DatosAProcesar = {Nth {Nth DatosParseados 2}.children 2}.children
         {ForAll DatosAProcesar proc{$ P } {AsignarVariables P} end}


         OPt ={List.append OPi {List.filter OPp fun{$ P} {Bool.'not' {List.member P OPi}} end}}
      end
   end

   %Asignar variables de acuerdo a las entradas
   proc{AsignarVariables Input}
      local
         NombreVariable=Input.alist.key
         DefinicionVariable=Input.children.1
      in
         case NombreVariable of 'GeograficAssignationType' then
            GeograficAssignationType = {String.toInt {List.filter {VirtualString.toString DefinicionVariable.children.1.data} fun {$ P} {Bool.and P\=32 P\=10} end}}
         [] 'GeograficAssignationID' then
            GeograficAssignationID = {String.toInt {List.filter {VirtualString.toString DefinicionVariable.children.1.data} fun {$ P} {Bool.and P\=32 P\=10} end}}
         [] 'FrequencyBand' then
            BandaDeFrecuencia = {String.toInt {List.filter {VirtualString.toString DefinicionVariable.children.1.data} fun {$ P} {Bool.and P\=32 P\=10} end}} 
         [] 'FrequencyRank' then
            RangoDeFrecuencia =  {String.toInt {List.filter {VirtualString.toString DefinicionVariable.children.1.data} fun {$ P} {Bool.and P\=32 P\=10} end}} 
         [] 'NumberChannels' then
            C = {String.toInt {List.filter {VirtualString.toString DefinicionVariable.children.1.data} fun {$ P} {Bool.and P\=32 P\=10} end}}
         [] 'NumberPresentOperators' then
            N =  {String.toInt {List.filter {VirtualString.toString DefinicionVariable.children.1.data} fun {$ P} {Bool.and P\=32 P\=10} end}}
         [] 'NumberOfOperatorWithRequirements' then
            O = {String.toInt {List.filter {VirtualString.toString DefinicionVariable.children.1.data} fun {$ P} {Bool.and P\=32 P\=10} end}}
         [] 'ChannelSeparation' then
            Sep = {String.toInt {List.filter {VirtualString.toString DefinicionVariable.children.1.data} fun {$ P} {Bool.and P\=32 P\=10} end}}
         [] 'PresentOperators' then
            local
               ListaElementos = DefinicionVariable.children
               Size = {List.length ListaElementos}
            in
               OPp = {List.make Size}
               {List.forAllInd ListaElementos
                proc{$ I T}
                   {Nth OPp I} = {String.toInt {List.filter {VirtualString.toString T.children.1.data} fun {$ P} {Bool.and P\=32 P\=10} end}} 
                end
               }
            end
         [] 'OperatorsWithRequeriments' then
            local
               ListaElementos = DefinicionVariable.children
               Size = {List.length ListaElementos}
            in
               OPi = {List.make Size}
               {List.forAllInd ListaElementos
                proc{$ I T}
                   {Nth OPi I} = {String.toInt {List.filter {VirtualString.toString T.children.1.data} fun {$ P} {Bool.and P\=32 P\=10} end}} 
                end
               }
            end 
         [] 'Requeriments' then
            local
               ListaElementos = DefinicionVariable.children
               Size = {List.length ListaElementos}
               ListaMarcas
            in
               ListaMarcas = {List.make Size}
               {List.forAllInd ListaElementos
                proc{$ I T}
                   {Nth ListaMarcas I} = {String.toInt {List.filter {VirtualString.toString T.children.1.alist.key} fun {$ P} {Bool.and P\=32 P\=10} end}}                  
                end
               }
               
               Req = {Record.make requerimientos ListaMarcas}
               
               {List.forAllInd ListaElementos
                proc{$ I T}
                   Req.{Nth ListaMarcas I} = {String.toInt {List.filter {VirtualString.toString T.children.1.children.1.children.1.data} fun {$ P} {Bool.and P\=32 P\=10} end}}
                end
               } 
            end
         [] 'MaxAssignationsSubDivision' then
            local
               ListaElementos = DefinicionVariable.children
               Size = {List.length ListaElementos}
               ListaMarcas
            in
               ListaMarcas = {List.make Size}
               {List.forAllInd ListaElementos
                proc{$ I T}
                   {Nth ListaMarcas I} = {String.toInt {List.filter {VirtualString.toString T.children.1.alist.key} fun {$ P} {Bool.and P\=32 P\=10} end}}                  
                end
               }
               
               APo  = {Record.make maxcanalasignadosubdiv ListaMarcas}
               
               {List.forAllInd ListaElementos
                proc{$ I T}
                   APo.{Nth ListaMarcas I} = {String.toInt {List.filter {VirtualString.toString T.children.1.children.1.children.1.data} fun {$ P} {Bool.and P\=32 P\=10} end}}
                end
               }
               
            end
         [] 'ChannelAssignInDivisions' then
            local
               ListaElementos = DefinicionVariable.children
               Size = {List.length ListaElementos}
            in
               CPc = {List.make Size}
               {List.forAllInd ListaElementos
                proc{$ I T}
                   {Nth CPc I} = {String.toInt {List.filter {VirtualString.toString T.children.1.data} fun {$ P} {Bool.and P\=32 P\=10} end}} 
                end
               }
            end
         [] 'ReservedChannels' then
            local
                 ListaElementos = DefinicionVariable.children
               Size = {List.length ListaElementos}
            in
               CRe = {List.make Size}
               {List.forAllInd ListaElementos
                proc{$ I T}
                   {Nth CRe I} = {String.toInt {List.filter {VirtualString.toString T.children.1.data} fun {$ P} {Bool.and P\=32 P\=10} end}} 
                end
               }
            end          
         [] 'DisabledChannels' then
            local
               ListaElementos = DefinicionVariable.children
               Size = {List.length ListaElementos}
            in
               CIc = {List.make Size}
               {List.forAllInd ListaElementos
                proc{$ I T}
                   {Nth CIc I} = {String.toInt {List.filter {VirtualString.toString T.children.1.data} fun {$ P} {Bool.and P\=32 P\=10} end}} 
                end
               }
             end     
         [] 'ChannelAssignation' then
            local
               ListaElementos = DefinicionVariable.children
               ListaMarcas
               Size
            in
               Size = {List.length ListaElementos}
               ListaMarcas = {List.make Size}

               {List.forAllInd ListaElementos
                proc{$ I T}
                   {Nth ListaMarcas I} = {String.toInt {List.filter {VirtualString.toString T.children.1.alist.key} fun {$ P} {Bool.and P\=32 P\=10} end}} 
                end
               }
               
               if ListaMarcas == nil then
                  BIco = nil
               else
                  BIco = {Record.make asignacionactual ListaMarcas}
                  {Record.forAll BIco
                   proc{$ T}
                   T = {Tuple.make canales C}
                   end
                  }
               
                  {List.forAllInd ListaElementos
                   proc {$ I T}
                      local
                         ListaCanales = T.children.1.children.1.children.1.children
                      in
                         {Record.forAllInd BIco.{Nth ListaMarcas I}
                    proc {$ J X}
                       X = {String.toInt {List.filter {VirtualString.toString {Nth ListaCanales J}.children.1.data} fun {$ P} {Bool.and P\=32 P\=10} end}}
                    end
                         }
                      end
                   end
                  }
               end
            end
         [] 'MaxChannelAssignationByOperator' then
            Tope = {String.toInt {List.filter {VirtualString.toString DefinicionVariable.children.1.data} fun {$ P} {Bool.and P\=32 P\=10} end}}
         else
           {System.showInfo "Input read error, "#NombreVariable#" variable not exist!"}
           {Application.exit 0}           
         end   
      end
   end
      %%BandaDeFrecuencia
   %%RangoDeFrecuencia
   %%Asignar PESOS
   proc{AsignarPesos PNB PSM PNC}
      %%Pesos asignados por el usuario
      PesoNumeroDeBloques=PNB
      PesoSizeMaxDeCanalesLibre=PSM
      PesoNumeroDeCanalesInutiles=PNC
   end

   %%Ingresar una estrategia de busqueda y almacenarla
   proc{IngresarEstrategia EstraIn}
      Estrategia=EstraIn
   end

end
