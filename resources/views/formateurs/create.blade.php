<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Formateur</title>
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
        .page-title {
            color: white;
            font-size: 2rem;
            margin: 2rem;
        }
        .form-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            padding: 0 2rem;
        }
        .input-group {
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
        }
        .input-group label {
            width: 120px;
            color: white;
            text-align: right;
            margin-right: 1rem;
        }
        .input-field {
            flex: 1;
            padding: 0.8rem;
            border: none;
            border-radius: 8px;
            background: white;
        }
        .matiers-section {
            background: white;
            padding: 2rem;
            border-radius: 12px;
        }
        .section-title {
            color: #333;
            margin-bottom: 1.5rem;
        }
        .matiers-grid {
            display: grid;
            gap: 1rem;
        }
        .matier-option {
            background: #e0e0e0;
            padding: 0.8rem;
            border-radius: 25px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .matier-option.active {
            background: #666;
            color: white;
        }
        .classe-select {
            width: 100%;
            padding: 0.8rem;
            border: none;
            border-radius: 8px;
            margin-top: 2rem;
            background: white;
        }
        .submit-container {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        .submit-text {
            font-size: 1.2rem;
            color: #333;
            font-weight: bold;
        }
        .submit-btn {
            background: #2c2c2c;
            color: white;
            border: none;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            cursor: pointer;
            font-size: 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
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

    <h1 class="page-title">ADD AN PROFESSUER :</h1>

    <form action="{{ route('formateurs.store') }}" method="POST">
        @csrf
        <div class="form-container">
            <div class="left-section">
                <div class="input-group">
                    <label>Nom :</label>
                    <input type="text" class="input-field" name="nom" required>
                </div>
                <div class="input-group">
                    <label>Prenom :</label>
                    <input type="text" class="input-field" name="prenom" required>
                </div>
                <div class="input-group">
                    <label>Numero :</label>
                    <input type="text" class="input-field" name="phone" required>
                </div>
                <div class="input-group">
                    <label>CIN :</label>
                    <input type="text" class="input-field" name="cin" required>
                </div>
                <div class="input-group">
                    <label>Email :</label>
                    <input type="email" class="input-field" name="email" required>
                </div>
                <div class="input-group">
                    <label>Password :</label>
                    <input type="password" class="input-field" name="password" required>
                </div>
            </div>

            <div class="right-section">
                <div class="matiers-section">
                    <h3 class="section-title">Matiers :</h3>
                    <div class="matiers-grid">
                        <div class="matier-option">Francais</div>
                        <div class="matier-option">DEVLOPPMENT</div>
                        <div class="matier-option">Reseau</div>
                        <div class="matier-option">Design</div>
                    </div>

                    <h3 class="section-title">Classe :</h3>
                    <select class="classe-select" name="classe">
                        <option value="">Box Option classe</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="submit-container">
            <span class="submit-text">AJOUTER</span>
            <button type="submit" class="submit-btn">+</button>
        </div>
    </form>

    <script>
        document.querySelectorAll('.matier-option').forEach(option => {
            option.addEventListener('click', function() {
                this.classList.toggle('active');
            });
        });
    </script>
</body>
</html>