<?php
echo "Digite um número: ";

$entrada = trim(fgets(STDIN));
$numero = filter_var($entrada, FILTER_VALIDATE_INT);

if ($numero === false) {
    fwrite(STDERR, "Informe um número inteiro válido.\n");
    exit(1);
}

echo "\nTabuada do {$numero}:\n";

for ($i = 1; $i <= 10; $i++) {
    echo "{$numero} x {$i} = " . ($numero * $i) . PHP_EOL;
}
