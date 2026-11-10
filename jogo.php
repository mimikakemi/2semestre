<?php
$numeroSecreto = rand(1, 100);
$tentativa = 0;

echo "Tente adivinhar o número de 1 a 100!\n";

do {
    echo "Digite seu palpite: ";
    $entrada = trim(fgets(STDIN));

    if (filter_var($entrada, FILTER_VALIDATE_INT) === false) {
        echo "Digite um número inteiro válido.\n";
        $tentativa = 0;
        continue;
    }

    $tentativa = (int) $entrada;

    if ($tentativa < $numeroSecreto) {
        echo "Muito baixo! Tente novamente.\n";
    } elseif ($tentativa > $numeroSecreto) {
        echo "Muito alto! Tente novamente.\n";
    }
} while ($tentativa !== $numeroSecreto);

echo "Parabéns! Você acertou!\n";