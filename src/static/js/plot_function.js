/* 
 * TERMS OF USE - for http://obxsurfinfo.com/ - Surf info graphic 
 * Copyright 2014 RPS - ASA All rights reserved.
 */

function plotData(x,y,height,width,type,data,max_val){        

    var margins = {top: 0, right: 0, bottom: 50, left:0};

    var id  =  d3.select("#mainwidget")
    var svg = id.append('svg')       
        .attr('width', width-12)       
        .attr('height', height)     
        .attr('x',x)      
        .attr('y',y)      
      .append('g')        
        .attr('transform', 'translate(' + 0 + ', ' + 0 + ')')
        .attr("id",type);


    var defs = d3.select("#def_list"); 

    green = "54,180,63"
    yellow = "237,145,45"
    red = "183,13,49"
    
    if (type == "windspd"){        
      defs.append('svg:linearGradient')
      .attr('x1', "0%").attr('y1', "0%").attr('x2', "100%").attr('y2', "0%")
      .attr('id', 'wsGradient').call(
        function (gradient,data) {            
            for (var i = 0; i < data.length; i++) {
              
              val = data[i][7]
              percent = ((i/data.length)*100)
              
              if (val == 0){
                dataColor = green
              }else if (val == 1){
                dataColor = yellow
              }else if (val == 2){
                dataColor = red
              }

              gradient.append('svg:stop').attr('offset', percent+'%').attr('style', 'stop-color:rgb('+dataColor+');stop-opacity:0.6');
            };
                       
        },data);
    }
    /*
    data is already passed in in the right format (i.e row rather than column)
    */
    // this will be our colour scale. An Ordinal scale.
    var colors = d3.scale.category10();

    date_time_idx = 1 
    time_idx = 1        

    if (type == "windspd"){      
      data_idx = 5
      data_units = "mph"
      marker_radius = 4
    }else{
      data_idx = 2
      data_units = "feet"
      marker_radius = 4
     } 
    
    //x axis scale    
    var first_date = moment().toDate();    
    var first_date = new Date(first_date.getFullYear(), first_date.getMonth(), first_date.getDate(), 0,0,0,0);
    var last_date = jQuery.extend({}, first_date); 
    last_date = moment(last_date).add('5','days')
    last_date.subtract(1,'seconds')
    last_date = moment(last_date).toDate();        

    var x = d3.time.scale().domain([first_date, last_date])
      .range([0, width- margins.left - margins.right]);

  	var y = d3.scale.linear()
    .domain([0,max_val])
    .range([height - margins.top - margins.bottom, 0]);

    //generate x labels
    svg.append("text")
        .attr("fill", "#414241")
        .attr("text-anchor", "end")
        .attr("class", "return_plot_title")
        .attr("x", width / 2)
        .attr("y", height - margins.bottom+12)
        //.text("date time index");    

    //generate title
    svg.append("text")
        .attr("fill", "#414241")
        .attr("text-anchor", "end")
        .attr("class", "return_plot_title")
        .attr("x", width / 2)
        .attr("y", 0)
        //.text("Station Wave Height Plot");    

    //generate y label and rotate it
    
    svg.append("text")
        .attr("fill", "#414241")
        .attr("text-anchor", "end")
        .attr("class", "return_plot_title")
        .attr("x", 30)
        .attr("y", height - margins.bottom+12)      
        //.text("Height (ft)");
       
    xTicks = 8
    yTicks = 5

    /*  ADD the grid lines  */
    svg.append("g")         
        .attr("class", "xgrid")
        .attr("transform", "translate(-3," + (height- margins.bottom) + ")")
        .call(make_x_axis(x)
            .tickSize(-(height- margins.bottom), 0, 0)
            .tickFormat("")            
            .ticks(xTicks)
            //.tickFormat(d3.time.format('%b %d %I %p'))
        )

    svg.append("g")         
        .attr("class", "ygrid")   
        .attr("transform", "translate(2," + 0 + ")")            
        .attr("id",type+"-plot-y-grid")
        .call(make_y_axis(y)
            .tickSize(-(width-5), 0, 0)
            .ticks(yTicks)
            .tickFormat("")         
        )

    // add the height labels in front of the other grid lines
    svg.append("g").attr("class", "x axis").attr("transform", "translate(0," + y.range()[0] + ")").style("fill", "transparent");
    svg.append("g").attr("class", "y axis").attr("transform", "translate(0,0)");

    //define the axis
    var xAxis = d3.svg.axis().scale(x)
    .orient("bottom")
    .tickPadding(2)
    .tickSize(10, 10, 10)
    .ticks(xTicks);    

    var yAxis = d3.svg.axis().scale(y)
    .orient("right")
    .tickPadding(2)    
    .tickSize(0, 0, 0)
    .ticks(yTicks)
    .tickFormat(function (d) { 
        // No label for '0'
        if (d === 0) {
          return '';
        }
        else{
          return d
        };
    });
    
    //call and create the axis
    
    svg.selectAll("g.y.axis").attr("class","plotAxisLabels").call(yAxis);
    svg.selectAll("g.x.axis").attr("class","plotAxisLabels").call(xAxis);

    //The current date time line
    var currentline = svg.append("line")
                             .attr("class","currentline")
                             .attr("x1", x(new Date()))
                             .attr("y1", y(0))
                             .attr("x2", x(new Date()))
                             .attr("y2", y(max_val))

    var lineFunction = d3.svg.line()                  
                         .x(function(d) { 
                            dt = moment(d[0]+"Z").toDate();                            
                            return x(dt); 
                            }
                          )
                         //.x(function(d) { return x(d[time_idx]); })
                         .y(function(d) { return y(d[data_idx]); })
                         // interpolation type https://www.dashingd3js.com/svg-paths-and-d3js
                         .interpolate("cardinal");
    
    var bisect = d3.bisector(function(d) { return d.timestamp; }).right;

    if (type == "windspd"){      
        // Add the filled area
      var area = d3.svg.area()
        //.x(function(d) { return x(d[time_idx]); })
        .x(function(d) { 
          dt = moment(d[0]+"Z").toDate();                            
          return x(dt); 
        })
        .y0(height- margins.bottom)
        .y1(function(d) { return y(d[data_idx]); })
        .interpolate("cardinal");
      
      dateList1 = []
        for (var i = 0; i < data.length; i++) {
          dt = moment(data[i][0]+"Z").toDate()      
          hours = dt.getHours()
          var ampm = (hours >= 12) ? "PM" : "AM";
          if (hours> 12){
            hours = hours - 12
          }

          dir_val = parseFloat(data[i][6].toFixed(1))         
          dir_val = swapWaveDirection(dir_val);         

          dateList1.push({
            timestamp: dt,
            wind_speed : data[i][5].toFixed(1),
            units: data_units,
            hours: hours+ampm,
            compass: degToCompass(dir_val)
          })
        };

      svg.append("path")
        .datum(data)
        .attr("class", "wsarea")
        .attr("d", area)
        .on("mouseover", function() { 
            var tooltip = d3.select("#tooltip");
            tooltip.style("visibility", "visible");             
            })
        .on("mouseout", function() { 
          var tooltip = d3.select("#tooltip") ;
          tooltip.style("visibility", "hidden");
         })
       .on("mousemove", function(){
        var tooltip = d3.select("#tooltip")                      
        tooltip.style("top", (d3.event.pageY-10)+"px").style("left",(d3.event.pageX+10)+"px");

        var mouse = d3.mouse(this);
        var timestamp = x.invert(mouse[0]); 
        index = bisect(dateList, timestamp);                                                                                    
        startDatum = dateList[index - 1];
        endDatum = dateList[index];                              
        interpolate = d3.interpolateNumber(startDatum.water_lev, endDatum.water_lev);
        range = endDatum.timestamp - startDatum.timestamp;
        valueY = interpolate((timestamp % range) / range);
        valueY = valueY.toFixed(1)        
        tooltip.text(dateList1[index].hours+"\n"+dateList1[index].wind_speed + " " +dateList1[index].units+"\n"+dateList1[index].compass)                              
        
      });                              

    }else{
      var area = d3.svg.area()
        //.x(function(d) { return x(d[time_idx]); })
        .x(function(d) { 
          dt = moment(d[0]+"Z").toDate();                            
          return x(dt); 
        })
        .y0(height- margins.bottom)
        .y1(function(d) { return y(d[data_idx]-0.4); })      

        dateList = []
        for (var i = 0; i < data.length; i++) {
          dt = moment(data[i][0]+"Z").toDate()     
          hours = dt.getHours()
          var ampm = (hours >= 12) ? "PM" : "AM";
          if (hours> 12){
            hours = hours - 12
          }

          dateList.push({
            timestamp: dt,
            water_lev : data[i][2].toFixed(1),
            units: data_units,
            hours: hours+ampm,
            compass: degToCompass(data[i][4].toFixed(1)),
            period: data[i][3].toFixed(1)
          })
        };


        svg.append("path")
        .datum(data)
        .attr("class", "hsarea")
        .attr("d", area)
        .on("mouseover", function() { 
            var tooltip = d3.select("#tooltip");
            tooltip.style("visibility", "visible");             
            })
        .on("mouseout", function() { 
          var tooltip = d3.select("#tooltip") ;
          tooltip.style("visibility", "hidden");
         })
       .on("mousemove", function(){
        var tooltip = d3.select("#tooltip")                      
        tooltip.style("top", (d3.event.pageY-10)+"px").style("left",(d3.event.pageX+10)+"px");

        var mouse = d3.mouse(this);
        var timestamp = x.invert(mouse[0]); 
        index = bisect(dateList, timestamp);                                                                                    
        startDatum = dateList[index - 1];
        endDatum = dateList[index];                              
        interpolate = d3.interpolateNumber(startDatum.water_lev, endDatum.water_lev);
        range = endDatum.timestamp - startDatum.timestamp;
        valueY = interpolate((timestamp % range) / range);
        valueY = valueY.toFixed(1)        
        tooltip.text(dateList[index].hours+"\n"+dateList[index].water_lev + " " +dateList[index].units+"\n"+dateList[index].compass + " @ " + dateList[index].period + " secs")                              
       });

        var lineGraph = svg.append("path")
                       .attr("class","waveline")
                       .attr("d", lineFunction(data))
                       .on("mouseover", function() { 
                        var tooltip = d3.select("#tooltip");
                        tooltip.style("visibility", "visible"); 
                        marker.style('display', 'inherit');
                        })
                       .on("mouseout", function() { 
                        var tooltip = d3.select("#tooltip") ;
                        tooltip.style("visibility", "hidden");
                        marker.style('display', 'none');
                       })
                       .on("mousemove", function(){
                        var tooltip = d3.select("#tooltip")                      
                        tooltip.style("top", (d3.event.pageY-10)+"px").style("left",(d3.event.pageX+10)+"px");

                        var mouse = d3.mouse(this);
                        marker.attr('cx', mouse[0]);
                       
                        var timestamp = x.invert(mouse[0]); 
                        index = bisect(dateList, timestamp);                                                                                    
                        startDatum = dateList[index - 1];
                        endDatum = dateList[index];                              
                        interpolate = d3.interpolateNumber(startDatum.water_lev, endDatum.water_lev);
                        range = endDatum.timestamp - startDatum.timestamp;
                        valueY = interpolate((timestamp % range) / range);
                        valueY = valueY.toFixed(1)
                        marker.attr('cy', y(valueY));

                        tooltip.text(dateList[index].hours+"\n"+dateList[index].water_lev + " " +dateList[index].units+"\n"+dateList[index].compass + " @ " + dateList[index].period + " secs")                              
                        
                      });

        // Append marker
        var marker = svg.append('circle')
          .attr('r', 5)
          .style('display', 'none')
          .style('fill', '#FFFFFF')
          .style('pointer-events', 'none')
          .style('stroke', '#FB5050')
          .style('stroke-width', '3px');

        var totalLength = lineGraph.node().getTotalLength();

        lineGraph
        .attr("stroke-dasharray", totalLength + " " + totalLength)
        .attr("stroke-dashoffset", totalLength)
        .transition()
          .duration(500)
          .ease("linear")
          .attr("stroke-dashoffset", 0);



    }

    //use this selection to identify circles to add
    var mkr =  svg.selectAll("circle")
        .data(data)
        .enter()
    
    wmr = 16
    marker_y_offset = 82
    data_length = 40
    //add direction markers
    if (type == "windspd"){   
      mkr.append("circle")
        .attr("cx", function(d) {
            dt = moment(d[0]+"Z").toDate()
            return x(dt)-3;
       })
       .attr("cy", function(d) {
            return (height-marker_y_offset)+(wmr/2)
       })     
       .attr("class" , function (d) { 
          if (type == "windspd"){     
            v=isOdd(d[1]);
            if (!v && d[1] > 0 && d[1] < data_length){
              return calcConditions(d)
            }else{
              return "transparentShape"
            }
          }
       })
       .attr("r", wmr/2+4)        

       mkr.append('text')
                      .attr("transform", function (d){                        
                       
                        //windDir = d[6]                        
                        windDir = d[6]
                        windDir-=45                                                
                        if (windDir < 0){
                          d_angle = 360-Math.abs(windDir)
                        }                                              

                        dt = moment(d[0]+"Z").toDate()
                        wnd_dir_x = x(dt)+(wmr/2)-10
                        wnd_dir_y = (height-(marker_y_offset-0.5))+(wmr/2)
                                                        
                        return "rotate("+windDir+","+ (wnd_dir_x) + ","+ (wnd_dir_y) +")";
                      
                      })
                      .attr('font-family', 'FontAwesome')                                  
                      .attr("class",function (d){                        
                        v = isOdd(d[1]);
                        
                        if (!v && d[1] > 0 && d[1] < data_length){
                          return "windDirMarker";
                        }else{
                          return "transparentMarker"
                        }

                      })
                      .attr('font-size', wmr)                
                      .attr("x", function (d){
                        dt = moment(d[0]+"Z").toDate()
                        return x(dt)-10
                      })
                      .attr("y", function (d){
                        windMkr_y = (height-marker_y_offset)+(wmr-1)
                        return windMkr_y;
                      })
                      .text(function (d) { return '\uf124'});

      mkr.append('text')
        .attr("x", function (d){
                        d_offset = 10                     
                        if (d[5] < 10){
                          d_offset = 6
                        }
                        dt = moment(d[0]+"Z").toDate()
                        return x(dt)-d_offset
                      })
                      .attr("y", function (d){
                        windMkr_y = (height-(marker_y_offset+2))+(wmr)*2
                        return windMkr_y;
        })
        .attr("class",function (d){
          v=isOdd(d[1]);
          if (!v && d[1] > 0 && d[1] < data_length){
            return "windTextMarker";
          }else{
            return "windTextMarkerInvis"
          }

        })              
        .text(function (d) { return d[5].toFixed(0)});

    }

}

function calcConditions(d){
  d_val = d[7]
  if (d_val == 0){
    return "green";
  }else if(d_val == 1){
    return "yellow";
  }else if(d_val == 2){
    return "red";
  }
}

function make_x_axis(x) {        
    return d3.svg.axis()
        .scale(x)
         .orient("bottom")
         .ticks(5)
}

function make_y_axis(y) {        
    return d3.svg.axis()
        .scale(y)
        .orient("left")
        .ticks(5)
}