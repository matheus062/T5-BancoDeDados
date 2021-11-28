<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>
        Excluir Condominio</title>
    <link href="../../css/normalize.css" rel="stylesheet">
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <?php
    include('../connect.php');

    if (!isset($_GET['id'])) {
        echo "<h3 class=\"text-center\">Condomínio não encontrado para exclusão</h3>";
    } else {
        $id = $_GET['id'];
        $sql = "DELETE FROM Condominio WHERE id = $id;";
        if ($mysqli->query($sql) == true) {
            echo "<h3 class=\"text-center\">Condominio excluído</h3>";
        } else {
            echo "<h3 class=\"text-center\">Erro ao excluir o Condominio, consulte o administrador.</h3>";
        }
        $mysqli->close();
    }
    ?>
    <div class="d-flex justify-content-center">
        <button class="btn btn-secondary m-3" type="button" onclick="location.href='../../index.php'">Voltar</button>
    </div>
</body>

</html>