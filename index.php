<?php
require_once __DIR__ . "/AuthController.php";
require_once __DIR__ . "/functions.php";

if (isset($_SESSION['qz_admin'])) {
    echo "<script>document.location='/quizPancasila/dashboard/index.php'</script>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= $init->base_url('assets/css/bootstrap.min.css') ?>">
    <title>Login</title>
</head>

<body>

    <div class="container">
        <div class="row">

            <div class="col-12 col-lg-12 mt-5 text-center">
                <form action="" method="post">
                    <div class="card">
                        <div class="col-12 col-lg-12 mt-3 text-center">
                            <h2>Login</h2>
                        </div>
                        <div class="card-body ">
                            <div class="col-12 col-lg-12 mr-auto">
                                <div class="form-group">
                                    <input type="text" name="username" class="form-control text-center " placeholder="Username.." autocomplete="off">
                                </div>
                            </div>
                            <div class="col-12 col-lg-12 text-center">
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control text-center" placeholder="Password..">
                                </div>
                            </div>
                            <div class="col-12 col-lg-12">

                                <div class="form-group">
                                    <button type="submit" name="submit" class="btn btn-primary">Login</button>
                                </div>
                            </div>
                        </div>

                    </div>
            </div>
        </div>
        </form>
    </div>
    </div>
    <script src="<?= $init->base_url('assets/js/jquery.min.js') ?>"></script>
    <script src="<?= $init->base_url('assets/js/popper.min.js') ?>"></script>
    <script src="<?= $init->base_url('assets/js/bootstrap.min.js') ?>"></script>
</body>

</html>
<?php
if (isset($_POST['submit'])) {
    echo $data = ($auth->login($_POST) > 0) ? '' : '';
}
?>