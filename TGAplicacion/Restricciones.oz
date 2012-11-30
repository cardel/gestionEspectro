%%----------------------------------------------------------------------------------------------
%%Carlos Andres Delgado. 0831085 
%%Diseño e implementación de una aplicación prototipo para la gestión del espectro radioeléctrico
%%usando programación por restricciones
%%
%%Implementación  Modelo de Asignación de canales
%%Archivo de Restricciones
%%08 de Julio de 2012
%%-----------------------------------------------------------------------------------------------
functor
   
import
   %%Modulos propios
   Entradas
   Distribuidores
   FuncionesAuxiliares
   FuncionesDeCostos
   
   %%Modulos mozart
   FD
export
   generarAsignacion:GenerarAsignacion
   
define

   %%---------------------------------------------------------------
   %% Variables: Entradas de la aplicación
   %%--------------------------------------------------------------
   C=Entradas.c %Numero total de canales
   BIco=Entradas.bico %Asignacion de entrada
   OPi=Entradas.opi %Operadores que solicitan asignacion
   OPp=Entradas.opp %Operadores presentes en la banda
   OPt=Entradas.opt %Total de operadores
   PesoNumeroDeBloques=Entradas.pesoNumeroDeBloques %Peso ingresado por el usuario
   PesoSizeMaxDeCanalesLibre=Entradas.pesoSizeMaxDeCanalesLibre %Peso ingresado por el usuario
   PesoNumeroDeCanalesInutiles=Entradas.pesoNumeroDeCanalesInutiles %Perso ingresado por el usuario
   Tope=Entradas.tope %Tope
   Sep %Separacion
   %%Asignaciones parciales
   CIc=Entradas.cic %Canales inutilizados en la banda
   CRe=Entradas.cre %Canales reservados en la banda
   CPc=Entradas.cpc %Canales con asignaciones en las subdivisiones de la región de trabajo
   Apo=Entradas.apo %Maximo de canales de operadores de entrada
   %%Asignaciones en banda
   
   EstrategiaBusqueda=Entradas.estrategia %Estrategia seleccionada por el usuario
   Req=Entradas.req %Requerimientos
   %InOP=Entradas.inOP %Operadores de entrada (Derivado de req)
   %Req=Entradas.inReqCanal %Requerimientos de entrada (Derivado de req)
   
   %%---------------------------------------------------------------------
   %%DISTRIBUIDORES
   %%--------------------------------------------------------------------
   
   AsignarAlInicioDeLaBandaEnOrden=Distribuidores.asignarAlInicioDeLaBandaEnOrden
   AsignarAlFinalDeLaBandaEnOrden=Distribuidores.asignarAlFinalDeLaBandaEnOrden
   AsignarPrimeroAOperadoresDepAsignacion=Distribuidores.asignarPrimeroAOperadoresDepAsignacion
   AsignarPrimeroARequerimientosMasGrandes=Distribuidores.asignarPrimeroARequerimientosMasGrandes
   AsignarPrimeroARequerimientosMasChicos=Distribuidores.asignarPrimeroARequerimientosMasChicos
   %%----------------------------------------------------------------
   %%PROCEDIMIENTOS AUXILIARES
   %%----------------------------------------------------------------
   TrasponerMatrizTuplas=FuncionesAuxiliares.trasponerMatrizTuplas

   %%---------------------------------------------------------------
   %%FUNCIONES DE COSTOS
   %%---------------------------------------------------------------
   CalcularNumeroDeCambios=FuncionesDeCostos.calcularNumeroDeCambios
   SizeMaxDeBloqueLibres=FuncionesDeCostos.sizeMaxDeBloqueLibres
   NumeroCanalesInutilizados=FuncionesDeCostos.numeroCanalesInutilizados

   %%---------------------------------------------------------------
   %% FUNCION PRINCIPAL
   %%---------------------------------------------------------------

   fun{GenerarAsignacion NoMantenerAsignacionesActuales NoConsiderarTope NoConsiderarSeparacion NumeroOperadorPorCanal}
      if NoConsiderarSeparacion == 1 then
			Sep= 0
	  else
			Sep = Entradas.sep %Separacion
	  end
  
      proc{$ ?Solucion}
         local
            %%La matriz de entrada esta por filas, para facilitar las operaciones se requiere trasponerla
            BOcoT %Salida traspuesta
            BOco %Salida
            R = NumeroOperadorPorCanal %Numero de operadores por canal
             %Mantener asignacion actual de canales que solicitan
            CAC
            ECC = {FD.tuple estadoCanales C 0#1} %Define si un canal esta ocupado o no
         in
            %%Definir
            if NoMantenerAsignacionesActuales == 1 then
               CAC = 0
            else
               CAC = 1
            end
            %%Matriz por filas
            Solucion = {Tuple.make solucion 2}
            Solucion.1 = {Tuple.make costos 4}
            Solucion.1.1 = {Tuple.make numeroDeBloques 1}
            Solucion.1.2 = {Tuple.make difNumeroCanalesYmaxSizeBloqueCanalesLibres 1}
            Solucion.1.3 = {Tuple.make numeroDeCanalesInutiles 1}
            Solucion.1.4 = {Tuple.make costoTotal 1}

            BOco = {Record.make asignacionfinal OPt}  
            {Record.forAll BOco proc{$ P} P = {FD.tuple canales C 0#1} end}
            Solucion.2=BOco
            
            %%Matriz por columnas
            BOcoT = {TrasponerMatrizTuplas BOco}

            %%Definir ECC
            {Record.forAllInd BOcoT
             proc{$ I P}
                ECC.I =: {FD.reified.sum {List.append {Record.toList P} [{Nth CPc I}]} '<:' 1}
             end
            }
            %%---------------------------------------------------------------------------
            %% Restricciones
            %%----------------------------------------------------------------------------
     
            % %%Se mantiene asignacion para operadores que solicitan canale 
            if CAC == 1 then
               local
                  InterOPpOPi = {List.filter OPi fun{$ P} {List.member P OPp} end}
               in
                  {List.forAll InterOPpOPi
                   proc{$ P}
                      {Record.forAllInd BOco.P
                       proc{$ I T}
                          if BIco.P.I == 1 then
                             T =: 1
                          end
                       end
                      }
                   end
                  }
               end
            end

            % %%Todo operador que no solicita conserva asignación
            local
               RestaOPpOPi = {List.filter OPp fun{$ P} {Bool.'not' {List.member P OPi}} end}
            in
               {List.forAll RestaOPpOPi
                proc{$ P}
                   {Record.forAllInd BOco.P
                    proc{$ I T} skip
                       T =: BIco.P.I
                    end
                   }
                end
               }
            end
 
            %%Maximo R operadores por canal excepto o1 y o2 que son inutil y reservado
             {For 1 C 1
              proc{$ I}
                 {FD.sum {List.append {Record.toList BOcoT.I} [{Nth CPc I}]} '=<:' R}
              end
             }
            % %%El canal inutil y reservado solo se puede asignar una vez
             {For 1 C 1
              proc{$ I}
                 if {FD.reified.sum [{Nth CIc I} {Nth CRe I}] '>=:' 1}==1 then
                    {FD.sum BOcoT.I '=<:' 1}
                 end
              end
             }
            % %%Existen suficientes canales para cumplir los requerimientos de entrada

            local
               TotalRequerimientos = {Record.foldL Req fun{$ X Y} X+Y end 0}
            in
               {FD.sum ECC '>=:' TotalRequerimientos}
            end


            % %%Todos los operadores deben tener asignados un numero de canales igual al numero de canales asignados a los que poseen en la entrada mas lo que requieren

            local
               RestaOPiOPp = {List.filter OPi fun{$ P} {Bool.'not' {List.member P OPp}} end}
            in
               {List.forAll RestaOPiOPp
                proc{$ P}
                   {FD.sum BOco.P '=:' Req.P}
                end
               }
            end
            %%Todos los operadores que tienen asignación y solicitan canales deben tener una asignación igual a lo que requiren más lo que tenian ya asignado
            
            local
               InterOPpOPi = {List.filter OPi fun{$ P} {List.member P OPp} end}
            in
               {List.forAll InterOPpOPi
                proc{$ P}
                   {FD.sum BOco.P '=:' Req.P + {Record.foldL BIco.P fun{$ X Y} X+Y end 0}}
                end
               }
            end
            
            % %%Se requiere una separacion minima de Sep entre los operadores que requieren asignacion y entre estos con los que están que pueden o no cumplir la separación
            {ForAll OPi
             proc{$ O}
                {ForAll OPt
                 proc{$ Oprima}
                    {For 1 Sep 1
                     proc{$ S}
                        {For 1 C 1
                         proc{$ Canal}
                            if O \= Oprima then
                               if Canal-S>=1 then
                                  BOco.O.Canal + BOco.Oprima.(Canal-S) =<: 1
                               end
                               if Canal+S =< C then
                                  BOco.O.Canal + BOco.Oprima.(Canal+S) =<: 1
                               end
                            end
                         end
                        }
                     end
                    }
                 end
                }
             end
            }
            
            % %%Topes legales operadores
            {List.forAll OPi
             proc{$ P}                   
                {FD.sum {List.append {Record.toList BOco.P} [Apo.P]} '=<:' Tope}
             end
            }
            %%------------------------------------------------------------
            %%  ESTRATEGIAS DE BUSQUEDA
            %%-------------------------------------------------------------
            case EstrategiaBusqueda
            of 1 then
               {AsignarAlInicioDeLaBandaEnOrden BOco}
            [] 2 then
               {AsignarAlFinalDeLaBandaEnOrden BOco}
            [] 3 then
               {AsignarPrimeroAOperadoresDepAsignacion  BOco asignados inicio}
            [] 4 then
               {AsignarPrimeroAOperadoresDepAsignacion  BOco asignados final}
            [] 5 then
               {AsignarPrimeroAOperadoresDepAsignacion  BOco asignados inicio}
            [] 6 then
               {AsignarPrimeroAOperadoresDepAsignacion  BOco asignados final}
            [] 7 then
               {AsignarPrimeroARequerimientosMasGrandes BOco inicio}
            [] 8 then
               {AsignarPrimeroARequerimientosMasGrandes BOco final}
            [] 9 then
               {AsignarPrimeroARequerimientosMasChicos BOco inicio}
            [] 10 then
               {AsignarPrimeroARequerimientosMasChicos BOco final}
            [] 11 then
               {Record.forAll BOco
				proc{$ P} {FD.distribute 'naive' P} end
               }
            [] 12 then
               {Record.forAll BOco
				proc{$ P} {FD.distribute 'ff' P} end
               }
            [] 13 then
               {Record.forAll BOco
				proc{$ P} {FD.distribute 'split' P} end
               }
            else
               {AsignarAlInicioDeLaBandaEnOrden BOco}
            end
            %%---------------------------------------------------------------
            %% CALCULAR COSTOS POR SOLUCION
            %%---------------------------------------------------------------             
            Solucion.1.1.1 = {CalcularNumeroDeCambios BOco}
            Solucion.1.2.1 = {SizeMaxDeBloqueLibres ECC}
            Solucion.1.3.1 = {NumeroCanalesInutilizados BOco R Sep}
            Solucion.1.4.1 = Solucion.1.1.1*PesoNumeroDeBloques + Solucion.1.2.1*PesoSizeMaxDeCanalesLibre + Solucion.1.3.1*PesoNumeroDeCanalesInutiles
         end
      end
  end
end
