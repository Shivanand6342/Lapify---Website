<?php include('../config/constantsuser.php');

if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE id=$id";
    $res = mysqli_query($conn, $sql);
    
    if($res == TRUE)
    {
        $count = mysqli_num_rows($res);
        if($count==1)
        {
            // Get the details
            $row=mysqli_fetch_assoc($res);

            $name = $row['name'];
            $image_name = $row['image_name'];
            $ram = $row['ram'];
            $storage = $row['storage'];
            $processor = $row['processor'];
            $windows = $row['windows'];
            $weight = $row['weight'];
            $thickness = $row['thickness'];
            $battery = $row['battery'];
            $description = $row['description'];
            $price = $row['price'];
        }
        else
        {   
            header('location:'.SITEURL);
        }
    }
}
else
{
    header('location:'.SITEURL);
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Product - Lapify</title>

	<!-- For-Mobile-Apps -->
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" />
	<script
		type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- //For-Mobile-Apps -->

	<!-- Web-Fonts -->
	<link href='//fonts.googleapis.com/css?family=Raleway:400,500,600,700,300' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
	<!-- //Web-Fonts -->

	<!-- Custom-Theme-Files -->
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<!-- //Custom-Theme-Files -->
</head>

<!-- Body-Starts-Here -->

<body>

	<!-- Content-Starts-Here -->
	<div class="content">

		<h1 style="font-family: 'Russo One', sans-serif; color: white;">PRODUCT DETAILS</h1>

		<div class="container" style="width: 80%;">

			<h2 align="center" style="color: rgb(17, 118, 212);"><b><?php echo $name; ?></b></h2>

			<div class="product">
				<div class="product-image">
					
					<?php
					if($image_name=="")
					{
						echo "<div class='error'>Image is not Added</div>";
					}
					else
					{
						?>
						<img style="margin-top: 20px; margin-left: 50px;" src="<?php echo SITEURL; ?>images/laptop/<?php echo $image_name; ?>">
						<?php
					}
					?>

				</div>
				<div class="product-info" style="margin-top: 30px;">
					<p><span>RAM</span> <?php echo $ram; ?> </p>
					<p><span>Processor</span> <?php echo $processor; ?> </p>
					<p><span>Storage</span> <?php echo $storage; ?> </p>
					<p><span>Windows</span> <?php echo $windows; ?> </p>
					<p><span>Weight</span> <?php echo $weight; ?> </p>
					<p><span>Thickness</span> <?php echo $thickness; ?> </p>
					<p><span>Battery</span> <?php echo $battery; ?> </p>
					<p><span>Price</span><?php echo $price; ?>/-</p>
					<div class="cart" style="margin-right: 470px;"><a href="#">Buy Now</a></div>
				</div>
				<div class="clear"></div>
			</div>

			<div class="accordion">
				<section class="ac-container">
					<div>
						<input id="ac-1" name="accordion-1" type="checkbox" />
						<label for="ac-1" style="color: black; padding-left: 50px;">Description</label>
						<article class="ac-small">
							<p><?php echo $description; ?></p>
						</article>
					</div>
					<div>
						<input id="ac-3" name="accordion-1" type="checkbox" />
						<label for="ac-3" style="color: black; padding-left: 50px;">Rating & Reviews (40+)</label>
						<article class="ac-large ac-review">
							<h3>"Best Review !"</h3>
							<h3 style="margin-left: -1010px;">Excellent Laptop</h3>
							<h4>Arvind Vishwakarma, Certified Buyer.</h4>
							<p>I'm so impressed with this product and I Loved it so much. Great Work Developer and Excellent Service.</p>
							<span>5 Stars</span>
							<!-- <a href="#" class="next">Next Review &rarr;</a> -->
						</article>
					</div>
					<div>
						<input id="ac-4" name="accordion-1" type="checkbox" />
						<label for="ac-4" style="color: black; padding-left: 50px;">Shipping Info</label>
						<article class="ac-medium">
							<h3>Shipping</h3>
							<ul class="ship">
								<li class="day">4-10 Business Days</li>
								<li class="home">Free Home Delivery</li>
								<li class="cod">Cash On Delivery Available*</li>
							</ul>
						</article>
					</div>
				</section>
			</div>

		</div>

	</div>
	<!-- //Content-Ends-Here -->

	<!-- Copyright-Starts-Here -->
	<div class="copyright">
		<p>&copy; 2022 All Rights Reserved by <a href="#"> Shivanand Vishwakarma </a></p>
	</div>
	<!-- //Copyright-Ends-Here -->

</body>
<!-- Body-Ends-Here -->

</html>