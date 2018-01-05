<?php
 
    session_start();
	
	
	$temp = $_GET['photo'];
	$val = $_GET['tempvalue'];
	if ($temp == 1)
	{
		$_SESSION['active_pho'] = '<a href="activePhotoScript.php/?photo=1&tempvalue='.$val.'"><li class="active"><img src="images/product_'.$val.'_small.jpg" alt="" data-image="images/product_'.$val.'_small.jpg"></li></a>
															<a href="activePhotoScript.php/?photo=2&tempvalue='.$val.'"><li><img src="images/product_'.$val.'_square.jpg" alt="" data-image="images/product_'.$val.'_square.jpg"></li></a>	
														</ul>
													</div>
												</div>
												<div class="col-lg-9 image_col order-lg-2 order-1">
													<div class="single_product_image">
														<div class="single_product_image_background" style="background-image:url(images/product_'.$val.'_single_square.jpg)"></div>
													</div>
												</div>';
		header('Location: ../single.php?product='.$val.'');
	}
	elseif ($temp == 2)
	{
		$_SESSION['active_pho'] = '<a href="activePhotoScript.php/?photo=1&tempvalue='.$val.'"><li><img src="images/product_'.$val.'_small.jpg" alt="" data-image="images/product_'.$val.'_small.jpg"></li></a>
															<a href="activePhotoScript.php/?photo=2&tempvalue='.$val.'"><li class="active"><img src="images/product_'.$val.'_square.jpg" alt="" data-image="images/product_'.$val.'_square.jpg"></li></a>
														</ul>
													</div>
												</div>
												<div class="col-lg-9 image_col order-lg-2 order-1">
													<div class="single_product_image">
														<div class="single_product_image_background" style="background-image:url(images/product_'.$val.'_square.jpg)"></div>
													</div>
												</div>';
		header('Location: ../single.php?product='.$val.'');
	}
	else {
		header('Location: ../categories.php');
	}
		
    
 
?>


