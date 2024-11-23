package tarea03;

import libtarea3.Aeropuerto;
import libtarea3.Aeronave;
import java.time.LocalDateTime;
import java.time.format.DateTimeFormatter;

// ------------------------------------------------------------
// ------------------------------------------------------------
//                   Clase Controlador
// ------------------------------------------------------------
/**
 * <p>
 * Clase que representa al <strong>controlador</strong>, que será la clase que
 * utilizaremos y donde se escribirán las diferentes operaciones en aeronaves y
 * aeropuertos que se nos pide en el enunciado de la tarea.</p>
 *
 * @author Luis Fernandez Vidal
 */
public class Controlador {

    public static void main(String[] args) {

        //----------------------------------------------
        //          Declaración de variables 
        //----------------------------------------------
        // Formato de fecha y hora usando LocalDateTime y DateTimeFormatter
        DateTimeFormatter formatoFecha = DateTimeFormatter.ofPattern("dd/MM/yyyy HH:mm:ss");
        String fechaHoraDespegue = LocalDateTime.now().format(formatoFecha);

        //----------------------------------------------
        //          Creación de objetos
        //----------------------------------------------
        // Instanciar los 3 aeropuertos: Barcelona, Madrid, Granada.
        System.out.println("------------------------------------------------");
        System.out.println("-----------Creando Aeropuertos------------");
        System.out.println("------------------------------------------------");
        
            // Intento de creacion aeropuertos
        Aeropuerto areropuertoBarcelona = new Aeropuerto("El Prat", "Barcelona");
        Aeropuerto aeropuertoMadrid = new Aeropuerto("Barajas", "Madrid");
        Aeropuerto aeropuertoGranada = new Aeropuerto("Federico García Lorca", "Granada");
        System.out.println("***Aeropuertos creados***");

        // Instanciar las 3 aeronaves: avion1, avion2, Avion3.

        Aeronave avion1 = new Aeronave();
        Aeronave avion2 = new Aeronave("EC-123", "Boing747");
        Aeronave avion3 = new Aeronave("EC-456", "Boing787", aeropuertoMadrid);
        

        //----------------------------------------------
        //   Inicio de la secuencia de instrucciones
        //----------------------------------------------
        //Avion1 despega con velocidad 1500, altitud 1750, rumbo 50 y fechaHora actual
        try {
            // Intento de despegue
            avion1.despegar(1500, 1750, 50, fechaHoraDespegue);
            System.out.println("El Avión 1 ha despegado.");
        } catch (IllegalStateException e) {
            System.out.println("Error: El Avión 1 ya ha despegado previamente.");
        } catch (IllegalArgumentException e) {
            System.out.println("Error: Parámetros inválidos para el despegue del Avión 1.");
        }

        //Avion2 despega con velocidad 1500, altitud 1850 y rumbo 75
        try {
            // Intento de despegue
            avion2.despegar(1500, 1850, 75, fechaHoraDespegue);
            System.out.println("El Avión 2 ha despegado.");
        } catch (IllegalStateException e) {
            System.out.println("Error: El Avión 2 ya está volando.");
        } catch (IllegalArgumentException e) {
            System.out.println("Error: Parámetros inválidos para el despegue del Avión 2.");
        }

        //Avion3 despega con velocidad 1500, altitud 1000 y rumbo 180
        try {
            // Intento de despegue
            avion3.despegar(1500, 1000, 180, fechaHoraDespegue);
            System.out.println("El Avión 3 ha despegado.");
        } catch (IllegalStateException e) {
            System.out.println("Error: El Avión 3 ya está volando.");
        } catch (IllegalArgumentException e) {
            System.out.println("Error: Parámetros inválidos para el despegue del Avión 3.");
        }

        //Comprobar si avion1 está volando
        avion1.isVolando();
        System.out.printf("¿El Avión 1 está volando? %b %n", avion1.isVolando());

        //Mostrar la matrícula del avion2
        System.out.printf("Matrícula del Avión 2: %s %n", avion2.getMatricula());

        //Mostrar modelo del Avion3
        System.out.printf("Modelo del Avión 3: %s %n", avion3.getModelo());

        //Modificar rumbo del avion2 a 90º y mostrarlo
        avion2.setRumbo(90);
        System.out.printf("El rumbo del avión 2 es:%d %n%n", avion2.getRumbo());

        //Avion3 aterriza en el aeropuerto de Barcelona despues de 75 minutos
        avion3.aterrizar(areropuertoBarcelona, 75);
        System.out.printf("El Avión 3  ha aterrizado%n%n");

        //Avion2 aterriza en el aeropuerto de Madrid despues de 80 minutos
        avion2.aterrizar(aeropuertoMadrid, 80);
        System.out.printf("El Avión 2 ha aterrizado en Madrid %n%n");

        //Comprobar si avion2 está volando
        System.out.printf("¿El Avión 2 está volando? %b%n ", avion2.isVolando());

        //Modificar altitud del avion1 a 1250 metros y mostrarlo
        avion1.setAltitud(1250);
        System.out.printf("La nueva altitud del Avión 1 es de: %d%n", avion1.getAltitud());

        //Mostrar el tiempo total de vuelo del avion2
        System.out.printf("El tiempo de vuelo del Avión 2 en minutos  es de: %d%n", avion2.getTiempoTotalVuelo());

        //Mostrar el aeropuerto del Avion3
        System.out.printf("El Avión 3 se encuentra en el Aeropuerto %s%n", avion3.getAeropuerto());

        //Mostrar la fecha y hora de despegue del avion1
        System.out.printf("La fecha y hora de despegue del Avión 1 es de: %s%n", avion1.getFechaHoraDespegue());

        //Avion3 despega con velocidad 860, altitud 1420 y rumbo 270
        avion3.despegar(860, 1420, 270, fechaHoraDespegue);
        System.out.println("El avión ha despegado.");

        //Avion1 aterriza en el aeropuerto de Granada despues de 260 minutos
        avion1.aterrizar(aeropuertoGranada,260);
        System.out.printf("El Avión 1 ha aterrizado en Granada %n%n");
        
        //Modificar velocidad del Avion3 a 950km/h y mostrarlo
        avion3.setVelocidad(950);
        System.out.printf("");
                
                
                
                
                
        //Mostrar el nombre del aeropuerto de Madrid
        System.out.printf("El aeropuerto de Madrid se llama: %s %n", aeropuertoMadrid.getNombre());
        //Mostrar el número de aeronaves en este momento en el aeropuerto de Granada
        System.out.printf("El número de aviones en el aeropuerto de Granada es de %d %n", aeropuertoGranada.getNumeroAeronaves());
        //Mostrar toda la información del avion1
        System.out.printf("La información del Avión 1 es: %s %n ", avion1);
        
        //Mostrar toda la información del avion2
        System.out.printf("La información del Avión 2 es: %s %n ", avion2);
        //Mostrar toda la información del Avion3
        System.out.printf("La información del Avión 3 es: %s %n ", avion3);
        
        
        
//        
//        //----------------------------------------------
//        //          Llamadas a métodos estáticos
//        //----------------------------------------------
        //Mostrar el número total de aeronaves volando ahora mismo
        System.out.printf("El número total de aviones volando es de: %d %n", Aeronave.getNumAeronavesVolando());
        //Mostrar el tiempo total de aeronaves volando en horas
        System.out.printf("El número total de horas de vuelo es de: %f %n", Aeronave.getNumHorasVuelo());
        //Mostrar el número total de aeronaves
        System.out.printf("El número total de aeronaves: %d %n", Aeronave.getNumAeronaves());
    }
}
