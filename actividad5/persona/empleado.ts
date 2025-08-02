import { Persona } from './persona';

class Empleado extends Persona{
    sueldo:number;
    constructor(nombreParam:string, apellidoParam:string, direccionParam:string, telefonoParam:string, edadParam:number){
        super(nombreParam,apellidoParam,direccionParam,telefonoParam,edadParam);
    }

    cargarSueldo(valor:number):string{
        this.sueldo = valor;
        return`${this.sueldo} cargado con exito`;
    }

    imprimirSueldo():number{
        return this.sueldo;
    }
}

let empleado:Empleado = new Empleado("Maria", "Gonzales", "Ave Norte", "777-7787", 21);
empleado.cargarSueldo(200);
let sueldo = empleado.imprimirSueldo();
console.log(empleado.mostrarDatosPersonales());
console.log("Sueldo: $"+sueldo.toFixed(2));
console.log(empleado.esMayorEdad());
