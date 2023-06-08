<?php

$H = date('H');  
#$H = 02; 

$ML = rand(10, 700);
$MT = rand(10, 500);

#$ML = 700;
#$MT = 500;



if ($H > 19 || $H < 05)  {
?>
<!DOCTYPE html>
<html lang="sv">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="style.css">
<title>TV - NTIG Sollentuna - Screensaver</title>
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Expires" content="-1">
<meta http-equiv="refresh" content="20">
<body onload="startTime()"> 
<!-- <p> <?php echo "MT:".$MT." ML:".$ML.""?> </p> -->
<style>
   body{ 
      margin:0;
      padding:0;
      font-size: 18px;
      background:black;
	  color:gray;
    }
    .container{
      position:relative;
      /* height: 300px;
	  width:  375px;
      height: 500px;
	  width:  700px; */
	  margin-left: <?php echo $ML?>px;
	  margin-top: <?php echo $MT?>px;
	  
	  
	   
    }
    #clockArea {
      position:absolute;
    }
    .topText{
      font-family: 'Orbitron', sans-serif;
      color: lightslategrey;
	  color: #681183;
      font-style: italic;
      text-align: center;
      font-size: 1.5em;
    }
    #whatDate {
      font-family: 'Orbitron', sans-serif;
      font-size: 5em;
      margin:5px auto;
	  margin-top:5px;
      color: limegreen;
	  color: #681183;
      font-style: italic;
      text-align: center;
	  animation: fadeIn 2s infinite alternate;

    }
    #clock {
      font-family: 'Orbitron', sans-serif;
      font-size: 4em;
      margin:5px auto;
      color: limegreen;
	  color: #681183;
      font-style: italic;
      text-align: center;
      /* min-width: 1250px; *
      margin-top: 0px;
	  animation: fadeIn 2s infinite alternate;

    }
/*    @media screen and (max-width:1000px){ */
    @media screen and (){
      #whatDate, #clock {
        font-size: 2em;
      }
      .container{
        height: 600px;
      }
      .topText {
        margin-bottom: inherit;
      }
      .clockArea {
        position:relative;
        top:inherit;
        left:inherit;
        transform: translate(0%,20%);
      }
      #clock{
        min-width: inherit;
        margin-top: 5px;
      }
    }
	@keyframes fadeIn { 
  from { opacity: 0; } 
}

</style>
</head>
        
    


  <!--marquee direction="down" width="98%" height="700" behavior="alternate" style="border:solid" scrolldelay = "500"> 
  <marquee behavior="alternate"--> 

      
   <div class="container">
      <span id="clockArea">
        <div id="whatDate"></div>
        <div id="clock"></div>
      </span>
    </div>
  <!--/marquee>
  </marquee--> 
  
<script> 

function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    var ampm = h >= 12 ? 'PM' : 'AM'; // Display AM or PM
	var ampm = "";
    m = checkTime(m);
    s = checkTime(s);
    //Convert to 12-hour (non-military time) 
    /* if (h > 12) {
    h -= 12;
    } else if (h === 0) {
        h = 12;
    }; */
    document.getElementById('clock').innerHTML =
    " " + h + ":" + m + ":" + s + " " + ampm + " ";
    var t = setTimeout(startTime, 500);

    var todayDate = new Date();
    var dd = todayDate.getDate();
    var mm = todayDate.getMonth()+1; //January is 0!
    var yyyy = todayDate.getFullYear();
    if(dd<10) {
        dd = '0' + dd
    }
    if(mm<10) {
        mm = '0' + mm
    };
    //document.getElementById('whatDate').innerHTML = " " + mm + '/' + dd + '/' + yyyy + " ";
	document.getElementById('whatDate').innerHTML = " " + yyyy + '-' + mm + '-' + dd + " ";
}

function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}

// To move around as a screensaver
function moveDiv() {
var $span = $("#clockArea");

$span.fadeOut(1000, function() {
    var maxLeft = $(window).width() - $span.width();
    var maxTop = $(window).height() - $span.height();
    var leftPos = Math.floor(Math.random() * (maxLeft + 1))
    var topPos = Math.floor(Math.random() * (maxTop + 1))

    $span.css({ left: leftPos, top: topPos }).fadeIn(1000);
});
};

moveDiv();
setInterval(moveDiv, 7000);
	
</script>
</body>
</html>


<?php
exit(0);
}
?>

