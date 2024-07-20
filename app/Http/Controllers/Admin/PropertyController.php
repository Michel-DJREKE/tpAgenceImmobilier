<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OptionFormRequest;
use App\Http\Requests\Admin\PropertyFormRequest;
use App\Models\Option;
use App\Models\Property;

// use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.properties.index', [
            'properties' => Property::orderBy('created_at', 'desc')->paginate(3)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   $options = Option::all();
        $property = new Property();
        $property->fill([
            'surface' => 40,
            'rooms' => 3,
            'bedrooms' => 1,
            'floor' => 0,
            'city' => 'Lome',
            'postal_code' => '3400',
            'image' => 'image',
            'sold' => false,
        ]);

        return view('admin.properties.form', [
            'property' => $property,
            'options' => Option::pluck('name', 'id'),
        ]);
    }

    /**
     * Store a newly created resource in storage
     */
    public function store(PropertyFormRequest $request)
    {
        // dd($request->validated());
        $path = '';

        $image = $request->file('image');

        // Vérification si un fichier a été téléchargé
        if ($image) {
            // Génération d'un nom de fichier unique
            // Enregistrement du fichier image dans le stockage
            $path = $image->store('property-images', 'public');

        }

        $data = $request->validated();
        $data['image'] = $path;
        $property = Property::create($data);
        $property->options()->sync($request->input('options'));
        return to_route('admin.property.index')->with('success', 'le bien à été crée');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        return view('admin.properties.form', [
            'property' => $property,
            'options' => Option::pluck('name', 'id'),
        ]);
    }


    public function show(string $slug, int $id)
    {
        $property = Property::with('options')->findOrFail($id);

        if ($property->getSlug() == $slug) {
            return view('admin.property.show', ['slug' => $property->getSlug(), 'property' => $property]);
        }
    }


    /**
     * Update the specified resource in storage.
     */

    public function update(PropertyFormRequest $request, Property $property)
    {
        $path = '';

        $image = $request->file('image');

        // Vérification si un fichier a été téléchargé
        if ($image) {
            // Génération d'un nom de fichier unique
            // Enregistrement du fichier image dans le stockage
            $path = $image->store('property-images', 'public');

            // Mise à jour des données du formulaire avec le nom du fichier image

        }
        $data = $request->validated();
        $data['image'] = $path;

        $property->update($data);
        $property->options()->sync($request->validated('options'));
        return to_route('admin.property.index')->with('success', 'le bien à été modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        $property->delete();
        return to_route('admin.property.index')->with('success', 'le bien à été supprimé');
    }
}
