<?php
/**
 * Created by PhpStorm.
 * User: Gebruiker
 * Date: 15-1-2018
 * Time: 20:50
 */

namespace App;
use Illuminate\Database\Eloquent\Model;

class Relation extends Model
{
    protected $table = 'relations';
    public $timestamps = false;
}