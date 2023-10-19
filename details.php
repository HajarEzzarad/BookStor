<?php
  require_once 'conx.php';
  $dsn = 'mysql:host=' . 'localhost' . ';dbname=' .  'BookStor' . '';
  try {

    $conn = new PDO($dsn, "root", "");
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  } catch (PDOException $e) {
    die('Error : ' . $e->getMessage());
  }
  if (isset($_POST['submit'])) {
    $produitName = $_POST['search'];

    $sql = 'SELECT * FROM products WHERE nom = :nom';
    $stmt = $conn->prepare($sql);
    $stmt->execute(['nom' => $produitName]);
    $row = $stmt->fetch();
  } else {
    header('location: .');
    exit();
  }
?>
<?php
session_start();
include('conx.php');
$status="";
if (isset($_POST['code']) && $_POST['code']!=""){
$code = $_POST['code'];
$result = mysqli_query(
$con,
"SELECT * FROM `products` WHERE `code`='$code'"
);
while($row = mysqli_fetch_assoc($result)){
	$nom = $row['nom'];
$code = $row['code'];
$prix = $row['prix'];
$image = $row['image'];
 


$cartArray = array(
 $code=>array(
 'nom'=>$nom,
 'code'=>$code,
 'prix'=>$prix,
 'quantity'=>1,
 'image'=>$image)
);
 
if(empty($_SESSION["shopping_cart"])) {
    $_SESSION["shopping_cart"] = $cartArray;
    $status = "<div class='box'>Product is added to your cart!</div>";
}else{
    $array_keys = array_keys($_SESSION["shopping_cart"]);
    if(in_array($code,$array_keys)) {
 $status = "<div class='box' style='color:red;'>
 Product is already added to your cart!</div>"; 
    } else {
    $_SESSION["shopping_cart"] = array_merge(
    $_SESSION["shopping_cart"],
    $cartArray
    );
    $status = "<div class='box'>Product is added to your cart!</div>";
 }
 
 }
}
}
?>
 
<!doctype html>
<html class="no-js" lang="zxx">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Details | BookStor</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="script.js"></script>
	<!-- Favicons -->
	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="apple-touch-icon" href="images/icon.png">

	<!-- Google font (font-family: 'Roboto', sans-serif; Poppins ; Satisfy) -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,600,600i,700,700i,800" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet"> 

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/plugins.css">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="style1.css">
	<!-- Cusom css -->
   <link rel="stylesheet" href="css/custom.css">

	<!-- Modernizer js -->
	<script src="js/vendor/modernizr-3.5.0.min.js"></script>
</head>
<body>
	<!--[if lte IE 9]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
	<![endif]-->

	<div class="wrapper" id="wrapper">
		<!-- Header -->
		<header id="wn__header" class="header__area header__absolute sticky__header">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-6 col-sm-6 col-6 col-lg-2">
						<div class="logo">
							<a href="index.php">
								<img src="images/logo/logo.png" alt="logo images">
							</a>
						</div>
					</div>
					<div class="col-lg-8 d-none d-lg-block">
						<nav class="mainmenu__nav">
							<ul class="meninmenu d-flex justify-content-start">
								<li class="drop with--one--item"><a href="index.php">Home</a></li>
								
								<?php $cats="select * from categorie WHERE id='59'";
										$catc=mysqli_query($con,$cats);
										?>
											<?php 
											while($cata=mysqli_fetch_assoc($catc)){?>
												<li class="drop"><a href="shop-grid.php?id=<?php echo $cata['id']; ?>"><?php echo $cata['nom']?> </a>
											<?php }
											?>
									<div class="megamenu mega03">
										<ul class="item item03">
											<li class="title">LIVRES</li>
			
											<?php $cats="select * from souscategorie WHERE id>=1 and id<=12";
										$catc=mysqli_query($con,$cats);
										?>
											<?php 
											while($cata=mysqli_fetch_assoc($catc)){?>
												<li><a href="shop-griid.php?id=<?php echo $cata['id']; ?>"><?php echo $cata['name']?> </a></li>
											<?php }
											?>
											

										</ul>
										<ul class="item item03">
											<li class="title">MATERNALE</li>
											<?php $cats="select * from souscategorie WHERE id>12 and id<=15";
										$catc=mysqli_query($con,$cats);
										?>
											<?php 
											while($cata=mysqli_fetch_assoc($catc)){?>
												<li><a href="shop-griid.php?id=<?php echo $cata['id']; ?>"><?php echo $cata['name']?> </a></li>
											<?php }
											?>
											
										</ul>
										<ul class="item item03">
											<li class="title">LIVRES SCOLAIRES</li>
											<?php $cats="select * from souscategorie WHERE id>15 and id<=27";
										$catc=mysqli_query($con,$cats);
										?>
											<?php 
											while($cata=mysqli_fetch_assoc($catc)){?>
												<li><a href="shop-griid.php?id=<?php echo $cata['id']; ?>"><?php echo $cata['name']?> </a></li>
											<?php }
											?>
											
										</ul>
										<ul class="item item03">
											<li class="title">LIVRES PARASCOLAIRES</li>
											<?php $cats="select * from souscategorie WHERE id>27 and id<=31";
											$catc=mysqli_query($con,$cats);
										?>
											<?php 
											while($cata=mysqli_fetch_assoc($catc)){?>
												<li><a href="shop-griid.php?id=<?php echo $cata['id']; ?>"><?php echo $cata['name']?> </a></li>
											<?php }
											?>
										</ul>
									</div>
								</li>
							

