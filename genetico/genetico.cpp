/*
 * Carlos Andrés Delgado Saavedra
 * 0831085-3743
 * Diseño e implementación de una aplicación para la gestión del espectro radioeléctrico usando programación por restrcciones
 * Solución evolutiva
 */
#include <iostream>
#include <cmath>
#include <map>
#include <vector>
#include <string>
#include <cstdlib>
#include <cstdio>
#include <sstream>
#include <algorithm>

#define SIZE          8192  /* buffer size for reading /proc/<pid>/status */
using namespace std;

/*
 * ENTRADAS INCLUIDAS
 */

int totalPoblacion;
double probabilidadCruce;
double probabilidadMutacion;
int pesoNumeroBloques;
int pesoNumeroCanalesInutilizados;
int pesoDiferenciaMaxBloqueLibre;
int tipoAsignacionGeografica;
int idAsignacionGeografica;

int tiempoEjecucion;

int numeroDeVecesEjecuta;
int numeroSoluciones;

int C;
int Sep;
int Tope;

int BandaDeFrecuencia;
int RangoDeFrecuencia;

double secs;

//Numero de operadores presentes en la banda Opp
int P;

//Numero de operadores que solicitan asignacion Opi
int T;

//Numero total de operadores Opt
int N;

//Numero de operadores presentes que no solicitan asignacion OppNoOpi
int NnI;

//Numero de operadores que solicitan asignacion y están presentes OppOpi
int NI;

//Numero de operadores que no están presentes y solicitan asignacion OpiNoOpp
int InN;

//Operadores que solicitan asignacion
int * Opi;

//Requerimientos estan en orden de Opi
int * Req;

//Operadores presentes en la banda
int * Opp;

//Operadores actuales que no solictan asignacion
int * OppNoOpi;

//Operadores actuales que si solicitan asignacion
int * OppOpi;

//operadores que no están presentes y solicitan asignacion
int * OpiNoOpp;

//Total de operadores que van a ir en la banda
int * Opt;

//Asignaciones acutales
//Estas corresponde a la lista Opp
string asignacionesActuales;

//Asignaciones EnSubDivisiones, inutilizable y reservado
string EnSubDivisiones;
string Reservado;
string Inutilizado;

/*
 *  ALGORITMO EVOLUTIVO
 */ 

bool ordenar (pair<string,int> i,pair<string,int> j) { return (i.second<j.second); }

bool ordenarFinal (pair<string,pair<int, vector < int > > > i,pair<string,pair<int, vector < int > > > j) { return ((C*1000*i.second.first+i.second.second.at(3))<(C*1000*j.second.first+j.second.second.at(3))); }


