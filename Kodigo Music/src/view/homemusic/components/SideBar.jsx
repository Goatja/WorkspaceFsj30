
export const SideBar = () => {

   
  return (
    <div className=" bg-dark m-1 d-flex align-items-center flex-column gap-1 rounded shadow h-100 mb-1" >
        <i title="Home" className="bi bi-vinyl fs-4 text-light m-2"></i>
        <i className="bi bi-music-note-list fs-4 text-light"></i>
      <section className="h-75 d-flex align-items-end">
       <i title="Settings" className="bi bi-gear fs-3 text-light"></i>
      </section>
    </div>
  )
}
