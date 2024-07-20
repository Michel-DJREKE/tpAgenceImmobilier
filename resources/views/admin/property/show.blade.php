@extends('base')

@section('title', $property->title)
@section('content')

    <div class="container mt-4">
        <h1 class="text-center mb-4">{{ $property->title }}</h1>
        <h2 class="text-center text-muted">{{ $property->rooms }} pièces - {{ $property->surface }} m²</h2>

        <div class="text-primary fw-bold text-center" style="font-size: 4rem;">
            {{ number_format($property->price, thousands_separator: ' ') }} $
        </div>

        <hr>

        <div class="row mt-4">
            <div class="col-md-6">
                <img src="{{ \Illuminate\Support\Facades\Storage::url($property->image) }}" alt="Image du bien immobilier" class="property-image rounded" style="object-fit: cover; width: 100%; height: auto;">
            </div>
            <div class="col-md-6">
                <h3 class="text-success">Détails du bien</h3>
                <p class="text-muted">{{ $property->short_description }}</p>

                <div class="mt-3">
                    <h2 class="text-primary">Caractéristiques</h2>
                    <table class="table table-striped">
                        <tr>
                            <td>Surface habitable</td>
                            <td>{{ $property->surface }} m²</td>
                        </tr>
                        <tr>
                            <td>Pièces</td>
                            <td>{{ $property->rooms }}</td>
                        </tr>
                        <tr>
                            <td>Chambres</td>
                            <td>{{ $property->bedrooms }}</td>
                        </tr>
                        <tr>
                            <td>Étage</td>
                            <td>{{ $property->floor ?: 'Rez de chaussée' }}</td>
                        </tr>
                        <tr>
                            <td>Localisation</td>
                            <td>
                                {{ $property->adress }}
                                <br />
                                {{ $property->city }} ({{ $property->postal_code }})
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="mt-3">
                    <h2 class="text-primary">Spécificités</h2>
                    <ul class="list-group">
                        @foreach($property->options as $option)
                            <li class="list-group-item">{{ $option->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <h4 class="text-primary">Intéressé par ce bien ?</h4>

            @include('shared.flash')

            <form action="{{ route('property.contact', $property) }}" method="post" class="vstack gap-3 p-5 rounded-4 shadow-lg bg-light" style="width: 70%; margin: 20px auto; border-radius: 10px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);">
                @csrf
                <div class="row">
                    @include('shared.input', ['class' => 'col', 'label' => 'Prénom', 'name' => 'firstname'])
                    @include('shared.input', ['class' => 'col', 'label' => 'Nom', 'name' => 'lastname'])
                </div>

                <div class="row">
                    @include('shared.input', ['class' => 'col', 'label' => 'Téléphone', 'name' => 'phone'])
                    @include('shared.input', ['type' => 'email', 'class' => 'col', 'label' => 'Email', 'name' => 'email'])
                </div>

                @include('shared.input', ['type' => 'textarea', 'class' => 'col', 'label' => 'Message', 'name' => 'message'])
                <div>
                    <button class="btn btn-primary">Nous contacter</button>
                </div>
            </form>
        </div>

        <div class="mt-4 text-center">
            <h2 class="text-secondary">Pourquoi pas choisir ce bien ?</h2>
            <p class="lead text-muted">{{ $property->unique_features }}</p>
        </div>
    </div>

@endsection
