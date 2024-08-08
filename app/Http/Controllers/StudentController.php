<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function fetchstudent()
    {
        $students = Student::all();
        return response()->json([
            'students' => $students,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:191',
            'course' => 'required|max:191',
            'email' => 'required|email|max:191',
            'phone' => 'required|max:10|min:10',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {
            // $student = new Student;
            // $student->name = $request->input('name');
            // $student->course = $request->input('course');
            // $student->email = $request->input('email');
            // $student->phone = $request->input('phone');
            $student = Student::create($request->only(['name', 'course', 'email']));
            $student->save();
            return response()->json([
                'status' => 200,
                'message' => 'Student Added Successfully.'
            ]);
        }

    }

    public function edit($id)
    {
        $student = Student::find($id);
        if ($student) {
            return response()->json([
                'status' => 200,
                'student' => $student,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No Student Found.'
            ]);
        }

    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:191',
            'course' => 'required|max:191',
            'email' => 'required|email|max:191',
            'phone' => 'required|max:6|min:2',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {
            $student = Student::find($id);
            if ($student) {
                // $student->name = $request->input('name');
                // $student->course = $request->input('course');
                // $student->email = $request->input('email');
                // $student->phone = $request->input('phone');
                $student->update($request->only(['name', 'course', 'email', 'phone']));
                return response()->json([
                    'status' => 200,
                    'message' => 'Student Updated Successfully.'
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'No Student Found.'
                ]);
            }

        }
    }

    public function destroy($id)
    {
        $student = Student::find($id);
        if ($student) {
            $student->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Student Deleted Successfully.'
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No Student Found.'
            ]);
        }
    }
    public function view()
    {
        return view('view');
    }
    public function get(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:191',
            'course' => 'required|max:191',
            'email' => 'required|email|max:191',
            'phone' => 'required|max:3|min:3',
        ]);


        if ($validator->fails()) {
            return response()->json
            ([
                    'status' => '400',
                    'error' => $validator->messages(),
                ]);

        } else {
            $student = new Student;
            $student->name = $request->input('name');
            $student->course = $request->input('course');
            $student->email = $request->input('email');
            $student->phone = $request->input('phone');
            $student->save();
            return response()->json([
                'status' => 200,
                'message' => 'Student Added Successfully.'
            ]);
        }
    }
    public function edit_test($id)
    {
        $id = Student::find($id);
        if ($id) {
            return response()->json([
                'student' => $id,
            ]);
        }
    }
}
