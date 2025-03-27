<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Matières</title>
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
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 2rem;
            background-color: #f0f0f0;
            border-radius: 8px;
            overflow: hidden;
        }
        .table th, .table td {
            padding: 1rem;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
        .table th {
            background-color: #333;
            color: white;
            text-transform: uppercase;
        }
        .table td {
            background-color: white;
        }
        .delete-btn {
            background-color: #dc3545;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 25px;
            text-decoration: none;
            border: none;
            cursor: pointer;
        }
        .page-title {
            color: white;
            font-size: 24px;
            margin-bottom: 2rem;
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
        <h2 class="page-title">LIST MATIER :</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>MATIER</th>
                    <th>PRIX</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subjects as $subject)
                <tr>
                    <td>{{ $subject->name }}</td>
                    <td>{{ $subject->price }}DH</td>
                    <td>
                        <form action="{{ route('subjects.destroy', $subject->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-btn">DELETE</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>