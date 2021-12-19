<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Adding data to the Database </title>

</head>
<body>
    
<?php 

    // Connecting to Combell server.

    $HostName = "ID362517_SortingHatFogap.db.webhosting.be";
    $dbUSERname ="ID362517_SortingHatFogap";
    $dbpassword = "Andrew1994";
    $dbName = "ID362517_SortingHatFogap";
    $dbPort = "3306";

    $conn = mysqli_connect($HostName, $dbUSERname, $dbpassword, $dbName,  $dbPort);


    if(isset($_GET["submit"])){

     // Creating variable to get inputs.

            $FirstName = $_GET["Firstname"];
            $FamilyName = $_GET["family_name"];
            $Gender = $_GET["prefered"];
            $Age = $_GET["age"];
            $Description  = $_GET["description"];
        
                $query = "INSERT INTO account(FirstName, Name , Gender ,Age,Description) VALUES ('$FirstName', '$FamilyName' , '$Gender' , '$Age' , '$Description');";

                $run = mysqli_query(  $conn ,   $query);

        if($run){

            echo "Form submitted successfully, please click on the button below and go to Home to add Persons to the a house."; echo "<br>";
                       
                }
                          
        else{
            echo "Form not submitted , go back and check you input";
                        
                }         

    }



    $conn->close();
?>
<br>
<form action="index.php">
    <button>
        Home
    </button>
</form>
</body>
</html>