@extends('admin.layout')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Key Generation - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body {
            background: linear-gradient(135deg, #1f1f1f 0%, #212325 100%);
            min-height: 100vh;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
        }

        .main-container {
            padding: 1.5rem;
            max-width: 1400px;
            margin: 0 auto;
        }

        .page-header {
            background: rgb(131, 128, 128);
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }

        .page-header h1 {
            margin: 0;
            font-size: 1.75rem;
            font-weight: 600;
            color: #ffffff;
        }

        .page-header p {
            margin: 0.25rem 0 0 0;
            color: #ffffff;
            font-size: 0.9rem;
        }

        .stat-card {
            background: rgb(131, 128, 128);
            border-radius: 10px;
            padding: 1.25rem;
            box-shadow: 0 2px 6px rgba(0,0,0,0.06);
            border-left: 4px solid;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .stat-card.primary {
            border-left-color: #0d6efd;
        }

        .stat-card.success {
            border-left-color: #198754;
        }

        .stat-card.warning {
            border-left-color: #ffc107;
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }

        .stat-icon.primary {
            background: rgba(13, 110, 253, 0.1);
            color: #0d6efd;
        }

        .stat-icon.success {
            background: rgba(25, 135, 84, 0.1);
            color: #198754;
        }

        .stat-icon.warning {
            background: rgba(255, 193, 7, 0.1);
            color: #ffc107;
        }

        .stat-value {
            font-size: 1.75rem;
            font-weight: 700;
            margin: 0;
            color: #f5f5f5;
        }

        .stat-label {
            font-size: 0.85rem;
            color: #ffffff;
            margin: 0;
            font-weight: 500;
        }

        .duration-card {
            background: rgb(131, 128, 128);
            border-radius: 12px;
            padding: 1.5rem;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid transparent;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            height: 100%;
        }

        .duration-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.12);
            border-color: #0d6efd;
        }

        .duration-card:active {
            transform: translateY(-2px);
        }

        .duration-icon {
            width: 64px;
            height: 64px;
            margin: 0 auto 1rem;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .duration-card.day-1 .duration-icon {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        }

        .duration-card.day-7 .duration-icon {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        }

        .duration-card.day-30 .duration-icon {
            background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
        }

        .duration-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #fefefe;
        }

        .duration-desc {
            font-size: 0.85rem;
            color: #ffffff;
            margin: 0;
        }

        .key-display-card {
            background: rgb(131, 128, 128);
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }

        .key-display-card h5 {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 1.25rem;
            color: #ffffff;
        }

        .key-box {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 10px;
            padding: 1.5rem;
            text-align: center;
            margin-bottom: 1.25rem;
        }

        .key-value {
            font-size: 1.75rem;
            font-weight: 700;
            color: white;
            letter-spacing: 2px;
            font-family: 'Courier New', monospace;
            margin-bottom: 0.75rem;
        }

        .key-placeholder {
            color: rgba(255,255,255,0.7);
            font-size: 1rem;
        }

        .copy-btn {
            background: rgb(131, 128, 128);
            color: #667eea;
            border: none;
            padding: 0.5rem 1.5rem;
            border-radius: 6px;
            font-weight: 600;
            transition: all 0.2s;
        }

        .copy-btn:hover {
            background: #f8f9fa;
            transform: scale(1.05);
        }

        .key-info {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
        }

        .info-item {
            background: #f8f9fa;
            padding: 1rem;
            border-radius: 8px;
            border-left: 3px solid #0d6efd;
        }

        .info-label {
            font-size: 0.8rem;
            color: #ffffff;
            margin-bottom: 0.25rem;
            font-weight: 500;
        }

        .info-value {
            font-size: 1rem;
            color: #ffffff;
            font-weight: 600;
        }

        .history-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }

        .history-card h5 {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 1.25rem;
            color: #ffffff;
        }

        .history-item {
            background: #f8f9fa;
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 0.75rem;
            border-left: 3px solid #6c757d;
            transition: all 0.2s;
        }

        .history-item:hover {
            background: #e9ecef;
            border-left-color: #0d6efd;
        }

        .history-key {
            font-family: 'Courier New', monospace;
            font-weight: 600;
            color: #ffffff;
            font-size: 0.9rem;
            margin-bottom: 0.25rem;
        }

        .history-meta {
            font-size: 0.75rem;
            color: #6c757d;
            display: flex;
            gap: 1rem;
        }

        .empty-state {
            text-align: center;
            padding: 2rem;
            color: #6c757d;
        }

        .empty-state i {
            font-size: 3rem;
            margin-bottom: 1rem;
            opacity: 0.3;
        }

        .badge-duration {
            font-size: 0.75rem;
            padding: 0.25rem 0.75rem;
            border-radius: 12px;
            font-weight: 600;
        }

        @media (max-width: 768px) {
            .main-container {
                padding: 1rem;
            }

            .key-value {
                font-size: 1.25rem;
            }
        }
    </style>
