

var myLatLng;

var map;

var marker;

var reps = [];

var markers = [];

var cntm = 0;

var gm = google.maps;

var info = new gm.InfoWindow();

var oms;

var iw = new gm.InfoWindow();

var content;

var iconWithColor;

var usualColor;

var spiderfiedColor;

var shadow;

var infoWindows = [];

//var WindowOptions;

//var InfoWindow; 

var side_bar_html = "";

var div = document.getElementById("domtarget");

var addr = div.textContent;


$(function() {

$.getJSON("geoaddr.php?address=" + addr)
   .done(function(data, textStatus, jqXHR) {
    console.log("first data: " + data);

myLatLng = data; 
//console.log("here"+myLatLng);  

initMap(myLatLng);
/*
marker = new gm.Marker({
    position: myLatLng,
    map: map,
    animation: gm.Animation.DROP,
    title: 'Hello World!'
  });

marker.addListener('click', toggleBounce);
*/




getReps(setBounds, function(){
    console.log(side_bar_html);   
    document.getElementById("side_bar").innerHTML = side_bar_html;
});

///add sidebar info to DOM 

}) 
//setBounds();

///here is where getjson with repsjson goes
//getReps(setBounds);
console.log(side_bar_html);   
document.getElementById("side_bar").innerHTML = side_bar_html;

});
   


//console.log("here"+myLatLng);
function initMap(myLatLng) {
  map = new gm.Map(document.getElementById('map'), {
    center: myLatLng,
    zoom: 10
  });

   oms = new OverlappingMarkerSpiderfier(map,
        {markersWontMove: true, markersWontHide: true});
        
       usualColor = 'eebb22';
       spiderfiedColor = 'ffee22';
       iconWithColor = function(color) {
        return 'http://chart.googleapis.com/chart?chst=d_map_xpin_letter&chld=pin|+|' +
          color + '|000000|ffff00';
      }
      shadow = new gm.MarkerImage(
        'https://www.google.com/intl/en_ALL/mapfiles/shadow50.png',
        new gm.Size(37, 34),  // size   - for sprite clipping
        new gm.Point(0, 0),   // origin - ditto
        new gm.Point(10, 34)  // anchor - where to meet map location
      );


  
}

function toggleBounce() {
  if (marker.getAnimation() !== null) {
    marker.setAnimation(null);
  } else {
    marker.setAnimation(gm.Animation.BOUNCE);
  }
}

function addMarker(repsinfo)
{




	//console.log("add marker running" + myLatLng);

	if (repsinfo.address !== null)
		{
			first = "geoaddr.php?address="
	repaddr = repsinfo.address[0].line1;
	repaddr += repsinfo.address[0].line2;
	repaddr += " " + repsinfo.address[0].city;
	repaddr += " " + repsinfo.address[0].state;
	repaddr += " " + repsinfo.address[0].zip;
	first += encodeURIComponent(repaddr);
	//console.log("econde url " + first);

	


console.log("berfore ajax")
$.ajax({
  url: first,
  async: true,
}).done(function(data, textStatus, jqXHR) {
  


/*

	$.getJSON(first)
   .done(function(data, textStatus, jqXHR) {
  
*/
    //console.log(data);

    myLatLng = data;
    //console.log(myLatLng);

    //console.log("post getRepAddr" + myLatLng);
/*
	marker = new gm.Marker({
    position: myLatLng,
    map: map,
    animation: gm.Animation.DROP,
    title: 'Hello World!'
  });
*/
//marker.addListener('click', toggleBounce);

	repsaddr = '<h1 id="firstHeading" class="firstHeading">' + repsinfo.name + '</h1><ul>';
	console.log("before if " + repsinfo.address);
	//console.log("type of address " + typeof(repsinfo.address[0]));
	if (repsinfo.address !== null) 
	{
		console.log("line1 " + repsinfo.address[0].line1)
		if (typeof(repsinfo.address[0].line1) !== "undefined" || repsinfo.address[0].line1 !== null)
		{
		repsaddr += "<div><li>" + repsinfo.address[0].line1 + "<br>";
		}
		if 	(typeof(repsinfo.address[0].line2) !== "undefined" || repsinfo.address[0].line2 !== null)
			{

			repsaddr += "<div><li>" + repsinfo.address[0].line2 + "<br>";

			}

		repsaddr += repsinfo.address[0].city + ", " + repsinfo.address[0].state + " " + repsinfo.address[0].zip + "</li></div>" + cntm;  	

	}
	console.log("RESPADDR " + repsaddr);		
  /*   var infowindow = new gm.InfoWindow({
    content: repsaddr,
    maxWidth: 200
});
*/
     marker = new gm.Marker({
    position: myLatLng,
    map: map,
    animation: gm.Animation.DROP,
    title: repsinfo.name
  });
    
    
     


     console.log("marker & latlng " + marker.position + " " + myLatLng);
/*
     marker.addListener('click', function() {
    infowindow.open(map, marker);
    console.log("within infowindow " + marker);
});
*/

/*
	gm.event.addListener(marker, 'click', function() {
  infowindow.open(map,marker);
  console.log("within infowindow " + marker.position);
  });
*/

content = repsaddr;
/*
oms.addListener(marker,'click', (function(marker,content,iw){ 
    return function() {
        iw.setContent(content);
        iw.open(map,marker);
    };
})(marker,content,iw));  
*/
///////////
/*
      oms.addListener('click', function(marker) {
        iw.setContent(content);
        iw.open(map, marker);
      });
*/
    oms.addMarker(marker);



    markers[cntm] = marker;

var    WindowOptions = { content: content, position: marker.position};    
var InfoWindow = new google.maps.InfoWindow(WindowOptions);
infoWindows.push(InfoWindow);
google.maps.event.addListener(marker, 'click', function() {
    closeInfoWindows();
    InfoWindow.open(map, marker[cntm]); // or this instead of marker
});




    console.log("markers " + cntm + "" + markers[cntm].position);
    cntm++;

///////add info to sidebar
side_bar_html += '<a href="javascript:myclick(' + (markers.length-1) + ')">' + repsinfo.name + '<\/a><br>';

///inject sidebar into DOM
document.getElementById("side_bar").innerHTML = side_bar_html;
  
  
//    var len = data.length;
/*
    for (var i = 0; i < len; i++) {

          repsaddr += "<div><li> <a href=\"" + data[i].link + "\" target=\"_blank\">" + data[i].title + "</li></div>";

      }
      repsaddr += "</ul>";
      if(repsaddr.length === 0){
        repsaddr = "Quiet Town USA";
        }
    })
  */ 
  })
  //console.log("marker " + marker.position);
  

     
     

	
		
		}
		
	

}





