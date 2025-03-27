<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Schedule</title>
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
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .form-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 2rem;
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
        .btn {
            background-color: #333;
            color: white;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        .btn:hover {
            background: #444;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Admin Panel</h1>
    </div>

    <div class="container">
        <div class="form-title">
            <h2>GESTION EMPLOI CLASSES</h2>
            <a href="{{ route('classes.index') }}" class="btn">
                <span>←</span> RETOUR
            </a>
        </div>
        
        <form action="{{ route('schedule.update', $schedule->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-grid">
                <div class="form-group">
                    <label>MATIER :</label>
                    <input type="text" name="matier" value="{{ $schedule->matier }}" required>
                </div>
                <div class="form-group">
                    <label>DAY :</label>
                    <input type="text" name="day" value="{{ $schedule->day }}" required>
                </div>
                <div class="form-group">
                    <label>START TIME :</label>
                    <input type="time" name="start_time" value="{{ $schedule->start_time }}" required>
                </div>
                <div class="form-group">
                    <label>END TIME :</label>
                    <input type="time" name="end_time" value="{{ $schedule->end_time }}" required>
                </div>
            </div>

            <button type="submit" class="btn" style="margin-top: 2rem;">
                UPDATE
            </button>
        </form>
    </div>
</body>
</html>