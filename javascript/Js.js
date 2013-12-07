function SignUp(){
window.open("SignUp.html");
}


function TagEdit(Id){
    document.getElementById("TextArea").readOnly=false;
    document.getElementById("TagEditButton").style.display='none';
    document.getElementById("TagEditingButton").innerHTML='<button id="TagCancelButton" type="button" onclick="TagCancel('+Id+')">Cancel</button><button id="TagSaveButton" type="button" onclick="TagSave('+Id+')">Save</button>';
}

function TagSave(Id)
{
var xmlhttp;
var str=document.getElementById("TextArea").innerHTML;
if (str.length==0)
  { 
  document.getElementById("TextArea").innerHTML="";
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
    document.getElementById("TextArea").innerHTML=xmlhttp.responseText;
    document.getElementById("TagCancelButton").style.display='none';
    document.getElementById("TagSaveButton").style.display='none';
    document.getElementById("TextArea").readOnly=true;
    document.getElementById("TagEditButton").style.display='inLine';
    }
  }
xmlhttp.open("GET","query/TagSave.php?Id="+Id+"&&tag="+str,true);
xmlhttp.send();
}

function TagCancel(Id)
{
var xmlhttp=new XMLHttpRequest();
  
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("TextArea").innerHTML=xmlhttp.responseText;
    // document.getElementById("TextArea").innerHTML=xmlhttp.responseText;
    // document.getElementById("TagCancelButton").style.display='none';
    // document.getElementById("TagSaveButton").style.display='none';
    // document.getElementById("TextArea").readOnly=true;
    // document.getElementById("TagEditButton").style.display='inLine';
    }
    
  }
xmlhttp.open("GET","query/TagCancel.php?Id="+Id,true);
xmlhttp.send();

}

