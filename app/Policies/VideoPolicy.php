<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Video;
use Illuminate\Auth\Access\HandlesAuthorization;

class VideoPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function view(User $user, Video $video)
    {
        return $user->courses->contains(function ($course) use ($video) {
            return $course->sections->contains(function ($section) use ($video) {
                return $section->id === $video->section_id;
            });
        });
    }


}
