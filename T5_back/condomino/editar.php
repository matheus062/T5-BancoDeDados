<!DOCTYPE html>
<?php
include('../connect.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT funcao, nome, cpf, email, senha, fixo, celular FROM condomino WHERE id = $id";
    if ($result = $mysqli->query($sql)) {
        $row = $result->fetch_row();
        $funcao = $row[0];
        $nome = $row[1];
        $cpf = $row[2];
        $email = $row[3];
        $senha = $row[4];
        $fixo = $row[5];
        $celular = $row[6];
    }
}

?>
<html>

<head>
    <meta charset="utf-8">
    <title>Editar Condômino</title>
    <link href="../../css/normalize.css" rel="stylesheet">
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="row p-5">

        <h2 class="text-center">Editar Condômino</h2>
        <small class="ms-3">*campos obrigatórios</small>

        <form class="m-3" action="editar_controller.php?id=<?php echo $id; ?>" method="post">
            <div class="row p-2">
                <label class="col-2 col-form-label" for="funcao">Função*</label>
                <div class="col-10">
                    <select class="form-select" name="funcao" id="funcao" required="true" value="<?php echo $funcao; ?>">
                        <option value="0">Morador</option>
                        <option value="1">Síndico</option>
                        <option value="2">Subsíndico</option>
                    </select>
                </div>
            </div>

            <div class="row p-2">
                <label class="col-2 col-form-label" for="nome">Nome*</label>
                <div class="col-10">
                    <input class="form-control" type="text" name="nome" id="nome" required="true" maxlength="100" value="<?php echo $nome; ?>" />
                </div>
            </div>

            <div class="row p-2">
                <label class="col-2 col-form-label" for="cpf">CPF*</label>
                <div class="col-10">
                    <input class="form-control" type="text" name="cpf" id="cpf" required="true" maxlength="11" value="<?php echo $cpf; ?>" />
                </div>
            </div>
            <div class="row p-2">
                <label class="col-2 col-form-label" for="email">E-mail*</label>
                <div class="col-10">
                    <input class="form-control" type="email" name="email" id="email" required="true" maxlength="50" value="<?php echo $email; ?>" />
                </div>
            </div>
            <div class="row p-2">
                <P>Necessário cadastrar uma senha nova para o Condômino por motivos de segurança.</p>
                <label class="col-2 col-form-label" for="senha">Senha*</label>
                <div class="col-10">
                    <input class="form-control" type="password" name="senha" id="senha" required="true" maxlength="32" />
                </div>
            </div>
            <div class="row p-2">
                <label class="col-2 col-form-label" for="fixo">Fixo*</label>
                <div class="col-10">
                    <input class="form-control" type="text" name="fixo" id="fixo" required="true" maxlength="14" value="<?php echo $fixo; ?>" />
                </div>
            </div>
            <div class="row p-2">
                <label class="col-2 col-form-label" for="celular">Celular*</label>
                <div class="col-10">
                    <input class="form-control" type="text" name="celular" id="celular" required="true" maxlength="15" value="<?php echo $celular; ?>" />
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <button class="btn btn-secondary m-3" type="button" onclick="location.href='../../index.php'">Voltar</button>
                <button class="btn btn-primary m-3" type="submit">Salvar</button>
            </div>
        </form>
    </div>
</body>

<script src="../../js/bootstrap.bundle.min.js"></script>

</html>