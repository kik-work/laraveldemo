<!DOCTYPE html>
<html>

<head>
    @viteReactRefresh
    @vite(['resources/js/app.jsx'])
</head>

<body>
    <h1>Learning Laravel self.</h1>

    <a href="{{ url('/hello') }}">Go to Hello Page</a>
    <h2>Users</h2>
    <a href="{{ url('/users') }}">click here.</a>
    <h2>Cars</h2>
    <a href="{{ url('/cars/create') }}">click here.</a>

    <!-- React will mount here -->
    <div id="app"></div>
</body>

</html>
