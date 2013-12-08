<?php 
  if(!isset($_SESSION['username']))
  	return;
  $userID=$_SESSION['userID'];
  $speciesID=$_GET['Id'];

  $sql="select tag from tags,visited where tags.vid = visited.vid AND visited.userID ='$userID'AND visited.speciesID ='$speciesID'";

  $result=mysqli_query($con,$sql);
 
  $row=mysqli_fetch_array($result);
  $TagContent=$row['tag'];
 

  $Color[]="f0000f";
  $Color[]="ff0000";
  $Color[]="00ff00";
  $Color[]="0000ff";

?>

<div>
  <div id="DefaultTag">
    <label draggable="true" ondragstart="drag(event)" style="background:#0000ff">Learned</label>
    <label draggable="true" ondragstart="drag(event)" style="background:#00ff00">Favoriate</label>
    <label draggable="true" ondragstart="drag(event)" style="background:#00ff00">Like</label>
    <label draggable="true" ondragstart="drag(event)" style="background:#00ff00">Read Later</label>
    <label draggable="true" ondragstart="drag(event)" style="background:#00ff00">Cute</label>
    <label draggable="true" ondragstart="drag(event)" style="background:#00ff00">Smart</label>
    <label draggable="true" ondragstart="drag(event)" style="background:#00ff00">Rare</label>
    <label draggable="true" ondragstart="drag(event)" style="background:#00ff00">Friendly</label>
    <label draggable="true" ondragstart="drag(event)" style="background:#00ff00">Tropical</label>
    <label draggable="true" ondragstart="drag(event)" style="background:#00ff00">Expensive</label>
    <label draggable="true" ondragstart="drag(event)" style="background:#00ff00">Zoo</label>
    <label draggable="true" ondragstart="drag(event)" style="background:#00ff00">Intersting</label>
  </div>
	<div id="Tag" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
	<?php echo '<button id="TagEditButton" type="button" onclick="TagEdit('.$_GET['Id'].')" >Edit Tag</button>';?>	
	<div id="TagEditingButton"></div>
</div>

