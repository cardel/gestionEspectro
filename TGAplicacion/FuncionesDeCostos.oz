%---------------------------------------------------------
%Carlos Andres Delgado. 
%Diseño e implementación de una aplicación prototipo para la gestión del espectro radioeléctrico
%usando programación por restricciones
%
%Procedimientos para encontrar los costos de cada solucion
%Archivo Principal
%--------------------------------------------------------
functor

import
   %Modulos mozart
   FD
   %%Modulos personalizados
   Entradas
export
   calcularNumeroDeCambios:CalcularNumeroDeCambios
   sizeMaxDeBloqueLibres:SizeMaxDeBloqueLibres
   numeroCanalesInutilizados:NumeroCanalesInutilizados
define
   C=Entradas.c %Numero total de canales
   OPt=Entradas.opt %Operadores en la banda
%-----------------------------------------------------------------------------------------------------------------
%Calcular numero de bloques
%------------------------------------------------------------------------------------------------------------------
   proc {CalcularNumeroDeCambios Sol ?Salida}
      local
         Cao = {Record.make cao OPt}
         Aux = {Record.make sumaOp OPt}
      in
         {List.forAll OPt
          proc {$ I}
             Cao.I = {Tuple.make canal C}
          end
         }
         %%Calcular para cada operador
         {List.forAll OPt
          proc{$ I}
             {For 1 C-1 1
              proc{$ J}
                 Cao.I.J = {FD.reified.sum [Sol.I.J Sol.I.(J+1)] '=:' 1}
              end
             }
             
             if Sol.I.C == 1 then Cao.I.C = 1
             else Cao.I.C = 0
             end
          end
         }
         
         
         
         %%Sumamos para cada operador
         {List.forAll OPt
          proc{$ I}
             Aux.I = {Record.foldL Cao.I fun{$ X Y} X+Y end 0}
          end
         }
         Salida = {FloatToInt {Float.ceil {Float.'/' {IntToFloat {Record.foldL Aux fun{$ X Y} X+Y end 0}}  2.}}}
      end
   end
   
%---------------------------------------------------------------------------------------------------------------------
%Calcular tamaño máximo de bloque libre (Canales libres contiguos)
%-----------------------------------------------------------------------------------------------------------------------
   proc {SizeMaxDeBloqueLibres ECC ?Salida}
      local
         Clm = {Tuple.make conteocanalLibre C}
      in
         %Ir sumando
         {For 1 C 1
          proc{$ I}
             case ECC.I of 1 then
                case I of 1 then
                   Clm.I = 1
                else
                   Clm.I = 1+Clm.(I-1)
                end
             else
                Clm.I = 0
             end
          end
         }
	
         Salida = C-{List.sort {Record.toList Clm} Value.'>'}.1
      end
   end
   
%-----------------------------------------------------------------------
% Buscar solucion por menor numero de canales inutilizados
%-----------------------------------------------------------------------
   proc {NumeroCanalesInutilizados Sol R Sep ?Salida}
      local
         CI = {Tuple.make canal C}
      in
         if {Bool.'or' Sep==0 R>1} then
			{For 1 C 1
             proc{$ I}
                CI.I = 0
             end
			}
		 else		
            {ForAll OPt
             proc{$ I}
                %%Evaluar hacia adelante
                {For 1 C-1 1
                 proc{$ J} 
                    if {Bool.and Sol.I.J==1 Sol.I.(J+1)==0} then
                       {For 1 Sep 1
                        proc{$ S}
                           if J+S =< C then
                              if {Value.isFree CI.(J+S)} then
                                 CI.(J+S) = 1
                              end
                           end
                        end
                       }
                    end
                 end
                }
                
                %%Evaluar hacia atrás
                {For 2 C 1
                 proc{$ J} 
                    if {Bool.and Sol.I.(J-1)==0 Sol.I.J==1} then
                       {For 1 Sep 1
                        proc{$ S}
                           if J-S > 0 then
                              if {Value.isFree CI.(J-S)} then
                                 CI.(J-S) = 1
                              end
                           end
                        end
                       }
                    end
                 end
                }
             end
            }
            %%Llenar el resto	
            {For 1 C 1
                 proc{$ I} 
                    if {Value.isFree CI.I} then
                       CI.I = 0	
                    end
                 end
            } 
         end
         Salida = {Record.foldL CI fun{$ X Y} X+Y end 0}
      end
   end
end
