<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Adicionar Condômino</title>
    <link href="../../css/normalize.css" rel="stylesheet">
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <?php
    include('../connect.php');

    if ($_POST['funcao'] == "") {
        echo "<h3 class=\"text-center\">Por favor, informe a função do condômino</h3>";
    } else if ($_POST['nome'] == "") {
        echo "<h3 class=\"text-center\">Por favor, informe o nome do condômino</h3>";
    } else if ($_POST['cpf'] == "") {
        echo "<h3 class=\"text-center\">Por favor, informe o CPF do condômino</h3>";
    } else if ($_POST['email'] == "") {
        echo "<h3 class=\"text-center\">Por favor, informe o E-mail do condômino</h3>";
    } else if ($_POST['senha'] == "") {
        echo "<h3 class=\"text-center\">Por favor, informe a senha do condômino</h3>";
    } else if ($_POST['fixo'] == "") {
        echo "<h3 class=\"text-center\">Por favor, informe o telefone fixo do condômino</h3>";
    } else if ($_POST['celular'] == "") {
        echo "<h3 class=\"text-center\">Por favor, informe o telefone celular do condômino</h3>";
    } else {
        $funcao = $_POST['funcao'];
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $email = $_POST['email'];
        $senha = md5($_POST['senha']);
        $fixo = $_POST['fixo'];
        $celular = $_POST['celular'];

        $sql = "INSERT INTO Condomino (funcao, nome, cpf, email, senha, fixo, celular) VALUES ('$funcao', '$nome', '$cpf','$email', '$senha', '$fixo', '$celular');";

        if ($mysqli->query($sql) == true) {
            echo "<h3 class=\"text-center\">Condômino adicionado</h3>";
        } else {
            echo "<h3 class=\"text-center\">Erro ao adicionar o Condômino, consulte o administrador.</h3>";
        }
        $mysqli->close();
    }
    ?>
    <br>
    <div class="d-flex justify-content-center">
        <button class="btn btn-secondary m-3" type="button" onclick="location.href='../../index.php'">Voltar</button>
    </div>
</body>

</html>