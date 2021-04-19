@extends('layouts.app')

@section('content')



    @foreach ($discussions as $discussion)
    <div class="card">
        <div class="card-header bg-dark text-white">
            <div class="d-flex justify-content-between">
                <div>
                    <img src="{{ Gravatar::src($discussion->author->email) }}" alt="" width="40" height="40" class="rounded-circle mr-3">
                    <strong>{{ $discussion->author->name }}</strong>
                </div>
                <div>
                    <a href="{{ route('discussions.show',$discussion->slug) }}" class="btn btn-light btn-sm">View</a>
                </div>
            </div>
            
        </div>
    
        <div class="card-body">
           {{ $discussion->title }}
        </div>
    </div>
    <br>
    @endforeach

    {{ $discussions->links('pagination::bootstrap-4') }}

@endsection
