<?php
session_start();
echo "<body>";
echo "<h3> ESCOLHA SEU AVATAR </h3>";
$imagens = glob("../admin/Imagens/*");

echo '<div class="avatar">';
for ($i = 0; $i < (count($imagens)); $i++) {
    echo '<a href="index.php?op=' . $i . '"><img src="' . $imagens[$i] . '"> </a>';
}
echo '</div>';

if (isset($_GET["op"])) {
    switch ($_GET["op"]) {
        case '0':
            $_SESSION['imgEscolhida'] = "../admin/Imagens/carameloastronauta.png";
            break;

        case '1':
            $_SESSION['imgEscolhida'] = "../admin/Imagens/caramelobranco.png";
            break;

        case '2':
            $_SESSION['imgEscolhida'] = "../admin/Imagens/caramelomengao.png";
            break;

        case '3':
            $_SESSION['imgEscolhida'] = "../admin/Imagens/caramelounicornio.png";
            break;

        default;
    }

    echo "</body>";
?>

    <body>
        <br><br>
        <div class="form-login">
            <form method="post" action="">
                <div class="row">
                    <div class="col">
                        <label for="login"> Usuário: </label> <br>
                        <input type="text" name="login" required>
                    </div>

                    <div class="col">
                        <label for="senha"> Senha: </label> <br>
                        <input type="password" name="senha" required>
                    </div>
                </div>
                <br>

                <button class="botao" type="submit" name="cadastrar"> Cadastrar </button>

                <input type="hidden" name="escolhida" value="<?php echo $_SESSION['imgEscolhida']; ?>">
            </form>
        </div>
    </body>

<?php
}
if (isset($_POST['cadastrar'])) {
    $_SESSION['login'] = $_POST['login'];
    $_SESSION['senha'] = md5($_POST['senha']);
    header('Location: autenticar.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Cadastrar Usuário </title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Puddles&family=Rubik+Wet+Paint&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/visual.css" media="screen" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        body {
            background-image: url("../usuario/imagem/fundologin.png");
        }

        .form-login {
            width: 520px;
            margin: 0 auto;
            padding: 35px 30px;
            border-radius: 20px;
            box-shadow: 0px 10px 40px #00000056;
            background-color: #B0E0E6;
            margin-left: 488px;
            margin-top: 20px;
        }

        .avatar {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            padding-left: 100px;
            margin-top: 75px;
        }

        .avatar img {
            width: 200px;
            height: 200px;
            border-radius: 100px;
        }

        h3 {
            font-family: "Rubik Wet Paint";
            color: #483D8B;
            text-align: center;
            font-size: 50px !important;
            margin-top: 55px;
        }

        .botao {
            margin-left: 183px;
        }
    </style>
</head>

</html>