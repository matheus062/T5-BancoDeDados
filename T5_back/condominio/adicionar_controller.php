<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Adicionar Condominio</title>
    <link href="../../css/normalize.css" rel="stylesheet">
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <?php
    include('../connect.php');

    if ($_POST['nome'] == "") {
        echo "<h3 class=\"text-center\">Por favor, informe o nome do condominio</h3>";
    } else if ($_POST['cnpj'] == "") {
        echo "<h3 class=\"text-center\">Por favor, informe o CNPJ do Condomínio</h3>";
    } else if ($_POST['idEndereco'] == "") {
        echo "<h3 class=\"text-center\">Por favor, informe o id do endereço</h3>";
    } else {
        $nome = $_POST['nome'];
        $cnpj = $_POST['cnpj'];
        $idEnd = $_POST['idEndereco'];

        $sql = "INSERT INTO Condominio (nome, cnpj, Endereco_id) VALUES ('$nome', '$cnpj', '$idEnd');";

        if ($mysqli->query($sql) == true) {
            echo "<h3 class=\"text-center\">Condominio adicionado</h3>";
        } else {
            echo "<h3 class=\"text-center\">Erro ao adicionar o Condominio, consulte o administrador.</h3>";
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