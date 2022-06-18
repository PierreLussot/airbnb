<?php
namespace App\Model\Repository;

use App\Model\Item;
use LidemCore\Repository;

class ItemRepository extends Repository
{
    protected function getTableName(): string { return 'items'; }

    public function findAll(): array
    {
        return $this->readAll( Item::class );
    }

    public function findById( int $id ): ?Item
    {
        return $this->readById( Item::class, $id );
    }
    public function items(int $id): ?array
    {
        $resultItem = [];

        $q = sprintf('SELECT * FROM `%s` i
        join rentals_items ri on ri.items_id = i.id
        where ri.rentals_id =:id
                
            ',$this->getTableName() );
//        select * from rentals_items ri
//
        $sth = $this->pdo->prepare($q);

        if (!$sth) return null;

        $sth->execute([
                'id'=>$id
            ]
        );

        while ( $row_data = $sth->fetch())
        {
            $resultItem[] = new Item($row_data);
        }
        return $resultItem;
    }
    public function additem(int $rental_id,array $items): void
    {
        foreach ($items as $item)
        {
            $q = sprintf('insert into rentals_items ( rentals_id, items_id) VALUE (%s,%s)',$rental_id,$item);

            $sth = $this->pdo->prepare( $q );

            $sth->execute();
        }

    }
}