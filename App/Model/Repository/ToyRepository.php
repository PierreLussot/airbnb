<?php

namespace App\Model\Repository;

use App\Model\Toy;
use LidemCore\Repository;

class ToyRepository extends Repository
{
	protected function getTableName(): string { return 'toys'; }

	public function findAll(): array
	{
		return $this->readAll( Toy::class );
	}

	public function findById( int $id ): ?Toy
	{
		return $this->readById( Toy::class, $id );
	}

}