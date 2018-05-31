<table class="table table-hover">
    <tr>
        <th>Id</th>
        <th>Image</th>
        <th>Author</th>
        <th>Category</th>
        <th>Total comments</th>
        <th>Title</th>
        <th>Content</th>
        <th>Created</th>
        <th>Updated</th>
        <th>Edit</th>
        <th>Status</th>
        <th>Delete</th>
    </tr>
    @foreach($posts as $post)
        <tr>
            <td>
                {{ $post->id }}
            </td>
            <td>
                <a href="{{ route("post.single",$post->slug) }}">
                    <img src="{{ $post->getPhotoPath() }}" alt="{{ $post->slug }}" width="50">
                </a>
            </td>
            <td>
                <a href="{{ route("users.posts",$post->user->slug) }}">
                    {{ $post->user->name }}
                </a>
            </td>
            <td>
                <a href="{{ route("categories.posts",$post->category->slug) }}">
                    {{ $post->category->name }}
                </a>
            </td>
            <td>
                <a href="{{ route("posts.comments",$post->id) }}">
                    View comments <strong>({{ $post->comments->count() }})</strong>
                </a>
            </td>
            <td class="text-uppercase">
                {{ $post->title }}
            </td>
            <td>
                {{ str_limit(strip_tags($post->content),30) }}
            </td>
            <td>
                {{ $post->created_at->toFormattedDateString() }}
            </td>
            <td>
                {{ $post->updated_at->diffForHumans() }}
            </td>
            <td>
                <a href="{{ route("posts.edit",$post->id) }}" class="btn btn-info">
                    Edit <i class="far fa-edit"></i>
                </a>
            </td>
            <td>
                @if($post->deleted_at)
                    {!! Form::open(["method"=>"PATCH","route"=>["posts.trashed.restore",$post->id]]) !!}
                    {!! Form::button("Trashed <i class='far fa-thumbs-down'></i>",["class"=>"btn btn-warning","type"=>"submit"]) !!}
                    {!! Form::close() !!}
                @else
                    {!! Form::open(["method"=>"DELETE","route"=>["posts.destroy",$post->id]]) !!}
                    {!! Form::button("Active <i class='far fa-thumbs-up'></i>",["class"=>"btn btn-success","type"=>"submit"]) !!}
                    {!! Form::close() !!}
                @endif
            </td>
            <td>
                {!! deleteForm(route("posts.permanent.destroy",$post->id))  !!}
            </td>
        </tr>
    @endforeach
</table>

<div class="mx-auto paginate">
    {{ $posts->links() }}
</div>

@include("inc.deleteModal")