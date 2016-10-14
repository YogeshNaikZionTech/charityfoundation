<!DOCTYPE html>
<meta name="csrf-token" content="{{ csrf_token() }}">
<html lang="en">
<head>
    @include('partials._head')
</head>


<body>

<!-- Header from partials -->

    @include('partials._nav')
<!-- content from any page -->
<div id="content">
    @yield('content')
</div>
     @include('partials._footer')

<!-- content from partial footer. -->

<!-- Add javascript of your own -->
    @yield('scripts')

</body>
</html>