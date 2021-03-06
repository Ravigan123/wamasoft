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
        {{ $data }}
        <div class="container">
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Nazwa</th>
                    <th scope="col">Details</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->key_name }}</td>
                            <td><a href="{{ route('configValue.index', $item->id) }}">
                                <button class="btn btn-primary btn-sm">Details</button>
                            </a></td>
                            
                        </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
        <script src=" {{ asset('js/app.js') }}"></script>
    </body>
</html>