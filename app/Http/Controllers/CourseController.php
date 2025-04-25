<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|unique:courses',
            'description' => 'nullable|string',
            'credits' => 'required|integer|min:1'
        ]);

        Course::create($validated);

        return redirect()->route('teacher.courses.index')
            ->with('success', 'تم إضافة المادة بنجاح.');
    }

    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }

    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|unique:courses,code,' . $course->id,
            'description' => 'nullable|string',
            'credits' => 'required|integer|min:1'
        ]);

        $course->update($validated);

        return redirect()->route('teacher.courses.index')
            ->with('success', 'تم تحديث المادة بنجاح.');
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('teacher.courses.index')
            ->with('success', 'تم حذف المادة بنجاح.');
    }

    public function enroll(Request $request, Course $course)
    {
        $student = Student::findOrFail($request->student_id);
        $student->courses()->attach($course->id);

        return redirect()->back()
            ->with('success', 'تم تسجيل الطالب في المادة بنجاح.');
    }

    public function unenroll(Request $request, Course $course)
    {
        $student = Student::findOrFail($request->student_id);
        $student->courses()->detach($course->id);

        return redirect()->back()
            ->with('success', 'تم إلغاء تسجيل الطالب من المادة بنجاح.');
    }
} 