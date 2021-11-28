<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>Editar Condômino</title>
    <link href="../../css/normalize.css" rel="stylesheet">
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <?php
    include('../connect.php');

    if (!isset($_GET['id'])) {
        echo "<h3 class=\"text-center\">Condômino não encontrado para edição, selecionar um outro</h3>";
    } else {

        $id = $_GET['id'];
        $sql = "SELECT senha FROM condomino WHERE id=$id";
        if ($result = $mysqli->query($sql)) {
            $row = $result->fetch_row();
            $senhaAntiga = $row[0];
        }
        if ($_POST['funcao'] == "") {
            echo "<h3 class=\"text-center\">Por favor, informe a funcao do condômino</h3>";
        } else if ($_POST['nome'] == "") {
            echo "<h3 class=\"text-center\">Por favor, informe o nome do condômino</h3>";
        } else if ($_POST['cpf'] == "") {
            echo "<h3 class=\"text-center\">Por favor, informe o CPF do condômino</h3>";
        } else if ($_POST['email'] == "") {
            echo "<h3 class=\"text-center\">Por favor, informe o E-mail do condômino</h3>";
        } else if ($_POST['senha'] == "" or md5($_POST['senha']) === $senhaAntiga) {
            echo "<h3 class=\"text-center\">Por favor, informe uma nova senha do condômino</h3>";
        } else if ($_POST['fixo'] == "") {
            echo "<h3 class=\"text-center\">Por favor, informe o fixo do condômino</h3>";
        } else if ($_POST['celular'] == "") {
            echo "<h3 class=\"text-center\">Por favor, informe o celular do condômino</h3>";
        } else {
            $funcao = $_POST['funcao'];
            $nome = $_POST['nome'];
            $cpf = $_POST['cpf'];
            $email = $_POST['email'];
            $senha = md5($_POST['senha']);
            $fixo = $_POST['fixo'];
            $celular = $_POST['celular'];

            $sql = "UPDATE condomino SET funcao = '$funcao', nome = '$nome', cpf = '$cpf', email = '$email', senha = '$senha', fixo = '$fixo', celular = '$celular' WHERE id = $id";

            if ($mysqli->query($sql) == true) {
                echo "<h3 class=\"text-center\">Condômino Editado</h3>";
            } else {
                echo "<h3 class=\"text-center\">Erro ao editar o Condômino, consulte o administrador.</h3>";
            }
            $mysqli->close();
        }
    }
    ?>
    <br>
    <div class="d-flex justify-content-center">
        <button class="btn btn-secondary m-3" type="button" onclick="location.href='../../index.php'">Voltar</button>
    </div>
</body>

</html>