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
	<title>Shop-Grid | BOOKSTOR</title>
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
		<div class="box-search-content search_active block-bg close__top">
			<form id="search_mini_form" class="minisearch" action="#">
				<div class="field__search">
					<input type="text" placeholder="Search entire store here...">
					<div class="action">
						<a href="#"><i class="zmdi zmdi-search"></i></a>
					</div>
				</div>
			</form>
			<div class="close__wrap">
				<span>close</span>
			</div>
		</div>
		<!-- End Search Popup -->
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area bg-image--6" style="background-image: linear-gradient(rgba(0,4,45,0.5),rgba(0,4,45,0.5)),url('images/bk3.jpg');">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bradcaump__inner text-center">
                        	<h2 class="bradcaump-title">Shop Grid</h2>
                            <nav class="bradcaump-content">
                              <a class="breadcrumb_item" href="index.php">Home</a>
                              <span class="brd-separetor">/</span>
                              <span class="breadcrumb_item active">Shop Grid</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Shop Page -->
        <div class="page-shop-sidebar left--sidebar bg--white section-padding--lg">
        	<div class="container">
        		<div class="row">
				<div class="col-lg-9 col-12 order-1 order-lg-2">
        				<div class="row">
        					<div class="col-lg-12">
								<div class="shop__list__wrapper d-flex flex-wrap flex-md-nowrap justify-content-between">
			                        <p>Affichage :</p>
									<?php
                                    $iid=$_GET['id'];

									$result = mysqli_query($con,"SELECT * FROM categorie C,souscategorie S,products p WHERE C.id=$iid AND C.nom=S.cat AND S.name=P.code");
								$total_row=0;
									while($roow = mysqli_fetch_assoc($result)){
   
										$total_row++;
}
echo "<span>$total_row  article(s)</span> ";
?>
		                        </div>
							</div>
							<div class="tab__container">
	        				<div class="shop-grid tab-pane fade show active" id="nav-grid" role="tabpanel">
	        					<div class="row">
	        						<!-- Start Single Product -->

							
            	<br />
				<div class='row filter_data'>
			
     </div>           
		        					<style>
#loading
{
	text-align:center; 
	background: url('loader.gif') no-repeat center; 
	height: 150px;
}
</style>

<script>
$(document).ready(function(){

    filter_data();

    function filter_data()
    {
        $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'fetch_data';
        var minimum_price = $('#hidden_minimum_price').val();
        var maximum_price = $('#hidden_maximum_price').val();
        var categorie = get_filter('categorie');
		
	
        $.ajax({
            url:"fetch_data.php?ID=<?php echo $_GET['id']; ?>",
            method:"POST",
            data:{action:action, minimum_price:minimum_price, maximum_price:maximum_price, categorie:categorie},
            success:function(data){
                $('.filter_data').html(data);
            }
        });
    }

    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

    $('.common_selector').click(function(){
        filter_data();
    });

    $('#price_range').slider({
        range:true,
        min:0,
        max:500,
        values:[0, 500],
        step:1,
        stop:function(event, ui)
        {
            $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
            $('#hidden_minimum_price').val(ui.values[0]);
            $('#hidden_maximum_price').val(ui.values[1]);
            filter_data();
        }
    });

});
</script>

	        						<!-- End Single Product -->
	        					</div>
	        				</div>
        				</div>
        					</div>
        				</div>
        			<div class="col-lg-3 col-12 order-2 order-lg-1 md-mt-40 sm-mt-40">
        				<div class="shop__sidebar">
        					<aside class="wedget__categories poroduct--cat">
        						<h3 class="wedget__title">Product Categories</h3>
								<div style="height: 180px; overflow-y: auto; overflow-x: hidden;">
								<?php
$connect = new PDO("mysql:host=localhost;dbname=BookStor", "root", "");
$query = "
SELECT DISTINCT(name) FROM souscategorie  ORDER BY id 
";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
foreach($result as $row)
{
?>
<div class="list-group-item checkbox">
	<label><input type="checkbox" class="common_selector categorie" value="<?php echo $row['name']; ?>" > <?php echo $row['name']; ?></label>
</div>
<?php    
}

?>
								</div>
        					</aside>
							<h3 class="wedget__title">Filter by price</h3>
							<div class="content-shopby">
					<h3>Prix</h3>
					<input type="hidden" id="hidden_minimum_price" value="0" />
                    <input type="hidden" id="hidden_maximum_price" value="500" />
                    <p id="price_show">0 - 500</p>
                    <div id="price_range"></div>
                </div>				
        				</div>
        			</div>
        			<div class="col-lg-9 col-12 order-1 order-lg-2">
        				<div class="row">
        					<div class="col-lg-12">
								
        					</div>
        				</div>
        			
        			</div>
        		</div>
        	</div>
        </div>
        <!-- End Shop Page -->
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