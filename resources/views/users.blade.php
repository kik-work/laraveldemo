<!DOCTYPE html>
<html>

<head>
    <title>Users List</title>
</head>

<body>
    <h1>All Users</h1>
    <ul>
        @foreach ($users as $user)
            <li>{{ $user->name }} ({{ $user->id }})</li>
        @endforeach
    </ul>
</body>

</html>
