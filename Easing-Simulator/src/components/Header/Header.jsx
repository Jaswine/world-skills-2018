import React, { useEffect, useState } from 'react'
import styles from './Header.module.css'
import About from '../About/About'

const Header = () => {
  const [aboutRight, setAboutRight] = useState('-100%')
  const [isMobile, setIsMobile] = useState(false);

  useEffect(() => {
    const handleResize = () => {
      const isMobile = window.innerWidth <= 700; 
      setIsMobile(isMobile);
    };

    handleResize(); // Проверить размер окна при первой загрузке

    window.addEventListener('resize', handleResize); // Слушать изменения размера окна

    return () => {
      window.removeEventListener('resize', handleResize); // Удалить обработчик при размонтировании
    };
  }, [])

  return (
    <div className={styles.header}>
      <button className='btn' onClick={() => {aboutRight == '-100%' ? setAboutRight('7%'): setAboutRight('-100%') }}>
        {isMobile? 'I' : 'About'}
      </button>
      <About right={aboutRight} isMobile={isMobile} />
    </div>
  )
}

export default Header