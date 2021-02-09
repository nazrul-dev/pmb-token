<?php

function get_provinsi($provinceId)
{
    $get = Indonesia::findProvince($provinceId);
    return $get->name;
}

function get_kabupaten($cityId)
{
    $get = Indonesia::findCity($cityId);
    return $get->name;
}

function get_kecamatan($districtId)
{
    $get = Indonesia::findDistrict($districtId);
    return $get->name;
}
