<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Score </title>
    <link href="https://fonts.googleapis.com/css2?family=Revalia&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <div class="form">
        <form method="post" action="">
            <div class="form-campo row">
                <?php
                $contador = 0; //para guardar minha quantidade de acertos
                $pontos = 0;  //e os meus pontos obtidos

                $total = count($_SESSION['certa']);    //não tava conseguindo pegar o tamanho do vetor no FOR, 
                // entao tive que guardar dentro de uma variável

                for ($i = 0; $i < $total; $i++) {            //pra validar se minhas respostas marcadas estão corretas
                    if ($_SESSION['opcaoescolhida'][$i] == $_SESSION['certa'][$i]) {
                        $contador++;
                        $pontos = $contador * 10;
                    }
                }
                echo '<div class="col">';
                echo "<br>";      //parte de dados do jogador etc.
                echo "<h4> Player: " . $_SESSION['login'] . "</h4>";
                if (count($_SESSION['vetpergunta']) == 1) {
                    echo "<b> Você acertou " . $contador . " pergunta de um total de " . $total . " questão e obteve " . $pontos . " pontos. </b>";
                } else if (count($_SESSION['vetpergunta']) > 1) {
                    echo "<b> Você acertou " . $contador . " perguntas de um total de " . $total . " questões e obteve " . $pontos . " pontos. </b>";
                }
                echo "<br> <b> Percentual de aproveitamento: " . (($contador / $total) * 100) . "% </b>";

                // aqui começam as minhas validações. para cada desempenho do jogador, dou opções de refazer o quiz ou de criar um novo

                if ($contador == $total) {     //aqui o player foi insano
                    echo "<br><br>";
                    echo "<b> Você foi um máximo, " . $_SESSION['login'] . " ! </br> Quer criar outro quiz? </b> </br></br>";

                    echo "<b> Se sim, </b> <button type='submit' name='recriarQuiz'> Criar outro Quiz </button>";
                } else if ($contador > ($total / 2) && $contador < $total) {     //acertou mais que a metade, mas não tudo
                    echo "<br><br>";
                    echo "<b> Bom desempenho, " . $_SESSION['login'] . " ! </b> </br></br>";
                    echo "</br> <b> Mas poderia ser melhor. Quer tentar novamente? </b>";

                    echo "<button type='submit' name='refazerQuiz'> Refazer Quiz </button>";

                    echo "</br></br> <b> Ou você pode escolher em criar outro quiz: </b>";
                    echo "<button type='submit' name='recriarQuiz'> Criar outro Quiz </button>";
                } else if ($contador == ($total / 2)) {     //acertou exatamente a metade
                    echo "<br><br>";
                    echo "<b> Desempenho mediano, " . $_SESSION['login'] . ". </b> </br>";
                    echo "</br> <b> Mas poderia ser melhor. Quer tentar novamente? </b>";

                    echo "<button type='submit' name='refazerQuiz'> Refazer Quiz </button>";

                    echo "</br></br> <b> Ou você pode escolher em criar outro quiz: </b>";
                    echo "<button type='submit' name='recriarQuiz'> Criar outro Quiz </button>";
                } else if ($contador < ($total / 2)) {      //acertou menos da metade
                    echo "<br><br>";
                    echo "<b> Você teve um desempenho ruim, " . $_SESSION['login'] . ". <br><br> Faça o quiz novamente, vamos melhorar dessa vez! </b>";

                    echo "<button type='submit' name='refazerQuiz'> Refazer Quiz </button>";

                    echo "</br></br> <b> Ou você pode escolher em criar outro quiz: </b>";
                    echo "<button type='submit' name='recriarQuiz'> Criar outro Quiz </button>";
                }
                echo '</div>';

                echo '<div class="col">';
                echo '<img class="image" src="' . $_SESSION['imgEscolhida'] . '" >';
                echo '</div>';


                if (isset($_POST['recriarQuiz'])) {        //criar um novo Quiz
                    unset($_SESSION['opcaoescolhida']);
                    unset($_SESSION['vetpergunta']);
                    unset($_SESSION['vetopcao']);
                    unset($_SESSION['certa']);
                    header('Location: ../admin/admin.php');
                }

                if (isset($_POST['refazerQuiz'])) {      //refazer para obter uma nota melhor
                    unset($_SESSION['opcaoescolhida']);
                    header('Location: quiz.php');
                }

                ?>
            </div>
        </form>
    </div>
</body>

</html>

<head>
    <style>
        body {
            background-image: url("../usuario/imagem/fundologin.png");
        }

        .form {
            width: 700px;
            margin: 0 auto;
            padding: 35px 30px;
            border-radius: 20px;
            box-shadow: 0px 10px 40px #00000056;
            background-color: #B0E0E6;
            justify-content: center;
            margin-top: 70px;
        }

        .image {
            border-radius: 75px;
            margin-top: 35px;
            margin-left: 120px;
            width: 150px;
        }

        h4 {
            margin-top: -30px;
            font-size: 25px;
            font-family: "Revalia";
        }
    </style>
</head>