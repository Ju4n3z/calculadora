<?php
    
    $num1 = floatval($_POST['numero1']);
    $num2 = floatval($_POST['numero2']);
    $operacion = $_POST['operacion'];

    switch ($operacion) {
        case 'suma':
            $resultado = $num1 + $num2;
            break;
        case 'resta':
            $resultado = $num1 - $num2;
            break;
        case 'multiplicacion':
            $resultado = $num1 * $num2;
            break;
        case 'division':
            if ($num2 == 0) {
                $resultado = "No se puede dividir por 0";
                break;
            } else {
                $resultado = $num1 / $num2;
                break;
            }
        default:
            $resultado = 0;
            break;
    }

    $resultado = number_format($resultado, 2, '.', '');

    echo <<<HTML
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <div class="container text-center align-items-center">
        <h1>Resultado:</h1>
        <div class="row">
            <div class="col">
                
            </div>
            <div class="col">
                <p>$resultado</p>
                <a href='index.html'><button class="btn btn-primary">Volver</button></a>
            </div>
            <div class="col">
            
            </div>
        </div>
        </div>
    HTML;
?>