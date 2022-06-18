<?php

namespace App\Model\Repository;

use App\Model\booking;
use App\Model\Rental;
use LidemCore\Repository;

class BookingRepository extends Repository
{
    protected function getTableName(): string { return 'booking'; }

    public function findAll(): array
    {
        return $this->readAll( booking::class );
    }

    public function findById( int $id ): ?booking
    {
        return $this->readById( booking::class, $id );
    }

    public function addBooking(int $user_id,int $rentals_id,string $checking,string $checkoot): void
    {
        $q = sprintf('insert into %s ( user_id,rentals_id,checking,checkoot) VALUE (%s,%s,%s,%s)',
            $this->getTableName(),$user_id,$rentals_id,$checking,$checkoot);

        $sth = $this->pdo->prepare( $q );

        $sth->execute();
    }

    public function listBooking(int $id): ?array
    {
        $resultBooking = [];
        $q = sprintf('select * from %s 
join rentals r on r.id = booking.rentals_id
join addresses a on a.id = r.addresses_id where booking.users_id =:id', $this->getTableName());
        $sth = $this->pdo->prepare($q);

        if (!$sth) return null;

        $sth->execute([
            'id' => $id
        ]);

        while ($row_data = $sth->fetch()) {
            $resultBooking[] = new Rental($row_data);
        }
        return $resultBooking;
    }
    public function listBookingOwner(int $id): ?array
    {
        $resultBooking = [];
        $q = sprintf('select * from %s 
join rentals r on r.id = booking.rentals_id
join addresses a on a.id = r.addresses_id 
where r.users_id =:id', $this->getTableName());
        $sth = $this->pdo->prepare($q);

        if (!$sth) return null;

        $sth->execute([
            'id' => $id
        ]);

        while ($row_data = $sth->fetch()) {
            $resultBooking[] = new Rental($row_data);
        }
        return $resultBooking;
    }
}