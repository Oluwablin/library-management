<?php

namespace App\Http\Controllers\v1\API\Library;

use App\Http\Controllers\Controller;
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
}
