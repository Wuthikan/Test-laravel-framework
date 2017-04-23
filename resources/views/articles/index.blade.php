<html>
	<head>
		<title>Laravel</title>
		<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	</head>
	<body>
		<ul class="nav navbar-nav navbar-right">
			<li>
					<a href="{{ url('articles/create') }}">New Article</a>
			</li>
			<li>
					<a href="{{ url('lang/en') }}"
							class="btn btn-default">EN</a>
			</li>
			<li>
					<a href="{{ url('lang/th') }}"
							class="btn btn-default">TH</a>
			</li>
	</ul>

		<div class="panel panel-default">
			<div class="panel-heading">

				<a href="{{ url('articles/'. $article->id) }}">
				   {{ $article->title }}
				</a>

			</div>
			<div class="panel-body">{{ $article->body }}</div>
			<div class="panel-footer">
				By <strong>{{ $article->user->name }} </strong>
				{{ $article->published_at->diffForHumans() }}
			</div>
		</div>
	@endforeach
	</body>
</html>
