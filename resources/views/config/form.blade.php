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
        <div class="container">
            <form action="{{ route('configKey.send') }}" method="post">
                {{-- <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="exampleFormControlInput1">
                </div> --}}
                <select class="form-select" name="room" aria-label="Default select example">
                    <option value="room" selected disabled>Wybierz pokój</option>
                        @foreach($data as $item)
                            <option value="{{ $item->value_worth }}">{{ $item->value_name }}</option>
                        @endforeach
                </select>

                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label"></label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="tresc" rows="3" placeholder="Treść"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">
                    Wyślij
                </button>
            </form>
        </div>
        <script src=" {{ asset('js/app.js') }}"></script>
    </body>
</html>