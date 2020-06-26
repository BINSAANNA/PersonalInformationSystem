<?php
	include 'classes/bio.class.php';

	$all_details= new bio();

	$all_datas=$all_details->get_all_details();
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>PIS_ALL</title>
<meta name="generator" content="WYSIWYG Web Builder 11 - http://www.wysiwygwebbuilder.com">
<link href="style/table1.css" rel="stylesheet">
<link href="style/table.css" rel="stylesheet">
<link href="style/index.css" rel="stylesheet">

</head>
<body>
<?php include'header.php' ?>
<?php include'sidebar.php' ?>
<div id="wb_Heading1" style="position:absolute;left:292px;top:122px;width:511px;height:99px;text-align:center;z-index:2;">
<img src="images/146.png" height="100" align="left">
<h3 id="Heading1">PERSONAL INFORMATION SYSTEM</h3><br><br>
</div>

<table style="position:absolute;left:93px;top:240px;width:909px;z-index:1;" id="Table1">
<tr style="
    background-color: #fdffcd;
">
<td class="cell0"><span style="font-weight:bold;">PER_NO</span></td>
<td class="cell0"><span style="font-weight:bold;">NAME</span></td>
<td class="cell0"><span style="font-weight:bold;">GRADE</span></td>
<td class="cell0"><span style="font-weight:bold;">DT_GRADE</span></td>
<td class="cell0"><span style="font-weight:bold;">TRADE</span></td>
<td class="cell0"><span style="font-weight:bold;">DT_BIRTH</span></td>
<td class="cell0"><span style="font-weight:bold;">ADDRESS</span></td>
<td class="cell0"><span style="font-weight:bold;">STATION</span></td>

</tr>


<?php
	foreach ($all_datas as $data) {
		

?>
<tr style="
    background-color: azure;
">
<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"><a href="bio.php?id=<?php echo $data['per_no']; ?>"><?php echo $data['per_no']; ?></a> </span></td>
<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> <?php echo $data['name']; ?></span></td>
<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"><?php echo $data['grade']; ?> </span></td>
<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"><?php echo $data['dt_grade']; ?> </span></td>
<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"><?php echo $data['trade']; ?> </span></td>
<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"><?php echo $data['dt_birth']; ?> </span></td>
<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"><?php echo $data['address']; ?> </span></td>
<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"><?php echo $data['station']; ?> </span></td>

</tr>
	<?php
	}

	?>
</table>
<?php include 'footer.php'?>
</body>
</html>