<?php
session_start();
echo "<body>";
echo "<h3> Usuário cadastrado! Faça Login. <br> </h3>";

echo "</body>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Autenticando </title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Puddles&family=Rubik+Wet+Paint&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/visual.css" media="screen" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <div class="form">
        <form method="post" action="">

            <div class="form-campo row">
                <div class="col">
                    <img class="image" src="<?php echo $_SESSION['imgEscolhida']; ?>">
                </div>

                <div class="col">
                    <label for="login"> Usuário: </label> <br>
                    <input type="text" name="login2">
                    <br><br>
                    <label for="senha"> Senha: </label> <br>
                    <input type="password" name="senha2"> <br><br>
                </div>
            </div>
            <div class="text-center">
                <button class="botao" type="submit" name="enviar2"> Confirmar </button>
            </div>
        </form>
    </div>
</body>

</html>

<?php
if (isset($_POST['enviar2'])) {
    $login2 = $_POST['login2'];
    $senha2 = md5($_POST['senha2']);

    if ($login2 == $_SESSION['login'] && $senha2 == $_SESSION['senha']) {
        header('Location: ../admin/admin.php');
    } else {
        echo "<br><br> <h4> Usuário ou senha estão incorretos. </h4>";
    }
}
?>

<head>
    <style>
        body {
            background-image: url("../usuario/imagem/fundologin.png");
        }

        h3 {
            font-family: "Rubik Wet Paint";
            color: #191970;
            text-align: center;
            font-size: 33px !important;
            margin-top: 40px;
        }

        .form {
            width: 550px;
            margin: 0 auto;
            padding: 35px 30px;
            border-radius: 20px;
            box-shadow: 0px 10px 40px #00000056;
            background-color: #B0E0E6;
            margin-left: 480px;
            margin-top: 70px;
        }

        .image {
            border-radius: 62px;
            margin-top: 22px;
            margin-left: 40px;
            width: 125px;
        }
    </style>
</head>