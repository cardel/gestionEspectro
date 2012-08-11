%---------------------------------------------------------
%Carlos Andres Delgado. 
%Diseño e implementación de una aplicación prototipo para la gestión del espectro radioeléctrico
%usando programación por restricciones
%
%Implementación  Modelo de Asignación de canales
%Funciones Auxiliares
%--------------------------------------------------------

functor
import
   %Modulos personalizados
   Entradas

export
   generarListaTraspuesta:GenerarListaTraspuesta
   sumaLista:SumaLista
   sumaTupla:SumaTupla
   trasponerMatrizTuplas:TrasponerMatrizTuplas
define

   %Numero canales
   C = Entradas.c

   
   %%Calcular traspuesta de una matriz
   proc {TrasponerMatrizTuplas MatrizPorOperadores ?Salida}
      local
         Elementos = {Record.arity MatrizPorOperadores}
      in
         Salida = {Tuple.make traspuesta C}

         {Record.forAll Salida
          proc{$ P}
             P = {Record.make canal Elementos}
          end
         }
         
         {For 1 C 1
          proc{$ I}
             {List.forAll Elementos
              proc{$ J}
                 Salida.I.J = MatrizPorOperadores.J.I
              end
             }
          end
         }      
      end
   end

   proc {TrasponerFila Lista Indice ?Salida}
      if Lista == nil then Salida = nil
      else
         Salida = {Nth Lista.1 Indice}|{TrasponerFila Lista.2 Indice}
      end
   end
   
   proc {GenerarListaTraspuesta Lista Indice ?Salida}
      if Indice > C then Salida=nil
      else
         Salida={TrasponerFila Lista Indice}|{GenerarListaTraspuesta Lista Indice+1}
      end
   end
   
   %%Calcular suma lista
   proc {SumaLista Lista ?Salida}
      if Lista==nil then Salida = 0
      else Salida=Lista.1+{SumaLista Lista.2}
      end
   end
   
   %%Suma Tupla
   proc {SumaTupla Tupla Indice ?Salida}
      if Indice>{Length Tupla} then Salida = 0
      else Salida=Tupla.Indice + {SumaTupla Tupla Indice+1}
      end
   end  
end