function process_form() {
    $custoDireto = $_POST['custoDireto'];
    $horasTrabalho = $_POST['horasTrabalho'];
    $custoHora = $_POST['custoHora'];
    $margemLucro = $_POST['margemLucro'];
    $taxaImposto = $_POST['taxaImposto'];

    // Cálculo do custo total
    $custoTotal = $custoDireto + ($horasTrabalho * $custoHora);

    // Cálculo do preço de venda
    $precoVenda = $custoTotal * (1 + ($margemLucro / 100));

    // Ajuste para impostos
    $precoFinal = $precoVenda / (1 - ($taxaImposto / 100));

    // Redirecionar para uma página com os resultados
    wp_redirect(home_url('/resultado-orcamento?preco=' . $precoFinal));
    exit;
}
add_action('admin_post_process_form', 'process_form');
add_action('admin_post_nopriv_process_form', 'process_form');
