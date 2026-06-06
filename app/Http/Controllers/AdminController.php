<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use App\Models\SupportMessage;
class AdminController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();

        $totalOrders = Order::count();

        $totalUsers = User::count();

        $totalRevenue = Order::sum('total');

        $pendingOrders = Order::where('status', 'Pending')->count();

        $salesByMonth = Order::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('SUM(total) as revenue')
        )
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy(DB::raw('MONTH(created_at)'))
            ->get();

        $monthLabels = [];
        $salesValues = [];

        foreach ($salesByMonth as $sale) {
            $monthLabels[] = date('M', mktime(0, 0, 0, $sale->month, 1));
            $salesValues[] = $sale->revenue;
        }
        $openMessages = SupportMessage::where('status', 'Open')->count();

        $latestMessages = SupportMessage::with('user')
            ->latest()
            ->take(3)
            ->get();

        return view('admin.dashboard', compact(
            'totalProducts',
            'totalOrders',
            'totalUsers',
            'totalRevenue',
            'pendingOrders',
            'monthLabels',
            'salesValues',
            'openMessages',
            'latestMessages'
        ));
    }
}
