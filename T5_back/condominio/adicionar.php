<!DOCTYPE html>
<?php include('../connect.php'); ?>
<html>

<head>
    <meta charset="utf-8">
    <title>Adicionar Condominio</title>
    <link href="../../css/normalize.css" rel="stylesheet">
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="row">
        <div class="col-lg-7 bg-light">
            
                <h2 class="text-center">Adicionar Novo Condominio</h2>
                <small class="ms-3">*campos obrigatórios</small>
            
            <form class="m-3" action="adicionar_controller.php" method="post">
                <div class="row p-2">
                    <label class="col-2 col-form-label" for="nome">Nome*</label>
                    <div class="col-10">
                        <input class="form-control" type="text" name="nome" id="nome" required="true" maxlength="100" />
                    </div>
                </div>

                <div class="row p-2">
                    <label class="col-2 col-form-label" for="cnpj">CNPJ*</label>
                    <div class="col-10">
                        <input class="form-control" type="text" name="cnpj" id="cnpj" required="true" maxlength="18" />
                    </div>
                </div>
                <div class="row p-2">
                    <label class="col-2 col-form-label" for="senha">Escolher ID do Endereço baseado na tabela ao lado*</label>
                    <div class="col-10">
                        <input class="form-control" type="text" name="idEndereco" id="idEndereco" required="true" maxlength="10" />
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <button class="btn btn-secondary m-3" type="button" onclick="location.href='../../index.php'">Voltar</button>
                    <button class="btn btn-primary m-3" type="submit">Salvar</button>
                </div>
            </form>
        </div>
        <div class="col-lg-5">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th scope="col">ID do Endereco</th>
                        <th scope="col">Logradouro</th>
                        <th scope="col">Num</th>
                        <th scope="col">Bairro</th>
                        <th scope="col">Cidade</th>
                        <th scope="col">UF</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $sql = "SELECT endereco.id AS idEnd, endereco.logradouro, endereco.numero, endereco.bairro, cidade.nome, cidade.uf FROM endereco
            INNER JOIN cidade ON cidade.id=Endereco.Cidade_id";

                    if ($result = $mysqli->query($sql)) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['idEnd'] . "</td>";
                            echo "<td>" . $row['logradouro'] . "</td>";
                            echo "<td>" . $row['numero'] . "</td>";
                            echo "<td>" . $row['bairro'] . "</td>";
                            echo "<td>" . $row['nome'] . "</td>";
                            echo "<td>" . $row['uf'] . "</td>";
                        }
                    }
                    $mysqli->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

<script src="../../js/bootstrap.bundle.min.js"></script>

</html>