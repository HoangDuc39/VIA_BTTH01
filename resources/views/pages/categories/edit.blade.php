@extends('layouts.master')
@section('title', 'Category_edit')

@section('content')
    <main class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">EDIT CATEGORY</h3>
                <form action="{{ route('categories.update', $category->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatId">ID</span>
                        <input type="text" class="form-control" name="Id" readonly value="{{$category->id}}">
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" >Name:</span>
                        <input type="text" class="form-control" name="name" value = "{{$category->name}}">
                    </div>

                    <div class="form-group  float-end ">
                        <input type="submit" value="SAVE" class="btn btn-success">
                        <a href="{{route('categories.index')}}" class="btn btn-warning ">BACK</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
   @endsection
