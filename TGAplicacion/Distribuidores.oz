%---------------------------------------------------------
%Carlos Andres Delgado. 
%Diseño e implementación de una aplicación prototipo para la gestión del espectro radioeléctrico
%usando programación por restricciones
%
%Implementación  Modelo de Asignación de canales
%Distribuciones
%--------------------------------------------------------
functor

import
   %Modulos de mozart
   FD
   Space
   %%Modulos personalizados
   Entradas
   
export
   asignarAlInicioDeLaBandaEnOrden:AsignarAlInicioDeLaBandaEnOrden
   asignarAlFinalDeLaBandaEnOrden:AsignarAlFinalDeLaBandaEnOrden
   asignarPrimeroAOperadoresDepAsignacion:AsignarPrimeroAOperadoresDepAsignacion
   asignarPrimeroARequerimientosMasGrandes:AsignarPrimeroARequerimientosMasGrandes
   asignarPrimeroARequerimientosMasChicos:AsignarPrimeroARequerimientosMasChicos
   
define

   OPp=Entradas.opp
   OPi=Entradas.opi
   Req=Entradas.req
   
   %Asignar al inicio de la banda por orden de llegada
   proc{AsignarAlInicioDeLaBandaEnOrden Is}
      {Space.waitStable}
      {ForAll OPi proc{$ P} {AsignarAlInicioDeLaBandaAux {Record.toList Is.P}} end}
   end

   proc {AsignarAlInicioDeLaBandaAux Is}
      {Space.waitStable}
      local
      %Buscar variables por asignar
         Fs={Filter Is fun {$ I} {FD.reflect.size I}>1 end}
      in 
         case Fs
         of nil then skip
         [] F|Fr then
            choice F=:1 {AsignarAlInicioDeLaBandaAux Fr}
            [] F=:0 {AsignarAlInicioDeLaBandaAux Fs}
            end
         end
      end 
   end
   
   %%Asignar al final de la Banda por orden de llegada
   proc{AsignarAlFinalDeLaBandaEnOrden Is}
      {Space.waitStable}
      {ForAll OPi proc{$ P}
                      local
                         ListInv = {FoldL {Record.toList Is.P} fun{$ X Y} if Y==nil then X|Y else Y|X end end nil}
                      in
                         {AsignarAlFinalDeLaBandaAux ListInv }
                      end
                   end}
   end
   
   proc {AsignarAlFinalDeLaBandaAux Is}
      {Space.waitStable}
      local
      %Buscar variables por asignar
         Fs={Filter Is fun {$ I} {FD.reflect.size I}>1 end}
      in 
         case Fs
         of nil then skip
         [] F|Fr then
         choice F=:1 {AsignarAlFinalDeLaBandaAux Fr}
         [] F=:0 {AsignarAlFinalDeLaBandaAux Fs}
         end
         end
      end 
   end
   
   %%Asignar primero a operadores con asignacion
   
   %%Orden
   %%Inicio Asigna al inicio de los canales
   %%Final Asigna al final de los canales
   
   %%Cerca de primer asignacion (Asigna cerca del primer asignado)
   proc{AsignarPrimeroAOperadoresDepAsignacion Is Tipo Orden}
      {Space.waitStable}
      local
         InterOPiOPp = {List.filter OPi fun{$ X} {List.member X OPp} end}
         RestaOPiOPp = {List.filter OPi fun{$ X} {Bool.'not' {List.member X OPp}} end}
         PrimerEnSerAsignado
         SegundoEnSerAsignado
      in

         if Tipo == asignados then
            PrimerEnSerAsignado = InterOPiOPp
            SegundoEnSerAsignado = RestaOPiOPp
         else
            PrimerEnSerAsignado = RestaOPiOPp
            SegundoEnSerAsignado = InterOPiOPp        
         end
         %%Asignar primero con asignacion
         {ForAll PrimerEnSerAsignado proc{$ P}
                                local                                    
                                   Pfinal                                   
                                   if Orden == final then
                                      Pfinal = {List.foldL {Record.toList Is.P} fun{$ X Y} if Y==nil then X|Y else Y|X end end nil}
                                   else
                                      Pfinal = {Record.toList Is.P}
                                   end
                                     in
                                   {AsignarPrimeroAOperadoresDepAsignacionAux Pfinal}
                                end
                             end}
         
         
         %%Asignar luego sin asignacion
         {ForAll SegundoEnSerAsignado proc{$ P}
                                local                                    
                                   Pfinal                                   
                                   if Orden == final then
                                      Pfinal = {List.foldL {Record.toList Is.P} fun{$ X Y} if Y==nil then X|Y else Y|X end end nil}
                                   else
                                      Pfinal = {Record.toList Is.P}
                                   end
                                in
                                   {AsignarPrimeroAOperadoresDepAsignacionAux Pfinal}
                                end
                             end}
         
         
      end
   end
   
   proc {AsignarPrimeroAOperadoresDepAsignacionAux Is}
      {Space.waitStable}
      local
      %Buscar variables por asignar
         Fs= {List.filter Is fun {$ I} {FD.reflect.size I}>1 end}
      in 
         case Fs
         of nil then skip
         [] F|Fr then
            choice F=:1 {AsignarPrimeroAOperadoresDepAsignacionAux Fr}
            [] F=:0 {AsignarPrimeroAOperadoresDepAsignacionAux Fs}
            end
         end
      end 
   end
   

   %%Asignar primero a requerimientos mas grandes
   proc{AsignarPrimeroARequerimientosMasGrandes Is Orden}
      local
         ListaPorOrdenMayor
      in
         ListaPorOrdenMayor ={List.sort {Record.toListInd Req} fun{$ X Y} if X.2<Y.2 then false else true end end}
         {Space.waitStable}
     
         {ForAll ListaPorOrdenMayor proc{$ P}
                         local
                            List = {Record.toList Is.(P.1)}
                            ListInv
                            if Orden == final then
                               ListInv = {FoldL List fun{$ X Y} if Y==nil then X|Y else Y|X end end nil}
                            else
                               ListInv=List
                            end
                         in                               
                            {AsignarRequerimientosAux ListInv}
                         end
                      end}
      end
   end
   
%Asignar primero a requerimientos mas pequeños
   proc{AsignarPrimeroARequerimientosMasChicos Is Orden}
      local
         ListaPorOrdenMenor
      in
         ListaPorOrdenMenor ={List.sort {Record.toListInd Req} fun{$ X Y} if X.2>Y.2 then false else true end end}
          {Space.waitStable}
         %Asignar.
         {ForAll ListaPorOrdenMenor proc{$ P}
                         local
                            List = {Record.toList Is.(P.1)}
                            ListInv
                            if Orden == final then
                               ListInv = {FoldL List fun{$ X Y} if Y==nil then X|Y else Y|X end end nil}
                            else
                               ListInv=List
                            end
                         in                               
                            {AsignarRequerimientosAux ListInv }
                         end
                      end}
      end
   end

   %%Procedimiento auxiliar de AsignarPrimeroRequerimientos
   proc {AsignarRequerimientosAux Is}
      {Space.waitStable}
      local
      %Buscar variables por asignar
         Fs={Filter Is fun {$ I} {FD.reflect.size I}>1 end}
      in 
         case Fs
         of nil then skip
         [] F|Fr then
            choice F=:1 {AsignarRequerimientosAux Fr}
            [] F=:0 {AsignarRequerimientosAux Fs}
            end
         end
      end 
   end
end
