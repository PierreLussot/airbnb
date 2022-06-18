<?php

namespace App\Model;

use LidemCore\Model;

class booking extends Model
{
	public int $users_id;
    public int $rentals_id;
    public int $checking;
    public int $checkout;

}