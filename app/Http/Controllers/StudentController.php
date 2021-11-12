<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('students.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('photo')){
           $img = $request->file('photo');
           $file_name= md5(time().rand()).'.'.$img->getClientOriginalExtension();
           $img->move(storage_path('app/public/student/'),$file_name);

        }

        Student::create([
            'name' => $request->name,
            'email'=> $request->email,
            'cell' => $request->cell,
            'photo'=> $file_name,
        ]);

        return true;
      
    //  return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       return Student::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }

    /**
     * get all students data
     */
    public function getStudents()
    {
        $data=Student::all();
        $i= 1;
        $student_data ='';
        foreach($data as $student){
             $student_data .="<tr >";
             $student_data .="<td>{$i}</td>";
             $student_data .="<td>{$student->name}</td>";
             $student_data .="<td>{$student->email}</td>";
             $student_data .="<td>{$student->cell}</td>";
             $student_data .="<td><img src='" .asset('storage/student/' .$student->photo) ."'></td>";
             $student_data .='<td>
               <a student_id="'. $student->id .'" class="btn btn-sm btn-info show-student" href="#">View</a>
               <a class="btn btn-sm btn-warning" href="#">Edit</a> 
               <a id="delete_id" delete_id="'. $student->id .'" class="btn btn-sm btn-danger" href="#">Delete</a> </td>';
                            
            $student_data .="</tr>";
            $i++;
        }
        return $student_data;
    }
    /**
     * Delete Student data
     */

     public function deleteStudent($id)
     {
       $delete_data= Student::find($id);
       $name=$delete_data->name;
       $delete_data->delete();
       return $name;
     }
}
