<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Page</title>
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
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        .search-bar input {
            padding: 0.5rem;
            border-radius: 25px;
            border: 1px solid #ddd;
            width: 100%;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 2rem;
        }
        .table th, .table td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .table th {
            background-color: #333;
            color: white;
        }
        .table td {
            background-color: #f0f0f0;
        }
        .action-btn {
            background-color: #666;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 25px;
            text-decoration: none;
            margin-right: 0.5rem;
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
        <h2>NEW PAGE TITLE</h2>
        <div class="search-bar">
            <input type="text" placeholder="SEARCH">
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>HEADER 1</th>
                    <th>HEADER 2</th>
                    <th>HEADER 3</th>
                    <th>HEADER 4</th>
                </tr>
            </thead>
            <tbody>
                <!-- Add your table rows here -->
            </tbody>
        </table>
    </div>
</body>
</html>