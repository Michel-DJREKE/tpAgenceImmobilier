@extends('admin.admin')
@section('title', $property->exists ? "Editer un bien" : "Créer un bien")

@section('content')

    <h1>@yield('title')</h1>
    <form enctype="multipart/form-data" class="vstack gap-2  p-5 rounded-4 shadow-lg" action="{{ route($property->exists ? 'admin.property.update' : 'admin.property.store', $property)}}" method="post">
        @csrf
        @method($property->exists ? 'put' : 'post')



        <div CLASS="row">
              @include('shared.input', ['class'=>'col', 'label'=> 'Titre', 'name'=> 'title', 'value'=>$property->title])
              <div class="col row">
                  @include('shared.input', ['class'=>'col', 'name'=> 'surface', 'value'=>$property->surface])
                  @include('shared.input', ['class'=>'col', 'label'=> 'Prix', 'name'=> 'price', 'value'=>$property->price])
              </div>
          </div>
          @include('shared.input', [ 'type'=> 'textarea' ,'name'=> 'description', 'value'=>$property->description])

          <div class="row">
              @include('shared.input', ['class'=>'col', 'label'=> 'Pièces', 'name'=> 'rooms', 'value'=>$property->rooms])
              @include('shared.input', ['class'=>'col', 'label'=> 'Chambre', 'name'=> 'bedrooms', 'value'=>$property->bedrooms])
              @include('shared.input', ['class'=>'col', 'label'=> 'Etage', 'name'=> 'floor', 'value'=>$property->floor])
          </div>


          <div class="row">
              @include('shared.input', ['class'=>'col', 'label'=> 'Adresse', 'name'=> 'adress', 'value'=>$property->adress])
              @include('shared.input', ['class'=>'col', 'label'=> 'Ville', 'name'=> 'city', 'value'=>$property->city])
              @include('shared.input', ['class'=>'col', 'label'=> 'Code Postal', 'name'=> 'postal_code', 'value'=>$property->postal_code])
          </div>

        <div class="mb-3">
             @include('shared.input', ['type'=>'file','class'=>'col', 'label'=> 'Photo', 'name'=> 'image', 'value'=>$property->image])
        </div>


        @include('shared.select', ['label'=> 'Options', 'name'=> 'options', 'value'=>$property->options()->pluck('id'), 'multiple'=>true])
          @include('shared.chekbox', ['label'=> 'Vendu', 'name'=> 'sold', 'value'=>$property->sold, 'options'=> $options])


        <div>
              <button class="btn btn-primary">
                  @if($property->exists)
                      Modifier
                  @else
                    Créer
                  @endif
              </button>
          </div>



    </form>
@endsection
