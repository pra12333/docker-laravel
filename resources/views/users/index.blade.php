<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>User List</h1>
        
        @foreach($users as $user)
            <div class="card mb-3">
                <div class="card-body">
                    <h3>{{ $user->name }}</h3>
                    <p><strong>Age:</strong> {{ $user->age }}</p>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    <p><strong>Password:</strong> {{ $user->password }}</p>
                    <a href="{{ url('users/'.$user->id.'/edit') }}" class="btn btn-primary">Edit</a>
                    <form action="{{ url('users/'.$user->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>
