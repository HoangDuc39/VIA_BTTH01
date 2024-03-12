@extends('layouts.master')

@section('title', 'Categories_index')

@section('content')
        @if(session('success'))
        <div id ="success-alert" class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
    <main class="container mt-5 mb-5">
        <h3 class="text-center text-uppercase fw-bold">CATEGORY LIST</h3>
        <div class="row">
            <div class="col-sm">
                <a href="{{route('categories.create')}}" class="btn btn-success">ADD</a>
                <table class="table">

                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">created_at</th>
                            <th>EDIT</th>
                            <th>DELETE</th>
                        </tr>
                    </thead>
                    <tbody>
                   @foreach ($categories as $category)
                        <tr>
                            <th scope="row">{{$category->id}}</th>
                            <td>{{$category->name}}</td>
                            <td>{{$category->created_at}}</td>
                            <td>
                                <a href="{{ route('categories.edit', $category->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                            <td>
                                <form method="post" action="{{ route('categories.destroy', $category->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-danger btn-sm" value="Delete" onclick="return confirm('Are you sure you want to delete this category?')"/>
                                </form>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>

                </table>

            </div>
        </div>
    </main>
@endsection
@section('scripts')
<script>
    setTimeout(function() {
        document.getElementById('success-alert').style.display = 'none';
    }, 3000); 
  
</script>
@endsection


