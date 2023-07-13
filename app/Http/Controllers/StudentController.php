<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class StudentController extends Controller
{
    public function getStudent(){

      $students = Student::all();
      
      return response()->json($students, 200);

    }

    public function getStudentById($id){

        $student = Student::find($id);
        if(is_null($student)){
            return response()->json(['message'=>'Student not found!'], 404);
        }
        return response()->json($student,200);
    }

    public function addStudent(Request $request){

      $student = Student::create($request->all());

      return response($student, 201);

    }

    public function deleteStdent($id){
        $student = Student::find($id);
        if(is_null($student)){
            return response()->json(['message'=>'Student not found!'], 404);
        }
        $student->delete();
        return response()->json(null, 204);
    }

    public function updateStudent(Request $request, $id){
 
      $student = Student::find($id);
      if(is_null($student)){
        return response()->json(['message'=>'Student not found!'], 404);
      }
      $student->update($request->all());
      return response($student, 200);

    }
}
