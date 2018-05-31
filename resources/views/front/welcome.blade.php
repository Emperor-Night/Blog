@extends("front.layouts.master")

@section("content")

    <div class="header-spacer"></div>

    <div class="container">

        <div class="row">
            <div class="col-lg-2"></div>

            <div class="col-lg-8">
                @if(isset($latestPost))
                    @include("front.inc.article",["post" => $latestPost])
                @endif
            </div>

            <div class="col-lg-2"></div>
        </div>

        <div class="row">

            <div class="col-lg-6">
                @if(isset($secondPost))
                    @include("front.inc.article",["post" => $secondPost])
                @endif
            </div>

            <div class="col-lg-6">
                @if(isset($thirdPost))
                    @include("front.inc.article",["post" => $thirdPost])
                @endif
            </div>

        </div>

    </div>


    <div class="container-fluid">
        <div class="row medium-padding120 bg-border-color">
            <div class="container">
                <div class="col-lg-12">

                    <div class="offers">

                        @if($categories->count())
                            @foreach($categories as $category)

                                <div class="row">
                                    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                                        <div class="heading">
                                            <h4 class="h1 heading-title">{{ $category->name }}</h4>
                                            <div class="heading-line">
                                                <span class="short-line"></span>
                                                <span class="long-line"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="case-item-wrap">

                                        @foreach($category->posts->take(3) as $post)

                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                <div class="case-item">
                                                    <div class="case-item__thumb">
                                                        <a href="{{ route("post.single",$post->slug) }}">
                                                            <img src="{{ $post->getPhotoPath() }}"
                                                                 alt="{{ $post->slug }}"
                                                                 style="height: 150px">
                                                        </a>
                                                    </div>
                                                    <h6 class="case-item__title text-center">
                                                        <a href="{{ route("post.single",$post->slug) }}">
                                                            {{ $post->title }}
                                                        </a>
                                                    </h6>
                                                </div>
                                            </div>

                                        @endforeach

                                    </div>
                                </div>

                            @endforeach
                        @else
                            <h3 class="text-center">No categories found !</h3>
                        @endif

                    </div>

                    <div class="padded-50"></div>

                </div>
            </div>
        </div>
    </div>


@endsection