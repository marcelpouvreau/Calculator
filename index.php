<?php
if (isset($_GET['url'])) {
    $url = $_GET['url'];
    if ($url === 'scientific') {
        // Redirecionar para a calculadora científica
        header("Location: scientific.php");
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
    <title>Web Calculator</title>
</head>
<body>
    <div class="center-content">
        <div class="calculator">
            <h1>Web Calculator</h1>
            <input type="text" id="display" readonly>
            <div class="buttons">
                <!-- Buttons for simple calculator -->
                <?php
                $buttons = ['7', '8', '9', '+', '4', '5', '6', '-', '1', '2', '3', '*', '0'];
                foreach ($buttons as $button) {
                    echo "<button class='number' onclick=\"appendToDisplay('$button')\">$button</button>";
                }
                ?>
                <button class="clear" onclick="clearDisplay()">C</button>
                <button class="equal" onclick="calculateResult()">=</button>
                <button class="operator" onclick="appendToDisplay('/')">/</button>

                <!-- Button to switch to scientific calculator -->
                <button class="toggle-scientific" onclick="toggleScientific()">Scientific</button>
            </div>
        </div>
    </div>
</body>
</html>