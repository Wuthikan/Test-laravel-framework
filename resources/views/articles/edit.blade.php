<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<title></title>
</head>
<body>
	@if($errors->any())
			<ul class="alert alert-danger">
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
	@endif

<h1 class="page-title">Edit: {{ $article->title }}</h1>
{!! Form::model($article, ['method' => 'PATCH',
'action' => ['ArticlesController@update', $article->id],
'files' => true
]) !!}

@include('articles._form',
		['submitButtonText' => trans('Update Article')])

{!! Form::close() !!}
</body>
</html>
