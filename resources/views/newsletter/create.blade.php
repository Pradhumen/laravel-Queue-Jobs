<!DOCTYPE html>
<html>
<head>
    <title>Newsletter Form</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Add your CSS file if needed -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Newsletter Form</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('newsletter.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="admin">Admin</label>
                <input type="text" id="admin" name="admin" value="admin" readonly class="form-control">
            </div>

            <div class="form-group">
                <label for="to">To</label>
                <input type="text" id="to" name="to" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" id="subject" name="subject" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="body">Body</label>
                <textarea id="body" name="body" rows="5" class="form-control" required></textarea>
                <small class="form-text text-muted">You can add HTML content in the body.</small>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
