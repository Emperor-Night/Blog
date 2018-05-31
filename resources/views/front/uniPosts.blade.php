@extends("front.layouts.master")


@section("content")

    <?php

    $currentRoute = Route::currentRouteName();

    if ($currentRoute == "category.single") {
        $title = "Category | " . $category->name . " | Posts";
        $message = "No category's post found !";
    } else if ($currentRoute == "tag.single") {
        $title = "Tag | " . $tag->name . " | Posts";
        $message = "No tag's post found !";
    } else if ($currentRoute == "user.single") {
        $title = "Author | " . $user->name . " | Posts";
        $message = "No author's post found !";
    } else if ($currentRoute == "results") {
        $title = "Search results for : " . request("query");
        $message = "No posts found !";
    }

    ?>

    <div class="content-wrapper">

        <!-- Stunning Header -->

        <div class="stunning-header stunning-header-bg-lightviolet">
            <div class="stunning-header-content">
                <h1 class="stunning-header-title">{{ $title }}</h1>
            </div>
        </div>

        <!-- End Stunning Header -->

        <div class="container">
            <div class="row medium-padding120">
                <main class="main">

                    <div class="row">
                        <div class="case-item-wrap">

                            @if($posts->count())
                                @foreach($posts as $post)

                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        <div class="case-item">
                                            <div class="case-item__thumb">
                                                <a href="{{ route("post.single",$post->slug) }}">
                                                    <img src="{{ $post->getPhotoPath() }}" alt="{{ $post->slug }}"
                                                         style="height: 200px">
                                                </a>
                                            </div>
                                            <h6 class="case-item__title">
                                                <a href="{{ route("post.single",$post->slug) }}">{{ $post->title }}</a>
                                            </h6>
                                        </div>
                                    </div>

                                @endforeach
                            @else
                                <h3 class="text-center">{{ $message }}</h3>
                            @endif

                        </div>
                    </div>

                </main>
            </div>
        </div>

    </div>


@endsection