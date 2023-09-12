<?php

function evaluateScientificExpression($expression) {
    // Remove any potentially dangerous characters from the expression.
    $expression = preg_replace('/[^0-9+\-.*\/()%^sinctanloglnπ]+/', '', $expression);

    // Validate expression for security here, if needed.

    // Evaluate the expression.
    try {
        // Replace common scientific functions with their PHP equivalents.
        $expression = str_replace('sin', 'sin', $expression);
        $expression = str_replace('cos', 'cos', $expression);
        $expression = str_replace('tan', 'tan', $expression);
        $expression = str_replace('log', 'log', $expression);
        $expression = str_replace('ln', 'log', $expression); // ln is equivalent to log base e.
        $expression = str_replace('π', 'pi()', $expression);
        $expression = str_replace('^', '**', $expression); // Convert ^ to ** for exponentiation.

        // Evaluate the expression using eval.
        $result = eval("return $expression;");
        return $result;
    } catch (Throwable $e) {
        return "Error";
    }
}
?>