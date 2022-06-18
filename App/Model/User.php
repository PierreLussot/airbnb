<?php

namespace App\Model;

class User extends \LidemCore\Model
{
    public string $email;
    public string $pass;
    public int $type;
}