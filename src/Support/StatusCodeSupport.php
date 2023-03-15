<?php

namespace Rcarreirao\Intereasyapi\Support;

class StatusCodeSupport
{
    const SUCCESS_STATUS_CODE_OK            = 200;
    const SUCCESS_STATUS_CODE_CREATED       = 201;
    const SUCCESS_STATUS_CODE_ACCEPTED      = 200;
    const SUCCESS_STATUS_CODE_NO_CONTENT    = 204;
    const SUCCESS_STATUS_CODE_ERROR_BAD_REQUEST  = 400;
    const SUCCESS_STATUS_CODE_ERROR_UNAUTHORIZED = 401;
    const SUCCESS_STATUS_CODE_ERROR_FORBIDDEN    = 403;


    public static function checkStatusSuccess($code){
        return in_array($code, self::getStatusSuccessCodes());
    }

    public static function getStatusSuccessCodes(): array{
        return [
            self::SUCCESS_STATUS_CODE_OK,
            self::SUCCESS_STATUS_CODE_CREATED,
            self::SUCCESS_STATUS_CODE_ACCEPTED,
            self::SUCCESS_STATUS_CODE_NO_CONTENT
        ];
    }

    public static function getStatusErrorCodes(): array{
        return [
            self::SUCCESS_STATUS_CODE_ERROR_BAD_REQUEST,
            self::SUCCESS_STATUS_CODE_ERROR_UNAUTHORIZED,
            self::SUCCESS_STATUS_CODE_ERROR_FORBIDDEN
        ];
    }
}
