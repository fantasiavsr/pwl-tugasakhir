<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\course;
use App\Models\user;
use App\Models\coursedetail;
use App\Models\module;
use App\Models\requirement;
use App\Models\resources;
use App\Models\studentcourse;
use App\Models\teacher;

class courseController extends Controller
{
    public function index()
    {
        /* $data = course::all(); */
       /*  $data = course::whereIn('is_active', ['yes'])->get(); */
        return view('coursedetail', [
            'title' => "Course Detail",
            /* 'data' => $data, */
        ]);
    }

    public function coursedetail(course $course)
    {
        /* $data = course::all(); */
        $id = $course->id;
        /* $data = coursedetail::whereIn('course_id', [$id])->get(); */
        /* $data = course::whereIn('id', [$id])->get(); */
        $datacourse = course::find($id);
        $datateacher = teacher::whereIn('course_id', [$id])->get();
        $datamodule = module::whereIn('course_id', [$id])->get();
        $datarequirement = requirement::whereIn('course_id', [$id])->get();
        $dataresource = resources::whereIn('course_id', [$id])->get();
        $datastudentcourse = studentcourse::whereIn('course_id', [$id])->get();

        return view('coursedetail', [
            'title' => "Course Detail",
            /* 'id' => $request->id, */
            'datacourse' => $datacourse,
            'datateacher' => $datateacher,
            'datamodule' => $datamodule,
            'datarequirement' => $datarequirement,
            'dataresource' => $dataresource,
            'datastudentcourse' => $datastudentcourse,

        ]);
    }

    public function usercoursedetail(course $course)
    {
        /* $data = course::all(); */
        $id = $course->id;
        /* $data = coursedetail::whereIn('course_id', [$id])->get(); */
        /* $data = course::whereIn('id', [$id])->get(); */
        $datacourse = course::find($id);
        $datateacher = teacher::whereIn('course_id', [$id])->get();
        $datamodule = module::whereIn('course_id', [$id])->get();
        $datarequirement = requirement::whereIn('course_id', [$id])->get();
        $dataresource = resources::whereIn('course_id', [$id])->get();
        $datastudentcourse = studentcourse::whereIn('course_id', [$id])->get();

        $studentcourse = studentcourse::all();

        return view('user.coursedetail', [
            'title' => "Course Detail",
            /* 'id' => $request->id, */
            'datacourse' => $datacourse,
            'datateacher' => $datateacher,
            'datamodule' => $datamodule,
            'datarequirement' => $datarequirement,
            'dataresource' => $dataresource,
            'datastudentcourse' => $datastudentcourse,
            'studentcourse' => $studentcourse,
        ]);
    }

    public function courseview(course $course)
    {
       /* $data = course::all(); */
       $id = $course->id;
       /* dd($id); */
       /* dd($course); */
       /* $data = coursedetail::whereIn('course_id', [$id])->get(); */
       /* $data = course::whereIn('id', [$id])->get(); */
       $datacourse = course::find($id);
       $datateacher = teacher::whereIn('course_id', [$id])->get();
       $datamodule = module::whereIn('course_id', [$id])->get();
       $datarequirement = requirement::whereIn('course_id', [$id])->get();
       $dataresource = resources::whereIn('course_id', [$id])->get();
       $datastudentcourse = studentcourse::whereIn('course_id', [$id])->get();
       $step = 1;

        $nextmodule = module::where('step', '>', $step)->orderBy('step', 'asc')->first();
        $previousmodule = module::where('step', '<', $step)->orderBy('step', 'desc')->first();

       $studentcourse = studentcourse::all();
        return view('user.courseview', [
            'title' => "Module $step",
            'submenu' => "No",
            'datacourse' => $datacourse,
            'datateacher' => $datateacher,
            'datamodule' => $datamodule,
            'datarequirement' => $datarequirement,
            'dataresource' => $dataresource,
            'datastudentcourse' => $datastudentcourse,
            'studentcourse' => $studentcourse,
            'step' => $step,
            'nextmodule' => $nextmodule,
            'previousmodule' => $previousmodule,
        ]);
    }

    public function courseviewnext(course $course, $step)
    {
       /* $data = course::all(); */
       $id = $course->id;
      /*  dd($step); */
       /* dd($id); */
       /* dd($course); */
       /* $data = coursedetail::whereIn('course_id', [$id])->get(); */
       /* $data = course::whereIn('id', [$id])->get(); */
       $datacourse = course::find($id);
       $datateacher = teacher::whereIn('course_id', [$id])->get();
       $datamodule = module::whereIn('course_id', [$id])->get();
       $datarequirement = requirement::whereIn('course_id', [$id])->get();
       $dataresource = resources::whereIn('course_id', [$id])->get();
       $datastudentcourse = studentcourse::whereIn('course_id', [$id])->get();
       $step = $step;

        $nextmodule = module::where('step', '>', $step)->whereIn('course_id', [$id])->orderBy('step', 'asc')->first();
        $previousmodule = module::where('step', '<', $step)->whereIn('course_id', [$id])->orderBy('step', 'desc')->first();

       $studentcourse = studentcourse::all();
        return view('user.courseview', [
            'title' => "Module $step",
            'submenu' => "No",
            'datacourse' => $datacourse,
            'datateacher' => $datateacher,
            'datamodule' => $datamodule,
            'datarequirement' => $datarequirement,
            'dataresource' => $dataresource,
            'datastudentcourse' => $datastudentcourse,
            'studentcourse' => $studentcourse,
            'step' => $step,
            'nextmodule' => $nextmodule,
            'previousmodule' => $previousmodule,
        ]);
    }

    public function courseviewtest()
    {
        /* $data = course::all(); */
       /*  $data = course::whereIn('is_active', ['yes'])->get(); */
        return view('user.courseviewtest', [
            'title' => "Module 1",
            'submenu' => "No",
            /* 'data' => $data, */
        ]);
    }
}
