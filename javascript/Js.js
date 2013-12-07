function SignUp(){
window.open("SignUp.html");
}


function TagEdit(){
    document.getElementById("TextArea").disabled=false;
    document.getElementById("TagEditButton").style.display='none';
    document.getElementById("TagEditingButton").innerHTML='<button id="TagCancelButton" type="button">Cancel</button><button id="TagSaveButton" type="button">Save</button>';
}

function showHint(str)
{
var xmlhttp;
if (str.length==0)
  { 
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","gethint.asp?q="+str,true);
xmlhttp.send();
}

