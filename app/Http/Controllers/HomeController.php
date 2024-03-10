<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Recipe;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userID = auth()->user()->id;
        $user = User::find($userID);
        $allUsers = User::all();
        $recipeCounts = Recipe::selectRaw('userID, count(*) as recipe_count')
                      ->groupBy('userID')
                      ->get();
        return view('home')->with(['recipesByUser'=> $user->getRecipesBasedOnUser, 'users' => $allUsers, 'countRecipe'=> $recipeCounts]);
        // return view('home')->with(['recipesByUser'=> $user->getRecipesBasedOnUser, 'users' => response()->json($allUsers)]);
    }

    public function destroy($id){
        $deleteUser = User::find($id);

         // Provera korisnika po ID-ju za restrikciju mogucnosti
         if(auth()->user()->id != 3){
            return redirect('/home')->with('error', 'Nedozvoljena radnja!');
        }
        $deleteUser->delete();
        return redirect('/home')->with('success', 'Uspešno obrisan korisnik!');
    }

}