//Funcion aptitud
vector<int> calcularCostos(string in)
{	
	printf("%s\n", "Costos");
	printf("%s\n", in.c_str());
	
	vector <int> out;
	 //Número de bloques
	 int numeroBloques = 0;/*
	 for(int i=0; i<N; i++)
	 {
			for(int j=0; j<C; j++)
			{
				if(j==0 && in.at((i+1)*j) == '1') numeroBloques++;
				else
				{
					if(j==(C-1) && in.at((i+1)*j) == '1') numeroBloques++;
					else
					{
						if( in.at((i+1)*j) == '0' &&  in.at((i+1)*j+1) == '1') numeroBloques++;	
						if( in.at((i+1)*j) == '1' &&  in.at((i+1)*j+1) == '0') numeroBloques++;						
					}
				}

			}
		 
	 }
	 numeroBloques/=2;
	 out.push_back(numeroBloques);*/
	 out.push_back(0);
	 printf("%d\n",1);
	 
	 int numeroCanalesInutilizables = 0;
	 //Número de canales inutilizables
	 for(int i=0; i<N; i++)
	 {
			for(int j=0; j<C; j++)
			{
				//Hacia adelante
				if(j<(C-1))
				{
					if( in.at((i+1)*j) == '1' &&  in.at((i+1)*j+1) == '0')
					{
						int correcion = j + Sep - C;
						if(correcion<0) correcion = 0;
						numeroCanalesInutilizables+=(Sep-correcion);
					}
				}
				//Hacia atras
				if(j>0)
				{
					if( in.at((i+1)*j-1) == '0' &&  in.at((i+1)*j) == '1')
					{
						int correcion = j-Sep;
						if(correcion>0) correcion = 0;
						numeroCanalesInutilizables+=(Sep+correcion);
					}
				}
			}				
		 
	 }		 

	 numeroCanalesInutilizables/=N;
	 out.push_back(numeroCanalesInutilizables);
	 printf("%d\n",2);
	  //Diferencia entre el mayor bloque libre y el número de canales
	 int diferenciaMayorBloqueYCanalLibre = 0;
	 int acumulado = 0;
	 
	 for(int j=0; j<C; j++)
	 {
		int numeroOperadoresPorCanal=0;;
		
		for(int i=0; i<N; i++)
		{
			if( in.at((i+1)*j) == '1') numeroOperadoresPorCanal++;
		}
		
		if(numeroOperadoresPorCanal==0)  acumulado++;
		else
		{
			if(acumulado>diferenciaMayorBloqueYCanalLibre)diferenciaMayorBloqueYCanalLibre=acumulado;
			
			acumulado = 0;
			
		}
	}
	diferenciaMayorBloqueYCanalLibre=C-diferenciaMayorBloqueYCanalLibre;
	out.push_back(diferenciaMayorBloqueYCanalLibre);
	
	
	out.push_back(pesoNumeroBloques*numeroBloques + pesoNumeroCanalesInutilizados*numeroCanalesInutilizables + pesoDiferenciaMaxBloqueLibre*diferenciaMayorBloqueYCanalLibre);
	printf("%d\n",3);
	return out;
}

