<html>
	<head>
		<title>Laravel</title>
		<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	</head>
	<body>
	<div class="panel panel-default">
		<div class="page-header">
		<h1>{{ $article->title }}</h1>
		<a class="btn btn-primary" href="{{ url("articles/{$article->id}/edit") }}">
		Edit
		</a>
		</div>
		<div class="panel panel-default">

				<div class="panel-body">
					
				@if($article->image)
					<img src="{{ url($article->image) }}"
						class="img-responsive"
						style="max-width: 200px">
				@else
					<img src="{{ url("images/laravel.png") }}"
							class="img-responsive"
							style="max-width: 200px">
				@endif


				{{ $article->body }}

			</div>
			<div class="panel-footer">
				{{ $article->published_at->diffForHumans() }}

				@unless($article->tags->isEmpty())
					<div>Tags
						<ul>
							@foreach($article->tags as $tag)
								<li class="label label-primary">{{ $tag->name }}</li>
							@endforeach
						</ul>
					</div>
				@endunless
			</div>
		</div>
	</div>
		<div>
			{!! Form::open(['method' => 'DELETE', 'url' => 'articles/'. $article->id ]) !!}
			{!! Form::submit('DELETE', ['class'=>'btn btn-danger']) !!}
			{!! Form::close() !!}
		</div>
	</body>
</html>
