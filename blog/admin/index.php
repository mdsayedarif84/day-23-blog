    <?php
        session_start();
        if (isset($_SESSION['id'])){
            header('Location:dashboard.php');
        }
        require_once "../vendor/autoload.php";
        $login      =   new \App\classes\Login();
        $msg        ='';
        if (isset($_POST['btn'])){
            $msg    =$login->adminLoginCheck($_POST);
        }
    ?>

    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="utf-8"/>
            <title>Login</title>
            <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
            <link rel="stylesheet" href="../assets/css/bootstrap.css">
            <link rel="stylesheet" href="../assets/css/styleSheet.css">

        </head>
        <body>
        <h1 class="text-danger text-center"><?php echo $msg?></h1>
            <!--login -->
            <form action="" method="POST">
                <div class="container mt-5 mb-5">
                    <div class="row d-flex justify-content-center align-items-center">
                        <div class="col-md-6">
                            <div class="card bg-dark p-3 text-center text-white">
                                <div> <img src="../assets/img/img6.jpg" width="100" style="height: 100px; width: 100px; border-radius:50%;"> </div>
                                <h1 class="text-info">Welcome Login Panel</h1> <span class="text-danger">We always have with u <br> and serve our work !!</span>
                                <div class="p-2 px-5">
                                    <input class="form-control" placeholder="User Email" name="email">
                                    <input class="form-control" placeholder="User Password" name="password">
                                    <select class="form-select mt-3 form-select-lg mb-3" aria-label=".form-select-lg example">
                                        <option selected>Choose your role</option>
                                        <option value="1">Admin</option>
                                        <option value="2">Manager</option>
                                        <option value="3">Sales Person</option>
                                    </select>
                                    <button class="btn btn-danger w-100 signup-button" name="btn">Signup Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!--    logIn end-->

        </body>
    </html>