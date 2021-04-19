<div class="card-header">
    <img src="{{ Gravatar::src($discussion->author->email) }}" alt="" width="40" height="40" class="rounded-circle mr-3">
    <strong>{{ $discussion->author->name }}</strong>
</div>