//Costos
int calcularInfraccionesARestricciones(string in)
{
	//Maximo un operador por canal
	int InfraccionesAnumeroOperadoresPorCanal = 0;
	
	for(int i=0; i<C; i++)
	{
		int operadoresPorCanal = 0;

		for(int j=0; j<N; j++)
		{			
			if(in.at(j*C+i) == '1')
			{
				operadoresPorCanal++;
			}
		}
		if(operadoresPorCanal>1) InfraccionesAnumeroOperadoresPorCanal+=(operadoresPorCanal-1);
	}

	//Se conserva asignaciones actuales de operadores que no solicitan asignacion
	int InfraccionesAAsignacionesOperadoresNoSolicitanAsignacion = 0;
	for(int i=0; i<N; i++)
	{
	
		//Buscar indice
		int indice = -1;
		
		for(int j=0; j<NnI; j++)
		{
			if(Opt[i] == OppNoOpi[j])
			{
				indice = j;
			}
		}
		
		if(indice>=0)
		{

			int indiceAsignaciones = -1;
			for(int j=0; j<P; j++)
			{
				if(Opt[i] == Opp[j])
				{
					indiceAsignaciones = j;
				}
			}	
			if(indiceAsignaciones != -1)
			{
				for(int j=0; j<C; j++)
				{
					char a = in.at(i*C+j);
					char b = asignacionesActuales.at(indiceAsignaciones*C+j);	
					if(a != b) InfraccionesAAsignacionesOperadoresNoSolicitanAsignacion++;
				}	
				
			}
		
		}
		
	}

	//Conservar asignaciones actuales operadores que solicitan asignacion
	int InfraccionesAAsignacionesOperadoresSolicitanAsignacion = 0;
	for(int i=0; i<N; i++)
	{
		//Buscar indice
		int indice = -1;
		
		
		for(int j=0; j<NI; j++)
		{
			if(Opt[i] == OppOpi[j])
			{
				indice = j;
			}
		}
		
		if(indice>=0)
		{
			int indiceAsignaciones = -1;

			for(int j=0; j<P; j++)
			{
				if(Opt[i] == Opp[j])
				{
					indiceAsignaciones = j;
				}
			}	
			
		
			if(indiceAsignaciones != -1)
			{
				
				for(int j=0; j<C; j++)
				{			
					char a = in.at(i*C+j);
					char b = asignacionesActuales.at(indiceAsignaciones*C+j);
							
					if(a != b && b=='1') InfraccionesAAsignacionesOperadoresSolicitanAsignacion++;
				}	
				
			}
		
		}		
	}

	//Cada operador que no tiene asignacion actualmente recibe lo que solicita
	int InfraccionesAAsignacionNoTieneAsignacion = 0;
	for(int i=0; i<N; i++)
	{
		//Buscar indice
		int indice = -1;
		
		for(int j=0; j<InN; j++)
		{
			if(Opt[i] == OpiNoOpp[j])
			{
				indice = i;
			}
		}
		if(indice >= 0)
		{		
			int indiceReq = -1;
			for(int j=0; j<T; j++)
			{
				if(Opt[indice]==Opi[j])
				{
					indiceReq = j;
				}
			}
				
			int numeroCanalesAsignados = 0;
			for(int j=0; j<C; j++)
			{
				if(in.at(indice*C+j) == '1')
				{
					numeroCanalesAsignados++;
				}
			}
			if(numeroCanalesAsignados!=Req[indiceReq]) InfraccionesAAsignacionNoTieneAsignacion+=abs(numeroCanalesAsignados-Req[indiceReq]);	

		}
		
	}

	//Cada operador que tiene asignacion actualmente recibe lo que solicita más lo que tenia
	int InfraccionesAAsignacionTieneAsignacion = 0;
	for(int i=0; i<N; i++)
	{
		
		//Buscar indice
		int indice = -1;
		
		for(int j=0; j<NI; j++)
		{
			if(Opt[i] == OppOpi[j])
			{
				indice = i;
			}
		}
		
		if(indice >= 0)
		{
			int numeroCanalesAsignados = 0;
			
			//Calcular indice de requerimientos
			int indiceReq = -1;
			for(int j=0; j<T; j++)
			{
				if(Opt[indice]==Opi[j])
				{
					indiceReq = j;
				}
			}
			
			//Calcular indice de asignaciones
			int numeroCanalesYaAsignados = 0;
			
			int indiceAsignaciones = -1;
			for(int k=0; k<P; k++){
				if(Opt[indice] == Opp[k])
				{
					indiceAsignaciones = k;
				}
			}
			//Calcular numero de canales usados
			
			if(indiceAsignaciones!=-1)
			{
				
				for(int j=0; j<C; j++)
				{

					if(asignacionesActuales.at(indiceAsignaciones*C+j) == '1')
					{
						numeroCanalesYaAsignados++;
					}
				}
				
			}

			
			//Calcular numero de canales asignados
			for(int j=0; j<C; j++)
			{
				if(in.at(indice*C+j) == '1')
				{
					numeroCanalesAsignados++;
				}
			}
			if(numeroCanalesAsignados!=(Req[indiceReq]+numeroCanalesYaAsignados)) InfraccionesAAsignacionTieneAsignacion+=abs(numeroCanalesAsignados-(Req[indiceReq]+numeroCanalesYaAsignados));			

		}
	}	
	//Tope operadores
	int InfraccionesATopeOperadores = 0;
	for(int i=0; i<N; i++)
	{
		int numeroCanalesAsignados = 0;
		for(int j=0; j<C; j++)
		{
			if(in.at(i*C+j) == '1')
			{
				numeroCanalesAsignados++;
			}
		}
		if(numeroCanalesAsignados>Tope) InfraccionesATopeOperadores++;			
	}	

	//SeparacionMinimaExigida
	
	int InfraccionesASeparacion = 0;
	
	//Canales
	for(int i=0; i<C; i++)
	{
		//Operadores
		for(int j=0; j<N; j++)
		{		
			bool esta = false;
			
			for(int k=0; k<T; k++)
			{
				if(Opt[j]==Opi[k])
				{
					esta = true;
					k=T;
				}
			}
			if(esta)
			{
				for(int p=0; p<N; p++)
				{										
					//Mirar canales vecinos
					if(p!=j)
					{
						for(int k=1; k<=Sep; k++)
						{
							//Si esta asignado mirar
							if(in.at(j*C+i) == '1')
							{
								if((i+k)<C)
								{
									if(in.at(p*C+(i+k))== '1') InfraccionesASeparacion++;
								}
								
								if((i-k)>=0)
								{
									if(in.at(p*C+(i-k))== '1') InfraccionesASeparacion++;
								}				
							}
						
						}					
						
					}

					
				}
				
			} 
			
		}
			
	}
	
	return InfraccionesAnumeroOperadoresPorCanal+InfraccionesAAsignacionesOperadoresNoSolicitanAsignacion+InfraccionesAAsignacionNoTieneAsignacion+InfraccionesAAsignacionesOperadoresSolicitanAsignacion+InfraccionesAAsignacionTieneAsignacion+InfraccionesATopeOperadores+InfraccionesASeparacion;
}

