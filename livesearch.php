<?php 
include ("config.php");

if(isset($_POST["input"])) {
    $input = $_POST["input"];
    $query = "SELECT * FROM users WHERE username LIKE '{$input}%'";
    $result = mysqli_query($link,$query);

    if(mysqli_num_rows($result) > 0) { ?>

        <tbody>
            <?php
                while($row = mysqli_fetch_array($result)) { 
                    $username = $row['username'];
            ?>
            <tr>  
                <input type="hidden" name="username" value="<?php echo $username; ?>">
                <td><?php echo $username?></td>
            </tr>
                
        </tbody>


<?php
    }}
    else {
        echo "No User Found!";
    }

}
?>