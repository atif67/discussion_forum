@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header bg-dark text-white">
            <img src="{{ Gravatar::src($discussion->author->email) }}" alt="" width="40" height="40" class="rounded-circle mr-3">
            <strong>{{ $discussion->author->name }}</strong>
        </div>

        <div class="card-body">
            <h4>{{ $discussion->title }}</h4>
            <hr>
            {!! $discussion->content !!}
        </div>
    </div>

    <hr>    
    <p class="bg-dark text-white p-2 rounded">Replies..</p>
    <hr>
    @foreach ($discussion->replies()->paginate(10) as $reply)
        
        <div class="card my-3">
            <div class="card-header bg-dark text-white">
                <div class="d-flex justify-content-between">
                    <div>
                        <img src="{{ Gravatar::src($reply->user->email) }}" alt="" width="40" height="40" class="rounded-circle ">
                        <span>{{ $reply->user->name }}</span>
                    </div>
                </div>
            </div>
            <div class="card-body">
                {!! $reply->content !!}
            </div>
        </div>

    @endforeach

    {{ $discussion->replies()->paginate(10)->links('pagination::bootstrap-4') }}
        
    @auth
        <div class="card mt-3">
            <div class="card-header bg-dark text-white">
                Add a reply
            </div>
            <div class="card-body">
                <form action="{{ route('replies.store', $discussion->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="content" id="content">
                        <trix-editor input="content"></trix-editor>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-dark btn-sm my-1">Send Reply</button>
                    </div>
                    
                </form>


                

            </div>
        </div>
    @else
        <div class="card mt-3">
            <div class="card-header bg-dark text-white">
                Add a reply
            </div>
            <div class="card-body">
                <p>Please sign in for reply. <a href="{{ route('login') }}" class="btn btn-success btn-sm">Sign In</a></p>
            </div>
        </div>
    @endauth

@endsection


@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css"crossorigin="anonymous" />
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" crossorigin="anonymous"></script>
@endsection