<?php 
  if(!isset($_SESSION['username']))
  	return;
  $userID=$_SESSION['userID'];
  $speciesID=$_GET['Id'];

  $sql="select tag from tags,visited where tags.vid = visited.vid AND visited.userID ='$userID'AND visited.speciesID ='$speciesID'";
  $sqlCount="select tag from tags group by tag order by COUNT(tag) DESC limit 10"; 

  $result=mysqli_query($con,$sql);
  $resultCount=mysqli_query($con,$sqlCount);

  $Color[]="#f0000f";
  $Color[]="#ff00ff";
  $Color[]="#00ff00";
  $Color[]="#0000ff";
  $Color[]="#0f6000";     
?>

<div id="Tag">
  <div id="DefaultTagCollection">
    <?php

    if(mysqli_num_rows($resultCount)<3){
    echo  '<label  draggable="true" ondragstart="Drag(event)" style="background:#0300f0">Learned</label>';
    echo '<label  draggable="true" ondragstart="Drag(event)" style="background:#01f000">Favorate</label>';      
    echo  '<label  draggable="true" ondragstart="Drag(event)" style="background:#f00400">Like</label>';    
    }
    else{
      $count=0;
      while($row=mysqli_fetch_array($resultCount)){
          $tagContent=$row['tag'];
          echo '<label draggable="true" ondragstart="Drag(event)" style="background:'.$Color[$count].'">'.$tagContent.'</label>';
          $count++;
          if($count==5)
            $count=0;      
      }
    }
    ?>
  </div>
	<div id="TagCollection" ondrop="DropIn(event,<?=$speciesID?>)" ondragover="AllowDrop(event)">
    <?php
        $count=0;
        while($row=mysqli_fetch_array($result)){
          $tagContent=$row['tag'];
          echo '<label ondrop="event.stopPropagation();" draggable="true" ondragstart="Drag(event)" style="background:'.$Color[$count].'">'.$tagContent.'</label>';
          $count++;
          if($count==5)
            $count=0;
        }
    ?>    
  </div>
  
   <div id="UserWorkSpace">
        <div id="Trash"  ondrop="DeleteTag(event,<?=$speciesID?>)" ondragover="AllowDrop(event)"></div>
        <div id="TagUser">
            <input id="TagUserInput" type="text">
            <button id="AddTagButton" type="button" onclick="AddTag(<?=$speciesID?>)" >Add</button>
        </div>
   </div>
  

</div>


