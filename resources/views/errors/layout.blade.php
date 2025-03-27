<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Error</title>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }
        .error-container {
            text-align: center;
            padding: 2rem;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .error-code {
            font-size: 6rem;
            color: #333;
            margin: 0;
        }
        .error-message {
            color: #666;
            margin: 1rem 0;
        }
        .back-link {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            background-color: #333;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 1rem;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <h1 class="error-code">@yield('code')</h1>
        <p class="error-message">@yield('message')</p>
        <a href="{{ url('/') }}" class="back-link">Return to Home</a>
    </div>
</body>
</html>