import { useState } from "react"


export const Player = () => {
    const [isLiked, setIsLiked] = useState(false);


  return (
    <>
        <div className="container-fluid d-flex justify-content-around text-light bg-dark shadow" style={{height:'15dvh', width:'100vw'}}>
            <section className="icons1 w-25 h-100">
            
            </section>
            <section className="icons2 h-100 w-50 d-flex justify-content-center align-items-center flex-column bg-light-dark">
                <section className=""> 
                <i className="bi bi-rewind-circle fs-1 m-2"></i>
                <i className="bi bi-play-circle fs-1 m-2"></i>
                <i className="bi bi-fast-forward-circle fs-1 m-2"></i>
                </section>
                <progress id="file" max="100" value="70" style={{width:'80%'}}>70%</progress>
            </section>
            <section className="icons3 h-100 w-25 pt-5 ps-3">
                <section className="w-25" onClick={() => {
                   return !isLiked ? setIsLiked(true) : setIsLiked(false);
                }}> {isLiked ? <i className="bi bi-hand-thumbs-up-fill fs-3"></i> : <i className="bi bi-hand-thumbs-up fs-3"></i>} 
                </section>
            </section>
        </div>
    </>
  )
}
