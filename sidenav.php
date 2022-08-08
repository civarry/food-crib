<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
 <div id="mainbox" onclick="openFunction()">&#9776; Open</div>
  <div id="menu" class="sidemenu">
   <a href="#">Home</a>
   <a href="#">About</a>
   <a href="#">Contact</a>
   <a href="#">Login</a>
   <a href="#" class="closebtn" onclick="closeFunction()">&times;</a>
 </div>
</body>
<script type="text/javascript">
 function openFunction(){
  document.getElementById("menu").style.width="300px";
  document.getElementById("mainbox").style.marginLeft="300px";
  document.getElementById("mainbox").innerHTML="Click on Cross Element and Close Menu";
 }
function closeFunction(){
 document.getElementById("menu").style.width="0px";
 document.getElementById("mainbox").style.marginLeft="0px";
 document.getElementById("mainbox").innerHTML="&#9776; Open";
}
</script>
</html>