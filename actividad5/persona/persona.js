"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
exports.Persona = void 0;
/*
EJERCICIO 5. Crear una clase abstracta Persona y va contener lo siguiente:
Atributos: nombre, apellido, dirección, teléfono y edad.
Métodos:
• Crear un método constructor para recibir los datos.
• Crea un método que en base a la edad imprima un mensaje si es mayor de edad o no.
• Crea un método para mostrar todos los datos personales (será el método abstracto).
• Crea una clase extra llamada Empleado y va contener un atributo llamado sueldo.
• En la clase Empleado añade los métodos cargar sueldo e imprimir sueldo.
• La clase Empleado va heredar de la clase Persona.
• Define un objeto de la clase Empleado y que se imprima los datos del empleado y su sueldo.

*/
var Persona = /** @class */ (function () {
    function Persona(nombreParam, apellidoParam, direccionParam, telefonoParam, edadParam) {
        this.nombre = nombreParam;
        this.apellido = apellidoParam;
        this.direccion = direccionParam;
        this.telefono = telefonoParam;
        this.edad = edadParam;
    }
    //Metodo que muestra si la persona es mayor de edad o no.
    Persona.prototype.esMayorEdad = function () {
        if (this.edad >= 18)
            return "Sos mayor de edad";
        return "Sos menor de edad";
    };
    Persona.prototype.mostrarDatosPersonales = function () {
        var datos;
        datos = "Nombre: ".concat(this.nombre, "\n Apellido: ").concat(this.apellido, "\n Direccion: ").concat(this.direccion, "\n Telefono: ").concat(this.telefono, "\n Edad: ").concat(this.edad);
        return datos;
    };
    return Persona;
}());
exports.Persona = Persona;
