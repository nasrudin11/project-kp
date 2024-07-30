<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index() {
        $data = [
            'categories' => ['January', 'February', 'March', 'April', 'May'], // Months
            'series' => [
                [
                    'name' => 'Beras Premium',
                    'data' => [10, 15, 14, 17, 20]
                ],
                [
                    'name' => 'Beras Medium',
                    'data' => [9, 12, 11, 15, 18]
                ],
                [
                    'name' => 'Beras Termurah',
                    'data' => [8, 10, 9, 12, 15]
                ],
                // Add more series for other staple foods
                [
                    'name' => 'Jagung Pipilan',
                    'data' => [5, 6, 7, 8, 9]
                ],
                // ... (other food items)
            ]
        ];

        return view('dashboard.admin.index', compact('data'), ['title' => 'Dashboard Admin']);
    }
}
