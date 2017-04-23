<?php namespace App\Http\Controllers;

use Cookie;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use App\Http\Requests\ArticleRequest;
use App\Tag;

use Request;
use Auth;

class ArticlesController extends Controller {

public function __construct()
{
	$this->middleware('auth',['except' => ['show','index']]);
}

	public function _construct()
	{
		$this->middleware('auth', ['except'=>['index','show']]);
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		$articles = Article::published()->get();
		return view('articles.index', compact('articles'));

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$tag_list = Tag::lists('name', 'id');
		return view('articles.create', compact('tag_list'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(ArticleRequest $request)
	{
		$article = new Article($request->all());

		if($request->hasFile('image')){
			$image_fillename = $request->file('image')
										->getClientOriginalName();
			$image_name = date("Ymd-His-").$image_fillename;
			$public_path = 'images/articles/';
			$destination = base_path() . "/public/" . $public_path;
			$request->file('image')->move($destination, $image_name);
			$article->image = $public_path . $image_name;
		}


			$article->user_id = Auth::user()->id;
			$article->save();
		// Auth::user()->articles()->save($article);
			$tagsId = $request->input('tag_list');
			if(!empty($tagsId))
					$article->tags()->sync($tagsId);
		return redirect('articles');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$article = Article::find($id);
		if(empty($article))
			abort(404);
		return view('articles.show', compact('article'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$article = Article::find($id);
		if(empty($article))
			abort(404);
		$tag_list = Tag::lists('name', 'id');
		return view('articles.edit', compact('article','tag_list'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, ArticleRequest $request)
	{
		$article = Article::findOrFail($id);
		$article->update($request->all());

		if($request->hasFile('image')){
			$image_fillename = $request->file('image')
										->getClientOriginalName();
			$image_name = date("Ymd-His-").$image_fillename;
			$public_path = 'images/articles/';
			$destination = base_path() . "/public/" . $public_path;
			$request->file('image')->move($destination, $image_name);
			$article->image = $public_path . $image_name;
			$article->save();
		}


		$tagsId = $request->input('tag_list');
		if(!empty($tagsId))
			$article->tags()->sync($tagsId);
		else
				$article->tags()->detach();

		session()->flash('flash_message', 'Edit completed');
		return redirect('articles');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$article = Article::findOrFail($id);
		$article->delete();
		return redirect('articles');
	}

}
