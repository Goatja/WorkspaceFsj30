import React from 'react'

export const Cards = ({artist, title, image}) => {
  return (
    <>
        <div
            className="card text-white bg-dark col-md-3 col-lg-3 col-sm-12 m-1"
        >
            <img className="card-img-top h-50" src={image} alt={artist} />
            <div className="card-body">
                <h4 className="card-title">{title}</h4>
                <p className="card-text">{artist}</p>
            </div>
            <span><i className="bi bi-play-circle-fill text-info rounded fs-1"></i></span>
        </div>
        
    </>
  )
}
