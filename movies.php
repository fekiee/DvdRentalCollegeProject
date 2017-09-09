            
<?php
            session_start();
            
            include ('header.php');
            
            include ('sm.php');

            include ('cont.php');
            
            if(!empty($_SESSION['firstname'])){?>
            <div class="hello"><?php echo $_SESSION['firstname'];?></div>
            <?php
            }
            include ('footer.php');
?>
