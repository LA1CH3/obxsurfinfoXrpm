/* 
 * TERMS OF USE - for http://obxsurfinfo.com/ - Surf info graphic 
 * Copyright 2014 RPS - ASA All rights reserved.
 */

function addTideChart(data){

  plot_width = 168;
  plot_height = 58;
  var margin = {top: 28, right: 10, bottom: 30, left:7},
  width = plot_width;
  height = 160;
  //add tide information
  var id  =  d3.select("#mainwidget")

  var svg = id.append('svg')       
        .attr('width', width)       
        .attr('height', height)     
        .attr('x',50)      
        .attr('y',235)      
      .append('g')        
        .attr('transform', 'translate(' + margin.left + ', ' + margin.top + ')');



  var currentTimes = SunCalc.getTimes(new Date(), 41, -72);
  h_start = ((currentTimes.sunrise.getHours() /24)+currentTimes.sunrise.getMinutes()/60/24)*100
  h_end   = ((currentTimes.sunset.getHours()  /24)+currentTimes.sunset.getMinutes()/60/24)*100 

  dark = "210,212,214"
  light = "245,245,245"
  colors =   [dark,dark,light,light,dark,dark]
  per_vals = [0,h_start,h_start+0.05,h_end-0.05,h_end,100]

  var defs = svg.append('defs'); 
  defs.append('svg:linearGradient')
      .attr('x1', "0%").attr('y1', "0%").attr('x2', "100%").attr('y2', "0%")
      .attr('id', 'tideGradient').call(
        function (gradient,per_vals,colors) {            
            for (var i = 0; i < per_vals.length; i++) {
              dataColor =  colors[i]           
              percent = per_vals[i]
              gradient.append('svg:stop').attr('offset', percent+'%').attr('style', 'stop-color:rgb('+dataColor+');stop-opacity:0.5');
            };
                       
   },per_vals,colors);

  //date formatting
  today = new Date()
  //reset to the start of the day
  today.setHours(0,0,0,0)
  tomorrow = d3.time.day.offset(today, 1)  

  currentDateTime = new Date();

  date_list = []
  
  //index of dates closest
  idx_order = [];
  vals = []  
  for (var i = 0; i < data.length; i++) {    
    nd = new Date(data[i].date + " " + data[i].time)   
    date_list.push(nd) 

    val = (nd.getTime())
    idx_order.push(val)        
  };

  var dd = closest(idx_order,currentDateTime.getTime());  
  val_idx=[]
  val_idx.push(dd)
  if (dd > 0 && dd < idx_order.length-1){
    val_idx.push(dd+1)
    //val_idx.push(dd-1)
  }else if (dd > 0){
    //val_idx.push(dd-1)
  }else if (dd < idx_order.length-1){
    val_idx.push(dd+1)
  }  

  firstDate = new Date(data[0].date + " " +  data[0].time)
  secondDate = new Date(data.pop().date + " " +  data.pop().time)  

  var x = d3.time.scale().domain([today, tomorrow]).rangeRound([0, plot_width]);

  yMinOfset = Math.floor(d3.min(data, function(d) { return d.value; }))-1.5
  yMaxOfset = Math.ceil(d3.max(data, function(d) { return d.value; }))+1

  var y = d3.scale.linear().domain([yMinOfset,yMaxOfset])
  .range([plot_height, 0]);

  var xAxis = d3.svg.axis()
        .scale(x)        
        .orient('bottom')        
        .ticks(d3.time.days, 1)
        .tickFormat(d3.time.format('%H'+'h'))
        .tickSize(2)
        .ticks(8)              
        .tickPadding(0);


  var yAxis = d3.svg.axis()        
        .scale(y)
        .orient('right')
        .tickSize(2)
        .ticks(4)
        .tickPadding(0);    

  //g = svg.append('g')  
  gg = id.append('g')
  gg.append("rect")
      .attr("x", 50.49)
      .attr("y", 245)
      .attr("class","tideBlueTitleBackgound")
      .attr("height", 14)      
      .attr("width", 168);    

  //add tide guage
  gg.append("text")
        .text("TIDE CHART")
        .attr("class","titeText")
        .style("fill","white")
        .attr("x", 100)
        .attr("y", 256)  

  svg.append("rect")
      .data(data)
      .attr("width", plot_width+6)
      .attr("height", plot_height+17)
      .attr("x",-6)
      .attr("y",-6)      
      .attr("class", "tideChart");
      //.attr('transform', 'translate(' + 0 + ', ' + 0 + ')');            

  var lineFunction = d3.svg.line(data)
       .x(function(d) { return x(new Date(d.date + " "+d.time)); })                        
       .y(function(d) { return y(d.value); })                        
       .interpolate("cardinal");
  
   svg.append("g")         
        .attr("class", "xgridTide")
        .attr("transform", "translate(0," + (height- margin.bottom-margin.top-35) + ")")
        .call(make_x_axis(x)
            .tickSize(-(height- margin.bottom - margin.top-30), 0, 0)
            .tickFormat("")            
            .ticks(8)
            //.tickFormat(d3.time.format('%b %d %I %p'))
        ); 


  //adds the area under the graph
  var area = d3.svg.area().interpolate("cardinal")
    .x(function(d) { return x(new Date(d.date+" "+d.time)); })
    .y0(plot_height+10)      
    .y1(function(d) { return y(d.value); });      

  svg.append("path")
    .datum(data)
    .attr("class", "tideArea")
    .attr("d", area);

  var lineGraph = svg.selectAll("lines")
       .data(data)
       .enter()
       .append("path")
       .attr("class","tideLine")         
       .attr("d", lineFunction(data));  

  //The current date time line
  var currentline = svg.append("line")
                           .attr("class","currentline")
                           .attr("x1", x(currentDateTime))
                           .attr("y1", y(yMinOfset))
                           .attr("x2", x(currentDateTime))
                           .attr("y2", y(yMaxOfset))
 
   svg.append('g')
      .attr('class', 'x axis hidden')
      .attr('transform', 'translate(0, ' + (plot_height) + ')')
      .call(xAxis);

  svg.append('g')
      .attr('class', 'y axis hidden')
      .call(yAxis);


  var mkrs = svg.selectAll("circle")
      .data(data)
      .enter();
  
  svg.append("rect")
      .attr("x", 0)
      .attr("y", 0)
      .attr("class","tideBlueTitleBackgound")
      .attr("height", 11)      
      .attr("width", 170)
      .attr('transform', 'translate(-6.98,58.58)');

  //add the high low marks
    for (var i = 0; i < val_idx.length; i++) {    
        idx = val_idx[i]
        val = data[idx]
        dt = date_list[idx]         

        var datetime = new Date(dt);
        var n = datetime.getHours();
        var ampm = datetime.getHours() >= 12 ? 'pm' : 'am';
        var hours = datetime.getHours() % 12 || 12;
        var minutes = (datetime.getMinutes()<=9 ? '0' + datetime.getMinutes() : datetime.getMinutes())
        var dateStr = hours + ':' + minutes+" " +ampm;   
        //only show those dates less than 7pm
        if (n < 19){        
          svg.append("text")
           .attr("x", x(dt))
           .attr("class","tideTextLabel")
           .attr("y", y(parseFloat(val.value)+0.5))                                                     
           .text(parseFloat(val.value).toFixed(1)+' ft');   
         }      

          //add the high low identifier
          svg.append("text")
              .attr("y", 0)
              .attr("x", 0)            
              .attr("class","tideText")
              .text('('+data[idx]['type']+') '+ dateStr)              
              .attr("transform", "translate("+(50+(65*(i)))+",67)");
        

    }
      
  mkrs.append("circle")
      .attr("cx", function(d) {
          return 0;
       })
      .attr("cy", function(d) {
            return 0;
       })
      .attr("class", "dot")
       
      .attr('transform', function (d) {  
        dt = d.date+" "+d.time          
        return "translate(" + x(new Date(dt)) + "," + y(d.value) + ")";
        })
      .attr("r", 3)
      .on("mouseover", function(d) {   
                      dt = d.date+" "+d.time          
                      val = parseFloat(d.value).toFixed(1)                    
                      //d3.select(this)                        
                      d3.select(this).attr("class", "dotselected")   
                      var tooltip = d3.select("#tooltip")                                                                             
                      tooltip.text(dt+ "\n " + (val) + " Feet")
                      tooltip.style("visibility", "visible");                   
                      })

      .on("mouseout", function(d) {
                    //d3.select(this)
                    d3.select(this).attr("class", "dot")   
                    var tooltip = d3.select("#tooltip")
                    tooltip.style("visibility", "hidden");
                    })

      .on("mousemove", function(){
                      var tooltip = d3.select("#tooltip")
                      return tooltip.style("top", (d3.event.pageY-10)+"px").style("left",(d3.event.pageX+10)+"px");
                    });  
  
    
     
}

function closest(array,num){
      var i=0;      
      var ans;
      var val = -1
      for(i in array){
           var m=Math.abs(num-array[i]);           
           if (val == -1){
              val = i
              ans = m
           }
           else if(m< ans){                   
                  ans=m
                  val = i
           }
        }
      return parseInt(val);
}