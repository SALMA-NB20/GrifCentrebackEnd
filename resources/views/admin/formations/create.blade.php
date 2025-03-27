<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Matière</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #d3d3d3;
        }
        .header {
            background-color: #333;
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header h1 {
            color: white;
        }
        .container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 2rem;
            background-color: #f0f0f0;
            border-radius: 8px;
        }
        .form-title {
            font-size: 24px;
            margin-bottom: 2rem;
            color: #333;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
            color: #333;
        }
        .form-group input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }
        .btn {
            background-color: #333;
            color: white;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            font-size: 1rem;
        }
        .btn:hover {
            background-color: #444;
        }
        .btn-back {
            background-color: #666;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Admin Panel</h1>
    </div>

    <div class="container">
        <div class="form-title">
            <h2>ADD AN MATIER</h2>
            <a href="{{ route('subjects.index') }}" class="btn btn-back">RETOUR</a>
        </div>

        <form action="{{ route('formation.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>NOM MATIER :</label>
                <input type="text" name="name" required>
            </div>
            <div class="form-group">
                <label>PRIX :</label>
                <input type="number" name="price" required>
            </div>
            <button type="submit" class="btn">AJOUTER</button>
        </form>
    </div>
</body>
</html>