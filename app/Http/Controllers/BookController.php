<?php

namespace App\Http\Controllers;
use App\Models\Book;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function view(){
        return view('welcome');
    }

    public function index(Request $request){
        if($request-> has('search')){
             $books = Book::where('title', 'like', '%'.$request->search.'%')
            -> orWhere('author', 'like', '%'.$request->search.'%')
            ->paginate(10);
        }
        else {
            $books = Book::paginate(10);
        }
        return view('books.index') -> with('books', $books); 
    }

    public function show($book_id){
        $book = Book::find($book_id);
        return view('books.show')->with('book', $book);
    }

    public function create(){
        return view('books.create');
    }

    public function store(Request $request){
        $list = [
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'isbn' => 'required|digits:13|numeric',
            'stock' => 'required|numeric|min:0|integer',
            'price' => 'required|numeric|min:0'
        ];

        $request -> validate($list);
        $book = new Book;
        $book -> title = $request -> title;
        $book -> author = $request -> author;
        $book -> isbn = $request -> isbn;
        $book -> price = $request -> price;
        $book -> stock = $request -> stock;
        $book -> save();
        return redirect() -> route('books.index');
        // echo '<pre>';
        // print_r($request->all());
        // echo '<pre>';
    }

    public function edit($book_id){
        $book = Book::find($book_id);
        return view('books.edit') -> with('book', $book);
    }

    public function update(Request $request){
        $list = [
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'isbn' => 'required|digits:13|numeric',
            'stock' => 'required|numeric|min:0|integer',
            'price' => 'required|numeric|min:0'
        ];

        $request -> validate($list);
        $book = Book::find($request->id);
        $book -> title = $request -> title;
        $book -> author = $request -> author;
        $book -> isbn = $request -> isbn;
        $book -> price = $request -> price;
        $book -> stock = $request -> stock;
        $book -> save();
        return redirect() -> route('books.index');

    }
    public function destroy(Request $request){
        $book = Book::find($request -> id);
        $book -> delete();
        return redirect() -> route('books.index');
        // echo '<pre>';
        // print_r($request->all());
        // echo '<pre>';
    }
}
