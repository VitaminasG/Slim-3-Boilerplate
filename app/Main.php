<?php


namespace Main;

use Illuminate\Database\Eloquent\Model;


final class Main extends Model {

	/**
	 * Fields that can be assigned to database
	 * @var array
	 */

	protected $fillable = ['message'];

}