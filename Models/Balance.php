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

/**
 * Balance class.
 *
 * @package Modules\Balance\Models
 * @license OMS License 2.0
 * @link    https://jingga.app
 * @since   1.0.0
 */
class Balance
{
    /**
     * Account ID.
     *
     * @var int
     * @since 1.0.0
     */
    public int $id = 0;

    public string $code = '';

    public string $name = '';

    public ?int $unit = null;

    public bool $isDefault = false;

    /**
     * {@inheritdoc}
     */
    public function toArray() : array
    {
        return [
            'id' => $this->id,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize() : mixed
    {
        return $this->toArray();
    }
}
