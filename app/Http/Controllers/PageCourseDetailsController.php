<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PageCourseDetailsController extends Controller
{
    public function __invoke(Request $request, Course $course)
    {
        if (!$course->released_at) {
            throw new NotFoundHttpException;
        }

        if ($request->isMethod('post')) {
            if (!Gate::allows('buy-course')) {
                abort(403, 'Solo los clientes pueden comprar cursos.');
            }

            $course->loadCount('videos')->toSql();
        }

        return view('pages.course-details', compact('course'));
    }
}
