<!DOCTYPE html>
<html>

<head>
    <title>Add New Car</title>
</head>

<body>
    <h1>Add a New Car</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form action="{{ route('cars.store') }}" method="POST">
        @csrf
        <label for="name">Car Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="color">Color:</label><br>
        <input type="text" id="color" name="color" required><br><br>

        <label for="brand">Brand:</label><br>
        <input type="text" id="brand" name="brand" required><br><br>

        <button type="submit">Add Car</button>
    </form>

    <br>
    <a href="{{ url('/cars/allcars') }}">All Cars</a>
    <a href="{{ url('/') }}">Go Home</a>
</body>

</html>
