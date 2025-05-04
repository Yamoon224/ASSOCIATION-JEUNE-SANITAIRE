<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Patient::all();
        return view('admin.patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except(['_token']);

        $lpatient = Patient::orderByDesc('id')->first();
        $data['sigma'] = date('Y') ." ". date('W', strtotime(date('Y-m-d'))) ." ". $data['gender'].date('d') ." ". str_pad($lpatient ? ++$lpatient->id : 1, 3, 0, STR_PAD_LEFT);
        $data['age'] = (int) round((strtotime(date('Y-m-d'))-strtotime($data['birthday']))/31536000);

        Patient::create($data);
        return back()->with(['message'=>__('locale.save', ['param'=>__('locale.patient', ['suffix'=>'', 'prefix'=>''])])]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->except(['_token']);

        $patient = Patient::find($id);
        $data['age'] = (int) round((strtotime(date('Y-m-d'))-strtotime($data['birthday']))/31536000);

        $patient->update($data);
        return back()->with(['message'=>__('locale.update', ['param'=>__('locale.patient', ['suffix'=>'', 'prefix'=>''])])]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $patient = Patient::find($id);
        $patient->delete();
        return back()->with(['message'=>__('locale.delete', ['param'=>__('locale.patient', ['suffix'=>'', 'prefix'=>''])])]);
    }
}
