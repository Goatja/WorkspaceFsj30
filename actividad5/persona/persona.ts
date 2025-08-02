
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
export class Persona{
    nombre:string;
    apellido:string;
    direccion:string;
    telefono:string;
    edad:number;

    constructor(nombreParam:string, apellidoParam:string, direccionParam:string, telefonoParam:string, edadParam:number){
        this.nombre = nombreParam;
        this.apellido = apellidoParam;
        this.direccion = direccionParam;
        this.telefono = telefonoParam;
        this.edad = edadParam;
    }

    //Metodo que muestra si la persona es mayor de edad o no.
    esMayorEdad():string{

        if(this.edad >= 18)return "Sos mayor de edad";
        return "Sos menor de edad";
    }

    mostrarDatosPersonales():string{
        let datos:string;
        datos = `Nombre: ${this.nombre}\n Apellido: ${this.apellido}\n Direccion: ${this.direccion}\n Telefono: ${this.telefono}\n Edad: ${this.edad}`;
        return datos;
    }
}