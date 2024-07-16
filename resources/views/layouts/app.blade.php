
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
<!-- Любые ваши стили и скрипты -->
</head>
<body>
<header>
    <nav>
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="{{ route('catalog.index') }}">Catalog</a></li>
            <!-- Другие пункты меню, если необходимо -->
        </ul>
    </nav>
</header>

<main>
    <div class="container">
        @yield('content')
    </div>
</main>

<footer>
    <!-- Подвал вашего сайта -->
</footer>
</body>
</html>
