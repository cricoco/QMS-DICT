<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unit</title>
</head>
<body>
    <form method="POST" action="{{ route('unit') }}">
        @csrf
        <label for="division_id">Division name:</label><br>
        <input type="text" id="division_id" name="division_id"><br>
        <label for="unit_name">Unit name:</label><br>
        <input type="text" id="unit_name" name="unit_name"><br>
        <label for="status">Status:</label><br>
        <input type="text" id="status" name="status"><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>