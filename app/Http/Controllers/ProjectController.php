<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Project;
use App\Models\Genere;
use App\Models\Lenguage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proge = Project::All();

        return view('admin.index', compact('proge'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lenguage = Lenguage::All();
        $genere = Genere::All();
        return view('admin.create', compact('genere', 'lenguage'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'genere_id' => 'required',
                'title' => 'required|max:255',
                'description' => 'required|min:5',
                'thumb'=>'nullable',
                'lenguages'=>'exists:lenguages,id'
            ],
            [
                'title.required' => 'è richiesto di compilare il campo title',
                'title.max' => 'il titolo deve contenere al massimo 255 caratteri',
                'title.unique' => 'Il titolo è gia stato utilizzato',
                'description.required' => 'è richiesto di compilare il campo title',
                'description.min' => 'il testo troppo corto per essere inserito',

            ],
        );
        $form_data = $request->all();

        if ($request->hasFile('img')){
            $img_path = Storage::disk('public')->put('uploads', $request['img'] );
            $form_data['img'] = $img_path;
        }
        

        
        //$newPost = new Project();
        //$newPost->fill($form_data);

        $newPost = Project::create($form_data);

        
        if($request->has('lenguage')){
            $newPost->lenguages()->attach($request->lenguage);
        }
        $newPost->save();

        return redirect()->route('admin.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proge = Project::find($id);

        return view('admin.show', compact('proge'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $proge = Project::find($id);
        $progeLenguage = Lenguage::All();
        $progeGenere = Genere::All();
        return view('admin.edit', compact('proge', 'progeLenguage', 'progeGenere'));
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
        $request->validate(
            [
                'genere_id' => 'required',
                'title' => 'required|max:255',
                'description' => 'required|min:5',
                'thumb'=>'nullable',
                'lenguages'=>'exists:lenguages,id'
            ],
            [
                'title.required' => 'è richiesto di compilare il campo title',
                'title.max' => 'il titolo deve contenere al massimo 255 caratteri',
                'title.unique' => 'Il titolo è gia stato utilizzato',
                'description.required' => 'è richiesto di compilare il campo title',
                'description.min' => 'il testo troppo corto per essere inserito',

            ],
        );

        $form_data = $request->all();
        $proge = Project::find($id);
        if ($request->hasFile('img')){
            if($proge->img){
                Storage::delete($proge->img);
            }
            $img_path = Storage::disk('public')->put('uploads', $request['img'] );
            $form_data['img'] = $img_path;
        }
        $proge->update($form_data);
        if($request->has('lenguage')){
            $proge->lenguages()->sync($request->lenguage);
        }

        return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proge = Project::find($id);
        $proge->lenguages()->sync([]);
        $proge->delete();
        return redirect()->route('admin.index');
    }
}
