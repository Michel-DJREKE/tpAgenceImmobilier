@extends('admin.admin')
@section('title', 'Tous les biens')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>@yield('title')</h1>
        <a href="{{route('admin.property.create')}}" class="btn btn-primary ">Ajouter un bien</a>
    </div>

    <div class="row">
        @foreach($properties as $property)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{ \Illuminate\Support\Facades\Storage::url($property->image) }}" class="card-img-top" alt="Photo de {{ $property->title }}">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{$property->title}}</h5>
                        <p class="card-text">
                            Surface : {{$property->surface}}m²<br>
                            Prix : {{number_format($property->price, thousands_separator: ' ')}}€<br>
                            Ville : {{$property->city}}
                        </p>
                        <div class="mt-auto d-flex justify-content-between">
                            <a href="{{ route('admin.property.show', ['slug'=>$property->getSlug(), 'property'=>$property->id]) }}" class="btn-success bouton bouton1">Show</a>
                            <a href="{{ route('admin.property.edit', $property) }}" class="btn-primary bouton bouton2">Editer</a>
                            <form action="{{route('admin.property.destroy', $property)}}" method="post">
                                @csrf
                                @method("delete")
                                <button class="btn-danger bouton bouton3">Supprimer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{$properties->links()}}

@endsection



<style>
    *{
        box-sizing: border-box;
        box-shadow: black;
    }
    .card {
        border: 1px solid #ccc;
        border-radius: 8px;
        overflow: hidden;
    }

    .card img {
        height: 200px;
        object-fit: cover;
    }

    .card-body {
        padding: 15px;
    }

    .card-title {
        font-size: 1.25rem;
        font-weight: bold;
    }

    .card-text {
        font-size: 1rem;
        margin-bottom: 1rem;
    }

    .card .btn {
        flex: 1;
        margin: 0 5px;
    }

    .card .btn:first-child {
        margin-left: 0;
    }

    .card .btn:last-child {
        margin-right: 0;
    }

    .bouton{
        height: 40px;
        width: 90px;
        border-radius: 4px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        text-align: center;
        color: black;
    }

    .bouton1{
        background-color: green;
        color: white;
    }

    .bouton2{
        background-color: darkblue;
        color: white;
    }

    .bouton3{
        background-color: darkred;
        color: white;
    }


</style>
