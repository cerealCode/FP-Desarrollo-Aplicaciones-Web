
package tarea01;

/**
 * Ejercicio 2. Operaciones con constantes y variables.
 *
 * @author Luis Fernández Vidal
 */
public class Ejercicio02 {

    public static void main(String[] args) {

        //---------------------------------------------
        //          Declaración de variables 
        //----------------------------------------------
        // Constantes
        final double CONSTANTE1 = 80.3;
        final int CONSTANTE2 = 3;

        // Variables de entrada
        
        // Variables de salida
        
        // Variables auxiliares
        boolean valorBool;
        byte enteroByte;
        short enteroShort;
        int enteroInt, producto;
        long enteroLong;
        double decimalDoble;
        float decimalSimple;

        //----------------------------------------------
        //                Entrada de datos 
        //----------------------------------------------
        // No hay entrada de datos
        System.out.println("OPERACIONES CON CONSTANTES Y VARIABLES.");
        System.out.println("---------------------------------------");
        System.out.println(" ");

        //----------------------------------------------
        //     Procesamiento 
        //----------------------------------------------
        
        //----------------------------------------------
        // Ejemplos que se proporcionan como modelo:
        
        // Las variables booleanas solo pueden tener los valores true o false
        // valorBool = 0;
        
        // decimalSimple = 9.9 * 4.6;       
        // SOLUCIÓN: CASTING EXPLÍCITO
        decimalSimple = (float) (9.9 * 4.6);

        // CASTING IMPLÍCITO: de tipo char a tipo int
        enteroInt = 'a';
        //----------------------------------------------
        // Incorrecto: Tanto los double, long o  float se usa el punto para expresar los decimales. Se podría reasignar a otra variable String usando el método String.valueOf(decimalDouble) de la clase String de la API de Java
        //decimalDoble = 5,17;
        decimalDoble = 5.17;
        
        //Correcto, para mejorar la legibilidad los números largos pueden representarse con guines bajos que no afecta a la compilación
        enteroLong = 25_369L;
        //INCORRECTO:  Producto sólo puede almacenar valores int. Se debe castear a int el resultado de la multiplicación, por lo que se debe hacer con paréntesis 
        //para que no se pierda precisión en el resultado si el valor enteroLong fuera demasiado  grande para un int
        //producto = enteroLong * enteroInt;
        //CASTING EXPLICITO:  Del resulltado de multiplicar un long y un int
        producto = (int) (enteroLong * enteroInt);
        
       //INCORRETO valorBool = (97 == CTO: No se pueden contenar comparaciones, por lo que valorBool = (97 == (int) 'a' == 97); tampoco sería correcto
       //valorBool = (97 == 'a' == 97);
       //Casting  explicito de "a" a int (valor Unicode)
       valorBool = (97 == (int) 'a');
       
       //INCORRECTO: Las constantes se han declarado como final y no se puede reasignar su valor
        CONSTANTE1 = 100.3;
        
        //INCORRETO: Se debe castear 'c'  (sea char o String) para poder asignarlo a decimalCimple que es un float
       //decimalSimple = 'c';
       //Casting  explicito de "c" a float (valor Unicode)
        decimalSimple = (float) 'c';
        
        //CORRECTO: Ambos son double
        decimalDoble = 3.2 * 4.7;
        
        //INCORRECTO: Los literales en Java se interpretan como double. Se debe castear a float el resultado de la multiplicación, por lo que se debe hacer con paréntesis para que no se aplique sólo al primer literal
        //decimalSimple = 9.9 * 4.6;
        // Cating explícito a float del resultado de la multiplicación
        decimalSimple = (float) (9.9 * 4.6);
        
        //IINCORRECTO: `CONSTANTE1` es `double` y `producto` es `int`.
        //producto = CONSTANTE1 * CONSTANTE2;
        //Casting a int explícito del resultado de la multiplicación como en el ejemplo anterior
        producto = (int) (CONSTANTE1 * CONSTANTE2);
        //CORRECTO: Casting implícito de float a double sin pérdida de precisión
        decimalDoble = 5.67F;
        //CORRECTO: Casting implícito de 8 (int) a double sin pérdida de precisión
        decimalDoble = 8;

        //No se si es correcto o no, el resultado será 0 o 1, ya siendo enteroInt un int Java redondeará al valor más cercano y en este caso es 0.5. 
        //La asignación no da errores, pero pierde por completo la precisión
        enteroInt = 1 / 2;
        
    }
}
