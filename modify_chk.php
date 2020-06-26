<?php
	
	include 'classes/loginform.class.php';
	session_start();
	if(!$_SESSION['p_no']){
		echo '<script type="text/javascript">alert("ONLY ADMIN CAN ACCESS THIS");</script>';
		header("refresh:0.005; url=index.php");
		exit;
	}
	else{
		
	
	if(isset($_GET['sub'])){
		$p_no=$_GET['p_no'];
			
		$user= new login();
		if($user->chk_user_login($p_no))
		{	
			header("location:modify.php?id=$p_no");
		}
		else{
			echo '<script type="text/javascript">alert("NO SUCH EMPLOYEE EXISTS..");</script>';
		}

	}
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Page</title>
<meta name="generator" content="WYSIWYG Web Builder 11 - http://www.wysiwygwebbuilder.com">
<link href="style/login1.css" rel="stylesheet">
<link href="style/login.css" rel="stylesheet">
<script type="text/javascript" >
	function display(){
		alert(<?php echo $msg; ?>);
	}
</script>
</head>
<body>
<?php include'header.php' ?>
<?php include'sidebar.php' ?>
<div id="wb_Form1" style="position:absolute;left:241px;top:163px;width:608px;height:278px;z-index:6;">
<form method="GET" action="">
<label for="p_no" id="Label1" style="position:absolute;left:109px;top:57px;width:150px;height:32px;line-height:32px;z-index:2;">PERSONAL NO:</label>
<input type="text" name="p_no" style="position:absolute;left:337px;top:57px;width:202px;height:30px;line-height:30px;z-index:4;"  value="">

<input type="submit" name="sub"  value="Submit" style="position:absolute;left:209px;top:197px;width:190px;height:42px;z-index:1;">



</form>
</div>
<?php include'footer.php' ?>
</body>
</html>