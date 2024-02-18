<?php

declare(strict_types=1);

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        $users = [
            [
                "name" => "Alex",
                "age" => 30,
            ],
            [
                "name" => "Amon",
                "age" => 23,
            ],
            [
                "name" => "John",
                "age" => 15,
            ],
        ];

        return view("dashboard", ["users" => $users]);
    }
}
