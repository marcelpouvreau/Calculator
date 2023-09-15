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

document.addEventListener("keydown", function(event) {
  const key = event.key;
  const validKeys = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "+", "-", "*", "/", "=", "."];

  // Verifica se a tecla pressionada é válida
  if (validKeys.includes(key)) {
    appendToDisplay(key);
  }

  // Verifica se a tecla Enter ou a barra espaciadora foi pressionada
  if (key === "Enter" || key === " ") {
    calculateResult();
  }

  // Verifica se a tecla Backspace foi pressionada
  if (key === "Backspace") {
    clearDisplay();
  }
});

document.addEventListener("keydown", function(event) {
  const key = event.key;

  // Verifica se a tecla "S" foi pressionada para alternar para o modo científico
  if (key === "s" || key === "S") {
    toggleScientific();
  }
});
