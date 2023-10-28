<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Quiz </title>

    <link href="https://fonts.googleapis.com/css2?family=Revalia&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <header>
        <div class="topo">
            <img class="image" src="<?php echo $_SESSION['imgEscolhida']; ?>">
        </div>
    </header>
    <div class="form">
        <form method="post" action="">
            <div class="perguntas">
                <?php
                $cont = 1;
                $value = array("a", "b", "c", "d"); //criei um vetor para guardar o value da minha opção, 
                //descobri que o que estava sendo validado era o value

                for ($i = 0; $i < (count($_SESSION['vetpergunta'])); $i++) {       //imprimir as perguntas
                    echo "<br> <h4>" . $_SESSION['vetpergunta'][$i] . "</h4>";

                    for ($a = (($i * 4)); $a < (($cont * 4)); $a++) {         //imprimir as respostas de cada pergunta

                        echo '<input type="radio" name="opcaoquiz' . $i . '" id="' . $i . '" value="' . $value[$a % count($value)] . '" required>';
                        echo '<label class="resp" for="opcaoquiz"' . $i . ' >' . $_SESSION['vetopcao'][$i][$a % 4] . '</label> </br>';

                        //aq trabalhei com matriz para poder imprimir cada vetor das respostas de acordo com cada posição do vetor das perguntas
                    }
                    $cont++;
                }

                for ($i = 0; $i < (count($_SESSION['vetpergunta'])); $i++) {
                    if (isset($_POST['opcaoquiz' . $i])) {
                        $_SESSION['opcaoescolhida'][] = $_POST['opcaoquiz' . $i];
                    }
                }

                ?>
                <br><br><br>
                <button type="submit" name="finalizar"> Finalizar Quiz </button>
            </div>
        </form>
    </div>
    <?php
    if (isset($_POST['finalizar'])) {
        header('Location: score.php');
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
                width: 450px;
                margin: 0 auto;
                padding: 35px 30px;
                border-radius: 20px;
                box-shadow: 0px 10px 40px #00000056;
                background-color: #B0E0E6;
                justify-content: center;
                margin-top: 70px;
            }

            .perguntas {
                text-align: center;
            }

            h4 {
                font-size: 15px;
                font-family: "Revalia";
            }

            .resp {
                font-size: 13px;
                font-family: "Revalia";
            }
        </style>
    </head>