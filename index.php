<!doctype html>
<?php include('T5_back/connect.php'); ?>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <title>Index - Condomínio</title>
    <link href="css/normalize.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="row">
        <div class="col-lg m-3 p-3 bg-light">
            <h1 class="text-center">Condomínios</h1>
            <div class="d-flex justify-content-center">
                <button class="btn btn-success m-3" onclick="location.href='T5_back/condominio/adicionar.php'">Adicionar novo Condomínio</button>
            </div>
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">CNPJ</th>
                        <th scope="col">Logradouro</th>
                        <th scope="col">Num</th>
                        <th scope="col">Bairro</th>
                        <th scope="col">Cidade</th>
                        <th scope="col">UF</th>
                        <th scope="col">Opções</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT Condominio.id, Condominio.nome AS nomeCond, Condominio.cnpj AS cnpj, endereco.logradouro AS logr, endereco.numero AS num, endereco.bairro AS bairro, cidade.nome AS nomeCidade, cidade.uf AS uf FROM Condominio 
                    INNER JOIN endereco ON Condominio.Endereco_id=endereco.id
                    INNER JOIN cidade ON Endereco.Cidade_id=cidade.id
                    ORDER BY Condominio.id";

                    if ($result = $mysqli->query($sql)) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['nomeCond'] . "</td>";
                            echo "<td>" . $row['cnpj'] . "</td>";
                            echo "<td>" . $row['logr'] . "</td>";
                            echo "<td>" . $row['num'] . "</td>";
                            echo "<td>" . $row['bairro'] . "</td>";
                            echo "<td>" . $row['nomeCidade'] . "</td>";
                            echo "<td>" . $row['uf'] . "</td>";

                            echo "<td class=\"d-flex justify-itens-around\">";
                            echo "<button class=\"btn btn-secondary m-1\" type=\"button\" onclick=\"location.href='T5_back/condominio/editar.php?id=" . $row['id'] . "'\">Editar</button>";
                            echo "<button class=\"btn btn-danger m-1\" type=\"button\" onclick=\"location.href='T5_back/condominio/excluir_controller.php?id=" . $row['id'] . "'\">Excluir</button>";
                            echo "</td>";
                            echo "<tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="col-lg m-3 p-3 bg-light">
            <h1 class="text-center">Condôminos</h1>
            <div class="d-flex justify-content-center">
                <button class="btn btn-success m-3" onclick="location.href='T5_back/condomino/adicionar.php'">Adicionar novo Condômino</button>
            </div>
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">CPF</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Senha</th>
                        <th scope="col">Fixo</th>
                        <th scope="col">Celular</th>
                        <th scope="col">Opções</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT id, nome, cpf, email, senha, fixo, celular FROM condomino ORDER BY nome";

                    if ($result = $mysqli->query($sql)) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['nome'] . "</td>";
                            echo "<td>" . $row['cpf'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>" . $row['senha'] . "</td>";
                            echo "<td>" . $row['fixo'] . "</td>";
                            echo "<td>" . $row['celular'] . "</td>";

                            echo "<td class=\"d-flex justify-itens-around\">";
                            echo "<button class=\"btn btn-secondary m-1\" type=\"button\" onclick=\"location.href='T5_back/condomino/editar.php?id=" . $row['id'] . "'\">Editar</button>";
                            echo "<button class=\"btn btn-danger m-1\" type=\"button\" onclick=\"location.href='T5_back/condomino/excluir_controller.php?id=" . $row['id'] . "'\">Excluir</button>";
                            echo "</td>";
                            echo "<tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

<script src="js/bootstrap.bundle.min.js"></script>

</html>