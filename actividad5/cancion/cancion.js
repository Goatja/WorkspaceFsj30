/*
EJERCICIO 3. Crea una clase llamada Canción:
Atributos: título, género de la canción y un atributo privado que se llame autor.
Métodos:
• Crear un constructor que reciba como parámetros el título y género de la canción.
• Utiliza los métodos get y set para recibir e imprimir la propiedad autor.
• Crea un método para mostrar los datos de la canción.
*/
var Cancion = /** @class */ (function () {
    function Cancion(tituloParam, generoParam) {
        this.titulo = tituloParam;
        this.genero = generoParam;
    }
    //Getters y Setters para agregar y obtener la propiedad del autor
    Cancion.prototype.setAutor = function (autorParam) {
        this.autor = autorParam;
    };
    Cancion.prototype.getAutor = function () {
        return this.autor;
    };
    //Metodo que muestra los datos de la cancion.
    Cancion.prototype.mostrarDatosCancion = function () {
        return "Titulo : ".concat(this.titulo, ", Genero : ").concat(this.genero, ", Autor : ").concat(this.getAutor(), " ");
    };
    return Cancion;
}());
var cancion = new Cancion("La paellara", "Pop");
cancion.setAutor("Micahel MackPerson");
console.log(cancion.mostrarDatosCancion());
