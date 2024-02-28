<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - Unicode</title>
    {{-- <style type="text/css">
        @yield('css');
    </style> --}}
    @yield('css');

</head>
<body>
    <header>
        <h1>HEADER</h1>
    </header>
    <main>
        <aside>
            @section('sidebar')
                @include('clients.blocks.sidebar')
            @show
        </aside>
        <div class="content">
            @yield('content')
        </div>
    </main>
    <footer>
        <h1>FOOTER</h1>
    </footer>
    @section('sidebar')
        <p>Main sidebar</p>
    @endsection
    {{-- <script type="text/javascript">
        @yield('js');
    </script> --}}
    @yield('js');

</body>
</html>