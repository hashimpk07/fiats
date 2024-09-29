<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Qudratom\Utilities\DateTime;
use Qudratom\Utilities\Objectize;

/**
 * Class DummyClass
 */
class Otps extends Model {

	public $timestamps = false;

	protected $fillable = [];

	protected $guarded = [ ];

}