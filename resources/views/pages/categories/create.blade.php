@extends('layouts.master')
@section('title', 'Categories_add')
@section('content')
    <main class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">ADD NEW CATEGORY</h3>
                <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" >Name:</span>
                        <input type="text" class="form-control" name="name" required>
                    </div>


                    <div class="form-group  float-end ">
                        <input type="submit" value="ADD" class="btn btn-success">
                        <a href="{{route('categories.index')}}" class="btn btn-warning ">BACK</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
    @endsection
