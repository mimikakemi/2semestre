<?php
$arquivo = $argv[1] ?? __DIR__ . "/produtos.csv";

if (!is_file($arquivo)) {
    fwrite(STDERR, "Arquivo não encontrado: " . $arquivo . "\n");
    fwrite(STDERR, "Use: php processador.php [arquivo.csv]\n");
    exit(1);
}

$linhas = file($arquivo, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

if ($linhas === false || count($linhas) === 0) {
    fwrite(STDERR, "O arquivo CSV está vazio ou não pode ser lido.\n");
    exit(1);
}

$separador = strpos($linhas[0], ";") !== false ? ";" : ",";
$somaPrecos = 0;
$maiorPreco = null;
$menorPreco = null;
$quantidade = 0;

foreach ($linhas as $indice => $linha) {
    $dados = str_getcsv($linha, $separador);

    if (count($dados) < 2) {
        fwrite(STDERR, "Linha " . ($indice + 1) . " ignorada: faltam dados.\n");
        continue;
    }

    $produto = trim($dados[0]);
    $textoPreco = trim($dados[1]);

    if ($indice === 0) {
        $cabecalho = strtolower(ltrim($textoPreco, "\xEF\xBB\xBF"));
        if (in_array($cabecalho, ["preco", "preço", "price"], true)) {
            continue;
        }
    }

    if ($separador === ";") {
        $textoPreco = str_replace(",", ".", $textoPreco);
    }

    if ($produto === "" || !is_numeric($textoPreco)) {
        fwrite(STDERR, "Linha " . ($indice + 1) . " ignorada: produto ou preço inválido.\n");
        continue;
    }

    $preco = (float) $textoPreco;
    $somaPrecos += $preco;
    $quantidade++;

    if ($maiorPreco === null || $preco > $maiorPreco) {
        $maiorPreco = $preco;
    }

    if ($menorPreco === null || $preco < $menorPreco) {
        $menorPreco = $preco;
    }
}

if ($quantidade === 0) {
    echo "Não há produtos válidos para calcular as estatísticas.\n";
    exit(0);
}

$precoMedio = $somaPrecos / $quantidade;

echo "Quantidade de produtos: " . $quantidade . "\n";
echo "Preço médio: R$ " . number_format($precoMedio, 2, ",", ".") . "\n";
echo "Maior preço: R$ " . number_format($maiorPreco, 2, ",", ".") . "\n";
echo "Menor preço: R$ " . number_format($menorPreco, 2, ",", ".") . "\n";