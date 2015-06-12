function getSunupSunDown(location,lat,lon,date){



	lat = '&lat='+lat
	lon = '&lon='+lon
	lon = '&date='+date
	reqUrl = "http://http://54.173.222.46/sunupdown/?"+lat+lon+date

    console.log(reqUrl)
    return $.ajax({
        type: 'GET',
        url: reqUrl,  
        dataType: 'jsonp',        
        success: function(result){
            var text = '';
            var len = result.length;            
        }
    });  


}