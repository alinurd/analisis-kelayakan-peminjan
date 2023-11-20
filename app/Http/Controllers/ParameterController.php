<?php

namespace App\Http\Controllers;

use App\Models\Parameter;
use Illuminate\Http\Request;
 
class ParameterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $paramAll = $this->paramAll();
        $parameter = $paramAll->getData();
        $data = [
            'message' => 'Hello from the controller!',
            'parameters' => $parameter,
            'title' => "parameter",
            'response' => session('success'), // Include the success message from the session
        ];

         return inertia('Parameter/Parameter', $data);
    }
     /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $paramAll = $this->paramAll();
        $parameter = $paramAll->getData();
        $data = [
            'message' => 'Hello from the controller!',
            'parameters' => $parameter,
            'title' => "parameter",
            // Add more data as needed
        ];

        return inertia('Parameter/Create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        // Validate the form data
        $request['status']="aktif";
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'jenis' => 'required|string|max:50',
            'kode' => 'required|string|max:50',
            'status' => 'required|string|max:50',
        ]);

        // Create a new parameter
        Parameter::create($validatedData);

        session()->flash('success', 'Parameter Created successfully');
        return redirect()->route('parameters');
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
    public function edit(Parameter $parameter)
    {
        // dd($parameter);
        // $parameter = Parameter::find($id);

        return inertia('Parameter/Edit', [
            'user' => auth()->user(),
            'parameter' => $parameter,
        ]);
    }

    public function editx(string $id)
    {

        return view('parameter.edit', compact('parameter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Parameter $parameter)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'kode' => 'required|string|max:255',
            'jenis' => 'required|string|max:255',
            // Add more validation rules for other form fields
        ]);

        // Update the parameter
        // $parameter->update($validatedData);
dd($parameter->update($validatedData));
        // Redirect to a relevant page (e.g., index or show)
        session()->flash('success', 'Parameter updated successfully');
        return redirect()->route('parameters');
    }

    // ... other methods ...


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($parameterId)
    {
        // Find the parameter by ID
        $parameter = Parameter::find($parameterId);

        // Check if the parameter exists
        if (!$parameter) {
            // Handle the case where the parameter does not exist (optional)
            return response()->json(['message' => 'Parameter not found'], 404);
        }

        // Delete the parameter
        $parameter->delete();

        // Optionally, you can flash a success message to the session
        session()->flash('success', 'Parameter deleted successfully');

        // Redirect to the index page or return a response as needed
        return redirect()->route('parameters');
    }


}
