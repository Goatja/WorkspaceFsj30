/*
 ACTIVIDAD 2: GUIA ESTRUCTURAS DE CONTROL JAVASCRIPT 


*/

/*
EJERCICIO 1 
*/

let edad = 21;

function verificarEdad(edad) {
  let mensaje = edad >= 18 ? "Sos mayor de edad" : "No sos mayor de edad";
  return mensaje;
}

console.log(verificarEdad(edad));

/*
EJERCICIO 2\
*/

let alumno = {
  nombre: "Pedro Gonzales",
  carnet: "1",
  examen: 9,
  tareas: 8,
  asistencia: 9,
  investigacion: 10,
};

function notaFinal(alumno) {
  let nota =
    alumno.examen * 0.2 +
    alumno.tareas * 0.4 +
    alumno.asistencia * 0.1 +
    alumno.investigacion * 0.3;
  let mensaje = `Nombre: ${alumno.nombre}, Carnet: ${
    alumno.carnet
  }, Nota final: ${nota.toFixed(2)}`;
  return mensaje;
}

console.log(notaFinal(alumno));

//========================================================

/*Ejercicio 3*/

//Variables con los datos del empleado
let nombre = "Juan";
let salario = 1500;
let categoria = "A";
let aumento = 0;

//Funcion que se encarga de determinar el aumento dependiendo de la categoria de empleado
function calcularAumento(nombre, salario, categoria, aumento) {
  let mensaje = "";
  let salarioAumento;

  if (categoria == "A") {
    aumento = salario * 0.15;
    salarioAumento = salario + aumento;
    mensaje = `\n   Nombre: ${nombre}\n 
                        Categoria: ${categoria}\n 
                        Salario anterior ${salario}\n
                        Salario con Aumento: ${salarioAumento}\n
                        Aumento: ${aumento}`;
  } else if (categoria == "B") {
    aumento = salario * 0.3;
    salarioAumento = salario + aumento;
    mensaje = `\n   Nombre: ${nombre}\n 
                        Categoria: ${categoria}\n 
                        Salario anterior ${salario}\n
                        Salario con Aumento: ${salarioAumento}\n
                        Aumento: ${aumento}`;
  } else if (categoria == "C") {
    aumento = salario * 0.1;
    salarioAumento = salario + aumento;
    mensaje = `\n   Nombre: ${nombre}\n 
                        Categoria: ${categoria}\n 
                        Salario anterior ${salario}\n
                        Salario con Aumento: ${salarioAumento}\n
                        Aumento: ${aumento}`;
  } else if (categoria == "D") {
    aumento = salario * 0.2;
    salarioAumento = salario + aumento;
    mensaje = `\n   Nombre: ${nombre}\n 
                        Categoria: ${categoria}\n 
                        Salario anterior ${salario}\n
                        Salario con Aumento: ${salarioAumento}\n
                        Aumento: ${aumento}`;
  } else {
    mensaje = "Opcion no disponible";
  }

  return mensaje;
}

console.log(calcularAumento(nombre, salario, categoria, aumento));

/* 
EJERCICIO 4: 
*/

let num1 = 10,
  num2 = 5;

function evalMayorNumero(value1, value2) {
  let mensaje;
  if (value1 >= value2) {
    mensaje = `El ${value1} es mayor que ${value2}`;
  } else if (value1 <= value2) {
    mensaje = `El numero ${value2} es mayor que ${value1}`;
  } else {
    mensaje = `Solicitud no valida!!`;
  }

  return mensaje;
}
console.log(evalMayorNumero(num1, num2));

/* 
EJERCICIO 5:  
*/

let autos = [
  { marca: "FORD FIESTA", descuento: 0.05, precio: 20000.0 },
  { marca: "FORD FOCUS", descuento: 0.1, precio: 25000.0 },
  { marca: "FORD ESCAPE", descuento: 0.2, precio: 23000.0 },
];

let autoSeleccion = " ford escape";

function tiendaCoches(autos) {
  let mensaje;
  let descuentoAplicado;
  let precioFinal;

  for (let i = 0; i < autos.length; i++) {
    if (autos[i].marca.toLowerCase() == autoSeleccion.toLowerCase().trim()) {
      descuentoAplicado = autos[i].descuento * autos[i].precio;

      mensaje = `Auto seleccionado ${autoSeleccion.toUpperCase()} descuento aplicado ${descuentoAplicado}`;
    } else {
      mensaje = "Seleccion no existente";
    }
  }

  return mensaje;
}

console.log(tiendaCoches(autos));

/*
EJERCICIO 6:   
 */

let ciudadOrigen = "Ciudad de la Palma";
let destino = "Costa del sol";

function descuentoViajesTuristico(ciudadOrigen, destino) {
  if (ciudadOrigen == "Ciudad de la Palma") {
    if (destino.toLowerCase() === "Costa del sol".toLowerCase()) {
      precioViaje = 100.0;
      descuento = precioViaje * 0.05;
      mensaje = `Haz elegido ${destino} tu descuento es de 5%, costo del viaje: $${precioViaje}, descuento: $${descuento.toFixed(
        2
      )}`;
    } else if (destino.toLowerCase() === "Panchimalco".toLowerCase()) {
      precioViaje = 87.0;
      descuento = precioViaje * 0.1;
      mensaje = `Haz elegido ${destino} tu descuento es de 10%, costo del viaje: $${precioViaje}, descuento: $${descuento.toFixed(
        2
      )}`;
    } else if (destino.toLowerCase() === "Puerto el triunfo".toLowerCase()) {
      precioViaje = 150.0;
      descuento = precioViaje * 0.15;
      mensaje = `Haz elegido ${destino} tu descuento es de 15%, costo del viaje: $${precioViaje}, descuento: $${descuento.toFixed(
        2
      )}`;
    } else {
      mensaje = "Destino invalido!!";
    }
  } else {
    mensaje = `No se aplica ningun tipo de descuento`;
  }

  return mensaje;
}

