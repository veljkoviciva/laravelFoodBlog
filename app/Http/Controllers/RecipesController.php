<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Recipe; //za povlacenje podataka (fetch)
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RecipesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $all = Recipe::all();
        $all = Recipe::orderBy('created_at', 'desc')->paginate(10);
        return view('recipes/index')->with('allRecipes', $all);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('recipes/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Priprema slike za cuvanje
        if($request->hasFile('recipePicture')){
            // Naziv slike sa ekstenzijom
            $filenameExt = $request->file('recipePicture')->getClientOriginalName();
            // Samo naziv slike
            $filename = pathinfo($filenameExt, PATHINFO_FILENAME);
            // Samo ekstenzija slike, isto sto i  $extention = $request->file('recipePicture')->getClientOriginalExtension();
            $extention = pathinfo($filenameExt, PATHINFO_EXTENSION);

            // Cuvanje slike u bazi; datum se koristi zbog ponavljanja naziva tj. zbog jedinstvenosti
            $imageName = $filename . '_' . time() . '.' . $extention;

            // Konacno postavljanje u bazu
            $pathToPicture = $request->file('recipePicture')->storeAs('public/recipeImages', $imageName);
        }
        else{
            $imageName = 'noImage.jpg'; 
        }

        $newRecipe = new Recipe;
        $newRecipe->title = $request->input('title');
        $newRecipe->userID = auth()->user()->id; //nije request zato sto ne dolazi sa forme vec iz sesije
        $newRecipe->shortDescription = $request->input('shortDescription');
        $newRecipe->ingredients = $request->input('ingredients');
        $newRecipe->preparation = $request->input('preparation');
        $newRecipe->type = $request->input('type');
        $newRecipe->subtype = $request->input('subtype');
        $newRecipe->numberOfPeople = $request->input('people');
        $newRecipe->recipePicture = $imageName;

        $newRecipe->save();

        return redirect('/recepti')->with('success', 'Uspešno kreiran recept!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $one = Recipe::find($id);
        return view('recipes/show')->with('oneRecipe', $one);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $update = Recipe::find($id);

        // Provera korisnika po ID-ju za restrikciju mogucnosti
        if(auth()->user()->id != $update->userID){
            return redirect('/recepti')->with('error', 'Nedozvoljena radnja!');
        }

        return view('recipes/edit')->with('updateRecipe', $update);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Priprema slike za cuvanje
        if($request->hasFile('recipePicture')){
            // Naziv slike sa ekstenzijom
            $filenameExt = $request->file('recipePicture')->getClientOriginalName();
            // Samo naziv slike
            $filename = pathinfo($filenameExt, PATHINFO_FILENAME);
            // Samo ekstenzija slike, isto sto i  $extention = $request->file('recipePicture')->getClientOriginalExtension();
            $extention = pathinfo($filenameExt, PATHINFO_EXTENSION);

            // Cuvanje slike u bazi; datum se koristi zbog ponavljanja naziva tj. zbog jedinstvenosti
            $imageName = $filename . '_' . time() . '.' . $extention;

            // Konacno postavljanje u bazu
            $pathToPicture = $request->file('recipePicture')->storeAs('public/recipeImages', $imageName);
        }


        $change = Recipe::find($id);
        $change->title = $request->input('title');
        $change->shortDescription = $request->input('shortDescription');
        $change->ingredients = $request->input('ingredients');
        $change->preparation = $request->input('preparation');
        $change->type = $request->input('type');
        $change->subtype = $request->input('subtype');
        $change->numberOfPeople = $request->input('people');
        if($request->hasFile('recipePicture')){
            $change->recipePicture = $imageName;
        }

        $change->save();

        return redirect('/recepti')->with('success', 'Uspešno izmenjen recept!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleteRecipe = Recipe::find($id);
        
        // Provera korisnika po ID-ju za restrikciju mogucnosti
        if(auth()->user()->id != $deleteRecipe->userID){
            return redirect('/recepti')->with('error', 'Nedozvoljena radnja!');
        }

        if($deleteRecipe->recipePicture != 'noimage.jpg'){
            // Brisanje slike iz foldera
            Storage::delete('public/recipeImages/' . $deleteRecipe->recipePicture);
        }

        $deleteRecipe->delete();

        return redirect('/home')->with('success', 'Uspešno obrisan recept!');
    }    
}