void leerArchivo(string nombreArchivoEntrada)
{
	FILE * ArchivoDeEntrada;	
	ArchivoDeEntrada = fopen(nombreArchivoEntrada.c_str(), "r");
	//Numero de canales
	fscanf(ArchivoDeEntrada, "%d", &C); 
	
	//Numero de operadores presentes
	fscanf(ArchivoDeEntrada, "%d", &P); 
	
	//Numero de operadores que solicitan asignacion Opi
	fscanf(ArchivoDeEntrada, "%d", &T); 

	//Numero total de operadores Opt
	fscanf(ArchivoDeEntrada, "%d", &N);

	//Numero de operadores presentes que no solicitan asignacion OppNoOpi
	fscanf(ArchivoDeEntrada, "%d", &NnI);

	//Numero de operadores que solicitan asignacion y están presentes OppOpi
	fscanf(ArchivoDeEntrada, "%d", &NI);

	//Numero de operadores que no están presentes y solicitan asignacion OpiNoOpp
	fscanf(ArchivoDeEntrada, "%d", &InN);
	Opp = new int[P];
	
	for(int i=0; i<P; i++)
	{
		fscanf(ArchivoDeEntrada, "%d", &Opp[i]); 
	}
	Opi = new int[T];
	
	for(int i=0; i<T; i++)
	{
		fscanf(ArchivoDeEntrada, "%d", &Opi[i]); 
	}
	Req = new int[T];
	
	for(int i=0; i<T; i++)
	{
		fscanf(ArchivoDeEntrada, "%d", &Req[i]); 
	}
	Opt = new int[N];
	for(int i=0; i<N; i++)
	{
		fscanf(ArchivoDeEntrada, "%d", &Opt[i]); 
	}
	OppNoOpi = new int[NnI];
	for(int i=0; i<NnI; i++)
	{
		fscanf(ArchivoDeEntrada, "%d", &OppNoOpi[i]); 
	}
	OppOpi = new int[NI];
	for(int i=0; i<NI; i++)
	{
		fscanf(ArchivoDeEntrada, "%d", &OppOpi[i]); 
	}

	OpiNoOpp = new int[InN];
	for(int i=0; i<InN; i++)
	{
		fscanf(ArchivoDeEntrada, "%d", &OpiNoOpp[i]); 
	}

	char * asiAct = new char[C*P];
	fscanf(ArchivoDeEntrada, "%s", asiAct); 
	asignacionesActuales = (string)asiAct;

	char * asiEnSub = new char[C];	
	fscanf(ArchivoDeEntrada, "%s", asiEnSub); 
	EnSubDivisiones = (string)asiEnSub;

	char * reser = new char[C];
	fscanf(ArchivoDeEntrada, "%s", reser); 
	Reservado = (string)reser;

	char * inut = new char[C];
	fscanf(ArchivoDeEntrada, "%s", inut); 
	Reservado = (string)reser;

	fscanf(ArchivoDeEntrada, "%d", &BandaDeFrecuencia); 
	fscanf(ArchivoDeEntrada, "%d", &RangoDeFrecuencia); 
	fscanf(ArchivoDeEntrada, "%d", &Sep); 
	fscanf(ArchivoDeEntrada, "%d", &Tope); 
	fscanf(ArchivoDeEntrada, "%d", &tipoAsignacionGeografica); 
	fscanf(ArchivoDeEntrada, "%d", &idAsignacionGeografica); 
	fclose(ArchivoDeEntrada);

}

