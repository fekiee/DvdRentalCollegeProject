 <?php
                
            session_start();
        
            
            include ('header.php');
                
            include ('sm.php');
            ?>
            <div class="bye "><?php echo 'good bye'; ?></div>
        <?php
            
            include ('footer.php');   
            session_destroy();
        ?> 