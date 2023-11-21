<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function viewSinglePost($id)
    {
        $posts = DB::table('users')
            ->join('posts', 'posts.user_id', '=', 'users.id')
            ->select('posts.*', 'users.*')
            ->where('users.id', $id)
            ->first();
        if ($posts) {
            return view('webpage.post', compact('posts'));
        } else {
            return redirect('/');
        }
    }

    public function viewAllPost()
    {
        $posts = DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.id AS post_id', 'posts.*', 'users.*')
            ->get();

        return view('webpage.index', compact('posts'));
    }

    public function createPost(Request $request)
    {
        $info = Validator::make($request->all(), [
            'barta' => ['required'],
        ], [
            'barta' => 'Type something to post!',
        ])->validate();

        $post = DB::table('posts')
            ->insert([
                'post_uuid' => Str::uuid(),
                'description' => $request->barta,
                'user_id' => Auth::id(),
                'created_at' => now(),
            ]);

        return redirect()->back();
    }

    public function showUpdatePost($uuid)
    {
        $post = DB::table('posts')
            ->where('post_uuid', $uuid)->first();
        if (! $post) {
            return redirect()->back();
        }

        return view('webpage.edit-post', ['posts' => $post]);
    }

    public function updatePost(Request $request, $uuid)
    {
        $info = Validator::make($request->all(), [
            'barta' => ['required'],
        ], [
            'barta' => 'Type something to post!',
        ])->validate();

        $post = DB::table('posts')
            ->where('post_uuid', $uuid)
            ->update([
                'description' => $request->barta,
                'created_at' => now(),
            ]);

        return redirect('/newsfeed');
    }

    public function deletePost($uuid)
    {
        $post = DB::table('posts')
            ->where('post_uuid', $uuid)
            ->delete();

        return redirect('/newsfeed');
    }
}
