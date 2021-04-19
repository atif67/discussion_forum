@extends('layouts.app')

@section('content')


    @if ($discussions->count() > 0)
        
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

    @else
        <div class="card">
            <div class="card-body">
                <p>Nothing Found :(</p>
            </div>
        </div>
    @endif

    @if (request()->query('channel'))
        {{ $discussions->appends(['channel' => request()->query('channel')])->links('pagination::bootstrap-4') }}
    @else
        {{ $discussions->links('pagination::bootstrap-4') }}
    @endif

@endsection
