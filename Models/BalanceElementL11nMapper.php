<?php
/**
 * Jingga
 *
 * PHP Version 8.2
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
 * BalanceElement mapper class.
 *
 * @package Modules\Balance\Models
 * @license OMS License 2.0
 * @link    https://jingga.app
 * @since   1.0.0
 *
 * @template T of BaseStringL11n
 * @extends DataMapperFactory<T>
 */
final class BalanceElementL11nMapper extends DataMapperFactory
{
    /**
     * Columns.
     *
     * @var array<string, array{name:string, type:string, internal:string, autocomplete?:bool, readonly?:bool, writeonly?:bool, annotations?:array}>
     * @since 1.0.0
     */
    public const COLUMNS = [
        'balance_balance_element_l11n_id'      => ['name' => 'balance_balance_element_l11n_id',          'type' => 'int',    'internal' => 'id'],
        'balance_balance_element_l11n_title'   => ['name' => 'balance_balance_element_l11n_title',        'type' => 'string', 'internal' => 'content', 'autocomplete' => true],
        'balance_balance_element_l11n_element' => ['name' => 'balance_balance_element_l11n_element',  'type' => 'int',    'internal' => 'ref'],
        'balance_balance_element_l11n_lang'    => ['name' => 'balance_balance_element_l11n_lang',    'type' => 'string', 'internal' => 'language'],
    ];

    /**
     * Primary table.
     *
     * @var string
     * @since 1.0.0
     */
    public const TABLE = 'balance_balance_element_l11n';

    /**
     * Primary field name.
     *
     * @var string
     * @since 1.0.0
     */
    public const PRIMARYFIELD = 'balance_balance_element_l11n_id';

    /**
     * Model to use by the mapper.
     *
     * @var class-string<T>
     * @since 1.0.0
     */
    public const MODEL = BaseStringL11n::class;
}
