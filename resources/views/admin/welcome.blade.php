@extends("layouts.master")

@section("title","Admin | Dashboard")


@section("content")

    <div class="card">

        <div class="card-header">
            <h2>Welcome {{ auth()->user()->name }} !</h2>
        </div>

        <div class="card-body">

            <div class="row">

                {{ makeWidget($totalPosts,"Total posts","bg-info",route("posts.index")) }}
                {{ makeWidget($totalTrashedPosts,"Trashed posts","bg-success",route("posts.trashed")) }}
                {{ makeWidget($totalComments,"Total comments","bg-primary",route("comments.index")) }}

            </div>

            <div class="row mt-4">

                {{ makeWidget($totalTags,"Total tags","bg-info",route("tags.index")) }}
                {{ makeWidget($totalCategories,"Total categories","bg-success",route("categories.index")) }}
                {{ makeWidget($totalPhotos,"Total photos","bg-primary",route("photos.index")) }}

            </div>

            <div class="row mt-4">

                @if(auth()->user()->is_admin)
                    {{ makeWidget($totalUsers,"Total users","bg-info",route("users.index")) }}
                @endif

            </div>

        </div>

    </div>


@endsection