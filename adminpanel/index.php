<?php
session_start();
error_reporting(1);
require_once('connect.php');
if($_SESSION['id']==''){
	header("location:login.php");
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin</title>
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="style.css" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js" ></script>
<script src="js/navAccordion.min.js" ></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
</head>
<style>
.container{
width:100% !important;
margin:auto;
}
/* Left Navigation
		-----------------------------------------------*/
		.mainNav {
			background: rgba(14,137,196,1.00);
			width: 100%;
		}
			/* First Level */
			.mainNav ul {
				margin: 0;
				padding: 0;
				list-style: none;
				border-bottom: 1px solid #444
			}
			.mainNav ul li {
				border-top: 1px solid #444;
			}
			.mainNav ul li a {
				color: #FFFFFF;
				display: block;
				font-size: 1.1em;
				line-height: normal;
				padding:12px 20px;
				text-decoration:none;
				font-family:arial;
				font-size:14px;
				font-weight:bold;
			}
			.mainNav ul li a:hover {
				background: #333;
				text-decoration: none;
			}
				/* Second Level */
				.mainNav ul ul {
					border-bottom: none
				}
				.mainNav ul ul li {
					border-top: 1px solid #222;
					background:#12a3df;
				}
				.mainNav ul ul li a {
					color: #FFFFFF;
					display: block;
					font-size: 1em;
					font-size:13px;
					font-family:Arial;
					line-height: normal;
					padding: 0.5em 1em 0.5em 2.5em;
				}
				.mainNav ul ul li a:hover {
					background: #333;
				}
						/* Third Level */
				.mainNav ul ul ul {
					border-top:1px solid #222;
				}
				.mainNav ul ul ul li {
					border:none;
				}
				.mainNav ul ul ul li a {
					padding-left:3.5em; 
					padding-top:0.25em; 
					padding-bottom:0.25em;
				}
			/* Accordion Button */
			ul li.has-subnav .accordion-btn {
				color:#fff; 
				background:rgba(255,255,255, 0.15); font-size:16px;
			}
		
		@media screen and (max-width: 1024px) {
			.mainNav {width: 40%;}
		}
		@media screen and (max-width: 700px) {
			.mainNav {width: 100%;}
		}
		@media print{
	.col-lg-3{
		display:none !important;
	}
	.column{
		display:none !important;
	}
	.pagination{
		display:none !important;
	}
}

</style>
<body>
<div class="container">
    <div class="row">
  <div class="col-lg-3">
  			<!-- Navigation -->
	<nav class="mainNav">
		<ul>
			<li class="selected"><a href="#">Manage Date of Admission</a>
			<ul>
                <li><a href="index.php?option=student_regd_form">Issued/Sold Registration Form</a></li>
                <li><a href="index.php?option=student_manage_submitted">Submit/Receive Registration Form</a></li>
                <li><a href="index.php?option=student_written_test">Students Written test</a></li>
				<li><a href="index.php?option=student_manage_interview">Interview</a></li>
                <li><a href="index.php?option=student_manage_marks">Marks</a></li>
				<li><a href="index.php?option=student_manage_letter">Admission letters</a></li>
			</ul>
			</li>
			<li><a>Admission Master Reports</a>
			<ul>
			<li><a href="#">Issue/Sale</a>
            <ul>
			<li><a href="index.php?option=report1_regd_form">Issued/Sold Registration Form</a></li>
			<li><a href="index.php?option=report1_class_issued_detail">Date wise forms in Detail</a></li>
            <li><a href="index.php?option=report1_class_surname_issued_detail">Class and Surname Wise </a></li>
			<li><a href="index.php?option=report1_class_formno_issued_detail">Class and Form No. Wise </a></li>
			<li><a href="index.php?option=report1_class_wise_summ">Date and Class Wise Summary Report</a></li>
            <li><a href="index.php?option=report1_locality_wise_summ">Locality Wise Summary Report</a></li>
			<li><a href="index.php?option=report1_mothertongue_wise_summ">Language Wise Summary Report</a></li>
			</ul>
            </li>
			<li><a href="#">Receive/Submit</a>
            <ul>
			<li><a href="index.php?option=report2_submitted_form">Submitted Date and Class Wise Registration Form</a></li>
			<li><a href="index.php?option=report2_class_submitted_detail">Date wise forms in Detail</a></li>
            <li><a href="index.php?option=report2_class_surname_issued_detail">Class and Surname Wise </a></li>
			<li><a href="index.php?option=report2_class_formno_issued_detail">Class and Form No. Wise </a></li>
			<li><a href="index.php?option=report2_class_wise_summ">Class Wise Summary Report</a></li>
            <li><a href="index.php?option=report2_class_wise_date_wise">Date and Class Wise Summary Report</a></li>
            <li><a href="index.php?option=report2_locality_wise_summ">Locality Wise Summary Report</a></li>
			<li><a href="index.php?option=report2_mothertongue_wise_summ">Language Wise Summary Report</a></li>
			</ul>
            </li>
				<li><a href="#">Written Test</a></li>
				<li><a href="#">Interview</a></li>
				<li><a href="#">Sub Link 5</a></li>
				</ul>
			</li>
			<li><a href="#">Link 3</a></li>
			<li><a href="#">A really really long long link title goes here</a>
				<ul>
					<li><a href="logout.php">Logout</a></li>
					<li><a href="#">Sub Link 2</a></li>
					<li><a href="#">Sub Link 3</a></li>
					<li><a href="#">Sub Link 4</a></li>
					<li><a href="#">Sub Link 5</a></li>
				</ul>
			</li>
		</ul>
	</nav>
  
        </div>
        <!--for page display-->
        <div class="col-sm-9 col-md-9">
        <?php
		if(isset($_GET['option'])){
			$option=$_GET['option'];
			include($option.'.php');
		}
		?>

        </div>
    </div>
</div>
<script>
		jQuery(document).ready(function(){
		
			//Accordion Nav
			jQuery('.mainNav').navAccordion({
				expandButtonText: '<i class="fa fa-plus"></i>',  //Text inside of buttons can be HTML
				collapseButtonText: '<i class="fa fa-minus"></i>'
			}, 
			function(){
				console.log('Callback')
			});
			
		});
	</script>
</body>
</html>