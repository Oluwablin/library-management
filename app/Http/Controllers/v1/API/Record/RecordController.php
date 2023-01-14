<?php

namespace App\Http\Controllers\v1\API\Record;

use App\Http\Controllers\Controller;
use App\Http\Resources\RecordResource;
use App\Models\Record;
use App\Oluwablin\OluwablinApp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecordController extends Controller
{
    use OluwablinApp;

    /**
     * Get record to interact with
     *
     * @param int $id
     *
     * @return mixed
     */
    private function listParticularRecord($id)
    {
        return Record::where('library_id', Auth::user()->getLibraryID())->find($id) ?? abort($this->AppResponse('fail', 'Record not found.', 404));
    } 

    /**
     * Get particular record to interact with
     *
     * @param int $id
     *
     * @return mixed
     */
    private function listRecord($id)
    {
        return Record::find($id) ?? abort($this->AppResponse('fail', 'Record not found.', 404));
    } 

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Record  $id
     * @return \Illuminate\Http\Response
     */
    public function getParticularRecord($id)
    {
        return $this->AppResponse('OK', 'Record details fetched successfully', 200, new RecordResource($this->listParticularRecord($id)));
    }
}
