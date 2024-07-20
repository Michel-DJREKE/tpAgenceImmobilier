@extends('base')
@section('content')


    <div style="align-items: center; display: flex;justify-content: center; width: 100%; height: 90vh;">


        <div style="align-items: center; display: flex; justify-content: center">
            {{ $slot }}
        </div>
    </div>


@endsection
