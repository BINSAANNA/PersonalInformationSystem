<?php
	session_start();
	include 'classes/add.class.php';
	if(!$_SESSION['p_no']){
		echo '<script type="text/javascript">alert("ONLY ADMIN CAN ACCESS THIS");</script>';
		header("refresh:0.005; url=index.php");
		exit;
	}
	else{

	if(isset($_POST['sub'])){
		
		   $per_no=$_POST['pno'];
		   $name=$_POST['name'];
		   $grade=$_POST['grade'];
		   $dt_grade=$_POST['dt_grade'];
		   $trade=$_POST['trade'];
		   $dt_birth=$_POST['dt_birth'];
		   $address=$_POST['address'];
		   $station=$_POST['station'];

		$new_user= new add_user($per_no);
		if($new_user->chk_id($per_no))
			$new_user->insert_bio($per_no,$name,$grade,$dt_grade,$trade,$dt_birth,$address,$station);
		else
			echo "PERSONAL NO. ALREADY ASSIGNED TO ANOTHER EMPLOYEE";
		

		$basic=$_POST['basic'];
		$allowance=$_POST['allowance'];
		$tax;
		$net=$basic+$allowance;
		if($net<250000)
			$tax=0;
		else if($net>250001 && $net < 500000)
			$tax=0.05*$net;
		else if($net>500001 && $net < 1000000)
			$tax=12500+(0.2*($net-500000));
		else
			$tax= 112500+(0.3*($net-1000000));
		$gross=$net-$tax;
		if($new_user->chk_id($per_no))
			$new_user->salary($per_no,$basic,$allowance,$tax,$gross);

		$cnt= $_POST['hidden'];
		
		$i=0;
		for($i;$i<=$cnt;$i++){
			$qual="b".$i;
			$sub="c".$i;
			$qualification=$_POST[$qual];
			$subject=$_POST[$sub];
			if($new_user->chk_id($per_no))
				$new_user->qualification_user($per_no,$qualification,$subject);
	 	
		 }
		$c_no=rand(11111111,99999999);
		$new_user->insert_user($per_no,$c_no);
		echo '<script type="text/javascript">alert("RECORD ADDED SUCCESSFULLY");</script>';
	}
}
		
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>PIS-ADD USER</title>
<meta name="generator" content="WYSIWYG Web Builder 11 - http://www.wysiwygwebbuilder.com">
<link href="style/add_user1.css" rel="stylesheet">
<link href="style/add_user.css" rel="stylesheet">
<script type="text/javascript">
	var i=1;
	function display(){

		var a= document.getElementById("qual_div");
		var b= document.createElement("input");
		b.type="text";
		b.setAttribute("name", "b"+(i));
		
		a.appendChild(b);
		var c= document.createElement("input");
		c.type="text";
		c.setAttribute("name", "c"+(i));
		a.appendChild(c);
		var br= document.createElement('br');
		a.appendChild(br);
		i++;
		document.getElementById("hidden").value=i-1 ;
	}

