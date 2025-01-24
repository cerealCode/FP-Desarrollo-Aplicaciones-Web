// Clase que representa un personaje del juego
export class Personaje {
    static #_RAZAS = Object.freeze(['Humano', 'Orcos', 'Elfos', 'Enanos', 'Trolls']);
    
    #_nombre;
    #_raza;
    #_nivel;
    #_vida;
    #_fuerza;
    #_magia;
    #_destreza;

    constructor(nombre, raza, nivel, vida, fuerza, magia, destreza) {
        if (nombre === null || raza === null || nivel === null || 
            vida === null || fuerza === null || magia === null || destreza === null) {
            throw new Error('Los parámetros no pueden ser nulos');
        }

        // Validación de sumas
        if ((fuerza + magia) > 50) {
            throw new Error('La suma de fuerza y magia no puede superar 50');
        }

        if ((vida + fuerza + magia + destreza) > 60) {
            throw new Error('La suma total de características no puede superar 60');
        }

        this.nombre = nombre;
        this.raza = raza;
        this.nivel = nivel;
        this.vida = vida;
        this.fuerza = fuerza;
        this.magia = magia;
        this.destreza = destreza;
    }

    get nombre() {
        return this.#_nombre;
    }

    set nombre(valor) {
        if (!(valor instanceof String) && !(typeof valor === 'string')) {
            throw new Error('El nombre debe ser una cadena de texto');
        }
        if (valor.length < 5) {
            throw new Error('El nombre debe tener al menos 5 caracteres');
        }
        this.#_nombre = valor;
    }

    get raza() {
        return this.#_raza;
    }

    set raza(valor) {
        if (!Personaje.#_RAZAS.includes(valor)) {
            throw new Error(`La raza debe ser una de las siguientes: ${Personaje.#_RAZAS.join(', ')}`);
        }
        this.#_raza = valor;
    }

    get nivel() {
        return this.#_nivel;
    }

    set nivel(valor) {
        if (isNaN(valor) || !Number.isInteger(valor)) {
            throw new Error('El nivel debe ser un número entero');
        }
        if (valor < 1 || valor > 65) {
            throw new Error('El nivel debe estar entre 1 y 65');
        }
        this.#_nivel = valor;
    }

    get vida() {
        return this.#_vida;
    }

    set vida(valor) {
        if (isNaN(valor) || !Number.isInteger(valor)) {
            throw new Error('La vida debe ser un número entero');
        }
        if (valor < 1 || valor > 30) {
            throw new Error('La vida debe estar entre 1 y 30');
        }
        this.#_vida = valor;
    }

    get fuerza() {
        return this.#_fuerza;
    }

    set fuerza(valor) {
        if (isNaN(valor) || !Number.isInteger(valor)) {
            throw new Error('La fuerza debe ser un número entero');
        }
        if (valor < 1 || valor > 30) {
            throw new Error('La fuerza debe estar entre 1 y 30');
        }
        this.#_fuerza = valor;
    }

    get magia() {
        return this.#_magia;
    }

    set magia(valor) {
        if (isNaN(valor) || !Number.isInteger(valor)) {
            throw new Error('La magia debe ser un número entero');
        }
        if (valor < 0 || valor > 30) {
            throw new Error('La magia debe estar entre 0 y 30');
        }
        this.#_magia = valor;
    }

    get destreza() {
        return this.#_destreza;
    }

    set destreza(valor) {
        if (isNaN(valor) || !Number.isInteger(valor)) {
            throw new Error('La destreza debe ser un número entero');
        }
        if (valor < 1 || valor > 30) {
            throw new Error('La destreza debe estar entre 1 y 30');
        }
        this.#_destreza = valor;
    }

    toString() {
        return `${this.#_nombre} es un ${this.#_raza.toLowerCase()} de nivel ${this.#_nivel} ` +
               `con ${this.#_vida} de vida, ${this.#_fuerza} de fuerza, ` + 
               `${this.#_magia} de magia y ${this.#_destreza} de destreza`;
    }
}