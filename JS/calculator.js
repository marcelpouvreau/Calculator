let display = document.getElementById("display");
let currentInput = "";

function appendToDisplay(value) {
  currentInput += value;
  display.value = currentInput;
}

function clearDisplay() {
  currentInput = "";
  display.value = "";
}

function calculateResult() {
  try {
    currentInput = eval(currentInput);
    display.value = currentInput;
  } catch (error) {
    display.value = "Error";
    currentInput = "";
  }
}

function toggleScientific() {
  if (window.location.pathname.endsWith("scientific.php")) {
    // Se estiver na página scientific.php, redirecione para index.php
    window.location.href = 'index.php';
  } else {
    // Caso contrário, redirecione para scientific.php
    window.location.href = 'scientific.php';
  }
}