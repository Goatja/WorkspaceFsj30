import { useState } from "react";

export const Cards = ({ artist, title, image }) => {
  const [isMouseOver, setIsMouseOver] = useState(false);

  return (
    <>
      <div
        onMouseEnter={() => setIsMouseOver(true)}
        onMouseLeave={() => setIsMouseOver(false)}
        className="card text-white bg-dark col-md-3 col-lg-3 col-sm-12 m-1 wrap"
      >
        <img className="card-img-top h-50" src={image} alt={`Album cover by ${artist}`} />
        <div className="card-body d-flex flex-column">
          <h4 className="card-title">{title}</h4>
          <p className="card-text">{artist}</p>
        </div>

        {isMouseOver && (
          <button className="btn btn-link p-0">
            <i className="bi bi-play-circle-fill text-info rounded fs-2"></i>
          </button>
        )}
      </div>
    </>
  );
};
