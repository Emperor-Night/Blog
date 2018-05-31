@extends("layouts.master")

@section("title","Posts | Trashed")


@section("content")

    <div class="card">

        <div class="card-header">
            <h3>Trashed posts</h3>
        </div>

        <div class="card-body">

            @if(count($posts))
                @include("admin.posts.template")
            @else
                <h3 class="text-center">No trashed posts found</h3>
            @endif

        </div>

    </div>


@endsection