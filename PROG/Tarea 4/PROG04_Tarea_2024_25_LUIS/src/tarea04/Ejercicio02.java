/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package tarea04;

import java.util.Scanner;  // Para lectura de entrada del usuario
import java.util.regex.Pattern;  // Para validación de cadenas mediante expresiones regulares

/**
 * Ejercicio 2. Rotar matrices cuadradas.
 * Este programa permite al usuario crear una matriz cuadrada de NxN elementos
 * y la rota 90 grados en sentido horario. El proceso incluye:
 * 1. Solicitar y validar la primera fila para determinar el tamaño de la matriz
 * 2. Solicitar el resto de filas validando que coincidan en tamaño
 * 3. Rotar la matriz resultante 90 grados
 * 4. Mostrar tanto la matriz original como la rotada
 *
 * @author Luis Fernández Vidal
 */
public class Ejercicio02 {

    public static void main(String[] args) {

        //----------------------------------------------
        //          Declaración de variables 
        //----------------------------------------------
        // Constantes
        // Patrón regex que acepta letras, números y comas
        // ^ inicio de cadena, $ fin de cadena
        // [a-zA-z0-9,]+ una o más ocurrencias de letras, números o comas
        final String PATRON = "^[a-zA-z0-9,]+$";

        // Variables de entrada
        String stringOriginal;    // Almacena la entrada del usuario para cada fila

        // Variables de salida
        String[][] matrizRotada;    // Almacenará la matriz después de rotarla 90 grados

        // Variables auxiliares
        String[] primeraFila;        // Array para almacenar los elementos de la primera fila
        String[][] matriz;           // Matriz original que construiremos
        String fila;                 // Almacena temporalmente cada fila introducida
        String[] elementosFila;      // Array temporal para procesar elementos de cada fila
        Boolean filaValida;          // Control de validación de entrada

        // Clase Scanner para petición de datos de entrada
        Scanner teclado = new Scanner(System.in);

        //----------------------------------------------
        //      Entrada de datos y procesamiento
        //----------------------------------------------
        System.out.println("Ejercicio 2. Rotar matrices cuadradas.");
        System.out.println("--------------------------------------");
        System.out.println("Vamos a rotar matrices cuadradas 90º");

        // Bucle de validación para la primera fila - determina el tamaño de la matriz
        do {
            System.out.println("Introduce los valores de la primera fila separados por comas");

            // Leemos y eliminamos espacios en blanco al inicio y final
            stringOriginal = teclado.nextLine().trim();

            // Validamos que la entrada cumpla con el patrón establecido
            filaValida = Pattern.matches(PATRON, stringOriginal);

            if (!filaValida) {
                System.out.println("Introduce una cadena de letras y números separados por una coma");
            }
        } while (!filaValida);

        // Dividimos la cadena en elementos usando la coma como separador
        primeraFila = stringOriginal.split(",");

        // Validación del tamaño de la matriz
        if (primeraFila.length < 2) {
            System.out.println("Error: Las matrices de 0x0 o 1x1 no son rotables");
        } else {
            System.out.println("Vamos a trabajar con una matriz de " + primeraFila.length + " x " + primeraFila.length);
        }

        // Inicializamos la matriz con el tamaño determinado por la primera fila
        matriz = new String[primeraFila.length][primeraFila.length];

        // Almacenamos los elementos de la primera fila en la matriz
        for (int i = 0; i < primeraFila.length; i++) {
            matriz[0][i] = primeraFila[i].trim();
        }

        // Procesamiento del resto de filas
        for (int i = 1; i < primeraFila.length; i++) {
            // Bucle de validación para cada fila subsiguiente
            do {
                System.out.println("Introduce " + primeraFila.length + " elementos para la fila " + (i + 1));
                fila = teclado.nextLine().trim();
                
                //Si la fila contiene caracteres no permitidos, paramos la ejecucion del programa con status 0 pq no es necesario aplicar niguna lógica despues
                if (!filaValida) {
                    System.out.println("Algunos de los caracteres introducidos no son válidos. Saliendo del programa...");
                    System.exit(0);
                }
                
                elementosFila = fila.split(",");
                
                // Verificamos que la fila tenga el número correcto de elementos
                if (elementosFila.length != primeraFila.length) {
                    System.out.println("Error: La fila debe tener " + primeraFila.length + " elementos. Introduce una cadena correcta");
                    //Si la longitud no es correcta, decrementamos el index para volver a pedir la entrada
                    i--;
                }

            } while (!filaValida);

            // Almacenamos los elementos validados en la matriz
            for (int j = 0; j < elementosFila.length; j++) {
                matriz[i][j] = elementosFila[j].trim();
            }
        }

        // Liberamos recursos del Scanner
        teclado.close();

        // Rotación de la matriz 90 grados
        // Creamos una nueva matriz para almacenar el resultado
        matrizRotada = new String[primeraFila.length][primeraFila.length];
        // La rotación se realiza invirtiendo filas y columnas y ajustando índices
        for (int i = 0; i < matriz.length; i++) {
            for (int j = 0; j < matriz.length; j++) {
                // La fórmula matriz.length - 1 - i invierte el orden de las filas
                matrizRotada[j][matriz.length - 1 - i] = matriz[i][j];
            }
        }

        //----------------------------------------------
        //              Salida de resultados 
        //----------------------------------------------
        System.out.println();
        System.out.println("RESULTADO");
        System.out.println("---------");

        // Mostramos la matriz original
        System.out.println("Matriz Original:");
        for (String[] elementos : matriz) {
            for (int j = 0; j < matriz.length; j++) {
                System.out.print(elementos[j] + " | ");
            }
            System.out.println();  // Nueva línea al final de cada fila
        }

        // Mostramos la matriz rotada
        System.out.println("Matriz rotada 90º:");
        for (String[] elementosRotados : matrizRotada) {
            for (int j = 0; j < matrizRotada.length; j++) {
                System.out.print(elementosRotados[j] + " | ");
            }
            System.out.println();  // Nueva línea al final de cada fila
        }
    }
}