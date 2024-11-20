package tarea02;

import java.util.Scanner;

/**
 * Ejercicio 1. SUELDOS DE EMPLEADOS.
 *
 * @author Luis Fernández Vidall
 */
public class Ejercicio01 {

    public static void main(String[] args) {

        //----------------------------------------------
        //          Declaración de variables 
        //----------------------------------------------
        // Constantes
        final double SUELDO_BASE = 1500.00;
        final int NUMERO_PAGAS = 14;

        // Variables de entrada
        int opcion;
        int antiguedadEmpleado1  = 0, antiguedadEmpleado2  = 0, antiguedadEmpleado3 = 0 ;

        // Variables de salida
        double sueldoEmpleadoNuevo, sueldoEmpleado1, sueldoEmpleado2, sueldoEmpleado3;

        //Variables  auxiliares
        int extra1, extra2, extra3;
        
        // Clase Scanner para petición de datos de entrada
        Scanner teclado = new Scanner(System.in);

        //----------------------------------------------
        //                Entrada de datos 
        //----------------------------------------------
        System.out.println("Ejercicio 2: Sueldos de Empleados\n");
        System.out.println("-----------------------------------------");

        // Bloque 1: Sacamos por pantalla el menú de opciones y pedimos que introduzca una.
        // En caso de introducir una opción inválida, debemos indicarlo y volver a pedirla.  
        //Menú de opciones 
        do {
            System.out.println("Menú de opciones");
            System.out.println("1.- Calcular sueldo en función de la antigüedad");
            System.out.println("2.- Calcular coste total en sueldos para la empresa");
            System.out.println("3.- Salir");

            // Elusuario elige una opción
            opcion = teclado.nextInt();

            // Si no ha elegido ninguna de las 3 opciones, mostramos que no es una opción válida
            if (opcion < 1 || opcion > 3) {
                System.out.println("Opción inválida. Por favor, elija una opción válida.");
            }
            //El bucle se repite mientras el usuario no elija una opción entre el 1 y el 3
        } while (opcion < 1 || opcion > 3);
        


        //Opción 1: Se pide la antigüedad de cada empleado
        if (opcion == 1) {
            do {
                System.out.println("Introduce la antigüedad del empleado 1:");
                antiguedadEmpleado1 = teclado.nextInt();

                System.out.println("Introduce la antigüedad del empleado 2:");
                
                antiguedadEmpleado2 = teclado.nextInt();

                System.out.println("Introduce la antigüedad del empleado 3:");
                
                antiguedadEmpleado3 = teclado.nextInt();
                // Si el valor introducido es negativo  se informa al usuario para que introduzca un número positivo
                if (antiguedadEmpleado1 < 0 || antiguedadEmpleado2 < 0 || antiguedadEmpleado3 < 0) {
                    System.out.println("El numero de años no puede ser negativo");
                }
                //Repetimos el bucle hasta que los 3 valores introcidos sean positivos
            } while (antiguedadEmpleado1 < 0 || antiguedadEmpleado2 < 0 || antiguedadEmpleado3 < 0);
        }        

        //----------------------------------------------
        //                 Procesamiento 
        //----------------------------------------------
        // Cuando haya introducido una opción válida, llevamos a cabo la acción oportuna
        //  -Si nos indica 'Salir', nos despedimos y terminamos
        //  -Si nos indica las opciones 1 o 2
        // Realizamos los cálculos oportunos

        //Cálculo de salario por antiguedad
        //Cálculo el extra de cada empleado con un boolean aunque podría usar if-else, es más eficiente el boolean
        extra1 = antiguedadEmpleado1 > 5 ? 100 : 20;
        extra2 = antiguedadEmpleado2 > 5 ? 100 : 20;
        extra3 = antiguedadEmpleado3 > 5 ? 100 : 20;
        sueldoEmpleado1 = SUELDO_BASE + extra1 + (50 * antiguedadEmpleado1); 
        sueldoEmpleado2 = SUELDO_BASE + extra2+ (50 * antiguedadEmpleado2);
        sueldoEmpleado3 = SUELDO_BASE + extra3 + (50 * antiguedadEmpleado3);

        //Calculo Empleado sin antigüedad
        //Sumamos el SUELDO_BASE (1500) más la extra de un empleado sin antigüedad (20) y el resultado se multiplica por el NUMERO_PAGAS (14 pagas)
        sueldoEmpleadoNuevo = (SUELDO_BASE + 20) * NUMERO_PAGAS;
        //----------------------------------------------
        //              Salida de resultados 
        //----------------------------------------------
        
        //Uso un switch para mostrar los resultados de cada opción
        switch (opcion) {
            case 1:
                System.out.println("Los salarios de los empleados sin pagas extra prorrateadas son:");
                System.out.println("El salario del Empleado 1 es de: " + sueldoEmpleado1);
                System.out.println("El salario del Empleado 2 es de: " + sueldoEmpleado2);
                System.out.println("El salario del Empleado 3 es de: " + sueldoEmpleado3);
                break;
            case 2:
                //Cálculo sueldo anual de 14 pagas
                System.out.printf("El salario anual de un empleado sin antigüedad es de: %.2f\n", sueldoEmpleadoNuevo);
                //Cálculo salario mensual con prorrateo, diviendo el sueldo anual de 14 pagas entre 12
                System.out.printf("El salario mensual de un empleado sin antigüedad es de: %.2f\n", (sueldoEmpleadoNuevo / 12));
                break;
            case 3:
                System.out.println("Saliendo del programa...");
                System.exit(0);
            default:
                System.out.println("Opción no válida");
        }
    }
}
