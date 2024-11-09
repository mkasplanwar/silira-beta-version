<?php
require 'function.php';


if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password  = $_POST['password'];

    //cocokin dengan database, cari atau engga ada
    $cekdatabase = mysqli_query($conn, "SELECT *  FROM workshop where username='$username' and password='$password'");
    //hitung jumlah data
    $hitung = mysqli_num_rows($cekdatabase);

    if($hitung>0){
        $_SESSION['log'] = 'True';
        header('location:index.php');
    } else {
        echo "<script>alert('username atau password Anda salah. Silahkan coba lagi!')</script>";
    };
}

if(!isset($_SESSION['log'])){

} else {
    header('location:index.php');
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
     <body class="bg-light"></body>
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4"><strong>Login Admin</strong></h3>
                                    <center><h6>PLTMG Muara Teweh</h6></center></div>
                                    <div class="card-body">
                                        <form method="post">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputusername">Username</label>
                                                <input class="form-control py-4" name="username" id="inputusername" type="username" placeholder="Enter username" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control py-4" name="password" id="inputPassword" type="password" placeholder="Enter password" />
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button class="btn btn-danger" name="login"><strong>Login</strong></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <br>
                            <center><a href="../login.php"><button class="btn btn-primary">Login Sebagai User</button></a></center>
                </main>
        </div>
            <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
                 © 2023 Copyright By Admin
            </div>
             <!-- Copyright -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>

</html>
