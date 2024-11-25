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
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <style>
            body{
                background-image: url('https://static-cse.canva.com/blob/1371459/productivityfeaturedimage.5d2e087c.avif');
                background-repeat: no-repeat;
                background-size: cover;
            }
        </style>
    </head>
    <body class="bg-secondary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Masuk</h3></div>
                                    <div class="card-body">
                                        <form method="post" action="ceklogin.php">
                                            <div class="mb-3">
                                                <label for="inputEmail" class="form-label">Alamat Email</label>
                                                <input type="email" class="form-control" name="email" id="inputEmail" placeholder="name@example.com" require>
                                            </div>
                                            <div class="mb-3">
                                                <label for="inputPassword" class="from-label">Kata Sandi</label>
                                                <input class="form-control" name="password" id="inputPassword" type="password" placeholder="Kata Sandi" /> 
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button type="submit" class="btn btn-primary" name="login">Masuk</a>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="register.php">Yuk Buat Akun!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>