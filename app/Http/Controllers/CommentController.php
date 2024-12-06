<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use App\Models\Video;
use Illuminate\Http\Request;

class CommentController extends Controller
{

  public function store(StoreCommentRequest $request)
  {
    $data = $request->validated();

    $data['user_id'] = auth()->id();

    if (isset($data['parent_id'])) {

      $comment = Comment::create($data);
    } else {
      $comment = Comment::create($data);
    }

    return redirect()->back()->with('success', 'Comment added successfully!');
  }

}