</script>
</head>
<body style="    background-color: #f9ffd7;	">	
<?php include'header.php' ?>
<?php include'sidebar.php' ?>
<div id="wb_Form1" style="position:absolute;left:173px;top:145px;width:998px;height:614px;z-index:30;">
<form name="Form1" method="POST" action="" >
<div id="wb_Text1" style="position:absolute;left:19px;top:85px;width:80px;height:16px;z-index:0;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Personal No.</span></div>
<div id="wb_Text2" style="position:absolute;left:19px;top:132px;width:80px;height:16px;z-index:1;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Name</span></div>
<div id="wb_Text3" style="position:absolute;left:20px;top:179px;width:87px;height:16px;z-index:2;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Grade</span></div>
<div id="wb_Text4" style="position:absolute;left:16px;top:221px;width:87px;height:16px;z-index:3;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Date_Grade(yyyy-mm-dd)</span></div>
<div id="wb_Text5" style="position:absolute;left:16px;top:265px;width:87px;height:16px;z-index:4;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Trade</span></div>
<div id="wb_Text6" style="position:absolute;left:16px;top:311px;width:87px;height:16px;z-index:5;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">D.O.B(yyyy-mm-dd)</span></div>
<div id="wb_Text7" style="position:absolute;left:19px;top:362px;width:80px;height:16px;z-index:6;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Address</span></div>
<div id="wb_Text8" style="position:absolute;left:20px;top:484px;width:79px;height:16px;z-index:7;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Station</span></div>
<input type="text" id="Editbox1" style="position:absolute;left:170px;top:79px;width:146px;height:18px;line-height:18px;z-index:8;" name="pno" value="" required>
<input type="text" id="Editbox2" style="position:absolute;left:171px;top:126px;width:145px;height:18px;line-height:18px;z-index:9;" name="name" value="" required>
<input type="text" id="Editbox3" style="position:absolute;left:171px;top:173px;width:145px;height:18px;line-height:18px;z-index:10;" name="grade" value="" required>
<input type="text" id="Editbox4" style="position:absolute;left:170px;top:215px;width:146px;height:18px;line-height:18px;z-index:11;" name="dt_grade" value="" required>
<input type="text" id="Editbox5" style="position:absolute;left:172px;top:259px;width:144px;height:18px;line-height:18px;z-index:12;" name="trade" value="" required>
<input type="text" id="Editbox6" style="position:absolute;left:171px;top:305px;width:145px;height:18px;line-height:18px;z-index:13;" name="dt_birth" value="" required>
<textarea name="address" id="TextArea1" style="position:absolute;left:172px;top:349px;width:144px;height:89px;z-index:14;" rows="4" cols="21" required></textarea>
<input type="text" id="Editbox7" style="position:absolute;left:176px;top:478px;width:140px;height:18px;line-height:18px;z-index:15;" name="station" value="" required>
<div id="wb_Heading1" style="position:absolute;left:19px;top:29px;width:344px;height:36px;z-index:16;">
<h1 id="Heading1">Personal Information</h1></div>
<div id="wb_Heading2" style="position:absolute;left:557px;top:29px;width:338px;height:37px;z-index:17;">
<h1 id="Heading2">Payroll<br><br></h1></div>
<div id="wb_Text9" style="position:absolute;left:557px;top:85px;width:62px;height:16px;z-index:18;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Basic(yearly)</span></div>
<div style="position:absolute;right:1px;top: 90px;width: 65px;"><img src="images/rupee.png" ></div >
<div id="wb_Text10" style="position:absolute;left:553px;top:132px;width:71px;height:16px;z-index:19;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Allowance(yearly)	</span></div>
<input type="text" id="Editbox8" style="position:absolute;left:681px;top:83px;width:119px;height:18px;line-height:18px;z-index:20;" name="basic" value="" required>
<input type="text" id="Editbox9" style="position:absolute;left:681px;top:126px;width:119px;height:18px;line-height:18px;z-index:21;" name="allowance" value="" required>

<input type="text" name="hidden" id="hidden"  style="visibility: hidden;" value="0"  ><br>

<div id="wb_Heading3" style="position:absolute;left:557px;top:207px;width:228px;height:44px;z-index:22;">
<h1 id="Heading3">Qualification</h1></div>
<div id="wb_Text11" style="position:absolute;left:553px;top:265px;width:117px;height:16px;z-index:23;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Qualification</span></div>
<div id="wb_Text12" style="position:absolute;left:776px;top:265px;width:71px;height:16px;z-index:24;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Subject</span></div>

<input type="submit" id="Button2" name="sub" value="ADD USER" style="position:absolute;left:451px;top:600px;width:150px;height:50px;z-index:28;" required>
	
	<input type="text" name="b0" style="position:absolute;left:534px;top:293px;width:169px;height:18px;line-height:18px;z-index:25;" required>
	<input type="text" name="c0" style="position:absolute;left:707px;top:293px;width:169px;height:18px;line-height:18px;z-index:26;" required>
	<div id="qual_div" style="position:absolute;left:534px;top: 330px;width: 350px;height: 22px;line-height: 22px;/* z-index:25; */">	
	</div>		
</form>


<input type="submit" id="Button1" name="" value="ADD MORE" style="position:absolute;left:896px;top:295px;width:96px;height:25px;z-index:27;" onclick="display();">
</div>
<?php include'footer.php' ?>
</body>
</html>