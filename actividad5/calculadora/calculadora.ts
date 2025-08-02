class Calculadora{
    private numero1:number;
    private numero2:number;

    constructor(numero1Pa:number, numero2Pa:number){
        this.numero1 = numero1Pa;
        this.numero2 = numero2Pa;
    }

    //Metodo de suma
    suma(numero1Param:number, numero2Param:number):number{
        this.numero1 = numero1Param;
        this.numero2 = numero2Param;
        let suma = this.numero1 + this.numero2;
        return suma;
    }

    //Metodo de resta
    resta(numero1Param:number, numero2Param:number):number{
        this.numero1 = numero1Param;
        this.numero2 = numero2Param;
        let resta = this.numero1 - this.numero2;
        return resta;
    }

    //Metodo de multiplicacion
    multiplicar(numero1Param:number, numero2Param:number):number{
        this.numero1 = numero1Param;
        this.numero2 = numero2Param;
        let multiplicacion = this.numero1 * this.numero2;
        return multiplicacion;
    }

    //Metodo de division
    divividir(numero1Param:number, numero2Param:number):number{
        this.numero1 = numero1Param;
        this.numero2 = numero2Param;
        let divicion = this.numero1 / this.numero2;
        return divicion;
    }

    //Metodo de potencia
    potenciacion(numero1Param:number, numero2Param:number):number{
        this.numero1 = numero1Param;
        this.numero2 = numero2Param;
        let potencia = this.numero1 ** this.numero2;
        return potencia;
    }

    //Metodo para factorial
    factorial(numero1Param:number):number{
       this.numero1 = numero1Param;
       if (this.numero1 === 0 || this.numero1 == 1)return 1;
       return this.numero1 * this.factorial(this.numero1 - 1);
    }

}

let calculadora = new Calculadora(5,5);
console.log(calculadora.factorial(5));



