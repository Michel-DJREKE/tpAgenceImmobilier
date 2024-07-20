@extends('base')

@section('content')

    <main>

        <section id="img">
            <div>
                <h1>Trouver votre prochain,<br>séjour chez nous</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.</p>
                <button style="margin-top: 20px; width: 160px;">Explorez &rarr;</button>
            </div>
        </section>

        <h2 style="text-align: center; font-size: 3rem; margin-top: 40px;">Nos biens</h2>
        <section id="section2">
            @forelse ($properties as $property)
                <a href="{{ route('admin.property.show', ['slug' => $property->getSlug(), 'property' => $property->id]) }}" class="card">
                    <div class="card-info" style="background-image: url('{{ \Illuminate\Support\Facades\Storage::url($property->image) }}');">
                        <h3>{{ $property->title }}</h3>
                        <h4>{{ $property->price }}€</h4>
                    </div>
                </a>
            @empty
                <p>Il n'y a pas de propriété</p>
            @endforelse
                <div class="search-container">
                    <form action="{{ route('admin.property.index') }}" method="get" class="search-form">
                        <input type="number" placeholder="Budget" name="price" value="{{ $input['price'] ?? null }}">
                        <input type="number" placeholder="Surface" name="surface" value="{{ $input['surface'] ?? null }}">
                        <input type="text" placeholder="Mot clef" name="title" value="{{ $input['title'] ?? null }}">
                        <input type="number" placeholder="Pièce" name="rooms" value="{{ $input['rooms'] ?? null }}">
                        <button type="submit" class="btn btn-primary">Rechercher</button>
                    </form>
                </div>
        </section>

        <h2 style="text-align: center; font-size: 2.5rem; margin-top: 40px;">Contactez-nous</h2>
        <section id="contact-form">
            <form action="{{ route('property.contact', $property) }}" method="post" class="vstack gap-3 p-5 rounded-4 shadow-lg bg-light" style="width: 40%; margin: 20px auto; border-radius: 10px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);">
                @csrf
                <div style="margin-bottom: 15px;">
                    <label for="name" style="font-weight: bold;">Nom</label>
                    <input type="text" id="name" name="name" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                </div>
                <div style="margin-bottom: 15px;">
                    <label for="email" style="font-weight: bold;">Email</label>
                    <input type="email" id="email" name="email" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                </div>
                <div style="margin-bottom: 15px;">
                    <label for="message" style="font-weight: bold;">Message</label>
                    <textarea id="message" name="message" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;"></textarea>
                </div>
                <button type="submit" style="padding: 10px 20px; background-color: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer;">Envoyer</button>
            </form>

        </section>
        <br>
        <br>
        <br>




    </main>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Open Sans', sans-serif;
        }
        body {
            background-color: #f0f2f5;
        }
        header {
            width: 100%;
            min-height: 75px;
            position: absolute;
            display: flex;
            justify-content: space-between;
            align-items: center;
            top: 0;
            backdrop-filter: blur(15px);
            box-shadow: 10px 10px 10px 1px rgba(0, 0, 0, 0.05);
            z-index: 1000;
        }
        nav {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            padding: 10px 8%;
            flex-wrap: wrap;
        }
        nav div {
            width: 100px;
            height: 100%;
            display: flex;
            align-items: center;
            color: white;
        }
        nav ul {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 350px;
            height: 100%;
            list-style: none;
        }
        nav ul li button {
            width: 100%;
            height: 100%;
            border: none;
            background-color: transparent;
            font-size: 1.2rem;
            font-weight: 300;
            color: #000000;
            cursor: pointer;
        }
        main #img {
            background-image: linear-gradient(90deg, rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url('{{ asset('bg/home5.jpg') }}');
            width: 100%;
            height: 100vh;
            background-position: center;
            background-size: cover;
            position: relative;
        }
        main #img div {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 0 5%;
        }
        main #img div h1 {
            font-size: 3.5rem;
            color: white;
            text-align: center;
            -webkit-text-stroke-color: rgba(255, 255, 255, 0.6);
            -webkit-text-stroke-width: 1px;
        }
        main #img div p {
            font-size: 1rem;
            color: white;
            text-align: center;
        }
        button {
            padding: 10px 20px;
            border: none;
            outline: 2px solid white;
            background-color: transparent;
            backdrop-filter: blur(2px);
            border-radius: 10px;
            color: white;
            font-weight: bolder;
            font-size: 1.2rem;
            cursor: pointer;
            transition: all .2s .1s ease-in-out;
        }
        button:hover {
            transform: scaleX(1.1);
        }
        .navigation {
            padding: 5px;
            color: white;
            font-weight: bold;
        }
        #section2 {
            width: 100%;
            height:300px ;
            background-color: #ffffff;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            padding: 20px 5%;
        }
        .card {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            background-color: #f7f7f7;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card-info {
            width: 100%;
            height: 300px;
            background-position: center;
            background-size: cover;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 10px;
            color: white;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);


        }
        .card-info h3, .card-info h4 {
            margin: 0;
        }



        .search-container {
            position: fixed;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #2c0b0b;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 10px;
        }

        .search-form {
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 10px;
            box-shadow:white;

        }

        .search-form input {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #b4bac0;
            box-shadow: inset 0 1px 2px rgba(23, 23, 23, 0.1);
        }

        .search-form button {
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            background-color: #007bff;
            color: white;
            cursor: pointer;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
        }

        .search-form button:hover {
            background-color: #0056b3;
        }

    </style>

@endsection
