function SignUp(){
window.open("SignUp.html");
}


function TagEdit(Id){
    document.getElementById("TextArea").readOnly=false;
    document.getElementById("TagEditButton").style.display='none';
    document.getElementById("TagEditingButton").innerHTML='<button id="TagCancelButton" type="button" onclick="TagCancel('+Id+')">Cancel</button><button id="TagSaveButton" type="button" onclick="TagSave('+Id+')">Save</button>';
}

function TagSave(Id){

var xmlhttp=new XMLHttpRequest();
var str=document.getElementById("TextArea").value; 
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("TextArea").value=xmlhttp.responseText;
    document.getElementById("TagCancelButton").style.display='none';
    document.getElementById("TagSaveButton").style.display='none';
    document.getElementById("TextArea").readOnly=true;
    document.getElementById("TagEditButton").style.display='inLine';
    }
    
  }
xmlhttp.open("GET","query/TagSave.php?Id="+Id+"&tag="+str,true);
xmlhttp.send();
}

function TagCancel(Id){

var xmlhttp=new XMLHttpRequest();
  
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("TextArea").value=xmlhttp.responseText;
    document.getElementById("TagCancelButton").style.display='none';
    document.getElementById("TagSaveButton").style.display='none';
    document.getElementById("TextArea").readOnly=true;
    document.getElementById("TagEditButton").style.display='inLine';
    }
    
  }
xmlhttp.open("GET","query/TagCancel.php?Id="+Id,true);
xmlhttp.send();

}


function Login(){

var xmlhttp=new XMLHttpRequest();
var username=document.getElementById("SignInForm").username.value;
var password=document.getElementById("SignInForm").password.value;

xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("Login").innerHTML=xmlhttp.responseText;
    location.reload();
    }
    
  }
xmlhttp.open("GET","query/Login.php?username="+username+"&password="+password,true);
xmlhttp.send();

}


function Logout(){
var xmlhttp=new XMLHttpRequest();
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("Login").innerHTML=xmlhttp.responseText;
    location.reload();
    }
    
  }
xmlhttp.open("GET","query/Logout.php",true);
xmlhttp.send();

}

function reloadPage(){
   location.reload();
}