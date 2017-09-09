<?php
        session_start();
        include ('header.php');

        include ('sm.php');
       
        if(!empty($_SESSION['firstname'])){?>
<div class="helloi"><?php echo $_SESSION['firstname'];?></div>
<?php
            }
  
?>

            
    <?php    include ('about.php');
            
        include ('footer.php');
?>