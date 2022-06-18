<?php


namespace App\Model\Repository;

use App\Model\Rental;
use App\Model\User;
use LidemCore\Repository;

class RentalRepository extends Repository
{
    protected function getTableName(): string
    {
        return 'rentals';
    }

    public function findAll(): array
    {
        return $this->readAll(Rental::class);
    }

    public function findById(int $id): ?Rental
    {
        return $this->readById(Rental::class, $id);
    }

//    public function findRental(): ?array
//    {
//        $resultRental = [];
//
//        $q = sprintf('SELECT * FROM `%s`  ',$this->getTableName() );
//
//            $sth = $this->pdo->prepare($q);
//
//            if (!$sth) return null;
//
//            $sth->execute();
//
//            while ( $row_data = $sth->fetch())
//            {
//                $resultRental[] = new Rental($row_data);
//            }
//            return $resultRental;
//        }

//        public function findRentalsByOwner(int $id): ?array
//        {
//            $resultRental = [];
//
//            $q = sprintf('SELECT * FROM `%s`  WHERE users_id=:id',$this->getTableName() );
//
//            $sth = $this->pdo->prepare($q);
//
//            if (!$sth) return null;
//
//            $sth->execute([
//                'id'=>$id
//            ]);
//
//            while ( $row_data = $sth->fetch())
//            {
//                $resultRental[] = new Rental($row_data);
//            }
//            return $resultRental;
//        }

    public function findRentalsAddresse(int $id): ?array
    {
        $resultRental = [];

        $q = sprintf('SELECT * FROM `%s` r 
                    join addresses a on a.id = r.addresses_id
                    WHERE r.users_id=:id', $this->getTableName());

        $sth = $this->pdo->prepare($q);

        if (!$sth) return null;

        $sth->execute([
            'id' => $id
        ]);

        while ($row_data = $sth->fetch()) {
            $resultRental[] = new Rental($row_data);
        }
        return $resultRental;
    }

    public function findRentalsAddresseStandard(): ?array
    {
        $resultRental = [];

        $q = sprintf('SELECT * FROM `%s` r 
                    join addresses a on a.id = r.addresses_id', $this->getTableName());

        $sth = $this->pdo->prepare($q);

        if (!$sth) return null;

        $sth->execute();

        while ($row_data = $sth->fetch()) {
            $resultRental[] = new Rental($row_data);
        }
        return $resultRental;
    }

    public function details(int $id): ?Rental
    {


        $q = sprintf('SELECT * FROM `%s` r 
                    join addresses a on a.id = r.addresses_id
                    where r.id=:id
                    ', $this->getTableName());

        $sth = $this->pdo->prepare($q);

        if (!$sth) return null;

        $sth->execute([
                'id' => $id
            ]
        );

        $row_data = $sth->fetch();

        return !empty($row_data) ? new Rental($row_data) : null;

    }
public function addRental(int $userId,array $dataRental,int $addresseId): void
{

    $q = sprintf("INSERT INTO %s (users_id,title,addresses_id,type,surface,description,capacity,price) 
        VALUE ('%s','%s','%s','%s','%s','%s','%s','%s')",$this->getTableName(),$userId,$dataRental['titre'],
        $addresseId,$dataRental['logementType'],$dataRental['surface'],$dataRental['description'],
        $dataRental['capacity'],$dataRental['prix']);

    $sth = $this->pdo->prepare( $q );

    $sth->execute();
}


}
