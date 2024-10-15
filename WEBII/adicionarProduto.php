<?php
// Conectar ao banco de dados
$conn = new mysqli("localhost", "root", "", "out_of_system_db");

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nomeProduto = $_POST['nomeProduto'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];
    $imagem = $_FILES['imagem']['name'];

    // Verificar se a imagem foi enviada e movê-la para o diretório de uploads
    if ($imagem) {
        $diretorio = 'uploads/';
        $caminhoImagem = $diretorio . uniqid() . '-' . basename($imagem);
        move_uploaded_file($_FILES['imagem']['tmp_name'], $caminhoImagem);

        // Inserir produto no banco de dados
        $sql = "INSERT INTO produtos (nome, descricao, preco, quantidade, imagem) VALUES ('$nomeProduto', '$descricao', '$preco', '$quantidade', '$caminhoImagem')";

        if ($conn->query($sql)) {
            echo "Produto adicionado com sucesso!";
        } else {
            echo "Erro: " . $conn->error;
        }
    }
}

$conn->close();
?>
