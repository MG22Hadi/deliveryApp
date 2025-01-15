<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    use GeneralTrait; // استخدام الـ Trait

    public function getInProgressOrders()
    {
        try {
            // استرجاع الطلبات البروغرس
            $inProgressOrders = Order::where('status', 'in_progress') // شرط للطلبات البروغرس
            ->get();

            // إذا لم يكن هناك طلبات معلقة
            if ($inProgressOrders->isEmpty()) {
                return $this->returnError('E404', 'No in_progress orders found');
            }


//            // تحويل items من JSON إلى مصفوفة PHP
//            $itemsArray = json_decode($inProgressOrders->items, true);
//
//            // إعادة تعيين المصفوفة المشفرة إلى الـ order
//            $inProgressOrders->items = $itemsArray;
//
//            // إرجاع تفاصيل الطلبات المعلقة
//            return $this->returnData('in_progress_orders', $inProgressOrders, 'In_progress orders retrieved successfully');
//        } catch (\Exception $ex) {
//            return $this->returnError($ex->getCode(), $ex->getMessage());

            // تكرار على كل طلب وفك تشفير items
            $inProgressOrders->each(function ($order) {
                $order->items = json_decode($order->items, true);
            });

            // إرجاع تفاصيل الطلبات لبروغرس
            return $this->returnData('in_progress_orders', $inProgressOrders, 'In_progress orders retrieved successfully');
        } catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }//
}
