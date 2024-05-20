<?php
/**
 * Jingga
 *
 * PHP Version 8.2
 *
 * @package   Modules\Balance
 * @copyright Dennis Eichhorn
 * @license   OMS License 2.2
 * @version   1.0.0
 * @link      https://jingga.app
 */
declare(strict_types=1);

namespace Modules\Balance\Controller;

use phpOMS\Module\ModuleAbstract;
use phpOMS\Module\WebInterface;

/**
 * Budgeting controller class.
 *
 * @package Modules\Balance
 * @license OMS License 2.2
 * @link    https://jingga.app
 * @since   1.0.0
 */
class Controller extends ModuleAbstract implements WebInterface
{
    /**
     * Module path.
     *
     * @var string
     * @since 1.0.0
     */
    public const PATH = __DIR__ . '/../';

    /**
     * Module version.
     *
     * @var string
     * @since 1.0.0
     */
    public const MODULE_VERSION = '1.0.0';

    /**
     * Module name.
     *
     * @var string
     * @since 1.0.0
     */
    public const MODULE_NAME = 'Balance';

    /**
     * Module id.
     *
     * @var int
     * @since 1.0.0
     */
    public const MODULE_ID = 1006500000;

    /**
     * Providing.
     *
     * @var string[]
     * @since 1.0.0
     */
    public static array $providing = [];

    /**
     * Dependencies.
     *
     * @var string[]
     * @since 1.0.0
     */
    public static array $dependencies = [];
}
