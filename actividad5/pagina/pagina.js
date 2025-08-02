var Pagina = /** @class */ (function () {
    function Pagina(tituloParam, colorParam, fuenteParam) {
        this.titulo = tituloParam;
        this.color = colorParam;
        this.fuente = fuenteParam;
    }
    Pagina.prototype.configTitulo = function (orientacionTexto) {
        return "Tu texto se ha orientado a la " + orientacionTexto;
    };
    Pagina.prototype.mostrarPropiedades = function () {
        return "Titulo ".concat(this.titulo, ", color ").concat(this.color, ", fuente ").concat(this.fuente);
    };
    return Pagina;
}());
var pagina = new Pagina("Honey test", "red", "New Times Romans");
console.log(pagina.configTitulo("izquierda"));
console.log(pagina.mostrarPropiedades());
