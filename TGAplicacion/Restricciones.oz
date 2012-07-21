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
   N=Entradas.n %Numero total de operadores
   Bci=Entradas.bci %Asignacion de entrada
   PesoNumeroDeBloques=Entradas.pesoNumeroDeBloques %Peso ingresado por el usuario
   PesoSizeMaxDeCanalesLibre=Entradas.pesoSizeMaxDeCanalesLibre %Peso ingresado por el usuario
   PesoNumeroDeCanalesInutiles=Entradas.pesoNumeroDeCanalesInutiles %Perso ingresado por el usuario
   Tope=Entradas.tope %Tope
   Sep %Separacion
   %%Asignaciones parciales
   Apo=Entradas.apo %Asignaciones parciales
   %%Asignaciones en banda
   
   EstrategiaBusqueda=Entradas.estrategia %Estrategia seleccionada por el usuario
   O=Entradas.o %Numero de operadores con requerimientos
   Req=Entradas.req %Requerimientos
   InOP=Entradas.inOP %Operadores de entrada (Derivado de req)
   InReqCanal=Entradas.inReqCanal %Requerimientos de entrada (Derivado de req)
   
   %%---------------------------------------------------------------------
   %%DISTRIBUIDORES
   %%--------------------------------------------------------------------
   
   AsignarAlInicioDeLaBandaEnOrden=Distribuidores.asignarAlInicioDeLaBandaEnOrden
   AsignarAlFinalDeLaBandaEnOrden=Distribuidores.asignarAlFinalDeLaBandaEnOrden
   AsignarPrimeroAOperadoresConAsignacion=Distribuidores.asignarPrimeroAOperadoresConAsignacion
   AsignarPrimeroAOperadoresSinAsignacion=Distribuidores.asignarPrimeroAOperadoresSinAsignacion
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

  fun{GenerarAsignacion MantenerAsignacionesActuales NoConsiderarTope NoConsiderarSeparacion NumeroOperadorPorCanal}
  
      if NoConsiderarSeparacion == 1 then
			Sep= 0
	  else
			Sep = Entradas.sep %Separacion
	  end
	  
      proc{$ ?Solucion}
         local
            %%La matriz de entrada esta por filas, para facilitar las operaciones se requiere trasponerla
            BcoT %Salida traspuesta
            Bco %Salida
            R = NumeroOperadorPorCanal %Numero de operadores por canal
            CAC = MantenerAsignacionesActuales %Mantener asignacion actual de canales que solicitan
            ECC = {FD.tuple estadoCanales C 0#1} %Define si un canal esta ocupado o no
            

         in
            %%Definir

            %%Matriz por filas
            Solucion = {Tuple.make solucion 2}
            Solucion.1 = {Tuple.make costos 4}
            Solucion.1.1 = {Tuple.make numeroDeBloques 1}
            Solucion.1.2 = {Tuple.make difNumeroCanalesYmaxSizeBloqueCanalesLibres 1}
            Solucion.1.3 = {Tuple.make numeroDeCanalesInutiles 1}
            Solucion.1.4 = {Tuple.make costoTotal 1}

            Bco = {Tuple.make asignacion N}  
            {For 1 N 1 proc {$ I} Bco.I = {FD.tuple {Label Bci.I} C 0#1} end}
            Solucion.2=Bco
            
            %%Matriz por columnas
            BcoT = {TrasponerMatrizTuplas Bco}
            %%---------------------------------------------------------------------------
            %% Restricciones
            %%----------------------------------------------------------------------------
            
            %%Se mantiene asignacion para operadores que solicitan canales si 
            if CAC == 1 then
               {For 1 N 1 
                proc{$ I}
                   if {List.member I InOP} then
                      {For 1 C 1
                       proc {$ J}
                          if Bci.I.J == 1 then
                             Bco.I.J = 1
                          end
                       end
                      }
                   end
                end
               }
            end
           
            %%Todo operador que no solicita conserva asignación
            {For 1 N 1 
             proc{$ I}
                if {Bool.'not' {List.member I InOP}} then
                   {For 1 C 1
                    proc {$ J}
                       Bco.I.J = Bci.I.J
                    end
                   }
                end
             end
            }
           
            %%Maximo R operadores por canal excepto o1 y o2 que son inutil y reservado
            {For 1 C 1
             proc{$ I}
                {FD.sum BcoT.I '=<:' R}
             end
            }
            %%El canal inutil y reservado solo se puede asignar una vez
            {For 1 C 1
             proc{$ I}
                if {FD.reified.sum [BcoT.I.1 BcoT.I.2] '>=:' 1}==1 then
                   {FD.sum BcoT.I '=<:' 1}
                end
             end
            }
            %%Existen suficientes canales para cumplir los requerimientos de entrada

            %%Definir si canales estan ocupados o no
            {For 1 C 1
             proc{$ P}
                {FD.reified.sum BcoT.P '=:' 0 ECC.P}
             end
            }

            {FD.sum ECC '>=:' {FoldL InReqCanal fun{$ X Y} X+Y end 0}+Sep*(O-1)}

            %%Todos los operadores deben tener asignados un numero de canales igual al numero de canales asignados a los que poseen en la entrada mas lo que requieren
            {ForAll InOP
             proc{$ P}
                {FD.sum Bco.P '=:' {FoldL {Record.toList Bci.P}fun{$ X Y} X+Y end 0}+Req.P}
             end
            }

            %%Se requiere una separacion minima de Sep entre los operadores que requieren asignacion y entre estos con los que están que pueden o no cumplir la separación
            
            if R == 1 then
               {ForAll InOP
                proc{$ I}
                   {For 1 C-Sep 1
                    proc{$ J}
                       {For 1 Sep 1
                        proc{$ S}
                           {For 1 N 1
                            proc{$ T}
                               if {Bool.and T\=I (J+S)=<C} then
                                  Bco.I.J + Bco.T.(J+S) =<: 1
                               end
                               if {Bool.and T\=I (J-S)>=1} then
                                  Bco.I.J + Bco.T.(J-S) =<: 1
                               end  
							end
                           }
                        end
                       }
                    end
                   }
                end
               }
            end

            
            %%Topes legales operadores

            {ForAll InOP
             proc{$ I}
                {FD.sum Bco.I '=<:' Tope-Apo.I}
             end
            }
            %%------------------------------------------------------------
            %%  ESTRATEGIAS DE BUSQUEDA
            %%-------------------------------------------------------------

            case EstrategiaBusqueda
            of 1 then
               {AsignarAlInicioDeLaBandaEnOrden Bco}
            [] 2 then
               {AsignarAlFinalDeLaBandaEnOrden Bco}
            [] 3 then
               {AsignarPrimeroAOperadoresConAsignacion Bco inicio}
            [] 4 then
               {AsignarPrimeroAOperadoresConAsignacion Bco final}
            [] 5 then
               {AsignarPrimeroAOperadoresSinAsignacion Bco inicio}
            [] 6 then
               {AsignarPrimeroAOperadoresSinAsignacion Bco final}
            [] 7 then
               {AsignarPrimeroARequerimientosMasGrandes Bco inicio}
            [] 8 then
               {AsignarPrimeroARequerimientosMasGrandes Bco final}
            [] 9 then
               {AsignarPrimeroARequerimientosMasChicos Bco inicio}
            [] 10 then
               {AsignarPrimeroARequerimientosMasChicos Bco final}
            else
               {AsignarAlInicioDeLaBandaEnOrden Bco}
            end
            %%---------------------------------------------------------------
            %% CALCULAR COSTOS POR SOLUCION
            %%---------------------------------------------------------------  
           
            Solucion.1.1.1 = {CalcularNumeroDeCambios Bco}
            Solucion.1.2.1 = {SizeMaxDeBloqueLibres Bco}
            Solucion.1.3.1 = {NumeroCanalesInutilizados Bco R Sep}
            Solucion.1.4.1 = Solucion.1.1.1*PesoNumeroDeBloques + Solucion.1.2.1*PesoSizeMaxDeCanalesLibre + Solucion.1.3.1*PesoNumeroDeCanalesInutiles
         end
      end
  end
end
