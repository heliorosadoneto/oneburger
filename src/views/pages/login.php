<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= $base ?>/assets/css/styleLogin.css">
    <title>Delicias - login</title>
</head>

<body>
    <div class="container_login">

        <form action="<?= $base ?>/login" method="post">
            <div class="Logo_login">
            </div>
            <input placeholder="E-mail" type="email" name="email">
            <input placeholder="Senha" type="password" name="senha">
            <input type="submit" value="Singnin">
        </form>
    </div>
</body>

</html>