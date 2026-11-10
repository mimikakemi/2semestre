<?php
$camposObrigatorios = [
    "nome" => "Nome",
    "email" => "E-mail",
    "senha" => "Senha"
];

$dados = [];

foreach ($camposObrigatorios as $campo => $nomeCampo) {
    echo "Digite seu " . $nomeCampo . ": ";
    $dados[$campo] = trim(fgets(STDIN));
}

$camposVazios = [];

foreach ($camposObrigatorios as $campo => $nomeCampo) {
    if ($dados[$campo] == "") {
        $camposVazios[] = $nomeCampo;
    }
}

if (count($camposVazios) == 0) {
    echo "Cadastro preenchido com sucesso!\n";
} else {
    echo "Preencha os seguintes campos obrigatórios: ";
    echo implode(", ", $camposVazios) . "\n";
}