<!DOCTYPE html>
<html>
<head>
    <title>Documents layout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .document-background {
            background-color: #6e70f5;
        }
    </style>
</head>
<body>
<div class="document-background">   
    <div class="container">
        @yield('content')
    </div>
</div>   

</body>
</html>