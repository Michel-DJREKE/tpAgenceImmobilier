@extends('admin.admin')
@section('title',$option->exists ? "Editer une option" : "Créer une option")

@section('content')
    <h1>@yield('title')</h1>
    <form class="vstack gap-2  p-5 rounded-4 shadow-lg" action="{{ route($option->exists ? 'admin.option.update' : 'admin.option.store', $option)}}" method="post">
        @csrf
        @method($option->exists ? 'put' : 'post')

              @include('shared.input', ['label'=> 'Nom', 'name'=> 'name', 'value'=>$option->name])

          <br>
          <div>
              <button class="btn btn-primary">
                  @if($option->exists)
                      Modifier
                  @else
                    Créer
                  @endif
              </button>
          </div>



    </form>
@endsection
