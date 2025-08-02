<!DOCTYPE html>
<html>

<head>
    <title>All Cars</title>
    <style>
        .confirm-inline {
            display: none;
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #aaa;
            background-color: #f9f9f9;
        }

        .confirm-inline button {
            margin-left: 10px;
        }
    </style>
</head>

<body>
    <h1>List of Cars</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Color</th>
            <th>Brand</th>
            <th>Actions</th>
        </tr>
        @foreach ($cars as $car)
            <tr>
                <td>{{ $car->id }}</td>
                <td>{{ $car->name }}</td>
                <td>{{ $car->color }}</td>
                <td>{{ $car->brand }}</td>

                <td>
                    <a href="{{ route('cars.edit', $car->id) }}">Edit</a>

                    <form method="POST" action="{{ route('cars.destroy', $car->id) }}" class="delete-form"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <!-- Inline Confirmation Box -->
    <div class="confirm-inline" id="confirmBox">
        <span>Are you sure you want to delete this car?</span>
        <button id="confirmYes">Yes</button>
        <button id="confirmNo">Cancel</button>
    </div>

    <br>
    <a href="{{ route('cars.create') }}">Add a New Car</a>

    <script>
        const deleteForms = document.querySelectorAll('.delete-form');
        const confirmBox = document.getElementById('confirmBox');
        const confirmYes = document.getElementById('confirmYes');
        const confirmNo = document.getElementById('confirmNo');

        let currentForm = null;

        deleteForms.forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                currentForm = form;
                confirmBox.style.display = 'block';
                window.scrollTo({
                    top: confirmBox.offsetTop - 20,
                    behavior: 'smooth'
                });
            });
        });

        confirmYes.addEventListener('click', function() {
            confirmBox.style.display = 'none';
            if (currentForm) currentForm.submit();
        });

        confirmNo.addEventListener('click', function() {
            confirmBox.style.display = 'none';
            currentForm = null;
        });
    </script>
</body>

</html>
