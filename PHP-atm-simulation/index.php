<?php
require_once "BirbankCard.php";
require_once "KapitalAuth.php";
require_once "TerminalLogic.php";

echo "=== KAPİTAL BANK TERMINALI ===" . PHP_EOL;
$pin = readline("Zəhmət olmasa PIN kodu daxil edin: ");

// Bazadan istifadəçini yoxlayırıq
$userData = KapitalAuth::checkAccess($pin);

if ($userData) {
    $card = new BirbankCard($userData['name'], $userData['balance']);
    echo "Xoş gəlmisiniz, hörmətli müştəri!" . PHP_EOL;
    echo $card->connect(1) . PHP_EOL; // Avtomatik NFC qoşulma simulyasiyası
} else {
    die("Xəta: PIN kod yanlışdır! Giriş bloklandı." . PHP_EOL);
}

while (true) {
    $action = TerminalLogic::showMenu($card->getName());

    switch ($action) {
        case 1:
            echo "Balans: " . $card->getBalance() . PHP_EOL;
            break;


        case 2:
            $amount = (float) readline("Məxaric məbləği: ");
            if ($card->withdraw($amount)) {
                echo "Uğurlu! Qalıq: " . $card->getBalance() . " AZN" . PHP_EOL;
            } else {
                echo "Xəta: Vəsait çatışmır." . " AZN" . PHP_EOL;
            }
            break;


        case 3:
            $amount = (float) readline("Mədaxil məbləği: ");
            $card->deposit($amount);
            echo "Yeni balans: " . $card->getBalance() . " AZN" . PHP_EOL;
            break;


        case 4:
            echo "Qəbz çap olunur..." . PHP_EOL;
            sleep(2);
            echo PHP_EOL . "---------- QƏBZ (ÇEK) ----------" . PHP_EOL;
            echo "Terminal: KB-07-BAKU" . PHP_EOL;
            echo "Tarix: " . date("d.m.Y H:i") . PHP_EOL;
            echo "Kart: " . $card->getName() . PHP_EOL;
            echo "Cari Balans: " . $card->getBalance() . PHP_EOL;
            echo "Status: Aktiv" . PHP_EOL;
            echo "--------------------------------" . PHP_EOL;
            break;

        case 5:
            echo "Kartınızı götürün. Sağ olun!" . PHP_EOL;
            exit;
    }
}