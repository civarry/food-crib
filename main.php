<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<div class="container">
		<nav class="nabbar" id="navID">
			<button type="button" onclick="myFunction(e)" class="toggle-collapse" id="toggle-button">
				<span class="toggle-icon"></span>
			</button>
			<ul class="side-nab">
				<li class="nab-item">
					<a href="#" class="nab-link">Home</a>
				</li>
				<li class="nab-item">
					<a href="#" class="nab-link">Home</a>
				</li>
				<li class="nab-item">
					<a href="#" class="nab-link">Home</a>
				</li>
			</ul>
		</nav>
	</div>

	<script>
		function myFunction(e){
			e.classList.toggle("show");

			var elem = document.getElementById("navID"),
			Style = window.getComputedStyle(elem),
			right = Style.getPropertyValue("righjt");

			if(right == "0px"){
				elem.style.right = "-260px";
			}else{
				elem.style.right = "0px";
			}
		}
	</script>
</body>
</html>