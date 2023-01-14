<?php

namespace App\Http\Controllers\v1\API\Library;

use App\Http\Controllers\Controller;
use App\Http\Requests\LibraryFormRequest;
use App\Http\Resources\LibraryResource;
use App\Models\Library;
use App\Oluwablin\OluwablinApp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LibraryController extends Controller
{
    use OluwablinApp;

    /**
     * Get library to interact with
     *
     * @param int $id
     *
     * @return mixed
     */
    private function listParticularLibrary($id)
    {
        return Library::where('id', Auth::user()->getLibraryID())->find($id) ?? abort($this->AppResponse('fail', 'Library not found.', 404));
    } 

    /**
     * Get particular library to interact with
     *
     * @param int $id
     *
     * @return mixed
     */
    private function listLibrary($id)
    {
        return Library::find($id) ?? abort($this->AppResponse('fail', 'Library not found.', 404));
    } 

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Library  $id
     * @return \Illuminate\Http\Response
     */
    public function getParticularLibrary($id)
    {
        return $this->AppResponse('OK', 'Library details fetched successfully', 200, new LibraryResource($this->listParticularLibrary($id)));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Library  $id
     * @return \Illuminate\Http\Response
     */
    public function getLibrary($id)
    {
        return $this->AppResponse('OK', 'Library details fetched successfully', 200, new LibraryResource($this->listLibrary($id)));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllLibraries(Request $request)
    {
        $libraries = Library::latest()->paginate(intVal($request->query('paginate')) ?? 10);

        return LibraryResource::collection($libraries)->additional(['status' => 'OK', 'message' => 'Libraries fetched successfully.']);
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  LibraryFormRequest $request
     * @return \Illuminate\Http\Response
     */
    public function addNewLibrary(LibraryFormRequest $request)
    {
        $library = Library::create($request->validated());

        return $this->AppResponse('OK', 'Library created successfully.', 201, new LibraryResource($library));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  LibraryFormRequest  $request
     * @param  \App\Models\Library  $id
     * @return \Illuminate\Http\Response
     */
    public function updateLibrary(LibraryFormRequest $request, $id)
    {
        $library = $this->listLibrary($id);

        $library->update($request->validated());

        return $this->AppResponse('OK', 'Library updated successfully.', 200, new LibraryResource($library));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Library  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteLibrary($id)
    {
        $library = $this->listLibrary($id);

        $library->delete();

        return $this->AppResponse('OK', 'Library deleted successfully');
    }
}
