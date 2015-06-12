/* 
 * TERMS OF USE - for http://obxsurfinfo.com/ - Surf info graphic 
 * Copyright 2014 RPS - ASA All rights reserved.
 */

function updateWidget(station){

  currentStation = station

  var today = new Date();

  //total height
  var widget_width = 850
  var widget_height = 400

  var module_spacing = 0

  var ts_width = (widget_width*0.8)
  var met_data_width = widget_width*0.2

  //spacing between the days
  var day_spacing = 2

  var ts_height = 150
  var title_height = 15
  var day_label_height = 40

  var num_forecast_day = 5
  var day_width = (ts_width/(num_forecast_day))+1

  var day_text_height = 38

  var weekday = new Array(7);
  weekday[0]=  "SUNDAY";
  weekday[1] = "MONDAY";
  weekday[2] = "TUESDAY";
  weekday[3] = "WEDNESDAY";
  weekday[4] = "THURSDAY";
  weekday[5] = "FRIDAY";
  weekday[6] = "SATURDAY";

  //number of x blocks per day
  var number_blocks_day = 4

  /*
  DateTime
  */
  var spacing_between_icon_dt = 15
  var left_icon_space = 5

  //number of rows per day, should be based on the ticks of the yaxis
  var num_rows_in_day = 4

  //rect row height
  ts_row_left_over = ts_height - (title_height+day_label_height)
  var row_height_wave = ts_row_left_over/num_rows_in_day
  ts_row_left_over = ts_height - day_label_height
  var row_height_wind = ts_row_left_over/num_rows_in_day

  var margin = {top: 20, right: 20, bottom: 30, left: 50},
      width = 960 - margin.left - margin.right,
      height = 500 - margin.top - margin.bottom;

  var svg = d3.select("#widget").append("svg")
      .attr("id","mainwidget")
      .attr("width", ts_width+met_data_width+100)
      .attr("x", 0)
      .attr("y", 0)
      .attr("height", widget_height)
      .append("g")
      .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

  defs = getDefs()

  // add left bar
  svg.append("rect")
      .attr("x", 0)
      .attr("y", 10)
      .attr("height", widget_height-97)   
      .style("fill", "white")
      .style("stroke", "black") 
      .attr("width", met_data_width);

  lb_title_y = 10

  //add left bar title
  svg.append("rect")
      .attr("x", 0)
      .attr("y", 10)
      .attr("class","titleBlackTitleBackgound")
      .attr("height", title_height)
      .attr("width", met_data_width);  
  

  svg.append("text")
        .text(getMetaDataTitle(today,weekday))
        .attr("class","titeText")
        .style("fill","white")
        .attr("id", "metadatatitle")
        .attr("x", 30)
        .attr("y", 21)

  //add water temp section
  water_width = 65
  water_height = 65
  water_top= 180
  water_x = met_data_width-(water_width+1)+49 //added the 50 to make it
  addWaterTemp(svg, water_x , water_top ,water_width, water_height);  

  // add meta data section
  svg.append("rect")
      .attr("x", 0.5)
      .attr("y", lb_title_y+title_height+0.5)
      .attr("class","metadataTitleBackgound")
      .attr("id","curConditionsRect")
      .attr("height", 90)
      .attr("width", met_data_width-(water_width+3));  

  /*
  //create the main plot module outline
  svg.append("rect")
      .attr("x", met_data_width+module_spacing-1)
      .attr("y", 10)
      .attr("height", ts_height)
      .style("fill", "transparent")
      .style("stroke", "black")
      .attr("width", ts_width+1);
      */

  //create the windspeed plot module outline
  svg.append("rect")
      .attr("x", met_data_width+module_spacing)
      .attr("y", 10)
      .attr("height", ts_height*2+3)
      .style("fill", "transparent")
      .style("stroke", "black")
      .attr("width", ts_width-8);

  //create the ts plot
  svg.append("rect")
      .attr("x", met_data_width+module_spacing)
      .attr("y", 10)
      .attr("class","blueTitleBackgound")
      .attr("height", title_height)
      .attr("width", ts_width-8);


  //create the ts plot
  
  svg.append("rect")
      .attr("x", met_data_width+module_spacing+0.5)
      .attr("y", ts_height+6)
      .attr("class","blackTitleBackgound")
      .attr("height", title_height)
      .attr("width", ts_width-8);    
      

  wavetitles = ["WAVE HEIGHT (FEET)","5-Day Surf Forecast","Powered by WaveForce Technologies"]

  for (var i = 0; i < wavetitles.length; i++) {
     if (i==2){

      svg.append("a")
        .attr("xlink:href", "http://www.waveforcetechnologies.com/")
        .append("rect")  
        .attr("x", met_data_width+module_spacing+((ts_width/3)*i)+25)
        .attr("y", 10)
        .attr("height", 15)
        .attr("width", 180)
        .style("fill", "transparent");

      svg.append("text")
        .text(wavetitles[i])       
        .attr("class","titeText")
        .style("fill","white")
        .attr("x", met_data_width+module_spacing+((ts_width/3)*i)+35)
        .attr("y", 21)
        .style("pointer-events", "none");
     }else{
     svg.append("text")
        .text(wavetitles[i])
        .attr("class","titeText")
        .style("fill","white")
        .attr("x", met_data_width+module_spacing+((ts_width/6)*i)+5)
        .attr("y", 21)
      }
  };

  windtitles = ["WIND SPEED (MPH)","5-Day Wind Forecast",""]

  for (var i = 0; i < windtitles.length; i++) {
     svg.append("text")
        .text(windtitles[i])
        .attr("class","titeText")
        .style("fill","white")
        .attr("x", met_data_width+module_spacing+((ts_width/6)*i)+5)
        .attr("y", ts_height+17)
  };

  //create day of the week image
  for (var i = 0; i < num_forecast_day; i++) {
    //create the labels
    var forcast_date = moment().add(i, 'days')    
    var dayOW = weekday[forcast_date.day()];
    var times = SunCalc.getTimes(forcast_date.toDate(), 41, -72); 
    if (i == num_forecast_day-1){
      day_spacing = 0
      drawDayGrid(svg,i,num_forecast_day,dayOW,times,day_width,met_data_width,module_spacing,day_label_height,day_spacing,row_height_wave,day_text_height,forcast_date.toDate(),row_height_wind)                         
    } else{    
      drawDayGrid(svg,i,num_forecast_day,dayOW,times,day_width,met_data_width,module_spacing,day_label_height,day_spacing,row_height_wave,day_text_height,forcast_date.toDate(),row_height_wind)                         
    }
  };

  //add current information 
  currentData = getCurrentConditions(currentStation,water_x,water_top,water_width,met_data_width);
  //add time series information
  
  var tsData = getTsData(currentStation)
    .done(function(data) {   
      data = data['d']      

      x_offset = 50
      y_offset = 20

      //identify scale
      max_type = []    
      max_type["windspd"]= Number.MIN_VALUE;
      max_type["wavehs"]= Number.MIN_VALUE;
      $.each( data, function( index, value ){          
          if (value[5] > max_type["windspd"]){
            max_type["windspd"] = value[5]
          }

          if (value[2] > max_type["wavehs"]){
            max_type["wavehs"] = value[2]
          }                                        
      });

      //choose selection of max value
      if (max_type["windspd"] > 26.2){
        max_type["windspd"] = 53
      }else{
        max_type["windspd"] = 26.2
      }
      
      if (max_type["wavehs"] > 8.5){
        max_type["wavehs"] = 16
      }else{
        max_type["wavehs"] = 8.5
      }

      $('#curConditionsRect').attr("maxval",max_type["wavehs"]);

      x = met_data_width+x_offset
      y = (day_label_height+title_height+y_offset)              
      plotData(x,y,ts_height+1,ts_width-5,'wavehs',data,max_type["wavehs"]);     
      $( "#wavehs-plot-y-grid .tick:first-child" ).css({'opacity':0});


      x = (met_data_width+x_offset)
      y = (ts_height+title_height+10+y_offset)
      plotData(x,y,ts_height+38,ts_width-5,'windspd',data,max_type["windspd"]);
      //hides the bottom tick
      $( "#windspd-plot-y-grid .tick:first-child" ).css({'opacity':0});

   }).fail(function() {
      //alert( "error getting data" );
    });

   //add wind types
   addWindTypes(met_data_width,module_spacing,ts_width,ts_height);

  $.when( tsData, currentData).done(function ( tsData, currentData) {       
        wavehs = $('#curConditionsRect').attr("val")
        max_hs = $('#curConditionsRect').attr("maxval")
        waveHeightMan(svg,water_x,26,water_width,water_top-25,wavehs,max_hs)        
  }); 
}

