<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cliente Médicos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>cliente Médicos</h1>
<?php
$stmt = $pdo->query('SELECT * FROM cliente');
$cliente = $stmt->fetchAll(PDO::FETCH_ASSOC);

if(count($cliente) == 0) {
    echo '<p>Nenhum compromisso agendado</p>';
} else {
    echo '<table border="1">';
    echo '<thead><tr><th>Nome</th><th>E-mail</th><th>Telefone</th><th>Data</th><th>Horário</th><th colspan="2">Opções</th></tr></thead>';
    echo '<tbody>';

    foreach ($cliente as $agendamento) {
        echo '<tr>';
        echo '<td>' . $agendamento['nome'] . '</td>';
        echo '<td>' . $agendamento['email'] . '</td>';
        echo '<td>' . $agendamento['telefone'] . '</td>';
        echo '<td>' . date('d/m/Y', strtotime($agendamento['data'])) . '</td>';
        echo '<td><a style="color:black;" href="atualizar.php?id=' . $agendamento['id'] . '">Atualizar</a></td>';
        echo '<td><a style="color:black;" href="deletar-cliente.php?id=' . $agendamento['id'] . '">Deletar</a></';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
}


$fruta = $pdo->query('SELECT * FROM frutas');
$produto = $fruta->fetchAll(PDO::FETCH_ASSOC);

if(count($produto) == 0) {
    echo '<p>Nenhum compromisso agendado</p>';
} else {
    echo '<table border="1">';
    echo '<thead><tr><th>Nome</th><th>Tamanho</th><th>Peso</th><th>Quantidade</th><th>Preço</th><th colspan="2">Opções</th></tr></thead>';
    echo '<tbody>';

    foreach ($produto as $agendamento) {
        echo '<tr>';
        echo '<td>' . $agendamento['nome'] . '</td>';
        echo '<td>' . $agendamento['tamanho'] . '</td>';
        echo '<td>' . $agendamento['peso'] . '</td>';
        echo '<td>' . $agendamento['quantidade'] . '</td>';
        echo '<td>' . $agendamento['preco'] . '</td>';
        echo '<td><a style="color:black;" href="atualizar.php?id=' . $agendamento['id'] . '">Atualizar</a></td>';
        echo '<td><a style="color:black;" href="deletar.php?id=' . $agendamento['id'] . '">Deletar</a></';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
}
?>
</body>
</html>