<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->id();
            $table->morphs('tokenable');
            $table->string('name');
            $table->string('token', 64)->unique();
            $table->text('abilities')->nullable();
            $table->timestamp('last_used_at')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
        });


                
        Schema::create('bengkels', function (Blueprint $table) {
            $table->id('id_bengkels');
            $table->foreignId('id_users')->constrained('users', 'id_users')->onDelete('cascade');
            $table->string('nama_bengkel');
            $table->string('lokasi_bengkel');
            $table->decimal('latitude', 10, 7)->nullable(); // Untuk koordinat peta
            $table->decimal('longitude', 10, 7)->nullable(); // Untuk koordinat peta
            $table->timestamps();
        });
        
        


        Schema::create('booking_servis', function (Blueprint $a) {
            $a->id('id_servis');
            $a->foreignId('id_bengkels')->constrained('bengkels', 'id_bengkels')->onDelete('cascade');
            $a->foreignId('id_users')->constrained('users', 'id_users')->onDelete('cascade');
            $a->enum('jenis_servis', ['perbaikan', 'servis rutin']);
            $a->string('plat_kendaraan');
            $a->enum('jenis_kendaraan', ['mobil', 'motor']);
            $a->date('tanggal_servis');
            $a->time('jam_servis');
            $a->enum('status_servis', ['belum', 'sudah'])->default('belum');
            $a->timestamps(); // Menambahkan created_at & updated_at
        });
        

       
    
        Schema::create('barangs', function (Blueprint $table) {
            $table->id('id_barangs');
            $table->foreignId('id_bengkels')->constrained('bengkels', 'id_bengkels')->onDelete('cascade');
            $table->string('nama_barang');
            $table->text('deskripsi');
            $table->integer('stok');
            $table->decimal('harga', 10, 2);
            $table->string('gambar')->nullable(); // Menyimpan path gambar sparepart
        });
        
        // Schema::create('users', function (Blueprint $table) {
        //     $table->id('id_users');
        //     $table->string('name');
        //     $table->string('email')->unique();
        //     $table->timestamp('email_verified_at')->nullable();
        //     $table->string('password');
        //     $table->rememberToken();
        //     $table->timestamps();
        //     $table->enum('role',['Pemilik Bengkel','Pelanggan']);
            
        // });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_access_tokens');
        Schema::dropIfExists('bengkels');
        Schema::dropIfExists('barangs');
        Schema::dropIfExists('booking_servis');
    }
};
