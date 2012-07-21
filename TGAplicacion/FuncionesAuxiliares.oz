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
   %Modulos Mozart
   FD
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
   %Numero operadores
   N = Entradas.n
   
%Calcular traspuesta de una matriz
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

%Calcular suma lista
   proc {SumaLista Lista ?Salida}
      if Lista==nil then Salida = 0
      else Salida=Lista.1+{SumaLista Lista.2}
      end
   end
   
%Suma Tupla
   proc {SumaTupla Tupla Indice ?Salida}
      if Indice>{Length Tupla} then Salida = 0
      else Salida=Tupla.Indice + {SumaTupla Tupla Indice+1}
      end
end
   
%Trasponer tupla de tuplas
   proc{TrasponerMatrizTuplas MatrizPorFilas ?Salida}
      
      Salida={Tuple.make asignacionTraspuesta C}
      {For 1 C 1 proc {$ I} Salida.I = {FD.tuple canal N 0#1} end}
      
   %Para mantener consistencia se requiere que ambas sean la misma
      {For 1 N 1 proc {$ I} {For 1 C 1 proc{$ J} MatrizPorFilas.I.J = Salida.J.I end} end}
      
   end
   
end