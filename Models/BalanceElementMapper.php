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

use Modules\Accounting\Models\AccountAbstractMapper;
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
        'balance_balance_element_id'       => ['name' => 'balance_balance_element_id',          'type' => 'int',    'internal' => 'id'],
        'balance_balance_element_code'     => ['name' => 'balance_balance_element_code',        'type' => 'string', 'internal' => 'code', 'autocomplete' => true],
        'balance_balance_element_formula'  => ['name' => 'balance_balance_element_formula',        'type' => 'string', 'internal' => 'formula', 'autocomplete' => true],
        'balance_balance_element_style'    => ['name' => 'balance_balance_element_style',        'type' => 'string', 'internal' => 'style', 'autocomplete' => true],
        'balance_balance_element_order'    => ['name' => 'balance_balance_element_order',        'type' => 'int', 'internal' => 'order'],
        'balance_balance_element_expanded' => ['name' => 'balance_balance_element_expanded',        'type' => 'bool', 'internal' => 'expanded'],
        'balance_balance_element_parent'   => ['name' => 'balance_balance_element_parent',        'type' => 'int', 'internal' => 'parent'],
        'balance_balance_element_balance'  => ['name' => 'balance_balance_element_balance',        'type' => 'int', 'internal' => 'balance'],
    ];

    /**
     * Has many relation.
     *
     * @var array<string, array{mapper:class-string, table:string, self?:?string, external?:?string, column?:string}>
     * @since 1.0.0
     */
    public const HAS_MANY = [
        'l11n' => [
            'mapper'   => BalanceElementL11nMapper::class,
            'table'    => 'balance_balance_element_l11n',
            'self'     => 'balance_balance_element_l11n_element',
            'column'   => 'content',
            'external' => null,
        ],
        'accounts' => [
            'mapper'   => AccountAbstractMapper::class,
            'table'    => 'balance_balance_element_rel',
            'self'     => 'balance_balance_element_rel_element',
            'external' => 'balance_balance_element_rel_account',
        ],
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
