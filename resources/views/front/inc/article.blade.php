<article class="hentry post post-standard has-post-thumbnail sticky">

    <div class="post-thumb">

        <img src="{{ $post->getPhotoPath() }}" alt="{{ $post->slug }}">
        <div class="overlay"></div>
        <a href="{{ $post->getPhotoPath() }}" class="link-image js-zoom-image">
            <i class="seoicon-zoom"></i>
        </a>
        <a href="{{ route("post.single",$post->slug) }}" class="link-post">
            <i class="seoicon-link-bold"></i>
        </a>

    </div>

    <div class="post__content">
        <div class="post__content-info">

            <h2 class="post__title entry-title text-center">
                <a href="{{ route("post.single",$post->slug) }}">
                    {{ $post->title }}
                </a>
            </h2>

            <div class="post-additional-info">

                <span class="post__date">
                    <i class="seoicon-clock"></i>
                    <time class="published" datetime="2016-04-17 12:00:00">
                        {{ $post->created_at->diffForHumans() }}
                    </time>
                </span>

                <span class="category">
                    <i class="seoicon-tags"></i>
                    <a href="{{ route("category.single",$post->category->slug) }}">
                        {{ $post->category->name }}
                    </a>
                </span>

                <span class="post__comments">
                    <i class="fa fa-comment-o" aria-hidden="true"></i>
                    {{--{{ $post->comments()->count() }}--}}
                    5
                </span>

            </div>
        </div>

    </div>

</article>
