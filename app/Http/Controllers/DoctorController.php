<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Speciality;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = Doctor::all();
        $specialities = Speciality::all();
        return view('admin.doctors.index', compact('doctors', 'specialities'));
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
        Doctor::create($data);
        return back()->with(['message'=>__('locale.save', ['param'=>__('locale.doctor', ['suffix'=>'', 'prefix'=>''])])]);
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
        $doctor = Doctor::find($id);
        $doctor->update($data);
        return back()->with(['message'=>__('locale.update', ['param'=>__('locale.doctor', ['suffix'=>'', 'prefix'=>''])])]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $doctor = Doctor::find($id);
        $doctor->delete();
        return back()->with(['message'=>__('locale.delete', ['param'=>__('locale.doctor', ['suffix'=>'', 'prefix'=>''])])]);
    }
}
