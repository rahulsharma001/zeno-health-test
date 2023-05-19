<?php

namespace App\Http\Controllers;

use App\Http\Resources\Api\Created;
use App\Http\Resources\Api\Deleted;
use App\Http\Resources\Api\NotFoundResource;
use App\Http\Resources\Api\Success;
use App\Models\Drug;
use App\Services\Drug\DrugService;
use Illuminate\Http\Request;

class DrugController extends Controller
{
    private $drugService;

    public function __construct(DrugService $drugService)
    {
        $this->middleware('auth:api');
        $this->drugService = $drugService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = $this->drugService->getAllDrugs();
        return new Success($response);
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
        $response = $this->drugService->store($request->toArray());
        return new Created($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Drug  $drug
     * @return \Illuminate\Http\Response
     */
    public function show(Drug $drug)
    {
        $drug = $this->drugService->getDrugById($drug);
        return new Success($drug);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Drug  $drug
     * @return \Illuminate\Http\Response
     */
    public function edit(Drug $drug)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Drug  $drug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Drug $drug)
    {
        $res = $this->drugService->updateDrug($request->toArray(), $drug);
        if ($res)
            return new Success("Record Updated Successfully");
        return new NotFoundResource('Record Not Found');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Drug  $drug
     * @return \Illuminate\Http\Response
     */
    public function destroy(Drug $drug)
    {
        $res =  $this->drugService->deleteDrug($drug);
        if ($res)
            return new Deleted('Record Deleted Successfully');

        return new NotFoundResource('Record Not Found');
    }
}