int main(int argc, char* argv[])
{
	string nombreArchivoEntrada="";
	string nombreArchivoSalida="";
	

	try{
		for(int i=1; i<argc; i+=2){
			string aux = string(argv[i]);
			
		
			if(aux==string("-i"))
			{
				nombreArchivoEntrada = string(argv[i+1]);
			}
			
			if(aux==string("-o"))
			{
				nombreArchivoSalida = string(argv[i+1]);				
			}
			
			if(aux==string("-t"))
			{
				tiempoEjecucion = atoi(argv[i+1]);				
			}
			if(aux==string("-s"))
			{
				numeroSoluciones = atoi(argv[i+1]);				
			}		
				
					
			if(aux==string("-pb"))
			{
				pesoNumeroBloques=atoi(argv[i+1]);
				
			}
			
			if(aux==string("-pn"))
			{
				pesoNumeroCanalesInutilizados=atoi(argv[i+1]);
				
			}
			
			if(aux==string("-pd"))
			{
				pesoDiferenciaMaxBloqueLibre=atoi(argv[i+1]);
			}
			
			if(aux==string("-n"))
			{
				numeroDeVecesEjecuta=atoi(argv[i+1]);
			}	
					
			if(aux==string("-p"))
			{
				totalPoblacion=atoi(argv[i+1]);
			}
			
			if(aux==string("-ec"))
			{
				probabilidadCruce=(double)atoi(argv[i+1])/100;
			}
				
			if(aux==string("-em"))
			{
				probabilidadMutacion=(double)atoi(argv[i+1])/100;
			}				
		}
	}
	catch(...)
	{
			cout << "Problema al leer los argumentos de entrada" << endl;
	}

	leerArchivo(nombreArchivoEntrada);

	FILE * ArchivoDeSalida;
	ArchivoDeSalida = fopen(nombreArchivoSalida.c_str(), "w");	
	
	//scanf(ArchivoDeEntrada,"%d",&numeroVariables);
	
	vector<string> poblacion;
	vector <pair<string,pair<int, vector<int> > > > poblacionFinalConCostos;
	vector <int> numeroGeneracionesPorIteracion;
	
	srand ( time(NULL) );
	for(int veces=0; veces<numeroDeVecesEjecuta; veces++)
	{
		//Generar poblacion inicial
		for(int i=0; i<totalPoblacion; i++)
		{
			string individuo = "";
			for(int j=0; j<C*N; j++)
			{
				int aux = rand()%2;			
				string s;
				stringstream out;
				out << aux;
				individuo+=out.str();
			}						
			poblacion.push_back(individuo);
				
		}
		
		//Iterar
		bool detener = false;
		clock_t t_ini, t_fin;
		
		t_ini = clock();
		
		
		while(!detener)
		{
			//Funcion aptitud
			vector <pair<string, int> > funcionEvaluacion;
			
			for(unsigned int j=0; j<poblacion.size(); j++)
			{
				string individuo = poblacion.at(j);
				
				int aptitudPorIndividuo = C*1000*(calcularInfraccionesARestricciones(individuo)+1)+calcularCostos(individuo).at(3);
				//int aptitudPorIndividuo = (calcularInfraccionesARestricciones(individuo));
				funcionEvaluacion.push_back(pair<string,int>(poblacion.at(j),aptitudPorIndividuo));
			}
			sort(funcionEvaluacion.begin(),funcionEvaluacion.end(),ordenar);

			vector <pair<string, double> > funcionAptitud;

			int max = funcionEvaluacion.at(funcionEvaluacion.size()-1).second;

			for(unsigned int j=0; j<funcionEvaluacion.size(); j++)
			{
				funcionAptitud.push_back(pair<string,double>(funcionEvaluacion.at(j).first,(double)funcionEvaluacion.at(j).second/max));
			}
			//Calcular media
			double media = 0.;
			for(unsigned int j=0; j<funcionAptitud.size(); j++)
			{
				media += (double)funcionAptitud.at(j).second;
			}
				
			media/=poblacion.size();
			double desviacion = 0.;
			for(unsigned int j=0; j<funcionAptitud.size(); j++)
			{
				desviacion += (double)pow(media-funcionAptitud.at(j).second,2.);
			}
					
			desviacion/=(funcionAptitud.size()-1);
			desviacion = sqrt(desviacion);
			//Sigma
			double sigma = media + 1.5*desviacion;
			
			//Selección individuos cuya desviación estándar con sigma truncation de un solo lado
			vector<string> individuosParaCruce;		
		
			for(unsigned int j=0; j<funcionAptitud.size(); j++)
			{
				if(funcionAptitud.at(j).second>sigma) break;
				else individuosParaCruce.push_back(funcionAptitud.at(j).first);
			}		
			//Cruce	
				
			vector<string> hijos;
			
			for(unsigned i=0; i<individuosParaCruce.size(); i=i+2)
			{
				double generarCruce = rand() / (double)RAND_MAX;

				if(generarCruce<=probabilidadCruce && (i+1)<individuosParaCruce.size())
				{
					int numeroHijo1 = 0;
					
					double porcentajeHijos = rand() / (double)RAND_MAX;
					numeroHijo1 = N*C*porcentajeHijos;
					
					if(numeroHijo1 == 0) numeroHijo1++;				
					if(numeroHijo1 == N*C) numeroHijo1--;					

					string hijo1 = individuosParaCruce.at(i).substr(0,numeroHijo1)+individuosParaCruce.at(i+1).substr(numeroHijo1,C*N);	
					string hijo2 = individuosParaCruce.at(i).substr(numeroHijo1,C*N)+individuosParaCruce.at(i+1).substr(0,numeroHijo1);				
					hijos.push_back(hijo1);
					hijos.push_back(hijo2);
				}
			}
			//Mutación
			for(unsigned int i=0; i<hijos.size(); i++)
			{
				double probabilidadCalculada = rand() / (double)RAND_MAX;
				
				if(probabilidadCalculada <= probabilidadMutacion)
				{
					int posicionMuta = rand() %(C*N);
					string mutar = hijos.at(i);
					
					char elemento = mutar.at(posicionMuta);
					
					if(elemento=='1') elemento = '0';
					else elemento = '1';
					mutar[posicionMuta]=elemento;
					hijos[i]=mutar;	
					
				}
			}
			 
			/*
			 * Reemplazo por inserción se reemplazan peores padres por hijos
			 */

			poblacion.clear();
			
			//Se ingresan los hijos
			for(unsigned int i=0; i<hijos.size(); i++)
			{
				poblacion.push_back(hijos.at(i));
			}
			
			//En los espacios resultantes se ingresan los mejores padres
			for(unsigned int i=hijos.size(); i<(unsigned)totalPoblacion; i++)
			{
				poblacion.push_back(funcionEvaluacion.at(i-hijos.size()).first);
			}
			
			t_fin = clock();
			secs = (double)(t_fin - t_ini) / CLOCKS_PER_SEC;
			if(secs>tiempoEjecucion) detener=true;			

		}				
	
		for(unsigned int j=0; j<poblacion.size(); j++)
		{
			string individuo = poblacion.at(j);
			
			int infracciones = calcularInfraccionesARestricciones(individuo);
			poblacionFinalConCostos.push_back(pair<string,pair<int,vector <int> > >(poblacion.at(j),pair<int,vector <int> >(infracciones,calcularCostos(individuo))));
		}		
	}
	sort(poblacionFinalConCostos.begin(),poblacionFinalConCostos.end(),ordenarFinal);
	
	fprintf(ArchivoDeSalida,"<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n");
	fprintf(ArchivoDeSalida,"<solutions authorXML=\"Carlos Andrés Delgado Saavedra\" >\n");
	

	fprintf(ArchivoDeSalida,"\t<head solution=\"noOptima\">\n");
	fprintf(ArchivoDeSalida,"%s%d%s","\t\t<geograficAssignationType>",tipoAsignacionGeografica,"</geograficAssignationType>\n");
	fprintf(ArchivoDeSalida,"%s%d%s","\t\t<geograficAssignationID>",idAsignacionGeografica,"</geograficAssignationID>\n");
	fprintf(ArchivoDeSalida,"%s%d%s","\t\t<frequencyBand>",BandaDeFrecuencia,"</frequencyBand>\n");
	fprintf(ArchivoDeSalida,"%s%d%s","\t\t<frequencyRank>",RangoDeFrecuencia,"</frequencyRank>\n");
	fprintf(ArchivoDeSalida,"%s%d%s","\t\t<channelsNumber>",C,"</channelsNumber>\n");
	fprintf(ArchivoDeSalida,"%s%d%s","\t\t<operatorsNumber>",N,"</operatorsNumber>\n");
	fprintf(ArchivoDeSalida,"%s%d%s","\t\t<channelSeparation>",Sep,"</channelSeparation>\n");
	fprintf(ArchivoDeSalida,"%s%d%s","\t\t<numberOperatorPerChannel>",1,"</numberOperatorPerChannel>\n");
	fprintf(ArchivoDeSalida,"%s%s%s","\t\t<considerTop>","true","</considerTop>\n");
	fprintf(ArchivoDeSalida,"%s%s%s","\t\t<staticAssignation>","true","</staticAssignation>\n");
	fprintf(ArchivoDeSalida,"%s%s%s","\t\t<considerSeparation>","true","</considerSeparation>\n");
	fprintf(ArchivoDeSalida,"%s%d%s","\t\t<numSolutions>",numeroSoluciones,"</numSolutions>\n");
	fprintf(ArchivoDeSalida,"%s%f%s","\t\t<executionTime>",secs,"</executionTime>\n");
	fprintf(ArchivoDeSalida,"\t</head>\n");
		
	for(int i=0; i<numeroSoluciones; i++)
	{
		fprintf(ArchivoDeSalida,"%s%d%s","\t<solution id=\"",i,"\">\n");
		
		fprintf(ArchivoDeSalida,"%s","\t\t<costs>\n");		
		fprintf(ArchivoDeSalida,"%s%d%s","\t\t\t<violations>",poblacionFinalConCostos.at(i).second.first,"</violations>\n");
		fprintf(ArchivoDeSalida,"%s%d%s","\t\t\t<blocksNumber>",poblacionFinalConCostos.at(i).second.second.at(0),"</blocksNumber>\n");
		fprintf(ArchivoDeSalida,"%s%d%s","\t\t\t<difChannelNumberMaxBlockFree>",poblacionFinalConCostos.at(i).second.second.at(1),"</difChannelNumberMaxBlockFree>\n");
		fprintf(ArchivoDeSalida,"%s%d%s","\t\t\t<channelNumberUseless>",poblacionFinalConCostos.at(i).second.second.at(2),"</channelNumberUseless>\n");
		fprintf(ArchivoDeSalida,"%s%d%s","\t\t\t<totalCost>",poblacionFinalConCostos.at(i).second.second.at(3),"</totalCost>\n");
		fprintf(ArchivoDeSalida,"%s","\t\t</costs>\n");
	
		fprintf(ArchivoDeSalida,"%s","\t\t<report>\n");		
	
		for(int j=0; j<N; j++)
		{
			fprintf(ArchivoDeSalida,"%s%d%s","\t\t\t<operator name=\"",Opt[j],"\">\n");	
			fprintf(ArchivoDeSalida,"%s","\t\t\t\t<channels>\n");	
			for(int k=C*j; k<C+C*j; k++)
			{
				fprintf(ArchivoDeSalida,"%s%d%s","\t\t\t\t\t<channel ID=\"",k-C*j,"\"> ");	
				fprintf(ArchivoDeSalida,"%c",poblacionFinalConCostos.at(i).first.at(k));
				fprintf(ArchivoDeSalida,"%s"," </channel>\n");	
			}
			fprintf(ArchivoDeSalida,"%s","\t\t\t\t</channels>\n");	
			fprintf(ArchivoDeSalida,"%s","\t\t\t</operator>\n");		
		}
		fprintf(ArchivoDeSalida,"%s","\t\t</report>\n");
		fprintf(ArchivoDeSalida,"%s","\t</solution>\n");		
		
	}	
	fprintf(ArchivoDeSalida,"%s","</solutions>\n");		

	fclose(ArchivoDeSalida);
	return 0;
}
