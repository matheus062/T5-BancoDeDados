<!DOCTYPE html>
<?php
include('../connect.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT nome, cnpj FROM Condominio WHERE id = $id";
    if ($result = $mysqli->query($sql)) {
        $row = $result->fetch_row();
        $nome = $row[0];
        $cnpj = $row[1];
    }
}

?>
<html>

<head>
    <meta charset="utf-8">
    <title>Editar Condominio</title>
    <link href="../../css/normalize.css" rel="stylesheet">
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="row p-5">

        <h2 class="text-center">Editar Condomínio</h2>
        <small class="ms-3">*campos obrigatórios</small>

        <form class="m-3" action="editar_controller.php?id=<?php echo $id; ?>" method="post">
            <div class="row p-2">
                <label class="col-2 col-form-label" for="nome">Nome*</label>
                <input class="form-control" type="text" name="nome" id="nome" required="true" value="<?php echo $nome; ?>" maxlength="100" />
            </div>

            <div class="row p-2">
                <label class="col-2 col-form-label" for="cnpj">CNPJ*</label>
                <input class="form-control" type="text" name="cnpj" id="cnpj" required="true" value="<?php echo $cnpj; ?>" maxlength="18" />
            </div>
            <br>
            <P>Não há possibilidade de alterar o endereço do condomínio, necessário cadastrar novamente.</p>
            <div class="d-flex justify-content-center">
                <button class="btn btn-secondary m-3" type="button" onclick="location.href='../../index.php'">Voltar</button>
                <button class="btn btn-primary m-3" type="submit">Salvar</button>
            </div>
        </form>
    </div>
</body>

<script src="../../js/bootstrap.bundle.min.js"></script>

</html>