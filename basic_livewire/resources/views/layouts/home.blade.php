<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Livewire</title>
    <link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    @livewireStyles

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a href="/" class="navbar-brand">Laravel 10 Livewire Tanith CRUD.</a>
        </div>
    </nav>


    <div class="container">
        <div class="row justify-content-center mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">
                        <h2>Laravel 10 Livewire CRUD Tanith.</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-3">
            {{ $slot }}

            {{-- @yield('content') --}}

        </div>

    </div>
    
    @livewireScripts

    
</body>
</html>