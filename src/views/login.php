<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equivalent="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/comum.css">
        <link rel="stylesheet" href="assets/css/icofont.min.css">
        <link rel="stylesheet" href="assets/css/login.css">
        <title> In 'n Out </title>
    </head>
    <body>
        <form class="form-login" action="#" method="POST">
            <div class="login-card card">
                <div class="card-header">
                    <i class="icofont-travelling mr-2"></i>
                    <span class="font-weight-light"> In </span>
                    <span class="font-weight-bold mx-2"> N' </span>
                    <span class="font-weight-light"> Out </span>
                    <i class="icofont-runner-alt-1 ml-2"></i>
                </div>
                <div class="card-body">
                    <?php include(TEMPLATE_PATH . '/messages.php') ?>
                    <div class="form-group">
                        <label class="lbl-email"> Email </label>
                        <input type="email" id="email" name="email" 
                                class="form-control <?= $errors['email'] ? 'is-invalid' : '' ?>"
                                value="<?= $email ?>"
                                placeholder="Informe o E-mail" autofocus>
                        <div class="invalid-feedback ">
                            <?= $errors['email'] ?>
                        </div>
                    </div>  
                    <div class="form-group">
                        <label class="lbl-password"> Senha </label>
                        <input type="password" id="password" name="password" 
                                class="form-control <?= $errors['password'] ? 'is-invalid' : '' ?>"
                                placeholder="Informe a senha">
                        <div class="invalid-feedback">
                            <?= $errors['password'] ?>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                        <button class="btn btn-lg btn-primary"> Entrar </button>
                </div>
            </div>
        </form>
        <?= $text ?>
    </body>
</html>