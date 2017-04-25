<html>
	<head>
		<title>Laravel</title>
		<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	</head>
	<body>
	<div class="page-header" >
		<ul class="nav navbar-nav navbar-right">
			<li>
					<a href="{{ url('articles/create') }}"	{{ trans('site.add_article') }}</a>
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
</div>
		@if(Auth::check())
				for {{ Auth::user()->name }}
		@endif
<div class="page-header">
		<h1>
			{{ trans('site.article') }}
		</h1>
</div>
		@foreach($articles as $article)
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

	{{ $hashed = Crypt::encrypt('secret word') }}
	{{ $hashed }}
	{{ $decrypted = Crypt::decrypt($hashed) }}
	{{ $decrypted }}
	</body>
</html>
