<?php
// Verifica se os dados foram enviados pelo método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura os dados do formulário
    $custoDireto = isset($_POST["custoDireto"]) ? floatval($_POST["custoDireto"]) : 0;
    $horasTrabalho = isset($_POST["horasTrabalho"]) ? floatval($_POST["horasTrabalho"]) : 0;
    $custoHora = isset($_POST["custoHora"]) ? floatval($_POST["custoHora"]) : 0;
    $margemLucro = isset($_POST["margemLucro"]) ? floatval($_POST["margemLucro"]) : 0;
    $taxaImposto = isset($_POST["taxaImposto"]) ? floatval($_POST["taxaImposto"]) : 0;

    // Calcula o custo total
    $custoTotal = $custoDireto + ($horasTrabalho * $custoHora);

    // Calcula o preço de venda sem impostos
    $precoVenda = $custoTotal * (1 + ($margemLucro / 100));

    // Ajusta para impostos
    $precoFinal = $precoVenda * (1 + ($taxaImposto / 100));

    // Exibe o resultado
    echo "Custo Total: R$ " . number_format($custoTotal, 2) . "<br>";
    echo "Preço de Venda (sem impostos): R$ " . number_format($precoVenda, 2) . "<br>";
    echo "Preço Final (com impostos): R$ " . number_format($precoFinal, 2);
}
?>
