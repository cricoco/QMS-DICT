<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>

        <form action"{{url('/UploadData')}}" methods="POST" enctype="multipart/form-data">

            @csrf

          <div>
            <label>name</label>
            <input type="text" name="name" placeholder="name">
          </div>

          <div>
            <label>Email</label>
            <input type="email" name="email" plaveholder="Email">
          </div>

          <div>
            <label>Photo</label>
            <input type="file" name="file">
          </div>

          <input type="submit" name="submit">
        </form>
</body>
</html>

