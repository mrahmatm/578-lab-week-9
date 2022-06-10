//alert("JS connected!");
//PASSWORD PEAK
document.getElementById('showPW1').onclick = function() {
    if ( this.checked ) {
       document.getElementById('inputPassword').type = "text";
    } else {
       document.getElementById('inputPassword').type = "password";
    }
};

document.getElementById('showPW2').onclick = function() {
    if ( this.checked ) {
       document.getElementById('inputConfirmPassword').type = "text";
    } else {
       document.getElementById('inputConfirmPassword').type = "password";
    }
};

//CHECK EMAIL AND USERNAME IN DB
function checkExistingEmail(input){
    if(input.length == 0){
        //letak if input area null
        alert("this cannot be null!");
        return;
    }else if(input.includes("@") && input.includes(".")){
        //alert("input isnt null!");
        var xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                //alert("code: " + code);

                if(this.responseText.includes("x")){
                    //alert("code: "+this.responseText);
                    var target = document.getElementById("feedbackDiv1");
                    target.innerHTML = "Email available!";
                    target.className = "passText";
                }else if(this.responseText.includes("y")){
                    var target = document.getElementById("feedbackDiv1");
                    target.innerHTML = "Email taken!";
                    target.className = "errorText";
                }
                
                //alert("sampai dekat sini!");
            }
                
        //document.write("meow");
    };

        xmlhttp.open("GET", "db.php?q=" + input+ "&type=e", true);
        //alert("paramter sent: " + input);
        xmlhttp.send();

    }else{
        var target = document.getElementById("feedbackDiv1");
                    target.innerHTML = "Not a valid email adrress!";
                    target.className = "errorText";
    }
    
}

function checkExistingUsername(input){
    if(input.length == 0){
        //letak if input area null
        alert("this cannot be null!");
        return;
    }else{
        //alert("input isnt null!");
        var xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                //alert("code: " + code);
                if(this.responseText.includes("0")){
                    //alert("code: "+this.responseText);
                    var target = document.getElementById("feedbackDiv");
                    target.innerHTML = "Username available!";
                    target.className = "passText";
                }else if(this.responseText.includes("1")){
                    var target = document.getElementById("feedbackDiv");
                    target.innerHTML = "Username taken!";
                    target.className = "errorText";
                }
                //alert("sampai dekat sini!");
            }
        //document.write("meow");
    };

        xmlhttp.open("GET", "db.php?q=" + input + "&type=u", true);
        //alert("paramter sent: " + input);
        xmlhttp.send();

    }
}

function alertSomething(something){
    alert(something);
}

//CHECK PASSWORD STRENGTH API
function checkPasswordStr(input){
    const options = {
        method: 'POST',
        headers: {
            'content-type': 'application/json',
            'X-RapidAPI-Key': '33f24f2013msh95f42adde4ca520p1d45e6jsn2b536a922f4e',
            'X-RapidAPI-Host': 'strong-password-generator-and-checker.p.rapidapi.com'
        },
        body: '{"password":"'+input+'"}'
    };
    
    fetch('https://strong-password-generator-and-checker.p.rapidapi.com/api/password_check', options)
        .then(response => response.json())
        .then(response =>{
            console.log(response);
            var feedback = document.getElementById("feedbackDiv2");
            var count = response.password.contains.length;
            var bar = document.getElementById("str");
            var length = response.password.length;
            if(count >3 && length >= 8){
                bar.value = 100;
                feedback.innerHTML = "Very Strong!";
            }else if(count > 2 && length >= 6){
                bar.value = 75;
                feedback.innerHTML = "Strong";
            }else if (count > 1 && length >= 5){
                bar.value = 50;
                feedback.innerHTML = "Weak!";
            }else{
                bar.value = 25;
                feedback.innerHTML = "Very Weak!";
            }
        } )
        .catch(err => console.error(err));    
    
}

//ADDITIONAL: CHECK IF CONFIRM PASSWORD MATCHES
function checkConfirmPass(){
    var target=document.getElementById("inputPassword").value;
    var target1=document.getElementById("inputConfirmPassword").value;

    if(target===target1){
        //alert("is equal now!");
        document.getElementById("checkStr").disabled = false;
        document.getElementById("feedbackDiv2").innerHTML = "";
    }else{
        document.getElementById("feedbackDiv2").innerHTML = "Password does not match!";
        document.getElementById("checkStr").disabled = true;
    }
}





