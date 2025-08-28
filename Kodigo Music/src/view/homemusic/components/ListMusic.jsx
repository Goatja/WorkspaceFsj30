import { useEffect, useState } from "react"
import songs from '../../../data/music.json'
import { Cards } from "./Cards"


export const ListMusic = () => {

    const [listSongs, setListSongs] = useState([]);
    useEffect(() => {
        setListSongs(songs);
    })
    
    
    
  return (
    <>
       <div className="row m-1 d-flex justify-content-center">
        {listSongs.map(song => (
            <Cards key={song.id} image={song.image} artist={song.artist} title={song.title}/>
        ))}
       </div>
    </>
  )
}
