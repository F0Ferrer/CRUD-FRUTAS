<?php
require_once 'db.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<div class="container-formulario">
        <h1>Agendamento Médico</h1>
        <?php
        if (isset($_POST['submit'])) {
            $nome = $_POST['nome'];
            $tamanho = $_POST['tamanho'];
            $peso = $_POST['peso'];
            $quantidade = $_POST['quantidade'];
            $preco = $_POST['preco'];

            $stmt = $pdo->prepare('SELECT COUNT(*) 
            FROM frutas WHERE nome = ?');
            $stmt->execute([$nome]);
            $count = $stmt->fetchColumn();

            if($count > 0) {
                $error = 'Já existe um agendamento para essa data e horário.';
        } else {

            $stmt = $pdo->prepare('INSERT INTO frutas (nome, tamanho, peso, quantidade, preco)  
            VALUES (:nome,:tamanho,:peso,:quantidade,:preco)');
            $stmt->execute(['nome' => $nome, 
            'tamanho' => $tamanho, 
            'peso' => $peso, 
            'quantidade' => $quantidade, 'preco' => $preco]);

            if ($stmt->rowCount()) {
                echo '<span>Compromisso agendado com sucesso!</span>';
            } else {
                echo '<span>Erro ao tentar agendar. Tente novamente mais tarde!</span>';
            }
        }
        
        if (isset($error)) {
            echo '<span>' . $error . '</span>';
        }
    }
    ?>

    <form method="post">
        
    <label for="nome">Nome:</label>
    <input type="text" name="nome" required><br>


    <label for="tamanho">Tamanho:</label>
    <input type="text" name="tamanho" required><br>

    <label for="peso">Peso:</label>
    <input type="text" name="peso" maxLength="11" required><br>

    <label for="quantidade">Quantidade:</label>
    <input type="text" name="quantidade" required><br>

    <label for="preco">Preço:</label>
    <input type="text" name="preco" required><br>

    <div>
        <button type="submit" name="submit" value="Agendar">Agendar</button>
        <button><a href="listar.php">Listar</a></button>
        <button><a href="index.php">Produtos</a></button>
    </div>
</form>
</div>


</body>
</html>