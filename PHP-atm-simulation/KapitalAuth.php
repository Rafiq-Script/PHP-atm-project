<?php
class KapitalAuth
{

    // Simulyasiya edilmiş istifadəçi bazası
    private static $users = [
        '1234' =>
            [
                'name' => 'Birbank Cashback',
                'balance' => 450.0
            ],

        '7777' =>
            [
                'name' => 'Birbank Mastercard',
                'balance' => 55.5
            ]

    ];

    public static function checkAccess($pin)
    {
        if (isset(self::$users[$pin])) {
            return self::$users[$pin];
        }
        return null;
    }

}
