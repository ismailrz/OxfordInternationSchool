<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;
class StudentController extends Controller
{

    public function getStudents()
    {
        $students = Student::all();
        return  response()->json(['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addStudent(Request $request)
    {
        $result['response'] = 'success';
         $validator = Validator::make($request->all(), [
             'name' => 'required',
             'email' => 'required|email',
             'phone' => 'required|regex:/(01)[0-9]{9}/',
         ]);
         if ($validator->fails()) {
             $result['response'] = 'error';
             $result['message'] = $validator->errors();
             return response()->json($result);
         }
         $imageName = '';
         if(!empty($request->image)){
             $base64_image = $request->image; // your base64 encoded     
             @list($type, $file_data) = explode(';', $base64_image);
             @list(, $file_data) = explode(',', $file_data); 
             $imageName = time().'.'.'png';   
              Storage::disk('local')->put('public/images/'.$imageName, base64_decode($file_data));
         }
         $student = new Student();
         $student->name = $request->name;
         $student->email = $request->email;
         $student->phone = $request->phone;
         $student->image = $imageName;
         $student->password = $request->password;
         if($student->save()){
            $result['message'] = 'Great!, Student added sucessful.';
        }else{
            $result['response'] = 'error';
            $result['message'] = 'Sorry, action failed! Please try again.';
        }
         return response()->json($result);
    }


}
