<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <link rel="stylesheet" href="../css/index.css">

     <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cookie&family=Dancing+Script:wght@600&family=Faster+One&family=Great+Vibes&family=Petemoss&family=Satisfy&family=Shalimar&family=Source+Code+Pro:wght@500&display=swap" rel="stylesheet">

    <title>Put people in the house</title>
</head>
<body>

<div class = "container">
    
    <div >
    
        <h1>ADD USER TO VARIOUS HOUSE</h1>

    </div>

        <?php
        
            //Connection to the database.

                    
            $HostName = "ID362517_SortingHatFogap.db.webhosting.be";
            $dbUSERname ="ID362517_SortingHatFogap";
            $dbpassword = "Andrew1994";
            $dbName = "ID362517_SortingHatFogap";
            $dbPort = "3306";

            $conn = mysqli_connect($HostName, $dbUSERname, $dbpassword, $dbName,  $dbPort);
        
        
            $IndexId = 0 ; 

            if(isset($_POST['IndexId'])) {

            $IndexId = $_POST['IndexId'];  
            echo '<script>console.log("yes it is set!"); </script>';

            } 

        ?> 
<div class= "UserContent">
            <span> ClICK ON THE BUTTON (CLICK TO SEE NEXT PERSON) TO ADD USER TO VARIOUS HOUSE</span>
            <br>
              <?php
                    if (isset($_POST['submit'])) {
                        
                        $IndexId += 1;
                        $GetUser = "SELECT * FROM `account` WHERE id = '$IndexId';";

                        $AllUsers = mysqli_query($conn, $GetUser)->fetch_all(MYSQLI_ASSOC);
                    
                        foreach ($AllUsers as $persons) {

                            $fullname = $persons["FirstName"]." ".$persons["Name"];

                            echo "<strong>".$fullname."</strong>";echo "<br>";
                     
                ?>

        <?php

            if ($persons["Gender"] == "male") {

            ?>
                <img src="ProfileM.png" alt="profile_picture"  class = "ProfileResize"><br><br><br>
                
        <?php

             }

            else{
            
            ?>

                <img src="ProfileF.png" alt="profile_picture"  class = "ProfileResize"><br><br><br>
            
            <?php
            }
           
            ?>  
           
<div>
        <strong> Persons Gender </strong>  :
        <?php
                echo $persons["Gender"]; echo "<br>";

        ?>
        <strong> Persons Age  </strong> :
        <?php   
                echo $persons["Age"] ;echo "<br>";
        ?>       
        <strong> Description </strong> :
        <?php  
                echo $persons["Description"];echo "<br>";

        ?>

</div>
        <?php
        }

            $MaxQuery = "SELECT MAX(id) FROM account;";

            $MaxIDs = mysqli_query( $conn ,  $MaxQuery)->fetch_all(MYSQLI_ASSOC);

            foreach ($MaxIDs as $MaximumID) {
                $MId = $MaximumID["MAX(id)"];
            }
    
                if ($IndexId>$MId ) {
       ?>        
                <br>
                <br>
                <br>
                <br>
                <br>
                <span class = finisher>USER FINISHED, THANK YOU!</span> <br>
                <form action="index2.php">
                    <input type="submit" value = "CLICK HERE IN OTHER TO ADD NEW USER">
                </form>
        <?php           
                }

        }
        ?>

    <?php

    if (isset($_POST['submitG'])) {

        $GetUser = "SELECT * FROM `account` WHERE id = '$IndexId';"; 

        $AllUsers = mysqli_query($conn, $GetUser)->fetch_all(MYSQLI_ASSOC); 
    
              
        foreach ($AllUsers as $person) {

            $fullname1 = $person["FirstName"]." ".$person["Name"];
       
            $query = "INSERT INTO house (Gryffinder) VALUES (' $fullname1');";

            $run = mysqli_query(  $conn ,   $query);

        }
        echo "<br>"; 
        echo "<br>"; 
        echo "<br>"; 
        echo "<br>"; 
        echo "<br>"; 
        echo "YOU ADDED USER INTO THE Gryffinder HOUSE"; echo "<br>";echo "<br>"; 

       // echo "ClICK ON THE BUTTON (CLICK TO SEE NEXT PERSON) TO ADD ANOTHER USER"; echo "<br>"; echo "<br>"; echo "<br>";



        $UserFrequency = "SELECT  COUNT(Gryffinder) AS FREQUENCY FROM house WHERE Gryffinder LIKE  '%$fullname1%' GROUP by Gryffinder;";

        $TotalUsers = "SELECT COUNT(Gryffinder) FROM house;";

        $run1 = mysqli_query( $conn , $UserFrequency)->fetch_all(MYSQLI_ASSOC);

        $run2 = mysqli_query( $conn , $TotalUsers)->fetch_all(MYSQLI_ASSOC);

        foreach ($run1 as $count) {
            $Ferquency = $count["FREQUENCY"];
        }

        ?>

        FREQUENCY OF  <?php echo  $fullname1?>  =  <?php echo $Ferquency?>

        <br>
        <br>

        <?php

        foreach ($run2 as $TotalHouse) {
            $Allmember = $TotalHouse["COUNT(Gryffinder)"];
        }
        
        ?>

        TOTAL number of USER =   <?php echo $Allmember?>

        <br>
        <br>

        <?php
     
        $percetage = round(($Ferquency/  $Allmember) * 100);

        ?>

       <strong> Percentage of Vote in the house Gryffinder :</strong> <?php echo  $percetage?>%

        <?php

    }elseif (isset($_POST['submitS'])) {

        $GetUser = "SELECT * FROM `account` WHERE id = '$IndexId';"; 

        $AllUsers = mysqli_query($conn, $GetUser)->fetch_all(MYSQLI_ASSOC); 
    
              
        foreach ($AllUsers as $person) {

            $fullname1 = $person["FirstName"]." ".$person["Name"];
       
            $query = "INSERT INTO house (Slythherin) VALUES ('$fullname1');";

            $run = mysqli_query(  $conn ,   $query);

        }
        echo "<br>"; 
        echo "<br>"; 
        echo "<br>"; 
        echo "<br>"; 
        echo "<br>"; 
        echo "YOU ADDED USER INTO THE Slythherin HOUSE"; echo "<br>";echo "<br>"; 

        //echo "ClICK ON THE BUTTON (CLICK TO SEE NEXT PERSON) TO ADD ANOTHER USER"; echo "<br>"; echo "<br>"; echo "<br>";


        $UserFrequency = "SELECT  COUNT(Slythherin) AS FREQUENCY FROM house WHERE Slythherin LIKE  '%$fullname1%' GROUP by Slythherin;";

        $TotalUsers = "SELECT COUNT(Slythherin) FROM house;";

        $run1 = mysqli_query( $conn , $UserFrequency)->fetch_all(MYSQLI_ASSOC);

        $run2 = mysqli_query( $conn , $TotalUsers)->fetch_all(MYSQLI_ASSOC);

        foreach ($run1 as $count) {
            $Ferquency = $count["FREQUENCY"];
        }

        ?>

        FREQUENCY OF <?php echo  $fullname1?>  =  <?php echo $Ferquency?>

        <br>
        <br>

        <?php

        foreach ($run2 as $TotalHouse) {
            $Allmember = $TotalHouse["COUNT(Slythherin)"];
        }
        
        ?>

        TOTAL number of  User =   <?php echo $Allmember?>

        <br>
        <br>

        <?php
     
        $percetage = round(($Ferquency/  $Allmember) * 100);

        ?>

       <strong> Percentage of Vote in the house Slythherin :</strong> <?php echo  $percetage?>%

        <?php

    }elseif (isset($_POST['submitR'])) {

        $GetUser = "SELECT * FROM `account` WHERE id = '$IndexId';"; 

        $AllUsers = mysqli_query($conn, $GetUser)->fetch_all(MYSQLI_ASSOC); 
    
              
        foreach ($AllUsers as $person) {

            $fullname1 = $person["FirstName"]." ".$person["Name"];
       
            $query = "INSERT INTO house (Ravenffondor) VALUES ('$fullname1');";

            $run = mysqli_query(  $conn ,   $query);

        }
        echo "<br>"; 
        echo "<br>"; 
        echo "<br>"; 
        echo "<br>"; 
        echo "<br>"; 
        echo "YOU ADDED USER INTO THE Ravenffondor HOUSE"; echo "<br>";echo "<br>";

        //echo "ClICK ON THE BUTTON (CLICK TO SEE NEXT PERSON) TO ADD ANOTHER USER"; echo "<br>"; echo "<br>"; echo "<br>";


        $UserFrequency = "SELECT  COUNT(Ravenffondor) AS FREQUENCY FROM house WHERE Ravenffondor LIKE  '%$fullname1%' GROUP by Ravenffondor;";

        $TotalUsers = "SELECT COUNT(Ravenffondor) FROM house;";

        $run1 = mysqli_query( $conn , $UserFrequency)->fetch_all(MYSQLI_ASSOC);

        $run2 = mysqli_query( $conn , $TotalUsers)->fetch_all(MYSQLI_ASSOC);

        foreach ($run1 as $count) {
            $Ferquency = $count["FREQUENCY"];
        }

        ?>

        FREQUENCY OF  <?php echo  $fullname1?>  =  <?php echo $Ferquency?>

        <br>
        <br>

        <?php

        foreach ($run2 as $TotalHouse) {
            $Allmember = $TotalHouse["COUNT(Ravenffondor)"];
        }
        
        ?>

        TOTAL number of USER =   <?php echo $Allmember?>

        <br>
        <br>

        <?php
     
        $percetage = round(($Ferquency/  $Allmember) * 100);

        ?>

       <strong> Percentage of Vote in the house Ravenffondor :</strong> <?php echo  $percetage?>%

        <?php
    }elseif (isset($_POST['submitH'])) {

        $GetUser = "SELECT * FROM `account` WHERE id = '$IndexId';"; 

        $AllUsers = mysqli_query($conn, $GetUser)->fetch_all(MYSQLI_ASSOC); 
    
              
        foreach ($AllUsers as $person) {

            $fullname1 = $person["FirstName"]." ".$person["Name"];
       
            $query = "INSERT INTO house (Hufflepuff) VALUES ('$fullname1');";

            $run = mysqli_query(  $conn ,   $query);

        }
        echo "<br>"; 
        echo "<br>"; 
        echo "<br>"; 
        echo "<br>"; 
        echo "YOU ADDED USER INTO THE Hufflepuff HOUSE"; echo "<br>";echo "<br>"; 

        //echo "ClICK ON THE BUTTON (CLICK TO SEE NEXT PERSON) TO ADD ANOTHER USER"; echo "<br>"; echo "<br>"; echo "<br>";


        $UserFrequency = "SELECT  COUNT(Hufflepuff) AS FREQUENCY FROM house WHERE Hufflepuff LIKE  '%$fullname1%' GROUP by Hufflepuff;";

        $TotalUsers = "SELECT COUNT(Hufflepuff) FROM house;";

        $run1 = mysqli_query( $conn , $UserFrequency)->fetch_all(MYSQLI_ASSOC);

        $run2 = mysqli_query( $conn , $TotalUsers)->fetch_all(MYSQLI_ASSOC);

        foreach ($run1 as $count) {
            $Ferquency = $count["FREQUENCY"];
        }

        ?>

        FREQUENCY OF  <?php echo  $fullname1?> =  <?php echo $Ferquency?>

        <br>
        <br>

        <?php

        foreach ($run2 as $TotalHouse) {
            $Allmember = $TotalHouse["COUNT(Hufflepuff)"];
        }
        
        ?>

        TOTAL number of USER =   <?php echo $Allmember?>

        <br>
        <br>

        <?php
     
        $percetage = round(($Ferquency/  $Allmember) * 100);

        ?>

       <strong> Percentage of Vote in the house Hufflepuff :</strong> <?php echo  $percetage?>%

        <?php
    }

    ?>


</div>
<br>

<div class = "Buttons">

<form action="index3.php" method ="post">

        <input type="submit"  name = "submitG"   value= "This is a Gryffindor!"  id = "HouseBtn1">
        <br>

        <input type="submit"  name = "submitS"   value= "This is a Slythherin!"  id = "HouseBtn2">

        <input type="submit"  name = "submitR"   value= " This is a Ravenffondor!"  id = "HouseBtn3">
        
        <input type="submit"  name = "submitH"   value= "This is a Hufflepuff!"  id = "HouseBtn4">

  
        <div class ="numbers">
            <input type="number" name="IndexId" value="<?php echo $IndexId;?>">
        </div>
      
  </form>
  </div>

  
  <form action="index3.php" method ="post">

        <input type="submit"  name = "submit"   value= "Click to see next PERSON"  class = "HouseButtons">
        <br>
      
        <div class ="numbers">
            <input type="number" name="IndexId" value="<?php echo $IndexId;?>">
        </div>
      
  </form>
  

</div>
    
    <?php
        closeConnection($conn);
    ?>
</body>
</html>