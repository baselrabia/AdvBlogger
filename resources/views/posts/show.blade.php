@extends('layouts.app')
@section('style')
    <link href="{{ asset('css/comment.css') }}" rel="stylesheet">

@endsection
@section('panel-heading')
    <p class="text-cener">{{ $post->admin->first_name . ' ' . $post->admin->last_name . '\'s ' }} Post</p>
@endsection
@section('content')

	 <div class="col-sm-12">
        <div class="panel panel-white post panel-shadow">
            <div class="post-heading">
                <div class="pull-left image">
                   <img src="/profile_pictures/{{ $post->admin->profile_picture ?? 'default.png'}}" class="img-circle avatar" alt="User Profile Image" style="object-fit: cover;">
                </div>
                <div class="pull-left meta">
                    <div class="title h5">
                        <a href="#"><b>{{ $post->admin->first_name . ' ' . $post->admin->last_name }}</b></a>
                        made a post.
                        <p><small> {{ $post->admin->roles->first()->name }}</small></p>
                    </div>
                    <h6 class="text-muted time">{{ $post->created_at }}</h6>
                </div>
            </div> 
            <hr>
            <div id="artiststhumbnail">
            <img src="{{asset("images/$post->imagePath") }}" style="width:50%;border-radis:50% "  alt="image">
				</div>
				<h1><a href="/posts/{{ $post->title }}">{{ $post->title }}</a></h1>



            <div class="post-description"> 
                {{ $post->body }}
                 @if (Sentinel::getUser()->hasAnyAccess(['admin.*','moderator.*']))
                <div class="pull-right">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Post Managing
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            @if ($post->approved === 0)
                                @if (Sentinel::getUser()->hasAccess('*.approve'))
                                    <li>
                                        <a href="{{ route('posts.approve',$post->id) }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('approve-form').submit();">
                                            Approve
                                        </a>

                                        <form id="approve-form" action="{{ route('posts.approve',$post->id) }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                @endif
                            @endif
                            @if (Sentinel::getUser()->hasAccess('*.delete'))
                                {{-- expr --}}
                                <li>
                                        <a href="{{ route('posts.destroy',$post->title) }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('destroy-form').submit();">
                                            Delete
                                        </a>

                                        <form id="destroy-form" action="{{ route('posts.destroy',$post->title) }}" method="POST" style="display: none;">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            
                                        </form>
                                    </li>
                            @endif
                            @if (Sentinel::getUser()->hasAccess('*.edit'))
                                <li>
                                        <a href="{{ route('posts.edit',$post->title) }}">
                                        Edit
                                        </a>

                                        
                                    </li>
                            @endif
                        </ul>
                    </div>
                </div>
                @endif
                
            </div>
            <div class="post-footer">
                <form action=" {{ route('comments.store',$post->title) }}" method="POST">
                    {{csrf_field()}}
                    <div class="input-group"> 
                        <input class="form-control" placeholder="Add a comment" type="text" name="comment" style="height:50px;">
                        
                        <span class="input-group-addon">
                            <a ><i class="fa fa-pencil"></i></a>  
                        </span>
                        
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary form-control">
                            <i class="fa fa-commenting-o" aria-hidden="true"></i>
                            Add Comment
                        </button>
                    </div>
                </form>
                @foreach ($post->comments as $comment)
                    {{-- expr --}}
                    <ul class="comments-list">
                        <li class="comment">
                            <a class="pull-left" href="/profile/{{$comment->user->username}}">
                                <img src="/profile_pictures/{{ $post->admin->profile_picture ?? 'default.png'}}" class="img-circle avatar" style="object-fit: cover;" alt="User Profile Image">
                            </a>
                            <div class="comment-body">
                                <div class="comment-heading">
                                    <h4 class="user">{{ $comment->user->first_name .' ' . $comment->user->last_name }}</h4>
                                    @if ($comment->created_at)
										<h5 class="time">{{ $comment->created_at->diffForHumans() }}</h5>
									@else
										<h5 class="time"> NO TIME FOUND</h5>
									@endif
                                  
                                </div>
                               
                                    @if (\Route::currentRouteName() == 'comments.edit' && request()->route('comment')->id === $comment->id)
                                        <form action="{{ route('comments.update', $comment->id ) }}" method="POST" >
                                            {{ csrf_field() }}
                                            {{ method_field('PUT') }}

                                            <input type="text" name="comment" value="{{ $comment->body }}" class="form-control">
                                            <hr>
                                            <input type="submit" class="form-control btn btn-default" value="Edit Comment">
                                        </form>
                                    @else
                                        <h4> {{ $comment->body }}</h4>
                                    
                                        <small>
                                            <p>
                                                <a href="/comments/{{$comment->id}}/{{ $post->title}}"> Edit </a>
                                                |

                                                    <a href="{{ route('comments.destroy',$comment->id) }}"
                                                    onclick="event.preventDefault();
                                                             document.getElementById('comment-destroy-form{{ $comment->id }}').submit();">
                                                    Delete
                                                </a>

                                                <form id="comment-destroy-form{{ $comment->id }}" action="{{ route('comments.destroy',$comment->id) }}" method="POST" style="display: none;">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    
                                                </form>

                                            </p>
                                        </small>
                                @endif
                            </div>
                            <ul class="comments-list">
                                <li class="comment">
                                    <form action="{{ route('replies.store',['post' => $post->title,'comment' => $comment->id]) }}" method="POST">
                                        {{ csrf_field() }}
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                            <input type="text" name="comment" placeholder="Add a reply" class="form-control" style="height: 50px;">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary form-control">
                                                <i class="fa fa-reply" aria-hidden="true"></i>
                                                Add Reply
                                            </button>
                                        </div>

                                    </form>
                                    @if ($comment->replies->count())
                                        @foreach ($comment->replies as $reply)
                                            <a class="pull-left" href="/profile/{{$comment->user->username}}">
                                                <img src="/profile_pictures/{{ $post->admin->profile_picture ?? 'default.png'}}" class="img-circle avatar" style="object-fit: cover;" alt="User Profile Image">
                                            </a>                                            
                                            <div class="comment-body">
                                                <div class="comment-heading">
                                                    <h4 class="user">{{ $reply->user->first_name . ' '. $reply->user->last_name }}</h4>
                                                    <h5 class="time">{{ $reply->created_at->diffForHumans() }}</h5>
                                                    <p> {{ $reply->user->roles->first()->name }}</p>
                                                </div>
                                            
                                                @if (\Route::currentRouteName() == 'replies.edit' && request()->route('reply')->id === $reply->id)
                                                    <form action="{{ route('replies.update', ['reply' => $reply->id ,'comment' => $comment->id , 'post' => $post->title]) }}" method="POST">
                                                        {{ method_field('PUT') }}
                                                        {{ csrf_field() }}
                                                        <input type="text" name="comment" value="{{ $reply->body }}" class="form-control">
                                                        <hr>
                                                        <input type="submit" class="form-control btn btn-default" value="Edit Reply">
                                                    </form>
                                                @else
                                                    <h4> {{ $reply->body }}</h4>
                                        
                                                    <small>
                                                    <p>
                                                    <a href="/replies/{{$reply->id}}/{{ $post->title}}"> Edit </a>
                                                    | 
                                                     <a href="{{ route('replies.destroy',$reply->id) }}"
                                                        onclick="event.preventDefault();
                                                                 document.getElementById('reply-destroy-form{{ $reply->id }}').submit();">
                                                        Delete
                                                    </a>

                                                    <form id="reply-destroy-form{{ $reply->id }}" action="{{ route('replies.destroy',$reply->id) }}" method="POST" style="display: none;">
                                                        {{ method_field('DELETE') }}
                                                        {{ csrf_field() }}
                                                        
                                                    </form>

                                                    </p>
                                                    </small>

                                                @endif

                                        </div>
                                    @endforeach
                                @endif
                                  
                                </li> 

                            </ul>
                        </li>
                    </ul>
                @endforeach
            </div>
        </div>
    </div>

@endsection

