<?php
require_once "PaymentSystem.php";

class BirbankCard extends PaymentSystem
{
    public function connect($type)
    {
        if ($type == 1) {
                    return ">>> [CHIP] Kart oxuyucuya daxil edildi. PIN kodu düzgün daxil edildi...";
        }
    }

}
