<?php

namespace MehediIitdu\CoreComponentRepository;

class CoreComponentRepository
{
    public static function instantiateShopRepository() {
        return true;
    }

    protected static function serializeObjectResponse($zn, $request_data_json) {
        return "good";
    }

    protected static function finalizeRepository($rn) {
        return true;
    }

    public static function initializeCache() {
        return true;
    }

    public static function finalizeCache($addon){
        return true;
    } 
}
