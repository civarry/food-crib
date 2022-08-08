<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Cache-control" content="no-cache">
	<title>Menu</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" type="text/css" href="style.css"/>
	<link rel="stylesheet" type="text/css" href="about.css">
</head>
<body>
	<nav style="background-color:#212121" class="px-5 navbar navbar-expand-md">
		<!-- Brand -->
		<a class="navbar-brand" href="index.php"> <h1 href="#" width="absolute">Food-Crib</h1></a>

		<!-- Toggler/collapsibe Button -->
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon"></span>
		</button>

		<!-- Navbar links -->
		<div class="collapse navbar-collapse" id="collapsibleNavbar">
			<ul class="list navbar-nav ml-auto">
				<li class="list-item nav-item">
					<a class="list-link nav-link active" href="index.php">HOME</a>
					<li class="list-item nav-item">
						<a class="list-link nav-link" href="about.php">ABOUT</a>
					</li>
				</ul>
			</div>
			<div class="collapse navbar-collapse" id="collapsibleNavbar">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i> <span id="cart-item" class="badge badge-danger"></span></a>
					</li>
				</ul>
			</div>
		</nav>
		<!-- start of about here -->
<div class="bgimg-1">
  <div class="caption">
  <span class="border">#MILKTEADAY</span>
  </div>
</div>

<div style="color: #fff;background-color:#212121;text-align:center;padding:50px 80px;text-align: justify;">
  <h3 style="text-align:center;">FoodCrib</h3>
  <p style="text-align: center;">Reward yourself and your beloved with the finest tasting tea brewed to perfection and served splendidly into your doosteps with #FoodCrib.</p>
</div>

<div class="bgimg-2">
  <div class="caption">
  <span class="border" style="background-color:transparent;font-size:25px;color: #f7f7f7;">DRINK AND ENJOY WITH FRIENDS</span>
  </div>
</div>

<div style="position:relative;">
  <div style="color:#fff;background-color:#212121;text-align:center;padding:50px 80px;text-align: justify;">
  <p style="text-align: center;">Order now, and get your premium Ochado drink at your doorstep</p>
  </div>
</div>

<div class="bgimg-3">
  <div class="caption">
  <span class="border" style="background-color:transparent;font-size:25px;color: #f7f7f7;">GRAB YOUR MILKTEA NOW</span>
  </div>
</div>

<div style="position:relative;">
  <div style="color:#fff;background-color:#212121;text-align:center;padding:50px 80px;text-align: justify;">
  <p style="text-align: center;">Life si short drink and enjoy with your friends!!</p>
  </div>
</div>

<div class="bgimg-1">
  
  </div>
</div>
		<!-- end of about -->
<div class="footer-layout">
			<div class="footer-content">
				<h3 class="brand">Food-Crib</h3>
				<p>This website is created by 3rd Year SOFE311 student.</p>
				<ul class="socials">
					<li><a href="https://www.facebook.com/FoodCribFairview"><i class="fab fa-facebook"></i></a></li>
					<li><a href="#"><i class="fab fa-twitter"></i></a></li>
					<li><a href="#"><i class="fab fa-instagram"></i></a></li>
				</ul>
			</div>
			<div class="footer-bottom">
				<p>COPYRIGHT &copy;2021 SOFEGROUP8. DESIGNED BY <span>CJ CARITO</span></p>
			</div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

		<!-- Popper JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$(".addItemBtn").click(function(e) {
					e.preventDefault();
					var $form = $(this).closest(".form-submit");
					var pid = $form.find(".pid").val();
					var pname = $form.find(".pname").val();
					var pprice = $form.find(".pprice").val();
					var pimage = $form.find(".pimage").val();
					var pcode = $form.find(".pcode").val();

					$.ajax({
						url: 'action.php',
						method: 'post',
						data: {pid:pid,pname:pname,pprice:pprice,pimage:pimage,pcode:pcode},
						success:function(response){
							$("#message").html(response);
							window.scrollTo(0,0);
							load_cart_item_number();
						}
					});
				});

				load_cart_item_number();
				function load_cart_item_number(){
					$.ajax({
						url:'action.php',
						method: 'get',
						data: {cartItem:"cart_item"},
						success:function(response){
							$("#cart-item").html(response);
						}
					});
				}
			});
		</script>
</body>
</html>