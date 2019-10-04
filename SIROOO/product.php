<?php
	$con = mysqli_connect("localhost","root","","store") or die(mysqli_error($con));
	$select_qry1 = "SELECT * FROM items";
	$run1=mysqli_query($con,$select_qry1);
	$select_qry2 = "SELECT * FROM items1";
	$run2=mysqli_query($con,$select_qry2);
	$select_qry3 = "SELECT * FROM items2";
	$run3=mysqli_query($con,$select_qry3);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/styleP.css">
   <style>
		.suc{
			background:#fff;
			position:absolute;
			top:-30px;
			z-index:100;
			padding:5px 10px;
			width:100%;
			max-width:80%;
			margin:0 auto;
			animation: suc 5s;
		}
		@keyframes suc{
			form{top:-30px;}
			to{top:50px;}
		}
   </style>
</head>
<body>
    <div class="super_container">
        <header>

        </header>
        <div class="main_product">
            <div class="product_slideshow">
                <div class="img_show">
                    <div class="container">
                        <div class="img_content">
                            <div class="img_tag">New Arrivals</div>
                            <div class="img_title">Denim Jackets</div>
                            <div class="img_description">Lorem Spnkd sjsd si sdid sjd id siqss sd idiwnd ddi dnknds djisdw dsijsd sisdjd jd sdidji
                                jndnsj djsjhd isa au d8sdwdks ddid dhsd d8ss adydehd did  diudwd ihe diu ehd addk.
                            </div>
                            <div class="hashtag">
                                <span>#Like</span>
                                <span>#Share</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product_div">
                <div class="container">
                    <div class="pro_name">
                        <span>Product</span>
                    </div>
                    <div class="prod_type">
                        <div><a href="javascript:void(0);" onclick="pro_show('p1','p2','p3')">1st</a></div>
                        <div><a href="javascript:void(0);" onclick="pro_show('p2','p1','p3')">2nd</a></div>
                        <div><a href="javascript:void(0);" onclick="pro_show('p3','p1','p2')">3rd</a></div>
                    </div>
                    <div class="all-prods" id="p1">
                        <div class="prods">
						<?php
						while ($row1 = mysqli_fetch_array($run1)) {
						?>
                            <div class="prod">
                                <div class="prod_img">
                                    <img src="img/products/<?php echo $row1['imgpath'];?>" alt="">
                                </div>
                                <div class="prod_details">
                                    <div class="prod-name"><?php echo $row1['name'];?></div>
                                    <div class="prod-price">Price : <?php echo $row1['price'];?>Rs</div>
                                </div>
                                <div class="buynow">
						<a href="confirm-order.php?prodName=<?php echo $row1['name'];?>&prodprice=<?php echo $row1['price'];?>">Buy Now</a>
                                </div>
                            </div>
						<?php } ?>
                        </div>
                    </div>
					<div class="all-prods" id="p2">
                        <div class="prods">
						<?php
						while ($row2 = mysqli_fetch_array($run2)) {
						?>
                            <div class="prod">
                                <div class="prod_img">
                                    <img src="img/products/<?php echo $row2['imgpath'];?>" alt="">
                                </div>
                                <div class="prod_details">
                                    <div class="prod-name"><?php echo $row2['name'];?></div>
                                    <div class="prod-price">Price : <?php echo $row2['price'];?>Rs</div>
                                </div>
                                <div class="buynow">
						<a href="confirm-order.php?prodName=<?php echo $row2['name'];?>&prodprice=<?php echo $row2['price'];?>">Buy Now</a>
                                </div>
                            </div>
						<?php } ?>
                        </div>
                    </div>
					<div class="all-prods" id="p3">
                        <div class="prods">
						<?php
						while ($row3 = mysqli_fetch_array($run3)) {
						?>
                            <div class="prod">
                                <div class="prod_img">
                                    <img src="img/products/<?php echo $row3['imgpath'];?>" alt="">
                                </div>
                                <div class="prod_details">
                                    <div class="prod-name"><?php echo $row3['name'];?></div>
                                    <div class="prod-price">Price : <?php echo $row3['price'];?>Rs</div>
                                </div>
                                <div class="buynow">
						<a href="confirm-order.php?prodName=<?php echo $row3['name'];?>&prodprice=<?php echo $row3['price'];?>">Buy Now</a>
                                </div>
                            </div>
						<?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <footer>

        </footer>
    </div>
	<?php
		if(isset($_GET['suc'])){
			$suc = $_GET['suc'];
			echo "<div class='suc'>$suc</div>";
		}
	?>
	<script>
		function pro_show(x,y,z){
			var fix = document.getElementById(x);
			var fix2 = document.getElementById(y);
			var fix3 = document.getElementById(z);
			if(fix.style.display=='block'){
				fix.style.display='block';
			}else{
				fix.style.display='block';
				fix2.style.display='none';
				fix3.style.display='none';
			}
		}
		pro_show('p1','p2','p3');
	</script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</body>
</html>