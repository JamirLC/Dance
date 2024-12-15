<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reset Password</title>
    <link rel="icon" type="image/png" href="<?=base_url();?>public/img/favicon.ico"/>
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="<?=base_url();?>public/css/main.css" rel="stylesheet">
    <style>
        body {
            font-family: Nunito, sans-serif;
            background-color: #f7f9fc;
            margin: 0;
            padding: 0;
        }

        main {
            padding: 40px 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f9fafb;
        }

        .card {
            width: 100%;
            max-width: 500px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #f64c72;
            color: #fff;
            font-weight: bold;
            font-size: 1.2rem;
            padding: 15px;
            border-radius: 8px 8px 0 0;
        }

        .card-body {
            padding: 30px;
        }

        .form-control {
            border-radius: 5px;
            border: 1px solid #ddd;
            padding: 10px;
        }

        .btn-primary {
            background-color: #242582;
            color: #fff;
            border-radius: 5px;
            padding: 10px 15px;
            border: none;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #1e90ff;
        }

        .invalid-feedback {
            color: #e74c3c;
        }

        .valid-feedback {
            color: #2d6a4f;
        }

        .row.mb-0 {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .row.mb-0 a {
            color: #242582;
            font-size: 14px;
        }

        .row.mb-0 a:hover {
            color: #1e90ff;
        }
    </style>
</head>
<body>
    <?php include APP_DIR.'views/templates/nav_auth.php'; ?>
    
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Reset Password</div>
                        <div class="card-body">
                            <form method="POST" action="<?=site_url('auth/password-reset');?>">
                                <?php csrf_field(); ?>
                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-form-label text-md-end">Email Address</label>
                                    <div class="col-md-6">
                                        <?php $LAVA =& lava_instance(); ?>
                                        <input id="email" type="email" class="form-control <?=$LAVA->session->flashdata('alert');?>" name="email" required>
                                        <span class="invalid-feedback" role="alert">
                                            <strong>We can't find a user with that email address.</strong>
                                        </span>
                                        <span class="valid-feedback" role="alert">
                                            <strong>Reset password link was sent to your email.</strong>
                                        </span>
                                    </div>
                                </div>
                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Send Password Reset Link
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
