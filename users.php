<?php
    session_start();
    include ('header.php');
    include ('sm.php');
    include ('content.php');          
    if(!empty($_SESSION['firstname'])){?>
<div class="hello">Welcome<?php echo $_SESSION['firstname'];?></div>
<?php
            }
    include ('footer.php');
?>


