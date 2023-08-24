<?php
        // Tampilkan pesan error jika ada
        session_start();
        if (isset($_SESSION['error'])) {
            echo "<script>alert('".$_SESSION['error']."')</script>";
            unset($_SESSION['error']);
        }else if(isset($_SESSION['username'])){
            header('Location: index.php');
        }
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/admin.css">
    <title>Document</title>
</head>

<body>

    <div class="container" id="container">
        <div class="row">
        
        </div>
        <div class="form-container sign-up-container">
            <form action="#">
                <h1>Uhm, You dont have any permission here.</h1>
                <p>Contact me on Linked In <a href="https://www.linkedin.com/in/rakaesh">Here</a> </p>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="backend/action_login.php" method="post" enctype="multipart/form-data">
                <h1>Sign in</h1>
                <input type="username" placeholder="Username" name="username" />
                <input type="password" placeholder="Password" name="password" />
                <button type="submit" name="submit_login">Sign In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>OOPS! You don't have any permission here</h1>
                    <p>Please touch Raka first if you want to try an admin account..</p>
                    <button class="ghost" id="signIn">Back to Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hi! Is it you, Raka?</h1>
                    <p>You already have an account, so come up and sign in !</p>
                    <button class="ghost" id="signUp">What's Up ?</button>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>
            Created by
            <a target="_blank" href="https://linkedin.com/in/rakaesh">Raka Putra Eshardiansyah</a>
        </p>
    </footer>

    <script>
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');

        signUpButton.addEventListener('click', () => {
            container.classList.add("right-panel-active");
        });

        signInButton.addEventListener('click', () => {
            container.classList.remove("right-panel-active");
        });
    </script>
</body>


</html>