<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Classe</title>
    <style>
        /* Add your styles here */
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Classe</h2>
        <form action="{{ route('classe.update', $classe->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Nom :</label>
                <input type="text" name="nom" value="{{ $classe->name }}" required>
            </div>
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>