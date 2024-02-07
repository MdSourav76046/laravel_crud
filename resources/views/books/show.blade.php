@extends('layout')

@section('page-content')
<h1>Book Store</h1>
<table class="table table-striped table-bordered" >
    <tr>
        <th>ID</th>
        <td>{{$book->id}}</td>
    </tr>
    <tr>
        <th>Title</th>
        <td>{{$book->title}}</td>
    </tr>
    <tr>
        <th>Author</th>
        <td>{{$book->author}}</td>
    </tr>
    <tr>
        <th>ISBN</th>
        <td>{{$book->isbn}}</td>
    </tr> 
    <tr>
        <th>Stock</th>
        <td>{{$book->stock}}</td>
    </tr>
    <tr>
        <th>Price</th>
        <td>{{$book->price}}</td>
    </tr> 
</table>
<a href="{{route('books.index')}}" class="btn btn-danger">Back</a>
<a href="{{route('books.edit', $book->id)}}" class="btn btn-success">Edit</a>
@endsection