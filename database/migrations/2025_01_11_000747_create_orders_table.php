<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            // الحقول الأساسية
            $table->id(); // معرف الطلب (تلقائي)
            $table->unsignedBigInteger('user_id'); // معرف المستخدم الذي قام بالطلب
            $table->json('items'); // مصفوفة محتويات الطلب (تفاصيل المنتجات والكميات)
            $table->decimal('total_amount', 10, 2); // السعر الإجمالي للطلب
            $table->string('status')->default('pending'); // حالة الطلب (معلّق، مكتمل، إلخ)
            $table->timestamps(); // created_at و updated_at (تلقائي)

            // الحقول الإضافية (اختيارية)
//            $table->string('shipping_address')->nullable(); // عنوان الشحن
//            $table->string('payment_method')->nullable(); // طريقة الدفع
//            $table->string('payment_status')->default('pending'); // حالة الدفع
//            $table->text('notes')->nullable(); // ملاحظات إضافية

            // Foreign key لربط الطلب بالمستخدم
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};