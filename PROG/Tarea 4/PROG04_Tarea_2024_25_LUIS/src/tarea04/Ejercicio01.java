/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package tarea04;

import java.util.Scanner;
import java.util.regex.Pattern;

/**
 * Ejercicio 1. Comprimir cadenas.
 *
 * @author Luis Fernández Vidal
 */
public class Ejercicio01 {

    public static void main(String[] args) {

        //----------------------------------------------
        //          Declaración de variables 
        //----------------------------------------------
        // Constantes
        final String PATRON = "^[a-zA-z]+$";

        // Variables de entrada
        String cadenaOriginal;

        // Variables de salida
        String cadenaComprimida = "";

        // Variables auxiliares
        boolean cadenaValida;
        int contador;

        // Clase Scanner para petición de datos de entrada
        Scanner teclado = new Scanner(System.in);

        //----------------------------------------------
        //                Entrada de datos 
        //----------------------------------------------
        System.out.println("Ejercicio 1. Comprimir cadenas.");
        System.out.println("-------------------------------");

        //----------------------------------------------
        //                 Procesamiento 
        //----------------------------------------------
        do {
            System.out.println("Introduce una cadena de caractéres de la A a la Z, puede ser mayúsculas o minúsculas pero no incluir ni números ni la letra Ñ");
            cadenaOriginal = teclado.nextLine();
            cadenaValida = Pattern.matches(PATRON, cadenaOriginal);

            if (!cadenaValida) {
                System.out.println("Error, la cadena sólo puede contener caractéres de la A a la Z, puede ser mayúsculas o minúsculas pero no incluir ni números ni la letra Ñ");
            }

        } while (!cadenaValida);

        if (cadenaOriginal.length() <= 1) {
            cadenaComprimida = cadenaOriginal;
        } else {
            //i puntero de inicio
            for (int i = 0; i < cadenaOriginal.length(); i++) {
                contador = 1;
                //j puntero de recorrido
                for (int j = i + 1; j < cadenaOriginal.length() && cadenaOriginal.charAt(j) == cadenaOriginal.charAt(i); j++) {
                    contador++;
                    i = j;
                }
                cadenaComprimida += cadenaOriginal.charAt(i);
                if (contador > 1) cadenaComprimida += contador;
            }
        }

        //----------------------------------------------
        //              Salida de resultados 
        //----------------------------------------------
        System.out.println();
        System.out.println("RESULTADO");
        System.out.println("---------");
        // Si la cadena comprimida es más larga o igual, mostramos la original
        if (cadenaComprimida.length() >= cadenaOriginal.length()) {
            System.out.println(cadenaOriginal);
        } else {
            System.out.println(cadenaComprimida);
        }

    }
}
