<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>show</title>
</head>
<body>
	<ul>
		@foreach($Posts as $Post)

		<div class="image-container">
			<img src="/images/{{ $Post->path }}" alt="">
		</div>
        
		<li><a href="{{route('posts.show', $Post->id)}}">{{ $Post->title }}</a></li>
		<li><img src="images/{{ $Post->path }}" alt="" height="100" width="200"></li>
		

		@endforeach
	</ul>
</body>
</html>