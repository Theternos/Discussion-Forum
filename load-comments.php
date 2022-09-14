
<?php 
    include 'config.php';
    $commentnewcount = $_POST['commentnewcount'];
    $row_iddd = $_POST['row_iddd'];

                    $sql1 = "SELECT * FROM reply WHERE parent_id = $row_iddd ORDER BY id DESC limit $commentnewcount";
                    $result1 = mysqli_query($link, $sql1);
                    if (mysqli_num_rows($result1) > 0) {
                        
                        while ($row1 = mysqli_fetch_assoc($result1)) {?>
                        <hr>
                            <div class="repy">
                            <div class="cmt_user"><div class="circle2">
                        <h5>

                            <?php
                                $name = $row1['name'];
                                $f_letter = strtoupper($name[0]);
                                echo $f_letter; 
                            ?>
                        </h5>
                    </div>
                    <form action="chat.php" method="POST" class="form">
                        <input type="hidden" name='Touser' value='<?php echo $row1['name']; ?>'>
                        <button class="usr_display" name="user_btn"><h6><?php echo $row1['name']; ?></h6></button>
                        <h4><a value="<?php echo $row1['name']; ?>" href="chat.php"><?php echo $row1['name']; ?></a></h4>
                    </form>
                    </div>
                                <p><?php echo $row1['comment']; ?></p>
                        <p class="created_at_reply"><?php echo $row1['created_at']; ?></p>

                            </div>
                            

                      <?php     
                        }
                    }
               
?>
