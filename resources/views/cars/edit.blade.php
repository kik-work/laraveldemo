<!-- resources/views/cars/edit.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Edit Car</title>
</head>

<body>
    <h1>Edit Car</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('cars.update', $car->id) }}">
        @csrf
        @method('PUT')

        <label>Name:</label>
        <input type="text" name="name" value="{{ $car->name }}" required><br><br>

        <label>Color:</label>
        <input type="text" name="color" value="{{ $car->color }}" required><br><br>

        <label>Brand:</label>
        <input type="text" name="brand" value="{{ $car->brand }}" required><br><br>

        <button type="submit">Update Car</button>
    </form>

    <br>
    <a href="{{ route('cars.allcars') }}">Back to All Cars</a>
</body>

</html>
