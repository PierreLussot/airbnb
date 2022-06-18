<?php

namespace App\Model;

class Rental extends \LidemCore\Model
{
    public int $users_id;
    public string $title;
    public int $addresses_id;
    public int $type;
    public int $surface;
    public string $description;
    public int $capacity;
    public string $price;
    public string $country;
    public string $city;
    public string $checking;
    public string $checkoot;


}
