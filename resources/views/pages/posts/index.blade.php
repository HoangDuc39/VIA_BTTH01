@extends('layouts.master')

@section('title', 'Posts_index')

@section('content')
        @if(session('success'))
        <div id ="success-alert" class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
    <main class="container mt-5 mb-5">
        <h3 class="text-center text-uppercase fw-bold">POST LIST</h3>
        <div class="row">
            <div class="col-sm">
                <a href="{{route('posts.create')}}" class="btn btn-success">ADD</a>
                <table class="table">

                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Thumbnail</th>
                            <th scope="col">Description</th>
                            <th scope="col">Content</th>
                            <th scope="col">created_at</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                   @foreach ($posts as $post)
                        <tr>
                            <th scope="row">{{$post->id}}</th>
                            <td>{{$post->name}}</td>
                            <td>
                                @foreach($post->categories as $category)
                                {{ $category->name }},
                                 @endforeach
                            </td>
                            <td><img src="{{ asset('thumbnail/' . $post->thumbnail) }}" class="card-img-top" alt="{{ $post->name }}" style="height: 120px;width:150px;"></td>
                            <td>{{$post->description}}</td>
                            <td>{{$post->content}}</td>
                            <td>{{$post->created_at}}</td>
                            <td>
                                <a href="{{ route('posts.edit', $post->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                            <td>
                                <form method="post" action="{{ route('posts.destroy', $post->id) }}">
                                    @csrf
                                    @method('DELETE')

                                    <input type="submit" class="btn btn-danger btn-sm" value="Delete" onclick="return confirm('Are you sure you want to delete this post?')"/>
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


