import React from 'react'
import styles from './NotFound.module.css'

// Not Found Page
const NotFound = () => {
  return (
    <div className={styles.NotFound}> 
      <h2>Page Not Found, but u can go here: 
         <a className='link' href='XX_TP_A'>XX_TP_A</a>
         </h2>
    </div>
  )
}

export default NotFound