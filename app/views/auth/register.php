<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link rel="icon" type="image/png" href="<?= base_url(); ?>public/img/favicon.ico" />
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="<?= base_url(); ?>public/css/main.css" rel="stylesheet">
    <link href="<?= base_url(); ?>public/css/style.css" rel="stylesheet">
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <style>
        /* General Styling */
        body {
            font-family: Nunito, sans-serif;
            background-color: #f7f9fc;
            margin: 0;
            padding: 0;
        }

        /* App Container */
        #app {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        #sidebar {
            width: 300px;
            background-color: #fff;
            color: #333;
            border-right: 1px solid #ddd;
            padding: 20px 10px;
            position: fixed;
            top: 0;
            bottom: 0;
        }

        #sidebar .logo {
            text-align: center;
            margin-bottom: 50px;
        }

        #sidebar .logo img {
            max-width: 200px;
        }

        #sidebar ul {
            list-style: none;
            padding: 0;
        }

        #sidebar ul li {
            margin: 15px 0;
        }

        #sidebar ul li a {
            display: flex;
            align-items: center;
            color: #333;
            text-decoration: none;
            padding: 10px;
            border-radius: 5px;
            font-size: 18px;
            transition: background-color 0.3s, color 0.3s;
        }

        #sidebar ul li a:hover {
            background-color: #242582;
            color: #fff;
        }

        /* Main Content */
        main {
            flex-grow: 1;
            /* Sidebar width */
            padding: 40px 20px;
            background-color: #f9fafb;
            display: flex;
            justify-content: center;
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
            font-size: 16px;
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
            background-color: #1E90FF;
        }

        .invalid-feedback {
            color: #e74c3c;
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
    <?php include APP_DIR . 'views/templates/nav_auth.php'; ?>
    <div id="app">
        <!-- Main Content -->
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header text-center">Register</div>
                            <div class="card-body">
                                <?php flash_alert(); ?>
                                <form id="regForm" method="POST" action="<?= site_url('auth/register'); ?>">
                                    <?php csrf_field(); ?>
                                    <div class="row mb-3 d-flex align-items-center justify-content-center">
                                        <div class="col-md-8">
                                            <input id="username" type="text" class="form-control" name="username" placeholder="Name" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3 d-flex align-items-center justify-content-center">
                                        <div class="col-md-8">
                                            <input id="email" type="email" class="form-control" name="email" value="" placeholder="Email" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3 d-flex align-items-center justify-content-center">
                                        <div class="col-md-8">
                                            <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3 d-flex align-items-center justify-content-center">
                                        <div class="col-md-8">
                                            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3 d-flex align-items-center justify-content-center">
                                        <div class="col-md-8">
                                            <button type="submit" class="btn btn-primary w-100">
                                                Register
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
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
    <script>
        $(function() {
            var regForm = $("#regForm")
            if (regForm.length) {
                regForm.validate({
                    rules: {
                        email: {
                            required: true,
                        },
                        password: {
                            required: true,
                            minlength: 8
                        },
                        password_confirmation: {
                            required: true,
                            minlength: 8
                        },
                        username: {
                            required: true,
                            minlength: 5,
                            maxlength: 20
                        }
                    },
                    messages: {
                        email: {
                            required: "Please input your email address.",
                        },
                        password: {
                            required: "Please input your password",
                            minlength: jQuery.validator.format("Password must be at least {0} characters.")
                        },
                        password_confirmation: {
                            required: "Please input your password",
                            minlength: jQuery.validator.format("Password must be at least {0} characters.")
                        },
                        username: {
                            required: "Please input your username.",
                        }
                    },
                })
            }
        })
    </script>
</body>

</html>