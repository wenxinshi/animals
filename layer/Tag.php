<?php 
  if(!isset($_SESSION['username']))
  	return;
  $userID=$_SESSION['userID'];
  $speciesID=$_GET['Id'];

  $sql="select tag from tags where VID in (select VID from visited where userID = ".$userID." and speciesID = ". $speciesID.")";

  $result=mysqli_query($con,$sql);
 
  $row=mysqli_fetch_array($result);
  $TagContent=$row['tag'];


?>

<div>
	<div id="Tag"><textarea id="TextArea" readonly="true"><?php echo $TagContent;?></textarea></div>
	<?php echo '<button id="TagEditButton" type="button" onclick="TagEdit('.$_GET['Id'].')" >Edit Tag</button>';?>
	
	<div id="TagEditingButton"></div>

</div>

