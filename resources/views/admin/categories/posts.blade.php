@extends("layouts.master")

@section("title","Category | posts")


@section("content")

    <div class="card">

        <div class="card-header">
            <h3>Category | {{ $category->name }} | posts</h3>
        </div>

        <div class="card-body">

            @if(count($posts))
                @include("admin.posts.template")
            @else
                <h3 class="text-center">No category's posts found</h3>
            @endif

        </div>

    </div>


@endsection