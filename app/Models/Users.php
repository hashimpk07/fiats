<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Model;
	use DB;
	use Illuminate\Auth\Authenticatable;
	use Illuminate\Auth\Passwords\CanResetPassword;
	use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
	use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

	/**
	 * Class DummyClass
	 */
	class Users extends Model implements AuthenticatableContract, CanResetPasswordContract {

		use Authenticatable, CanResetPassword;

		public $timestamps = false;

		protected $fillable = [
		];

		protected $guarded = [ ];

	}