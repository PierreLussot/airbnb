<?php

namespace App\Model\Repository;

use App\Model\User;
use LidemCore\Repository;



class UserRepository extends Repository
{
    protected function getTableName(): string { return 'users'; }

    public function findAll(): array
    {
        return $this->readAll( User::class );
    }

    public function findById( int $id ): ?User
    {
        return $this->readById( User::class, $id );
    }

    public function findUser( string $email, string $pass): ?user
    {
        $q = sprintf( 'SELECT * FROM `%s` WHERE email=:email AND pass=:pass', $this->getTableName() );

        $sth = $this->pdo->prepare( $q );

        if( !$sth ) return null;

        $sth->execute( [ 'email' => $email,
                          'pass' => $pass
            ] );

        $row_data = $sth->fetch();

        return !empty( $row_data ) ? new User( $row_data ) : null;
    }

    public function ajoutUser(array $dataUser): void
    {
        $q = sprintf("INSERT INTO %s (email,pass,type) 
        VALUE ('%s','%s','%s')",$this->getTableName(),$dataUser['email'],$dataUser['password'],$dataUser['typeSelect']);

        $sth = $this->pdo->prepare( $q );

        $sth->execute();

    }

}