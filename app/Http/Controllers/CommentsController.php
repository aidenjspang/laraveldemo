<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Comment;
use App\Http\Requests\CommentsRequest;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * CommentsController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\CommentsRequest $request
     * @param \App\Article $article
     * @return \Illuminate\Http\Response
     */
    public function store(CommentsRequest $request, Booking $booking)
    {
        $comment = $booking->comments()->create(array_merge(
            $request->all(),
            ['user_id' => $request->user()->id]
        ));

        //event(new \App\Events\ModelChanged(['articles']));
        //event(new \App\Events\CommentsEvent($comment));

        flash()->success(
            trans('forum.comments.success_writing')
        );

        return $this->respondCreated($booking, $comment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\CommentsRequest $request
     * @param \App\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function update(CommentsRequest $request, Comment $comment)
    {
        $this->authorize('update', $comment);

        $comment->update($request->all());

        return $this->respondUpdated($comment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return response()->json([], 204, [], JSON_PRETTY_PRINT);
    }

    /* Response Methods */

    /**
     * @param \App\Article $article
     * @param \App\Comment $comment
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    protected function respondCreated(Booking $booking, Comment $comment)
    {
        return redirect(
            route('bookings.show', $booking->id) . '#comment_' . $comment->id
        );
    }

    protected function respondUpdated(Comment $comment)
    {
        flash()->success(
            trans('forum.comments.success_updating')
        );

        return redirect(
            route('bookings.show', $comment->commentable->id) . '#comment_' . $comment->id
        );
    }
}
