import React from 'react'
import ReactDOM from 'react-dom/client'
import './index.css'
import { BrowserRouter, Routes, Route } from 'react-router-dom'
import Home from './pages/Home/Home'
import NotFound from './pages/PageNotFound/NotFound'

ReactDOM.createRoot(document.getElementById('root')).render(
  <BrowserRouter>
    <React.StrictMode>
      <Routes>
        <Route path='/XX_TP_A' element = {<Home/>}/>
        <Route path='*' element = {<NotFound/>}/>
      </Routes>
    </React.StrictMode>
  </BrowserRouter>
)
