import React from 'react'
import styles from './About.module.css'

const About = ({right, isMobile}) => {
  return (
    <div className={styles.about}  style={isMobile? {top: right} :{right: right}}>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque molestias expedita, iste tempora accusantium et veritatis! Fugiat cupiditate eaque tenetur, deleniti optio debitis accusamus? Pariatur quo minima doloribus maiores distinctio? Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt aspernatur delectus dicta incidunt laudantium esse? Laudantium, similique unde? Sit eaque nihil esse doloribus voluptatem quod in unde amet perspiciatis saepe.</p>
    </div>
  )
}

export default About