<?php $cats="select * from categorie WHERE id='60'";
										$catc=mysqli_query($con,$cats);
										?>
											<?php 
											while($cata=mysqli_fetch_assoc($catc)){?>
												<li class="drop"><a href="shop-grid.php?id=<?php echo $cata['id']; ?>"><?php echo $cata['nom']?> </a>
											<?php }
											?>
									<div class="megamenu mega03">
										<ul class="item item03">
											<li class="title">PAPETERIE ET CLASSEMENT</li>
											<?php $cats="select * from souscategorie WHERE id>31 and id<=35";
											$catc=mysqli_query($con,$cats);
										?>
											<?php 
											while($cata=mysqli_fetch_assoc($catc)){?>
												<li><a href="shop-griid.php?id=<?php echo $cata['id']; ?>"><?php echo $cata['name']?> </a></li>
											<?php }
											?>
										</ul>
										<ul class="item item03">
											<li class="title">FOURNITURE</li>
											<?php $cats="select * from souscategorie WHERE id>35 and id<=42";
											$catc=mysqli_query($con,$cats);
										?>
											<?php 
											while($cata=mysqli_fetch_assoc($catc)){?>
												<li><a href="shop-griid.php?id=<?php echo $cata['id']; ?>"><?php echo $cata['name']?> </a></li>
											<?php }
											?>
										</ul>
										<ul class="item item03">
											<li class="title">CARTABLE ET TROUSSE</li>
											<?php $cats="select * from souscategorie WHERE id>42 and id<=46";
											$catc=mysqli_query($con,$cats);
										?>
											<?php 
											while($cata=mysqli_fetch_assoc($catc)){?>
												<li><a href="shop-griid.php?id=<?php echo $cata['id']; ?>"><?php echo $cata['name']?> </a></li>
											<?php }
											?>
										</ul>
									</div>
								</li>
								<?php $cats="select * from categorie WHERE id='61'";
										$catc=mysqli_query($con,$cats);
										?>
											<?php 
											while($cata=mysqli_fetch_assoc($catc)){?>
												<li class="drop"><a href="shop-grid.php?id=<?php echo $cata['id']; ?>"><?php echo $cata['nom']?> </a>
											<?php }
											?>
									<div class="megamenu mega02">
										<ul class="item item02">
											<li class="title">PEINTURES</li>
											<?php $cats="select * from souscategorie WHERE id>46 and id<=51";
											$catc=mysqli_query($con,$cats);
										?>
											<?php 
											while($cata=mysqli_fetch_assoc($catc)){?>
												<li><a href="shop-griid.php?id=<?php echo $cata['id']; ?>"><?php echo $cata['name']?> </a></li>
											<?php }
											?>
										</ul>
										<ul class="item item02">
											<li class="title">CRAYONS ET FEUTRES</li>
											<?php $cats="select * from souscategorie WHERE id>51 and id<=54";
											$catc=mysqli_query($con,$cats);
										?>
											<?php 
											while($cata=mysqli_fetch_assoc($catc)){?>
												<li><a href="shop-griid.php?id=<?php echo $cata['id']; ?>"><?php echo $cata['name']?> </a></li>
											<?php }
											?>
										</ul>
										<ul class="item item02">
											<li class="title">ACCESSOIRES DIVERS</li>
											<?php $cats="select * from souscategorie WHERE id>54 and id<=57 ";
											$catc=mysqli_query($con,$cats);
										?>
											<?php 
											while($cata=mysqli_fetch_assoc($catc)){?>
												<li><a href="shop-griid.php?id=<?php echo $cata['id']; ?>"><?php echo $cata['name']?> </a></li>
											<?php }
											?>
										</ul>
									</div>
								</li>
								
								<li><a href="#best-sellers">BEST SELLERS </a></li>
										
							
							</ul>
						</nav>
					</div>
					<div class="col-md-6 col-sm-6 col-6 col-lg-2">
						<ul class="header__sidebar__right d-flex justify-content-end align-items-center">
							<li class="shop_search"><a class="search__active" href="#"></a></li>
							<li class="shopcart"><a class="cartbox_active" href="cart.php">
								<!-- Start Shopping Cart -->
						<?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>
 <span class="product_qun">
