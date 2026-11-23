<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
 public function up(): void {Schema::create('diplomas',function(Blueprint $t){
 $t->id();$t->foreignId('category_id')->constrained()->restrictOnDelete();$t->string('title');$t->string('slug')->unique();
 $t->string('short_description',300)->nullable();$t->longText('description');$t->string('duration',100);
 $t->decimal('fee',12,2);$t->decimal('registration_fee',12,2)->default(0);$t->string('currency',8)->default('PKR');
 $t->string('approval_type',60);$t->string('awarding_body')->nullable();$t->string('approval_reference')->nullable();
 $t->string('certificate_type')->nullable();$t->string('image')->nullable();$t->boolean('is_published')->default(false);$t->boolean('featured')->default(false);$t->timestamps();
 });}
 public function down(): void {Schema::dropIfExists('diplomas');}
};
