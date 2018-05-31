@extends("layouts.master")

@section("content")

    <div class="card">

        <div class="card-header">
            @if(isset($post))
                @section("title","Post | Edit")
            <h3>Edit post</h3>
            @else
                @section("title","Post | Create")
            <h3>Create post</h3>
            @endif
        </div>

        <div class="card-body">

            @if(isset($post))
                {!! Form::model($post,["method"=>"PATCH","route"=>["posts.update",$post->id],"files"=>true]) !!}
            @else
                {!! Form::open(["method"=>"POST","route"=>"posts.store","files"=>true]) !!}
            @endif

            <div class="form-group">
                {!! Form::label("category_id","Category :") !!}
                {!! Form::select("category_id",$categories,null,["class"=>"form-control " . getValClass($errors,"category_id")]) !!}
                {!! valMsg($errors, "category_id") !!}
            </div>

            <div class="form-group">
                {!! Form::label("title","Title :") !!}
                {!! Form::text("title",null,["class"=>"form-control " . getValClass($errors,"title")]) !!}
                {!! valMsg($errors, "title") !!}
            </div>

            <div class="form-group">
                {!! Form::label("image","Image :") !!}
                {!! Form::file("image",["class"=>"form-control " . getValClass($errors,"image")]) !!}
                {!! valMsg($errors, "image") !!}
            </div>

            @if(isset($post))
                <label for="image">
                    <img src="{{ $post->getPhotoPath() }}" alt="{{ $post->slug }}" width="200" class="rounded mb-3 mt-1">
                </label>
                <br>
            @endif


            <div class="form-group">
                {!! Form::label("content","Content :") !!}
                {!! Form::textarea("content",null,["class"=>"form-control " . getValClass($errors,"content")]) !!}
                {!! valMsg($errors, "content") !!}
            </div>

            <label> Tags : </label>
            <div class="form-group">
                @if(isset($post))
                    @foreach($post->tags as $singleTag)
                        <?php
                        $arr[] = $singleTag->id;
                        ?>
                    @endforeach
                    @foreach($tags as $tag)
                        <label> {!! Form::checkbox("tags[]",$tag->id,in_array($tag->id,$arr)) !!} {{ $tag->name }} </label>
                    @endforeach

                @else
                    @foreach($tags as $tag)
                        <label> {!! Form::checkbox("tags[]",$tag->id,false) !!} {{ $tag->name }} </label>
                    @endforeach
                @endif

            </div>

            <div class="form-group">
                @if(isset($post))
                    {!! Form::button("Update <i class='fa fa-save'></i>",["class"=>"btn btn-success","type"=>"submit"]) !!}
                @else
                    {!! Form::button("Create <i class='fas fa-save'></i>",["class"=>"btn btn-success","type"=>"submit"]) !!}
                @endif
            </div>

            {!! Form::close() !!}

        </div>

    </div>

@endsection

@section("scripts")
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=hct6ngqwpfalfpx4zy7hhzzrnndym1kti6sxzrp2rqhjgm1q"></script>
    <script>tinymce.init({selector: 'textarea'});</script>
@endsection