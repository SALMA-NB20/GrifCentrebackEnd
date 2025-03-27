<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Student</title>
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
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
        }
        .form-left {
            display: flex;
            flex-direction: column;
            gap: 1rem;
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
        .matiers-section {
            background: white;
            padding: 1.5rem;
            border-radius: 8px;
        }
        .matiers-title {
            margin-bottom: 1rem;
            color: #333;
        }
        .matiers-grid {
            display: grid;
            gap: 0.5rem;
        }
        .matier-btn {
            padding: 0.75rem;
            text-align: center;
            background: #f0f0f0;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .matier-btn.active {
            background: #666;
            color: white;
        }
        .classe-select {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-top: 1rem;
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
        <h2 class="form-title">ADD AN ETUDIANT :</h2>
        <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-grid">
                <div class="form-left">
                    <div class="form-group">
                        <label>Nom :</label>
                        <input type="text" name="nom" required>
                    </div>
                    <div class="form-group">
                        <label>Prenom :</label>
                        <input type="text" name="prenom" required>
                    </div>
                    <div class="form-group">
                        <label>Numero :</label>
                        <input type="tel" name="phone" required>
                    </div>
                    <div class="form-group">
                        <label>CIN :</label>
                        <input type="text" name="cin" required>
                    </div>
                    <div class="form-group">
                        <label>Date D'inscription :</label>
                        <input type="date" name="date_inscription" required>
                    </div>
                    <div class="form-group">
                        <label>Email :</label>
                        <input type="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label>Password :</label>
                        <input type="password" name="password" required>
                    </div>
                </div>

                <div class="form-right">
                    <div class="matiers-section">
                        <h3 class="matiers-title">Matiers :</h3>
                        <div class="matiers-grid">
                            <button type="button" class="matier-btn" data-matier="francais">Francais</button>
                            <button type="button" class="matier-btn" data-matier="arabe">Arabe</button>
                            <button type="button" class="matier-btn" data-matier="developpment">Developpment</button>
                            <button type="button" class="matier-btn" data-matier="reseau">Reseau</button>
                        </div>
                        
                        <div class="form-group">
                            <label>Classe :</label>
                            <select name="classe_id" class="classe-select" required>
                                <option value="">Box Option classe</option>
                                @foreach($classes as $classe)
                                    <option value="{{ $classe->id }}">{{ $classe->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="submit-btn">
                <span>+</span> AJOUTER
            </button>
        </form>
    </div>

    <script>
        document.querySelectorAll('.matier-btn').forEach(button => {
            button.addEventListener('click', function() {
                this.classList.toggle('active');
            });
        });
    </script>
</body>
</html>