<div class="list-group">

    <a class="list-group-item {{ checkRoute("dashboard") }}"
       href="{{ route("dashboard") }}">Home</a>

    <a class="list-group-item {{ checkRoute(["categories.index","categories.edit"])}}"
       href="{{ route("categories.index") }}">All categories</a>
    <a class="list-group-item {{ checkRoute("categories.create") }}"
       href="{{ route("categories.create") }}">Create category</a>

    <a class="list-group-item {{ checkRoute(["tags.index","tags.edit"])}}"
       href="{{ route("tags.index") }}">All tags</a>
    <a class="list-group-item {{ checkRoute("tags.create") }}"
       href="{{ route("tags.create") }}">Create tag</a>

    <a class="list-group-item {{ checkRoute([
    "posts.index","posts.edit","users.posts","categories.posts","tags.posts"
    ]) }}"
       href="{{ route("posts.index") }}">All posts</a>
    <a class="list-group-item {{ checkRoute("posts.trashed") }}"
       href="{{ route("posts.trashed") }}">Trashed posts</a>
    <a class="list-group-item {{ checkRoute("posts.create") }}"
       href="{{ route("posts.create") }}">Create post</a>

    <a class="list-group-item {{ checkRoute([
    "comments.index","users.comments","categories.comments","posts.comments"
    ]) }}"
       href="{{ route("comments.index") }}">All comments</a>

    <a class="list-group-item {{ checkRoute("photos.index") }}"
       href="{{ route("photos.index") }}">All Photos</a>

    @if(auth()->user()->is_admin)
        <a class="list-group-item {{ checkRoute("users.index") }}"
           href="{{ route("users.index") }}">All users</a>
        <a class="list-group-item {{ checkRoute("users.create") }}"
           href="{{ route("users.create") }}">Create user</a>
        <a class="list-group-item {{ checkRoute("users.profile") }}"
           href="{{ route("users.profile") }}">My profile</a>
        <a class="list-group-item {{ checkRoute("settings.edit") }}"
           href="{{ route("settings.edit") }}">Settings</a>
    @else
        <a class="list-group-item {{ checkRoute("users.profile") }}"
           href="{{ route("users.profile") }}">My profile</a>
    @endif

</div>