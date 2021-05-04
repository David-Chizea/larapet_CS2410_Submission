<?php


namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;
use Gate;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animals = Animal::all()->toArray();
        return view('admin/pet/index', compact('animals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin/pet/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // create form validation
        $animal = $this->validate(request(), [

            'name' => 'required',
            'breed' => 'required',
            'age' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:500',
        ]);

        $animal = new Animal;
        $animal->name = $request->input('name');
        $animal->age = $request->input('age');
        $animal->species = $request->input('species');
        $animal->description = $request->input('description');
        $animal->created_at = now();
        $animal->sex = $request->input('sex');
        $animal->breed = $request->input('breed');
        //Handles the uploading of the image
        if ($request->hasFile('image')) {
            //Gets the filename with the extension
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            //just gets the filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //Just gets the extension
            $extension = $request->file('image')->getClientOriginalExtension();
            //Gets the filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            //Uploads the image
            $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        // create a Animal object and set its values from the input form

        $animal->image = $fileNameToStore;
        // save the Animal object
        $animal->save();
        // generate a redirect HTTP response with a success message

        return back()->with('success', 'Animal has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $animal = Animal::find($id);
        return view('admin/pet/show', compact('animal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $animal = Animal::find($id);
        return view('admin/pet/edit', compact('animal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $animal = $this->validate(request(), [

            'name' => 'required',
            'breed' => 'required',
            'age' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:500',
        ]);



        //Handles the uploading of the image
        if ($request->hasFile('image')) {
            //Gets the filename with the extension
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            //just gets the filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //Just gets the extension
            $extension = $request->file('image')->getClientOriginalExtension();
            //Gets the filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            //Uploads the image
            $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        $animal = new Animal;
        $animal->name = $request->input('name');
        $animal->age = $request->input('age');
        $animal->species = $request->input('species');
        $animal->description = $request->input('description');
        $animal->created_at = now();
        $animal->image = $fileNameToStore;
        $animal->sex = $request->input('sex');
        $animal->breed = $request->input('breed');
        $animal->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $animal = Animal::find($id);
        $animal->delete();
        return redirect('animals');
    }

    /**
     * Display a listing of the resource to normal user.
     *
     * @return \Illuminate\Http\Response
     */
    public function display()
    {

        $animalsQuery = Animal::all();
        return view('user/display', array('animals' => $animalsQuery));
    }
}
