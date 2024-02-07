@extends('layout')

@section('page-content')
<h2>Edit the Book</h2>

<form method="POST" action="{{route('books.update')}}">
    @csrf
        <input type="hidden" name="id" value="{{$book->id}}">
        <div class="form-group">
        <label for="exampleInputEmail1">Title</label>
        <input type="text" class="form-control" id="exampleInputEmail1" value="{{old('title', $book->title)}}" name="title" placeholder="Enter Title">
        <div>{{$errors -> first('title')}}</div>
        </div>
        
        <div class="form-group">
            <label for="exampleInputEmail1">Author</label>
            <input type="text" class="form-control" id="exampleInputEmail1" value="{{old('author', $book->author)}}" name="author" placeholder="Enter Author Name">
            <div>{{$errors -> first('author')}}</div>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">ISBN</label>
            <input type="text" class="form-control" id="exampleInputEmail1" value="{{old('isbn', $book->isbn)}}" name="isbn" placeholder="Enter ISBN">
            <div>{{$errors -> first('isbn')}}</div>
        </div>


        <div class="form-group">
            <label for="exampleInputEmail1">Stock</label>
            <input type="text" class="form-control" id="exampleInputEmail1" value="{{old('stock', $book->stock)}}" name="stock" placeholder="Enter Stock">
            <div ><p class=".text-danger">{{$errors -> first('stock')}}</p></div>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Price</label>
            <input type="text" class="form-control" id="exampleInputEmail1" value="{{old('price', $book->price)}}" name="price" placeholder="Enter Price">
            <div class=".text-danger">{{$errors -> first('price')}}</div>
        </div>
        <a href="{{route('books.index')}}" class="btn btn-danger"> Back </a>
        <button type="submit" class="btn btn-success">Create</button>
</form>
@endsection