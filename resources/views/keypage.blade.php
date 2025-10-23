<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>License Key - Shopping Site</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #000000;
            color: #ffffff;
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .key-container {
            max-width: 600px;
            margin: 3rem auto;
            padding: 2rem;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            backdrop-filter: blur(10px);
        }

        .key-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .key-header i {
            font-size: 3rem;
            color: #4ade80;
            margin-bottom: 0.5rem;
        }

        .key-card {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(74, 222, 128, 0.5);
            border-radius: 15px;
            padding: 2rem;
            text-align: center;
        }

        .license-key {
            font-size: 1.5rem;
            font-weight: bold;
            color: #4ade80;
            word-break: break-all;
            margin-bottom: 1rem;
        }

        .key-details {
            margin-top: 1rem;
            text-align: left;
            color: #d1d5db;
        }

        .key-details div {
            margin-bottom: 0.5rem;
        }

        .btn-back {
            display: inline-block;
            margin-top: 1.5rem;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            color: #000;
            background: linear-gradient(135deg, #4ade80 0%, #22c55e 100%);
            border-radius: 10px;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-back:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(74, 222, 128, 0.4);
        }
    </style>
</head>
<body>
    <div class="key-container">
        <div class="key-header">
            <i class="bi bi-key-fill"></i>
            <h1>Your License Key</h1>
            <p>Use this key to activate your product</p>
        </div>

        <div class="key-card">
            <div class="license-key">{{ $license->key }}</div>

            <div class="key-details">
                <div><strong>Expires On:</strong> {{ $expiresOn }}</div>
            </div>
            <a href="{{ auth()->check() && auth()->user()->email === 'bitthork165@gmail.com' ? url('/dashboard') : url('/') }}" class="btn-back">Back to Home</a>
        </div>
    </div>
</body>
</html>
