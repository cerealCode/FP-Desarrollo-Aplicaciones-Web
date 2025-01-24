// Clase que representa una partida de rol
export class Partida {
    // Atributos privados
    #_nombre;
    #_reglas;
    #_master;
    #_participantes;
    #_personajes;
    #_mapaParticipantePersonaje;

    constructor(nombre, reglas, dungeonMaster) {
        this.nombre = nombre;
        this.reglas = reglas;
        this.master = dungeonMaster;
        this.#_participantes = [];
        this.#_personajes = [];
        this.#_mapaParticipantePersonaje = new Map();
    }

    get nombre() {
        return this.#_nombre;
    }

    set nombre(valor) {
        if (!(valor instanceof String) && !(typeof valor === 'string')) {
            throw new Error('El nombre debe ser una cadena de texto');
        }
        if (valor.length < 3) {
            throw new Error('El nombre debe ser una cadena de al menos 3 caracteres');
        }
        this.#_nombre = valor;
    }

    get reglas() {
        return this.#_reglas;
    }

    set reglas(valor) {
        this.#_reglas = valor;
    }

    get master() {
        return this.#_master;
    }

    set master(dungeonMaster) {
        if (!dungeonMaster.reglas.has(this.#_reglas.toUpperCase())) {
            throw new Error(`El Dungeon Master no conoce las reglas ${this.#_reglas}`);
        }
        this.#_master = dungeonMaster;
    }

    addJugador(jugador, personaje) {
        if (this.#_participantes.some(p => p.nombre === jugador.nombre)) {
            return false;
        }

        this.#_participantes.push(jugador);
        this.#_personajes.push(personaje);
        this.#_mapaParticipantePersonaje.set(jugador.nombre, personaje);
        return true;
    }

    delJugador(nombreJugador) {
        let index = this.#_participantes.findIndex(p => p.nombre === nombreJugador);
        if (index === -1) {
            return false;
        }

        let personaje = this.#_mapaParticipantePersonaje.get(nombreJugador);
        let personajeIndex = this.#_personajes.indexOf(personaje);

        this.#_participantes.splice(index, 1);
        this.#_personajes.splice(personajeIndex, 1);
        this.#_mapaParticipantePersonaje.delete(nombreJugador);
        
        return true;
    }
    //TODO REVISAR ARRAY


    listadoJugadores() {
        return this.#_participantes
            .map(j => j.nombre)
            .sort()
            .join('\n');
    }
    //TODO REVISAR

    listadoPersonajes(raza) {
        return this.#_personajes
            .filter(p => p.raza === raza)
            .map(p => p.toString())
            .join('\n');
    }
//TODO REVISAR
    listadoPersonajesMaxNivel() {
        let maxNivel = Math.max(...this.#_personajes.map(p => p.nivel));
        return this.#_personajes
            .filter(p => p.nivel === maxNivel)
            .map(p => p.toString())
            .join('\n');
    }

    #_formateaInfo() {
        let tabla = `Partida: ${this.#_nombre}\n`;
        tabla += `Reglas: ${this.#_reglas}\n`;
        tabla += `Dungeon Master: ${this.#_master.toString()}\n\n`;
        tabla += 'Jugadores y Personajes:\n';
        tabla += '======================\n';
        
        for (let [nombreJugador, personaje] of this.#_mapaParticipantePersonaje) {
            let jugador = this.#_participantes.find(p => p.nombre === nombreJugador);
            tabla += `Jugador: ${jugador.toString()}\n`;
            tabla += `Personaje: ${personaje.toString()}\n\n`;
        }
        
        return tabla;
    }

    toString() {
        return this.#_formateaInfo();
    }
}