<?php
                include('connection.php');
		    ?>
                <table class = "table">
                    <thead>
                        <th>id</th>
                        <th>email</th>
                        <th>FirstName</th>
                        <th>LastName</th>
                    </thead>
                    <tbody>
                        <?php
                            $quser=mysqli_query($conn,"select * from `user`");
                            while($urow=mysqli_fetch_array($quser)){
                                ?>
                                    <tr>
                                        <td><?php echo $urow['id']; ?></td>
                                        <td><?php echo $urow['email']; ?></td>
                                        <td><?php echo $urow['firstname']; ?></td>
                                        <td><?php echo $urow['lastname']; ?></td>
                                    </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>    