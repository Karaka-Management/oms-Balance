<?php
/**
 * Jingga
 *
 * PHP Version 8.1
 *
 * @package   Modules\Balance\Models
 * @copyright Dennis Eichhorn
 * @license   OMS License 2.0
 * @version   1.0.0
 * @link      https://orange-management.org
 */
declare(strict_types=1);

namespace Modules\Balance\Models;

use phpOMS\Stdlib\Base\Enum;

/**
 * Permision state enum.
 *
 * @package Modules\Balance\Models
 * @license OMS License 2.0
 * @link    https://orange-management.org
 * @since   1.0.0
 */
abstract class PermissionState extends Enum
{
    public const BALANCE = 1;
}
