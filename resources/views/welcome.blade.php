<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Welcome</title>
</head>
<body>
    <h1>Welcome to the Application</h1>

    <form action="{{ route('items.store') }}" method="POST">
        @csrf
        <input type = 'hidden' name='_token' value='{{csrf_token()}}'>
        <label for="id_num">ID:</label>
        <input type="number" id="id_num" name="id" placeholder="Enter ID" required>
        
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" placeholder="Enter Name" required>
        
        <button type="submit">Submit</button>
    </form>
</body>
</html>