<?php echo $cart_count; ?></span></a>
<?php
}
?>

<div class="block-minicart minicart__active">
									<div class="minicart-content-wrapper">
										<div class="micart__close">
											<span>close</span>
										</div>
										<div class="items-total d-flex justify-content-between">
											
											<span>Total de Produits</span>
										</div>
										<div class="total_amount text-right">
											<span><?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>
 <span class="product_qun">
<?php echo $cart_count; ?></span>
<?php
}else{
	 echo 'your cart is empty!'; } ?>
</span>
										</div>
										<div class="mini_action checkout">
											<a class="checkout__btn" href="cart.php">AFFICHER LE PANIER</a>
										</div>
										
									</div>
								</div>
								<!-- End Shopping Cart -->
							</li>
							<!--******-->
								
							
							
							<li class="setting__bar__icon"><a class="setting__active" href="#"></a>
								<div class="searchbar__content setting__block">
									<div class="content-inner">
										
										<div class="switcher-currency">
											<strong class="label switcher-label">
												<span>My Account</span>
											</strong>
											<div class="switcher-options">
												<div class="switcher-currency-trigger">
													<div class="setting__menu">
													
											
														<span><a href="my-account.php">Sign In</a></span>
														<span><a href="my-account.php">Create An Account</a></span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</li>

						</ul>
					</div>
				</div>
				<!-- Start Mobile Menu -->
				<div class="row d-none">
					<div class="col-lg-12 d-none">
						<nav class="mobilemenu__nav">
							<ul class="meninmenu">
								<li><a href="index.php">Home</a></li>
								<?php $cats="select * from categorie WHERE id='59'";
										$catc=mysqli_query($con,$cats);
										?>
											<?php 
											while($cata=mysqli_fetch_assoc($catc)){?>
												<li class="drop"><a href="shop-grid.php?id=<?php echo $cata['id']; ?>"><?php echo $cata['nom']?> </a>
											<?php }
											?>
									<ul>
									
										<li><a href="portfolio.html">Livres</a>
											<ul>
											<?php $cats="select * from souscategorie WHERE id>=1 and id<=12";
										$catc=mysqli_query($con,$cats);
										?>
											<?php 
											while($cata=mysqli_fetch_assoc($catc)){?>
												<li><a href="shop-griid.php?id=<?php echo $cata['id']; ?>"><?php echo $cata['name']?> </a></li>
											<?php }
											?>
											
											</ul>
										</li>
										<li><a href="portfolio.html">Maternale</a>
											<ul>
											<?php $cats="select * from souscategorie WHERE id>12 and id<=15";
										$catc=mysqli_query($con,$cats);
										?>
											<?php 
											while($cata=mysqli_fetch_assoc($catc)){?>
												<li><a href="shop-griid.php?id=<?php echo $cata['id']; ?>"><?php echo $cata['name']?> </a></li>
											<?php }
											?>
											</ul>
										</li>
										
										<li><a href="portfolio.html">LIVRES SCOLAIRES</a>
											<ul>
											<?php $cats="select * from souscategorie WHERE id>15 and id<=27";
										$catc=mysqli_query($con,$cats);
										?>
											<?php 
											while($cata=mysqli_fetch_assoc($catc)){?>
												<li><a href="shop-griid.php?id=<?php echo $cata['id']; ?>"><?php echo $cata['name']?> </a></li>
											<?php }
											?>
											</ul>
										</li>


										<li><a href="portfolio.html">LIVRES PARASCOLAIRES</a>
											<ul>
											<?php $cats="select * from souscategorie WHERE id>27 and id<=31";
											$catc=mysqli_query($con,$cats);
										?>
											<?php 
											while($cata=mysqli_fetch_assoc($catc)){?>
												<li><a href="shop-griid.php?id=<?php echo $cata['id']; ?>"><?php echo $cata['name']?> </a></li>
											<?php }
											?>
											</ul>
										</li>
									</ul>
								</li>
								



								<?php $cats="select * from categorie WHERE id='60'";
										$catc=mysqli_query($con,$cats);
										?>
											<?php 
											while($cata=mysqli_fetch_assoc($catc)){?>
												<li class="drop"><a href="shop-grid.php?id=<?php echo $cata['id']; ?>"><?php echo $cata['nom']?> </a>
											<?php }
											?>
									<ul>
									
										<li><a href="portfolio.html">PAPETERIE ET CLASSEMENT</a>
											<ul>
											<?php $cats="select * from souscategorie WHERE id>31 and id<=35";
											$catc=mysqli_query($con,$cats);
										?>
											<?php 
											while($cata=mysqli_fetch_assoc($catc)){?>
												<li><a href="shop-griid.php?id=<?php echo $cata['id']; ?>"><?php echo $cata['name']?> </a></li>
											<?php }
											?>
											</ul>
										</li>
										<li><a href="portfolio.html">FOURNITURE</a>
										<ul>
										<?php $cats="select * from souscategorie WHERE id>35 and id<=42";
											$catc=mysqli_query($con,$cats);
										?>
											<?php 
											while($cata=mysqli_fetch_assoc($catc)){?>
												<li><a href="shop-griid.php?id=<?php echo $cata['id']; ?>"><?php echo $cata['name']?> </a></li>
											<?php }
											?>
											</ul>
										</li>
										
										<li><a href="portfolio.html">CARTABLE ET TROUSSE</a>
											<ul>
											<?php $cats="select * from souscategorie WHERE id>42 and id<=46";
											$catc=mysqli_query($con,$cats);
										?>
											<?php 
											while($cata=mysqli_fetch_assoc($catc)){?>
												<li><a href="shop-griid.php?id=<?php echo $cata['id']; ?>"><?php echo $cata['name']?> </a></li>
											<?php }
											?>
											</ul>
										</li>
									</ul>
								</li>


								<?php $cats="select * from categorie WHERE id='61'";
										$catc=mysqli_query($con,$cats);
										?>
											<?php 
											while($cata=mysqli_fetch_assoc($catc)){?>
												<li class="drop"><a href="shop-grid.php?id=<?php echo $cata['id']; ?>"><?php echo $cata['nom']?> </a>
											<?php }
											?>
									<ul>
									
										<li><a href="portfolio.html">PEINTURES</a>
											<ul>
											<?php $cats="select * from souscategorie WHERE id>46 and id<=51";
											$catc=mysqli_query($con,$cats);
										?>
											<?php 
											while($cata=mysqli_fetch_assoc($catc)){?>
												<li><a href="shop-griid.php?id=<?php echo $cata['id']; ?>"><?php echo $cata['name']?> </a></li>
											<?php }
											?>
											</ul>
										</li>
										<li><a href="portfolio.html">CRAYONS ET FEUTRES</a>
										<ul>
										<?php $cats="select * from souscategorie WHERE id>51 and id<=54";
											$catc=mysqli_query($con,$cats);
										?>
											<?php 
											while($cata=mysqli_fetch_assoc($catc)){?>
												<li><a href="shop-griid.php?id=<?php echo $cata['id']; ?>"><?php echo $cata['name']?> </a></li>
											<?php }
											?>
											</ul>
										</li>
										
										<li><a href="portfolio.html">ACCESSOIRES DIVERS</a>
											<ul>
											<?php $cats="select * from souscategorie WHERE id>54 and id<=57 ";
											$catc=mysqli_query($con,$cats);
										?>
											<?php 
											while($cata=mysqli_fetch_assoc($catc)){?>
												<li><a href="shop-griid.php?id=<?php echo $cata['id']; ?>"><?php echo $cata['name']?> </a></li>
											<?php }
											?>
											</ul>
										</li>
									</ul>
								</li>

								<li><a href="#best-sellers">BEST SELLERS </a></li>

							</ul>
						</nav>
					</div>
				</div>
				<!-- End Mobile Menu -->
	            <div class="mobile-menu d-block d-lg-none">
	            </div>
	            <!-- Mobile Menu -->	
			</div>		
		</header>
		<!-- //Header -->
		<!-- Start Search Popup -->
		<div class="brown--color box-search-content search_active block-bg close__top">
			<form action="details.php" method="post"  id="search_mini_form" class="minisearch">
			<div class="field__search">
					<input type="text" name="search" id="search" placeholder="Search entire store here..." autocomplete="off" required>
					<div class="action">
						<!--<a><i class="zmdi zmdi-search"  name="submit"></i></a>-->
						<input type="submit" name="submit" value="Search" class="zmdi zmdi-search">
					</div>
				</div>
			</form>
			<div class="col-md-5" style="position: relative;margin-top: 400px;margin-left: 215px;">
        <div class="list-group" id="show-list">
          <!-- Here autocomplete list will be display >-->
        </div>
      </div>
			<div class="close__wrap">
				<span>close</span>
			</div>
