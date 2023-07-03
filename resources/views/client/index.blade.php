<!DOCTYPE html>
<html lang="vi">
@include('client.layouts.head')

<body>
    <div class="body-container">
        <header id="primary-header">
            @include('client.layouts.header')
            @include('client.layouts.menu')
        </header>
        <main id="primary-main">
            @yield('content')
        </main>
        <footer id="primary-footer">
           @include('client.layouts.footer')
        </footer>
    </div>

    @include('client.layouts.js')
</body>

</html>
