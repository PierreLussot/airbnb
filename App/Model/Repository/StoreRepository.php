<?php

namespace App\Model\Repository;

use App\App;
use App\Model\Store;
use LidemCore\Database\Database;
use LidemCore\Repository;

class StoreRepository extends Repository
{
	protected function getTableName(): string { return 'stores'; }

	public function findAll(): array
	{
		return $this->readAll( Store::class );
	}

	public function findById( int $id ): ?Store
	{
		return $this->readById( Store::class, $id );
	}
}
