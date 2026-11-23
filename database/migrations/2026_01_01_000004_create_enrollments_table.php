<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
 public function up(): void {Schema::create('enrollments',function(Blueprint $t){
 $t->id();$t->string('reference')->unique();$t->foreignId('diploma_id')->constrained()->restrictOnDelete();
 $t->string('full_name');$t->string('father_name')->nullable();$t->string('phone',30);$t->string('email')->nullable();
 $t->string('cnic',30)->nullable();$t->string('education')->nullable();$t->text('address')->nullable();
 $t->string('status',20)->default('pending')->index();$t->text('admin_note')->nullable();$t->timestamps();
 });}
 public function down(): void {Schema::dropIfExists('enrollments');}
};
