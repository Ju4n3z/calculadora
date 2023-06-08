<?php
    session_start();
    if (isset($_POST['numero'])) {
        if($_POST['numero'] == "c"){
            $_SESSION['num1'] = null;
        }else if($_POST['numero'] == "←"){
            $_SESSION['num1'] = substr($_SESSION['num1'],0, -1);
        }else if($_POST['numero'] == "+"){
            $_SESSION['num1'] .= ' ';
            $_SESSION['num1'] .= $_POST['numero'];
            $_SESSION['num1'] .= ' ';
        }else if($_POST['numero'] == "-"){
            $_SESSION['num1'] .= ' ';
            $_SESSION['num1'] .= $_POST['numero'];
            $_SESSION['num1'] .= ' ';
        }else if($_POST['numero'] == "*"){
            $_SESSION['num1'] .= ' ';
            $_SESSION['num1'] .= $_POST['numero'];
            $_SESSION['num1'] .= ' ';
        }else if($_POST['numero'] == "/"){
            $_SESSION['num1'] .= ' ';
            $_SESSION['num1'] .= $_POST['numero'];
            $_SESSION['num1'] .= ' ';
        }else if($_POST['numero'] == "N"){
            $_SESSION['num1'] = "-";
        }else if($_POST['numero'] == "="){
            $resultado = explode(" ", $_SESSION['num1']);
            while ($resultado[count($resultado)-1] == ""){
                array_splice($resultado, count($resultado)-1, 1);
                array_splice($resultado, count($resultado)-1, 1);
            }
            while ($resultado[0] == ""){
                array_splice($resultado, 0, 1);
                array_splice($resultado, 0, 1);
            }
            for ($i = 0; $i < count($resultado); $i++) {
                if ($resultado[$i] == "*") {
                    $resultado[$i] = $resultado[$i-1] * $resultado[$i+1];
                    array_splice($resultado, $i-1, 1);
                    array_splice($resultado, $i, 1);
                }else if ($resultado[$i] == "/") {
                    if ($resultado[$i+1] == 0) {
                        $resultado = ["Error"];
                    } else {
                        $resultado[$i] = $resultado[$i-1] / $resultado[$i+1];
                        array_splice($resultado, $i-1, 1);
                        array_splice($resultado, $i, 1);
                    }
                };
            }
            while (count($resultado) > 1) {
                for ($i = 0; $i < count($resultado); $i++) {
                    if ($resultado[$i] == "+") {
                        $resultado[$i] = $resultado[$i-1] + $resultado[$i+1];
                        array_splice($resultado, $i-1, 1);
                        array_splice($resultado, $i, 1);
                    }else if ($resultado[$i] == "-") {
                        $resultado[$i] = $resultado[$i-1] - $resultado[$i+1];
                        array_splice($resultado, $i-1, 1);
                        array_splice($resultado, $i, 1);
                    };
                }
            }
            $_SESSION['num1'] = $resultado[0];
        }else{
            if (isset($_SESSION['num1'])) {
                $_SESSION['num1'] .= $_POST['numero'];
            } else {
                $_SESSION['num1'] = $_POST['numero'];
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="sp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Document</title>
    <style>
        html {
        font-size: 62.5%;
        box-sizing: border-box;
        }

        *,
        *::before,
        *::after {
        margin: 5px;
        padding: 0;
        box-sizing: inherit;
        }

        .calculator {
        border: 1px solid #ccc;
        border-radius: 5px;
        width: 400px;
        }

        .calculator-screen {
        width: 100%;
        height: 80px;
        border: none;
        background-color: #252525;
        color: #fff;
        text-align: right;
        padding-right: 20px;
        padding-left: 10px;
        font-size: 3rem;
        }

        button {
        height: 60px;
        font-size: 2rem!important;
        }

        .equal-sign {
        height: 125%;
        grid-area: 2 / 4 / 6 / 5;
        }

        .calculator-keys {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        grid-gap: 20px;
        padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container text-center">
        <h1>Calculadora Sencilla</h3>
        <form class="container text-center calculator card" method="POST">

            <input type="text" class="calculator-screen z-depth-1" name="resultado" value="<?php echo isset($_SESSION['num1']) ? $_SESSION['num1'] :0;?>">

        <div class="calculator-keys">

            <button type="submit" class="operator btn btn-info" name="numero" value="+">+</button>
            <button type="submit" class="operator btn btn-info" name="numero" value="-">-</button>
            <button type="submit" class="operator btn btn-info" name="numero" value="*">*</button>
            <button type="submit" class="operator btn btn-info" name="numero" value="/">/</button>

            <button type="submit" class="btn btn-light waves-effect" name="numero" value="7">7</button>
            <button type="submit" class="btn btn-light waves-effect" name="numero" value="8">8</button>
            <button type="submit" class="btn btn-light waves-effect" name="numero" value="9">9</button>


            <button type="submit" class="btn btn-light waves-effect" name="numero" value="4">4</button>
            <button type="submit" class="btn btn-light waves-effect" name="numero" value="5">5</button>
            <button type="submit" class="btn btn-light waves-effect" name="numero" value="6">6</button>


            <button type="submit" class="btn btn-light waves-effect" name="numero" value="1">1</button>
            <button type="submit" class="btn btn-light waves-effect" name="numero" value="2">2</button>
            <button type="submit" class="btn btn-light waves-effect" name="numero" value="3">3</button>


            <button type="submit" class="btn btn-light waves-effect" name="numero" value="0">0</button>
            <button type="submit" class="btn btn-secondary" name="numero" value=".">.</button>
            <button type="submit" class="btn btn-secondary" name="numero" value="N">N</button>

            <button type="submit" class="btn btn-danger btn-sm" name="numero" value="c">C</button>
            <button type="submit" class="btn btn-danger btn-sm" name="numero" value="←">←</button>

            <button type="submit" class="equal-sign btn btn-warning" name="numero" value="=">=</button>

        </form>
</div>
</body>
</html>