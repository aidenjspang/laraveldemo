<div class="page-header" style="margin-top: 30px !important;margin-bottom: 0px;">
    <h5 style="font-size: 17px;line-height: 1;color: #636b6f;font-weight: bold;">
        {{ trans('forum.comments.title') }}
    </h5>
</div>
<div class="form__new__comment">
    @include('comments.partial.create')
</div>
<div class="list__comment" style="padding-bottom: 5em;">
    @forelse($comments as $comment)
        @include('comments.partial.comment', [
          'parentId' => $comment->id,
          'isReply' => false,
          'hasChild' => $comment->replies->count(),
          'isTrashed' => $comment->trashed(),
        ])
    @empty
    @endforelse
</div>

@section('script')
    @parent
    <script>
        // 댓글 삭제 요청을 처리한다.
        $('.btn__delete__comment').on('click', function(e) {
            var commentId = $(this).closest('.item__comment').data('id'),
                articleId = $('#item__article').data('id');

            if (confirm('{{ trans('forum.comments.deleting') }}')) {
                $.ajax({
                    type: 'DELETE',
                    url: "/comments/" + commentId
                }).then(function() {
                    console.log($('#comment_' + commentId).find('.content__comment').first());
                    $('#comment_' + commentId)
                        .find('.content__comment')
                        .first()
                        .addClass('text-danger')
                        .fadeIn(1000, function () {
                            $(this).text('{{ trans('forum.comments.deleted') }}');
                        });
                });
            }
        });
    </script>
@endsection