<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'customer_type')) {
                $table->string('customer_type')->default('retail')->nullable()->after('role');
            }
            if (!Schema::hasColumn('users', 'credit_limit')) {
                $table->decimal('credit_limit', 15, 2)->default(0)->after('customer_type');
            }
        });

        Schema::table('products', function (Blueprint $table) {
            if (!Schema::hasColumn('products', 'unit_description')) {
                $table->string('unit_description')->default('Per Box')->nullable()->after('stock');
            }
            if (!Schema::hasColumn('products', 'is_best_seller')) {
                $table->boolean('is_best_seller')->default(false)->after('unit_description');
            }
            if (!Schema::hasColumn('products', 'is_visible')) {
                $table->boolean('is_visible')->default(true)->after('is_best_seller');
            }
        });

        Schema::table('wishlists', function (Blueprint $table) {
            if (!Schema::hasColumn('wishlists', 'note')) {
                $table->string('note')->nullable()->after('product_id');
            }
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['customer_type', 'credit_limit']);
        });

        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['unit_description', 'is_best_seller', 'is_visible']);
        });

        Schema::table('wishlists', function (Blueprint $table) {
            $table->dropColumn(['note']);
        });
    }
};