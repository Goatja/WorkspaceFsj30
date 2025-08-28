import { Cards } from "./components/Cards";
import { ListMusic } from "./components/ListMusic";
import { NavBar } from "./components/NavBar";
import { Player } from "./components/Player";
import { SideBar } from "./components/SideBar";

export const HomeMusic = () => {
  return (
    <>
      <main className="row color-fondo-primario" style={{width:'100vw', height:'85dvh'}}>
        <section className="col-lg-2 h-100">
            <SideBar />
        </section>
        <section className="col-md-10">
            <NavBar />
            <ListMusic />
        </section>

      </main>
      <footer>
            <Player />
      </footer>
    </>
  );
};
