/* 
 * TERMS OF USE - for http://obxsurfinfo.com/ - Surf info graphic 
 * Copyright 2014 RPS - ASA All rights reserved.
 */

function getDefs(){
  var svg  =  d3.select("#mainwidget")
  var defs = svg.append('defs').attr("id","def_list");                  
  
   defs.append('svg:linearGradient')
      .attr('x1', "0%").attr('y1', "0%").attr('x2', "0%").attr('y2', "100%")
      .attr('id', 'waterTempGradient').call(
        function (gradient) {
            gradient.append('svg:stop').attr('offset', '0%').attr('style', 'stop-color:rgb(162,175,201);stop-opacity:0.8');
            gradient.append('svg:stop').attr('offset', '100%').attr('style', 'stop-color:rgb(95,122,161);stop-opacity:1');
        });

                      
  defs.append('svg:linearGradient')
      .attr('x1', "0%").attr('y1', "100%").attr('x2', "100%").attr('y2', "0%")
      .attr('id', 'metadataGradient').call(
        function (gradient) {
            gradient.append('svg:stop').attr('offset', '0%').attr('style', 'stop-color:rgb(235,235,235);stop-opacity:1');
            gradient.append('svg:stop').attr('offset', '100%').attr('style', 'stop-color:rgb(255,255,255);stop-opacity:1');
        });

  defs.append('svg:linearGradient')
      .attr('x1', "0%").attr('y1', "100%").attr('x2', "100%").attr('y2', "0%")
      .attr('id', 'metadataGradientGreen').call(
        function (gradient) {
            gradient.append('svg:stop').attr('offset', '0%').attr('style', 'stop-color:rgb(159,218,162);stop-opacity:1');
            gradient.append('svg:stop').attr('offset', '100%').attr('style', 'stop-color:rgb(255,255,255);stop-opacity:1');
        });

  defs.append('svg:linearGradient')
      .attr('x1', "0%").attr('y1', "100%").attr('x2', "100%").attr('y2', "0%")
      .attr('id', 'metadataGradientRed').call(
        function (gradient) {
            gradient.append('svg:stop').attr('offset', '0%').attr('style', 'stop-color:rgb(185,39,58);stop-opacity:1');
            gradient.append('svg:stop').attr('offset', '100%').attr('style', 'stop-color:rgb(255,255,255);stop-opacity:1');
        });

  defs.append('svg:linearGradient')
      .attr('x1', "0%").attr('y1', "100%").attr('x2', "100%").attr('y2', "0%")
      .attr('id', 'metadataGradientYellow').call(
        function (gradient) {
            gradient.append('svg:stop').attr('offset', '0%').attr('style', 'stop-color:rgb(242,149,54);stop-opacity:1');
            gradient.append('svg:stop').attr('offset', '100%').attr('style', 'stop-color:rgb(255,255,255);stop-opacity:1');
        });


  defs.append('svg:linearGradient')
      .attr('x1', "0%").attr('y1', "0%").attr('x2', "0%").attr('y2', "100%")
      .attr('id', 'dayTitleGradient').call(
        function (gradient) {
            gradient.append('svg:stop').attr('offset', '0%').attr('style', 'stop-color:rgb(115,116,119);stop-opacity:1');
            gradient.append('svg:stop').attr('offset', '100%').attr('style', 'stop-color:rgb(173,176,178);stop-opacity:1');
        });

  defs.append('svg:linearGradient')
      .attr('x1', "0%").attr('y1', "0%").attr('x2', "0%").attr('y2', "100%")
      .attr('id', 'waveHeightTitleColor').call(
        function (gradient) {
            gradient.append('svg:stop').attr('offset', '0%').attr('style', 'stop-color:rgb(35,105,169);stop-opacity:1');
            gradient.append('svg:stop').attr('offset', '100%').attr('style', 'stop-color:rgb(13,64,112);stop-opacity:1');
        });


  defs.append('svg:linearGradient')
      .attr('x1', "0%").attr('y1', "100%").attr('x2', "100%").attr('y2', "0%")
      .attr('id', 'windspeedTitleColor').call(
        function (gradient) {
            gradient.append('svg:stop').attr('offset', '0%').attr('style', 'stop-color:rgb(125,127,129);stop-opacity:1');
            gradient.append('svg:stop').attr('offset', '100%').attr('style', 'stop-color:rgb(34,30,31);stop-opacity:1');
        });

  defs.append('svg:linearGradient')
      .attr('x1', "0%").attr('y1', "0%").attr('x2', "0%").attr('y2', "100%")
      .attr('id', 'waveHeightColor').call(
        function (gradient) {
            gradient.append('svg:stop').attr('offset', '0%').attr('style', 'stop-color:rgb(124,142,178);stop-opacity:1');
            gradient.append('svg:stop').attr('offset', '100%').attr('style', 'stop-color:rgb(245,246,250);stop-opacity:1');
        });

  defs.append('svg:linearGradient')
      .attr('x1', "0%").attr('y1', "0%").attr('x2', "100%").attr('y2', "0%")
      .attr('id', 'dayGradient').call(
        function (gradient) {
          gradient.append('svg:stop').attr('offset', '0%').attr('style', 'stop-color:rgb(210,212,214);stop-opacity:0.5');
          gradient.append('svg:stop').attr('offset', '24.99%').attr('style', 'stop-color:rgb(210,212,214);stop-opacity:0.5');
          gradient.append('svg:stop').attr('offset', '25%').attr('style', 'stop-color:rgb(245,245,245);stop-opacity:0.5');
          gradient.append('svg:stop').attr('offset', '50%').attr('style', 'stop-color:rgb(245,245,245);stop-opacity:0.5');
          gradient.append('svg:stop').attr('offset', '74.99%').attr('style', 'stop-color:rgb(245,245,245);stop-opacity:0.5');
          gradient.append('svg:stop').attr('offset', '75%').attr('style', 'stop-color:rgb(210,212,214);stop-opacity:0.5');
          gradient.append('svg:stop').attr('offset', '100%').attr('style', 'stop-color:rgb(210,212,214);stop-opacity:0.5');          
        });  

  }


