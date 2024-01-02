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
 * @link      https://jingga.app
 */
declare(strict_types=1);

namespace Modules\Balance\Models;

use phpOMS\DataStorage\Database\Mapper\DataMapperFactory;
use phpOMS\Localization\BaseStringL11n;

/**
 * Balance mapper class.
 *
 * @package Modules\Balance\Models
 * @license OMS License 2.0
 * @link    https://jingga.app
 * @since   1.0.0
 *
 * @template T of BaseStringL11n
 * @extends DataMapperFactory<T>
 */
final class BalanceElementMapper extends DataMapperFactory
{
    /**
     * Columns.
     *
     * @var array<string, array{name:string, type:string, internal:string, autocomplete?:bool, readonly?:bool, writeonly?:bool, annotations?:array}>
     * @since 1.0.0
     */
    public const COLUMNS = [
        'balance_balance_element_id'          => ['name' => 'balance_balance_element_id',          'type' => 'int',    'internal' => 'id'],
        'balance_balance_element_code'        => ['name' => 'balance_balance_element_code',        'type' => 'string', 'internal' => 'code', 'autocomplete' => true],
        'balance_balance_element_order'        => ['name' => 'balance_balance_element_order',        'type' => 'int', 'internal' => 'order'],
        'balance_balance_element_parent'        => ['name' => 'balance_balance_element_parent',        'type' => 'int', 'internal' => 'parent'],
        'balance_balance_element_balance'        => ['name' => 'balance_balance_element_balance',        'type' => 'int', 'internal' => 'balance'],
    ];

    /**
     * Primary table.
     *
     * @var string
     * @since 1.0.0
     */
    public const TABLE = 'balance_balance_element';

    /**
     * Primary field name.
     *
     * @var string
     * @since 1.0.0
     */
    public const PRIMARYFIELD = 'balance_balance_element_id';
}