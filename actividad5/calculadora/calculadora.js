var Calculadora = /** @class */ (function () {
    function Calculadora(numero1Pa, numero2Pa) {
        this.numero1 = numero1Pa;
        this.numero2 = numero2Pa;
    }
    //Metodo de suma
    Calculadora.prototype.suma = function (numero1Param, numero2Param) {
        this.numero1 = numero1Param;
        this.numero2 = numero2Param;
        var suma = this.numero1 + this.numero2;
        return suma;
    };
    //Metodo de resta
    Calculadora.prototype.resta = function (numero1Param, numero2Param) {
        this.numero1 = numero1Param;
        this.numero2 = numero2Param;
        var resta = this.numero1 - this.numero2;
        return resta;
    };
    //Metodo de multiplicacion
    Calculadora.prototype.multiplicar = function (numero1Param, numero2Param) {
        this.numero1 = numero1Param;
        this.numero2 = numero2Param;
        var multiplicacion = this.numero1 * this.numero2;
        return multiplicacion;
    };
    //Metodo de division
    Calculadora.prototype.divividir = function (numero1Param, numero2Param) {
        this.numero1 = numero1Param;
        this.numero2 = numero2Param;
        var divicion = this.numero1 / this.numero2;
        return divicion;
    };
    //Metodo de potencia
    Calculadora.prototype.potenciacion = function (numero1Param, numero2Param) {
        this.numero1 = numero1Param;
        this.numero2 = numero2Param;
        var potencia = Math.pow(this.numero1, this.numero2);
        return potencia;
    };
    //Metodo para factorial
    Calculadora.prototype.factorial = function (numero1Param) {
        this.numero1 = numero1Param;
        if (this.numero1 === 0 || this.numero1 == 1)
            return 1;
        return this.numero1 * this.factorial(this.numero1 - 1);
    };
    return Calculadora;
}());
var calculadora = new Calculadora(5, 5);
console.log(calculadora.factorial(5));
