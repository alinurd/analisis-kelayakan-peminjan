<?php

namespace App\Http\Controllers;

 use App\Models\Modules;
 use Illuminate\Http\Request;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $modulesAll = $this->modulesAll();
        $modules = $modulesAll->getData();
        $data = [
            'message' => 'Hello from the controller!',
            'modules' => $modules,
            'title' => "Modules",
            'response' => session('success'), // Include the success message from the session
        ];

        return inertia('Module/Index', $data);
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
            'title' => "Modules",
            // Add more data as needed
        ];

        return inertia('Module/Create', $data);    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request['status'] = "aktif";
        $validatedData = $request->validate([
            'controller' => 'required|string|max:255',
            'route' => 'required|string|max:50',
            'title' => 'required|string|max:50',
            'status' => 'required|string|max:50',
        ]);

        // Create a new parameter
        Modules::create($validatedData);
        session()->flash('success', 'Modules created successfully');

        // Redirect to a relevant page (e.g., index or show)
        return redirect()->route('modules');
    }

    /**
     * Display the specified resource.
     */
    public function show(Modules $moduleModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Modules $data)
    {
        // dd($data);
        return inertia('Module/Edit', [
            'user' => auth()->user(),
            'modules' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Modules $data)
    {
        $request['status']="aktif";
        $validatedData = $request->validate([
            'controller' => 'required|string|max:255',
            'route' => 'required|string|max:50',
            'title' => 'required|string|max:50',
            'status' => 'required|string|max:50',
        ]);

        // Create a new parameter
        $data->update($validatedData);
        session()->flash('success', 'Modules updated successfully');

        // Redirect to a relevant page (e.g., index or show)
        return redirect()->route('modules');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($data)
    {
        $parameter = Modules::find($data);

        // Check if the parameter exists
        if (!$parameter) {
            // Handle the case where the parameter does not exist (optional)
            return response()->json(['message' => 'Parameter not found'], 404);
        }

        // Delete the parameter
        $parameter->delete();

        // Optionally, you can flash a success message to the session
        session()->flash('success', 'Modules deleted successfully');

        // Redirect to the index page or return a response as needed
        return redirect()->route('modules');
    }
    public function api()
    {
        $modules = Modules::all(); // Assuming you have a "Module" model

        return response()->json($modules);
    }

}
