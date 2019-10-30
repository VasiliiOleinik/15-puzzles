<div class="case-comm-item">
    <div class="comm-item-header"><img src="{{ $comment->user->img ? asset($comment->user->img) : asset('images/no_avatar.png') }}">
        <div class="item-header-info">
            <p class="comm-author">{{$comment->user->nickname}}</p><span class="comm-date">{{$comment->updated_at->format('d.m.Y')}}</span>
        </div>
    </div>
    <div class="comm-item-content">
        <p class="comm-item-text">{{$comment->content}}</p>
    </div>
</div>