</head>
<body>
    <div class="main-container">
         Page Header
        <div class="page-header">
            <h1><i class="bi bi-key-fill me-2"></i>License Key Generation</h1>
            <p>Generate and manage license keys with different validity periods</p>
        </div>
         Stats Row
        <div class="row g-3 mb-4">
            <div class="col-md-4">
                <div class="stat-card primary">
                    <div class="d-flex align-items-center">
                        <div class="stat-icon primary">
                            <i class="bi bi-key"></i>
                        </div>
                        <div class="ms-3">
                            <p class="stat-value" id="totalKeys">0</p>
                            <p class="stat-label">Total Keys Generated</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card success">
                    <div class="d-flex align-items-center">
                        <div class="stat-icon success">
                            <i class="bi bi-check-circle"></i>
                        </div>
                        <div class="ms-3">
                            <p class="stat-value" id="activeKeyDuration">-</p>
                            <p class="stat-label">Active Key Duration</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card warning">
                    <div class="d-flex align-items-center">
                        <div class="stat-icon warning">
                            <i class="bi bi-clock-history"></i>
                        </div>
                        <div class="ms-3">
                            <p class="stat-value" id="historyCount">0</p>
                            <p class="stat-label">Keys in History</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

         Duration Selection
        <div class="row">
            <div class="col-6">
                <div class="duration-card day-1">
                    <div class="duration-icon">
                        <i class="bi bi-lightning-charge-fill"></i>
                    </div>
                    <h3 class="duration-title">You can generate a <strong>30-day license key</strong> by clicking the "Click a duration to generate ke" card below.</h3>
                </div>
            </div>
            <div class="col-6">
                <div class="duration-card day-30" onclick="generateKey(30)">
                    <div class="duration-icon">
                        <i class="bi bi-calendar-month"></i>
                    </div>
                    <h3 class="duration-title">30 Days</h3>
                    <p class="duration-desc">Monthly license</p>
                </div>
            </div>
        </div>
        <div class="row g-3 mt-4">
            <div class="col-12">
                <div class="key-display-card">
                    <h5><i class="bi bi-shield-check"></i> Generated License Key</h5>
                    <div class="key-box">
                        <div class="key-value" id="keyDisplay">
                            <form action="{{ route('generateAdmin') }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-lg">Click a duration to generate key</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let keyHistory = [];
        let totalKeysGenerated = 0;

        function generateRandomKey() {
            const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            let key = $key;
            for (let i = 0; i < 16; i++) {
                if (i > 0 && i % 4 === 0) key += '-';
                key += chars.charAt(Math.floor(Math.random() * chars.length));
            }
            return key;
        }

        function formatDate(date) {
            return date.toLocaleDateString('en-US', {
                year: 'numeric',
                month: 'short',
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            });
        }

        function generateKey(days) {
            const key = generateRandomKey();
            const generatedDate = new Date();
            const expiryDate = new Date();
            expiryDate.setDate(expiryDate.getDate() + days);

            // Update display
            document.getElementById('keyDisplay').textContent = key;
            document.getElementById('copyBtn').style.display = 'inline-block';
            document.getElementById('keyInfo').style.display = 'grid';

            // Update info
            document.getElementById('infoDuration').textContent = `${days} Day${days > 1 ? 's' : ''}`;
            document.getElementById('infoGenerated').textContent = formatDate(generatedDate);
            document.getElementById('infoExpiry').textContent = formatDate(expiryDate);

            // Update stats
            totalKeysGenerated++;
            document.getElementById('totalKeys').textContent = totalKeysGenerated;
            document.getElementById('activeKeyDuration').textContent = `${days} Day${days > 1 ? 's' : ''}`;

            // Add to history
            keyHistory.unshift({
                key: key,
                days: days,
                generated: generatedDate,
                expiry: expiryDate
            });

            if (keyHistory.length > 5) {
                keyHistory.pop();
            }

            updateHistory();
        }

        function updateHistory() {
            const historyList = document.getElementById('historyList');
            document.getElementById('historyCount').textContent = keyHistory.length;

            if (keyHistory.length === 0) {
                historyList.innerHTML = `
                    <div class="empty-state">
                        <i class="bi bi-inbox"></i>
                        <p>No keys generated yet</p>
                    </div>
                `;
                return;
            }

            historyList.innerHTML = keyHistory.map(item => {
                const badgeClass = item.days === 1 ? 'bg-danger' : item.days === 7 ? 'bg-info' : 'bg-success';
                return `
                    <div class="history-item">
                        <div class="history-key">${item.key}</div>
                        <div class="history-meta">
                            <span><span class="badge ${badgeClass} badge-duration">${item.days} Day${item.days > 1 ? 's' : ''}</span></span>
                            <span><i class="bi bi-calendar3 me-1"></i>${formatDate(item.expiry)}</span>
                        </div>
                    </div>
                `;
            }).join('');
        }

        function copyKey() {
            const keyText = document.getElementById('keyDisplay').textContent;
            navigator.clipboard.writeText(keyText).then(() => {
                const btn = document.getElementById('copyBtn');
                const originalHTML = btn.innerHTML;
                btn.innerHTML = '<i class="bi bi-check2 me-2"></i>Copied!';
                btn.style.background = '#198754';
                btn.style.color = 'white';

                setTimeout(() => {
                    btn.innerHTML = originalHTML;
                    btn.style.background = 'white';
                    btn.style.color = '#667eea';
                }, 2000);
            });
        }
    </script>
</body>
</html>
@endsection
