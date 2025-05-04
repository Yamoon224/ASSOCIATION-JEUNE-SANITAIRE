<?php

namespace App\Http\Controllers;

use App\Models\Nfs;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;

class NfsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nfs = Nfs::all();
        return view('admin.nfs.index', compact('nfs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $patients = Patient::all();
        $doctors = Doctor::all();
        return view('admin.nfs.create', compact('patients', 'doctors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function add(Request $request)
    {
        $nfs = !empty($request->id) ? Nfs::find($request->id) : NULL;
        $parameters = nfs_ref($request->age, $request->gender, $nfs);
        return view('admin.add', compact('parameters'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except(['_token']);
        Nfs::create($data);
        return redirect()->route('nfs.index')->with(['message'=>__('locale.save', ['param'=>__('locale.nfs')])]);
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
        $nfs = Nfs::find($id);
        $patients = Patient::all();
        $doctors = Doctor::all();
        return view('admin.nfs.edit', compact('patients', 'doctors', 'nfs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->except(['_token']);
        $nfs = Nfs::find($id);
        $nfs->update($data);
        return redirect()->route('nfs.index')->with(['message'=>__('locale.update', ['param'=>__('locale.nfs')])]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $nfs = Nfs::find($id);
        $nfs->delete();

        return back()->with(['message'=>__('locale.delete', ['param'=>__('locale.nfs')])]);
    }
}
