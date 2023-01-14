<?php

namespace App\Http\Controllers\v1\API\Record;

use App\Http\Controllers\Controller;
use App\Http\Requests\ParticularRecordFormRequest;
use App\Http\Requests\RecordFormRequest;
use App\Http\Resources\RecordResource;
use App\Models\Record;
use App\Oluwablin\OluwablinApp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecordController extends Controller
{
    use OluwablinApp;

    /**
     * Get particular record to interact with
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
     * Get record to interact with
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllLibraryRecords(Request $request)
    {
        $records = Record::where('library_id', Auth::user()->getLibraryID())
        ->latest()->paginate(intVal($request->query('paginate')) ?? 10);

        return RecordResource::collection($records)->additional(['status' => 'OK', 'message' => 'Records fetched successfully.']);
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  ParticularRecordFormRequest $request
     * @return \Illuminate\Http\Response
     */
    public function addParticularRecord(ParticularRecordFormRequest $request)
    {
        $record = Record::create($request->validated());

        return $this->AppResponse('OK', 'Record created successfully.', 201, new RecordResource($record));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ParticularRecordFormRequest  $request
     * @param  \App\Models\Record  $id
     * @return \Illuminate\Http\Response
     */
    public function updateParticularRecord(ParticularRecordFormRequest $request, $id)
    {
        $record = $this->listParticularRecord($id);

        $record->update($request->validated());

        return $this->AppResponse('OK', 'Record updated successfully.', 200, new RecordResource($record));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Record  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteParticularRecord($id)
    {
        $record = $this->listParticularRecord($id);

        $record->delete();

        return $this->AppResponse('OK', 'Record deleted successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Record  $id
     * @return \Illuminate\Http\Response
     */
    public function getRecord($id)
    {
        return $this->AppResponse('OK', 'Record details fetched successfully', 200, new RecordResource($this->listRecord($id)));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllRecords(Request $request)
    {
        $records = Record::latest()->paginate(intVal($request->query('paginate')) ?? 10);

        return RecordResource::collection($records)->additional(['status' => 'OK', 'message' => 'Records fetched successfully.']);
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  RecordFormRequest $request
     * @return \Illuminate\Http\Response
     */
    public function addNewRecord(RecordFormRequest $request)
    {
        $record = Record::create($request->validated());

        return $this->AppResponse('OK', 'Record created successfully.', 201, new RecordResource($record));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  RecordFormRequest  $request
     * @param  \App\Models\Record  $id
     * @return \Illuminate\Http\Response
     */
    public function updateRecord(RecordFormRequest $request, $id)
    {
        $record = $this->listRecord($id);

        $record->update($request->validated());

        return $this->AppResponse('OK', 'Record updated successfully.', 200, new RecordResource($record));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Record  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteRecord($id)
    {
        $record = $this->listRecord($id);

        $record->delete();

        return $this->AppResponse('OK', 'Record deleted successfully');
    }
}
