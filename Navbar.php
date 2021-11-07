
    <?php 
        session_start();
        include "connection.php";

        if(isset($_SESSION['isAuth'])){ 
                echo '
                    <nav class="navbar navbar-expand-lg navbar-light bg-light p-3">
                        <a class="navbar-brand" href="index.php">Students Space</a>
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                            <div class="navbar-nav">
                                <a class="nav-item nav-link" href="./StudentArea/index.php">Student Area</a>
                                <a class="nav-item nav-link" href="#">about</a>

                            </div>
                        </div>
                        <form action="logout.php" method="post">
                            <button class="btn btn-outline-danger" type="submit"> Log Out</button>
                        </form>
                    </nav> ';
            
        }else{
            echo '
            <nav class="navbar navbar-expand-lg navbar-light bg-light p-3">
                <a class="navbar-brand" href="index.php">Students Space</a>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-item nav-link" href="#">about</a>
                    </div>
                    
                    
                </div>
                <div class="nav " id="nav-tab" role="tablist">
                    <a class="btn btn-outline" href="./LoginPage.php">Login</a>
                    <a class="btn btn-outline" href="./RegisterPage.php">Register</a>
                </div>
                   
            </nav>';
        }
    ?>

