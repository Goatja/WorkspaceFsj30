/*
EJERCICIO 4. Crea una clase llamada Cuenta y va contener lo siguiente:

Atributos: nombre, cantidad, tipo de cuenta y número de cuenta.
Métodos:
• Crear un constructor que reciba como parámetros el nombre, cantidad, tipo de cuenta y
número de cuenta.

• Crea un método llamado depositar y en base a la cantidad ingresada en el constructor haz una
condición de que si la cantidad es menor a $5.00 que se imprima un mensaje que el valor a
depositar debe ser mayor a $5.00 y sino solo imprima un mensaje de que se ha depositado
correctamente y la cantidad depositada.

• Crea un método llamado retirar, que reciba un parámetro llamado valor y en base a eso tienes
que restar la cantidad menos el valor ingresado e imprimir un mensaje de lo que ha retirado y
cuanto le queda en su cuenta.
Nota: Para el método retirar debes de validar que lo que se retire sea mayor de $5.00 ya que
si no hay efectivo debes de tirar un mensaje que no hay nada en la cuenta.

• Crea un método para mostrar los datos de su nombre, tipo de cuenta y número de cuenta.
• Define un objeto de la clase Cuenta y llama sus métodos.
*/
var Cuenta = /** @class */ (function () {
    function Cuenta(nombreParam, cantidaParam, tipoCuentaParam, numeroCuentaParam) {
        this.nombre = nombreParam;
        this.cantidad = cantidaParam;
        this.tipoCuenta = tipoCuentaParam;
        this.numeroCuenta = numeroCuentaParam;
    }
    Cuenta.prototype.depositar = function () {
        var msg = this.cantidad < 5 ? 'Tu deposito debe de ser mayor de $5.00' : "Deposito de ".concat(this.cantidad, " realizado con exito");
        return msg;
    };
    Cuenta.prototype.retirar = function (valor) {
        var msg;
        if (valor < 5) {
            msg = "No podes retirar menos de $5.00";
        }
        else if (this.cantidad < valor) {
            msg = "No cuentas con fondos suficientes para retirar ".concat(valor);
        }
        else if (this.cantidad == 0) {
            msg = "Fondos insuficientes";
        }
        else {
            this.cantidad -= valor;
            msg = "Haz retirado ".concat(valor, ", tu saldo actual es de ").concat(this.cantidad);
        }
        return msg;
    };
    Cuenta.prototype.mostrarDatos = function () {
        var msg = "Nombre: ".concat(this.nombre, "\n Tipo de Cuenta: ").concat(this.tipoCuenta, "\n N-Cuenta : ").concat(this.numeroCuenta);
        return msg;
    };
    return Cuenta;
}());
var cuenta = new Cuenta("Juan", 20, "Ahorro", "2w222");
console.log(cuenta.depositar());
console.log(cuenta.retirar(10));
console.log(cuenta.mostrarDatos());