</div>
	
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="script.js"></script>
		<!-- End Search Popup -->
        <!-- Start Slider area -->
        <div class="ht__bradcaump__area bg-image--3" style="background-image: linear-gradient(rgba(0,4,45,0.5),rgba(0,4,45,0.5)),url('images/bk3.jpg');">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bradcaump__inner text-center">
                        	<h2 class="bradcaump-title">Single Product</h2>
                            <nav class="bradcaump-content">
                              <a class="breadcrumb_item" href="index.php">Home</a>
                              <span class="brd-separetor">/</span>
                              <span class="breadcrumb_item active">Single Product</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Slider area -->
		<!-- Start BEst Seller Area -->
		<section class="wn__product__area brown--color pt--80  pb--30">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section__title text-center">
							<h2 class="title__be--2">Produits <span class="color--theme">Details</span></h2>
						</div>
					</div>
				</div>
				<div class="container">
    <div class="row mt-5">
      <div class="col-5 mx-auto">
        <div class="card shadow text-center">
          <div class="card-header">
          <?php echo" <div class='name'>".$row['nom']."</div>"; ?>
          </div>
          <div class="card-body">
           <div class='product_wrapper'>
          <?php echo "<input type='hidden' name='code' value=".$row['code']." />
           <div class='image'><img src='images/product/".$row['image']."'></div>
           
           <div class='price'>DH ".$row['prix']."</div>  
           <button type='submit' class='buy'>Ajouter Au Panier</button>";
           ?>
           </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <a class="shopbtn" href="index.php">continuer shoping</a>
  </section>
