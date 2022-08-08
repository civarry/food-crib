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
</head>
<body>
	<nav style="background-color:#212121" class="px-5 navbar navbar-expand-md">
		<!-- Brand -->
		<a class="navbar-brand" href="index.php"> <h1 href="#" width="absolute">Food-Crib</h1></a>

		<!-- Toggler/collapsibe Button -->
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<i class="menubarcolor fas fa-bars"></i>
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
		<!-- end of topnav -->
		<div id="message"></div>
		<div class="banner">
			<img class="image"src="./image/1.jpg">
		</div> 
		<div class="cotainer mx-5">
			<div class="row mt-2 pb-3">
				<?php
				include 'config.php';
				$stmt = $conn->prepare("SELECT * FROM product");
				$stmt->execute();
				$result = $stmt->get_result();
				while($row = $result->fetch_assoc()): 
					?>
					<div class="col-sm-6 col-md-4 col-lg-3 mb-2" >
						<div class="card-deck">
							<div class="card round2 border-0">
								<img class="round" src="<?= $row['product_image'] ?>" class="card-img-top" class="img-fluid">
								<div class="p-1">
									<form action="" class="form-submit">
										<input type="hidden" class="pid" value="<?= $row['id'] ?>">
										<input type="hidden" class="pname" value="<?= $row['product_name'] ?>">
										<input type="hidden" class="pprice" value="<?= $row['product_price'] ?>">
										<input type="hidden" class="pimage" value="<?= $row['product_image'] ?>">
										<input type="hidden" class="pcode" value="<?= $row['product_code'] ?>">
										<div id="main-content">
											<div id="t-alignment" class="p-1">
												<h5 class="card-title"><?= $row['product_name']?></h5>
												<h6 class="card-text">₱ <?= number_format($row['product_price'],2)?></h6>
											</div>
											<div>
												<button class="btn btn-block addItemBtn"><i class="fas fa-plus"></i></button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			</div>	
		</div>
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
