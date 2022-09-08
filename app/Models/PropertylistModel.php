<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\appModel;
use DB;

class PropertylistModel extends appModel
{
    protected $table        = 'propertytaxdb.propertypre_bookingform';
	protected $primaryKey   = 'intBookingId';
}
