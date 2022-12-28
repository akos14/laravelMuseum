<?php

namespace App\Http\Controllers;

use App\Models\Label;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class LabelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $this->authorize('create', Label::class);
        return view('labels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Label::class);
        $validated = $request -> validate(
            ['name' => 'required|min:3|max:20|unique:labels',
            'bg-color' => 'required|regex:/^#([0-9a-f]{8})$/i',
            'display' => 'required|in:0,1']
        );

        $validated['color'] = $validated['bg-color'];

        $l = Label::create($validated);

        Session::flash('label-changed', $l -> name . " címke felvitele");

        return redirect() -> route('labels.show', $l);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Label  $label
     * @return \Illuminate\Http\Response
     */
    public function show(Label $label)
    {
        return view('labels.show', [
            'label' => $label,
            'items' => $label -> items() -> get(),
            'item_count' => $label -> items() -> count(),
            'labels' => Label::all(),
            'user_count' => User::count(),
            'comment_count' => Comment::count()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Label  $label
     * @return \Illuminate\Http\Response
     */
    public function edit(Label $label)
    {
        $this->authorize('update', $label);
        return view('labels.edit', ['label' => $label]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Label  $label
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Label $label)
    {
        $this->authorize('update', $label);
        $validated = $request -> validate(
            ['name' => ['required', 'min:3', 'max:20', Rule::unique('labels', 'name')->ignore($label)],
            'bg-color' => 'required|regex:/^#([0-9a-f]{8})$/i',
            'display' => 'required|in:0,1']
        );

        $validated['color'] = $validated['bg-color'];

        $label -> update($validated);

        Session::flash('label-changed', $label -> name . " címke szerkesztése");
        return redirect() -> route('labels.show', $label);        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Label  $label
     * @return \Illuminate\Http\Response
     */
    public function destroy(Label $label)
    {
        $this -> authorize('delete', $label);
        $label -> delete();
        Session::flash('label-changed', $label -> name . " címke törlése");
        return redirect() -> route('home');
    }
}
