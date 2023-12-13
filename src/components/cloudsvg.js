const CloudsSVG = ({ cloudiness, isDay }) => {
    const cloudinessOpacity = 1 - cloudiness / 100;
    console.log('Cloudiness Percentage:', cloudinessOpacity);
  
    return (
        <svg
        xmlns="http://www.w3.org/2000/svg"
        width="200"
        height="100"
        viewBox="0 0 200 100"
        fill="none"
      >
        {/* Clouds */}
        <circle cx="30" cy="30" r="20" fill="white" fillOpacity={cloudinessOpacity} />
        <circle cx="70" cy="30" r="25" fill="white" fillOpacity={cloudinessOpacity} />
        <circle cx="110" cy="30" r="20" fill="white" fillOpacity={cloudinessOpacity} />
        <circle cx="150" cy="30" r="25" fill="white" fillOpacity={cloudinessOpacity} />
  
        {/* Sun */}
        {isDay && (
          <circle cx="180" cy="20" r="15" fill="yellow" />
        )}
  
        {/* Moon */}
        {!isDay && (
          <circle cx="180" cy="20" r="15" fill="gray" />
        )}
      </svg>
    );
  };
  

export default CloudsSVG;
