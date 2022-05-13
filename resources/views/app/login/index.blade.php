<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chamado - Login</title>
    <meta name="theme-color" content="blue">

    <!--Style CSS-->
    <link rel="stylesheet" href="css/login.css" />

    <!--BOOTSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!--FANCYBOX-->
    <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.1.25/jquery.fancybox.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.1.25/jquery.fancybox.min.js"></script>

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#7952b3">

    <!--favicon Pag-->
    <link rel="shortcut icon" href="{{ asset('images/chamado.png') }}" type="image/x-icon" />

    <!--Data table-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <!--JS-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>

</head>

<body style="background: url(images/fundo_login.jpg);">

    <div class="container">
        <div class="card shadow">
            <div class="card-body">
                <img class="logochamado" src="images/logochamado.png">
                <?php if($erro == ''){

                }else{
                    ?>

                <div class="alert alert-danger" role="alert">
                    {{ isset($erro) && $erro != '' ? $erro : '' }}
                </div>
                <?php } ?>
                <form action="{{ route('chamado.logon') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="cpf" class="form-label">CPF</label>
                        <input type="cpf" class="form-control" value="{{ old('cpf') }}" id="cpf" name="cpf"
                            aria-describedby="emailHelp" placeholder="CPF Cadastrado">
                        <span>{{ $errors->has('cpf') ? $errors->first('cpf') : '' }}</span>

                    </div>
                    <div class="mb-3">
                        <label for="senha" class="form-label">Senha</label>
                        <input type="password" class="form-control" value="{{ old('senha') }}" name="senha" id="senha"
                            placeholder="Informe a senha">
                        <span>{{ $errors->has('senha') ? $errors->first('senha') : '' }}</span>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2 mb-3" style="width: 100%; background: #06ace1; border: none;">Acessar Chamado</button>

                    <img src="images/rodape.jpg" style="width: 100%;">
                </form>
            </div>
        </div>
    </div>

    <!--
    <script type="text/javascript">
        $("#cpf").mask("000.000.000-00");
    </script>
    -->

</body>
</html>
