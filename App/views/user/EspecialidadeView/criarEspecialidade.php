<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../../favicon.ico"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
              integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <title>Cadastro de Motorista</title>
    </head>
    <body>
        <div class="container">
            <header class="d-flex justify-content-between- my-4">
                <div class="ms-auto">
                    <a href="indexMotorista.php" class="btn btn-primary">Voltar</a>
                </div>
            </header>
            <form method="post" action="../../../controllers/Especialidade/EspecialidadeCadastroController.php" id="form"
                  enctype="multipart/form-data">

                <div class="card">
                    <div class="card-header">Cadastro da especialidade</div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label>Nome:</label>
                                <input class="form-control form-control-sm" type="text" id="nome" name="nome"
                                       placeholder="Nome da especialidade">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <input type="submit" name="create" value="Confirma" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>
