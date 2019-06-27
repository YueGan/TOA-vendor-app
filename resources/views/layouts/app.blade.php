<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.head')
    @include('partials.styles')
</head>
<body>
    <div id="app">
        @include('partials.header')
        <div class="container">
            @include('partials.messages')
            <main class="py-4">
                @yield('content')
            </main>
        </div>

        
    </div>
    <footer>
        {{-- @include('partials.footer') --}}
    </footer>
    
    {{-- JS --}}
    @include('partials.scripts')
</body>
</html>
