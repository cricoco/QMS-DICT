<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Division</title>
</head>
<body>
    <form method="POST" action="{{ route('division') }}">
        @csrf
        <label for="division_name">Division name:</label><br>
        <input type="text" id="division_name" name="division_name"><br>
        <label for="status">Status:</label><br>
        <input type="text" id="status" name="status"><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>