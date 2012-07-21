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
   Browser
   %%Modulos personalizados
   Entradas
   
export
   asignarAlInicioDeLaBandaEnOrden:AsignarAlInicioDeLaBandaEnOrden
   asignarAlFinalDeLaBandaEnOrden:AsignarAlFinalDeLaBandaEnOrden
   asignarPrimeroAOperadoresConAsignacion:AsignarPrimeroAOperadoresConAsignacion
   asignarPrimeroAOperadoresSinAsignacion:AsignarPrimeroAOperadoresSinAsignacion
   asignarPrimeroARequerimientosMasGrandes:AsignarPrimeroARequerimientosMasGrandes
   asignarPrimeroARequerimientosMasChicos:AsignarPrimeroARequerimientosMasChicos
   
define

   InOP=Entradas.inOP
   Bci=Entradas.bci
   Req=Entradas.req
   %Asignar al inicio de la banda por orden de llegada
   proc{AsignarAlInicioDeLaBandaEnOrden Is}
      {Space.waitStable}
      {ForAll InOP proc{$ P} {AsignarAlInicioDeLaBandaAux {Record.toList Is.P}} end}
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
   
%Asignar al final de la Banda por orden de llegada
   proc{AsignarAlFinalDeLaBandaEnOrden Is}
      {Space.waitStable}
      {ForAll InOP proc{$ P}
                      local
                         List = {Record.toList Is.P}
                      ListInv = {FoldL List fun{$ X Y} if Y==nil then X|Y else Y|X end end nil}
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
   
%Asignar primero a operadores con asignacion
%Orden
%Inicio Asigna al inicio de los canales
%Final Asigna al final de los canales
%Cerca de primer asignacion (Asigna cerca del primer asignado)
   proc{AsignarPrimeroAOperadoresConAsignacion Is Orden}
      {Space.waitStable}
      local
      OpConAsignacion={Cell.new nil}
         OpSinAsignacion={Cell.new nil}
         
      in
         {Record.forAllInd Bci
          proc{$ I P}
          %Se encuentra en los operadores de entrada
             if {List.member I InOP} then
                if {FD.reified.sum P '>=:' 1}==1 then
                   {Cell.assign OpConAsignacion Is.I|@OpConAsignacion}
                else
                   {Cell.assign OpSinAsignacion Is.I|@OpSinAsignacion}
                end
             end
          end}
      %Asignar primero con asignacion
         {ForAll @OpConAsignacion proc{$ P}
                                     local                                    
                                     Lista = {Record.toList P}
                                        Pfinal

                                        if Orden == final then
                                           Pfinal = {FoldL Lista fun{$ X Y} if Y==nil then X|Y else Y|X end end nil}
                                        else
                                           Pfinal = Lista
                                        end
                                     in
                                        {AsignarPrimeroAOperadoresConAsignacionAux Pfinal}
                                  end
                                  end}
         
         
      %Asignar luego sin asignacion
         {ForAll @OpSinAsignacion proc{$ P}
                                     local                                    
                                        Lista = {Record.toList P}
                                        Pfinal
                                        
                                        if Orden == final then
                                           Pfinal = {FoldL Lista fun{$ X Y} if Y==nil then X|Y else Y|X end end nil}
                                        else
                                           Pfinal = Lista
                                        end
                                  in
                                        {AsignarPrimeroAOperadoresConAsignacionAux Pfinal}
                                     end
                                  end}
         
         
      end
   end
   
   proc {AsignarPrimeroAOperadoresConAsignacionAux Is}
      {Space.waitStable}
      local
      %Buscar variables por asignar
         Fs={Filter Is fun {$ I} {FD.reflect.size I}>1 end}
      in 
         case Fs
         of nil then skip
      [] F|Fr then
            choice F=:1 {AsignarPrimeroAOperadoresConAsignacionAux Fr}
            [] F=:0 {AsignarPrimeroAOperadoresConAsignacionAux Fs}
            end
         end
      end 
   end
   
%Asignar primero a operadores sin asignacion
   proc{AsignarPrimeroAOperadoresSinAsignacion Is Orden}
      {Space.waitStable}
      local
         OpConAsignacion={Cell.new nil}
         OpSinAsignacion={Cell.new nil}
         
   in
         {Record.forAllInd Bci
          proc{$ I P}
          %Se encuentra en los operadores de entrada
             if {List.member I InOP} then
                if {FD.reified.sum P '>=:' 1}==1 then
                   {Cell.assign OpConAsignacion Is.I|@OpConAsignacion}
             else
                   {Cell.assign OpSinAsignacion Is.I|@OpSinAsignacion}
                end
             end
          end}
      %Asignar primero sin asignacion
         {ForAll @OpSinAsignacion proc{$ P}
                                     local                                    
                                        Lista = {Record.toList P}
                                        Pfinal
                                        
                                        if Orden == final then
                                           Pfinal = {FoldL Lista fun{$ X Y} if Y==nil then X|Y else Y|X end end nil}
                                        else
                                           Pfinal = Lista
                                        end
                                     in
                                        {AsignarPrimeroAOperadoresSinAsignacionAux Pfinal}
                                     end
                                  end}
         
      %Asignar luego con asignacion
      {ForAll @OpConAsignacion proc{$ P}
                                  local                                    
                                     Lista = {Record.toList P}
                                     Pfinal
                                     
                                     if Orden == final then
                                        Pfinal = {FoldL Lista fun{$ X Y} if Y==nil then X|Y else Y|X end end nil}
                                     else
                                        Pfinal = Lista
                                     end
                                  in
                                     {AsignarPrimeroAOperadoresSinAsignacionAux Pfinal}
                                  end
                               end}
      end
   end

   proc {AsignarPrimeroAOperadoresSinAsignacionAux Is}
      {Space.waitStable}
      local
      %Buscar variables por asignar
         Fs={Filter Is fun {$ I} {FD.reflect.size I}>1 end}
      in 
         case Fs
         of nil then skip
         [] F|Fr then
            choice F=:1 {AsignarPrimeroAOperadoresSinAsignacionAux Fr}
            [] F=:0 {AsignarPrimeroAOperadoresSinAsignacionAux Fs}
            end
         end
      end 
   end
   
%Asignar primero a requerimientos mas grandes
   proc{AsignarPrimeroARequerimientosMasGrandes Is Orden}
      local
         ListaPorOrdenMayor
         Lista
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