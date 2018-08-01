<div class="media item__comment {{ $isReply ? 'sub' : 'top' }}" data-id= "{{ $comment->id }}" id="comment_{{ $comment->id }}">

    <div class="media-body">
        <h5 class="media-heading">
           {{ $comment->user->name }}
        <small>
                {{ $comment->created_at }}
        </small>
        </h5>

        <div class="content__comment">
            {!! markdown($comment->content) !!}
        </div>

    </div>
</div>