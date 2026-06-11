<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

        try {
            DB::transaction(function () use ($request, $id) {
                $order = Order::with('items')
                    ->lockForUpdate()
                    ->findOrFail($id);

                $newStatus = $request->status;

                /*
                 * Sipariş iptal ediliyorsa stokları yalnızca bir kez geri ekle.
                 */
                if (
                    $newStatus === 'Cancelled' &&
                    !$order->stock_restored
                ) {
                    foreach ($order->items as $item) {
                        if (!$item->product_id) {
                            throw new \Exception(
                                $item->product_name .
                                ' is not linked to a product.'
                            );
                        }

                        $product = \App\Models\Product::where(
                            'id',
                            $item->product_id
                        )
                            ->lockForUpdate()
                            ->first();

                        if ($product) {
                            $product->increment(
                                'stock',
                                $item->quantity
                            );
                        }
                    }

                    $order->stock_restored = true;
                }

                /*
                 * Cancelled sipariş tekrar aktif duruma alınırsa
                 * stokları yeniden düş.
                 */
                if (
                    $order->status === 'Cancelled' &&
                    $newStatus !== 'Cancelled' &&
                    $order->stock_restored
                ) {
                    foreach ($order->items as $item) {
                        if (!$item->product_id) {
                            throw new \Exception(
                                $item->product_name .
                                ' is not linked to a product.'
                            );
                        }

                        $product = \App\Models\Product::where(
                            'id',
                            $item->product_id
                        )
                            ->lockForUpdate()
                            ->firstOrFail();

                        if ($product->stock < $item->quantity) {
                            throw new \Exception(
                                $product->name .
                                ' does not have enough stock to reactivate this order.'
                            );
                        }

                        $product->decrement(
                            'stock',
                            $item->quantity
                        );
                    }

                    $order->stock_restored = false;
                }

                $order->status = $newStatus;
                $order->save();
            });
        } catch (\Exception $exception) {
            return back()->with(
                'error',
                $exception->getMessage()
            );
        }

        return back()->with(
            'success',
            'Order status updated successfully.'
        );
    }
}
