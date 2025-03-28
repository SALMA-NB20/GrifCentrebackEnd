<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Étudiants</title>
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
        .search-section {
            display: flex;
            gap: 1rem;
            justify-content: center;
            margin: 2rem;
        }
        .search-box {
            padding: 0.8rem 2.5rem;
            border: none;
            border-radius: 25px;
            width: 300px;
            font-size: 0.9rem;
        }
        .classe-select {
            padding: 0.8rem 2rem;
            border: none;
            border-radius: 25px;
            background: white;
            font-size: 0.9rem;
        }
        .student-card {
            background: #b0b8c1;
            border-radius: 10px;
            padding: 1.5rem;
            margin: 1rem auto;
            max-width: 800px;
        }
        .student-info {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
            margin-bottom: 1rem;
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
            gap: 0.5rem;
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
        <!-- Add these styles to your existing style section -->
        <style>
            .table-section {
                background: #b0b8c1;
                border-radius: 10px;
                padding: 1.5rem;
                margin: 1rem auto;
                max-width: 800px;
            }
            .table-title {
                color: white;
                margin-bottom: 1rem;
                font-size: 1.2rem;
            }
            .data-table {
                width: 100%;
                background: white;
                border-radius: 8px;
                overflow: hidden;
            }
            .table-header {
                background: #666;
                color: white;
                text-align: center;
                padding: 0.8rem;
            }
            .table-cell {
                padding: 0.8rem;
                text-align: center;
                background: #f0f0f0;
                border-bottom: 1px solid #ddd;
            }
            .scroll-container {
                max-height: 200px;
                overflow-y: auto;
            }
        </style>
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
        <div class="search-section">
            <input type="text" class="search-box" placeholder="CIN_ETUDIANT">
            <select class="classe-select">
                <option value="">CLASSE</option>
            </select>
        </div>

        @foreach($students as $student)
        <div class="student-card">
            <div class="student-info">
                <input type="text" class="info-field" value="{{ $student->date_inscription }}" readonly>
                <input type="text" class="info-field" value="{{ $student->cin }}" readonly>
                <input type="text" class="info-field" value="{{ $student->nom }}" readonly>
                <input type="text" class="info-field" value="{{ $student->prenom }}" readonly>
                <input type="text" class="info-field" value="{{ $student->phone }}" readonly>
                <input type="text" class="info-field" value="{{ $student->email }}" readonly>
                <input type="text" class="info-field" value="{{ $student->password }}" readonly>
            </div>
            <div class="action-buttons">
                <button class="btn btn-update">UPDATE</button>
                <button class="btn btn-delete">DELETE</button>
            </div>
        </div>

        <!-- Replace the existing absences section with this -->
        <div class="table-section">
            <h3 class="table-title">Etudiant Absences :</h3>
            <div class="scroll-container">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th class="table-header">DATE</th>
                            <th class="table-header">MATIER</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="table-cell">2024-01-15</td>
                            <td class="table-cell">DEVELOPMENT</td>
                        </tr>
                        <tr>
                            <td class="table-cell">2024-01-16</td>
                            <td class="table-cell">RESEAU</td>
                        </tr>
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Add the payment table section -->
        <div class="table-section">
            <h3 class="table-title">Etudiant Paiment :</h3>
            <div class="scroll-container">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th class="table-header">MATIER</th>
                            <th class="table-header">MONTANT</th>
                            <th class="table-header">DATE</th>
                            <th class="table-header">STATUS PAIMENT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="table-cell">DEVELOPMENT</td>
                            <td class="table-cell">1500 DH</td>
                            <td class="table-cell">2024-01-15</td>
                            <td class="table-cell">PAYÉ</td>
                        </tr>
                        <tr>
                            <td class="table-cell">RESEAU</td>
                            <td class="table-cell">1200 DH</td>
                            <td class="table-cell">2024-01-20</td>
                            <td class="table-cell">EN ATTENTE</td>
                        </tr>
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>
        </div>
        @endforeach
    </div>
</body>
</html>
