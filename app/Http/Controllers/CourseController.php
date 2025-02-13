<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Course;
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

    public function store(StoreCourseRequest $request)
    {
        $validated = $request->validated();

        $validated['slug'] = Str::slug($validated['title']);

        Course::create($validated);

        return redirect()->route('admin.courses.index')->with('success', 'Curso creado correctamente.');
    }

    public function edit(Course $course)
    {
        return view('admin.courses.edit', compact('course'));
    }

    public function update(UpdateCourseRequest $request, Course $course)
    {
        if ($request->has('released_at')) {
            if ($course->videos()->exists()) {
                $course->update($request->only('released_at'));
                return redirect()->route('admin.courses.index')->with('success', 'Fecha de publicación actualizada.');
            } else {
                return redirect()->back()->with('error', 'No puedes añadir fecha sin videos.');
            }
        }

        $validated = $request->validated();

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
