<?php session_start();?>
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
       

        <?php include 'LoginCheck.php';?>

        <div id="Search">
            <form action="Search.php" method="get">
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
                <?php echo $leftStr?>
            </div>
        </div>
    
        <div class="Description">
            <div class="content">
                <?php echo $descriptionStr?>
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