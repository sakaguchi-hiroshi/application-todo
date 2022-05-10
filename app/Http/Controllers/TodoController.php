<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $items = Todo::all();
        return view('index', ['items' => $items]);
    }

    public function create(Request $request)
    {
        $this->validate($request, Todo::$rules);
        $form = $request->all();
        Todo::create($form);
        return redirect('/');
    }
    public function edit(Request $request)
    {
        $form = Todo::find($request->id);
        return view('index', ['$item' => $form]);
    }
    public function update(Request $request)
    {
        if ($request->has('update')){
            $this->validate($request, Todo::$rules);
            $form = $request->all();
            unset($form['_token']);
            Todo::where('id', $request->id)->update($form);
        }
        return redirect('/');
    }
}
