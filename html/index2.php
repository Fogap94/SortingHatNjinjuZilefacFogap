<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/index.css">

    <title>Document</title>
</head>
<body>

    <div class="container">

        <h1 id="header2">
            Create Account
        </h1>

        <form method ="GET" action="AddData.php">          

                <label for="form-firstname" >
                    Your FirstName
                </label>
                <br>
                <input type="text" name="Firstname" id="form-firstname" placeholder="Insert your First name" >
                <br>

                <label for="form_family_name">
                    Name
                </label>
                <br>
                <input type="text" name="family_name" id="form_family_name" placeholder="Insert your name" required="true">
                <br>
         
                <label for="your_gender">
                    Gender
                </label>
                <br>
                <select name="prefered" id="your_gender">
                    <option value="male">
                        Male
                    </option>
                    <option value="female">
                        Female
                    </option>
                </select>
                <br>
                <label for="Age_form">
                    Age
                </label>
                <br>
                <input type="number" name="age" id="Age_form">
                <br>
                <label for="form_textArea">
                    Description
                </label>
                <br>

                <textarea name="description" id="form_textArea" cols="90" rows="10">

                </textarea>

            

            <input type="submit" value="Create Account" id="btn_submit" name="submit">

        </form>


    </div>

    <script src="../javascript/index.js">

    </script>
    
</body>
</html>