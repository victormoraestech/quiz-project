<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Cadastro de perguntas </title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Revalia&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">  
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">   
</head>

<body>
        <header>
                <div class="topo">
                        <img class="image" src="<?php echo $_SESSION['imgEscolhida']; ?>">
                </div>
        </header>
        <div class="form">
                <h4> CADASTRE AS PERGUNTAS DO QUIZ: </h4> <br><br>
                <form method="post" action="">
                        <div class="form-campo row">
                                <div class="col">
                                        <label for="pergunta"> <b> Pergunta: </b> </label>
                                        <input type="text" name="pergunta" required> <br><br>

                                        <label for="opcao1"> <b> Alternativa a: </b> </label>
                                        <input type="text" name="opcao[]" required> <br><br>

                                        <label for="opcao2"> <b> Alternativa b: </b> </label>
                                        <input type="text" name="opcao[]" required> <br><br>

                                        <label for="opcao3"> <b> Alternativa c: </b> </label>
                                        <input type="text" name="opcao[]" required> <br><br>

                                        <label for="opcao4"> <b> Alternativa d: </b> </label>
                                        <input type="text" name="opcao[]" required>
                                </div>

                                <div class="col">
                                        <div class="prabaixo">
                                                <h4 class="qual"><b> Informe qual será a alternativa correta: </b></h4>
                                                <div class="cantoopcao">
                                                        <input type="radio" name="alternativa" id="a" value="a" required>
                                                        <label for="alternativa1"> <b> a &emsp; </b> </label>

                                                        <input type="radio" name="alternativa" id="b" value="b" required>
                                                        <label for="alternativa2"> <b> b </b> </label>
                                                        <br>
                                                        <input type="radio" name="alternativa" id="c" value="c" required>
                                                        <label for="alternativa3"> <b> c &emsp; </b> </label>

                                                        <input type="radio" name="alternativa" id="d" value="d" required>
                                                        <label for="alternativa4"> <b> d </b> </label>
                                                </div>
                                        </div>
                                </div>
                                <br><br>
                        </div>
                        <div class="text-center">
                                <button type="submit" name="cadastrar"> Cadastrar pergunta </button>
                                <br><br>
                </form>
                <form method="post" action="">
                        <button type="submit" name="limpar"> Limpar perguntas </button>
        </div>
        </form>
        </div>
</body>

</html>

<?php
if (isset($_POST['cadastrar'])) {
        $_SESSION['vetpergunta'][] = $_POST['pergunta'];
        $_SESSION['vetopcao'][] = $_POST['opcao'];
        $_SESSION['certa'][] = $_POST['alternativa'];

        echo "<div class='abotao'>";
        echo '<a href="http://localhost/web2/II unidade/SESSION/quiz-project/quiz/quiz.php"> IR PARA O QUIZ </a>';
        echo "</div>";
}

if (isset($_POST['limpar'])) {
        unset($_SESSION['certa']);
        unset($_SESSION['vetpergunta']);
        unset($_SESSION['vetopcao']);
}

?>

<head>
 <style> 
                body {
                        background-image: url("../usuario/imagem/fundologin.png");
                }

                .topo {
                        justify-content: flex-end;
                }

                .image {
                        float: right;
                        margin-top: -40px;
                        margin-right: 55px;
                        border-radius: 41px;
                        width: 83px;
                }

                .form {
                        width: 900px;
                        margin: 0 auto;
                        padding: 35px 30px;
                        border-radius: 20px;
                        box-shadow: 0px 10px 40px #00000056;
                        background-color: #B0E0E6;
                        justify-content: center;
                        margin-top: 70px;
                }

                .text-center {
                        margin-top: 40px;
                }

                b {
                        font-family: "Revalia";
                }

                h4 {
                        font-family: "Revalia";
                        text-align: center;
                        font-size: 25px;
                }

                h4.qual {
                        font-size: 20px;
                        font-family: "Revalia";
                }

                .abotao {
                        text-align: center;
                        margin-top: 20px;
                }

                a {
                        font-family: "Revalia";
                        color: #191970;
                        text-decoration: none;
                        font-size: 20px;
                }

                .cantoopcao {
                        margin-left: 167px;
                }

                .prabaixo {
                        margin-top: 40px;
                }
        </style>
</head>