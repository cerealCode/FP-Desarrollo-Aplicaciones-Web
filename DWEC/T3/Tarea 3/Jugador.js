// Clase para representar un jugador básico
export class Jugador {
    // Atributos privados
    #_nombre;
    #_edad;
    #_contacto;

    constructor(nombre, edad, contacto) {
        if (nombre === null || edad === null || contacto === null) {
            throw new Error('Los parámetros no pueden ser nulos');
        }
        this.nombre = nombre;
        this.edad = edad;
        this.contacto = contacto;
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

    get edad() {
        return this.#_edad;
    }

    set edad(valor) {
        if (isNaN(valor) || !Number.isInteger(valor)) {
            throw new Error('La edad debe ser un número entero');
        }
        if (valor < 12 || valor > 85) {
            throw new Error('La edad debe estar entre 12 y 85 años');
        }
        this.#_edad = valor;
    }

    get contacto() {
        return this.#_contacto;
    }

    set contacto(valor) {
        if (!(valor instanceof String) && !(typeof valor === 'string')) {
            throw new Error('El contacto debe ser una cadena de texto');
        }
        if (valor.length < 5 || valor.length > 100) {
            throw new Error('El contacto debe tener entre 5 y 100 caracteres');
        }
        this.#_contacto = valor;
    }

    toString() {
        return `${this.#_nombre} tiene ${this.#_edad} años y su contacto es ${this.#_contacto}`;
    }
}