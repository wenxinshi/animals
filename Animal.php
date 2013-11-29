<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <title>Animal Kingdom</title>
    <script type="text/javascript" src="Js.js"></script>
</head>

<body>

   <div id="Top">
        <div id="TopMenu">
             <ul class="list">
             <li><a href="index.html"><span>Home</span></a></li>
             <li class="blank"></li>
             <li><a href="#"><span>About Us</span></a></li>
             <li class="blank"></li>   
            <li><a href="#"><span>Contack Us</span></a></li>         
             </ul>
        </div>

        <div id="Logo">
            <div class="title">
                <h1>Animal Kindom</h1>
            </div>
        </div>

        <div id="Login">
            <div class="title">
                <h2>User Login</h2>
            </div>
            <form class="loginForm" action="LogIn.html" method="post">
                <input class="fillIn" name="name" type="text" value="User name" onfocus="if(this.value=='User name') this.value=''" onBlur="if(this.value=='') this.value='User name'" >
                <input class="fillIn" name="name" type="text" value="Password" onfocus="if(this.value=='Password') this.value=''" onBlur="if(this.value=='') this.value='Password'" >
                <input type="submit" value="Sign In">               
            </form>
              
            <div id="Register">
                <span>Not yet a Member? <a onClick="SignUp()" href="#">Register Now</a></a></span>
            </div>
        </div>

        <div id="Search">
            <form action="SearchResult.php" method="get">
                <input class="searchContent"type="text" name="search">
                <input type="submit" value="Search">
            </form>
        </div>
    </div>

    <?php 
     include 'Config.php';
     $Id=$_GET['Id'];
     $sql="select * from species where ID='$Id'";
     $result=mysqli_query($con,$sql);
     $row=mysqli_fetch_array($result);

     $commandName=$row['commonName'];
     $scientificName=$row['scientificName'];
     $HBLength=$row['HBLength'];
     $weight=$row['weight'];
     $height=$row['height'];
     $identification=$row['identification'];
     $habitat=$row['habitat'];
     $diet=$row['diet'];
     $reproduction=$row['reproduction'];
     $socialStructure=$row['socialStructure'];
     $behavior=$row['behavior'];
     $status=$row['status'];
     $interestingFacts=$row['interestingFacts'];
     $geographics=$row['geographics'];
     $picture=$row['picture'];
    ?>
    <div id="MainContent">
        <div class="LeftMenu">
                <div class="content">
                <h3>Animal</h3>
                <ul>
                    <li id="Phylum">
                        <b>Phylum:</b>
                        <span id="PhylumContent">Chordata</span>
                    </li>
                    <li id="Order">
                        <b>Class:</b>
                        <span id="OrderContent">Order</span>
                    </li>
                    <li id="Artiodactyla">
                        <b>Order:</b>
                        <span id="ArtiodactylaContent">Artiodactyla</span>
                    </li>
                    <li id="Family">
                        <b>Family:</b>
                        <span id="FamilyContent">Suidae</span>
                    </li>
                    <li id="Genus">
                        <b>Genus:</b>
                        <span id="GenusContent">Sus</span>
                    </li>
                    <li id="Species">
                       <b> Species :</b>
                        <span id="SpeciesContent">Sus scrofa</span>
                    </li>
                </ul>
            </div>
        </div>
    
        <div class="Description">
            <div class="content">
                <img  src="<?php echo $picture?>" align="right" hspace="10" vspace="10">
                <h3> Details</h3>
                <label>Head-Body Length:</label>
                <span class="Length"><?php echo $height?></span>
                <br>
                <label>Weight:</label>
                <span class="Weight"><?php echo $weight?></span>
                <br>
                <label>Identification:</label>
                <span class="Identification"><?php echo $identification?></span>
                <br>
                <label>Habitat:</label>
                <span class="Habitat"><?php echo $habitat?></span>
                <br>
                <label>Diet:</label>
                <span class="Diet"><?php echo $diet?></span>
                <br>
                <label>Reproduction:</label>
                <span class="Reproduction"><?php echo $reproduction?></span>
                <br>
                <label>Status:</label>
                <span class="Status"><?php echo $status?></span>
                <br>
                <label>Interesting Facts:</label>
                <span class="Facts"><?php echo $interestingFacts?></span>
                <br>
            </div>
        </div>
    </div>
    </div>  
    <div id="Recommand">
        <div class="content">
            <h3> Hello, Jun, Maybe you are interested in the following animals: </h3>
            <img class="float" src="images/Pig.jpg">
           <img class="float" src="images/Pig.jpg">
           <img class="float" src="images/Pig.jpg">
           <img class="float" src="images/Pig.jpg"> 
           <img class="float" src="images/Pig.jpg">
        </div>
    </div>
    <?php mysqli_close($con)?>
</body>
</html>