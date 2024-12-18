<html>
    
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce Application</title>
</head>
<body>
    <script>
        function calculateTotalPrice() {
            var pricePerItem = 500; // Price of each item
            var quantity = prompt("Enter the quantity of items sold:"); // Get quantity

            // Validate the input
            if (quantity === null || isNaN(quantity) || quantity < 0) {
                document.write("Invalid input. Please enter a valid quantity.");
                return;
            }

            var totalPrice = pricePerItem * quantity; // Calculate total price

            // Display the result
            document.write("The price of each electrical item is $500.<br>");
            document.write("Total price for " + quantity + " items is $" + totalPrice + ".");
        }

        calculateTotalPrice(); // Call the function
    </script>
</body>
</html>
