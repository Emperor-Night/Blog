@extends("layouts.master")

@section("title","Tags | Index")


@section("content")

    <div class="card">

        <div class="card-header">
            <h3>All tags</h3>
        </div>

        <div class="card-body">

            @if(count($tags))
                <table class="table table-hover">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Total posts</th>
                        <th>Created</th>
                        <th>Updated</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    @foreach($tags as $tag)
                        <tr>
                            <td>
                                {{ $tag->id }}
                            </td>
                            <td>
                                {{ $tag->name }}
                            </td>
                            <td>
                                <a href="{{ route("tags.posts",$tag->slug) }}">
                                    View posts <strong>({{ $tag->posts->count() }})</strong>
                                </a>
                            </td>
                            <td>
                                {{ $tag->created_at->toFormattedDateString() }}
                            </td>
                            <td>
                                {{ $tag->updated_at->diffForHumans() }}
                            </td>
                            <td>
                                <a href="{{ route("tags.edit",$tag->slug) }}" class="btn btn-info">
                                    Edit <i class="far fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                @if($tag->posts->count())
                                    Tag used
                                @else
                                    {!! deleteForm(route("tags.destroy",$tag->slug))  !!}
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table>

                <div class="mx-auto paginate">
                    {{ $tags->links() }}
                </div>

                @include("inc.deleteModal")
            @else
                <h3 class="text-center">No tags found</h3>
            @endif

        </div>

    </div>


@endsection