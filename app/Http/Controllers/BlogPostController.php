<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class BlogPostController extends Controller
{
    public function index()
    {
        return view('blogposts', ['posts' => \App\Blogposts::all()]);
    }


    public function show($id)
    {
        return view('blogpost', ['post' => \App\Blogposts::find($id)]);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            // [Dėmesio] validacijoje unique turi būti nurodytas teisingas lentelės pavadinimas!
            // galime pažiūrėti, kas bus jei bus neteisingas
            'title' => 'required|unique:blogposts,title|max:7',
            'text' => 'required',
        ]);
        $pb = new \App\Blogposts();
        $pb->title = $request['title'];
        $pb->text = $request['text'];
        return ($pb->save() !== 1) ?
            redirect('/posts')->with('status_success', 'Post created!') :
            redirect('/posts')->with('status_error', 'Post was not created!');
    }

    public function destroy($id)
    {
        \App\Blogposts::destroy($id);
        return redirect('/posts')->with('status_success', 'Post deleted!');
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            // unique:table,column,except,idColumn
            'title' => 'required|unique:blogposts,title,' . $id . ',id|max:7',
            'text' => 'required',
        ]);
        $bp = \App\Blogposts::find($id);
        $bp->title = $request['title'];
        $bp->text = $request['text'];
        return ($bp->save() !== 1) ?
            redirect('/posts/' . $id)->with('status_success', 'Post updated!') :
            redirect('/posts/' . $id)->with('status_error', 'Post was not updated!');
    }
}