<!-- Footer Area -->
<footer id="wn__footer" class="footer__area bg__cat--8 brown--color">
			<div class="footer-static-top">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="footer__widget footer__menu">
								<div class="ft__logo">
									<a href="index.html">
										<img src="images/logo/3.png" alt="logo">
									</a>
									<p>Votre librairie en ligne au Maroc ! Livres(Romans, mangas, english books, développement personnel,...), Fournitures Scolaires, Livres scolaires.</p>
								</div>
								<div class="footer__content">
									<ul class="social__net social__net--2 d-flex justify-content-center">
										<li><a href="#"><i class="bi bi-facebook"></i></a></li>
										<li><a href="#"><i class="bi bi-google"></i></a></li>
										<li><a href="#"><i class="bi bi-twitter"></i></a></li>
										<li><a href="#"><i class="bi bi-linkedin"></i></a></li>
										<li><a href="#"><i class="bi bi-youtube"></i></a></li>
									</ul>
									<ul class="mainmenu d-flex justify-content-center">
										<li><a href="index.php">Home</a></li>
										<li><a href="#best-sellers">Best Seller</a></li>
										<li><a href="#all-products">All Product</a></li>
										<li><a href="cart.php">Mon Panier</a></li>
										<li><a href="my-account.php">Mon Compte</a></li>
										
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="copyright__wrapper">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12">
							<div class="copyright">
								<div class="copy__right__inner text-left">
									<p>Copyright <i class="fa fa-copyright"></i> 2022. All Rights Reserved</p>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12">
							<div class="payment text-right">
								<img src="images/icons/payment.png" alt="" />
							</div>
						</div>
					</div>
				</div>
			</div>
		
		</footer>
		<!-- //Footer Area -->
		<!-- QUICKVIEW PRODUCT -->
		<div id="quickview-wrapper">
		    <!-- Modal -->
		    <div class="modal fade" id="productmodal" tabindex="-1" role="dialog">
		        <div class="modal-dialog modal__container" role="document">
		            <div class="modal-content">
		                <div class="modal-header modal__header">
		                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		                </div>
		                <div class="modal-body">
		                    <div class="modal-product">
		                        <!-- Start product images -->
		                        <div class="product-images">
		                            <div class="main-image images">
		                                <img alt="big images" src="images/product/big-img/1.jpg">
		                            </div>
		                        </div>
		                        <!-- end product images -->
		                        <div class="product-info">
		                            <h1>Simple Fabric Bags</h1>
		                            <div class="rating__and__review">
		                                <ul class="rating">
		                                    <li><span class="ti-star"></span></li>
		                                    <li><span class="ti-star"></span></li>
		                                    <li><span class="ti-star"></span></li>
		                                    <li><span class="ti-star"></span></li>
		                                    <li><span class="ti-star"></span></li>
		                                </ul>
		                                <div class="review">
		                                    <a href="#">4 customer reviews</a>
		                                </div>
		                            </div>
		                            <div class="price-box-3">
		                                <div class="s-price-box">
		                                    <span class="new-price">$17.20</span>
		                                    <span class="old-price">$45.00</span>
		                                </div>
		                            </div>
		                            <div class="quick-desc">
		                                Designed for simplicity and made from high quality materials. Its sleek geometry and material combinations creates a modern look.
		                            </div>
		                            <div class="select__color">
		                                <h2>Select color</h2>
		                                <ul class="color__list">
		                                    <li class="red"><a title="Red" href="#">Red</a></li>
		                                    <li class="gold"><a title="Gold" href="#">Gold</a></li>
		                                    <li class="orange"><a title="Orange" href="#">Orange</a></li>
		                                    <li class="orange"><a title="Orange" href="#">Orange</a></li>
		                                </ul>
		                            </div>
		                            <div class="select__size">
		                                <h2>Select size</h2>
		                                <ul class="color__list">
		                                    <li class="l__size"><a title="L" href="#">L</a></li>
		                                    <li class="m__size"><a title="M" href="#">M</a></li>
		                                    <li class="s__size"><a title="S" href="#">S</a></li>
		                                    <li class="xl__size"><a title="XL" href="#">XL</a></li>
		                                    <li class="xxl__size"><a title="XXL" href="#">XXL</a></li>
		                                </ul>
		                            </div>
		                            <div class="social-sharing">
		                                <div class="widget widget_socialsharing_widget">
		                                    <h3 class="widget-title-modal">Share this product</h3>
		                                    <ul class="social__net social__net--2 d-flex justify-content-start">
		                                        <li class="facebook"><a href="#" class="rss social-icon"><i class="zmdi zmdi-rss"></i></a></li>
		                                        <li class="linkedin"><a href="#" class="linkedin social-icon"><i class="zmdi zmdi-linkedin"></i></a></li>
		                                        <li class="pinterest"><a href="#" class="pinterest social-icon"><i class="zmdi zmdi-pinterest"></i></a></li>
		                                        <li class="tumblr"><a href="#" class="tumblr social-icon"><i class="zmdi zmdi-tumblr"></i></a></li>
		                                    </ul>
		                                </div>
		                            </div>
		                            <div class="addtocart-btn">
		                                <a href="#">Add to cart</a>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
		<!-- END QUICKVIEW PRODUCT -->
	</div>
	<!-- //Main wrapper -->

	<!-- JS Files -->
	<script src="js/vendor/jquery-3.2.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/plugins.js"></script>
	<script src="js/active.js"></script>
	
</body>
</html>