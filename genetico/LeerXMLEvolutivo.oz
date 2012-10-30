%%---------------------------------------------------------
%%Carlos Andres Delgado. Codigo 0831085
%%Diseño e implementación de una aplicación prototipo para la gestión del espectro radioeléctrico
%%usando programación por restricciones
%
%%Implementación  Modelo de Asignación de canales
%%Archivo Principal
%%17 de Junio de 2012
%--------------------------------------------------------
functor
   
import
   %Modulos propios
   Entradas

   %Modulos mozart
   Search
   System
   Property
   Application
   Open
define

   %Entradas
   LeerEntradaXML = Entradas.leerEntradaXML
   AsignarPesos = Entradas.asignarPesos
   IngresarEstrategia=Entradas.ingresarEstrategia
   GeograficAssignationType=Entradas.geograficAssignationType
   GeograficAssignationID=Entradas.geograficAssignationID
   BandaDeFrecuencia=Entradas.bandaDeFrecuencia
   RangoDeFrecuencia=Entradas.rangoDeFrecuencia
   Operadores = Entradas.n
   Separacion = Entradas.sep 
   Tope = Entradas.tope
   
   C=Entradas.c %Numero total de canales
   BIco=Entradas.bico %Asignacion de entrada
   OPi=Entradas.opi %Operadores que solicitan asignacion
   OPp=Entradas.opp %Operadores presentes en la banda
   OPt=Entradas.opt %Total de operadores
   CIc=Entradas.cic %Canales inutilizados en la banda
   CRe=Entradas.cre %Canales reservados en la banda
   CPc=Entradas.cpc %Canales con asignaciones en las subdivisiones de la región de trabajo
   Apo=Entradas.apo %Maximo de canales de operadores de entrada
   Req=Entradas.req %Requerimientos

   OppNoOpi %Operadoresa actuales que no solicitan asignacion
   OppOPi %Operadores actuales que si solicitan asignacion
   OpiNoOpp %Operadores que no están presentes y solicitan asignacion
   ListaAux
   AsignacionAux

  proc{ListaPorRequerimientos OpiIn ReqIn ?Sal}
    if OpiIn==nil then Sal=nil
    else Sal=ReqIn.(OpiIn.1)|{ListaPorRequerimientos OpiIn.2 ReqIn}
    end
  end 
  
  proc{ListaDeListaToString Lista ?Sal}
    if Lista==nil then Sal=nil
    else
		if Lista.2==nil then Sal={ListaRecursivaAsignacion Lista.1}
		else Sal={ListaRecursivaAsignacion Lista.1}#{ListaDeListaToString Lista.2}
		end
	end
  end

  proc{AsignacionesActuales OppIn BicoIn ?Sal}
    if OppIn==nil then Sal=nil
    else Sal= {Record.toList BicoIn.(OppIn.1)}|{AsignacionesActuales OppIn.2 BicoIn}
    end
  end 

   proc{ListaRecursivaAsignacion Lista ?Sol}
	 if Lista == nil then Sol=nil
	 else
		if Lista.2==nil then Sol={Int.toString Lista.1}
		else
			Sol={Int.toString Lista.1}#{ListaRecursivaAsignacion Lista.2}
		end
	end
   end 

   proc{ListaRecursiva Lista ?Sol}
 
	 if Lista == nil then Sol=nil 
	 else
		if Lista.2==nil then Sol={Int.toString Lista.1}
		else
			Sol={Int.toString Lista.1}#" "#{ListaRecursiva Lista.2}
		end
	end
   end 

   %%--------------------------------------------------------------------
   %%Variables para recibir datos desde consola
   %%-------------------------------------------------------------------------
   Input
   Args
   RutaArchivo
   ArchivoSalida
   
   Valores
   Salida

   
   FileSolution

   try
   Input =
      {Application.getCmdArgs 
       record(
          file(single char:&f type:string) %Ruta archivo origen
          output(single char:&o type:string) %Ruta archivo salida
          %%--------------------------------------------------------------------
          )}
   in
      Args=Input
   catch Exception then
      {System.showInfo "Problema al leer los argumentos"}
      {Application.exit 0}
   end

   %%Tomar pesos

   RutaArchivo = Args.file

    {LeerEntradaXML RutaArchivo}       
   ArchivoSalida={String.toAtom Args.output}
   FileSolution={New Open.file  
                 init(name:  ArchivoSalida
                      flags: [write truncate create]
                      mode:  mode(owner: [read write]  
                                  group: [read write]))}
   
   
  
    OppNoOpi = {List.filter OPp fun{$ P} {Bool.'not' {List.member P OPi}} end}
    OppOpi = {List.filter OPp fun{$ P} {List.member P OPi} end}
    OpiNoOpp = {List.filter OPi fun{$ P} {Bool.'not' {List.member P OPp}} end}
    ListaAux= {ListaPorRequerimientos OPi Req}

    AsignacionAux = {AsignacionesActuales OPp BIco}	
    
    A B C D E F G H

	%%Operadores presentes
    A= {ListaRecursiva OPp}
    %%Operadores de entrada
    B= {ListaRecursiva OPi}
    %%Requerimientos
    CI= {ListaRecursiva ListaAux}
    %%Operadores totales
    D= {ListaRecursiva OPt}    
    %%Operadores presentes que no son de entrada
    E= {ListaRecursiva OppNoOpi}
    %%Operadores presentes que son de entrada
    F= {ListaRecursiva OppOpi}
    %%Operadores de entrada que no son presentes
    G= {ListaRecursiva OpiNoOpp}
    
    H= {ListaDeListaToString AsignacionAux}
    
    
    AT BT CT DT ET FT GT HT
    
    if A==nil then AT=0
    else AT=A end
 
    if B==nil then BT=0
    else BT=B end
    
    if CI==nil then CT=0
    else CT=CI end
  
    if D==nil then DT=0
    else DT=D end
  
    if E==nil then ET=0
    else ET=E end
    
    if F==nil then FT=0
    else FT=F end

    if G==nil then GT=0
    else GT=G end
    
     if H==nil then HT=0
    else HT=H end
    

   StrO =AT#"\n"#BT#"\n"#CT#"\n"#DT#"\n"#ET#"\n"#FT#"\n"#GT#"\n"
   Str1 = HT#"\n"#{ListaRecursivaAsignacion CPc}#"\n"#{ListaRecursivaAsignacion CRe}#"\n"#{ListaRecursivaAsignacion CIc}#"\n"
   Str2 = {Int.toString BandaDeFrecuencia}#"\n"#{Int.toString RangoDeFrecuencia}#"\n"#{Int.toString Separacion}#"\n"#{Int.toString Tope}#"\n"#{Int.toString GeograficAssignationType}#"\n"#{Int.toString GeograficAssignationID}#"\n"
   Valores = {Int.toString C}#"\n"#{List.length OPp}#"\n"#{List.length OPi}#"\n"#{List.length OPt}#"\n"#{List.length OppNoOpi}#"\n"#{List.length OppOpi}#"\n"#{List.length OpiNoOpp}#"\n"
   Salida = Valores#StrO#Str1#Str2  
   
   {FileSolution write(vs:{VirtualString.toString Salida})} 
   
   {Application.exit 0}
end

