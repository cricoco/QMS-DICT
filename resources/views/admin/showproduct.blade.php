<!DOCTYPE html>
<html>
<head>
	<title></title>
	</head>
	<body>
	<form action="{{url('uploadproduct')}}" method="post" enctype="multipart/form-data">

	@csrf

	<input type="text" name="name" placeholder="Product Name">

	<input type="text" name="description" placeholder="Product description">

	<input type="file" name="file">

	<input type="submit" >


	</form>





	<table border="1px">

	<tr>
		<th>Name</th>
		<th>Description</th>
		<th>View</th>
		<th>Download</th>
	</tr>

	@foreach($data as $data)

	<tr>
		<td>{{$data->name}}</td>
		<td>{{$data->description}}</td>
		<td><a href="{{url('/view',$data->id)}}">View</a></td>
		<td><a href="{{url('/download',$data->file)}}">Download</a></td>


	</tr>
	



	@endforeach

	</table>

</body>
</html>