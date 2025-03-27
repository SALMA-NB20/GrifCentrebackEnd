<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Classe</title>
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
        .btn-group {
            display: flex;
            gap: 1rem;
        }
        .btn {
            background-color: #666;
            color: white;
            padding: 0.5rem 1rem;
            text-decoration: none;
            border-radius: 25px;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 2rem;
            background-color: #f0f0f0;
            border-radius: 8px;
        }
        .form-title {
            font-size: 24px;
            margin-bottom: 2rem;
            color: #333;
        }
        .form-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 3rem;
        }
        .form-group {
            margin-bottom: 1rem;
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
        .submit-btn {
            background-color: #333;
            color: white;
            padding: 1rem 2rem;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 1rem;
            margin-top: 2rem;
        }
        .submit-btn:hover {
            background: #444;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Admin Panel</h1>
        <div class="btn-group">
            <a href="{{ route('student.create') }}" class="btn">
                <span>+</span> AJOUTER NOUVELLE ETUDIANT
            </a>
            <a href="{{ route('formateur.create') }}" class="btn">
                <span>+</span> AJOUTER NOUVELLE FORMATTEUR
            </a>
            <a href="{{ route('formation.create') }}" class="btn">
                <span>+</span> AJOUTER NOUVELLE FORMATION
            </a>
            <a href="{{ route('classe.create') }}" class="btn">
                <span>+</span> AJOUTER NOUVELLE CLASSE
            </a>
            <a href="{{ route('logout') }}" class="btn">exit</a>
        </div>
    </div>

    <div class="container">
        <h2 class="form-title">ADD AN CLASSE :</h2>
        <form action="{{ route('classe.store') }}" method="POST">
            @csrf
            <div class="form-grid">
                <div class="form-group">
                    <label>Nom :</label>
                    <input type="text" name="nom" required>
                </div>
            </div>

            <button type="submit" class="submit-btn">
                <span>+</span> AJOUTER
            </button>
        </form>
    </div>
</body>
</html>