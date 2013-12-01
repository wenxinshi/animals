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

    <?php include_once 'Animal_Sql.php';?>
    <div id="MainContent">
        <div class="LeftMenu">
                <div class="content">
                <h3>Animal</h3>
                <ul>
                    <li id="Phylum">
                        <strong>Phylum:</strong></li>
                    <li id="Order">
                        <strong>Class:</strong>
                        <span id="OrderContent"></span>
                    </li>
                    <li id="Artiodactyla">
                        <strong>Order:</strong>
                        <span id="ArtiodactylaContent">Artiodactyla</span>
                    </li>
                    <li id="Family">
                        <strong>Family:</strong>
                        <span id="FamilyContent">Suidae</span>
                    </li>
                    <li id="Genus">
                        <strong>Genus:</strong>
                        <span id="GenusContent">Sus</span>
                    </li>
                    <li id="Species">
                       <strong> Species :</strong>
                        <span id="SpeciesContent">Sus scrofa</span>
                    </li>
                </ul>
            </div>
        </div>
    
        <div class="Description">
            <div class="content">
                <img  src="<?php echo $picture?>">
                <h3> Details</h3>
                <label><strong>Head-Body Length:</strong></label>
                <span><?php echo $height?></span>
                <br>
                <label><strong>Weight:</strong></label>
                <span><?php echo $weight?></span>
                <br>
                <label><strong>Identification:</strong></label>
                <span><?php echo $identification?></span>
                <br>
                <label><strong>Habitat:</strong></label>
                <span><?php echo $habitat?></span>
                <br>
                <label><strong>Diet:</strong></label>
                <span><?php echo $diet?></span>
                <br>
                <label><strong>Reproduction:</strong></label>
                <span><?php echo $reproduction?></span>
                <br>
                <label><strong>Status:</strong></label>
                <span><?php echo $status?></span>
                <br>
                <label><strong>Interesting Facts:</strong></label>
                <span><?php echo $interestingFacts?></span>
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