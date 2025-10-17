<?php
session_start(); // Inicia a sessão

// Inicializa o array de itens na sessão
if (!isset($_SESSION['itens'])) {
    $_SESSION['itens'] = [];
}

// Função para buscar o produto pelo código
function buscarProduto($codigo) {
    $produtos = [
        // A - Alimento
        'A1' => ['nome' => 'Bolacha', 'preco' => 3.60],
        'A2' => ['nome' => 'Farinha de trigo', 'preco' => 12.30],
        'A3' => ['nome' => 'Farinha de rosca', 'preco' => 7.80],
        'A4' => ['nome' => 'Fubá', 'preco' => 6.90],
        'A5' => ['nome' => 'Flocão de milho', 'preco' => 10.50],
        'A6' => ['nome' => 'Arroz', 'preco' => 30.50],
        'A7' => ['nome' => 'Feijão', 'preco' => 20.70],
        'A8' => ['nome' => 'Sal', 'preco' => 8.00],

        // B - Açougue
        'B1' => ['nome' => 'Carne moída congelada', 'preco' => 51.06],
        'B2' => ['nome' => 'Linguiça Toscana', 'preco' => 69.33],
        'B3' => ['nome' => 'Patinho', 'preco' => 172.82],
        'B4' => ['nome' => 'Filé de frango', 'preco' => 179.96],
        'B5' => ['nome' => 'Bisteca', 'preco' => 8.00],
        'B6' => ['nome' => 'Coxa de frango', 'preco' => 8.00],
        'B7' => ['nome' => 'Asinha de frango', 'preco' => 8.00],
        'B8' => ['nome' => 'Fígado', 'preco' => 8.00],

        // C - Hortifrute
        'C1' => ['nome' => 'Banana', 'preco' => 10.00],
        'C2' => ['nome' => 'Maçã', 'preco' => 5.00],
        'C3' => ['nome' => 'Abacaxi', 'preco' => 7.00],
        'C4' => ['nome' => 'Pera', 'preco' => 3.00],
        'C5' => ['nome' => 'Caqui', 'preco' => 3.00],
        'C6' => ['nome' => 'Kiwi', 'preco' => 6.70],
        'C7' => ['nome' => 'Morango', 'preco' => 12.00],
        'C8' => ['nome' => 'Melancia', 'preco' => 10.00],

        // D - Bebidas
        'D1' => ['nome' => 'Coca-cola 2L', 'preco' => 12.50],
        'D2' => ['nome' => 'Coca-cola 1,5L', 'preco' => 10.00],
        'D3' => ['nome' => 'Coca-cola 1L', 'preco' => 7.00],
        'D4' => ['nome' => 'Energético RED BULL', 'preco' => 6.90],
        'D5' => ['nome' => 'Guaraná Antárctica 2L', 'preco' => 15.50],
        'D6' => ['nome' => 'Guaraná Antárctica 1,5L', 'preco' => 13.00],
        'D7' => ['nome' => 'Guaraná Antárctica 1L', 'preco' => 10.00],
        'D8' => ['nome' => 'Água 2L', 'preco' => 10.00],

        // E - Limpeza/Higiêne
        'E1' => ['nome' => 'Amaciante', 'preco' => 30.50],
        'E2' => ['nome' => 'Alvejante', 'preco' => 17.00],
        'E3' => ['nome' => 'Aromatizador de ambiente', 'preco' => 24.40],
        'E4' => ['nome' => 'Cloro', 'preco' => 10.70],
        'E5' => ['nome' => 'Desinfetante', 'preco' => 15.00],
        'E6' => ['nome' => 'Papel higiênico', 'preco' => 12.99],
        'E7' => ['nome' => 'Sabão em pedra', 'preco' => 5.00],
        'E8' => ['nome' => 'Sabão em pó', 'preco' => 14.90],
    ];

    return $produtos[$codigo] ?? ['nome' => 'Produto não encontrado', 'preco' => 0];
}

// Adiciona produto
if (isset($_GET['codigo'])) {
    $codigo = $_GET['codigo'];
    $produto = buscarProduto($codigo);
    if ($produto['preco'] > 0) {
        $_SESSION['itens'][] = $produto;
    }
}

// Remover item individualmente
if (isset($_GET['remover'])) {
    $indice = $_GET['remover'];
    if (isset($_SESSION['itens'][$indice])) {
        unset($_SESSION['itens'][$indice]);
        $_SESSION['itens'] = array_values($_SESSION['itens']); // Reindexa o array
    }
}

// Limpar tudo
if (isset($_GET['limpar'])) {
    $_SESSION['itens'] = [];
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Calcular total
$total = 0;
foreach ($_SESSION['itens'] as $item) {
    $total += $item['preco'];
}
?>
