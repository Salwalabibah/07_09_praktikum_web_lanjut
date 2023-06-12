@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="/articles" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title: </label>
                <input type="text" name="title" id="" class="form-control" required="required"><br>
                <label for="content">Content: </label>
                <textarea name="content" id="" cols="30" rows="10" class="form-control" required="required"></textarea><br>
                <label for="image">Feature Image: </label>
                <input type="fie" name="image" id="" class="form-control" required="required"><br>
                <button type="submit" name="submit" class="btn btn-primary float-lg-right">Simpan</button>
            </div>
        </form>
    </div>
@endsection
