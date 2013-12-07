<?php 
  if(!isset($_SESSION['username']))
  	return
?>

<div>
	<div id="Tag"><textarea id="TextArea" disabled="true"></textarea></div>
	<button id="TagEditButton" type="button" onclick="TagEdit()" >Edit Tag</button>
	<div id="TagEditingButton"></div>

</div>

