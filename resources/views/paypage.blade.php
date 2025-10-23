<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment - Shopping Site</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #000000;
            color: #ffffff;
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .payment-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 2rem 1rem;
        }

        .payment-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .payment-header i {
            font-size: 3rem;
            color: #4ade80;
            margin-bottom: 1rem;
        }

        .payment-card {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            padding: 2rem;
            backdrop-filter: blur(10px);
        }

        .payment-methods {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .payment-method {
            flex: 1;
            padding: 1rem;
            background: rgba(255, 255, 255, 0.05);
            border: 2px solid rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .payment-method:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: #4ade80;
        }

        .payment-method.active {
            background: rgba(74, 222, 128, 0.2);
            border-color: #4ade80;
        }

        .payment-method i {
            font-size: 2rem;
            color: #4ade80;
            margin-bottom: 0.5rem;
        }

        .form-label {
            color: #d1d5db;
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        .form-control {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: #ffffff;
            border-radius: 8px;
            padding: 0.75rem;
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.08);
            border-color: #4ade80;
            color: #ffffff;
            box-shadow: 0 0 0 0.2rem rgba(74, 222, 128, 0.25);
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.4);
        }

        .btn-pay {
            width: 100%;
            padding: 1rem;
            font-size: 1.1rem;
            font-weight: 600;
            background: linear-gradient(135deg, #4ade80 0%, #22c55e 100%);
            border: none;
            border-radius: 10px;
            color: #000000;
            transition: all 0.3s ease;
        }

        .btn-pay:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(74, 222, 128, 0.4);
        }

        .security-badge {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            margin-top: 1.5rem;
            color: #9ca3af;
            font-size: 0.9rem;
        }

        .security-badge i {
            color: #4ade80;
        }

        .card-icons {
            display: flex;
            gap: 0.5rem;
            margin-top: 0.5rem;
        }

        .card-icon {
            width: 40px;
            height: 25px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.7rem;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="payment-container">
        <div class="payment-header">
            <i class="bi bi-shield-lock-fill"></i>
            <h1 class="mb-2">Secure Payment</h1>
            <p class="text-muted">Complete your purchase securely</p>
        </div>

        <div class="payment-card">
            <h5 class="mb-3">Select Payment Method</h5>
            <div class="payment-methods">
                <div class="payment-method active" onclick="selectPaymentMethod(this)">
                    <i class="bi bi-credit-card-fill"></i>
                    <div>Card</div>
                </div>
                <div class="payment-method" onclick="selectPaymentMethod(this)">
                    <i class="bi bi-wallet-fill"></i>
                    <div>Wallet</div>
                </div>
                <div class="payment-method" onclick="selectPaymentMethod(this)">
                    <i class="bi bi-phone-fill"></i>
                    <div>Mobile</div>
                </div>
            </div>

            <form id="paymentForm" action="{{ route('generateKey') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="cardName" class="form-label">
                        <i class="bi bi-person-fill me-2"></i>Cardholder Name
                    </label>
                    <input type="text" class="form-control" id="cardName" name="name" placeholder="John Doe" required>
                </div>

                <div class="mb-3">
                    <label for="cardNumber" class="form-label">
                        <i class="bi bi-credit-card me-2"></i>Card Number
                    </label>
                    <input type="text" class="form-control" id="cardNumber" name="cardNumber" placeholder="1234 5678 9012 3456" maxlength="19" required>
                    <div class="card-icons">
                        <div class="card-icon">VISA</div>
                        <div class="card-icon">MC</div>
                        <div class="card-icon">AMEX</div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="expiry" class="form-label">
                            <i class="bi bi-calendar-event me-2"></i>Expiry Date
                        </label>
                        <input type="text" class="form-control" id="expiry" name="expries" placeholder="MM/YY" maxlength="5" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="cvv" class="form-label">
                            <i class="bi bi-lock-fill me-2"></i>CVV
                        </label>
                        <input type="text" class="form-control" id="cvv" name="cvv" placeholder="123" maxlength="4" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-pay">
                    <i class="bi bi-check-circle-fill me-2"></i>Pay Now & Continue Shopping
                </button>

                <div class="security-badge">
                    <i class="bi bi-shield-check"></i>
                    <span>Your payment information is secure and encrypted</span>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function selectPaymentMethod(element) {
            document.querySelectorAll('.payment-method').forEach(method => {
                method.classList.remove('active');
            });
            element.classList.add('active');
        }

        // Format card number with spaces
        document.getElementById('cardNumber').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\s/g, '');
            let formattedValue = value.match(/.{1,4}/g)?.join(' ') || value;
            e.target.value = formattedValue;
        });

        // Format expiry date
        document.getElementById('expiry').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length >= 2) {
                value = value.slice(0, 2) + '/' + value.slice(2, 4);
            }
            e.target.value = value;
        });

        // Only allow numbers in CVV
        document.getElementById('cvv').addEventListener('input', function(e) {
            e.target.value = e.target.value.replace(/\D/g, '');
        });

        function handlePayment(event) {
            event.preventDefault();

            const btn = event.target.querySelector('.btn-pay');
            btn.innerHTML = '<i class="bi bi-hourglass-split me-2"></i>Processing...';
            btn.disabled = true;

            // setTimeout(() => {
            //     alert('Payment Successful! Redirecting to Key licence page...');

            //     // Generate a random key
            //     const licenseKey = Math.random().toString(36).substring(2, 15).toUpperCase() +
            //                     Math.random().toString(36).substring(2, 7).toUpperCase();

            //     // Use Blade to inject the base route URL safely
            //     const baseUrl = "{{ url('getKey') }}";
            //     window.location.href = `${baseUrl}/${licenseKey}`;
            // }, 2000);
        }
    </script>
</body>
</html>
