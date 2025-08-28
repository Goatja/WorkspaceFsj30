
import './App.css'
import {BrowserRouter, Route, Routes} from 'react-router'
import { HomeMusic } from './view/homemusic/HomeMusic'
import { RegisterView } from './view/register/RegisterView'
function App() {
  
  return (
    <>
    <BrowserRouter>
      <Routes>
        <Route path='/' element={<HomeMusic/>} />
        <Route path='/register' element={<RegisterView/>} />
      </Routes>
    
    </BrowserRouter>
     
    </>
  )
}

export default App
