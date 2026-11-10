<?php
$soma = 0;
$quantidade = 0;

echo "Digite as 4 notas dos alunos.\n";

while ($quantidade < 4) {
    echo "Nota " . ($quantidade + 1) . ": ";
    $entrada = trim(fgets(STDIN));
    $nota = is_numeric($entrada) ? (float) $entrada : null;

    if ($nota === null) {
        echo "Digite uma nota válida.\n";
    } else {
        $soma += $nota;
        $quantidade++;
    }
}

$media = $soma / 4;
echo "A média dos alunos é: " . number_format($media, 2, ",", ".") . "\n";