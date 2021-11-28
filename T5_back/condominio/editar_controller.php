<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>Editar Condominio</title>
    <link href="../../css/normalize.css" rel="stylesheet">
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <?php
    include('../connect.php');

    if (!isset($_GET['id'])) {
        echo "<h3 class=\"text-center\">Condominio não encontrado para edição, selecionar um outro</h3>";
    } else {
        $id = $_GET['id'];
        if ($_POST['nome'] == "") {
            echo "<h3 class=\"text-center\">Por favor, informe o nome do condominio</h3>";
        } else if ($_POST['cnpj'] == "") {
            echo "<h3 class=\"text-center\">Por favor, informe o CNPJ do condominio</h3>";
        } else {
            $nome = $_POST['nome'];
            $cnpj = $_POST['cnpj'];

            $sql = "UPDATE Condominio SET nome = '$nome', cnpj = '$cnpj' WHERE id = $id";

            if ($mysqli->query($sql) == true) {
                echo "<h3 class=\"text-center\">Condominio Editado</h3>";
            } else {
                echo "<h3 class=\"text-center\">Erro ao editar o Condominio, consulte o administrador.</h3>";
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