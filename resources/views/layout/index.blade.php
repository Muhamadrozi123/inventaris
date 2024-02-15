<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('/dist/css/tabler.min.css') }}" rel="stylesheet"> <!-- Perbaikan typo di sini -->
    <link href="{{ asset('/dist/css/demo.min.css') }}" rel="stylesheet"> <!-- Perbaikan typo di sini -->
    <style>
        @import url('https://rsms.me/inter/inter.css');

    

        :root {
            --tblr-font-sans-serif: 'Inter Var', -aplle-system, BlinkMacSystemFont, San Francisco, segoe UI, Roboto, Helvetica Neue, Sans-serif
        }
        body {
            font-feature-settings: "cv03","cv04","cv11"
        }
        
    </style>
</head>
<body>
    <div class="container"> <!-- Perbaikan typo dan penambahan spasi di sini -->
        @include('include.sidebar')
        <div class="page-wrapper mt-5">

            @yield('konten')
        </div>

        
        {{-- @include('include.footer') --}}
    </div>
    <script src="{{ ("/dist/js/tabler.min.js") }}" defer></script>
    <script src="{{ ("/dist/js/demo.min.js") }}" defer></script>
</body>

</html>
