<?php

namespace App\Http\Controllers;
use View;
use App\Classes\ImageHandler;
use App\Events\PostPostedEvent;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends BaseController
{
    public function index()
    {
        $posts = Post::all();
        $data['posts'] = $posts;
        $title = 'Новости';
        View::share('title', $title);
        return view('news.index', $data);
    }
    public function detail()
    {
        $post = Post::find($_GET['id']);
        $data['post'] = $post;
        $title = $post->title;
        View::share('title', $title);
        return view('news.detail', $data);
    }
    public function create()
    {
        return view('news.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required'
        ]);
        if (!empty($_FILES)) {
            $file = Post::uploadFile($_FILES['image']);
        }
        Post::storePost($request->title, $request->get('content'), $file);
        return redirect()->route('news.index');
    }
    public function delete(Request $request)
    {
        Post::destroy($request->id);
        return redirect()->route('news.index');
    }
    public function edit(Request $request)
    {
        $data['post'] = Post::find($request->id);
        return view('news.edit', $data);
    }
    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required'
        ]);
        Post::find($post_id)->update($request->all());
        return redirect()->route('news.index');
    }
}
