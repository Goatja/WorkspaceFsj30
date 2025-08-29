import { NavLink } from "react-router";

export const NavBar = () => {
  return (
<div
      className="rounded d-flex align-items-center justify-content-between shadow bg-dark px-4"
      style={{ width: "100%", height: "5em" }}
    >
      {/* Icono de home*/}
      <NavLink to="/" className="movil text-light text-decoration-none">
        <i className="bi bi-house-door fs-4 rounded-pill" style={{background:'onyx'}}></i>
      </NavLink>

    
      <div className="position-relative w-50">
        <i
          className="bi bi-search text-success position-absolute"
          style={{ top: "50%", left: "10px", transform: "translateY(-50%)" }}
        ></i>
        <input
          type="text"
          className="form-control ps-5 text-dark "
          placeholder="Buscar música..."
          style={{ height: "3em" }}
        />
      </div>

  
      <div className="d-flex align-items-center gap-4">
        <i className=" movil bi bi-bell text-light fs-4"></i>
        <NavLink title="Sign up" className="nav-link text-light fs-5 hover-shadow" to="/register">
          <span className="movil">Sign up</span>
          <i className="bi bi-person-circle movil-see me-1 "></i>
        </NavLink>
      </div>
    </div>
  );
};
