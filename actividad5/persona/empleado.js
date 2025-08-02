"use strict";
var __extends = (this && this.__extends) || (function () {
    var extendStatics = function (d, b) {
        extendStatics = Object.setPrototypeOf ||
            ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
            function (d, b) { for (var p in b) if (Object.prototype.hasOwnProperty.call(b, p)) d[p] = b[p]; };
        return extendStatics(d, b);
    };
    return function (d, b) {
        if (typeof b !== "function" && b !== null)
            throw new TypeError("Class extends value " + String(b) + " is not a constructor or null");
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();
Object.defineProperty(exports, "__esModule", { value: true });
var persona_1 = require("./persona");
var Empleado = /** @class */ (function (_super) {
    __extends(Empleado, _super);
    function Empleado(nombreParam, apellidoParam, direccionParam, telefonoParam, edadParam) {
        return _super.call(this, nombreParam, apellidoParam, direccionParam, telefonoParam, edadParam) || this;
    }
    Empleado.prototype.cargarSueldo = function (valor) {
        this.sueldo = valor;
        return "".concat(this.sueldo, " cargado con exito");
    };
    Empleado.prototype.imprimirSueldo = function () {
        return this.sueldo;
    };
    return Empleado;
}(persona_1.Persona));
var empleado = new Empleado("Maria", "Gonzales", "Ave Norte", "777-7787", 21);
empleado.cargarSueldo(200);
var sueldo = empleado.imprimirSueldo();
console.log(empleado.mostrarDatosPersonales());
console.log("Sueldo: $" + sueldo.toFixed(2));
console.log(empleado.esMayorEdad());
