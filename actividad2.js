/*
 ACTIVIDAD 2: GUIA ESTRUCTURAS DE CONTROL JAVASCRIPT 


*/

/*
EJERCICIO 1:
  Crear una función que en base a la edad que ingreso el usuario devolver un 
  mensaje si la persona es mayor de edad o no. Utilizar para la condición el operador ternario. 
*/

let edad = 21;
/* Funcion que verifica si el usuario es  mayor de edad */
function verificarEdad(edad) {
  let mensaje = edad >= 18 ? "Sos mayor de edad" : "No sos mayor de edad";
  return mensaje;
}

console.log(verificarEdad(edad));

/*
EJERCICIO 2:
Crear una función que determine la nota final de un alumno.
*/

let alumno = {
  nombre: "Pedro Gonzales",
  carnet: "1",
  examen: 9,
  tareas: 8,
  asistencia: 9,
  investigacion: 10,
};

/* Funcion que da la nota final de un estudiante */
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

/*Ejercicio 3:
Calcular el aumento de trabajador tomando en cuenta la tabla de categorías de aumento. 
Para este ejercicio deberá de asignar las siguientes variables: nombre, salario, categoría y 
aumento. Deberá demostrar los datos del empleado y el aumento salarial. 
*/

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
Crear una función que en base a 2 números enteros, 
calcule cual número es el mayor y devolverlo.
*/

let num1 = 10,
  num2 = 5;

  /* Funcion que evalua el numero mayor de dos pasados */
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
Realizar una función para una tienda de coches en donde se deberá calcular: 
Si el coche a la venta es un FORD FIESTA, aplicar un 5% de descuento en la compra. Si el 
coche a la venta es un FORD FOCUS, el descuento será del 10% y si es un FORD ESCAPE 
el descuento será del 20% 
*/

let autos = [
  { marca: "FORD FIESTA", descuento: 0.05, precio: 20000.0 },
  { marca: "FORD FOCUS", descuento: 0.1, precio: 25000.0 },
  { marca: "FORD ESCAPE", descuento: 0.2, precio: 23000.0 },
];

let autoSeleccion = " ford escape";
/* Funcion que calcula el descuento segun la marca del vehiculo */
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
Crear una Función para calcular el descuento en viajes turísticos tomando 
en cuenta lo siguiente:  
Si el usuario introduce como origen la ciudad de Palma y como destino La costa del Sol, el 
descuento será de 5%, si el destino es Panchimalco el descuento será del 10% y si el destino 
es Puerto el Triunfo el descuento será del 15%  
 */

let ciudadOrigen = "Ciudad de la Palma";
let destino = "Costa del sol";
/* Esta funcion evalua los descuentos segun el origen y el destino del usuario */
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
Se realiza la carga de 10 valores enteros por teclado. Se desea conocer:  
• La cantidad de valores negativos ingresados. 
• La cantidad de valores positivos ingresados. 
• La cantidad de múltiplos de 15. 
• El valor acumulado de los números ingresados que son pares.
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
 Escriba un programa que muestre la tabla de multiplicar del 1 al 10 del número ingresado 
por el usuario. 
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
  Crear programa donde se introduce una temperatura en Celsius y salga el resultado en 
Fahrenheit, una vez teniendo la temperatura en Fahrenheit deberá devolver lo siguiente: 
• Si ºF está entre 14 y 32, sale la frase “Temperatura baja” 
• Si ºF está entre 32 y 68, sale la frase “Temperatura adecuada” 
• Si ºF está entre 68 y 96, sale la frase “Temperatura alta” 
• Si no está entre ningún caso anterior la frase “Temperatura desconocida” 
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

Se cuenta con la siguiente información:  
• Las edades de 5 estudiantes del turno mañana.  
• Las edades de 6 estudiantes del turno tarde.  
• Las edades de 11 estudiantes del turno noche.
*/
let edadesTurnoPrimero = [9, 10, 7, 12, 11];
let edadesTurnoSegundo = [7, 11, 8, 11, 13, 9];
let edadesTurnoTercero = [9, 10, 12, 13, 13, 10, 15, 18, 9, 10, 8];

/* La funcion devuelve una cadena de texto
   con la evaluacion de los promedios de edades por turnos
   y el turno con el maximo de edad */
function promediosPorTurnos(
  edadesTurnoPrimero,
  edadesTurnoSegundo,
  edadesTurnoTercero
) {
  let sumaPrimerTurno = edadesTurnoPrimero.reduce(
    (acumulador, actual) => (acumulador += actual)
  );
  let sumaSegundoTurno = edadesTurnoSegundo.reduce(
    (accumulador, actual) => (accumulador += actual)
  );
  let sumaTerceroTurno = edadesTurnoTercero.reduce(
    (acumulador, actual) => (acumulador += actual)
  );

  let promedioPrimerTurno = Math.round(
    sumaPrimerTurno / edadesTurnoPrimero.length
  );
  let promedioSegundoTurno = Math.round(
    sumaSegundoTurno / edadesTurnoSegundo.length
  );
  let promdioTercerTurno = Math.round(
    sumaTerceroTurno / edadesTurnoTercero.length
  );

  let turnoMayorPromedio = "";
  let edadPromedio = "";

  /*  Esta logica del la estructura condicional se puede mejorar.
      Actualmente al haber un empate podria crear impresicion 
      Lo mejor es usar Math.max() para evaluar el mayor y pasarloa a la estructura condicional.

      Otra opcion seria usar if anidados para este mismo fin.
   */
  if (
    promedioPrimerTurno > promedioSegundoTurno ||
    promedioPrimerTurno > promdioTercerTurno
  ) {

    turnoMayorPromedio = "Mañana";
    edadPromedio = promedioPrimerTurno;
  } else if (
    promedioSegundoTurno > promdioTercerTurno ||
    promedioSegundoTurno > promedioPrimerTurno
  ) {
    turnoMayorPromedio = "Tarde";
    edadPromedio = promedioSegundoTurno;
  } else {
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

console.log(
  promediosPorTurnos(edadesTurnoPrimero, edadesTurnoSegundo, edadesTurnoTercero)
);
