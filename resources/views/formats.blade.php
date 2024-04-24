<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/formats-bg.css') }}" rel="stylesheet" type="text/css">
    <title>Formats</title>
</head>
<body>
    <div class="home-bg">
        <ul>
            <li><a href="{{ route('library') }}" style="margin-right: 50px;">Back to Library</a></li>
            <li><a href="{{ route('manuals') }}">Manuals</a></li>
            <li><a href="{{ route('home') }}" style="margin-left: 800px;">Home</a></li>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        

        </ul>
    </div>
        
    <div class="display-docs">
        All Formats
    </div>
</body>
</html>