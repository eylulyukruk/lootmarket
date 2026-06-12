<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\SupportMessage;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        /*
         * Genel istatistikler
         */
        $totalProducts = Product::count();

        $totalOrders = Order::count();

        $totalUsers = User::count();

        /*
         * İptal edilen siparişleri gelir hesabına katmıyoruz.
         */
        $totalRevenue = Order::where('status', '!=', 'Cancelled')
            ->sum('total');

        $pendingOrders = Order::where('status', 'Pending')
            ->count();

        /*
         * Stok istatistikleri
         */
        $lowStockCount = Product::where('stock', '>', 0)
            ->where('stock', '<=', 5)
            ->count();

        $outOfStockCount = Product::where('stock', '<=', 0)
            ->count();

        /*
         * Dashboard'da gösterilecek düşük stoklu ürünler.
         * Önce stoğu en az olanlar gelir.
         */
        $lowStockProducts = Product::where('stock', '<=', 5)
            ->orderBy('stock')
            ->orderBy('name')
            ->take(6)
            ->get();

        /*
         * Son siparişler
         */
        $latestOrders = Order::with(['user', 'items'])
            ->latest()
            ->take(5)
            ->get();

        /*
         * Aylık satış grafiği.
         * Farklı yılların aynı ayları birbirine karışmasın diye
         * hem yıl hem ay üzerinden grupluyoruz.
         */
        $salesByMonth = Order::select(
            DB::raw('YEAR(created_at) as year'),
            DB::raw('MONTH(created_at) as month'),
            DB::raw('SUM(total) as revenue')
        )
            ->where('status', '!=', 'Cancelled')
            ->groupBy(
                DB::raw('YEAR(created_at)'),
                DB::raw('MONTH(created_at)')
            )
            ->orderBy(DB::raw('YEAR(created_at)'))
            ->orderBy(DB::raw('MONTH(created_at)'))
            ->get();

        $monthLabels = [];
        $salesValues = [];

        foreach ($salesByMonth as $sale) {
            $monthLabels[] = date(
                'M Y',
                mktime(0, 0, 0, $sale->month, 1, $sale->year)
            );

            $salesValues[] = (float) $sale->revenue;
        }

        /*
         * Destek mesajları
         */
        $openMessages = SupportMessage::where('status', 'Open')
            ->count();

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
            'lowStockCount',
            'outOfStockCount',
            'lowStockProducts',
            'latestOrders',
            'monthLabels',
            'salesValues',
            'openMessages',
            'latestMessages'
        ));
    }
}
