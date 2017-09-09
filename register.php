    <?php   
            session_start();
            
             include ('header.php');

            include ('sm.php');
            
            if(!empty($_SESSION['firstname'])){?>
            <div class="helloi"><?php echo $_SESSION['firstname'];?></div>
            <?php
            }
            include ('footer.php');
            ?>





<?php
if($_POST){
    $firstname = $_POST['firstname'];
    $lastname  = $_POST['lastname'];
    $email     = $_POST['email'];
    $password  = $_POST['password'];
    $error='';
    
    if($firstname==''){
        $error.='Please enter a First Name<br>';
    }
     if($lastname==''){
        $error.='Please enter a Last Name<br>';
    }
    if ($email == '') {
        $error.='Please enter an E-mail<br>';
    }
    if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $error.='Sorry your email is not valid! <br>';
    }
    if ($password == '') {
        $error.='Please enter a password<br>';
    }
    if (!is_numeric($password)) {
        $error.='Please enter just numerics characters<br>';
    }
    if (strlen($password)< 8) {
        $error.='The password is too short, please try again!';
    }
    if (!$error) {
        echo 'User Validated!';
         '<scrip> window.location="dvd.php"; </scrip>';
    }    
    if ($error) {  
        echo '<div class="alert">'.$error.'</div>';
    }
         
}
    if ($_POST){
        $firstname = $_POST['firstname'];
        $lastname  = $_POST['lastname'];
        $email     = $_POST['email'];
        $password  = $_POST['password'];

        try{
            $host ='127.0.0.1';
            $dbname ='dvd';
            $user = 'root';
            $pass = '';
            $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
        }catch(PDOException $e) 

        {echo 'Error'; }  

        $sql = "INSERT INTO `UserManagement` (`firstname`,`lastname`,`email`,`password`) VALUES (?, ?, ?, ?);";
        $sth = $DBH->prepare($sql);
        $sth->bindParam(1, $firstname, PDO::PARAM_INT);
        $sth->bindParam(2, $lastname, PDO::PARAM_INT);
        $sth->bindParam(3, $email, PDO::PARAM_INT);
        $sth->bindParam(4, $password, PDO::PARAM_INT);
        $sth->execute();
    }
?>

<link rel="stylesheet" type="text/css" href="css/style.css">
<div class="register">
<form class = "register" action="register.php" method="post"> 
        <td>Register Account</td>
    <table>
        <tr>
            <td>First name</td><td><input type="text" name="firstname"/> <td/>
        </tr>
            <tr>
                <td>Last name</td><td><input type="text" name="lastname"/> <td/>
            </tr>
            <tr>
                <td>Email</td><td><input type="text" name="email"/> <td/>
            </tr>	
            <tr>
                <td>Password</td><td><input type="password" name="password"/></td>
            </tr>
    </table>
            <input type="submit"/>
    </form>
</div>