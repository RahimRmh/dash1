<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Video;

class VideoController extends Controller
{
   
    public function show(Video $video)
    {
        $this->authorize('view', $video);

        $comments = $video->comments()->whereNull('parent_id')->with('replies.user')->get();

        return view('video.show', compact('video', 'comments'));        
    }

 
}
