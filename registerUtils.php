<?php
function emptyInputSignup($username, $email , $password, $cpassword){

    if( empty($username) || empty($email) ||empty($password) || empty($cpassword) ){
        return true;
    }
    else return false;

}

function emptyInputLogIn($userid, $password){

    if(empty($userid) || empty($password) ){
        return true;
    }
    else return false;
}

function userEmailExists($email){
    
    include("db_connect.php");
    
    $sql="SELECT * FROM `user` WHERE email= ?";
    $stmt=mysqli_stmt_init($conn);
    
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location:userRegister.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"s",$email);
    mysqli_stmt_execute($stmt);

    $resultData=mysqli_stmt_get_result($stmt);

    if($row= mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        return false;
    }
    mysqli_stmt_close($stmt);
}

function invalidEmail($email){

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        return true;
    }
    else return false;
}
function passwordMatch($password, $cpassword){

    if($password!==$cpassword){
        return true;
    }
    else return false;
}

function codeMatch($code){

    if($code!=="peranaichill"){
        return true;
    }
    else return false;
}
function createUser( $username, $email, $password){
    include("db_connect.php");
    $sql="INSERT INTO `user` (Name, email, password) VALUES(?, ?, ?) ";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location:userRegister.php?error=stmtfailed");
        exit();
    }
    
    $hashedPassword= password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt,"sss", $username, $email, $hashedPassword);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location:userRegister.php?error=none");
    exit();
  
}
function logIN_password_match($password,$useremail):bool{
    include("db_connect.php");
    $userEmailExists=userEmailExists($useremail);
    if($userEmailExists=== false){
        header("location:userLogIn.php?error=wronglogin");
        exit();
    }
    $pwdHashed= $userEmailExists["password"];
    $checkpwd= password_verify($password,$pwdHashed);

    if($checkpwd === false){
        return false;
    }
    else if($checkpwd === true){
        return true;
    }

}
function loginAdmin($useremail, $password){
    include("db_connect.php");
    $userEmailExists=userEmailExists($useremail);
    if($userEmailExists=== false){
        header("location:userLogIn.php?error=wronglogin");
        exit();
    }
    $pwdHashed= $userEmailExists["password"];
    $checkpwd= password_verify($password,$pwdHashed);

    if($checkpwd === false){
        header("location :userLogIn.php?error=wronglogin");
    }
    else if($checkpwd === true){
        session_start();
        $_SESSION['userEmail'] = $userEmailExists["email"];
        header("location: ./index.php");
        exit();
    }
}
?>