<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Professeurs</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #c0c0c0;
            font-family: 'Segoe UI', sans-serif;
        }
        .top-bar {
            background-color: #2c2c2c;
            color: white;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .nav-buttons {
            display: flex;
            gap: 1rem;
        }
        .add-button {
            background-color: rgba(255, 255, 255, 0.15);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 25px;
            text-decoration: none;
            display: flex;
            align-items: center;
        }
        .search-container {
            margin: 2rem auto;
            max-width: 600px;
            text-align: center;
            position: relative;
        }
        .search-box {
            width: 100%;
            padding: 0.8rem 2.5rem;
            border: none;
            border-radius: 25px;
            font-size: 0.9rem;
        }
        .search-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #666;
        }
        .professor-card {
            background: #b0b8c1;
            border-radius: 10px;
            padding: 1.5rem;
            margin: 1rem auto;
            max-width: 800px;
            display: grid;
            grid-template-columns: auto 1fr;
            gap: 2rem;
        }
        .professor-icon {
            width: 100px;
            text-align: center;
        }
        .professor-info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }
        .info-field {
            background: white;
            padding: 0.5rem;
            border-radius: 5px;
            font-size: 0.9rem;
        }
        .action-buttons {
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
            margin-top: 1rem;
        }
        .btn {
            color: white;
            border: none;
            padding: 0.5rem 1.5rem;
            border-radius: 5px;
            cursor: pointer;
            font-size: 0.8rem;
        }
        .btn-update {
            background: #27ae60;
        }
        .btn-delete {
            background: #c0392b;
        }
        .matiers-box {
            background: #8c98a5;
            border-radius: 10px;
            padding: 1rem;
            margin: 1rem auto;
            max-width: 300px;
        }
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            width: 200px;
            background: #2c2c2c;
            padding-top: 60px;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 1rem 2rem;
            display: block;
            font-size: 0.9rem;
        }
        .sidebar a:hover {
            background: rgba(255,255,255,0.1);
        }
        .main-content {
            margin-left: 200px;
            padding: 1rem;
        }
    </style>
</head>
<body>
    <div class="top-bar">
        <h1>Admin Panel</h1>
        <div class="nav-buttons">
            <a href="{{ route('student.create') }}" class="add-button">+ AJOUTER NOUVELLE ETUDIANT</a>
            <a href="{{ route('formateur.create') }}" class="add-button">+ AJOUTER NOUVELLE FORMATTEUR</a>
            <a href="{{ route('formation.create') }}" class="add-button">+ AJOUTER NOUVELLE FORMATION</a>
            <a href="{{ route('classe.create') }}" class="add-button">+ AJOUTER NOUVELLE CLASSE</a>
            <a href="{{ route('logout') }}" class="add-button">exit</a>
        </div>
    </div>

    <div class="sidebar">
        <a href="{{ route('students.index') }}">List Etudiant</a>
        <a href="{{ route('professors.index') }}">List Professeur</a>
        <a href="{{ route('subjects.index') }}">List Matiers</a>
        <a href="{{ route('classes.index') }}">Emploi Classes</a>
    </div>

    <div class="main-content">
        <div class="search-container">
            <span class="search-icon">🔍</span>
            <input type="text" class="search-box" placeholder="CIN_FORMATTEUR">
        </div>

        @foreach($formatters as $formatter)
        <div class="professor-card">
            <div class="professor-icon">
                <img src="{{ asset('images/professor-icon.png') }}" alt="Professor" width="80">
            </div>
            <div>
                <div class="professor-info">
                    <input type="text" class="info-field" value="{{ $formatter->cin }}" readonly>
                    <input type="text" class="info-field" value="{{ $formatter->email }}" readonly>
                    <input type="text" class="info-field" value="{{ $formatter->nom }}" readonly>
                    <input type="text" class="info-field" value="{{ $formatter->password }}" readonly>
                    <input type="text" class="info-field" value="{{ $formatter->prenom }}" readonly>
                    <input type="text" class="info-field" value="{{ $formatter->phone }}" readonly>
                </div>
                <div class="action-buttons">
                    <button class="btn btn-update">UPDATE</button>
                    <button class="btn btn-delete">DELETE</button>
                </div>
            </div>
        </div>
        <div class="matiers-box">
            <h3>Matiers Professeur :</h3>
            <div class="matiers-list">
                <!-- Add professor's subjects here -->
            </div>
        </div>
        @endforeach
    </div>
</body>
</html>