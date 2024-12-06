<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\UpdateVideoRequest;
use App\Models\Section;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index(Section $section)
    {
        
        $videos = $section->videos; 
        return view('admin.sections.videos.index', compact('section', 'videos'));
    }

   
    public function create(Section $section)
    {
        return view('admin.sections.videos.create', compact('section'));
    }

    public function store(StoreVideoRequest $request, Section $section)
    {

        // dd($request->all())?;
        $validatedData = $request->validated();

        // Check if a video file is uploaded
        // if ($request->hasFile('video') && $request->file('video')->isValid()) {
        //     // Store the video in the 'videos' directory within 'storage/app/public'
        //     $videoPath = $request->file('video')->store('videos', 'public');

        //     // Save the video path to the database
        //     $validatedData['video'] = $videoPath;
        // }

        $section->videos()->create($validatedData);

        return redirect()->route('admin.sections.videos.index', $section)
            ->with('success', 'Video created successfully.');
    }

    public function edit(Section $section, Video $video)
    {
        return view('admin.sections.videos.edit', compact('section', 'video'));
    }

    public function update(UpdateVideoRequest $request, Section $section, Video $video)
    {
        $validatedData = $request->validated();

        $video->update($validatedData);

        return redirect()->route('admin.sections.videos.index', $section)
            ->with('success', 'Video updated successfully.');
    }

    public function destroy(Section $section, Video $video)
    {
        $video->delete();

        return redirect()->route('admin.sections.videos.index', $section)
            ->with('success', 'Video deleted successfully.');
    }

}
