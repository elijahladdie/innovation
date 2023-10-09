import React from 'react';
import { Chart as ChartJS, ArcElement, Tooltip, Legend } from 'chart.js';
import { Doughnut } from 'react-chartjs-2';
import Data from '../components/Data';

const Dashboard = () => {


    return (
        <div className='dark:text-white'>
            <Data/>
            </div>
        )
}

export default Dashboard


