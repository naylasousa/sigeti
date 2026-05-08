<?php

namespace App\Controllers\Admin;

use App\Core\Auth;
use App\Core\Controller;
use App\Core\Permission;
use App\Models\Ticket\Ticket;

class DashboardController extends Controller
{
    public function __construct()
    {
        parent::__construct("App");
        Auth::requirePermission(Permission::VIEW_USERS);
    }
    public function index(): void
    {
        $ticketModel = new Ticket();
        $userId = Auth::user()->id;

    }

}