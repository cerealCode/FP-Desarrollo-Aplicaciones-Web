package tarea05;

// ------------------------------------------------------------
//                   Clase Velero
// ------------------------------------------------------------
/**
 * Clase que representa un velero y gestiona sus características y comportamiento
 * Incluye atributos inmutables que definen sus características físicas,
 * así como atributos que gestionan su estado de navegación.
 *
 * @author nombre_apellido_alumno
 */
public class Velero2 {
    // ------------------------------------------------------------------------
    // Atributos estáticos públicos (inmutables)
    // Pueden ser accedidos desde cualquier caso
    // ------------------------------------------------------------------------
    /**
     * Número mínimo de mástiles de un velero: 1.
     */
    public static final int MIN_MASTILES = 1;
    
    /**
     * Número máximo de mástiles de un velero: 4.
     */
    public static final int MAX_MASTILES = 4;
    
    /**
     * Velocidad mínima de navegación (en nudos): 2.
     */
    public static final int MIN_VELOCIDAD = 2;
    
    /**
     * Velocidad máxima de navegación (en nudos): 30.
     */
    public static final int MAX_VELOCIDAD = 30;
    
    /**
     * Nombre del patrón por defecto durante la navegación: "Sin patron".
     */
    public static final String PATRON_POR_DEFECTO = "Sin patron";
    
    /**
     * Rumbo por defecto durante la navegación: "Sin rumbo".
     */
    public static final String RUMBO_POR_DEFECTO = "Sin rumbo";
    
    /**
     * Número mínimo de tripulantes (sin incluir el patrón): 0.
     */
    public static final int MIN_TRIPULANTES = 0;

    // ------------------------------------------------------------------------
    // Atributos estáticos privados (mutables)
    // No dependen de instancias de objetos particulares y sólo pueden 
    // modificarse desde la propia clase
    // ------------------------------------------------------------------------
    private static int barcosCreados = 0;
    private static int barcosNavegando = 0;
    private static double tiempoTotalNavegacion = 0.0;

    // ------------------------------------------------------------------------
    // Atributos de objeto inmutables (privados)
    // Representan el estado del objeto pero no pueden cambiar su valor
    // ------------------------------------------------------------------------
    private final String nombreBarco;
    private final int numMastiles;
    private final int maxTripulantes;

    // ------------------------------------------------------------------------
    // Atributos de objeto variables (privados)
    // Representan el estado del objeto y pueden cambiar su valor
    // ------------------------------------------------------------------------
    // ------------------------------------------------------------------------
    // Atributos del estado del barco
    // ------------------------------------------------------------------------
    private boolean navegando;
    private double tiempoNavegacion;

    // ------------------------------------------------------------------------
    // Atributos de la información de navegación
    // ------------------------------------------------------------------------
    private double velocidad;
    private String patron;
    private String rumbo;
    private int numTripulantes;

    // ------------------------------------------------------------------------
    // Constructores de la clase
    // ------------------------------------------------------------------------
    /**
     * Constructor principal que inicializa un velero con sus características básicas
     * @param nombre Nombre del velero
     * @param mastiles Número de mástiles (entre MIN_MASTILES y MAX_MASTILES)
     * @param maxTrip Número máximo de tripulantes permitidos
     */
    public Velero(String nombre, int mastiles, int maxTrip) {
        // Validación de parámetros
        if (mastiles < MIN_MASTILES || mastiles > MAX_MASTILES) {
            throw new IllegalArgumentException("Número de mástiles inválido");
        }
        if (maxTrip < MIN_TRIPULANTES) {
            throw new IllegalArgumentException("Número máximo de tripulantes inválido");
        }
        
        this.nombreVelero = nombre;
        this.numMastiles = mastiles;
        this.maxTripulantes = maxTrip;
        
        // Inicialización de valores por defecto
        this.navegando = false;
        this.tiempoNavegacion = 0.0;
        this.velocidad = 0.0;
        this.patron = PATRON_POR_DEFECTO;
        this.rumbo = RUMBO_POR_DEFECTO;
        this.numTripulantes = 0;
        
        // Incrementar contador de barcos creados
        barcosCreados++;
    }

    /**
     * Constructor por defecto que crea un velero con valores predeterminados
     */
    /**
     * Constructor por defecto de la clase Velero.
     * Crea un objeto Velero con valores por defecto.
     */
    public Velero() {
        this("Velero " + (barcosCreados + 1), MIN_MASTILES, MIN_TRIPULANTES);
    }

    /**
     * Método fábrica que crea una nueva instancia de Velero
     */
    public static Velero crear(String nombre, int mastiles, int maxTrip) {
        return new Velero(nombre, mastiles, maxTrip);
    }

