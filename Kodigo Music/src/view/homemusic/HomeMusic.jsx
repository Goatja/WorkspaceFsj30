import { Cards } from "./components/Cards";
import { ListMusic } from "./components/ListMusic";
import { NavBar } from "./components/NavBar";
import { Player } from "./components/Player";
import { SideBar } from "./components/SideBar";

export const HomeMusic = () => {
  return (
    <>
      <main className="color-fondo-primario d-block" style={{width:'100vw', height:'100dvh', overflowX:'hidden'}}>
        <article className="row">
          <section className="movil col-lg-2 col-md-4" style={{height:'80dvh'}}>
            <SideBar />
          </section>
          <section className="col-md-12 col-lg-10 col-sm-12">
            <NavBar />
            <ListMusic />
          </section>
        </article>

        <footer className="position-fixed bottom-0">
          <Player />
        </footer>
      </main>
    </>
  );
};
