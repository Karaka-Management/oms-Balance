<?php declare(strict_types=1);

use Modules\Balance\Controller\BackendController;
use Modules\Balance\Models\PermissionState;
use phpOMS\Account\PermissionType;
use phpOMS\Router\RouteVerb;

return [
    '^/controlling/balance/dashboard(\?.*$|$)' => [
        [
            'dest'       => '\Modules\Balance\Controller\BackendController:viewBalanceDashboard',
            'verb'       => RouteVerb::GET,
            'active'     => true,
            'permission' => [
                'module' => BackendController::MODULE_NAME,
                'type'   => PermissionType::READ,
                'state'  => PermissionState::BALANCE,
            ],
        ],
    ],
];
