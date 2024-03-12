@extends('layouts.master')
@section('title', 'Posts_add')
@section('content')

    <main class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">ADD NEW POST</h3>
                <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" >Name:</span>
                        <input type="text" class="form-control" name="name" required>
                    </div>

                    <input type="text" class="form-control" name="slug" hidden>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" >Thumbnail</span>
                        {{-- <td><img src="{{ asset('images/' . $post->hinhanh) }}" class="card-img-top" alt="{{ $post->tieude }}"></td> --}}
                        <input type="file" class="form-control" id="image" name="thumbnail" required>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" >Description</span>
                        <input type="text" class="form-control" name="description" required>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" >Content</span>
                        <input  type="text" class="form-control" name="content" >
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" >Category</span>
                            @foreach ($categories as $category)
                        <input type="checkbox" name="category[]" value="{{$category->id}}"/>
                        <label>{{$category->name}}</label> <br/>
                        @endforeach

                    </div>

                    <div class="form-group  float-end ">
                        <input type="submit" value="SAVE" class="btn btn-success">
                        <a href="{{route('posts.index')}}" class="btn btn-warning ">BACK</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
    @endsection
