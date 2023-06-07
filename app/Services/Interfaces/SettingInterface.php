<?php

namespace App\Services\Interfaces;

interface SettingInterface{
    //Khách sạn
    public function create($request);
    public function update($request, $hotel);
    public function destroy($hotel);

    //Quận - Huyện
    public function createQH($request);
    public function updateQH($request, $hotel);
    public function destroyQH($hotel);

    //Phường - xã
    public function createPX($request);
    public function updatePX($request, $hotel);
    public function destroyPX($hotel);

    //bed type
    public function createBed($request);
    public function updateBed($request, $hotel);
    public function destroyBed($hotel);

    //bed type
    public function createRoom($request);
    public function updateRoom($request, $hotel);
    public function destroyRoom($hotel);

    //Service roomtype
    public function createSvRoom($request);
    public function updateSvRoom($request, $hotel);
    public function destroySvRoom($hotel);

    //Image
    public function createImage($request);
}
