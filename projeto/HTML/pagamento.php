<?php
session_start();

$total = 0.0;
$itens = isset($_SESSION['itens']) ? $_SESSION['itens'] : [];

foreach ($itens as $item) {
    $total += $item['preco'];
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Pagamento</title>
    <link rel="stylesheet" href="../CSS/pagamento.css">
</head>
<body>
    <div class="formulario">
  <form>
    <h2>Itens da Compra</h2>
    <ul>
        <?php foreach ($itens as $item): ?>
            <li class="item_lista"><?php echo $item['nome'] . ' - R$ ' . number_format($item['preco'], 2, ',', '.'); ?></li>
        <?php endforeach; ?>
    </ul>

    <p class="total">Total: R$ <?php echo number_format($total, 2, ',', '.'); ?></p>
    <a href="sistcaixa.php" class="botao-voltar">Voltar</a>
  </form>
        </div>
</body>
</html>