function getCurrentConditions(station,water_x,water_top,water_width,met_data_width){
    req = "shortname="+currentStation
    reqUrl = "http://54.173.222.46/services/currentconditions/?"+req    
    return $.ajax({
        type: 'GET',
        url: reqUrl,  
        dataType: 'jsonp',
      })
      .done(function( current ) {        
        var svg  =  d3.select("#mainwidget")

        windType = current['wind']['wind_status']
        //get the wind type and reset the value
        if (windType == 0){
          wind_status = "Clean"          
          $("#curConditionsRect").attr("class", "metadataTitleBackgoundGreen");
        }else if(windType == 1){ 
          wind_status = "Semi Choppy"          
          $("#curConditionsRect").attr("class", "metadataTitleBackgoundYellow");
        }else if(windType == 2){ 
          wind_status = "Choppy"                
          $("#curConditionsRect").attr("class", "metadataTitleBackgoundRed");
        }        

        wavehs = current['wave']['waveheight']
        //add metadata
        addMetaDataInfo(svg,wavehs.toFixed(1),
                      Math.round(current['wave']['waveperiod']),
                      current['wave']['wavedir'],                    
                      wind_status,met_data_width)
        //add tempdata
        water_temp = parseFloat(current['temp']['watertemp']).toFixed(0)
        $('#waterTempText').text(water_temp+"°");
                
        //add the wave man       
        if (wavehs > 8.5){
          max_hs = 13
        }else{
          max_hs = 8.5
        }

        $('#curConditionsRect').attr("val",wavehs);     
        //add gust information          
        addWindInformation(met_data_width,water_width,current['wave']['winddir'],Math.round(current['wave']['windspeed']),windType,Math.round(current['wave']['windspeed']*1.3))
        //add tide information         
        addTideChart(current['tide'])
      });   

  }

