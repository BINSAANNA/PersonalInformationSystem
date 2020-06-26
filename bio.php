<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>PIS-BIODATA</title>
<meta name="generator" content="WYSIWYG Web Builder 11 - http://www.wysiwygwebbuilder.com">
<link href="style/bio1.css" rel="stylesheet">
<link href="style/bio.css" rel="stylesheet">
</head>
<body>

<?php include'header.php' ?>
<?php include'sidebar.php' ?>
<div id="wb_Image1" style="position:absolute;left:556px;top:167px;width:193px;height:193px;z-index:1;">
<img src="a78ac8d14c253ed58822a30295440056528bc84e.jpeg" id="Image1" alt=""></div>
<div id="wb_Heading1" style="position:absolute;left:271px;top:122px;width:762px;height:45px;text-align:center;z-index:2;">
<h1 id="Heading1">Personal Infornation<br></h1></div>
<div id="wb_Image1" style="position:absolute;left:556px;top:167px;width:193px;height:193px;z-index:1;">
<img src="abc.jpeg" id="Image1" alt=""></div>
<?php
	
	include 'classes/bio.class.php';
	/*include 'classes/qualification.class.php';
	include 'classes/experience.class.php';
	include 'classes/payroll.class.php';*/
	$p_no=$_GET['id']; 
	$sl=1;
	$new_person= new bio();
	
	$per_datas=$new_person->get_per_details($p_no);
	$qual_datas=$new_person->get_qual_details();
	$pay_datas=$new_person->get_pay_details();
	
	?>
	<table style="position:absolute;left:246px;top:381px;width:812px;height:100px;z-index:3;" id="Table1">
	<tr style="font: bold;font-weight: bolder;background: orange;">
	<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:8px;">Personal NO.	</span></td>
	<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:8px;">Name</span></td>
	<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:8px;">Grade</span></td>
	<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:8px;">Dt_Grade</span></td>
	<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:8px;">Trade</span></td>
	<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:8px;">Dt_Birth</span></td>
	<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:8px;">Address</span></td>
	<td class="cell1"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:8px;">Station</span></td>
	</tr>
	<tr style="background: #c2f953;">
	<?php

	foreach ($per_datas as $data) {
		?>
		<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:8px;"><?php echo $data['per_no']; ?></span></td>
		<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:8px;"><?php echo $data['name']; ?></span></td>
		<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:8px;"><?php echo $data['grade']; ?></span></td>
		<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:8px;"><?php echo $data['dt_grade']; ?></span></td>
		<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:8px;"><?php echo $data['trade']; ?></span></td>
		<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:8px;"><?php echo $data['dt_birth']; ?></span></td>
		<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:8px;"><?php echo $data['address']; ?></span></td>
		<td class="cell1"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:8px;"><?php echo $data['station']; ?></span></td>
		
	<?php
	}

	?>
</tr>
</table>

<div id="wb_Heading2" style="position:absolute;left:514px;top:550px;width:276px;height:45px;text-align:center;z-index:4;">
<h1 id="Heading2">Salary</h1></div>
<table style="position:absolute;left:266px;top:600px;width:792px;height:89px;z-index:5;" id="Table2">

<tr style="font: bold;font-weight: bolder;background: orange;">
<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;">Basic </span></td>
<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;">Allowance</span></td>
<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;">Tax</span></td>
<td class="cell1"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> Gross</span></td>
</tr>
<tr style="background: #c2f953;">
	<?php
		if (is_array($pay_datas) || is_object($pay_datas))
		{
  
			foreach ($pay_datas as $data) {
	?>
			<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"><?php echo $data['basic'];?> </span></td>
			<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"><?php echo $data['allowance'];?></span></td>
			<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"><?php echo $data['tax'];?></span></td>
			<td class="cell1"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> <?php echo $data['gross'];?></span></td>
	<?php 
		}
	}
	?>


</tr>
</table>


<div id="wb_Heading3" style="position:absolute;left:528px;top:741px;width:248px;height:47px;text-align:center;z-index:6;">
<h3 id="Heading3">Qualification<br></h3></div>
<table style="position:absolute;left:255px;top:811px;width:794px;height:92px;z-index:7;" id="Table3">
<tr style="font: bold;font-weight: bolder;background: orange;">
<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;">SL. NO. </span></td>
<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;">Qualification </span></td>
<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;">Subject </span></td>
</tr>

	<?php

		foreach ($qual_datas as $data) {
	?>		
			<tr style="background: #c2f953;">
			<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"><?php echo $sl++; ?> </span></td>
			<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"><?php echo $data['qualification']; ?>  </span></td>
			<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"><?php echo $data['subject'] ?>  </span></td>
			</tr>
			
			
	<?php
		}
		$sl=1;
	?>

</table>

<br>
<br>
</div>

<?php include'footer.php' ?>
</body>
</html>
