<?php
require_once 'scientific_functions.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $expression = $_POST["expression"];
  $result = evaluateScientificExpression($expression);
  echo json_encode(["result" => $result]);
  exit;
}

if (isset($_GET['url'])) {
  $url = $_GET['url'];
  if ($url === 'simple') {
    // Redirecionar de volta para a calculadora simples
    header("Location: index.php");
    exit;
  } else {
    // Tratamento de erro para URLs desconhecidas
    http_response_code(404);
    echo "404 - Page not found";
    exit;
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <script src="js/calculator.js" defer></script>
  <title>Scientific Calculator</title>
</head>

<body>
    <div class="center-content">
      <div class="calculator">
        <h1>Scientific Calculator</h1>
        <input type="text" id="display" readonly>
        <div class="buttons">
          <?php
          // Define um array associativo com os botões e seus valores
          $buttons = [
            '7' => 'number', '8' => 'number', '9' => 'number',
            '4' => 'number', '5' => 'number', '6' => 'number',
            '1' => 'number', '2' => 'number', '3' => 'number',
            '0' => 'number',
            '+' => 'operator right-align', '-' => 'operator right-align',
            '*' => 'operator right-align', '/' => 'operator right-align',
            '^' => 'operator right-align', '%' => 'operator right-align',
            'sin(' => 'function', 'cos(' => 'function',
            'tan(' => 'function', 'log(' => 'function',
            'ln(' => 'function', 'sqrt(' => 'function',
            'pi' => 'function'
          ];

          // Loop para gerar os botões dinamicamente
          foreach ($buttons as $key => $class) {
            echo "<button class='$class' onclick=\"appendToDisplay('$key')\">$key</button>";
          }
          ?>
          <button class="clear" onclick="clearDisplay()">C</button>
          <button class="equal" onclick="calculateResult()">=</button>

          <!-- Botão para voltar à calculadora simples -->
          <button class="toggle-scientific" onclick="toggleScientific()">Simple</button>
        </div>
      </div>
    </div>
</body>

</html>