    // ------------------------------------------------------------------------
    // Getters (consultan el estado del objeto)
    // ------------------------------------------------------------------------
    public String getNombreVelero() { return nombreVelero; }
    public int getNumMastiles() { return numMastiles; }
    public int getMaxTripulantes() { return maxTripulantes; }
    public boolean isNavegando() { return navegando; }
    public double getTiempoNavegacion() { return tiempoNavegacion; }
    public double getVelocidad() { return velocidad; }
    public String getPatron() { return patron; }
    public String getRumbo() { return rumbo; }
    public int getNumTripulantes() { return numTripulantes; }

    // ------------------------------------------------------------------------
    // Métodos getter estáticos
    // ------------------------------------------------------------------------
    public static int getBarcosCreados() { return barcosCreados; }
    public static int getBarcosNavegando() { return barcosNavegando; }
    public static double getTiempoTotalNavegacion() { return tiempoTotalNavegacion; }

    // ------------------------------------------------------------------------
    // Setters (modifican el estado del objeto)
    public void setRumbo(String rumbo) throws IllegalStateException, NullPointerException, IllegalArgumentException {
        if (rumbo == null) {
            throw new NullPointerException("El rumbo no puede ser nulo");
        }
        if (!navegando) {
            throw new IllegalStateException("El velero no está navegando");
        }
        if (rumbo.equals(this.rumbo)) {
            throw new IllegalStateException("El velero ya se encuentra navegando en ese rumbo");
        }
        if (!rumbo.equals("ceñida") && !rumbo.equals("empopada")) {
            throw new IllegalArgumentException("Rumbo no válido");
        }
        this.rumbo = rumbo;
    }
    // ------------------------------------------------------------------------
    public void setVelocidad(double velocidad) {
        if (velocidad < MIN_VELOCIDAD || velocidad > MAX_VELOCIDAD) {
            throw new IllegalArgumentException("Velocidad fuera de rango");
        }
        this.velocidad = velocidad;
    }

    public void setPatron(String patron) {
        this.patron = (patron != null && !patron.trim().isEmpty()) ? 
                     patron : PATRON_POR_DEFECTO;
    }

    public void setRumbo(String rumbo) {
        this.rumbo = (rumbo != null && !rumbo.trim().isEmpty()) ? 
                    rumbo : RUMBO_POR_DEFECTO;
    }

    public void setNumTripulantes(int numTripulantes) {
        if (numTripulantes < MIN_TRIPULANTES || numTripulantes > maxTripulantes) {
            throw new IllegalArgumentException("Número de tripulantes inválido");
        }
        this.numTripulantes = numTripulantes;
    }

    // ------------------------------------------------------------------------
    // Métodos de "acción"
    // ------------------------------------------------------------------------
    /**
     * Inicia la navegación del velero
     * @param velocidad Velocidad inicial de navegación
     * @param patron Nombre del patrón
     * @param rumbo Rumbo inicial
     * @param tripulantes Número de tripulantes
     * @return true si se pudo iniciar la navegación, false si ya estaba navegando
     */
    public boolean iniciarNavegacion(double velocidad, String patron, 
                                   String rumbo, int tripulantes) {
        if (navegando) return false;
        
        setVelocidad(velocidad);
        setPatron(patron);
        setRumbo(rumbo);
        setNumTripulantes(tripulantes);
        
        navegando = true;
        barcosNavegando++;
        return true;
    }

    /**
     * Finaliza la navegación del velero
     * @param tiempoTranscurrido Tiempo que ha estado navegando
     * @return true si se pudo finalizar la navegación, false si no estaba navegando
     */
    public boolean finalizarNavegacion(double tiempoTranscurrido) {
        if (!navegando || tiempoTranscurrido < 0) return false;
        
        navegando = false;
        tiempoNavegacion += tiempoTranscurrido;
        tiempoTotalNavegacion += tiempoTranscurrido;
        barcosNavegando--;
        
        // Resetear valores de navegación
        velocidad = 0;
        patron = PATRON_POR_DEFECTO;
        rumbo = RUMBO_POR_DEFECTO;
        numTripulantes = 0;
        
        return true;
    }

    // ------------------------------------------------------------------------
    // Método toString
    // ------------------------------------------------------------------------
    @Override
    public String toString() {
        StringBuilder sb = new StringBuilder();
        sb.append("Velero: ").append(nombreVelero)
          .append("\nMástiles: ").append(numMastiles)
          .append("\nMáx. Tripulantes: ").append(maxTripulantes)
          .append("\nEstado: ").append(navegando ? "Navegando" : "Amarrado")
          .append("\nTiempo total navegado: ").append(tiempoNavegacion);
        
        if (navegando) {
            sb.append("\nVelocidad actual: ").append(velocidad)
              .append("\nPatrón: ").append(patron)
              .append("\nRumbo: ").append(rumbo)
              .append("\nTripulantes actuales: ").append(numTripulantes);
        }
        
        return sb.toString();
    }
}