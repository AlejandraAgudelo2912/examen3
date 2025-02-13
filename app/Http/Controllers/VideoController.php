<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::with('course')->latest()->paginate(10);
        return view('admin.videos.index', compact('videos'));
    }

    public function create()
    {
        $courses = Course::all();
        return view('admin.videos.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'duration_in_min' => 'required|integer|min:1',
            'vimeo_id' => 'required|string|unique:videos,vimeo_id',
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        Video::create($validated);

        return redirect()->route('admin.videos.index')->with('success', 'Vídeo creado correctamente.');
    }

    public function edit(Video $video)
    {
        $courses = Course::all();
        return view('admin.videos.edit', compact('video', 'courses'));
    }

    public function update(Request $request, Video $video)
    {
        $validated = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'duration_in_min' => 'required|integer|min:1',
            'vimeo_id' => 'required|string|unique:videos,vimeo_id,' . $video->id,
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        $video->update($validated);

        return redirect()->route('admin.videos.index')->with('success', 'Vídeo actualizado correctamente.');
    }

    public function destroy(Video $video)
    {
        $video->delete();

        return redirect()->route('admin.videos.index')->with('success', 'Vídeo eliminado correctamente.');
    }
}
