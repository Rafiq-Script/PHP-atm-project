<?php
class TerminalLogic
{
    public static function showMenu($kartAdi)
    {
        echo PHP_EOL . "=== KAPİTAL BANK (Terminal: #KB-07) ===" . PHP_EOL;
        echo "\n";
        echo "Kart: $kartAdi" . PHP_EOL;
        echo "\n";
        echo "1. Balansı göstər" . PHP_EOL;
        echo "2. Nağdlaşdırma (Məxaric)" . PHP_EOL;
        echo "3. Balansı artır (Mədaxil)" . PHP_EOL;
        echo "4. Qəbz çap et" . PHP_EOL;
        echo "5. Çıxış" . PHP_EOL;
        echo "\n";
        return (int) readline("Zəhmət olmasa əməliyyatı seçin: ");
    }
}