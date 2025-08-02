<!DOCTYPE html>
<html>

<head>
    <title>React Car List</title>
    @viteReactRefresh
    @vite(['resources/js/app.jsx'])
</head>

<body>
    <h1>React-Powered Car List</h1>

    <div id="react-car-list" data-cars='@json($cars)' data-success="{{ session('success') }}">
    </div>
</body>

</html>
