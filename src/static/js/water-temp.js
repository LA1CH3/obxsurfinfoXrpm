/* 
 * TERMS OF USE - for http://obxsurfinfo.com/ - Surf info graphic 
 * Copyright 2014 RPS - ASA All rights reserved.
 */

function addWaterTemp(svg,x,y,width,height){
  var svg  =  d3.select("#mainwidget")
  svg.append("rect")
    .attr("x", x)
    .attr("y", y-1)
    .attr("width",width)
    .attr("height",height)
    .attr("id","water_temp_rect")
    .attr("text-anchor", "middle")
    .attr("class", "waterTempLabelRect");

  svg.append("text")
        .text('00'+"°")
        .attr("class","waterTempLabel")
        .attr("id","waterTempText")
        .attr("x", x+16)
        .attr("y", y+44);

  svg.append("text")
        .text("WATER:")
        .attr("class","smallWaterTempLabel")
        .attr("x", x+12)
        .attr("y", y+22);    

}