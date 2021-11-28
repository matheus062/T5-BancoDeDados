<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>
        Excluir Condômino</title>
    <link href="../../css/normalize.css" rel="stylesheet">
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <?php
    include('../connect.php');

    if (!isset($_GET['id'])) {
        echo "<h3 class=\"text-center\">Condômino não encontrado para exclusão</h3>";
    } else {
        $id = $_GET['id'];
        $sql = "DELETE FROM condomino WHERE id = $id;";
        if ($mysqli->query($sql) == true) {
            echo "<h3 class=\"text-center\">Condômino excluído</h3>";
        } else {
            echo "<h3 class=\"text-center\">Erro ao excluir o Condômino, consulte o administrador.</h3>";
        }
        $mysqli->close();
    }
    ?>
    <div class="d-flex justify-content-center">
        <button class="btn btn-secondary m-3" type="button" onclick="location.href='../../index.php'">Voltar</button>
    </div>
</body>

</html>