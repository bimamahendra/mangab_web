<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/fontawesome.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body style="background-color: #005792">
    <div class="text-center py-0" style="transform: translateY(10%);">
        <div class="container">
            <div class="row" style="margin-bottom: 20px;">
                <div class="col-md-12">
                    <img class="d-block img-fluid mx-auto" src="<?= base_url('assets/images/icon_scan.png') ?>" width="150">
                </div>
            </div>
            <div class="row">
                <div class="mx-auto col-10 bg-white col-md-4 p-3">
                    <h1 class="mb-1">MaNgab</h1>
                    <p>Mahasiswa Ngabsen</p>
                    <?php if ($this->session->flashdata('error_login')){ ?>
                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <p class="mb-0"><?= $this->session->flashdata('error_login') ?></p>
                    </div>
                    <?php } ?>
                    <form action="<?php echo site_url('Login') ?>" method="post">
                        <div class="form-group"> 
                            <input type="text" name="username" class="form-control" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-block" style="background-color: #005792; color:white">LOGIN</button>
                    </form>
                    <p class="pt-3">All Rights Reserved © Takcoding 2019</p>
                </div>
            </div>
        </div>
    </div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>