function getTwoDigit(val) {    
    return val < 10 ? '0' + val : val;
}

function isOdd(num) { 
  return num % 2;
}

function degToCompass(dirDeg) { 
  val= Math.round( (dirDeg -11.25 ) / 22.5 ) ;
  arr=["N","NNE","NE","ENE","E","ESE", "SE", "SSE","S","SSW","SW","WSW","W","WNW","NW","NNW"] ;
  return arr[ Math.abs(val) ] ;
}

function drawDayGrid(container,i,num_forecast_day,day_label,sunupdown,day_width,met_data_width,module_spacing,day_label_height,day_spacing,row_height_wave,day_text_height,forcast_date,row_height_wind){
    var svg  =  d3.select("#mainwidget")
    xoffset = 51
    yoffset = 21

    var mod = 3
    day_width = day_width-mod


    g = svg.append('g')
    g.style("width", day_width-day_spacing)  
    g.append("rect")
      .attr("x", xoffset+day_width*i+(met_data_width+module_spacing))
      .attr("y", yoffset+25)
      .attr("height", day_label_height-15)
      .attr("class","dayTitleRect")
      .attr("width", day_width-day_spacing);
      //add the rows that show the line divisions
      //wave height
      g.append("rect")
                .attr("x", xoffset+day_width*i+(met_data_width+module_spacing))
                .attr("y", yoffset+53)
                .attr("height", row_height_wave*4+7)
                .attr("class", "day_row")
                .attr("width", day_width-2);

      //wind speed, need to add extra for extra space
      g.append("rect")
                .attr("x", xoffset+day_width*i+(met_data_width+module_spacing))
                .attr("y", yoffset+172)
                .attr("height", row_height_wave*4+43)
                .attr("class", "day_row")
                .attr("width", day_width-2);
   
    yws = 260


    xx = xoffset+(day_width*i)+(met_data_width+module_spacing)+day_width/2

    g.append("text")
        .text(day_label)    
        .attr("class","dayLabelText")
        .attr("x", xx)
        .attr("y", yoffset+day_text_height-2)

    var sun_top = 50
    addsunUpDown(g,sun_top,forcast_date,day_width,met_data_width,module_spacing,i)
    base_x = met_data_width+module_spacing+(day_width*i)+5
 
  }

  function addWindTypes(met_data_width,module_spacing,ts_width,ts_height){
    var windTypes = ["Offshore Wind","Sideshore Wind","Onshore Wind"]
    var windSurfTypes = ["Clean    ","Semi Choppy","Choppy    "]
    var colorType = ["green","yellow","red"]

    var svg  =  d3.select("#mainwidget")

    base_x = met_data_width+module_spacing+50    
    wt_spacing = 220
    wt_size = 10

    for (var i = 0; i < windTypes.length; i++) {
        wt = windTypes[i]
        wst = windSurfTypes[i]
        ct = colorType[i]
        
        addon = 0
        if (i > 1){
          addon = 40
        }


        svg.append("rect")
              //.attr("x", met_data_width+module_spacing+((ts_width/3)*i)+30)
              .attr("x", base_x+((ts_width/5)*i) + wt_spacing+addon)
              .attr("y", ts_height+28)
              .attr("height", wt_size)
              .attr("width", wt_size)
              .attr("class", "windTypeRect " + colorType[i]);    
        
        svg.append("text")
          .text(wt+" = ")
          .attr("class","windTypeLabel")
          //add 5 to pad the space
          .attr("x", base_x+((ts_width/5)*i)+wt_spacing+wt_size+5+addon)
          .attr("y", ts_height+37)   
          .style("fill", "white")   

        svg.append("text")
          .text(wst)
          .attr("class",colorType[i])
          .attr("x", base_x+((ts_width/5)*i)+wt_spacing+wt_size+addon+60+(wt.length*2))
          .attr("y", ts_height+37);            
      }; 
  }

   function addsunUpDown(svg,sun_top,forcast_date,day_width,met_data_width,module_spacing,i){
        var times = SunCalc.getTimes(forcast_date, 41, -72);  
        var ampm = times.sunrise.getHours() >= 12 ? 'pm' : 'am';
        var hours = times.sunrise.getHours() % 12 || 12;  
        var minutes = (times.sunrise.getMinutes()<=9 ? '0' + times.sunrise.getMinutes() : times.sunrise.getMinutes())
        var sunriseStr = hours + ':' + minutes+" " +ampm;   

        var ampm = times.sunset.getHours() >= 12 ? 'pm' : 'am';
        var hours = times.sunset.getHours() % 12 || 12;
        var minutes = (times.sunset.getMinutes()<=9 ? '0' + times.sunset.getMinutes() : times.sunset.getMinutes())
        var sunsetStr = hours + ':' + minutes+" " +ampm;   

      icons = ['\uf0a3','\uf186'];
      icon_string = [sunriseStr,sunsetStr];

      var spacing_between_icon_dt = 15
      var left_icon_space = 5
      
      xoffset = 50
      yoffset = 18
      for (var ii = 0; ii < icons.length; ii++) {
          svg.append("text")    
            .text(icons[ii])
            .attr("id","sunupdown"+i)
            .attr("class","sunupdown")
            .attr("x", xoffset+(ii*day_width/2)+left_icon_space+day_width*i+(met_data_width+module_spacing))       
            .attr("y", yoffset+sun_top)

          svg.append("text")
            .text(icon_string[ii])
            .attr("id","sunupdown"+i)
            .attr("class","sunupdownText")
            .attr("x", xoffset+(ii*day_width/2)+left_icon_space+spacing_between_icon_dt+2+day_width*i+(met_data_width+module_spacing))        
            .attr("y", yoffset+sun_top)  
      };
}