<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials._head')
</head>


<body>

<!-- Header from partials -->
<div class="container-fluid">
    @include('partials._nav')
<!-- content from any page -->

    @yield('content')
    @include('partials._footer')

<!-- content from partial footer. -->

<!-- Add javascript of your own -->
    @yield('scripts')
</div>
</body>
</html>