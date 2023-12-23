<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1, shrink-to-fit=no"
		/>
		<link
			rel="stylesheet"
			href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
			integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
			crossorigin="anonymous"
		/>
		<link rel="stylesheet" href="style.css" type="text/css" />
		<link
			href="https://unpkg.com/ionicons@4.2.0/dist/css/ionicons.min.css"
			rel="stylesheet"
		/>
		<link
			href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900"
			rel="stylesheet"
		/>
		<link rel="icon" type="image/icon" href="../images/small_logo.png" />
		<title>About Us</title>
		<style>
		.main-container{
			position: relative;
			width: 100%;
			overflow: hidden;
		}
		.img-container{
			position:relative;
			width: 100%;
		}
		.bottomleft {
			position: absolute;
			bottom: 10px;
			left: 20px;
			padding: 15px;
			font-size: 5em;
		}
		.content-container{
			display:flex;
			align-items: center;
			justify-content: space-between;
		}
		.image{
			width: 50%;
		}
		.text{
			padding-left: 20px;
			padding-right: 20px;
			text-align: justify;
			width: 50%;
		}
		.text p{
			font-size: 1.2em;
		}
		.wrapper{
			text-align: center;
			font-size: 26px;
			font-weight: 800;
			line-height: 36px;
		}
		.button {
			display: inline-block;
			border-radius: 4px;
			background-color: #2500c9;
			border: none;
			color: #FFFFFF;
			text-align: center;
			font-size: 28px;
			padding: 20px;
			width: 300px;
			transition: all 0.5s;
			cursor: pointer;
			margin: 5px;
		}

		.button span {
			cursor: pointer;
			display: inline-block;
			position: relative;
			transition: 0.5s;
		}

		.button span:after {
			content: '\00bb';
			position: absolute;
			opacity: 0;
			top: 0;
			right: -20px;
			transition: 0.5s;
		}

		.button:hover span {
			padding-right: 25px;
		}

		.button:hover span:after {
			opacity: 1;
			right: 0;
		}
		</style>
	</head>

	<body>
		<?php 
        	include 'header.php';
      	?>

		<!-- Main Content-->
		<div class="main-container">		
			<div class="image-container">
				<img src="../images/a2.jpg" alt="Cinque Terre" width="100%" height="700px">
				<div class="bottomleft" style="color: lavender;">THINK DIFFERENT</div>
			</div>
		</div>
		<br><br><br><br><br>
		<div class="container">
			<div class="content-container">
				<div class="image">
					<img src="../images/ourstory.jpg" alt="ourstory.jpg" width="90%" height="90%">
				</div>
				<div class="text">
					<h2>Our Story</h2>
					<p>In 1976, Apple ignited the personal computer revolution with the Apple I and has since redefined the world of 
						technology. Today, we are a global leader in consumer electronics, software, and services, designing products 
						that empower individuals and enrich lives.</p>
				</div>
			</div>
			<br>
			<div class="content-container">
				<div class="text">
					<h2>Our Mission</h2>
					<p>At Apple, our mission is to design products that are intuitive, user-friendly, and truly magical. We believe in 
						pushing the boundaries of innovation, creating tools that inspire creativity, and building an ecosystem that 
						enhances the way people work, play, and connect.</p>
				</div>
				<div class="image">
					<img src="../images/ourmission.jpg" alt="ourmission.jpg" width="90%" height="90%">
				</div>
			</div>
			<br>
			<div class="content-container">
				<div class="image">
					<img src="../images/ourteam.jpg" alt="ourteam.jpg" width="90%" height="90%">
				</div>
				<div class="text">
					<h2>Our Team</h2>
					<p>Behind every Apple product is a diverse and talented team of individuals united by a shared passion for 
						innovation and excellence. From engineers and designers to marketers and retail specialists, our team's 
						collective expertise drives our success and shapes the future of technology.</p>
				</div>
			</div>
			<br><br>
	
			<div class="wrapper">
				<h2>Want to Join Us?</h2>
				<h3>We’re growing our teams in New York, Tel Aviv, London, and Shanghai.
					Check out our job postings.</p>
				<p>Whether you're a customer, a partner, or someone looking to join our team, we invite you to be a part of our 
					journey. Together, we can continue to create products that inspire, innovate, and make a difference in the 
					world.</p>
				<a href="contactUs.php" >
					<button class="button" style="vertical-align:middle"><span>Join Us Now</span></button>
				</a>
			</div>
			<br><br>
			
		</div>		
	</body>
</html>
