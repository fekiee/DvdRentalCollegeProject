


            <?php
            session_start();

            include ('header.php');
            include ('sm.php');
            include ('footer.php');
            if(!empty($_SESSION['firstname'])){?>
            <div class="helloi">Welcome<?php echo $_SESSION['firstname'];?></div>
            <?php
            }
            include ('footer.php');
            ?>
<div class="mana">
<?php
       
    if(isset($_POST['delete']))
    {
    
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "dvd";

    $conn = mysql_connect($host, $user, $pass, $db );



    if(! $conn )
    {
      die('Could not connect: ' . mysql_error());
    }

    $id_select = $_POST['id_select'];

    $sql = "DELETE FROM AvailableDVDs WHERE id = $id_select";

    mysql_select_db('dvd');
    $retval = mysql_query( $sql, $conn );
    if(! $retval )
    {
      die('Could not delete dvd: ' . mysql_error());
    }
    echo "DVD Deleted successfully\n";
    mysql_close($conn);
    }
    else
    {
    ?>
    <form method="post" action="<?php $_PHP_SELF ?>">
        <table>
            <tr>
                <td width="100">Enter DVD ID Number to be deleted</td>
                <td><input name="id_select" type="text" id="id_select" ></td>
            </tr>
            <tr>
                <td width="100"> </td>
            </tr>
            <tr>
                <td width="100"> </td>
                <td><input name="delete" type="submit" id="delete" value="Delete"></td>
            </tr>
        </table>
    </form>
    <?php
    }

        if ($_POST){
            $iddvd = $_POST['iddvd'];
            $namedvd  = $_POST['namedvd'];
            $price  = $_POST['price'];


            try{
                $host ='localhost';
                $dbname ='dvd';
                $user = 'root';
                $pass = '';
                $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
            }catch(PDOException $e) 

            {echo 'Error'; }  

            $sql = "INSERT INTO `AvailableDVDs` (`id`,`dvd_name`,`price`) VALUES (?, ?,?);";
            $sth = $DBH->prepare($sql);
            $sth->bindParam(1, $iddvd, PDO::PARAM_INT);
            $sth->bindParam(2, $namedvd, PDO::PARAM_INT);
            $sth->bindParam(3, $price, PDO::PARAM_INT);
            $sth->execute();
        }
        
?>

<form method="post" action="<?php $_PHP_SELF ?>">
    <table>
        <tr>
            <td width="100">Enter ID DVD </td>
            <td><input name="iddvd" type="text" id="iddvd" ></td>
        </tr>
        
        <tr>
            <td width="100">Enter  DVD Name</td>
            <td><input name="namedvd" type="text" id="namedvd" ></td>
        </tr>
        
        <tr>
            <td width="100">Enter  DVD price</td>
            <td><input name="price" type="text" id="price" ></td>
        </tr>
        
        <tr>
            <td width="100"> </td>
        </tr>
        <tr>
            <td width="100"> </td>
            <td><input name="add" type="submit" id="add" value="Add"></td>
        </tr>
    </table>
</form>
  
    
</div>
<?php include ('contentm.php'); ?>
