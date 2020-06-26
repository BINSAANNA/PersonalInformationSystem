<?php
	
	include 'classes/loginform.class.php';

	if(isset($_GET['sub'])){
		$p_no=$_GET['p_no'];
		$c_no=$_GET['c_no'];
	
		$user= new login();
		if($user->chk_admin_login($p_no,$c_no))
		{	if(!isset($_SESSION)){
			session_start();
			$_SESSION['p_no']=$p_no;
			echo '<script type="text/javascript">alert("WELCOME");</script>';
		header("refresh:0.005; url=view_all.php");
			}
			
		}
		else
			echo '<script type="text/javascript">alert("NO SUCH ADMIN EXISTS..");</script>';

	}


?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ADMIN LOGIN</title>
<meta name="generator" content="WYSIWYG Web Builder 11 - http://www.wysiwygwebbuilder.com">
<link href="style/login1.css" rel="stylesheet">
<link href="style/login.css" rel="stylesheet">
</head>
<body>
<?php include'header.php' ?>
<?php include'sidebar.php' ?>
<div id="wb_Form1" style="position:relative;left:400px;top:163px;width:608px;height:278px;z-index:6;background: aliceblue;">
<h3>ADMIN LOGIN</h3>
<form method="GET" action="">
<label for="p_no" id="Label1" style="position:absolute;left:109px;top:57px;width:150px;height:32px;line-height:32px;z-index:2;">PERSONAL NO:</label>
<input type="text" name="p_no" style="position:absolute;left:337px;top:57px;width:202px;height:30px;line-height:30px;z-index:4;border-radius: 100px;"  value="">



<label for="c_no" id="Label2" style="position:absolute;left:109px;top:125px;width:150px;height:32px;line-height:32px;z-index:3;">CARD NO:</label>
<input type="password" name="c_no" style="position:absolute;left:337px;top:125px;width:202px;height:30px;line-height:30px;z-index:0;border-radius: 100px;"  value="">

<input type="submit" name="sub"  value="Submit" style="position:absolute;left:209px;top:197px;width:190px;height:42px;z-index:1;border-radius: 250px;">



</form>
</div>
<?php include 'footer.php'?>
</body>
</html>