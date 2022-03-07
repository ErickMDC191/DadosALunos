<?php
    require_once('./Aluno.crud.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Listagem Dos Alunos</title>
</head>
<body>
    <div class="container">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>idade</th>
                    <th>nacionalidade</th>
                    <th>matricula</th>
                </tr>
            </thead>
            <tbody> 
                <?php foreach(fnListAlunos() as $aluno): ?>
                <tr>
                    <td><?= $aluno['Matricula']?></td>
                    <td><?= $aluno['nome']?></td>
                    <td><?= $aluno['Idade']?></td>
                    <td><?= $aluno['Nacionalidade']?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>