<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\NilaiResource;
use App\Models\Nilai;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index()
    {
        $nilai = Nilai::all();

         return response()->json($nilai);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'rank' => 'required',
            'nama' => 'required',
            'class' => 'required',
            'modul' => 'required',
            'point' => 'required|integer'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'error' => $validator->messages(),
            ], 422);
        }
        $nilai = Nilai::create([
            'rank' => $request->rank,
            'nama' => $request->nama,
            'class' => $request->class,
            'modul' => $request->modul,
            'point' => $request->point
        ]);

        return response()->json([
            'message' => 'Nilai Created Success',
            'data' => new NilaiResource($nilai),
        ], 200);
    }

    public function show(Nilai $nilai) {
        return new NilaiResource($nilai);
    }

    public function update(Request $request, Nilai $nilai) {
        $validator = Validator::make($request->all(), [
            'rank' => 'required',
            'nama' => 'required',
            'class' => 'required',
            'modul' => 'required',
            'point' => 'required|integer'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'error' => $validator->messages(),
            ], 422);
        }
        $nilai->update([
            'rank' => $request->rank,
            'nama' => $request->nama,
            'class' => $request->class,
            'modul' => $request->modul,
            'point' => $request->point
        ]);

        return response()->json([
            'message' => 'Nilai Update Success',
            'data' => new NilaiResource($nilai),
        ], 200);
    }

    public function destroy(Nilai $nilai) {
        $nilai->delete();
        return response()->json([
            'message' => 'Nilai Deleted Success',
        ], 200);
    }
}
