
/* 
EJERCICIO 3. Crea una clase llamada Canción: 
Atributos: título, género de la canción y un atributo privado que se llame autor. 
Métodos:  
• Crear un constructor que reciba como parámetros el título y género de la canción. 
• Utiliza los métodos get y set para recibir e imprimir la propiedad autor.  
• Crea un método para mostrar los datos de la canción.  
*/
class Cancion{
    public titulo:string;
    public genero:string;
    private autor:string;

    constructor(tituloParam:string, generoParam:string){
        this.titulo = tituloParam;
        this.genero = generoParam;
    }

    //Getters y Setters para agregar y obtener la propiedad del autor
    setAutor(autorParam){
        this.autor = autorParam;
    }

    getAutor():string{
        return this.autor;
    }

    //Metodo que muestra los datos de la cancion.
    mostrarDatosCancion():string{

        return `Titulo : ${this.titulo}, Genero : ${this.genero}, Autor : ${this.getAutor()} `;
    }
}

let cancion = new Cancion("La paellara", "Pop");
cancion.setAutor("Micahel MackPerson");
console.log(cancion.mostrarDatosCancion());
