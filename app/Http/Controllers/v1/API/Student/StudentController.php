<?php

namespace App\Http\Controllers\v1\API\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateParticularStudentFormRequest;
use App\Http\Requests\CreateStudentFormRequest;
use App\Http\Requests\UpdateParticularStudentFormRequest;
use App\Http\Requests\UpdateStudentFormRequest;
use App\Http\Resources\StudentResource;
use App\Models\User;
use App\Oluwablin\OluwablinApp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    use OluwablinApp;

    /**
     * Get particular student to interact with
     *
     * @param int $id
     *
     * @return mixed
     */
    private function listParticularStudent($id)
    {
        return User::where('library_id', Auth::user()->getLibraryID())->find($id) ?? abort($this->AppResponse('fail', 'Student not found.', 404));
    } 

    /**
     * Get student to interact with
     *
     * @param int $id
     *
     * @return mixed
     */
    private function listStudent($id)
    {
        return User::find($id) ?? abort($this->AppResponse('fail', 'Student not found.', 404));
    } 

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $id
     * @return \Illuminate\Http\Response
     */
    public function getParticularStudent($id)
    {
        return $this->AppResponse('OK', 'Student details fetched successfully', 200, new StudentResource($this->listParticularStudent($id)));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllLibraryStudents(Request $request)
    {
        $students = User::where('library_id', Auth::user()->getLibraryID())
        ->latest()->paginate(intVal($request->query('paginate')) ?? 10);

        return StudentResource::collection($students)->additional(['status' => 'OK', 'message' => 'Students fetched successfully.']);
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  CreateParticularStudentFormRequest $request
     * @return \Illuminate\Http\Response
     */
    public function addParticularStudent(CreateParticularStudentFormRequest $request)
    {
        $student = User::create([
            'first_name' => $request->validated()['first_name'], 
            'last_name' => $request->validated()['last_name'] , 
            'email' => $request->validated()['email'], 
            'password' => $request->validated()['password'] ,
            'library_id'=> Auth::user()->getLibraryID()
        ]);

        return $this->AppResponse('OK', 'Student created successfully.', 201, new StudentResource($student));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateParticularStudentFormRequest  $request
     * @param  \App\Models\User  $id
     * @return \Illuminate\Http\Response
     */
    public function updateParticularStudent(UpdateParticularStudentFormRequest $request, $id)
    {
        $student = $this->listParticularStudent($id);

        $student->update([
            'first_name' => $request->validated()['first_name'], 
            'last_name' => $request->validated()['last_name'] , 
            'library_id'=> Auth::user()->getLibraryID()
        ]);
        if($request->validated(['email'])){
            $student->email = $request->validated()['email'];
            $student->save();
        }

        return $this->AppResponse('OK', 'Student updated successfully.', 200, new StudentResource($student));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteParticularStudent($id)
    {
        $student = $this->listParticularStudent($id);

        $student->delete();

        return $this->AppResponse('OK', 'Student deleted successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $id
     * @return \Illuminate\Http\Response
     */
    public function getStudent($id)
    {
        return $this->AppResponse('OK', 'Student details fetched successfully', 200, new StudentResource($this->listStudent($id)));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllStudents(Request $request)
    {
        $students = User::latest()->paginate(intVal($request->query('paginate')) ?? 10);

        return StudentResource::collection($students)->additional(['status' => 'OK', 'message' => 'Students fetched successfully.']);
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  CreateStudentFormRequest $request
     * @return \Illuminate\Http\Response
     */
    public function addNewStudent(CreateStudentFormRequest $request)
    {
        $student = User::create($request->validated());

        return $this->AppResponse('OK', 'Student created successfully.', 201, new StudentResource($student));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateStudentFormRequest  $request
     * @param  \App\Models\User  $id
     * @return \Illuminate\Http\Response
     */
    public function updateStudent(UpdateStudentFormRequest $request, $id)
    {
        $student = $this->listStudent($id);

        $student->update($request->validated());

        return $this->AppResponse('OK', 'Student updated successfully.', 200, new StudentResource($student));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteStudent($id)
    {
        $student = $this->listStudent($id);

        $student->delete();

        return $this->AppResponse('OK', 'Student deleted successfully');
    }
}
