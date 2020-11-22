<?php

namespace MediaBoutique\Todoist\Api\Support;

class Color
{
    public static function getAll(): array
    {
        return [
            30 => ['hex' => '#b8255f', 'name' => 'Berry Red'],
            31 => ['hex' => '#db4035', 'name' => 'Red'],
            32 => ['hex' => '#ff9933', 'name' => 'Orange'],
            33 => ['hex' => '#fad000', 'name' => 'Yellow'],
            34 => ['hex' => '#afb83b', 'name' => 'Olive Green'],
            35 => ['hex' => '#7ecc49', 'name' => 'Lime Green'],
            36 => ['hex' => '#299438', 'name' => 'Green'],
            37 => ['hex' => '#6accbc', 'name' => 'Mint Green'],
            38 => ['hex' => '#158fad', 'name' => 'Teal'],
            39 => ['hex' => '#14aaf5', 'name' => 'Skye Blue'],
            40 => ['hex' => '#96c3eb', 'name' => 'Light Blue'],
            41 => ['hex' => '#4073ff', 'name' => 'Blue'],
            42 => ['hex' => '#884dff', 'name' => 'Grape'],
            43 => ['hex' => '#af38eb', 'name' => 'Violet'],
            44 => ['hex' => '#eb96eb', 'name' => 'Lavender'],
            45 => ['hex' => '#e05194', 'name' => 'Magenta'],
            46 => ['hex' => '#ff8d85', 'name' => 'Salmon'],
            47 => ['hex' => '#808080', 'name' => 'Charcoal'],
            48 => ['hex' => '#b8b8b8', 'name' => 'Grey'],
            49 => ['hex' => '#ccac93', 'name' => 'Taupe'],
        ];
    }

    public static function getById(int $id): ?array
    {
        $colors = self::getAll();
        return (!empty($colors[$id]) ? $colors[$id] : null);
    }

    public static function getHexById(int $id): ?string
    {
        $colors = self::getAll();
        return (!empty($colors[$id]['hex']) ? $colors[$id]['hex'] : null);
    }

    public static function getNameById(int $id): ?string
    {
        $colors = self::getAll();
        return (!empty($colors[$id]['name']) ? $colors[$id]['name'] : null);
    }
}