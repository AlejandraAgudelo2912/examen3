<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::latest()->paginate(10);
        return view('admin.courses.index', compact('courses'));
    }

    public function create()
    {
        return view('admin.courses.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'paddle_product_id' => 'required|string|unique:courses,paddle_product_id',
            'title' => 'required|string|max:255',
            'tagline' => 'required|string|max:255',
            'description' => 'required|string',
            'image_name' => 'required|string',
            'learnings' => 'required|array',
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        Course::create($validated);

        return redirect()->route('admin.courses.index')->with('success', 'Curso creado correctamente.');
    }

    public function edit(Course $course)
    {
        return view('admin.courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        if ($request->has('released_at')) {
            if ($course->videos()->exists()) {
                $course->update($request->only('released_at'));
                return redirect()->route('admin.courses.index')->with('success', 'Fecha de publicación actualizada.');
            } else {
                return redirect()->back()->with('error', 'No puedes añadir fecha sin videos.');
            }
        }

        $validated = $request->validate([
            'paddle_product_id' => 'required|string|unique:courses,paddle_product_id,' . $course->id,
            'title' => 'required|string|max:255',
            'tagline' => 'required|string|max:255',
            'description' => 'required|string',
            'image_name' => 'required|string',
            'learnings' => 'required|array',
            'released_at' => 'nullable|date',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $course->update($validated);

        return redirect()->route('admin.courses.index')->with('success', 'Curso actualizado correctamente.');
    }

    public function destroy(Course $course)
    {
        if ($course->videos()->exists() && $course->purchasedByUsers()->exists()) {
            return redirect()->route('admin.courses.index')->with('error', 'No puedes borrar un curso con videos comprados.');
        }

        if ($course->videos()->exists()) {
            $course->videos()->delete();
        }

        $course->delete();

        return redirect()->route('admin.courses.index')->with('success', 'Curso eliminado correctamente.');
    }
}
