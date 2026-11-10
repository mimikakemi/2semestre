<?php
echo "Digite uma frase: ";
$frase = strtolower(trim(fgets(STDIN)));

$total = 0;
$vogais = "aeiou";

for ($i = 0; $i < strlen($frase); $i++) {
    if (strpos($vogais, $frase[$i]) !== false) {
        $total++;
    }
}

echo "A frase tem " . $total . " vogais.\n";