function addMetaDataInfo(svg,wvHeigt,wvTp,waveDir,conditions,met_data_width){
  var svg  =  d3.select("#mainwidget")
  g = svg.append('g')  
  labels = ['SURF:','DIRECTION/PERIOD','SURFACE CONDITIONS']
  //content = [wvHeigt+"'",'NE/9Sec','Clean']

  content = [wvHeigt+"'",degToCompass(waveDir)+'/'+wvTp+' Sec',conditions]
  
  y_offset = 25
  x_offset = 55
  y_inital = 50

  for (var i = 0; i < labels.length; i++) {    
      if (i == 0){
          g.append("text")
          .text(labels[i])
          .attr("width",50)    
          .attr("height",20)
          .attr("class","metaLabel")
          .style("font-size","7px")
          .style("text-anchor","middle")
          .attr("x", x_offset+met_data_width/4)
          .attr("y", (y_inital+5)+(y_offset*i));

          g.append("text")
          .text(content[i])
          .attr("width",50)    
          .attr("height",20)
          .attr("class","metaLabelTitle")
          .style("font-size","22px")
          .style("text-anchor","middle")
          .attr("x", x_offset+met_data_width/4)
          .attr("y", (y_inital)+(y_offset*(i+1)));
              
      } else{
          g.append("text")
        .text(labels[i])
        .attr("width",50)    
        .attr("height",20)
        .attr("class","metaLabel")
        .style("font-size","7px")
        .attr("x", x_offset+met_data_width/4)
        .style("text-anchor","middle")
        .attr("y", (y_inital+10)+(y_offset*i));

        g.append("text")
        .text(content[i])
        .attr("width",50)    
        .attr("height",20)
        .attr("class","metaLabelTitle")
        .style("font-size","13px")
        .style("text-anchor","middle")
        .attr("x", x_offset+met_data_width/4)
        .attr("y", (y_inital)+(y_offset*(i+1)));
        }      
    };
}

function swapWaveDirection(waveDir){
  waveDir +=180
  
  if (waveDir > 360){
    waveDir -= 360  
  }
  return waveDir
}


