<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Professeur</title>
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
        .sidebar {
            background-color: #333;
            padding: 1rem;
            width: 200px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 0.5rem;
            background-color: #666;
            border-radius: 25px;
            text-align: center;
        }
        .container {
            margin-left: 220px;
            padding: 2rem;
        }
        .search-bar {
            margin-bottom: 2rem;
        }
        .search-bar input {
            width: 100%;
            padding: 0.75rem;
            border: none;
            border-radius: 25px;
            font-size: 1rem;
        }
        .professor-card {
            background-color: #f0f0f0;
            border-radius: 8px;
            padding: 2rem;
            margin-bottom: 2rem;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
        }
        .professor-info {
            display: grid;
            gap: 1rem;
        }
        .info-field {
            background: white;
            padding: 0.75rem;
            border-radius: 25px;
        }
        .action-buttons {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }
        .update-btn {
            background: #28a745;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 25px;
            text-decoration: none;
            border: none;
            cursor: pointer;
        }
        .delete-btn {
            background: #dc3545;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 25px;
            text-decoration: none;
            border: none;
            cursor: pointer;
        }
        .subjects-list {
            background: white;
            padding: 1rem;
            border-radius: 8px;
            height: 200px;
            overflow-y: auto;
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

    <div class="sidebar">
        <a href="{{ route('students.index') }}">List Etudiant</a>
        <a href="{{ route('professors.index') }}">List Professeur</a>
        <a href="{{ route('subjects.index') }}">List Matiers</a>
        <a href="{{ route('classes.index') }}">Emploi Classes</a>
    </div>

    <div class="container">
        <div class="search-bar">
            <input type="text" placeholder="CIN_FORMATTEUR" />
        </div>

        @foreach($professors as $professor)
        <div class="professor-card">
            <div class="professor-info">
                <div class="info-field">Cin_Formatteur: {{ $professor->cin }}</div>
                <div class="info-field">Nom_Formatteur: {{ $professor->nom }}</div>
                <div class="info-field">Prenom_Formatteur: {{ $professor->prenom }}</div>
                <div class="info-field">Phone_Formatteur: {{ $professor->phone }}</div>
                <div class="info-field">email_Formatteur: {{ $professor->email }}</div>
                <div class="info-field">password_Formatteur: {{ $professor->password }}</div>
                <div class="action-buttons">
                    <a href="{{ route('professors.edit', $professor->id) }}" class="update-btn">UPDATE</a>
                    <form action="{{ route('professors.destroy', $professor->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-btn">DELETE</button>
                    </form>
                </div>
            </div>
            <div class="subjects-section">
                <h3>Matiers Professeur :</h3>
                <div class="subjects-list">
                    @foreach($professor->subjects as $subject)
                        <div>{{ $subject->name }}</div>
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach
    </div>
</body>
</html>