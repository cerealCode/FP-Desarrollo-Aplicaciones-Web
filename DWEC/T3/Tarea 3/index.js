import { Jugador } from './Jugador.js';
import { DungeonMaster } from './DungeonMaster.js';
import { Personaje } from './Personaje.js';
import { Partida } from './Partida.js';

// Función principal que ejecuta el ejemplo de uso de las clases
function uso() {
    let jugadores = [];
    let masters = [];
    let personajes = [];
    let partidas = [];
    let salida = document.getElementById('salida');
    let output = '';

    // Aplicar estilos básicos al contenedor
    salida.style.fontFamily = 'monospace';
    salida.style.whiteSpace = 'pre-wrap';
    salida.style.margin = '20px';
    salida.style.padding = '10px';
    salida.style.border = '1px solid #ccc';
    salida.style.backgroundColor = '#fff';
    salida.style.lineHeight = '1.5';

    // Reglas disponibles
    let REGLAS_DISPONIBLES = {
        D20: 'D20',
        CTHULHU: 'CTHULHU',
        VAMPIRO: 'VAMPIRO',
        PATHFINDER: 'PATHFINDER'
    };

    try {
        // Creación de jugadores
        output += '<div style="margin-bottom: 20px; padding: 10px; background-color: #f8f9fa; border-left: 4px solid #4CAF50;">';
        output += '=== Creación de Jugadores ===\n';
        try {
            jugadores.push(new Jugador("Laura Martínez", 25, "laura.martinez@email.com"));
            jugadores.push(new Jugador("Carlos Ruiz", 30, "carlos.ruiz@email.com"));
            jugadores.push(new Jugador("Ana García", 22, "ana.garcia@email.com"));
            jugadores.push(new Jugador("Miguel Torres", 28, "miguel.torres@email.com"));
        } catch (error) {
            output += `<div style="color: #721c24; background-color: #f8d7da; padding: 10px; margin: 5px 0;">Error al crear jugadores: ${error.message}</div>\n`;
        }
        
        for (let jugador of jugadores) {
            try {
                output += `${jugador.toString()}\n`;
            } catch (error) {
                output += `<div style="color: #721c24;">Error al mostrar jugador: ${error.message}</div>\n`;
            }
        }
        output += '</div>';

        // Creación de Dungeon Masters
        output += '<div style="margin-bottom: 20px; padding: 10px; background-color: #f8f9fa; border-left: 4px solid #007bff;">';
        output += '\n=== Creación de Dungeon Masters ===\n';
        try {
            masters.push(new DungeonMaster("David González", 35, "david.dm@email.com"));
            masters.push(new DungeonMaster("Elena Castro", 40, "elena.dm@email.com"));
            masters.push(new DungeonMaster("Roberto Sánchez", 45, "roberto.dm@email.com"));

            masters[0].addReglas(REGLAS_DISPONIBLES.D20);
            masters[0].addReglas(REGLAS_DISPONIBLES.PATHFINDER);
            masters[1].addReglas(REGLAS_DISPONIBLES.CTHULHU);
            masters[1].addReglas(REGLAS_DISPONIBLES.VAMPIRO);
            masters[2].addReglas(REGLAS_DISPONIBLES.D20);
        } catch (error) {
            output += `<div style="color: #721c24;">Error al crear o configurar DMs: ${error.message}</div>\n`;
        }

        for (let master of masters) {
            try {
                output += `${master.toString()}\n`;
            } catch (error) {
                output += `<div style="color: #721c24;">Error al mostrar DM: ${error.message}</div>\n`;
            }
        }
        output += '</div>';

        // Creación de personajes
        output += '<div style="margin-bottom: 20px; padding: 10px; background-color: #f8f9fa; border-left: 4px solid #ffc107;">';
        output += '\n=== Creación de Personajes ===\n';
        try {
            personajes.push(new Personaje("Thorin", "Enanos", 5, 18, 14, 12, 8));
            personajes.push(new Personaje("Legolas", "Elfos", 7, 16, 18, 14, 12));
            personajes.push(new Personaje("Gandalf", "Humano", 10, 10, 12, 18, 16));
            personajes.push(new Personaje("Gimli", "Enanos", 6, 17, 15, 10, 9));
            personajes.push(new Personaje("Arwen", "Elfos", 8, 14, 16, 15, 14));
            personajes.push(new Personaje("Boromir", "Humano", 7, 16, 15, 12, 10));
            personajes.push(new Personaje("Frodo", "Humano", 4, 12, 14, 13, 12));
            personajes.push(new Personaje("Sam", "Humano", 4, 13, 12, 10, 11));
            personajes.push(new Personaje("Aragorn", "Humano", 9, 16, 15, 14, 13));
            personajes.push(new Personaje("Galadriel", "Elfos", 10, 12, 15, 18, 17));
        } catch (error) {
            output += `<div style="color: #721c24;">Error al crear personajes: ${error.message}</div>\n`;
        }

        for (let personaje of personajes) {
            try {
                output += `${personaje.toString()}\n`;
            } catch (error) {
                output += `<div style="color: #721c24;">Error al mostrar personaje: ${error.message}</div>\n`;
            }
        }
        output += '</div>';

        // Creación de partidas
        output += '<div style="margin-bottom: 20px; padding: 10px; background-color: #f8f9fa; border-left: 4px solid #17a2b8;">';
        output += '\n=== Creación de Partidas ===\n';
        try {
            partidas.push(new Partida("La Búsqueda del Anillo", REGLAS_DISPONIBLES.D20, masters[0]));
            partidas.push(new Partida("El Horror de Innsmouth", REGLAS_DISPONIBLES.CTHULHU, masters[1]));

            // Añadir jugadores a las partidas
            partidas[0].addJugador(jugadores[0], personajes[0]);
            partidas[0].addJugador(jugadores[1], personajes[1]);
            partidas[0].addJugador(jugadores[2], personajes[2]);
            
            partidas[1].addJugador(jugadores[2], personajes[6]);
            partidas[1].addJugador(jugadores[3], personajes[7]);
        } catch (error) {
            output += `<div style="color: #721c24;">Error al crear partidas o añadir jugadores: ${error.message}</div>\n`;
        }

        // Mostrar información de las partidas
        for (let i = 0; i < partidas.length; i++) {
            try {
                output += `\nPartida ${i + 1}:\n${partidas[i].toString()}\n`;
            } catch (error) {
                output += `<div style="color: #721c24;">Error al mostrar partida ${i + 1}: ${error.message}</div>\n`;
            }
        }
        output += '</div>';

        //TODO Error al mostrar partida 2: Cannot read properties of undefined (reading 'toString')

        // Pruebas adicionales
        output += '<div style="margin-bottom: 20px; padding: 10px; background-color: #f8f9fa; border-left: 4px solid #6c757d;">';
        output += '\n=== Pruebas Adicionales ===\n';
        try {
            if (masters[0].delReglas(REGLAS_DISPONIBLES.PATHFINDER)) {
                output += `Regla ${REGLAS_DISPONIBLES.PATHFINDER} eliminada del DM ${masters[0].nombre}\n`;
            }
            masters[0].addReglas(REGLAS_DISPONIBLES.PATHFINDER);

            output += '\n=== Listado de Jugadores de Partida 1 ===\n';
            output += partidas[0].listadoJugadores() + '\n';

            output += '\n=== Listado de Personajes Elfos ===\n';
            output += partidas[0].listadoPersonajes("Elfos") + '\n';

            output += '\n=== Listado de Personajes de Mayor Nivel ===\n';
            output += partidas[0].listadoPersonajesMaxNivel() + '\n';

            if (partidas[0].delJugador(jugadores[0].nombre)) {
                output += `\nJugador ${jugadores[0].nombre} eliminado con éxito\n`;
                output += '\n=== Listado actualizado de jugadores ===\n';
                output += partidas[0].listadoJugadores() + '\n';
            }
        } catch (error) {
            output += `<div style="color: #721c24;">Error en pruebas adicionales: ${error.message}</div>\n`;
        }
        output += '</div>';

    } catch (error) {
        console.error('Error general en la ejecución:', error);
        output += `<div style="color: #721c24; background-color: #f8d7da; padding: 10px; margin: 5px 0;">Error general en la ejecución: ${error.message}</div>\n`;
    } finally {
        salida.innerHTML = output;
    }
}

// Cargar cuando el documento esté listo
document.addEventListener('DOMContentLoaded', uso);