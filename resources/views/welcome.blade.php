<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Проверка пароля на валидность</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css" />
    <link rel="stylesheet" href="css/main.min.css">

</head>

<body>
    <div class="container">
        <div class="row mt-5">
            @if(session('success'))
            <div class="alert alert-success" role="alert">
                <h5><i class="icon fas fa-check"></i> {{ session('success') }}</h5>
            </div>
            @endif
            @if(session()->has('error'))
            <div class="alert alert-danger" role="alert">
                <h5><i class="fa fa-times" aria-hidden="true"></i> {{ session()->get('error') }}</h5>
            </div>
            @endif
        </div>
        <div class="row mt-5">
            <div class="row">
                <div class="col-sm-12 ">
                    <h5>Пароль должен:</h5>
                    <p>1. быть не менее 8 символов длиной;</p>
                    <p>2. содержать минимум 1 букву большую и 1 букву маленькую;</p>
                    <p>3. содержать минимум по 1 букве латиницы и кириллицы;</p>
                    <p>4. содержать минимум 3 небуквенных символа (упростим множество до !"№;%:?*()_+~:'\)</p>
                    <p>5. содержать не менее 1 цифры;</p>
                </div>
            </div>
            <form method="POST" action="/check_password">
                @csrf
                <div class="mb-3">
                    <label for="password" class="form-label">Пароль</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <button type="submit" class="btn btn-primary">Проверить</button>
            </form>
        </div>
    </div>



    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.6.0.js"></script>
    <script src="https://kit.fontawesome.com/a7abb8ac81.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
    <script src="./js/main.js"></script>
</body>

</html>