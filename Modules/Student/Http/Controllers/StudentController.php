<?php

namespace Modules\Student\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Student\Repository\StudentRepository;
use Modules\Student\Entities\Student;
use Modules\Student\Repository\ImageRepository;

class StudentController extends Controller
{
    protected  $studentRepository;
    protected  $imageRepository;
    public function __construct(StudentRepository $studentRepository, ImageRepository $imageRepository)
    {
        $this->studentRepository = $studentRepository;
        $this->imageRepository = $imageRepository;
    }

    public function index()
    {
        $students = $this->studentRepository->getAll();
        return view('student::student.manage_student', compact('students'));
    }

    public function add()
    {
        return view('student::student.add_student');
    }

    public function store(Request $request)
    {

       $student_image = $this->imageRepository->uploadImage($request, 'student_image' , '/images/student/');

        $data =[
            'fullname' => $request->fullname,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'student_image' => $student_image
        ];

        $this->studentRepository->create($data);
        return redirect()->route('student.add')->with('status', 'Student Info Added Successfully');
        
    }

    public function edit($id)
    {
        $student = $this->studentRepository->getById($id);
        return view('student::student.edit_student',compact('student'));
    }

    public function update(Request $request)
    {
       
       $student = $this->studentRepository->getById($request->id);

       $data = [
        'fullname' => $request->fullname,
        'address' => $request->address,
        'phone_number' => $request->phone_number,
        ];


       if($request->hasFile('student_image')){
           $student_image = $this->imageRepository->uploadImage($request, 'student_image' , '/images/student/');
           $this->imageRepository->deleteImage($student->student_image);
            $data['student_image'] = $student_image;
        }

        $this->studentRepository->update($request->id,$data);


        return redirect()->route('student.index')->with('status', 'Student Info updated Successfully');

    }

    public function delete(Request $request){

        $student = Student::findorfail($request->id);
        unlink(public_path($student->student_image));
        $student->delete();
        return redirect()->route('student.index');

    }

    
}
