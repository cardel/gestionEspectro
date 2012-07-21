%---------------------------------------------------------
%Carlos Andres Delgado. 
%Diseño e implementación de una aplicación prototipo para la gestión del espectro radioeléctrico
%usando programación por restricciones
%
%Procedimientos para encontrar la mejor solucion
%Archivo Principal
%--------------------------------------------------------

functor
import
   %Modulos de mozart
   FD
export
   buscarMejorPorNumeroDeBloques:BuscarMejorPorNumeroDeBloques
   buscarMejorPorSizeDeBloquesLibres:BuscarMejorPorSizeDeBloquesLibres
   buscarMejorPorMenorNumeroCanalesInutilizados:BuscarMejorPorMenorNumeroCanalesInutilizados
   buscarConMejorCosto:BuscarConMejorCosto
   
define
%------------------------------------------------------------------------------------------------------------------
% Procedimientos para obtener mejor solucion
%------------------------------------------------------------------------------------------------------------------
   
%Minimizar Numero de bloques
   proc{BuscarMejorPorNumeroDeBloques Solucion1 Solucion2}
      Solucion1.1.1.1 >: Solucion2.1.1.1
end
   
%Maximizar tamaño bloques libres
   proc{BuscarMejorPorSizeDeBloquesLibres Solucion1 Solucion2}
      Solucion1.1.2.1 >: Solucion2.1.2.1
   end
   
%Minimizar numero de canales inutilizados
   proc{BuscarMejorPorMenorNumeroCanalesInutilizados Solucion1 Solucion2}
      Solucion1.1.3.1 >: Solucion2.1.3.1
   end
   
%Minimizar costo
   proc{BuscarConMejorCosto Solucion1 Solucion2}
      Solucion1.1.4.1 >: Solucion2.1.4.1
   end
end