/*
function showInfo(marker, content)
{
    // start div
    var div = "<div id='info'>";
    if (typeof(content) === "undefined")
    {
        // http://www.ajaxload.info/
        div += "<img alt='loading' src='img/ajax-loader.gif'/>";
    }
    else
    {
        div += content;
    }

    // end div
    div += "</div>";

    // set info window's content
    info.setContent(div);

    // open info window (if not already open)
    info.open(map, marker);
}
*/
/*
function getRepAddr(repsinfo)
{

	first = "geoaddr.php?address="
	repaddr = repsinfo.address[0].line1;
	repaddr += repsinfo.address[0].line2;
	repaddr += " " + repsinfo.address[0].city;
	repaddr += " " + repsinfo.address[0].state;
	repaddr += " " + repsinfo.address[0].zip;
	first += encodeURIComponent(repaddr);
	console.log("econde url " + first);


	$.getJSON(first)
   .done(function(data, textStatus, jqXHR) {
    console.log(data);

    myLatLng = data;
    console.log(myLatLng);

    return myLatLng;

	})

   
}
*/

/*
function initMap() {
  map = new gm.Map(document.getElementById('map'), {
    center: myLatLng,
    zoom: 8
  });
}  
async defer

&callback=initMap


*/

function getReps(callback, cb2)
{
$.getJSON("repsjson.php")
   .done(function(data, textStatus, jqXHR) {
    console.log("repjson"+data[1]);

    reps = data;

    //console.log("reps name "+reps[1].name);

    //console.log("reps address "+reps[1].address[0].line1);

//console.log("b4 for loop");
//console.log("ength " + reps.length);
//console.log(reps);

////for loop loading reps
    forreps(reps, function() {
    console.log(side_bar_html);   
    document.getElementById("side_bar").innerHTML = side_bar_html;
    });
   
callback();
cb2();
}) 

}

function forreps(reps, cb3) {
    for (var i = 0, len = reps.length; i < len; i++)
    {
    	console.log("for loop " + cntm);
    	addMarker(reps[i]);
    	if (cntm = 0)
    	{
    		i--;
    	}
    	console.log("for loop after" + markers[cntm - 1]);
        cb3();	
    }
    
}





function setBounds()
{
oms.addListener('spiderfy', function(markers) {
        for(var i = 0; i < markers.length; i ++) {
          markers[i].setIcon(iconWithColor(spiderfiedColor));
          markers[i].setShadow(null);
        } 
        iw.close();
      });
      oms.addListener('unspiderfy', function(markers) {
        for(var i = 0; i < markers.length; i ++) {
          markers[i].setIcon(iconWithColor(usualColor));
          markers[i].setShadow(shadow);
        }
      });
      console.log(window.mapData);
      /*
      var bounds = new gm.LatLngBounds();
      for (var i = 0; i < markers.length; i ++) {
        var datum = markers[i];
        var loc = new gm.LatLng(datum.lat, datum.lon);
        bounds.extend(loc);
        var marker = new gm.Marker({
          position: loc,
          title: datum.h,
          map: map,
          icon: iconWithColor(usualColor),
          shadow: shadow
        });
        marker.desc = datum.d;
        console.log("marker desc " + marker.desc);
        //oms.addMarker(marker);
      }
      map.fitBounds(bounds);
      */// for debugging/exploratory use in console
      window.map = map;
      window.oms = oms;
}



function closeInfoWindows(){
    var i = infoWindows.length;
    while(i--){
        infoWindows[i].close();
    }
}

function myclick(i) {
    google.maps.event.trigger(markers[i], "click");
}


