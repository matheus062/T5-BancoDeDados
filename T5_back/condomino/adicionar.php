<!DOCTYPE html>
<?php include('../connect.php'); ?>
<html>

<head>
    <meta charset="utf-8">
    <title>Adicionar Condômino</title>
    <link href="../../css/normalize.css" rel="stylesheet">
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="row">
        <div class="bg-light">
            
                <h2 class="text-center">Adicionar Novo Condômino</h2>
                <small class="ms-3">*campos obrigatórios</small>
            
            <form class="m-3" action="adicionar_controller.php" method="post">
                <div class="row p-2">
                    <label class="col-2 col-form-label" for="funcao">Função*</label>
                    <div class="col-10">
                    <select class="form-select" name="funcao" id="funcao" required="true"> 
                        <option value="0">Morador</option>
                        <option value="1">Síndico</option>
                        <option value="2">Subsíndico</option>
                    </select>
                    </div>
                </div>

                <div class="row p-2">
                    <label class="col-2 col-form-label" for="nome">Nome*</label>
                    <div class="col-10">
                        <input class="form-control" type="text" name="nome" id="nome" required="true" maxlength="100" />
                    </div>
                </div>

                <div class="row p-2">
                    <label class="col-2 col-form-label" for="cpf">CPF*</label>
                    <div class="col-10">
                        <input class="form-control" type="text" name="cpf" id="cpf" required="true" maxlength="11" />
                    </div>
                </div>
                <div class="row p-2">
                    <label class="col-2 col-form-label" for="email">E-mail*</label>
                    <div class="col-10">
                        <input class="form-control" type="email" name="email" id="email" required="true" maxlength="50" />
                    </div>
                </div>
                <div class="row p-2">
                    <label class="col-2 col-form-label" for="senha">Senha*</label>
                    <div class="col-10">
                        <input class="form-control" type="password" name="senha" id="senha" required="true" maxlength="32" />
                    </div>
                </div>
                <div class="row p-2">
                    <label class="col-2 col-form-label" for="fixo">Fixo*</label>
                    <div class="col-10">
                        <input class="form-control" type="text" name="fixo" id="fixo" required="true" maxlength="14" />
                    </div>
                </div>
                <div class="row p-2">
                    <label class="col-2 col-form-label" for="celular">Celular*</label>
                    <div class="col-10">
                        <input class="form-control" type="text" name="celular" id="celular" required="true" maxlength="15" />
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <button class="btn btn-secondary m-3" type="button" onclick="location.href='../../index.php'">Voltar</button>
                    <button class="btn btn-primary m-3" type="submit">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</body>

<script src="../../js/bootstrap.bundle.min.js"></script>

</html>