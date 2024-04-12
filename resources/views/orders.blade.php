<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .container-fluid {
            padding: 20px;
        }
        .sidebar {
            background-color: #333;
            color: #fff;
            padding: 20px;
            min-height: 100vh;
        }
        .order-content {
            padding: 20px;
        }
        .order-details {
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-bottom: 30px;
        }
        .order-info {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #333;
        }
        .product-image {
            max-width: 150px;
            max-height: 150px;
            margin-right: 20px;
            border-radius: 5px;
        }
        .product-details {
            color: #333;
            margin-bottom: 10px;
        }
        .total-price {
            font-size: 22px;
            font-weight: bold;
            margin-top: 20px;
            color: #333;
        }
        .shipping-details {
            color: #333;
            margin-bottom: 20px;
        }
        .status-info {
            font-size: 18px;
            color: #333;
        }
        .payment-details {
            color: #333;
            margin-bottom: 20px;
        }
        .track-order-btn {
            margin-top: 20px;
        }
        .alert {
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 20px;
        }
        .alert-success {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
        }
        .alert-danger {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-3 sidebar">
            <h2 class="mb-4">User Dashboard</h2>
            <!-- Sidebar content goes here -->
        </nav>
        <main class="col-md-9 order-content">
            <h2 class="mb-4">Order Details</h2>

            <div class="alert alert-success" role="alert">
                Your order has been successfully delivered.
            </div>

            <div class="order-details">
                <div class="order-info">Order ID: 12345</div>
                <div>Order Date: 2024-03-04</div>

                <hr>

                <div class="d-flex mb-3 align-items-center">
                    <img src="product1.jpg" alt="Product Image" class="product-image">
                    <div class="product-details">
                        <div>Product: Product Name 1</div>
                        <div>Price: $50</div>
                    </div>
                </div>

                <hr>

                <div class="d-flex mb-3 align-items-center">
                    <img src="product2.jpg" alt="Product Image" class="product-image">
                    <div class="product-details">
                        <div>Product: Product Name 2</div>
                        <div>Price: $30</div>
                    </div>
                </div>

                <hr>

                <div class="total-price">Total Price: $80</div>

                <hr>

                <div class="shipping-details">
                    <div>Shipping Address: John Doe, 123 Main St, City, Country</div>
                    <div>Contact Number: +1234567890</div>
                    <div>Email: example@example.com</div>
                </div>

                <hr>

                <div class="payment-details">
                    <div>Transaction ID: 1234567890</div>
                    <div>Reference Number: REF123456</div>
                    <div>Payment Method: Credit Card</div>
                </div>

                <hr>

                <div class="status-info">Status: Shipped</div>
                <div class="status-info">Estimated Delivery: 2024-03-10</div>

                <hr>

                <div class="text-right track-order-btn">
                    <button class="btn btn-primary">Track Order</button>
                </div>
            </div>
        </main>
    </div>
</div>

<!-- Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
