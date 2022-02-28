<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index() {
        return view('admin.dashboard');
    }

    function viewOrders() {
        return view('admin.dashboard');
    }

    function viewOrderHistory() {
        return view('admin.dashboard');
    }

    function viewUsers() {
        return view('admin.dashboard');
    }
}
