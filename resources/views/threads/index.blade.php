@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Threads</div>

                    <div class="panel-body">
                        @foreach($threads as $thread)
                            <article>
                                <div class="level">

                                    <h4 class="flex">
                                        <a href="{{url($thread->path())}}">
                                            <h4>{{$thread->title}}</h4>
                                        </a>
                                    </h4>

                                    <a href="{{url($thread->path())}}">
                                        <strong> {{$thread->replies_count}} {{str_plural('comment',$thread->replies_count)}} </strong>
                                    </a>
                                </div>
                                <div class="body">{{$thread->body}}</div>
                            </article>
                            <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
