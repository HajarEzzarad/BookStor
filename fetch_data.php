
<?php

$ID=$_GET['ID'];
//database_connection.php
$connect = new PDO("mysql:host=localhost;dbname=BookStor", "root", "");
error_reporting(E_ALL^E_NOTICE);

if(isset($_POST["action"]))
{
	
	$query = "
	SELECT * FROM categorie C,souscategorie S,products P
	";
	$query .= "
	WHERE C.id=$ID AND C.nom=S.cat AND S.name=P.code
		";
	if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
	{
		$query .= "
		AND P.prix BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'
		";
	}
	if(isset($_POST["categorie"]))
	{
	 $brand_filter = implode("','", $_POST["categorie"]);
	 $query .= "
	  AND P.code  = '".$brand_filter."' 
	 ";
	}
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$total_row = $statement->rowCount();
	$output = '';
	if($total_row > 0)
	{
		foreach($result as $roow)
		{
			$output .= "
			<div class='col-sm-4 col-lg-3 col-md-3'>
			<div class='product_wrapper'>
    <form method='post' action=''>
    <input type='hidden' name='code' value=".$roow['code']." />
    <div class='image'><img src='images/product/".$roow['image']."'></div>
    <div class='name'><a href='single-product.php?id=".$roow["id"]."'>".$roow['nom']."</div>
    <div class='price'>DH ".$roow['prix']."</div>
    <button type='submit' class='buy'>Ajouter Au Panier</button>
    </form>
    </div>
		
		   </div>
			";

		}
	}
	else
	{
		$output = '<h3>No Data Found</h3>';
	}
	echo $output;
}



?>