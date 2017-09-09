


    <div class="dvds">

    <?php
    include('connection.php');


    $sql = "SELECT dvd_name, id, price FROM AvailableDVDs";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
         echo "<br>DVD LIST<br>";
        while($row = $result->fetch_assoc()) {

    ?> 
        <tr> 
            <td><?php echo $row['dvd_name'] ?></td> 
            <td><?php echo $row['dvd_name'] ?></td>  
            <td>  &#8364;<?php echo $row['price'] ?>$</td> 
            <td><a href="content.php?page=products&action=add&id=<?php echo $row['id'] ?>">
                <button type="button">Rent Me</button> <br></a>
                <?php 
                    if (!$row['id']==0) 
                     $iddvd = $row['id'];
                     $dvdn = $row['dvd_name'];
                    try{
                        $host ='localhost';
                        $dbname ='dvd';
                        $user = 'root';
                        $pass = '';
                        $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
                        }catch(PDOException $e) 

                        {echo 'Error'; }  

                        $sql = "INSERT INTO `DVDRentals` (`ids`,`dvd_name`) VALUES (?,?);";
                        $sth = $DBH->prepare($sql);
                        $sth->bindParam(1, $iddvd, PDO::PARAM_INT);
                        $sth->bindParam(2, $dvdn, PDO::PARAM_INT);
                        $sth->execute();
                    
                ?>
            </td> 
        </tr> 
        
        
        
        
            
<?php
        }

    } else {
        echo "0 results";
    }
    $conn->close();
      ?>

</div>




 