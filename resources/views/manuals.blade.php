<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/manuals-bg.css') }}" rel="stylesheet" type="text/css">
    <title>Manuals</title>
</head>
<body>
<div class="home-bg">
    <div class="home-bg">
        <ul>
            <li><a href="{{ route('library') }}" style="margin-right: 50px;">Back to Library</a></li>
            <li><a href="{{ route('formats') }}">Formats</a></li>
            <li><a href="{{ route('home') }}" style="margin-left: 800px;">Home</a></li>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        
        </ul>
    </div>
        
    <div class="display-docs">
        All Manuals
    </div>
</body>
</html>
