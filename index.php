<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>578 Week 9</title>

    <!-- bootstrap -->
    <link href="../../bootstrap/bootstrap-5.2.0-beta1-dist/css/bootstrap.css" rel="stylesheet">
    <script src="../../bootstrap/bootstrap-5.2.0-beta1-dist/js/bootstrap.bundle.js"></script>
    
</head>

<body class="bg-light">
    <style>
        .hidden{
            display: none;
        }

        .errorText{
            color: rgb(255, 0, 0);
        }

        .container{
            margin-top: 50px;
            
        }

        .passText{
            color: green;
        }

        .checkButton{
            margin: 10px 10px;
            display: inline;
        }
        .inputText{
            width: 20%;
        }
    </style>
    <div class="container" style="margin-top: 5%;">
        <form action="">
            <div class="container">
                <label for="inputUsername">Please enter your username:</label>
                <input type="text" id="inputUsername" name="inputUsername" class="form-control inputText"
                style="text-align: left; margin-top: 20px; display: inline;">
                <button type="button" onClick="checkExistingUsername(inputUsername.value)">Check Username</button>
                <div id="feedbackDiv" class="hidden">a</div>
            </div>
            
            <div class="container">
                <label for="inputEmail">Please enter your email address:</label>
                <input type="text" id="inputEmail" name="inputEmail" class="form-control inputText"
                style="text-align: left; margin-top: 20px; display: inline;">
                <button type="button" onClick="checkExistingEmail(inputEmail.value)">Check Email</button>
                <div id="feedbackDiv1" class="hidden">a</div>
            </div>
            
            <div class="container">
                <label for="inputPassword">Please enter your password:</label>
                <input type="password" id="inputPassword" name="inputPassword" class="form-control inputText" onkeyup="checkConfirmPass()"
                style="text-align: left; margin-top: 20px; display: inline;">
                <input type="checkbox" style="display: inline; margin-top: 20px; margin-bottom: 20px;" id="showPW1">
                <label for="showPW1">Show Password</label>
                <br>
                <label for="inputPassword">Confirm your password:</label>
                <input type="password" id="inputConfirmPassword" name="inputConfirmPassword" class="form-control inputText" onkeyup="checkConfirmPass()"
                style="text-align: left; margin-top: 20px; display: inline;">
                <input type="checkbox" style="display: inline; margin-top: 20px; margin-bottom: 20px;" id="showPW2">
                <label for="showPW2">Show Password</label>     
                <br>
                <button type="button" onClick="checkPasswordStr(inputPassword.value)" id="checkStr" disabled="true" class="checkButton">Check Password Strength</button>                
                <label for="str">Password Strength:</label>
                <progress id="str" value="0" max="100"></progress><br>
                <div id="feedbackDiv2" class="" style="display: inline; margin: 30px;"></div>
            </div>   
        </form>
    </div>
    <script src="scripts.js"></script>
</body>

</html>