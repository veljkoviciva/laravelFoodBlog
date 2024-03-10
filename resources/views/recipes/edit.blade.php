@extends('layouts.mainLayout')

@section('content')
    <h1>Izmena recepta: </h1>        
    <form action="{{route('recepti.update', [$updateRecipe->id])}}" method="POST" style="background: black" enctype="multipart/form-data">
        @method('PUT')    
        @csrf
            <table style="border: 2px solid white" class="table table-dark table-striped">
                <tr>
                    <td><label for="title">Naziv recepta: </label></td>
                    <td><input type="text" id="title" name="title" value="{{$updateRecipe->title}}" size="50" required></td>
                </tr>
                <tr>
                    <td><label for="shortDescription">Kratak opis: </label></td>
                    <td><input type="text" id="shortDescription" name="shortDescription" value="{{$updateRecipe->shortDescription}}" size="50" required placeholder="Opis namenjen za kratko objašnjenje recepta"></td>
                </tr>
                <tr>
                    <td><label for="ingredients">Sastojci: </label></td>
                    <td><textarea id="ingredients" name="ingredients" cols="130" required>{{$updateRecipe->ingredients}}</textarea></td>
                </tr>
                <tr>
                    <td><label for="preparation">Pripema: </label></td>
                    <td><textarea id="preparation" name="preparation" cols="130" required>{{$updateRecipe->preparation}}</textarea></td>
                </tr>
                <tr>
                    <td><label for="type">Tip(slatko/slano): </label></td>
                    <td>
                        <select name="type" id="type" value="{{$updateRecipe->type}}" required>
                            <option value="slatko">Slatko</option>
                            <option value="slano">Slano</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="subtype">Podtip(domaća/svetsa kuhinja): </label></td>
                    <td>
                        <select name="subtype" id="subtype" value="{{$updateRecipe->subtype}}" required>
                            <option value="domaca kuhinja">Domaća kuhinja</option>
                            <option value="svetska kuhinja">Svetska kuhinja</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="people">Broj osoba: </label></td>
                    <td><input type="number" name="people" id="people" min="1" max="10" value="{{$updateRecipe->numberOfPeople}}" required></td>
                </tr>
                <tr>
                    <td><label for="recipePicture">Mesto za sliku</label></td>
                    <td><input type="file" name="recipePicture" id="recipePicture"></td>
                </tr>
            </table>
            <input type="submit" value="Sačuvaj recept">
        </form>   
@endsection
