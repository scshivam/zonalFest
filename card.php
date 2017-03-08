<!DOCCTYPE html>
<html>
<body>
	
	<?php include "dbConnect.php";
		$qry="Select Event,Name,College from card LIMIT 20 offset 128";
		$res=mysqli_query($connect,$qry);
		$x=0;
		$i=10;
		while($row=mysqli_fetch_assoc($res))
		{
	extract($row);
		?>
	<img src="images/1.jpg" style="size:A4;"></img>
	<?php echo "<label style='position:absolute;left:125px;top:".($x+$i+272)."px;'><b>".$Name."</b></label>"; ?>
	<?php echo "<label style='position:absolute;left:125px;top:".($x+$i+310)."px;'><b>".$College."</b></label>"; ?>
	<?php echo "<label style='position:absolute;left:125px;top:".($x+$i+372)."px;'><b>".$Event."</b></label>"; ?>
		<?php if($row=mysqli_fetch_assoc($res))
		{
	extract($row);?>
	<?php echo "<label style='position:absolute;left:449px;top:".($x+$i+272)."px;'><b>".$Name."</b></label>"; ?>
	<?php echo "<label style='position:absolute;left:449px;top:".($x+$i+310)."px;'><b>".$College."</b></label>"; ?>
	<?php echo "<label style='position:absolute;left:449px;top:".($x+$i+372)."px;'><b>".$Event."</b></label>"; } ?>
			<?php if($row=mysqli_fetch_assoc($res))
		{
	extract($row);
	echo "<label style='position:absolute;left:125px;top:".($x+$i+730)."px;'><b>".$Name."</b></label>"; ?>
	<?php echo "<label style='position:absolute;left:125px;top:".($x+$i+765)."px;'><b>".$College."</b></label>"; ?>
	<?php echo "<label style='position:absolute;left:125px;top:".($x+$i+830)."px;'><b>".$Event."</b></label>";
			} ?>
			<?php if($row=mysqli_fetch_assoc($res))
		{
	extract($row);
			echo "<label style='position:absolute;left:449px;top:".($x+$i+730)."px;'><b>".$Name."</b></label>"; ?>
	<?php echo "<label style='position:absolute;left:449px;top:".($x+$i+765)."px;'><b>".$College."</b></label>"; ?>
	<?php echo "<label style='position:absolute;left:449px;top:".($x+$i+830)."px;'><b>".$Event."</b></label>"; } ?>
			
		<?php $x=$x+970;
			 } ?>
</body>
</html>