<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/library-bg.css" rel="stylesheet" type="text/css">
    <title>Library</title>
</head>
<body>
    <div class="home-bg">
        <ul>
            <li><a href="{{ route('home') }}" style="margin-right: 500px;">Home</a></li>
            <li><a href="{{ route('manuals') }}">Manuals</a></li>
            <li><a href="{{ route('formats') }}">Formats</a></li>
            <li><a href="{{ route('formats') }}" style="margin-right: 400px;">Formats</a></li>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        
        </ul>
    </div>
        
    <div class="display-docs">
        All Documents
    </div>
</body>
</html>
