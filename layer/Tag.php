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

<div id="Tag">
  <div id="DefaultTag">
    <label id="DefaultTag1" draggable="true" ondragstart="drag(event)" style="background:#0000ff">Learned</label>
    <label id="DefaultTag2" draggable="true" ondragstart="drag(event)" style="background:#00ff00">Favoriate</label>
    <label id="DefaultTag3" draggable="true" ondragstart="drag(event)" style="background:#00ff00">Like</label>
    <label id="DefaultTag4" draggable="true" ondragstart="drag(event)" style="background:#00ff00">Read Later</label>
    <label id="DefaultTag5" draggable="true" ondragstart="drag(event)" style="background:#00ff00">Cute</label>
    <label id="DefaultTag6" draggable="true" ondragstart="drag(event)" style="background:#00ff00">Smart</label>
    <label id="DefaultTag7" draggable="true" ondragstart="drag(event)" style="background:#00ff00">Rare</label>
    <label id="DefaultTag8" draggable="true" ondragstart="drag(event)" style="background:#00ff00">Friendly</label>
    <label id="DefaultTag9" draggable="true" ondragstart="drag(event)" style="background:#00ff00">Tropical</label>
    <label id="DefaultTag10" draggable="true" ondragstart="drag(event)" style="background:#00ff00">Expensive</label>
    <label id="DefaultTag11" draggable="true" ondragstart="drag(event)" style="background:#00ff00">Zoo</label>
    <label id="DefaultTag12" draggable="true" ondragstart="drag(event)" style="background:#00ff00">Intersting</label>
  </div>
	<div id="TagCollection" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
</div>
<?php echo '<button id="TagEditButton" type="button" onclick="TagEdit('.$_GET['Id'].')" >Edit Tag</button>';?>  
<div id="TagEditingButton"></div>

