<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\posts;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function index(){
       
        $posts = posts::with('postUser')->orderBy('id','desc')->get();
        return view('welcome',[
            'posts' => $posts,
        ]);
    }

    public function store(Request $request){

        $request->validate([
            'title' => ['required','unique:posts'],
            'content' => ['required'],           
        ]);

        $posts = posts::create(array_merge($request->all(), [
            'user' => auth::id(),
        ]));


        return redirect()->back()->with('success','Post Created');
    }

    public function show($slug){
       
        $posts = posts::with('postUser')->where("title",$slug)->first();
        return view('posts.show',[
            'post' => $posts,
        ]);
    }

    public function update($id, Request $request){
       
        $request->validate([
            'title' => ['required', 'unique:posts,title,' . $id],
            'content' => ['required'],
        ]);
     
        $posts = posts::where('id',$id)->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('showPost',['slug'=>$request->title])->with('success','Post Updated');
    }

    public function destroy($id){      
       
     
       posts::findOrFail($id)->delete();

       return redirect()->route('home')->with('success','Post Deleted');
    }
}
