<?php

namespace App\Http\Controllers;

use App\Models\Library;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $libraries = Library::all();
        return response()->json([
            'status'=>'success',
            'library'=>$libraries
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LibraryRequest $request)
    {
        
        try {
            $library = Library::create([
                'name' => $request->name,
                'addres' => $request->addres,
            ]);

            return response()->json([
                'status'=>'success',
                'library'=>$libraries
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'status'=>'error',
            ],500);
        }

       

       
    }

    /**
     * Display the specified resource.
     */
    public function show(Library $library)
    {
        return response()->json([
            'status'=>'success',
            'library'=>$libraries
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Library $library)
    {
        $request->validate([
            'name' => 'required|string',
            'addres' => 'required|string',
        ]);

        $newData =[];

        if (isset ($request->name)){
            $newData['name'] = $request->name;
        }
        if (isset ($request->addres)){
            $newData['addres'] = $request->addres;
        }

        $library->update($newData);

        return response()->json([
            'status'=>'success',
            'library'=>$libraries
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Library $library)
    {
        $library->delete();
        return response()->json([
            'status'=>'success',
        ]);
    }
}
