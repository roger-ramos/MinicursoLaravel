<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Validator;
use Storage;
use Auth;
use Redirect;

class PostsController extends Controller
{
    public function createPost()
    {
        //tem que estar autenticado
        if(!Auth::check()){
            return Redirect::to('/login');
        }
        return view('criar-artigo');
    }

    public function postSubmit(Request $request)
    {
        //tem que estar autenticado
        if (!Auth::check()) {
            return Redirect::to('/login');
        }

        Validator::make($request->all(), [
            'image' => 'nullable|image',
            'text' => 'required',
            'title' => 'required|max:255|unique:posts'
        ])->validate();
    
        //salavando a imagem no servidor e pegando o caminho
        $imagePath = '';
        if($request->file('image')){$imagePath = Storage::disk('public')->put('/posts-images',
        $request->file('image'));
        }

        $postCreated = Post::create([
            'title' => $request->get('title'),
            'text' => $request->get('text'),
            'image_location' => $imagePath,
            'author_id' => Auth::id(),
            'slug' => str_slug($request->get('title'))
        ]);

        return Redirect::to('/');
    }

    //pegar todos os posts do banco
    public function allPosts()
    {
        //pega todos os posts e coloca em uma coleção
        $posts = Post::all();
        
        return view('artigos')->with('artigos', $posts);
    }

    //pegar artigo pelo slug
    public function getPost($slug)
    {
        $post = Post::where('slug', $slug)->first();

        return view('ver-artigo')->with('artigo', $post);
    }

    public function deletePost($slug)
    {
        //buscar post
        $post = Post::where('slug', $slug)->first();

        //verificar se pode remover
        if ($post && Auth::id() == $post->author->id ){
            //pode remover
            $post->delete();
        }
        return Redirect::to('/');
    }

    public function getPostEdit($slug)
    {
        if (!Auth::check()){
            return Redirect::to('/');
        }


        $post = Post::where('slug', $slug)->first();

        return view('editar-artigo')->with('artigo', $post);
    }

    public function submitPostEdit(Request $request, $slug)
    {
        if (!Auth::check()) {
            return Redirect::to('/');
        }

        $post = Post::where('slug', $slug)->first();
        if(!$post || $post->author->id != Auth::id()){
            return Redirect::to('/');
        }

        Validator::make($request->all(), [
            'title' => 'required|max:255|unique:posts,id,'.$post->id,
            'text' => 'required',
            'image' => 'nullable|image'
        ])->validate();

        $post->title = $request->get('title');
        $post->text = $request->get('text');
        $post->slug = str_slug($request->get('title'));

        if($request->has('image')){
            if ($post->image_location){
                Storage::disk('public')->delete($post->image_location);
            }
            $imagePath = Storage::disk('public')->put('posts-images', $request->file('image'));
            $post->image_location = $imagePath;
        }

        $post->save();

        return Redirect::to('/artigo/'.$post->slug);
    }
}
