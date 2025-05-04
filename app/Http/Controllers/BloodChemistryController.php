<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Models\BloodBiochemistry;
use App\Models\Doctor;

class BloodChemistryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bs = BloodBiochemistry::all();
        return view('admin.bs.index', compact('bs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $patients = Patient::all();
        $doctors = Doctor::all();
        return view('admin.bs.create', compact('patients', 'doctors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function add(Request $request)
    {
        $bloodBioChemistry = !empty($request->id) ? BloodBiochemistry::find($request->id) : NULL;
        $parameters = bs_ref($request->age, $request->gender, $bloodBioChemistry);
        return view('admin.add', compact('parameters'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except(['_token']);
        BloodBiochemistry::create($data);
        return redirect()->route('blood_chemistries.index')->with(['message'=>__('locale.save', ['param'=>__('locale.blood_biochemistry')])]);
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
        $bloodBioChemistry = BloodBiochemistry::find($id);
        $patients = Patient::all();
        $doctors = Doctor::all();
        return view('admin.bs.edit', compact('patients', 'doctors', 'bloodBioChemistry'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->except(['_token']);
        $bloodBioChemistry = BloodBiochemistry::find($id);
        $bloodBioChemistry->update($data);
        return redirect()->route('blood_chemistries.index')->with(['message'=>__('locale.update', ['param'=>__('locale.blood_biochemistry')])]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bloodBioChemistry = BloodBiochemistry::find($id);
        $bloodBioChemistry->delete();

        return back()->with(['message'=>__('locale.delete', ['param'=>__('locale.blood_biochemistry')])]);
    }
}
