/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package tarea04;

import java.util.Scanner;
import java.util.regex.Pattern;

/**
 * Ejercicio 2. Rotar matrices cuadradas.
 *
 * @author Luis Fernández Vidal
 */
public class Ejercicio02 {

    public static void main(String[] args) {

        //----------------------------------------------
        //          Declaración de variables 
        //----------------------------------------------
        // Constantes
        final String PATRON = "^[a-zA-z0-9,]+$";

        // Variables de entrada
        String stringOriginal;

        // Variables de salida
        String[][] matrizRotada;

        // Variables auxiliares
        String[] primeraFila;
        String[][] matriz;
        String fila;
        String[] elementosFila;
        Boolean filaValida;

        // Clase Scanner para petición de datos de entrada
        Scanner teclado = new Scanner(System.in);

        //----------------------------------------------
        //      Entrada de datos y procesamiento
        //----------------------------------------------
        System.out.println("Ejercicio 2. Rotar matrices cuadradas.");
        System.out.println("--------------------------------------");
        System.out.println("Vamos a rotar matrices cuadradas 90º");
        do {
            System.out.println("Introduce los valores de la primera fila separados por comas");

            //Pedir datos, limpiar espacios    
            stringOriginal = teclado.nextLine().trim();

            //Validamos el input del usuario para que cumpla las reglas
            filaValida = Pattern.matches(PATRON, stringOriginal);

            //Si no es válido
            if (!filaValida) {
                System.out.println("Introduce una cadena de letras y números separados por una coma");
            }
        } while (!filaValida);
        //Convertir a Array usando el método split, aconsejado en la propia documentación de Java pq Tokenizer esta deprecado
        primeraFila = stringOriginal.split(",");

        //Calcular tamaño matriz
        if (primeraFila.length < 2) {
            System.out.println("Error: Las matrices de 0x0 o 1x1 no son rotables");
        } else {
            System.out.println("Vamos a trabajar con una matriz de " + primeraFila.length + " x " + primeraFila.length);
        }

        //Declarar matriz con nth elementos
        matriz = new String[primeraFila.length][primeraFila.length];

        //Crear primera fila
        for (int i = 0; i < primeraFila.length; i++) {
            matriz[0][i] = primeraFila[i].trim();
        }

        //Crear resto de filas
        for (int i = 1; i < primeraFila.length; i++) {

            do {
                System.out.println("Introduce " + primeraFila.length + " elementos para la fila " + (i + 1));
                fila = teclado.nextLine().trim();
                //Si no es válido
                if (!filaValida) {
                    System.out.println("Introduce una cadena de letras y números separados por una coma");
                }
                elementosFila = fila.split(",");
                // Validar que la fila tiene el número correcto de elementos
                if (elementosFila.length != primeraFila.length) {
                    System.out.println("Error: La fila debe tener " + primeraFila.length + " elementos");
                    i--; // Repetir esta fila
                }

            } while (!filaValida);

            //Guardar items en array bidimensional
            for (int j = 0; j < elementosFila.length; j++) {
                matriz[i][j] = elementosFila[j].trim();
            }
        }
        //Cerramos Scanner para evitar perdida de recursos
        teclado.close();
        //Convertimos las filas en columnas transponiendo j e i
        matrizRotada = new String[primeraFila.length][primeraFila.length];
        for (int i = 0; i < matriz.length; i++) {
            for (int j = 0; j < matriz.length; j++) {
                matrizRotada[j][matriz.length - 1 - i] = matriz[i][j];

            }
        }
        //----------------------------------------------
        //              Salida de resultados 
        //----------------------------------------------
        System.out.println();
        System.out.println("RESULTADO");
        System.out.println("---------");
        System.out.println("Matriz Original:");
        for (String[] elementos : matriz) {
            for (int j = 0; j < matriz.length; j++) {
                System.out.print(elementos[j] + " | ");
            }
            System.out.println();
        }

        // Mostrar matriz rotada
        System.out.println("Matriz rotada 90º:");
        for (String[] elementosRotados : matrizRotada) {
            for (int j = 0; j < matrizRotada.length; j++) {
                System.out.print(elementosRotados[j] + " | ");
            }
            System.out.println();
        }

    }
}
