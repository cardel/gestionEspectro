functor

import
   %Modulos de Mozart para cargar archivos
   Open
   System
   Application
   Parser at 'x-oz://system/xml/Parser.ozf'
export
   c:C
   n:N
   bci:Bci
   pesoNumeroDeBloques:PesoNumeroDeBloques
   pesoSizeMaxDeCanalesLibre:PesoSizeMaxDeCanalesLibre
   pesoNumeroDeCanalesInutiles:PesoNumeroDeCanalesInutiles
   o:O
   req:Req
   inOP:InOP
   inReqCanal:InReqCanal
   sep:Sep
   tope:Tope
   apo:Apo
   inCanalesAsignadosEnEntrada:InCanalesAsignadosEnEntrada
   leerEntradaXML:LeerEntradaXML
   asignarPesos:AsignarPesos
   estrategia:Estrategia
   ingresarEstrategia:IngresarEstrategia
   geograficAssignationType:GeograficAssignationType
   geograficAssignationID:GeograficAssignationID
   bandaDeFrecuencia:BandaDeFrecuencia
   bandaEspecifica:BandaEspecifica
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

   %Tipo de asignacion
   %0 Nacional, 1 Terrotorial, 2 departamental, 3 municipal
   GeograficAssignationType

   %ID de la asignación, en el caso nacional no importa éste parámetro
   GeograficAssignationID
   
   %ID de banda de frecuencia
   BandaDeFrecuencia

   %ID de Banda especifica
   BandaEspecifica

   %%Estrategia de busqueda
   Estrategia
   
   %%Numero de canales
   C

   %%Numero total de operadores
   N
   
   %%Asignacion actual de canales
   Bci

   %%Pesos asignados por el usuario
   PesoNumeroDeBloques
   PesoSizeMaxDeCanalesLibre
   PesoNumeroDeCanalesInutiles

   %%Operadores entrada
   O

   %%Entrada de operadores y sus requerimientos
   Req

   %%Operadores para asignar
   InOP

   %%Requerimientos de cada operadores
   InReqCanal

   %%Separacion entre canales exigida
   %%Restriccion debil Sep = 0
   Sep

   %%Tope por operador maximo
   %%Restriccion debil Tope = Numero de canales
   Tope

   %%Es para el caso de frecuencias parcialmente utilizadas (Subdivisiones de la principal) cuanto asignado por operador de entrada
   %%CanalYaAsingado = [0 0 0] para restriccion debil
   Apo

   %%Canales ya asignados
   InCanalesAsignadosEnEntrada
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


         InOP = {Arity Req}
         InReqCanal = {Record.toList Req}
         %Asignar Variables dependientes
         InCanalesAsignadosEnEntrada = {proc {$ ?Salida}
                                           Salida={List.make O}
                                           {List.forAllInd InOP
                                            proc{$ I P}
                                               {Nth Salida I} = {FoldL {Record.toList Bci.P} fun{$ X Y} X+Y end 0}
                                            end
                                           }
                                        end
                                       }
         
      end
   end

   %Asignar variables de acuerdo a las entradas
   proc{AsignarVariables Input}
      local
         NombreVariable=Input.alist.key
         DefinicionVariable=Input.children.1
      in
         case NombreVariable of 'NumberChannels' then
            C = {String.toInt {List.filter {VirtualString.toString DefinicionVariable.children.1.data} fun {$ P} {Bool.and P\=32 P\=10} end}}
         [] 'Operators' then
            N = {String.toInt {List.filter {VirtualString.toString DefinicionVariable.children.1.data} fun {$ P} {Bool.and P\=32 P\=10} end}}
         [] 'OperatorsOfInput' then
            O = {String.toInt {List.filter {VirtualString.toString DefinicionVariable.children.1.data} fun {$ P} {Bool.and P\=32 P\=10} end}}      
         [] 'ChannelSeparation' then
            Sep = {String.toInt {List.filter {VirtualString.toString DefinicionVariable.children.1.data} fun {$ P} {Bool.and P\=32 P\=10} end}}
         [] 'PartialAssignation' then
            local
               ListaEtiquetas
            in
               ListaEtiquetas = {List.make {Length DefinicionVariable.children.1.children}}
               {List.forAllInd DefinicionVariable.children.1.children
                proc{$ I P}
                   {Nth ListaEtiquetas I} = {String.toInt {AtomToString P.alist.key}}
                end}
               Apo = {Record.make asignacionesParciales ListaEtiquetas}
               %Como el orden es el mismo se puede llenar directamente
               {List.forAllInd DefinicionVariable.children.1.children
                proc{$ I P}
                   Apo.{Nth ListaEtiquetas I} = {String.toInt {List.filter {VirtualString.toString P.children.1.children.1.data} fun {$ P} {Bool.and P\=32 P\=10} end}}
                end}
            end
         [] 'Requeriments' then
            local
               ListaEtiquetas
            in
               ListaEtiquetas = {List.make {Length DefinicionVariable.children.1.children}}
               {List.forAllInd DefinicionVariable.children.1.children
                proc{$ I P}
                   {Nth ListaEtiquetas I} = {String.toInt {AtomToString P.alist.key}}
                end}
               Req = {Record.make requerimientos ListaEtiquetas}
               %Como el orden es el mismo se puede llenar directamente
               {List.forAllInd DefinicionVariable.children.1.children
                proc{$ I P}
                   Req.{Nth ListaEtiquetas I} = {String.toInt {List.filter {VirtualString.toString P.children.1.children.1.data} fun {$ P} {Bool.and P\=32 P\=10} end}}
                end}
            end
            
         [] 'AssignationChannel' then
            local
               Input = DefinicionVariable.children
            in
               
               Bci = {Tuple.make asignacion N}

               {List.forAllInd Input
                proc{$ I P}
                   local
                      Nombre =  P.children.1.alist.key
                      Lista = P.children.1.children.1.children.1.children.1.children
                   in
                      Bci.I = {Tuple.make Nombre C}

                      {List.forAllInd Lista
                       proc{$ J T}
                          Bci.I.J =  {String.toInt {List.filter {VirtualString.toString T.children.1.data}  fun {$ P} {Bool.and P\=32 P\=10} end}}
                       end
                      }
                   end
                end
               }
            end
         [] 'MaximumOperatorChannels' then
            Tope={String.toInt {List.filter {VirtualString.toString DefinicionVariable.children.1.data} fun {$ P} {Bool.and P\=32 P\=10} end}}
         [] 'GeograficAssignationType' then
            GeograficAssignationType={String.toInt {List.filter {VirtualString.toString DefinicionVariable.children.1.data} fun {$ P} {Bool.and P\=32 P\=10} end}}
         [] 'GeograficAssignationID' then
            GeograficAssignationID={String.toInt {List.filter {VirtualString.toString DefinicionVariable.children.1.data} fun {$ P} {Bool.and P\=32 P\=10} end}}
         [] 'FrecuencyBand' then
            BandaDeFrecuencia={String.toInt {List.filter {VirtualString.toString DefinicionVariable.children.1.data} fun {$ P} {Bool.and P\=32 P\=10} end}}
         [] 'EspecificBand' then
            BandaEspecifica={String.toInt {List.filter {VirtualString.toString DefinicionVariable.children.1.data} fun {$ P} {Bool.and P\=32 P\=10} end}}
                  else
            {System.showInfo "Input read error, "#NombreVariable#" variable not exist!"}
            {Application.exit 0}           
         end   
      end
   end
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
