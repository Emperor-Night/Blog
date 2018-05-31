@extends("layouts.master")

@section("content")

    <div class="card">

        <div class="card-header">
            @if(isset($tag))
                @section("title","Tag | Edit")
                <h3>Edit tag</h3>
            @else
                @section("title","Tag | Create")
                <h3>Create tag</h3>
            @endif
        </div>

        <div class="card-body">

            @if(isset($tag))
                {!! Form::model($tag,["method"=>"PATCH","route"=>["tags.update",$tag->slug]]) !!}
            @else
                {!! Form::open(["method"=>"POST","route"=>"tags.store"]) !!}
            @endif

            <div class="form-group">
                {!! Form::label("name","Name :") !!}
                {!! Form::text("name",null,["class"=>"form-control " . getValClass($errors,"name")]) !!}
                {!! valMsg($errors, "name") !!}
            </div>

            <div class="form-group">
                @if(isset($tag))
                    {!! Form::button("Update <i class='fa fa-save'></i>",["class"=>"btn btn-success","type"=>"submit"]) !!}
                @else
                    {!! Form::button("Create <i class='fas fa-save'></i>",["class"=>"btn btn-success","type"=>"submit"]) !!}
                @endif
            </div>

            {!! Form::close() !!}

        </div>

    </div>


@endsection