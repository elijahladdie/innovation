import {  useState } from "react";

import Swal from "sweetalert2";
import GetData from "./components/GetData";


const App = () => {
  const [value, setValue] = useState('');
  const [weatherData, setWeatherData] = useState({});
  const [loading, setLoading] = useState(true)
  

  const getData = async () => {
    try{
      const response = await fetch(`https://api.weatherapi.com/v1/current.json?key=17350559b0864dbe8b872846231312&q=${value}`);
      if (!response.ok) {
        return Swal.fire({
          title: "🤔🤔🤔🤔🤔🤔",
          text: `Location not found, Use different location💡`,
          icon: "error"
        });
      } 
     const data = await response.json();
     
     setWeatherData(data);
     setLoading(false);
     
    } catch(error) {
      return Swal.fire({
        title: "🤔🤔🤔🤔🤔🤔",
        text: `${error.message}`,
        icon: "error"
      });
    }
  }
  const handleClick = () => {
    if (value !== "") {
      getData();
    }else{
        return Swal.fire({
          title: "🤔🤔🤔🤔🤔🤔",
          text: `Reminder💡 provide the city name🙂`,
          icon: "error"
        });
      
    }
  }
  return (
    <div className="bg-gradient-to-r  from-cyan-500 to-blue-500 h-screen flex items-center justify-evenly flex-col ">
        <h1 className="font-tahoma text-2xl transition-shadow drop-shadow-lg hover:drop-shadow-lg rounded-lg text-white  border-slate-600 p-6 bg-gradient-to-tl">
          Weather app
        </h1>
      <div className="flex justify-center">

        <div
          className="card  min-w-sm max-w-md  h-md transition-shadow test shadow-lg hover:shadow-shadow-xl w-full bg-gradient-to-l from-cyan-500 to-blue-500 text-purple-50 rounded-md">

          <div className="relative">
            <div className="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
              <svg className="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
              </svg>
            </div>
            <input type="search" id="search" onInput={(e) => setValue(e.target.value)} className="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search" required />
            <button type="submit" className="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800  font-medium rounded-lg text-sm px-4 py-2 " onClick={handleClick}>Search</button>
          </div> 
          {loading  ?  <p className="p-5 text-center"> 👆 Search location </p> : <GetData weatherData={weatherData}/>}
          

        </div>
      </div>

    </div>
  );
}

export default App;
