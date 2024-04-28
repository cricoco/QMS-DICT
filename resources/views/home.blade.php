<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/home-bg.css" rel="stylesheet" type="text/css">
    <title>Home</title>
</head>
<body>
    <div class="home-bg">
        <ul>
            <li><a href="{{ route('library') }}">Library</a></li>
            <li><a href="{{ route('about-us') }}" style="margin-right: 950px;">About Us</a></li>

            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </ul>
    </div>
</body>
</html>
