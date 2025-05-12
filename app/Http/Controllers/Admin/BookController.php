<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Courses\StoreRequest;
use App\Http\Requests\Admin\Courses\UpdateRequest;
use App\Models\Course;
use App\Models\Teacher;
use App\Models\TeacherCourse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use App\helpers\Helper;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.books.index');
    }
    public function datatable() {

        $model = Course::query();

        return DataTables::eloquent($model)
            ->addColumn('actions', function(Course $course) {
                $action = '<a class="btn btn-outline-primary btn-sm btn-action me-3" href="'.route('admin.books.edit', ['course' => $course]).'">'.__('Görüntüle').'</a>';
                $action .= '<a data-id="' . $course->id . '" data-url="' . route('admin.books.destroy', ['course' => $course]) . '" role="button" class="btn btn-outline-danger btn-sm btn-delete">'.__('Sil').'</a>';

                return $action;
            })
            ->rawColumns(['id', 'title', 'category', 'actions'])
            ->make();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teachers = Teacher::query()
            ->get();
        return view('admin.books.create',[
            'teachers' => $teachers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {

        DB::beginTransaction();
        try {
            $req = $request->validated();

            $course = Course::query()
                ->create([
                    'title'=>$req['title'],
                    'group' => $req['group'],
                    'description'=> $req['description'],
                    'short_description'=> $req['short_description'],
                    'category'=> $req['category'],
                    'number_of_lesson'=> $req['number_of_lesson'],
                    'total_lesson_time'=> $req['total_lesson_time'],
                    'information' => $req['information']
                ]);

            if($req['teacher']){
                foreach($req['teacher'] as $teacher) {
                    $teacherCourse = TeacherCourse::create([
                        'teacher_id' => $teacher,
                        'course_id' => $course->id,
                    ]);
                }
            }

            if ($request->has('logo') && count($request->logo) == 1) {
                foreach ($request->logo as $document) {
                    Helper::handleUploadedSingleFile($course, $document, 'logo');
                }
            }

            if(!$course)
                throw new \Exception(__('Oluşturulamadı'));

            DB::commit();
        } catch(\Exception $exception) {
            DB::rollBack();
            throw ValidationException::withMessages([$exception->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {

        $teachers = Teacher::query()
            ->get();
        return view('admin.books.edit', [
            'course' => $course,
            'teachers' => $teachers
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Course $course)
    {
        DB::beginTransaction();
        try {
            $req = $request->validated();
            $updated = $course->update([
                'title' => $req["title"],
                'group' => $req["group"],
                'description' => $req["description"],
                'short_description' => $req["short_description"],
                'category' => $req["category"],
                'number_of_lesson' => $req["number_of_lesson"],
                'total_lesson_time' => $req["total_lesson_time"],
                'information' => $req['information']
            ]);

            if($request->teacher) {
                TeacherCourse::query()
                    ->where('course_id', $course->id)
                    ->delete();


                foreach ($req["teacher"] as $teacher) {
                    $teacherCourse = TeacherCourse::create([
                       'teacher_id' => $teacher,
                       'course_id' => $course->id
                    ]);
                }
            }
            if (!$updated) {
                throw new \Exception(__('Güncellenemedi'));
            }

            if ($request->has('logo') && count($request->logo) == 1) {
                foreach ($request->logo as $document) {
                    Helper::handleUploadedSingleFile($course, $document, 'logo');
                }
            }

            DB::commit();
        } catch(\Exception $exception) {
            DB::rollBack();
            throw ValidationException::withMessages([$exception->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        try {
            $course->delete();

        } catch (\Exception $exception) {
            DB::rollBack();
            throw ValidationException::withMessages([__('Silinemedi.')]);
        }
    }
}
