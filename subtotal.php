<!-- COPY -->
<?php
session_start();

$_SESSION['q1'] = $_POST['quantity1'];
$_SESSION['q2'] = $_POST['quantity2'];
$_SESSION['q3'] = $_POST['quantity3'];

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
        <title>Subtotal</title>
    </head>
    <body>
        <form method="post" action="tax.php" method="POST">
            <p>
                <h1>Order Summary</h1><hr><br>
            </p>
            <?php
                $quant1 = 1.24 * $quantity1;
                $total1 = round($quant1, 2);
                
                $quant2 = 4.98 * $quantity2;
                $total2 = round($quant2, 2);
                
                $quant3 = 1.98 * $quantity3;
                $total3 = round($quant3, 2);
                
                $subtotal = $total1 + $total2 + $total3;
                echo "Subtotal: $$subtotal";
            ?>
            <p>
                <h5>Confirm the purchase and proceed to the tax calculation page.</h5>
            </p>
            <p>
                <input type="submit" name="next" value="Next &gt;">
            </p>
    </body>
</html>
