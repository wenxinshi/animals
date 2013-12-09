function SignUp(){
window.open("SignUp.html");
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
    self.location="index.php";
    }
    
  }
xmlhttp.open("GET","query/Logout.php",true);
xmlhttp.send();

}

function reloadPage(){
   location.reload();
}



function AllowDrop(ev)
{
ev.preventDefault();
}

function Drag(ev)
{
ev.dataTransfer.setData("Text",ev.target.innerHTML);
}


function DropIn(ev,Id)
{
ev.preventDefault();
var str=ev.dataTransfer.getData("Text");
var labels=document.getElementById("TagCollection").getElementsByTagName("label");

for (var i = labels.length - 1; i >= 0; i--) {
  if(labels[i].innerHTML==str)
    return;
};

var xmlhttp=new XMLHttpRequest();  
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
      location.reload();
    }
  }
xmlhttp.open("GET","query/AddTag.php?Id="+Id+"&tag="+str,true);
xmlhttp.send();
}

function AddTag(Id){
  var xmlhttp=new XMLHttpRequest();
  var str=document.getElementById("TagUserInput").value;
  var letters=/^[0-9a-zA-Z]+/;  
  if(!str.match(letters)){
    return ;
  }

var labels=document.getElementById("TagCollection").getElementsByTagName("label");

for (var i = labels.length - 1; i >= 0; i--) {
  if(labels[i].innerHTML==str)
    return;
};  

  xmlhttp.onreadystatechange=function(){
    if (xmlhttp.readyState==4 && xmlhttp.status==200)
      {
        location.reload();
      }
    }
  xmlhttp.open("GET","query/AddTag.php?Id="+Id+"&tag="+str,true);
  xmlhttp.send();
}

function DeleteTag(ev,Id){
  ev.preventDefault();
  var str=ev.dataTransfer.getData("Text");
  
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function(){
    if (xmlhttp.readyState==4 && xmlhttp.status==200)
      {
        location.reload();
      }
    }
  xmlhttp.open("GET","query/DeleteTag.php?Id="+Id+"&tag="+str,true);
  xmlhttp.send();
}
