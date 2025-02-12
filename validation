<?php
function validateCard($cardNumber) {
    $cardNumber = preg_replace('/\s+/', '', $cardNumber);

    if (preg_match('/^5[1-5][0-9]{14}$/', $cardNumber)) {
        return ['MASTERCARD', true];
    } elseif (preg_match('/^4[0-9]{12}(?:[0-9]{3})?$/', $cardNumber)) {
        return ['VISA', true];
    } elseif (preg_match('/^3[47][0-9]{13}$/', $cardNumber)) {
        return ['AMEX', true];
    }
    return [null, false];
}
?>
