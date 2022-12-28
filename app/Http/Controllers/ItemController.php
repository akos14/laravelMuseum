<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Label;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('items.index', [ 
            'items' => Item::orderBy('obtained', 'DESC') -> paginate(10),
            'labels' => Label::all(),
            'item_count' => Item::count(),
            'user_count' => User::count(),
            'label_count' => Label::count(),
            'comment_count' => Comment::count()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Item::class);
        return view('items.create', ['labels' => Label::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Item::class);
        $validated = $request -> validate(
            ['name' => 'required|min:2|max:25|unique:items',
            'obtained' => 'required|date_format:Y-m-d|before_or_equal:today',
            'description' => 'required|min:5|max:1200',
            'labels' => 'nullable',
            'labels.*' => 'integer|distinct|exists:labels,id',
            'image' => 'nullable|image'],
            ['obtained.before_or_equal' => 'A bekerülési dátum nem lehet későbbi dátum, mint ma!']
        );

        if ($request -> hasFile('image')){
            $file = $request -> file('image');
            $fname = $file -> hashName();
            Storage::disk('public') -> put('images/' . $fname, $file -> get());
            $validated['image'] = $fname;
        }

        $i = Item::create($validated);

        $i -> labels() -> sync($request -> labels);

        Session::flash('item-changed', $i -> name . " tárgy felvitele");

        return redirect() -> route('items.show', $i);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return view('items.show', [
            'item' => $item,
            'labels' => $item -> labels->where('display', True),
            'comments' => $item -> comments() -> orderBy('created_at', 'ASC') -> get(),
            'comment_count' => $item -> comments -> count()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        $this -> authorize('update', $item);
        return view('items.edit', [
            'item' => $item,
            'labels' => Label::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $this->authorize('update', $item);
        $validated = $request -> validate(
            ['name' => ['required', 'min:2', 'max:25', Rule::unique('items', 'name')->ignore($item)],
            'obtained' => 'required|date_format:Y-m-d|before_or_equal:today',
            'description' => 'required|min:5|max:1200',
            'labels' => 'nullable',
            'labels.*' => 'integer|distinct|exists:labels,id',
            'image' => 'nullable|image'],
            ['obtained.before_or_equal:today' => 'A bekerülési dátum nem lehet későbbi dátum, mint ma!']
        );

        if ($request -> hasFile('image')){
            $file = $request -> file('image');
            if(!$item -> image){
                $fname = $file -> hashName();
            } else {
                $fname = $item -> image;
            }     
            Storage::disk('public') -> put('images/' . $fname, $file -> get());
            $validated['image'] = $fname;
        }
        
        $item -> update($validated);

        $item -> labels() -> sync($request -> labels);

        Session::flash('item-changed', $item -> name . " tárgy szerkesztése");

        return redirect() -> route('items.show', $item);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $this -> authorize('delete', $item);
        if ($item -> image){
            Storage::disk('public') -> delete('images/' . $item -> image);
        }
        $item -> delete();
        Session::flash('item-changed', $item -> name . " tárgy törlése");
        return redirect() -> route('home');
    }
}
