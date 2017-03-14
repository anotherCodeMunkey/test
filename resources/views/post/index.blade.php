@extends('app')

@section('content')

<div class="container-fluid">
    
        <div class="col-md-8 col-md-offset-2">
            


            {!! Form::open(['route' => 'post.store', 'class' => 'form-inline']) !!}

            <div class="form-group">
                
                {!! Form::textarea('post', null, ['class' => 'form-control', 'placeholder' => 'Your Comment', 'cols' => '60', 'rows' => '3']) !!}
                {!! Form::hidden('author_id', Auth::id(), ['readonly']) !!}
                {!! Form::button('', ['type' => 'submit', 'class' => 'btn btn-primary glyphicon glyphicon-send', 'style'=> 'width:75px;height:75px;']) !!}
            </div>
            
            {!! Form::close() !!}
            {{ $errors->first('post') }}
            

            @foreach($posts as $post)
            
            @if($post->author_id === "")
            <h5>
                Anonymous
            </h5>
            @else
            <h5>
                {{ $user->getUserById($post->author_id)->name }}
            </h5>
            @endif
            
            {{ $post->created_at->diffForHumans()}}
            <p style="word-wrap: break-word;">
                {{ $post->post }}
            </p>
            <br>
            @endforeach

        </div>
    
</div>

@stop