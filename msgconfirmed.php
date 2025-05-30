<?php 
$nome = $_POST["nome"];
$email = $_POST["email"];
$cpf = $_POST["cpf"];
$tipo = $_POST["tipo"];
$mensagem = $_POST["msg"];

echo "<p>Obrigado, $nome , recebemos sua mensagem</p>";

$host = "localhost";
$dbname = "contato_db";
$usuario = "root";
$senha = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $usuario, $senha);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO mensagens (nome, email, cpf, tipo, mensagem)
            VALUES (:nome, :email, :cpf, :tipo, :mensagem)";

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(":nome", $nome);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":cpf", $cpf);
    $stmt->bindParam(":mensagem", $mensagem);
    $stmt->bindParam(":tipo", $tipo);


    $stmt->execute();
} catch (PDOException $e) {
    echo "<p class='alert alert-danger'>Erro ao enviar a mensagem: " . $e->getMessage() . "</p>";
}

// Resquiscio do antigo code. Salvava os dados em .txt  
//$registro = "Nome: $nome\n Email: $email\n CPF: $cpf\n Tipo: $tipo\n Mensagem: $mensagem\n\n";
//file_put_contents("mensagens.txt", $registro, FILE_APPEND);

?>