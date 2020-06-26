<?php
	include 'classes/add.class.php';
	include 'classes/bio.class.php';
	$p_no=$_GET['id'];
	$cnt=0;
	$i=0;


	$edit_user= new bio();
	$per_datas=$edit_user->get_per_details($p_no);
	
	$qual_datas=$edit_user->get_qual_details();
	$pay_datas=$edit_user->get_pay_details();

	if(isset($_POST['mod_sub'])){
			
		   $per_no=$_POST['pno'];
		   $new_user= new add_user($p_no);
		   $name=$_POST['name'];
		   $grade=$_POST['grade'];
		   $dt_grade=$_POST['dt_grade'];
		   $trade=$_POST['trade'];
		   $dt_birth=$_POST['dt_birth'];
		   $address=$_POST['address'];
		   $station=$_POST['station'];
		 
		   $bio_upd=$new_user->update_bio($per_no,$name,$grade,$dt_grade,$trade,$dt_birth,$address,$station);

		

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

		$sal_upd=$new_user->update_salary($per_no,$basic,$allowance,$tax,$gross);
		$sl= $new_user->get_sl();
		
		if($new_user->chk_id($per_no)){
			
			if (is_array($sl) || is_object($sl))
			{
  
				foreach($sl as $data){
				$qual="b".$i;
				$sub="c".$i;
				$qualification=$_POST[$qual];
				$subject=$_POST[$sub];
				$qual_upd=$new_user->update_qual($data['sl'],$per_no,$qualification,$subject);
				$i++;
			}
			}
		}
		else
			echo '<script type="text/javascript">alert("PERSONAL NO. ALREADY ASSIGNED TO ANOTHER EMPLOYEE");</script>';
			
		
		$user_upd=$new_user->update_user($per_no);
	
		if($bio_upd && $user_upd && $qual_upd && $sal_upd){
			echo '<script type="text/javascript">alert("UPDATED...");</script>';
		}
	}
		
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>PIS-MODIFY</title>
<meta name="generator" content="WYSIWYG Web Builder 11 - http://www.wysiwygwebbuilder.com">
<link href="style/add_user1.css" rel="stylesheet">
<link href="style/add_user.css" rel="stylesheet">

</head>
<body>	
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
<?php
	if (is_array($per_datas) || is_object($per_datas))
		{
	foreach ($per_datas as $data) {
		?>
<input type="text" id="Editbox1" style="position:absolute;left:170px;top:79px;width:146px;height:18px;line-height:18px;z-index:8;background: #d0cbcb;" name="pno" value="<?php echo $data['per_no']; ?>" disabled>
<input type="text" id="Editbox2" style="position:absolute;left:171px;top:126px;width:145px;height:18px;line-height:18px;z-index:9;" name="name" value="<?php echo $data['name']; ?>" >
<input type="text" id="Editbox3" style="position:absolute;left:171px;top:173px;width:145px;height:18px;line-height:18px;z-index:10;" name="grade" value="<?php echo $data['grade']; ?>" >
<input type="text" id="Editbox4" style="position:absolute;left:170px;top:215px;width:146px;height:18px;line-height:18px;z-index:11;" name="dt_grade" value="<?php echo $data['dt_grade']; ?>" >
<input type="text" id="Editbox5" style="position:absolute;left:172px;top:259px;width:144px;height:18px;line-height:18px;z-index:12;" name="trade" value="<?php echo $data['trade']; ?>" >
<input type="text" id="Editbox6" style="position:absolute;left:171px;top:305px;width:145px;height:18px;line-height:18px;z-index:13;" name="dt_birth" value="<?php echo $data['dt_birth']; ?>" >
<textarea name="address" id="TextArea1" style="position:absolute;left:172px;top:349px;width:144px;height:89px;z-index:14;" rows="4" cols="21"><?php echo $data['address']; ?> </textarea>
<input type="text" id="Editbox7" style="position:absolute;left:176px;top:478px;width:140px;height:18px;line-height:18px;z-index:15;" name="station" value="<?php echo $data['station']; ?>" >

<?php
	}
}
?>

<div id="wb_Heading1" style="position:absolute;left:19px;top:29px;width:344px;height:36px;z-index:16;">
<h1 id="Heading1">Personal Information</h1></div>
<div id="wb_Heading2" style="position:absolute;left:557px;top:29px;width:338px;height:37px;z-index:17;">
<h1 id="Heading2">Payroll<br><br></h1></div>
<div id="wb_Text9" style="position:absolute;left:557px;top:85px;width:62px;height:16px;z-index:18;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Basic(yearly)</span></div>
<div id="wb_Text10" style="position:absolute;left:553px;top:132px;width:71px;height:16px;z-index:19;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Allowance(yearly)	</span></div>
<?php
		if (is_array($pay_datas) || is_object($pay_datas))
		{
  
			foreach ($pay_datas as $data) {
	?>
<input type="text" id="Editbox8" style="position:absolute;left:681px;top:83px;width:119px;height:18px;line-height:18px;z-index:20;" name="basic" value="<?php echo $data['basic'];?> " >
<input type="text" id="Editbox9" style="position:absolute;left:681px;top:126px;width:119px;height:18px;line-height:18px;z-index:21;" name="allowance" value="<?php echo $data['allowance'];?> " >

<?php 
		}
	}
	?>

<!--<input type="text" name="hidden" id="hidden"  style="visibility: hidden;" value="0"  ><br>-->
	
<div id="wb_Heading3" style="position:absolute;left:557px;top:207px;width:228px;height:44px;z-index:22;">
<h1 id="Heading3">Qualification</h1></div>
<div id="wb_Text11" style="position:absolute;left:553px;top:265px;width:117px;height:16px;z-index:23;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Qualification</span></div>
<div id="wb_Text12" style="position:absolute;left:776px;top:265px;width:71px;height:16px;z-index:24;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Subject</span></div>

<input type="submit" id="Button2" name="mod_sub" value="UPDATE USER" style="position:absolute;left:451px;top:600px;width:96px;height:25px;z-index:28;" >
<table style="position:absolute;left: 534px;top: 293px;width: 169px;height: 18px;z-index:7;">

<?php
	if (is_array($qual_datas) || is_object($qual_datas))
		{
	foreach ($qual_datas as $data) {
?>	<tr>
	<td><input type="text" name="<?php echo "b".$cnt; ?>" value="<?php echo $data['qualification']; ?>"  ></td>
	<td><input type="text" name="<?php echo "c".$cnt; ?>" value="<?php echo $data['subject']; ?>" ></td>
	</tr>
	<?php
		$cnt++;
	}
	}
	?>
	</table>		
</form>

</div>
<?php include'footer.php' ?>
</body>
</html>