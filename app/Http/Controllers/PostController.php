<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
	private $post;
	
	public function __construct(Post $post)
	{
		$this->post = $post;	
	}
	
	public function index()
    {
		//dd($this->app->make('LogService'));
    	$posts = $this->post->all();
    	return view('post.index')->with('posts',$posts);	
	}

}
