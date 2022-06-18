<?php

namespace App\Model\Repository;

use App\Model\Address;
use LidemCore\Repository;

class AddressRepository extends Repository
{
    protected function getTableName(): string { return 'addresses'; }

    public function findAll(): array
    {
        return $this->readAll( Address::class );
    }

    public function findById( int $id ): ?Address
    {
        return $this->readById( Address::class, $id );
    }

    public function findAdresses(string $country ,string $city): ?Address
    {
        $q = sprintf('select * from %s
        where country=:country and city=:city',
            $this->getTableName());

        $sth = $this->pdo->prepare($q);

        if (!$sth) return null;

        $sth->execute([
            'country'=>$country,
            'city'=>$city
        ]);

        $row_data = $sth->fetch();

        return !empty($row_data) ? new Address($row_data) : null;
    }

     public function addNewAddresse(string $country,string $city): void
     {
         $q = sprintf("INSERT INTO %s (country,city) 
        VALUE ('%s','%s')",$this->getTableName(),$country,$city);

         $sth = $this->pdo->prepare( $q );

         $sth->execute();
     }
}
