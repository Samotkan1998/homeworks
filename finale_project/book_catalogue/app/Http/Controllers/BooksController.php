<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Books::all();

        return view('books.index', [
            'books' => $books
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'writer' => 'required|string',
            'genre' => 'required|string',
            'photo_src' => 'required|string',
            'annotation' => 'required|string',
        ]);

        /** @var Books $book */
        $book = new Books();
        $book->title = $request->get('title');
        $book->writer = $request->get('writer');
        $book->genre = $request->get('genre');
        $book->photo_src = $request->get('photo_src');
        $book->annotation = $request->get('annotation');
        $book->save();

        return redirect(route('books.store'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function show(Books $book)
    {
        return view('books.show', [
            'book' => $book
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function edit(Books $books)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Books $books)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function destroy(Books $books)
    {
        //
    }
}
