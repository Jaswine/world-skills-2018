import React, { useContext, useEffect, useRef, useState } from 'react'
import styles from './Home.module.css'

import Header from '../../components/Header/Header'
import axios from 'axios'

const Home = () => {
   const [rangeValue, setRangeValue] = useState({min: 0, max: 100, step: 1, value: 0})  // for slider
   const [easingOptions, setEasingOptions] = useState([]) // functions
   const canvasRef = useRef(null);
   const [size, setSize] = useState(rangeValue.value)

  useEffect(() => {
   getEasingOptions() 

   const canvas = canvasRef.current;
   const ctx = canvas.getContext('2d')

   drawSetka(canvas, ctx)
   
  }, [])

   useEffect(() => {
      const canvas = canvasRef.current;
      const ctx = canvas.getContext('2d')

      drawSetka(canvas, ctx)

      easingOptions.map(item => {
         if (item.selected) {
            console.log(item.equation)
           draw(canvas, ctx, 't', item.color);
         }  else {
            draw(canvas, ctx, 't', 'transparent');
         }
       });
   }, [easingOptions])

   const draw = (canvas, ctx, formula, color) => {
      ctx.beginPath();
      const startX = 2; // Начальное значение x
      const endX = 10; // Конечное значение x
      const step = 0.1; // Шаг

      ctx.beginPath();
      ctx.arc(10, 390, 20, 0, 2 * Math.PI);
      ctx.fillStyle = color;
      ctx.fill();

      ctx.moveTo(400, 0);
      ctx.lineTo(0, 400);

      ctx.fillStyle = 'black';
      ctx.font = 'bold 24px Arial';
      ctx.textAlign = 'center';
      ctx.textBaseline = 'middle';
      ctx.fillText(size, 10, 390);

      // for (let t = startX; t <= endX; t += step) {
      //    // const y = Math.pow(t, 4); // Функция f(x) = x^4
      //    const y = eval(formula)

      //    const canvasX = 
     
         
         // if (y >= 0) {
         //   const canvasX = (t - startX) * (canvas.width / (endX - startX));
         //   const canvasY = canvas.height - (y * (canvas.height / (endX * endX * endX * endX)));
    
    
         //   if (t === startX) {
         //     ctx.moveTo(canvasX, canvasY);
         //   } else {
         //     ctx.lineTo(canvasX, canvasY);
         //   }
         //    }
         // }

         ctx.strokeStyle = color;
         ctx.stroke();
   }

   const drawSetka = (canvas, ctx) => {
   const width = canvas.width;
   const height = canvas.height;

   ctx.clearRect(0, 0, width, height);

   // X and Y draw
   ctx.beginPath();
   ctx.moveTo(0, 0);
   ctx.lineTo(0, height);
   ctx.moveTo(width, width);
   ctx.lineTo(0, height);

   ctx.lineWidth = 4;
   ctx.strokeStyle = '#FFFFFF';
   ctx.stroke();

   // SETKA DRAW
   ctx.beginPath();
   ctx.moveTo(50,500)
   ctx.lineTo(50, 2)
   ctx.moveTo(width, width-50);
   ctx.lineTo(0, height-50);
   ctx.moveTo(100,500)
   ctx.lineTo(100, 2)
   ctx.moveTo(width, width-100);
   ctx.lineTo(0, height-100);
   ctx.moveTo(150,500)
   ctx.lineTo(150, 2)
   ctx.moveTo(width, width-150);
   ctx.lineTo(0, height-150);
   ctx.moveTo(200,500)
   ctx.lineTo(200, 2)
   ctx.moveTo(width, width-200);
   ctx.lineTo(0, height-200);
   ctx.moveTo(250,500)
   ctx.lineTo(250, 2)
   ctx.moveTo(width, width-250);
   ctx.lineTo(0, height-250);
   ctx.moveTo(300,500)
   ctx.lineTo(300, 2)
   ctx.moveTo(width, width-300);
   ctx.lineTo(0, height-300)
   ctx.moveTo(350,500)
   ctx.lineTo(350, 2)
   ctx.moveTo(width, width-400);
   ctx.lineTo(0, height-400)
   ctx.moveTo(400,500   )
   ctx.lineTo(400, 2)
   ctx.moveTo(width, width-450);
   ctx.lineTo(0, height-450)
   ctx.moveTo(width, width-350);
   ctx.lineTo(0, height-350)

   ctx.lineWidth = 4;
   ctx.strokeStyle = 'rgb(254,254,254,.3)';
   ctx.stroke();
   }

   // get data from json
   const getEasingOptions = async () => {
      await axios.get('/easing-functions-subset-2.json')
         .then(res => { 
            setEasingOptions(Object.values(res.data.easingFunctions).map(item => ({ // create new massives
               description: item.description,
               equation: item.equation,
               formula: item.formula,
               text: item.text,
               selected: false,
               color: `#${parseInt(Math.random() * 1000)}`,
               level: 0
            })))
         })
   }

   // show function
   const show = () => {
      console.log('show')
   }

  return (
    <div  id='home'>
      <Header/>
     <div className={styles.home}>
      <div className={styles.easingOptions}>
         {easingOptions? (
            <div className={styles.easingOptions_all}>
               {easingOptions.map((option, item) => 
                  <div 
                     className={styles.option}
                     key={item}
                     onClick={() => {
                        const newEasingOptions = [...easingOptions]
                        newEasingOptions[item].selected = !option.selected
                        setEasingOptions(newEasingOptions)
                     }}
                     style={option.selected? {boxShadow: '0 0 10px 1px rgb(147 51 234 / var(--tw-bg-opacity)'}: {}}
                     >
                     <div className={styles.option__header}>
                        <input 
                           type="checkbox"  
                           style={option.selected? {backgroundColor: ' rgb(147 51 234 / var(--tw-bg-opacity)'}: {backgroundColor: 'rgb(31 41 55 / var(--tw-bg-opacity))'}}
                        />
                        <h3>{option.text}</h3>
                     </div>
                     <span>{option.formula}</span>
                     <p>{option.description}</p>
                  </div>
               )}
            </div>
         ) :(<div></div>)}
      </div>
      <div className={styles.chart_slider}>
         <canvas className={styles.chart} width={400} height={400} ref={canvasRef}> </canvas>
         <input 
            type="range" 
            className={styles.slider}
            min={rangeValue.min}
            max={rangeValue.max}
            value={rangeValue.value}
            step={rangeValue.step}
            onChange={e => setRangeValue({...rangeValue, value: e.target.value})}
         />
         <button onClick={show} className='btn'>Show</button>
      </div>
     </div>
     <div className={styles.up__fun}>
      <a className='btn ' href='#home'>UP</a>
     </div>
    </div>
  )
}

export default Home