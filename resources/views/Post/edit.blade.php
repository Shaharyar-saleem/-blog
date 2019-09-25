<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit</title>
</head>
<body>
	<h1>Edit Post</h1>
	{{-- <form method="POST" action="/blog/public/posts/{{$Post->id}}">
		{!! csrf_field() !!}


		<input type="hidden" name="_method" value="PUT">
		<input type="text" name="title" placeholder="Enter Title of the post" value="{{ $Post->title }}">

       
		<input type="submit" name="submit" value="update">

       
	</form> --}}

    {!! Form::model($Post, ['method'=>'Patch', 'action'=>['PostsController@update', $Post->id]]) !!}
		

		<div class="form-group">
			{!! Form::label('title', 'Title:') !!}
			{!! Form::text('title', null, ['class'=> 'from-control']) !!}
		</div>
		    {!! Form::submit('update the post', ['class'=>'btn btn-lg']) !!}

		    {!! Form::close() !!}



{!! Form::open(['method'=>'DELETE', 'action'=>['PostsController@destroy', $Post->id]]) !!}
{!! Form::submit('DELETEE', ['class'=>'btn btn-danger']) !!}
{!! Form::close() !!}
	{{-- <form method="post" action="/blog/public/posts/{{$Post->id}}">
		{!! csrf_field() !!}
		<input type="hidden" name="_method" value="DELETE">
		<input type="submit" value="delete">
	</form> --}}
</body>
</html>