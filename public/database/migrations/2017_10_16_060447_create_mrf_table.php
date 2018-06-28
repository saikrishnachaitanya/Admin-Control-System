<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMrfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mrf', function (Blueprint $table) {
            $table->increments('id');
            $table->string('requested_by',64)->nullable();
            $table->string('requested_person_designation',64)->nullable();
            $table->date('date_of_request')->nullable();

            $table->string('authorized_by',64)->nullable();
            $table->string('authorized_person_designation',64)->nullable();
            $table->date('date_of_authorization')->nullable();

            $table->string('roles_and_responsibilities',256)->nullable();

            $table->string('department',64)->nullable();
            $table->string('job_title',64)->nullable();
            $table->integer('required_number')->nullable();
            $table->string('location',128)->nullable();
            $table->date('expected_hiring_date')->nullable();
            $table->string('nature_of_employment',64)->nullable();
            $table->string('additional_manpower',64)->nullable();
            $table->string('rep_to_existing_position',64)->nullable();
            $table->string('filled_by_internal',64)->nullable();
            $table->string('filled_by_external',64)->nullable();
            $table->string('qualification',64)->nullable();
            $table->string('total_exp',64)->nullable();
            $table->integer('salary_range_p_m')->nullable();

            $table->date('received_by_hod')->nullable();
            $table->date('received_by_lob')->nullable();
            $table->string('receiver_name',128)->nullable();
            $table->string('receiver_signature',64)->nullable();
            $table->date('received_date')->nullable();

            $table->string('approved_by',128)->nullable();
            $table->string('approval_name',128)->nullable();
            $table->string('approval_signature',128)->nullable();
            $table->date('approval_date')->nullable();

            $table->date('forwarded_for_approval')->nullable(); 
            $table->date('md_approval_on')->nullable();
            $table->string('md_signature')->nullable();
            $table->date('md_approval_date')->nullable();

            $table->string('recruiter',256)->nullable();
            $table->string('recruiter_name',128)->nullable();
            $table->string('recruiter_signature',128)->nullable();
            $table->date('recruiter_date')->nullable();
            $table->date('recruiter_start_date')->nullable();
            $table->date('project_closing_date')->nullable();
            $table->string('reason_for_deviation',256)->nullable();
            $table->string('remarks',256)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mrf');
    }
}
