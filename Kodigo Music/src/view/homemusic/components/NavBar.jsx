import { NavLink } from "react-router"


export const NavBar = () => {
   

    
  return (
    <div className="rounded d-flex justify-content-around mt-1 shadow bg-dark hover-overlay" style={{width:'100%', height:'5em'}}>
        <i className="bi bi-house-door text-light fs-1 "></i>
        <input className="w-50 border-style rounded mt-1 text-light" type="text"  style={{height:'3em'}}/>
        <i className="bi bi-bell text-light fs-1"></i>
        <NavLink className='nav-link text-light fs-5 hover-shadow' to='/register'><span className="nav-item">Sign up</span></NavLink>
    </div>
  )
}
