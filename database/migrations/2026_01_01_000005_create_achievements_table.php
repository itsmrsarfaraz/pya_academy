<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
 public function up(): void {Schema::create('achievements',function(Blueprint $t){
 $t->id();$t->string('student_name');$t->string('diploma_title');$t->string('awarding_body')->nullable();
 $t->unsignedSmallInteger('completion_year');$t->text('story')->nullable();$t->string('student_photo')->nullable();
 $t->string('certificate_image')->nullable();$t->boolean('is_published')->default(false);$t->timestamps();
 });}
 public function down(): void {Schema::dropIfExists('achievements');}
};
