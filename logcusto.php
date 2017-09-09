<?php
     session_start();
    

    include ('header.php');
    include ('sm.php');
   
    if(!empty($_SESSION['firstname'])){?>
    <div class="helloi">Welcome<?php echo $_SESSION['firstname'];?></div>
    <?php
            }
    include ('footer.php');


    $host ="localhost";
    $user ="root";
    $pass="";
    $db ="dvd";
    
    mysql_connect($host, $user, $pass);
    mysql_select_db($db);

    
    if (isset($_POST['firstname'])){
        $_SESSION['firstname']=$_POST['firstname'];
        $firstname = $_POST['firstname'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM UserManagement WHERE firstname='".$firstname."' AND password='".$password."' LIMIT 1 ";
        $res = mysql_query ($sql);
        if (mysql_num_rows($res)==1){
            echo "You have logged in";
            header('Location: users.php');
            
            exit();
        }else{
            echo "Name or password invalid";
            exit();
        }
    }

?>


<form class ="logincustomer" action = "logcusto.php" method = "post">
    <table>
         <tr>
            <td>Customer</td>  
        </tr>
        <tr>
            <br><td>Name</td><td><input type="text" name="firstname"/></td>
        </tr>
        <tr>
            <td>Password</td><td> <input type="password" name="password"/></td>
        </tr>
    </table>
    
    <input type="submit"/>
    </form>	          


