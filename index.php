
    <link rel="stylesheet" type="text/css" href="css/style.css">
        <title>DVD Rentals We have it...!</title>
       
            
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

        
     



   