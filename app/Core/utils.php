<?php

use JetBrains\PhpStorm\NoReturn;
use KTS\src\Core\Response;

function dump($value, $die = false): void
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';

    if ($die) { die(); }
}

function urlIs($value): bool
{
    return $_SERVER['REQUEST_URI'] === $value;
}

#[NoReturn] function abort(int $code = 404): void
{
    http_response_code($code);
    view("errors/{$code}.view.php", ['heading' => Response::getMessage($code)]);
    die();
}

function authorize($condition, $status = Response::FORBIDDEN): void
{
    if (! $condition) { abort($status); }
}

function base_path($path = ''): string
{
    return BASE_PATH . $path;
}

function view_path($path = ''): string
{
    return BASE_PATH . '/views/' . ($path ? $path : '');
}

function view(string $path, array $attributes = []): void
{
    extract($attributes);
    require base_path('views/' . $path);
}
