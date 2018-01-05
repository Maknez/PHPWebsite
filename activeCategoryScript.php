<?php
 
    session_start();
	
	
	
	if (isset($_GET['whiteWines']))
	{
		$_SESSION['nav_active_cat'] = 'White';
		$_SESSION['active_cat'] = '<li><a href="activeCategoryScript.php/?allProducts" >All Products</a> </li>
							<li><a href="activeCategoryScript.php/?redWines" >Red</a></li>
							<li class="active"><a href="activeCategoryScript.php/?whiteWines" ><span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>White</a></li>
							<li><a href="activeCategoryScript.php/?champagne" >Champagne</a></li>';	
		header('Location: ../categories.php');
	}
	elseif (isset($_GET['redWines']))
	{
		$_SESSION['nav_active_cat'] = 'Red';
		$_SESSION['active_cat'] = '<li><a href="activeCategoryScript.php/?allProducts" >All Products</a> </li>
							<li class="active"><a href="activeCategoryScript.php/?redWines" ><span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>Red</a></li>
							<li><a href="activeCategoryScript.php/?whiteWines" >White</a></li>
							<li><a href="activeCategoryScript.php/?champagne" >Champagne</a></li>';	
		header('Location: ../categories.php');
	}
	
	elseif (isset($_GET['champagne']))
	{
		$_SESSION['nav_active_cat'] = 'Champagne';
		$_SESSION['active_cat'] = '<li><a href="activeCategoryScript.php/?allProducts" >All Products</a> </li>
							<li><a href="activeCategoryScript.php/?redWines" >Red</a></li>
							<li><a href="activeCategoryScript.php/?whiteWines" >White</a></li>
							<li class="active"><a href="activeCategoryScript.php/?champagne" ><span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>Champagne</a></li>';	
		header('Location: ../categories.php');
	}
	
	elseif (isset($_GET['allProducts']))
	{
		$_SESSION['nav_active_cat'] = 'All Products';
		$_SESSION['active_cat'] = '<li class="active"><a href="activeCategoryScript.php/?allProducts" ><span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>All Products</a> </li>
							<li><a href="activeCategoryScript.php/?redWines" >Red</a></li>
							<li><a href="activeCategoryScript.php/?whiteWines" >White</a></li>
							<li><a href="activeCategoryScript.php/?champagne" >Champagne</a></li>';
		header('Location: ../categories.php');
		exit();
	}
	else {
		header('Location: ../categories.php');
	}
		
    
 
?>


