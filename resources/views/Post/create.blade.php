<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Create</title>
</head>
<body>
	<h1>Create</h1>
	{{-- <form method="POST" action="/blog/public/posts"> --}}
		{!! Form::open(['method'=>'POST', 'action'=>'PostsController@store', 'files'=>true]) !!}
		

		<div class="form-group">
			{!! Form::label('title', 'Title:') !!}
			{!! Form::text('title', null, ['class'=> 'from-control']) !!}
		</div>

        <div class="form-group">
			{!! Form::file('file', ['class'=> 'from-control']) !!}
		</div>

		    {!! Form::submit('submit the new post', ['class'=>'btn btn-lg']) !!}
		    {!! Form::close() !!}


@if(count($errors)>0)
<div class="alert alert-danger">
<ul>
    @foreach($errors->all() as $error)

    
    	<li>{{$error}}</li>
    

    @endforeach

</ul>
</div>
@endif
		
        
   
</body>
</html>