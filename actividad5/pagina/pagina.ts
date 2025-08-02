class Pagina{
    private titulo:string;
    private color:string;
    private fuente:string;

    constructor(tituloParam:string, colorParam:string,fuenteParam:string){
        this.titulo = tituloParam;
        this.color = colorParam;
        this.fuente = fuenteParam;
    }

    configTitulo():string{
        
        return "Cómo deseas que aparezca el titulo?";
    }

    mostrarPropiedades():string{

        return`Titulo ${this.titulo}, color ${this.color}, fuente ${this.fuente}`;
    }
}

let pagina = new Pagina("Honey test", "red", "New Times Romans");
console.log(pagina.configTitulo());
console.log(pagina.mostrarPropiedades());

