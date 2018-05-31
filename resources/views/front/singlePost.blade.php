@extends("front.layouts.master")

@section("content")

    <div class="content-wrapper">

        <!-- Stunning Header -->

        <div class="stunning-header stunning-header-bg-lightviolet">
            <div class="stunning-header-content">
                <h1 class="stunning-header-title">Title : {{ $title }}</h1>
            </div>
        </div>

        <!-- End Stunning Header -->

        <div class="container">
            <div class="row medium-padding120">
                <main class="main">

                    <div class="col-lg-10 col-lg-offset-1">

                        <article class="hentry post post-standard-details">

                            <div class="post-thumb">
                                <img src="{{ $post->getPhotoPath() }}" alt="{{ $post->slug }}" width="500">
                            </div>

                            <div class="post__content">
                                <div class="post-additional-info">

                                    <div class="post__author author vcard">
                                        Posted by
                                        <div class="post__author-name fn">
                                            <a href="{{ route("user.single",$post->user->slug) }}"
                                               class="post__author-link">
                                                {{ $post->user->name }}
                                            </a>
                                        </div>
                                    </div>

                                    <span class="post__date">
                                        <i class="seoicon-clock"></i>
                                        <time class="published" datetime="2016-03-20 12:00:00">
                                            {{ $post->created_at->toFormattedDateString() }}
                                        </time>
                                    </span>

                                    <span class="category">
                                        <a href="{{ route("category.single",$post->category->slug) }}">
                                            {{ $post->category->name }}
                                        </a>
                                    </span>

                                </div>

                                <div class="post__content-info">

                                    {!! $post->content !!}

                                    <div class="widget w-tags">
                                        <div class="tags-wrap">
                                            @foreach($post->tags as $tag)
                                                <a href="{{ route("tag.single",$tag->slug) }}"
                                                   class="w-tags-item">{{ $tag->name }}</a>
                                            @endforeach
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="addthis_inline_share_toolbox_1cp7"></div>


                        </article>

                        <div class="blog-details-author">

                            <div class="blog-details-author-thumb">
                                <a href="{{ route("user.single",$post->user->slug) }}">
                                    <img src="{{ $post->user->getPhotoPath() }}" alt="{{ $post->user->slug }}">
                                </a>
                            </div>

                            <div class="blog-details-author-content">
                                <div class="author-info">
                                    <h5 class="author-name">
                                        <a href="{{ route("user.single",$post->user->slug) }}">
                                            {{ $post->user->name }}
                                        </a>
                                    </h5>
                                    <p class="author-info">{!! $post->user->about !!}</p>
                                </div>
                                <p class="text">
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                                    nonummy nibh euismod.
                                </p>
                                <div class="socials">

                                    @if($post->user->facebook)
                                        <a href="{{ $post->user->facebook }}" class="social__item" target="_blank">
                                            <img src={{ asset("app/svg/circle-facebook.svg") }} alt="facebook">
                                        </a>
                                    @endif

                                    @if($post->user->youtube)
                                        <a href="{{ $post->user->youtube }}" class="social__item" target="_blank">
                                            <img src={{ asset("app/svg/youtube.svg") }} alt="youtube">
                                        </a>
                                    @endif

                                </div>
                            </div>
                        </div>

                        <div class="pagination-arrow">

                            @if($nextPost)
                                <a href="{{ route("post.single",$nextPost->slug) }}" class="btn-next-wrap">
                                    <div class="btn-content">
                                        <div class="btn-content-title">Next Post</div>
                                        <p class="btn-content-subtitle">{{ $nextPost->title }}</p>
                                    </div>
                                    <svg class="btn-next">
                                        <use xlink:href="#arrow-right"></use>
                                    </svg>
                                </a>
                            @endif

                            @if($prevPost)
                                <a href="{{ route("post.single",$prevPost->slug) }}" class="btn-prev-wrap">
                                    <svg class="btn-prev">
                                        <use xlink:href="#arrow-left"></use>
                                    </svg>
                                    <div class="btn-content">
                                        <div class="btn-content-title">Previous Post</div>
                                        <p class="btn-content-subtitle">{{ $prevPost->title }}</p>
                                    </div>
                                </a>
                            @endif

                        </div>

                        <div class="comments">

                            <div class="heading text-center">
                                <h4 class="h1 heading-title">Comments</h4>
                                <div class="heading-line">
                                    <span class="short-line"></span>
                                    <span class="long-line"></span>
                                </div>
                            </div>
                            @include("front.inc.disqus")
                        </div>

                    </div>
                    <!-- End Post Details -->

                    <!-- Sidebar-->
                    <div class="col-lg-12">
                        <aside aria-label="sidebar" class="sidebar sidebar-right">
                            <div class="widget w-tags">

                                <div class="heading text-center">
                                    <h4 class="heading-title">ALL BLOG TAGS</h4>
                                    <div class="heading-line">
                                        <span class="short-line"></span>
                                        <span class="long-line"></span>
                                    </div>
                                </div>

                                <div class="tags-wrap">
                                    @if($tags->count())
                                        @foreach($tags as $tag)
                                            <a href="{{ route("tag.single",$tag->slug) }}"
                                               class="w-tags-item">{{ $tag->name }}</a>
                                        @endforeach
                                    @else
                                        <h3 class="text-center">No tags found !</h3>
                                    @endif
                                </div>

                            </div>
                        </aside>
                    </div>
                    <!-- End Sidebar-->

                </main>


            </div>
        </div>

    </div>


@endsection