import React, { useState, useEffect } from "react";
import axios from "axios";
import {
  Card, Typography, Button, IconButton,
  Dialog,
  DialogHeader,
  DialogBody,
  DialogFooter,
} from "@material-tailwind/react";
import { ArrowRightIcon, ArrowLeftIcon } from "@heroicons/react/24/outline";
import { DATA_URL } from "../utils";


const Data = () => {
  const [initData, setInitData] = useState([]);
  const [active, setActive] = useState(1);
  const [currentPageData, setCurrentPageData] = useState([]);
  const [pages, setPages] = useState(0);
  const [open, setOpen] = useState(false);
  const [isLoading, setIsLoading] = useState(true);

  const handleOpen = () => setOpen(!open);

  const itemsPerPage = 10;

  // Filter state variables
  const [endYearFilter, setEndYearFilter] = useState("");
  const [topicsFilter, setTopicsFilter] = useState("");
  const [sectorFilter, setSectorFilter] = useState("");
  const [regionFilter, setRegionFilter] = useState("");
  const [pestFilter, setPestFilter] = useState("");
  const [sourceFilter, setSourceFilter] = useState("");
  const [countryFilter, setCountryFilter] = useState("");
  const [cityFilter, setCityFilter] = useState("");


  const getItemProps = (index) => ({
    variant: active === index ? "filled" : "text",
    color: "gray",
    onClick: () => setActive(index),
    className: "rounded-full",
  });

  const importantVariables = [
    'No',
    'Intensity',
    'Likelihood',
    'Relevance',
    'Year',
    'Country',
    'Topic',
    'Region',
    'City',
  ];

  const getData = async () => {
    const { data } = await axios.get(`${DATA_URL}`);
    setInitData(data);
  };

  const getFullYear = (str) => {
    const date = new Date(str);
    const year = date.getFullYear().toString();
    return year;
  }


  initData.map((item) => {
    const added = getFullYear(item.added);
    item.added = added;
    const endYear = getFullYear(item.added);
    item.added = endYear;
    const startYear = getFullYear(item.start_year);
    item.start_year = startYear;

  })

  const next = () => {
    if (active === Math.ceil(totalResults / itemsPerPage)) return;
    setActive(active + 1);
  };

  const prev = () => {
    if (active === 1) return;
    setActive(active - 1);
  };

  useEffect(() => {
    getData();
    setInterval(()=>{
      setIsLoading(false)
    },2500)
 
  }, []);

  function extractUniqueProperty(data, propertyName) {
    const uniqueValues = new Set();

    data.forEach((item) => {
      const value = item[propertyName];
      if (value) {
        uniqueValues.add(value);
      }
    });


    const uniquePropertyValues = Array.from(uniqueValues);

    return uniquePropertyValues;
  }



  const uniqueYear = extractUniqueProperty(initData, "added");
  const uniqueTopic = extractUniqueProperty(initData, "topic");
  const uniqueSector = extractUniqueProperty(initData, "sector");
  const uniqueRegion = extractUniqueProperty(initData, "region");
  const uniquePestle = extractUniqueProperty(initData, "pestle");
  const uniqueSource = extractUniqueProperty(initData, "source");

  const uniqueCountry = extractUniqueProperty(initData, "country");



  useEffect(() => {

    const filteredData = initData.filter((item) => {
      return (
        (endYearFilter === "" || item.added === endYearFilter) &&
        (topicsFilter === "" || item.topic === topicsFilter) &&
        (sectorFilter === "" || item.sector === sectorFilter) &&
        (regionFilter === "" || item.region === regionFilter) &&
        (pestFilter === "" || item.pestle === pestFilter) &&
        (sourceFilter === "" || item.source === sourceFilter) &&
        (countryFilter === "" || item.country === countryFilter) &&
        (cityFilter === "" || item.city === cityFilter)
      );

    });

    // Update the current page data with filtered data
    setCurrentPageData(filteredData.slice((active - 1) * itemsPerPage, active * itemsPerPage));
    setPages(Math.ceil(filteredData.length / itemsPerPage));
    setOpen(false)

    if (active == 0) {
      setPages(0)
    }

  }, [
    active,
    initData,
    endYearFilter,
    topicsFilter,
    sectorFilter,
    regionFilter,
    pestFilter,
    sourceFilter,
    countryFilter,
    cityFilter,
    pages
  ]);
  const totalResults = initData.length;
  if (pages == 0) {
    setActive(1)
    setPages(1)
  }
  return (
    <>
      {isLoading ? 'Loading....' : (
        <>  <div className="mb-4 flex justify-space-between">

          <>
            <Button onClick={handleOpen} variant="gradient">
              Open Filters
            </Button>
            <Dialog open={open} handler={handleOpen}>
              <DialogHeader>Choose Filter</DialogHeader>
              <DialogBody divider>
                <label>Year</label>
                <select id="years" size="1" value={endYearFilter}
                  onChange={(e) => setEndYearFilter(e.target.value)}
                  label="End Year" aria-label="denver" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                  <option value=""></option>
                  {
                    uniqueYear.map((item) => (
                      <option value={item}>{item}</option>

                    ))}
                </select>
                <label>Topic </label>
                <select id="years" size="1" value={topicsFilter}
                  onChange={(e) => setTopicsFilter(e.target.value)}
                  label="End Year" aria-label="denver" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                  <option value=""> </option>
                  {
                    uniqueTopic.map((item) => (
                      <option value={item}>{item}</option>

                    ))}
                </select>
                <label>Sector</label>
                <select id="years" size="1" value={sectorFilter}
                  onChange={(e) => setSectorFilter(e.target.value)}
                  label="End Year" aria-label="denver" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                  <option value=""></option>
                  {
                    uniqueSector.map((item) => (
                      <option value={item}>{item}</option>

                    ))}
                </select>
                <label>Region</label>
                <select id="years" size="1" value={regionFilter}
                  onChange={(e) => setRegionFilter(e.target.value)}
                  label="End Year" aria-label="denver" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                  <option value=""></option>
                  {
                    uniqueRegion.map((item) => (
                      <option value={item}>{item}</option>

                    ))}

                </select>
                <label>PESTLE</label>
                <select id="years" size="1" value={pestFilter}
                  onChange={(e) => setPestFilter(e.target.value)}
                  label="End Year" aria-label="denver" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                  <option value=""></option>
                  {
                    uniquePestle.map((item) => (
                      <option value={item}>{item}</option>

                    ))}

                </select>
                <label>Source</label>
                <select id="years" size="1" value={sourceFilter}
                  onChange={(e) => setSourceFilter(e.target.value)}
                  label="End Year" aria-label="denver" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                  <option value=""></option>
                  {
                    uniqueSource.map((item) => (
                      <option value={item}>{item}</option>

                    ))}

                </select>
                <label>Country</label>
                <select id="years" size="1" value={countryFilter}
                  onChange={(e) => setCountryFilter(e.target.value)}
                  label="End Year" aria-label="denver" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                  <option value=""> </option>
                  {
                    uniqueCountry.map((item) => (
                      <option value={item}>{item}</option>

                    ))}
                </select>
              </DialogBody>

            </Dialog>
          </>


        </div>
          <Card className="h-full w-full overflow-scroll dark:bg-black">
            {/* Filters */}


            <table className="w-full min-w-max table-auto text-left">
              <thead>
                <tr>
                  {importantVariables.map((variable) => (
                    <th
                      key={variable}
                      className="border-b border-blue-gray-100 bg-blue-gray-50 p-4"
                    >
                      <Typography
                        variant="small"
                        color="blue-gray"
                        className="font-normal leading-none opacity-70"
                      >
                        {variable}
                      </Typography>
                    </th>
                  ))}
                </tr>
              </thead>
              <tbody>
                {currentPageData.map((item, index) => (
                  <tr key={index} className="even:bg-gray-50">
                    <td className="p-4 border-b border-blue-gray-50">
                      {index + 1}
                    </td>
                    {importantVariables.slice(1).map((variable) => (
                      <td className="p-4 border-b border-blue-gray-50 " key={variable}>
                        <Typography variant="small" color="blue-gray" className="font-normal">
                          {
                            variable.toLowerCase() === 'year' ? item['added'] : item[variable.toLowerCase()]}
                        </Typography>
                      </td>
                    ))}
                  </tr>
                ))}
              </tbody>
            </table>
          </Card>

          <div className="flex items-center justify-center h-4 my-4 gap-8">
            <IconButton
              size="sm"
              variant="outlined"
              onClick={prev}
              disabled={active === 1}
            >
              <ArrowLeftIcon strokeWidth={2} className="h-4 w-4" />
            </IconButton>
            <Typography color="gray" className="font-normal">
              Page <strong className="text-gray-900">{active}</strong> of{" "}
              <strong className="text-gray-900">{pages}</strong>
            </Typography>
            <IconButton
              size="sm"
              variant="outlined"
              onClick={next}
              disabled={active === pages}
            >
              <ArrowRightIcon strokeWidth={2} className="h-4 w-4" />
            </IconButton>
          </div></>)}

    </>
  );
};

export default Data;


