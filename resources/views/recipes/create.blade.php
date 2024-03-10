@extends('layouts.mainLayout')

@section('content')
    <h1>Nov recept </h1>        
    <form action="{{route('recepti.store')}}" method="POST" style="background: black" enctype="multipart/form-data">
            @csrf
            <table style="border: 2px solid white" class="table table-dark table-striped" id="tableNewRecipe">
                <col style="width: 30%">
                <tr>
                    <td><label for="title">Naziv recepta: </label></td>
                    <td><input type="text" id="title" name="title" size="50" required></td>
                </tr>
                <tr>
                    <td><label for="shortDescription">Kratak opis: </label></td>
                    <td><input type="text" id="shortDescription" name="shortDescription" size="50" required placeholder="Opis namenjen za kratko objašnjenje recepta"></td>
                </tr>
                <tr>
                    <td><label for="ingredients">Sastojci: </label></td>
                    <td><textarea id="ingredients" name="ingredients" cols="130" required></textarea></td>
                </tr>
                <tr>
                    <td><label for="preparation">Pripema: </label></td>
                    <td><textarea id="preparation" name="preparation" cols="130"  required></textarea></td>
                </tr>
                <tr>
                    <td><label for="type">Tip(slatko/slano): </label></td>
                    <td>
                        <select name="type" id="type" required>
                            <option value="slatko">Slatko</option>
                            <option value="slano">Slano</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="subtype">Podtip(domaća/svetsa kuhinja): </label></td>
                    <td>
                        <select name="subtype" id="subtype" required>
                            <option value="domaca kuhinja">Domaća kuhinja</option>
                            <option value="svetska kuhinja">Svetska kuhinja</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="people">Broj osoba: </label></td>
                    <td><input type="number" name="people" id="people" min="1" max="10" required></td>
                </tr>
                <tr>
                    <td><label for="recipePicture">Mesto za sliku:</label></td>
                    <td><input type="file" name="recipePicture" id="recipePicture"></td>
                </tr>
            </table>
            <p align="center">
                <button type="submit" class="btn btn-success">Sačuvaj recept <i class="bi bi-file-earmark-plus"></i></button>
            </p>

        </form>   
@endsection
