<!doctype html>
<html lang="lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
            integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
            integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
            crossorigin="anonymous"></script>


    <title>Catalog</title>
</head>
<body class="d-flex flex-column h-100">

    <!-- Header -->
    <header class="p-3 bg-dark text-white">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

            <a href="/" class="d-flex align-items-center mb-2 mb-md-0 me-md-auto text-dark text-decoration-none">
                <span class="fs-4 text-white">Catalog</span>
            </a>
            @if(!isset($_SESSION['user']))
            <div class="text-end">
                <a href="/login">
                    <button type="button" class="btn btn-outline-light me-2">Войти</button>
                </a>
                <a href="/register">
                    <button type="button" class="btn btn-warning">Зарегистрироваться</button>
                </a>
            </div>
            @else
                <div class="text-end">
                    <text class="text-white">{{$_SESSION['user']->login}}</text>
                    <a href="/unLogin">
                        <button type="button" class="btn btn-warning">Выйти</button>
                    </a>
                </div>
            @endif


        </div>
    </header>

    <!-- Main -->
    <main class="flex-shrink-0">
                @yield('main_content')
    </main>

    <!-- Footer -->
    <footer class="footer mt-auto py-3 bg-light">
        <div class="container">
            <span class="text-muted">Place sticky footer content here.</span>
        </div>
    </footer>

</body>
</html>
