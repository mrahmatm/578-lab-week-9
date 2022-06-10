<?php

    $req = $_REQUEST['q'];
    $type = $_REQUEST['type'];
    //echo '<script>alert("data sent: '.$req.'")</script>';

    //include "connect.php";
        


    $input = $req;
    if($type == 'e'){
        $val = checkExistingEmail($req);
    }else if ($type == 'u'){
        $val = checkExistingUsername($req);
    }
    //$val = checkExisting($input);
    echo $val;
    /*
    if($val == 0){
        $_SESSION['code'] = $val;
    }else{
        $_SESSION['code'] = 1;

    }*/

    function checkExistingEmail($input){
        require "connect.php";
        $stmt = $pdo->prepare("SELECT count(*) FROM account WHERE email = ?");
            $stmt->execute([$input]);
            $count = $stmt->fetchColumn();

            if($count == 0){
                //echo "<script>alertSomething('username baru woi');</script>";
                return 'x';
                //echo "check === 0";
            }else{
                //echo "<script>alert('username is used!');</script>";
                return 'y';
            }
    }

    function checkExistingUsername($input){
        require "connect.php";
            //echo '<script>alert("got into not email, username: '.$input.'")</script>';

            /*$sql = "SELECT COUNT(*) FROM account WHERE username=".$input;
            $res = $pdo->query($sql);
            $count = $res->fetchColumn();*/

            $stmt = $pdo->prepare("SELECT count(*) FROM account WHERE username = ?");
            $stmt->execute([$input]);
            $count = $stmt->fetchColumn();
            /*
            $stmt=$pdo->query('SELECT * FROM account WHERE username =:targetUsername');
            $stmt->execute(['targetUsername'=>$input]);
            $result=$stmt->fetchAll(); */

            if($count == 0){
                //echo "<script>alertSomething('username baru woi');</script>";
                return 0;
                //echo "check === 0";
            }else{
                //echo "<script>alert('username is used!');</script>";
                return 1;
            }
        
    }

    

?>