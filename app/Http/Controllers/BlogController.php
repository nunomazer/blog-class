<?php

namespace App\Http\Controllers;

use App\Post;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class BlogController extends Controller
{

    private function getPaginatedPosts()
    {
        return Post::where('published_at', '<=', Carbon::now())
            ->orderBy('published_at', 'desc')
            ->paginate(15);
    }

    public function index()
    {
        $posts = $this->getPaginatedPosts();

        return view('blog.index', compact('posts'));
    }

    public function showPost($slug)
    {
        $post = Post::whereSlug($slug)->firstOrFail();

        return view('blog.post')->withPost($post);
    }

    public function post(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->get('content');
        $post->published_at = Carbon::now();
        $post->save();

        return redirect()->to(URL::previous());
    }

    public function getApiPost(Request $request)
    {
        return $this->getPaginatedPosts();
    }
}
