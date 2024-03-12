@extends('layouts.master')
@section('title', 'Posts_edit')

@section('content')
    <main class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">POST EDIT</h3>
                <form action="{{ route('posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatId">ID</span>
                        <input type="text" class="form-control" name="Id" readonly value="{{$post->id}}">
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" >Name:</span>
                        <input type="text" class="form-control" name="name" value = "{{$post->name}}">
                    </div>
                    <input type="text" class="form-control" name="slug" hidden>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" >Thumbnail:</span>
                        <input type="file" class="form-control" id="image" name="thumbnail" value = "{{$post->thumbnail}}">
                        <td><img src="{{ asset('thumbnail/' . $post->thumbnail) }}" class="card-img-top" alt="{{ $post->name }}" style="height: 120px;width:150px;"></td>
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" >Description</span>
                        <input type="text" class="form-control" name="description" value = "{{$post->description}}">
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" >Content</span>
                        <input type="text" class="form-control" name="content" value = "{{$post->content}}">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" >CATEGORY</span>
                        @foreach($categories as $category)
                            <label>
                            <input type="checkbox" name="category[]" value="{{$category->id}}" 
                            {{ $post->categories->contains($category->id) ? 'checked' : '' }}
                            />
                          {{$category->name}}
                        </label>
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
