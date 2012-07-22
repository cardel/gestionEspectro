functor

import
   Entradas
export
   generarSalida:GenerarSalida
define
   
   Servicio = Entradas.servicio
   proc {GenerarSalida Motor In MantenerAsignacionesActuales NoConsiderarTope NoConsiderarSeparacion NumeroOperadorPorCanal ?Salida}

      local
         InDatosDesempenio=In.1
         InSoluciones=In.2.1
         
         Inicio
         TagsInicio
         TagsFinal
         Cuerpo
         Header
         
         Operadores = Entradas.n
         Canales = Entradas.c
         Separacion = Entradas.sep
         AsignacionStatic
         ConSep
         Tope

         proc{CrearHeader Reg TipoSolucion NumSoluciones ?Salida}
            local               
               EC=Reg.ec
               EE=Reg.ee
               VC=Reg.vc
               PC=Reg.pc
               MU=Reg.mu
               P=Reg.p
               Ciudad=Reg.ciudad
               Departamento=Reg.departamento
               BandaDeFrecuencia=Reg.bandaDeFrecuencia
               BandaEspecifica=Reg.bandaEspecifica               
               DA DB DC DD DE DF DG DH DI DJ DK A B C D E F G 
            in
               DA="\t\t<departament> "#Departamento#" </departament>\n"
               DB="\t\t<city> "#Ciudad#" </city>\n"
               DC="\t\t<frequencyBand> "#BandaDeFrecuencia#" </frequencyBand>\n"
               DD="\t\t<especificBand> "#BandaEspecifica#" </especificBand>\n"
               DE="\t\t<channelsNumber> "#Canales#" </channelsNumber>\n"
               DF="\t\t<operatorsNumber> "#Operadores#" </operatorsNumber>\n"
               DG="\t\t<channelSeparation> "#Separacion#" </channelSeparation>\n"
               DH="\t\t<numberOperatorPerChannel> "#NumeroOperadorPorCanal#" </numberOperatorPerChannel>\n"
               DI="\t\t<considerTop> "#Tope#" </considerTop>\n"
               DJ="\t\t<staticAssignation> "#AsignacionStatic#" </staticAssignation>\n"
               DK="\t\t<considerSeparation> "#ConSep#" </considerSeparation>\n"
               A="\t\t<numSolutions> "#NumSoluciones#" </numSolutions>\n"
               B="\t\t<spacesCreated> "#EC#" </spacesCreated>\n"
               C="\t\t<spacesSucceeded> "#EE#" </spacesSucceeded>\n"
               D="\t\t<FDVariables> "#VC#" </FDVariables>\n"
               E="\t\t<propagators> "#PC#" </propagators>\n"
               F="\t\t<memoryUsage> "#MU#" </memoryUsage>\n"
               G="\t\t<executionTime> "#P#" </executionTime>\n"

               if Motor==1 then
                  Salida="\t<head>\n"#DA#DB#DC#DD#DE#DF#DG#DH#DI#DJ#DK#A#B#C#D#E#F#G#"\t</head>\n"
               else
                  Salida="\t<head solution=\""#TipoSolucion#"\">\n"#DA#DB#DC#DD#DE#DF#DG#DH#DI#DJ#DK#A#B#C#D#E#F#G#"\t</head>\n"
               end
            end
         end
      in
		 %%------------------------------------------------------------------------
		 %% CALCULOS INICIALES
		 %%------------------------------------------------------------------------
		  if(MantenerAsignacionesActuales==1) then
			AsignacionStatic='NO'
		  else
			AsignacionStatic='YES'
		  end
		  
		  if(NoConsiderarTope==1) then
			Tope='NO'
		  else
			Tope='YES'
		  end	
		  
		  if(NoConsiderarSeparacion==1) then
			ConSep='NO'
		  else
			ConSep='YES'
		  end	  
		 
         %%---------------------------------------------------------------------
         %% INICIO DEL XML
         %%---------------------------------------------------------------------
         Inicio="<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n"
         TagsInicio="<solutions authorXML=\"Carlos Andrés Delgado Saavedra\" >\n"

         %%----------------------------------------------------------------------
         %%HEADER
         %%---------------------------------------------------------------------
         
         Header = {CrearHeader InDatosDesempenio InSoluciones.1  InSoluciones.2.1}

         %%----------------------------------------------------------------------
         %%CUERPO
         %%---------------------------------------------------------------------
         
       
         Cuerpo = {SolutionToString InSoluciones.2.2 0}

         TagsFinal="</solutions>"
         Salida=Inicio#TagsInicio#Header#Cuerpo#TagsFinal

      end
   end

   proc{SolutionToString In Contador ?Salida}
      local
         EtiquetaInicio="\t<solution id=\""#Contador#"\">\n"
         Cuerpo
      in
         if In == nil then Salida=nil
         else
            Cuerpo={TuplaToString {Record.toList In.1}}#{SolutionToString In.2 Contador+1}
            Salida=EtiquetaInicio#Cuerpo
         end
      end
   end
   
   proc {TuplaToString In ?Salida}
      local
         Costos
         Soluciones
         EtiquetaFinal="\t</solution>\n"
      in
         %%Costos
         Costos="\t\t<costs>\n"#{CostostoString {Record.toList In.1}}#"\t\t</costs>\n"
         %%Soluciones
         Soluciones="\t\t<report>\n"#{AsignacionesToString {Record.toList In.2.1} 1}#"\t\t</report>\n"

         %%Total
         Salida=Costos#Soluciones#EtiquetaFinal
      end
   end

   proc{CostostoString In ?Salida}

      if In==nil then Salida=nil
      else
         case {Label In.1} of 'numeroDeBloques' then Salida="\t\t\t<blocksNumber> "#In.1.1#" </blocksNumber>\n"#{CostostoString In.2}
         [] 'difNumeroCanalesYmaxSizeBloqueCanalesLibres' then Salida="\t\t\t<difChannelNumberMaxBlockFree> "#In.1.1#" </difChannelNumberMaxBlockFree>\n"#{CostostoString In.2}
         [] 'numeroDeCanalesInutiles' then Salida="\t\t\t<channelNumberUseless> "#In.1.1#" </channelNumberUseless>\n"#{CostostoString In.2}
         [] 'costoTotal' then Salida="\t\t\t<totalCost> "#In.1.1#" </totalCost>\n"#{CostostoString In.2}
         else
            Salida=nil
         end
      end
   end

   proc{AsignacionesToString In NumeroOperador ?Salida}
      local
         EtiquetaInicio
         Servicios
         Canales
      in
         if In==nil then Salida=nil
         else
            EtiquetaInicio="\t\t\t<operator name=\""#{Label In.1}#"\">\n"
            Servicios="\t\t\t\t<services>\n"#{ServiciosToString NumeroOperador}#"\t\t\t\t</services>\n"
            Canales="\t\t\t\t <channels>\n"#{AsignacionesIntToString {Record.toList In.1} 1}#"\t\t\t\t</channels>\n"#"\t\t\t</operator>\n"#{AsignacionesToString In.2 NumeroOperador+1}
            Salida=EtiquetaInicio#Servicios#Canales
         end
      end
   end
   proc{ServiciosToString NumeroOperador ?Salida}
      Salida = {ServicioToStringDetail {Record.toList Servicio.NumeroOperador}}
   end

   proc{ServicioToStringDetail In ?Salida}
      if In==nil then Salida=nil
      else
         Salida="\t\t\t\t\t<service> "#In.1#" </service>\n"#{ServicioToStringDetail In.2}
      end
   end
   
   proc{AsignacionesIntToString In Contador ?Salida}
      if In==nil then Salida=nil
      else
         Salida="\t\t\t\t\t<channel ID=\""#Contador#"\"> "#In.1#" </channel>\n"#{AsignacionesIntToString In.2 Contador+1}
      end
   end
end
