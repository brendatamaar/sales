
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTables extends Migration
{
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id('store_id');
            $table->string('store_name')->nullable();
            $table->string('no_rekening_store')->nullable();
            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('nama')->nullable();
            $table->string('password')->nullable();
            $table->string('jabatan')->nullable();
            $table->unsignedBigInteger('store_id')->nullable();
            $table->foreign('store_id')->references('store_id')->on('stores');
            $table->timestamps();
        });

        Schema::create('salpers', function (Blueprint $table) {
            $table->id('salper_id');
            $table->string('salper_name')->nullable();
            $table->timestamps();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->string('item_code')->primary();
            $table->string('item_name')->nullable();
            $table->string('uom')->nullable();
            $table->decimal('harga', 15, 2)->nullable();
            $table->decimal('diskon', 5, 2)->nullable();
            $table->decimal('harga_setelah_diskon', 15, 2)->nullable();
            $table->timestamps();
        });

        Schema::create('customers', function (Blueprint $table) {
            $table->string('no_telp_customer')->primary();
            $table->string('nama_customer')->nullable();
            $table->text('alamat_lengkap_customer')->nullable();
            $table->decimal('longitude', 10, 6)->nullable();
            $table->decimal('latitude', 10, 6)->nullable();
            $table->timestamps();
        });

        Schema::create('deals', function (Blueprint $table) {
            $table->id();
            $table->string('stage')->nullable();
            $table->string('deals_name')->nullable();
            $table->decimal('deal_size', 15, 2)->nullable();
            $table->date('tanggal_dibuat')->nullable();
            $table->date('tanggal_berakhir')->nullable();
            $table->unsignedBigInteger('store_id')->nullable();
            $table->string('email')->nullable();
            $table->unsignedBigInteger('salper_id')->nullable();
            $table->string('no_telp_customer')->nullable();
            $table->text('notes')->nullable();
            $table->text('foto_upload')->nullable();
            $table->text('payment_term_condition')->nullable();
            $table->string('quotation_expired_date')->nullable();
            $table->text('quotation_upload')->nullable();
            $table->text('receipt_upload')->nullable();
            $table->string('nomor_receipt')->nullable();
            $table->text('alasan_gagal')->nullable();

            $table->foreign('store_id')->references('store_id')->on('stores');
            $table->foreign('email')->references('email')->on('users');
            $table->foreign('salper_id')->references('salper_id')->on('salpers');
            $table->foreign('no_telp_customer')->references('no_telp_customer')->on('customers');
            $table->timestamps();
        });

        Schema::create('deal_items', function (Blueprint $table) {
            $table->unsignedBigInteger('deals_id');
            $table->string('item_code');
            $table->integer('qty')->nullable();
            $table->decimal('harga_setelah_diskon', 15, 2)->nullable();
            $table->decimal('total_harga', 15, 2)->nullable();

            $table->primary(['deals_id', 'item_code']);
            $table->foreign('deals_id')->references('id')->on('deals')->onDelete('cascade');
            $table->foreign('item_code')->references('item_code')->on('products')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('deal_items');
        Schema::dropIfExists('deals');
        Schema::dropIfExists('customers');
        Schema::dropIfExists('products');
        Schema::dropIfExists('salpers');
        Schema::dropIfExists('users');
        Schema::dropIfExists('stores');
    }
}
