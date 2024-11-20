package tarea01;

import java.util.Scanner;

/**
 * Ejercicio 3. Validación de contraseñas.
 *
 * @author Indica el nombre del alumno/a
 */
public class Ejercicio03 {

    public static void main(String[] args) {

        //----------------------------------------------
        //          Declaración de variables 
        //----------------------------------------------
        // Variables de entrada
        String contrasenya;
        
        // Variables de salida
        boolean esValida;
        
        // Variables auxiliares
        boolean longitudCorrecta, comienzaConVocal, terminaConConsonante, contieneCaracterEspecial;
        String vocales = "AEIOUaeiou";
        String consonantes = "BCDFGHJKLMNPQRSTVWXYZbcdfghjklmnpqrstvwxyz";
        
        // Clase Scanner para petición de datos de entrada
        Scanner teclado = new Scanner(System.in);

        //----------------------------------------------
        //                Entrada de datos 
        //----------------------------------------------
        System.out.println("VALIDACIÓN DE CONTRASEÑAS");
        System.out.println("-------------------------");
        System.out.print("La contraseña debe tener al menos 12 caracteres, empezar por una vocal, terminar con una consonante y contener algún caracter especial");
        System.out.print("Introduzca la contraseña: ");
        contrasenya = teclado.nextLine();

        

        //----------------------------------------------
        //                 Procesamiento 
        //----------------------------------------------
        
        // Cálculo de información auxiliar previa   
        
        
        // Comprobamos si tiene como mínimo 12 caracteres
        longitudCorrecta =  contrasenya.length() >= 12;
        
        // Comprobamos si comienza por una vocal (mayúscula o minúscula)
        comienzaConVocal = vocales.indexOf(contrasenya.charAt(0)) != -1;
        
        
        // Comprobamos si termina con una consonante (mayúscula o minúscula)
        terminaConConsonante = consonantes.indexOf(contrasenya.charAt(contrasenya.length() - 1)) != -1;
        
        
        // Comprobamos si contiene al menos uno de los caracteres especiales requeridos
        contieneCaracterEspecial = contrasenya.indexOf('@') != -1 ||
                                                   contrasenya.indexOf('#') != -1 ||
                                                   contrasenya.indexOf('_') != -1 ||
                                                   contrasenya.indexOf('.') != -1 ||
                                                   contrasenya.indexOf(';') != -1;
        
        // Comprobamos cumple todos los requisitos de la contraseña
        esValida = longitudCorrecta && comienzaConVocal && terminaConConsonante && contieneCaracterEspecial;
                                                    
        
        //----------------------------------------------
        //              Salida de resultados 
        //----------------------------------------------
        System.out.println();
        System.out.println("RESULTADO");
        System.out.println("---------");
        System.out.println(esValida? "La contraseña  ES VÁLIDA" : "La contraseña NO ES VÁLIDA" );
        //Sugerencias para el usuario que introduzca una contraseña incorrecta
        System.out.println(longitudCorrecta? "" : "La contraseña debe contener al menos diez caracteres" );
        System.out.println(contieneCaracterEspecial? "" : "La contraseña debe contener al menos uno de los siguientes caracteres:  _  ;  @  #" );
        System.out.println(comienzaConVocal? "" : "La contraseña debe empezar con vocal" );
        System.out.println(terminaConConsonante? "" : "La contraseña debe terminar en consonante" );

    }
}
