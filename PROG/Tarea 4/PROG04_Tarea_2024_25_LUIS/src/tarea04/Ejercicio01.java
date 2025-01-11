/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package tarea04;

import java.util.Scanner;  // Importamos Scanner para lectura de entrada del usuario
import java.util.regex.Pattern;  // Importamos Pattern para validación de cadenas mediante regex

/**
 * Ejercicio 1. Comprimir cadenas.
 * Este programa implementa un algoritmo de compresión básica de cadenas de texto.
 * La compresión se realiza contando caracteres consecutivos repetidos y 
 * reemplazándolos por el carácter seguido del número de repeticiones.
 * Por ejemplo: "aaa" -> "a3", "aabbb" -> "a2b3"
 * Si la cadena comprimida no es más corta que la original, se mantiene la original.
 *
 * @author Luis Fernández Vidal
 */
public class Ejercicio01 {

    public static void main(String[] args) {

        //----------------------------------------------
        //          Declaración de variables 
        //----------------------------------------------
        // Constantes
        // Patrón que solo permite letras de la A a la Z (sin Ñ)
        final String PATRON = "^[a-zA-z]+$";

        // Variables de entrada
        String cadenaOriginal;    // Almacena la cadena introducida por el usuario

        // Variables de salida
        String cadenaComprimida = "";    // Almacena el resultado de la compresión

        // Variables auxiliares
        boolean cadenaValida;    // Control de validación de la entrada
        int contador;            // Contador de caracteres consecutivos iguales

        // Clase Scanner para petición de datos de entrada
        Scanner teclado = new Scanner(System.in);    

        //----------------------------------------------
        //                Entrada de datos 
        //----------------------------------------------
        // Mostramos el título del programa
        System.out.println("Ejercicio 1. Comprimir cadenas.");
        System.out.println("-------------------------------");

        //----------------------------------------------
        //                 Procesamiento 
        //----------------------------------------------
        // Bucle do while para validación de entrada, repite la petición informando al usuario hasta que se introduce cadena valida
        do {
            // Solicitamos la entrada al usuario con instrucciones claras
            System.out.println("Introduce una cadena de caractéres de la A a la Z, puede ser mayúsculas o minúsculas pero no incluir ni números ni la letra Ñ");
            cadenaOriginal = teclado.nextLine();    // Leemos la línea completa incluyendo espacios
            // Verificamos si la cadena cumple con el patrón definido
            cadenaValida = Pattern.matches(PATRON, cadenaOriginal);

            // Si la cadena no es válida, mostramos mensaje de error
            if (!cadenaValida) {
                System.out.println("Error, la cadena sólo puede contener caractéres de la A a la Z, puede ser mayúsculas o minúsculas pero no incluir ni números ni la letra Ñ");
            }

        } while (!cadenaValida);    // Repetimos mientras la entrada no sea válida

        // Caso especial: si la cadena tiene 0 o 1 caracteres, no necesita compresión
        if (cadenaOriginal.length() <= 1) {
            cadenaComprimida = cadenaOriginal;
        } else {
            // Proceso de compresión para cadenas de 2 o más caracteres
            //i actúa como puntero de inicio para cada secuencia de caracteres iguales
            for (int i = 0; i < cadenaOriginal.length(); i++) {
                contador = 1;    // Inicializamos el contador para cada nueva secuencia
                //j actúa como puntero de recorrido para contar caracteres iguales consecutivos
                // Continuamos mientras no lleguemos al final y encontremos caracteres iguales
                for (int j = i + 1; j < cadenaOriginal.length() && cadenaOriginal.charAt(j) == cadenaOriginal.charAt(i); j++) {
                    contador++;    // Incrementamos el contador por cada carácter igual encontrado
                    i = j;        // Actualizamos i para saltar los caracteres ya contados
                }
                // Añadimos el carácter actual a la cadena comprimida
                cadenaComprimida += cadenaOriginal.charAt(i);
                // Solo añadimos el contador si hay más de una ocurrencia
                if (contador > 1) cadenaComprimida += contador;
            }
        }
        //Cerramos Scanner para evitar perdida de recursos
        teclado.close();

        //----------------------------------------------
        //              Salida de resultados 
        //----------------------------------------------
        System.out.println();
        System.out.println("RESULTADO");
        System.out.println("---------");
        // Comparamos longitudes para decidir qué cadena mostrar
        // Si la compresión no redujo la longitud, mostramos la original
        if (cadenaComprimida.length() >= cadenaOriginal.length()) {
            System.out.println(cadenaOriginal);
        } else {
            // Si la compresión fue efectiva, mostramos la versión comprimida
            System.out.println(cadenaComprimida);
        }
        
    }
}