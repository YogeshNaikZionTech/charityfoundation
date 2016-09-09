<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials._head')
</head>


<body>
<!-- Header from partials -->
    @include('partials._nav')
<!-- content from any page -->

    @yield('content')

<!-- content from partial footer. -->
    @include('partials._footer')
<!-- Add javascript of your own -->
    @yield('scripts')
</body>
</html>