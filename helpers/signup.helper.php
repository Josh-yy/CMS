<?php 

function isPassNotSame($password, $confirmPassword){
    if($password !== $confirmPassword){
        return true;
        $_SESSION["signup_error"] = "Passwords do not match, please try again!";
        header("Location: ../signupPage.php");
    }
}



?>

<script>
    
</script>