console.log(descuentoViajesTuristico(ciudadOrigen, destino));

/* 
EJERCICIO 7:  

*/

let valoresEnteros = [20, -10, 4, -6, 1, 2, 98, 30, -9, 15];
let negativos = 0;
let positivos = null;
let multiplos15 = null;
let pares = null;

valoresEnteros.forEach((valor) => {
  valor < 0 ? negativos++ : "";
  valor > 0 ? positivos++ : "";
  valor % 15 == 0 ? multiplos15++ : "";
  valor % 2 == 0 ? (pares += valor) : "";
});

let resultadoMultiple = `Negativos: ${negativos}, Positivos: ${positivos}, Multiplos de 15: ${multiplos15}, Valor acumulado de los pares: ${pares}`;
console.log(resultadoMultiple);

/* 

EJERCICIO 8:  
 
*/

let numeroUsuarioTabla = 5;
let i = 1;
console.log("==================================");
console.log(`\t TABLA DEL ${numeroUsuarioTabla}`);
console.log("==================================");

for (i; i <= 10; i++) {
  let resultado = numeroUsuarioTabla * i;
  console.log(`-------------------`);
  console.log(`\t${numeroUsuarioTabla} X ${i} = ${resultado}`);
}

/* 
  EJERCICIO 9:  
  
  */

let Celsius = 20;

let conversorAFarenheit = (temperature) => {
  let farenheit = (temperature * 9) / 5 + 32;
  let mensaje;

  if (farenheit > 14 && farenheit <= 32) {
    mensaje = `${farenheit}° Temperatura baja`;
  } else if (farenheit > 32 && farenheit <= 68) {
    mensaje = `${farenheit}° Temperatura adecuada`;
  } else if (farenheit > 68 && farenheit <= 96) {
    mensaje = `${farenheit}° Temperatura alta`;
  } else {
    mensaje = "Temperatura desconocida";
  }

  console.log(mensaje);
};

conversorAFarenheit(Celsius);

/* 
EJERCICIO 10:  


*/
let edadesTurnoPrimero = [9, 10, 7, 12, 11];
let edadesTurnoSegundo = [7, 11, 8, 11, 13,9];
let edadesTurnoTercero = [9, 10, 12, 13, 13,10,15,18,9,10,8];


/* La funcion devuelve una cadena de texto
   con la evaluacion de los promedios de edades por turnos
   y el turno con el maximo de edad */
function promediosPorTurnos(edadesTurnoPrimero, edadesTurnoSegundo, edadesTurnoTercero){

  let sumaPrimerTurno  = edadesTurnoPrimero.reduce( (acumulador, actual) => acumulador += actual);
  let sumaSegundoTurno = edadesTurnoSegundo.reduce( (accumulador, actual) => accumulador+=actual);
  let sumaTerceroTurno = edadesTurnoTercero.reduce( (acumulador, actual) => acumulador += actual);
  
  let promedioPrimerTurno = Math.round(sumaPrimerTurno / edadesTurnoPrimero.length);
  let promedioSegundoTurno = Math.round(sumaSegundoTurno / edadesTurnoSegundo.length);
  let promdioTercerTurno = Math.round(sumaTerceroTurno / edadesTurnoTercero.length);

  let turnoMayorPromedio="";
  let edadPromedio = "";

  /*  Esta logica del la estructura condicional se puede mejorar.
      Actualmente al haber un empate podria crear impresicion 
      Lo mejor es usar Math.max() para evaluar el mayor y pasarloa a la estructura condicional.

      Otra opcion seria usar if anidados para este mismo fin.
   */
  if (promedioPrimerTurno > promedioSegundoTurno || promedioPrimerTurno > promdioTercerTurno){
    turnoMayorPromedio = "Mañana";
    edadPromedio = promedioPrimerTurno;
  }else if (promedioSegundoTurno > promdioTercerTurno || promedioSegundoTurno > promedioPrimerTurno){
    turnoMayorPromedio = "Tarde";
    edadPromedio = promedioSegundoTurno;
  }else {
    turnoMayorPromedio = "Noche";
    edadPromedio = promdioTercerTurno;

  }

  let mostrarPromediosTurnos = `\n \t Promedios por turnos\n 
                              Turno de mañana: ${promedioPrimerTurno}\n 
                              Turno de tarde: ${promedioSegundoTurno}\n
                              Turno de noche: ${promdioTercerTurno}\n
                              Turno con mayoria de edad: ${turnoMayorPromedio}, con un promedio de edad de: ${edadPromedio} años`;

  return mostrarPromediosTurnos;                            
}

console.log(promediosPorTurnos(edadesTurnoPrimero, edadesTurnoSegundo, edadesTurnoTercero));

