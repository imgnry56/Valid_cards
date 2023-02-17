<?php

class CardValidation {

    public function validate($cardNumber) {
        // Проверка эмитента карты
        if (preg_match('/^(41|42|43|44|45|46|47|48|49|14)/', $cardNumber)) {
            $emitent = 'VISA';
        } elseif (preg_match('/^(51|52|53|54|55|62|67)/', $cardNumber)) {
            $emitent = 'MasterCard';
        } elseif (preg_match('/^(22)/', $cardNumber)) {
            $emitent = 'MIR';
        } else {
            $emitent = 'Эмитент не распознан';
        }


        $sum = 0;
        $length = strlen($cardNumber);
        $str = str_split($cardNumber);

        for ($i = 0; $i < $length; $i++) {
            $number = (int)$str[$i];
            if (($i + $length) % 2 == 0) {
                $number = $number * 2;
                if ($number > 9) {
                    $number = $number - 9;
                }
            }
            $sum += $number;
        }

        if ($sum % 10 == 0) {
            $isValid = 'валидна,';
        } else {
            $isValid = 'не валидна,';
        }

        return [$isValid, $emitent];
    }
}

$cardValidation = new CardValidation();
