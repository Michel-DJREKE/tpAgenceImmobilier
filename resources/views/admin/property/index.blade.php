@extends('base')
@section('title', 'Tous nos biens')
@section()


    <div @class="bg-light p-5 mb-5 text-center p-5 rounded-4 shadow-lg">

        <form action="" method="get" class="container d-flex gap-2">
            <input type="number" placeholder="Surface minimum" class="form-control" name="surface" value="{{$input['surface'] ?? ' ' }}">
            <input type="number" placeholder="Nombre de pièce minimum" class="form-control" name="rooms" value="{{$input['rooms'] ?? ' ' }}">
            <input type="number" placeholder="Budget maximum" class="form-control" name="price" value="{{$input['price'] ?? ' ' }}">
            <input  placeholder="Mot clef" class="form-control" name="title" value="{{$input['title'] ?? ' ' }}">
            <button class="btn btn-primary btn-sm flex-grow-0">
                Rechercher
            </button>
        </form>
    </div>

<div class="card ">

</div>

 <div class="container">
     <div class="row">
         @forelse($properties as $property)
             <div class="col-3 mb-4">
                 @include('$property.card')
             </div>
         @empty
             <div class="co">
                 Aucun bien ne correspond à votre recherche
             </div>
         @endforelse
     </div>
     <div class="my-4">
         {{ $properties->links()}}
     </div>
 </div>



@endsection

