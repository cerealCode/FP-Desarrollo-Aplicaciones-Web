import { Jugador } from './Jugador.js';

export class DungeonMaster extends Jugador {
    #_reglas;

    constructor(nombre, edad, contacto) {
        super(nombre, edad, contacto);
        this.#_reglas = new Set();
    }

    get reglas() {
        return this.#_reglas;
    }

    addReglas(regla) {
        if (!(regla instanceof String) && !(typeof regla === 'string')) {
            return false;
        }
        let reglaTrim = regla.trim();
        if (reglaTrim.length > 0) {
            this.reglas.add(reglaTrim.toUpperCase());
            return true;
        }
        return false;
    }

    delReglas(regla) {
        if (!(regla instanceof String) && !(typeof regla === 'string')) {
            return false;
        }
        return this.reglas.delete(regla.toUpperCase());
    }

    toString() {
        let mensaje = super.toString();
        let reglasArray = Array.from(this.reglas);
        
        if (reglasArray.length > 0) {
            mensaje += ` Puede ser máster de ${reglasArray.join(' y ')}.`;
        } else {
            mensaje += ' No conoce ningún sistema de reglas.';
        }
        return mensaje;
    }
}