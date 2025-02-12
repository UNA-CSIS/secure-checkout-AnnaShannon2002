<!-- COPY -->
<?php
session_start();

$quantity1 = $_SESSION['q1'];
$quantity2 = $_SESSION['q2'];
$quantity3 = $_SESSION['q3'];
?>
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tax</title>
    </head>
    <body>
        <form method="post" action="checkout.php" method="POST">
            <p>
                <h1>Total</h1><hr><br>
            </p>
            <?php
                $total1 = round(1.24 * $quantity1, 2);
                $total2 = round(4.98 * $quantity2, 2);
                $total3 = round(1.98 * $quantity3, 2);
                
                $subtotal = $total1 + $total2 + $total3;
                echo "Subtotal: $$subtotal<p>";
                
                $tax = round($subtotal * 0.095, 2);
                echo "Tax: $$tax<p>";
                
                $total = round($subtotal + $tax, 2);
                echo "Total: $$total";
            ?>
            <p>
                <h5><br>Checkout or continue shopping below:</h5>
            </p>
            <p>
                <label for="checkout">Checkout:</label>
                <input type="submit" name="next" value="Next &gt;">
            </p>
            <p>
                <label for="contshopping">Continue Shopping:</label>
                <button type="button" onclick="window.location.href='index.php'">Continue Shopping</button>
            </p>
    </body>
</html>
