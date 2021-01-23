<?php
    if (isset($_POST['zaloguj'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
                   
        if ($username == "admin" && $password == "admin"){
            $_SESSION["zalogowany"] = true;
            $_SESSION["username"] = $username;
            header('Location: index.php?page=main');
       }else{
            ?>
                <div class="container h-100">
                    <div class="d-flex justify-content-center h-100">
                        <div class="user_card">
                            <h3 style="text-align:center;">Wpisano niepoprawne dane..<br>
                            Za kilka sekund nastąpi przekierowanie</h3>
                        </div>
                    </div>
                </div>
            <?php    
                header( "refresh:2;url=index.php?page=login");
            }
        }
?>