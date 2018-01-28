<?php
/**
 * Orange Management
 *
 * PHP Version 7.1
 *
 * @package    TBD
 * @copyright  Dennis Eichhorn
 * @license    OMS License 1.0
 * @version    1.0.0
 * @link       http://website.orange-management.de
 */
declare(strict_types = 1);
namespace Modules\Balance\Admin;

use phpOMS\DataStorage\Database\DatabasePool;
use phpOMS\Module\ActivateAbstract;
use phpOMS\Module\InfoManager;

/**
 * Navigation class.
 *
 * @package    Modules
 * @license    OMS License 1.0
 * @link       http://website.orange-management.de
 * @since      1.0.0
 */
class Activate extends ActivateAbstract
{

    /**
     * {@inheritdoc}
     */
    public static function activate(DatabasePool $dbPool, InfoManager $info)
    {
        parent::activate($dbPool, $info);
    }
}