function addWindInformation(met_data_width,water_width,windDir,windSpdVal,windType,gustVal){        

    windDir = swapWaveDirection(windDir);
    //add wind gust information
    dist = 30
    x_start = 94
    y_start = 176

    radians = windDir * (Math.PI/180)
    x = x_start + (dist*Math.sin(radians))
    y = y_start - (dist*(Math.cos(radians)))  


    var svg  =  d3.select("#mainwidget")
    x_offset = 50
    y_offset = 20
    rectHeight = 109

    svg.append("rect")
        .attr("x", x_offset+0.5)
        .attr("y", y_offset+115)
        .attr("class","blackTitleBackgound")
        .attr("height", rectHeight)
        .attr("width", met_data_width-(water_width+3));  

    rectWidth = met_data_width-(water_width+3)
    gustStr = "Gusts: "+ gustVal +" mph"
    svg.append("text")
        .attr("x", (x_offset+rectWidth/2)-gustStr.length-20)
        .attr("y", (y_offset+115)+rectHeight-5)
        .text(gustStr)
        .attr("id","gustTextLabel")
        .attr("class","whiteTextLabel");  

    
    wind_image = ""
    if (windType == 0){
      wind_image = "http://localhost:8888/obxsurf/wp-content/themes/html5blank/src/static/clean.png"
    }else if(windType == 1){ 
      wind_image = "http://localhost:8888/obxsurf/wp-content/themes/html5blank/src/static/semi-choppy.png"
    }else if(windType == 2){ 
      wind_image = "http://localhost:8888/obxsurf/wp-content/themes/html5blank/src/static/choppy.png"
    }
   

    svg.append("image")
        .attr("xlink:href", wind_image)
        .attr("x", x_offset+5)
        .attr("y", y_offset+122)
        .attr("width", met_data_width-(water_width+3))   
        .attr("height", 100);

    d_angle = windDir
    d_angle-= 45
    d_angle+=180

    if (d_angle < 0){
      d_angle += 360
    }

    var windMkr = {
        width: 30,
        angle: d_angle,
        x: x,
        y: y
      };
    
    if (windSpdVal>= 100){
      data_offset = 0
    }else if (windSpdVal>= 10){
      data_offset = 0
    }else{
      data_offset = 5
    }  

    svg.append("text")
          .text(windSpdVal)
          .attr("class","gustLabel")
          .style("fill","black")
          .attr("x", x_offset+(42+data_offset))
          .attr("y", y_offset+177)

    if (windDir>=360){
      windDir-=360
    }

    compassWindDir = degToCompass(windDir)    

    length_offset = 0
    if (compassWindDir.length>= 3){
       length_offset = -5
       compassClass = "gustLabelTitleSmall"
    }else if (compassWindDir.length== 1){
       length_offset = 3
       compassClass = "gustLabelTitle"
    }  
    else{      
       compassClass = "gustLabelTitle"       
    }

    svg.append("text")
          .text(compassWindDir)
          .attr("class",compassClass)
          .style("fill","black")
          .attr("x", x_offset+(45+length_offset))
          .attr("y", y_offset+162)
    
     svg.append("image")                    
        .attr("transform", "rotate("+windMkr.angle+", "+(windMkr.x+(windMkr.width/3))+", "+ (windMkr.y+(windMkr.width/3))+")")            
        .attr("width", 20)   
        .attr("height", 20)
        .attr("x", (windMkr.x))
        .attr("y", (windMkr.y))  
        .attr("xlink:href", 'http://localhost:8888/obxsurf/wp-content/themes/html5blank/src/static/red_marker.png');
       
   
  }


function getTsData(station){  
  req = "shortname="+station
  reqUrl = "http://54.173.222.46/services/wavedata/"+"?"+req
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

function getStationData(){
  //loads the template data
  $.ajax({
    dataType: "json",
    url: 'http://localhost:8888/obxsurf/wp-content/themes/html5blank/src/locations.json',
    async: false,
     success: function(result){
              var text = '';
              var len = result.length;            
      }
  }).done(function(data) {   
     d = data;
     return d;
  });
}

function getMetaDataTitle(dt,weekday){
  hours = dt.getHours()
  var ampm = (hours >= 12) ? "PM" : "AM";
  if (hours> 12){
    hours = hours - 12
  }
  
  return weekday[dt.getDay()]+" @ "+hours+":"+( (dt.getMinutes()<10?'0':'') + dt.getMinutes() )+" "+ampm
}