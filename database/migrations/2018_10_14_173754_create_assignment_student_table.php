<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignmentStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignment_student', function (Blueprint $table) {
            $table->integer('assignment_id');
            $table->integer('student_id');
            $table->double('grade');
            $table->timestamps();
        });

    //     Schema::table('assignment_student', function($table)
    //         {
    //             $table->foreign('assignment_id')->references('id')->on('assignments')->onDelete('cascade');
    //             $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
    //         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assignment_student');
    }
}
