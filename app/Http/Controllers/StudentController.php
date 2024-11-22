<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Inertia\Inertia;
use Inertia\Response;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();

        return response()->json(['result'=>$students], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required',
        'phone' => 'required',
    ]);

    try {
        \Log::info('Request data:', $request->all());  // Menambahkan log data yang diterima

        Student::create($request->only(['name', 'email', 'phone']));
        
        return response()->json(['message' => 'berhasil yattaaa'], 200);
    } catch (\Exception $e) {
        \Log::error('Error while storing student:', ['error' => $e->getMessage()]); // Menambahkan log error

        return response()->json(['message' => 'gagal yattaaa'], 500);
    }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
