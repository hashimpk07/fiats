<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMembersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('members', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('reg_no', 64);
			$table->string('mobile', 64);
			$table->string('email', 64);
			$table->string('name', 64);
			$table->string('address', 100);
			$table->char('gender', 1);
			$table->string('religion', 64);
			$table->string('caste', 64);
			$table->date('dob');
			$table->integer('marital_status');
			$table->string('occupation', 64);
			$table->string('parish', 64);
			$table->string('diocese', 64);
			$table->char('testament', 1);
			$table->integer('salutation_id');
			$table->integer('language_id');
			$table->integer('payment_id');
			$table->char('status', 1);
			$table->text('ack_remarks', 65535);
			$table->date('ack_dt');
			$table->timestamp('dt')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->string('creator_ref', 16);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('members');
	}

}
