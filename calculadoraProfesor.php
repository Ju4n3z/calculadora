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
        }else if($_POST['numero'] == "="){
            $resultado = explode(" ", $_SESSION['num1']);
            for ($i = 0; $i < count($resultado); $i++) {
                if ($resultado[$i] == "*") {
                    $resultado[$i] = $resultado[$i-1] * $resultado[$i+1];
                    array_splice($resultado, $i-1, 1);
                    array_splice($resultado, $i, 1);
                }else if ($resultado[$i] == "/") {
                    if ($resultado[$i+1] == 0) {
                        echo "No se puede dividir entre 0";
                        exit();
                        echo "<a href='calculadoraProfesor.php'>Volver</a>";
                    }
                    $resultado[$i] = $resultado[$i-1] / $resultado[$i+1];
                    array_splice($resultado, $i-1, 1);
                    array_splice($resultado, $i, 1);
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
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <input type="text" name="resultado" value="<?php echo isset($_SESSION['num1']) ? $_SESSION['num1'] :0;?>">
        <button type="submit" name="numero" value="1">1</button>
        <button type="submit" name="numero" value="2">2</button>
        <button type="submit" name="numero" value="3">3</button>
        <button type="submit" name="numero" value="4">4</button>
        <button type="submit" name="numero" value="5">5</button>
        <button type="submit" name="numero" value="6">6</button>
        <button type="submit" name="numero" value="7">7</button>
        <button type="submit" name="numero" value="8">8</button>
        <button type="submit" name="numero" value="9">9</button>
        <button type="submit" name="numero" value="0">0</button>
        <button type="submit" name="numero" value="+">+</button>
        <button type="submit" name="numero" value="-">-</button>
        <button type="submit" name="numero" value="*">*</button>
        <button type="submit" name="numero" value="/">/</button>
        <button type="submit" name="numero" value="c">c</button>
        <button type="submit" name="numero" value="←">←</button>
        <button type="submit" name="numero" value="=">=</button>
    </form>
</body>
</html>