<?php

namespace App\Services;

use App\Models\Blog;
use Illuminate\Support\Facades\Storage;

class BlogService
{
    public function createBlog(array $validatedData)
    {
        $validatedData['thumbnail'] = $this->storeThumbnail($validatedData['thumbnail']);

        $blog = Blog::create([
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
            'thumbnail' => $validatedData['thumbnail'],
            'author' => $validatedData['author'],
            'published_at' => $validatedData['published_at'],
        ]);



        return $blog;
    }


    public function updateBlog(Blog $blog, array $validatedData)
    {
        if (isset($validatedData['thumbnail'])) {

            Storage::disk('public')->delete($blog->thumbnail);

            $validatedData['thumbnail'] = $this->storeThumbnail($validatedData['thumbnail']);
        }

        $blog->update([
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
            'thumbnail' => $validatedData['thumbnail'] ?? $blog->thumbnail,
            'author' => $validatedData['author'],
            'published_at' => $validatedData['published_at'],
        ]);



        return $blog;
    }

    private function storeThumbnail($thumbnail): string
    {
        if ($thumbnail instanceof \Illuminate\Http\UploadedFile) {
            return $thumbnail->store('blogs_images', 'public');
        }

        throw new \Exception("Invalid thumbnail file.");
    }
}
