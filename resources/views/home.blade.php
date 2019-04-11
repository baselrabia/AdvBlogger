@extends('layouts.app')
@section('panel-heading')
    Home
@endsection
@section('content')
      
     <div class="row">

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
           </div>

     </div>
     <hr>

     <h3>See Our Last Posts</h3>
     <hr>
                       


            @if (count($posts) > 0)
                @foreach($posts as $post)
                    <div class="well">
                        <div class="row">
                            <div class="col-md-4 col-sm-4">
                                <img src="{{asset("images/$post->imagePath") ?? asset("images/default.jpg") }}" style="width:50%;border-radis:50%"  alt="image">
                            </div>
                            <div class="col-md-8 col-sm-8">
                                <h3><a href="/posts/{{ $post->title }}">{{ $post->title }}</a></h3>
                                <small>Written {{ $post->created_at->diffForHumans() }} By {{ $post->admin->username }} </small>
                            </div>
                        </div>
                    </div>

                @endforeach
                @else
                    <div class="jumbtron">
                          There is no posts to show 
                    </div>
                @endif
            
        

@endsection
