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
            background-color: #e0e0e0;
            font-family: 'Segoe UI', sans-serif;
        }
        .top-bar {
            background-color: #333;
            color: white;
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .main-content {
            padding: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }
        .form-title {
            color: white;
            font-size: 2rem;
            margin-bottom: 2rem;
        }
        .form-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
        }
        .input-group {
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
        }
        .input-group label {
            width: 150px;
            color: white;
            font-weight: bold;
        }
        .input-field {
            flex: 1;
            padding: 0.8rem;
            border: none;
            border-radius: 5px;
            background: white;
        }
        .matiers-section {
            background: white;
            padding: 1rem;
            border-radius: 10px;
        }
        .matiers-title {
            margin-bottom: 1rem;
            color: #333;
        }
        .matiers-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 1rem;
        }
        .matier-option {
            background: #f0f0f0;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            text-align: center;
            cursor: pointer;
        }
        .matier-option.active {
            background: #333;
            color: white;
        }
        .classe-select {
            width: 100%;
            padding: 0.8rem;
            border: none;
            border-radius: 5px;
            margin-top: 1rem;
        }
        .submit-btn {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            background: #333;
            color: white;
            border: none;
            padding: 1rem 2rem;
            border-radius: 50%;
            cursor: pointer;
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
        }
    </style>
</head>
<body>
    <div class="top-bar">
        <h1>Admin Panel</h1>
    </div>

    <div class="main-content">
        <h2 class="form-title">ADD AN PROFESSUER :</h2>
        
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
                        <h3 class="matiers-title">Matiers :</h3>
                        <div class="matiers-grid">
                            <div class="matier-option">Francais</div>
                            <div class="matier-option">DEVLOPPMENT</div>
                            <div class="matier-option">Reseau</div>
                            <div class="matier-option">Design</div>
                        </div>

                        <h3 class="matiers-title" style="margin-top: 2rem;">Classe :</h3>
                        <select class="classe-select" name="classe">
                            <option value="">Box Option classe</option>
                        </select>
                    </div>
                </div>
            </div>

            <button type="submit" class="submit-btn">+</button>
        </form>
    </div>

    <script>
        document.querySelectorAll('.matier-option').forEach(option => {
            option.addEventListener('click', function() {
                this.classList.toggle('active');
            });
        });
    </script>
</body>
</html>