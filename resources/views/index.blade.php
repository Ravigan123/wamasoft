<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>
    <body class="antialiased">
        {{ $query }}
        <div class="container">
            <table class="table table-hover">
                <thead>
                  <tr>
                    {{-- <th scope="col">#</th> --}}
                    <th scope="col">Data</th>
                    <th scope="col">Server</th>
                    {{-- <th scope="col">offline</th> --}}
                    <th scope="col">Nazwa</th>
                    <th scope="col">Wartosc</th>
                    {{-- <th scope="col">statusBuffer</th> --}}
                  </tr>
                </thead>
                <tbody>
                    @foreach ($dane as $item)
                        <tr>
                            {{-- <th scope="row">{{ $item->name }}</th> --}}
                            <td>{{ $item->date }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->name_title }}</td>
                            <td>{{ $item->worth }}</td>
                            {{-- {{-- <td>{{ $item->name }}</td> --}}
                            {{-- <td>
                                @foreach ($item->titles as $title)
                                {{ $title->name }}
                                @endforeach
                            </td> 
                            <td>{{ $item->code }}</td>
                            <td>{{ $item->worth }}</td>
                            <td>{{ $item->statusBuffer}}</td>--}}
                            <td><button type="button" class="btn btn-danger delete_all" data-id="{{ $item->serverTitle_id }}">deleteALL</button></td>
                            <td><button type="button" class="btn btn-danger delete" data-id="{{ $item->id }}">delete</button></td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
        <script src=" {{ asset('js/app.js') }}"></script>
    </body>
</html>