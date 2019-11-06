<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
	<title>Page Not Found</title>
	<?php wp_head()?>
	
	
	<style>
		.clear {
			clear:both;
		}
	
		html {
			background: #02034a; /* DARK color */
			color: #fff; /* BODY text color */
			font-family: 'OpenSans', sans-serif;
			font-size: 36px;
			line-height: 1em;
			padding:0;
			margin:0;
		}
		
		body {
			background:none;
			padding:0;
			margin:0;
		}
		
		a {
			color: #fff; /* BODY LINK text color */
		}
		
		h1 {
			font-family: 'OpenSans', sans-serif;
			font-size: 40px;
			font-weight: bold;
			color: #fff;
			margin: 0 0 40px 0;
			text-transform: uppercase;
		}	

		h1, h2, h3, h4, h5, p {
			margin: 0 0 40px 0;
			line-height:1em;
			color: #fff;
		}
		
		#container {
			margin: 0 auto;
			max-width: 600px;
			display:block;
			padding:60px 15px 0 15px;
		}
		
		#error_txt {
			width:100%;
			margin: 0;
			font-size: 18px;
		}
		
		#footerwrap {
			border-top: 20px solid #3271cd;  /* LIGHT color */
			border-bottom: 20px solid #3271cd;  /* LIGHT color */
			text-align:center;
			width:100%;
			background: #fff; /* LINKS background color */
		}
		
		footer {
			max-width:600px;
			width: 100%;
			margin: 0 auto;
			color: #000;
			font-size: 14px;
			line-height:1em;
		}
		
		footer a {
			color: #3271cd;
			text-decoration: underline;
			font-weight: bold;
		}
		
		#menu-main li ul  { display: none; }
		
		footer ul {
			display:block;
			/*border-top: 1px solid #005893; /* DARK color */*/
			text-align: left;
			padding:0;
			margin: 20px 15px;
		}
		
		footer ul li {
			display:block;
			height:auto;
			/*border-bottom: 1px solid #005893; /* DARK color */*/
			list-style: none;
			font-size: 29px;
			line-height:1em;
		}
		
		footer ul li a {
			display: block;
			padding: 10px 5px;
			height:auto;
			text-decoration: none;
		}
		
		footer ul li a:hover {
			text-decoration: none;
			color: #02034a;
		}
		
		.copy {
			text-align: center;
			margin: 40px auto;
		}

		.copy a:hover {
			text-decoration: none;
			/*color: #4e8f6c;*/
		}
		
	</style>
</head>
<body>
	<div id="container">
		<div id="error_txt">
			<h1>Page Not Found</h1>
			<p>We apologize for the inconvenience, but it seems that you’ve stumbled upon a page that doesn’t exist here.</p>
		</div>
	</div>
	<div id="footerwrap">
		<footer>
			<?php wp_nav_menu(array('menu' => 'Main', 'depth' => 1));?>
			<div class="clear"></div>
		</footer>
	</div>
	<p class="copy">Copyright &copy; <?=date("Y")?> <?php bloginfo('name');?><br/>
		Website Developed by <a href="https://www.asburymediagroup.com/" target="_blank">Asbury Media Group</a></p>
</body>
</html>

