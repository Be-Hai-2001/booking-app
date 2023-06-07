<?php

namespace App\Services\Interfaces;

 interface GetObjectInterface{
    public function getAll();
    public function getById($id);

    public function getByIdQH($id);

    public function getAddressIdHotel($id);

    public function getAddressCityHotel($city);

    public function getDayMonth($day,$month,$year);
}
