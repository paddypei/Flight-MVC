<?php namespace models\DB;

// Create the Users model 
class Users extends \Illuminate\Database\Eloquent\Model {
    public $timestamps = false;
    public $fillable = array('auth_token');
}
