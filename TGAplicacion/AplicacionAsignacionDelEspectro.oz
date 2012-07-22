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
   Restricciones
   ProcedimientosMejorSolucion
   GenerarSalidaXML
   
   %Modulos mozart
   Search
   System
   Property
   Application
   Open

   Explorer
define

   %Entradas
   LeerEntradaXML = Entradas.leerEntradaXML
   AsignarPesos = Entradas.asignarPesos
   IngresarEstrategia=Entradas.ingresarEstrategia
   Departamento=Entradas.departamento
   Ciudad=Entradas.ciudad
   BandaDeFrecuencia=Entradas.bandaDeFrecuencia
   BandaEspecifica=Entradas.bandaEspecifica
   %%Restricciones
   GenerarAsignacion=Restricciones.generarAsignacion
   
   %Procedimientos mejor solucion
   BuscarMejorPorNumeroDeBloques=ProcedimientosMejorSolucion.buscarMejorPorNumeroDeBloques
   BuscarMejorPorSizeDeBloquesLibres=ProcedimientosMejorSolucion.buscarMejorPorSizeDeBloquesLibres
   BuscarMejorPorMenorNumeroCanalesInutilizados=ProcedimientosMejorSolucion.buscarMejorPorMenorNumeroCanalesInutilizados
   BuscarConMejorCosto=ProcedimientosMejorSolucion.buscarConMejorCosto   
   %%--------------------------------------------------------------------
   %%Variables para recibir datos desde consola
   %%-------------------------------------------------------------------------
   Input
   Args
   Motor
   Estrategia
   RutaArchivo
   PesoNumeroDeBloques
   PesoSizeMaxDeCanalesLibre
   PesoNumeroDeCanalesInutiles
   TiempoEjecucion
   ArchivoSalida

   Desempenio
   Salida
   SalidaInv
   NumeroMaxSoluciones
   
   NoMantenerAsignacionesActuales
   NoConsiderarTope
   NoConsiderarSeparacion
   NumeroOperadorPorCanal
   
   FileSolution
   
   %%Salida
   GenerarSalida=GenerarSalidaXML.generarSalida

   try
   Input =
      {Application.getCmdArgs 
       record(
          file(single char:&f type:string) %Ruta archivo origen
          %%TIPO DE BUSQUEDA
          motor(single type:int(min:1 max:5) default 1) %Tipo de búsqueda
          %%--------------------------------------------------------------------
          pnb(single type:int(min:0 max:100) default 33) %PesoNumeroDeBloques
          psm(single type:int(min:0 max:100) default 34) %PesoSizeMaxDeCanalesLibre
          pnc(single type:int(min:0 max:100) default 33) %PesoNumeroDeCanalesInutiles
          %%ESTRATEGIA DE BUSQUEDA
          es(single type:int(min:1 max:10) default:1) %Estrategia de busqueda
          %%---------------------------------------------------------------------
          o(single type:string default:"solution.xml") %Archivo de salida
          tm(single type:int(min:1 max:36000) default:2000 ) % Tiempo ejecución [milesegundos]
          rc(single type:int(min:1 max:10) default:1) %Nivel de recomputación
          ns(single type:int(min:1 max:100) defautl:10) %número máximo de soluciones
          %%RESTRICCIONES DEBILES
          nmas(single type:int(min:0 max:1) default:0) %No mantener asignaciones actuales
          ntope(single type:int(min:0 max:1) default:0) %No considerar tope
          nsep(single type:int(min:0 max:1) default:0) %No considerar separacion entre canales
          nopc(single type:int(min:1 max:1000) default:0) %Numero de operadores por canal
          )}
   in
      Args=Input
   catch Exception then
      {System.showInfo "Problema al leer los argumentos"}
      {Application.exit 0}
   end

   
   %%Tomar pesos
   PesoNumeroDeBloques=Args.pnb
   PesoSizeMaxDeCanalesLibre=Args.psm
   PesoNumeroDeCanalesInutiles=Args.pnc
   {AsignarPesos PesoNumeroDeBloques PesoSizeMaxDeCanalesLibre PesoNumeroDeCanalesInutiles}
   
   RutaArchivo = Args.file
   %%Leer XML
   {LeerEntradaXML RutaArchivo}
                             
   %%Numero maximo de soluciones
   NumeroMaxSoluciones=Args.ns
                             
   %%Restricciones debiles
   NoMantenerAsignacionesActuales=Args.nmas
   NoConsiderarTope=Args.ntope
   NoConsiderarSeparacion=Args.nsep
   NumeroOperadorPorCanal=Args.nopc
                          
   %%-------------------------------------------------------------------------
   %%PROCEDIMIENTO EJECUTAR APLICACION DURANTE UN TIEMPO
   %%-----------------------------------------------------------------------
   proc {BuscarMejorSolucionEnTiempoDado Engine Tiempo ?Salida}
      local
         Dead
         Termino
         proc{BuscarSolucion Contador ?Res}
            if {IsFree Dead} then
               local
                  Sol
               in
                  if Contador=<NumeroMaxSoluciones then
                     Sol = {Engine next($)}
                     case Sol of nil then Res=[Contador 'Optima']
                     [] stopped then Res=[Contador 'noOptima']
                     else Res={List.append Sol {BuscarSolucion Contador+1}}
                                            end
                  else
                     Res=[Contador 'noOptima']
                     {Engine stop}
                  end
               end
            end
         end
         
      in
         thread
            {Alarm Tiempo Dead}
            {Wait Dead}          
            
            if {IsDet Dead} then
               {Engine stop}               
            end
         end
         Salida={BuscarSolucion 0}
      end      
   end
   
   Motor = Args.motor
   Estrategia = Args.es
   TiempoEjecucion = Args.tm
   %%Ingresa la estrategia de búsqueda para que quede como entrada
   {IngresarEstrategia Estrategia}
   
   %%-----------------------------------------------------------------
   %%DATOS DE DESEMPEÑO DE UNA SOLUCIÓN
   %%-----------------------------------------------------------------
   fun{DatosDesempeno}
      EF EC EE VC PC MU R P
   in
      EF={Property.get 'spaces.failed'}
      EC={Property.get 'spaces.created'}
      EE={Property.get 'spaces.succeeded'}
      VC={Property.get 'fd.variables'}
      PC={Property.get 'fd.propagators'}
      MU={Property.get 'memory.code'}
      P={Property.get 'time.total'}
      R=r(ef:EF ec:EC ee:EE vc:VC pc:PC mu:MU p:P departamento:Departamento ciudad:Ciudad bandaDeFrecuencia:BandaDeFrecuencia bandaEspecifica:BandaEspecifica)
      R
   end
   %%------------------------------------------------------------------
   %%EJECUTAR DE ACUERDO A UN MOTOR DE BÚSQUEDA
   %%------------------------------------------------------------------

   case Motor of 1 then

      Salida={BuscarMejorSolucionEnTiempoDado {New Search.object script({GenerarAsignacion NoMantenerAsignacionesActuales NoConsiderarTope NoConsiderarSeparacion NumeroOperadorPorCanal})} TiempoEjecucion}
      %%{Explorer.one {GenerarAsignacion NoMantenerAsignacionesActuales NoConsiderarTope NoConsiderarSeparacion NumeroOperadorPorCanal}}
   [] 2  then
      Salida= {BuscarMejorSolucionEnTiempoDado {New Search.object script({GenerarAsignacion NoMantenerAsignacionesActuales NoConsiderarTope NoConsiderarSeparacion NumeroOperadorPorCanal} BuscarConMejorCosto Args.rc)} TiempoEjecucion}
   [] 3 then
      Salida ={BuscarMejorSolucionEnTiempoDado {New Search.object script({GenerarAsignacion NoMantenerAsignacionesActuales NoConsiderarTope NoConsiderarSeparacion NumeroOperadorPorCanal} BuscarMejorPorSizeDeBloquesLibres Args.rc)} TiempoEjecucion}
   [] 4 then
      Salida = {BuscarMejorSolucionEnTiempoDado {New Search.object script({GenerarAsignacion NoMantenerAsignacionesActuales NoConsiderarTope NoConsiderarSeparacion NumeroOperadorPorCanal} BuscarMejorPorNumeroDeBloques Args.rc)} TiempoEjecucion}
   [] 5 then
      Salida = {BuscarMejorSolucionEnTiempoDado {New Search.object script({GenerarAsignacion NoMantenerAsignacionesActuales NoConsiderarTope NoConsiderarSeparacion NumeroOperadorPorCanal} BuscarMejorPorMenorNumeroCanalesInutilizados Args.rc)} TiempoEjecucion}
   else
      Salida = {BuscarMejorSolucionEnTiempoDado {New Search.object script({GenerarAsignacion NoMantenerAsignacionesActuales NoConsiderarTope NoConsiderarSeparacion NumeroOperadorPorCanal})} TiempoEjecucion}
   end
   %%---------------------------------------------------------------------
   %% ESCRIBIR ARCHIVO DE SALIDA
   %%----------------------------------------------------------------------
   Desempenio = {DatosDesempeno}
   
   ArchivoSalida={String.toAtom Args.o}
   FileSolution={New Open.file  
                 init(name:  ArchivoSalida
                      flags: [write truncate create]
                      mode:  mode(owner: [read write]  
                                  group: [read write]))}
   
   %Invertimos la salida
   
   SalidaInv = {FoldL Salida fun{$ X Y} Y|X end nil}
   {FileSolution write(vs:{VirtualString.toString {GenerarSalida Motor [Desempenio SalidaInv] NoMantenerAsignacionesActuales NoConsiderarTope NoConsiderarSeparacion NumeroOperadorPorCanal}})}  
   
   {Application.exit 0}
end

