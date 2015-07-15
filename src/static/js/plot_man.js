/* 
 * TERMS OF USE - for http://obxsurfinfo.com/ - Surf info graphic 
 * Copyright 2014 RPS - ASA All rights reserved.
 */

function waveHeightMan(svg,x,y,width,height,water_height,max_height){  

   water_height = parseFloat(water_height)
   var svg  =  d3.select("#mainwidget")
   g = svg.append("g")  
   
   //if were using the normal scale
   if (max_height == 8.5){
     //scale = 0:8
     y_val = 175-(water_height*11.9)   
     h_val = 175-y_val

    //Draw the rect
     var rect = g.append("rect")
                              .attr("x", x)                         
                              .attr("y", y_val)
                              .attr("width", width)
                              .attr("height", h_val)                             
                              .attr("id","waterlevel"); //#7C8EB2
      
    //draw the bold line                  
     var line = g.append("line")
                                .attr("x1", x)
                                .attr("y1", y_val)
                                .attr("x2", x+width)
                                .attr("y2", y_val)
                                .attr("stroke-width", 2.5)
                                .attr("stroke", "rgb(74,100,148)"); 

     var line = g.append("line")
                                .attr("x1", x)
                                .attr("y1", 153.937+23)
                                .attr("x2", x+width)
                                .attr("y2", 153.937+23)
                                .attr("stroke-width", 2.5)
                                .attr("stroke", "black"); 

     g.append("svg:image")
       .attr('x',x)
       .attr('y',100)
       .attr('width', width)
       .attr('height', 78)
       .attr("xlink:href","http://dev.obxsurfinfo.com/wp-content/themes/html5blank/src/person14.svg")
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
        tooltip.text("Wave Height: "+ "\n"+water_height.toFixed(1) + " feet");
       });

  }else{
    
    
    if (water_height > 16){
      water_height_man = 16
    }else{
      water_height_man = water_height
    }
    
    //if were using the larger scale with the smaller man
    scale_f = 1.52941176471
    y_val = 175-(water_height_man*(11.9/scale_f))   
    h_val = 175-y_val
    //Draw the rect
     var rect = g.append("rect")
                              .attr("x", x)                         
                              .attr("y", y_val)
                              .attr("width", width)
                              .attr("height", h_val)                             
                              .attr("id","waterlevel"); //#7C8EB2
      
    //draw the bold line                  
     var line = g.append("line")
                                .attr("x1", x)
                                .attr("y1", y_val)
                                .attr("x2", x+width)
                                .attr("y2", y_val)
                                .attr("stroke-width", 0.5)
                                .attr("stroke", "black"); 

    var line = g.append("line")
                                .attr("x1", x)
                                .attr("y1", 153.937+23)
                                .attr("x2", x+width)
                                .attr("y2", 153.937+23)
                                .attr("stroke-width", 2.5)
                                .attr("stroke", "black"); 

     g.append("svg:image")
       .attr('x',x)
       .attr('y',126)
       .attr('width', width)
       .attr('height', 80/scale_f)
       .attr("xlink:href","http://dev.obxsurfinfo.com/wp-content/themes/html5blank/src/person14.svg")
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
        tooltip.text("Wave Height: "+ "\n"+water_height.toFixed(1) + " feet");
       });   
  }
 }