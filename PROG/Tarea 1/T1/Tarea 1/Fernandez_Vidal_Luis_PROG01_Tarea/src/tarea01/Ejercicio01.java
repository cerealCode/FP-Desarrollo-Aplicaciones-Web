package tarea01;

import java.util.Scanner;

/**
 * Ejercicio 1. Cálculos aritméticos.
 *
 * @author Luis Fernández Vidal
 */
public class Ejercicio01 {
    
    // Definición del enum
    enum Operaciones {OPERACION_1, OPERACION_2, OPERACION_3}

    public static void main(String[] args) {

        //----------------------------------------------
        //          Declaración de variables 
        //----------------------------------------------
        // Variables de entrada
        double x, y, z;
        
        // Variables de salida
        double expre1, expre2, expre3;

        // Clase Scanner para petición de datos de entrada
        Scanner teclado = new Scanner(System.in);

        //----------------------------------------------
        //                Entrada de datos 
        //----------------------------------------------
        System.out.println("CÁLCULOS ARITMÉTICOS");
        System.out.println("--------------------");
        System.out.println("Introduce el valor de X,  Y y Z para realizar las operaciones");
        System.out.println("Introduce el valor de X");
        x = teclado.nextDouble();
        System.out.println("Introduce el valor de Y");   
        y = teclado.nextDouble();
        System.out.println("Introduce el valor de Z");
        z = teclado.nextDouble();
        

        //----------------------------------------------
        //                 Procesamiento 
        //----------------------------------------------
        // Primera expresión
        expre1 = x / 3.0 + 8.0;
        
        
        // Segunda expresión
        expre2 = ((x * x) / (y * y))  + ((y * y) / (z * z));
        
        // Tercera expresión
        expre3 = ((x * x) + (3 * (x * y)) + (y * y))/ (1/(x * x));
        
        //----------------------------------------------
        //              Salida de resultados 
        //----------------------------------------------
        System.out.println();
        System.out.println("RESULTADO");
        System.out.println("---------");
        System.out.println(Operaciones.OPERACION_1 + " : " + expre1);
        System.out.println(Operaciones.OPERACION_2 + " : " + expre2);
        System.out.println(Operaciones.OPERACION_3 + " : " + expre3);
        
        //Cerrar clase Scanner
        teclado.close();
    }
}
