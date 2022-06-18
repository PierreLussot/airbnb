<?php

namespace App;

use App\Model\Repository\AddressRepository;
use App\Model\Repository\BookingRepository;
use App\Model\Repository\ItemRepository;
use App\Model\Repository\RentalRepository;
use App\Model\Repository\StoreRepository;
use App\Model\Repository\ToyRepository;

use App\Model\Repository\UserRepository;
use LidemCore\RepositoryManagerTrait;

class AppRepoManager
{
	use RepositoryManagerTrait;

	private AddressRepository $AddressRepository;
    private BookingRepository $BookingRepository;
    private ItemRepository $ItemRepository;
    private RentalRepository $RentalRepository;
    private UserRepository $UserRepository;

	public function getAddressRepository(): AddressRepository { return $this->AddressRepository; }
    public function getBookingRepository(): BookingRepository { return $this->BookingRepository; }
    public function getItemRepository(): ItemRepository { return $this->ItemRepository; }
    public function getRentalRepository(): RentalRepository { return $this->RentalRepository; }
    public function getUserRepository(): UserRepository { return $this->UserRepository; }
	//private ToyRepository $toyRepository;
	//public function getToyRepo(): ToyRepository { return $this->toyRepository; }
	protected function __construct()
	{
		$config = App::getApp();
		$this->AddressRepository = new AddressRepository( $config );
        $this->BookingRepository = new BookingRepository( $config );
        $this->ItemRepository = new ItemRepository( $config );
        $this->RentalRepository = new RentalRepository( $config );
        $this->UserRepository = new UserRepository( $config );
		//$this->toyRepository = new ToyRepository( $config );
	}




}