<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminOrderController extends Controller
{
    private const STATUSES = [
        'Pending',
        'Processing',
        'Shipped',
        'Delivered',
        'Completed',
        'Cancelled',
    ];

    public function index(Request $request)
    {
        $statuses = self::STATUSES;

        $selectedStatus = $request->query('status');

        $orders = Order::with(['items', 'user'])
            ->when(
                $selectedStatus &&
                in_array($selectedStatus, $statuses, true),
                function ($query) use ($selectedStatus) {
                    $query->where('status', $selectedStatus);
                }
            )
            ->latest()
            ->get();

        return view('admin.orders.index', compact(
            'orders',
            'statuses',
            'selectedStatus'
        ));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => [
                'required',
                Rule::in(self::STATUSES),
            ],
        ]);

        $order = Order::findOrFail($id);

        $order->update([
            'status' => $request->status,
        ]);

        return back()->with(
            'success',
            'Order status updated successfully.'
        );
    }
}
