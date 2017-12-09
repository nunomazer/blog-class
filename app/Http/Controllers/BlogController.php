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
            ->paginate(5);
    }

    private function getPostToShow($slug)
    {
        return Post::whereSlug($slug)->firstOrFail();
    }

    public function index()
    {
        $posts = $this->getPaginatedPosts();

        return view('blog.index', compact('posts'));
    }

    public function showPost($slug)
    {
        $post = $this->getPostToShow($slug);

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

    public function postApiPost(Request $request)
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

        return response()->json(['message'=> 'Post gravado com sucesso!']);
    }

    public function getApiPost(Request $request, $slug = null)
    {
        if ($slug == null) {
            return $this->getPaginatedPosts();
        }

        return $this->getPostToShow($slug);
    }
}
