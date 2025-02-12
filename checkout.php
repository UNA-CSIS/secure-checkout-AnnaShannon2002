<?php
session_start();
session_start();
// Do a redirect here
// header("Location: index.php");

$quantity1 = $_SESSION['q1'];
$quantity2 = $_SESSION['q2'];
$quantity3 = $_SESSION['q3'];

$total1 = round(1.24 * $quantity1, 2);
$total2 = round(4.98 * $quantity2, 2);
$total3 = round(1.98 * $quantity3, 2);

$subtotal = $total1 + $total2 + $total3;
$tax = round($subtotal * 0.095, 2);
$total = round($subtotal + $tax, 2);

// Check for the credit card 
function validateCard($cardNumber) {
    $cardNumber = str_replace(' ', '', $cardNumber);
    
    if (preg_match('/^5[1-5][0-9]{14}$/', $cardNumber)) {
        return ['MASTERCARD', true];
    } elseif (preg_match('/^4[0-9]{12}(?:[0-9]{3})?$/', $cardNumber)) {
        return ['VISA', true];
    } elseif (preg_match('/^3[47][0-9]{13}$/', $cardNumber)) {
        return ['AMEX', true];
    }
    return [null, false];
}

// Validate the card number
$message = '';  // Initialize the message variable
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['card_number'])) {
    $cardNumber = $_POST['card_number'];
    list($cardType, $isValid) = validateCard($cardNumber);
    
    if ($isValid) {
        $lastFour = substr($cardNumber, -4);
        $message = "<h5>Your $cardType ending with $lastFour has been charged $$total. 
        <p>Thank you for your purchase!</5>";
    } else {
        $message = "<h5>Invalid card.<h5>";
    }
}
?>

<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
</head>
<body>
    <h1>Checkout</h1><hr><br>
    <p>Total: $<?php echo number_format($total, 2); ?></p>
    <form method="post">
        <label for="card_name">Card Name:</label>
        <input type="text" name="card_name" required><br>
        
        <label for="expiration_date">Expiration Date:</label>
        <input type="text" name="expiration_date" required><br>
        
        <label for="security_code">Security Code</label>
        <input type="text" name="security_code" required><br>
        
        <label for="card_number">Credit Card Number:</label>
        <input type="text" name="card_number" required><br>
        <input type="submit" name="next" value="Next &gt;">
    </form>
    <p>
        <?php 
            echo $message;
        ?>
    </p>
</body>
</html>
