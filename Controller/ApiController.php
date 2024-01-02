<?php
/**
 * Jingga
 *
 * PHP Version 8.1
 *
 * @package   Modules\Balance
 * @copyright Dennis Eichhorn
 * @license   OMS License 2.0
 * @version   1.0.0
 * @link      https://jingga.app
 */
declare(strict_types=1);

namespace Modules\Balance\Controller;

use Modules\Balance\Models\Balance;
use Modules\Balance\Models\BalanceElement;
use Modules\Balance\Models\BalanceElementL11nMapper;
use Modules\Balance\Models\BalanceElementMapper;
use Modules\Balance\Models\BalanceMapper;
use phpOMS\Localization\BaseStringL11n;
use phpOMS\Localization\ISO639x1Enum;
use phpOMS\Message\Http\HttpResponse;
use phpOMS\Message\Http\RequestStatusCode;
use phpOMS\Message\RequestAbstract;
use phpOMS\Message\ResponseAbstract;

/**
 * Balance api controller class.
 *
 * @package Modules\Balance
 * @license OMS License 2.0
 * @link    https://jingga.app
 * @since   1.0.0
 */
final class ApiController extends Controller
{
    /**
     * Api method to create an balance
     *
     * @param RequestAbstract  $request  Request
     * @param ResponseAbstract $response Response
     * @param array            $data     Generic data
     *
     * @return void
     *
     * @api
     *
     * @since 1.0.0
     */
    public function apiBalanceCreate(RequestAbstract $request, ResponseAbstract $response, array $data = []) : void
    {
        if (!empty($val = $this->validateBalanceCreate($request))) {
            $response->header->status = RequestStatusCode::R_400;
            $this->createInvalidCreateResponse($request, $response, $val);

            return;
        }

        $balance = $this->createBalanceFromRequest($request);
        $this->createModel($request->header->account, $balance, BalanceMapper::class, 'balance', $request->getOrigin());
        $this->createStandardCreateResponse($request, $response, $balance);
    }

    /**
     * Validate balance create request
     *
     * @param RequestAbstract $request Request
     *
     * @return array<string, bool>
     *
     * @since 1.0.0
     */
    private function validateBalanceCreate(RequestAbstract $request) : array
    {
        $val = [];
        if (($val['code'] = !$request->hasData('code'))
            || ($val['name'] = !$request->hasData('name'))
        ) {
            return $val;
        }

        return [];
    }

    /**
     * Method to create balance from request.
     *
     * @param RequestAbstract $request Request
     *
     * @return Balance
     *
     * @since 1.0.0
     */
    private function createBalanceFromRequest(RequestAbstract $request) : Balance
    {
        $balance          = new Balance();
        $balance->code = (string) $request->getData('code');
        $balance->name = (string) $request->getData('name');

        return $balance;
    }

    /**
     * Api method to create an account
     *
     * @param RequestAbstract  $request  Request
     * @param ResponseAbstract $response Response
     * @param array            $data     Generic data
     *
     * @return void
     *
     * @api
     *
     * @since 1.0.0
     */
    public function apiBalanceElementCreate(RequestAbstract $request, ResponseAbstract $response, array $data = []) : void
    {
        if (!empty($val = $this->validateBalanceElementCreate($request))) {
            $response->header->status = RequestStatusCode::R_400;
            $this->createInvalidCreateResponse($request, $response, $val);

            return;
        }

        $element = $this->createBalanceElementFromRequest($request);
        $this->createModel($request->header->account, $element, BalanceElementMapper::class, 'balance_element', $request->getOrigin());
        $this->createStandardCreateResponse($request, $response, $element);
    }

    /**
     * Validate account create request
     *
     * @param RequestAbstract $request Request
     *
     * @return array<string, bool>
     *
     * @since 1.0.0
     */
    private function validateBalanceElementCreate(RequestAbstract $request) : array
    {
        $val = [];
        if (($val['balance'] = !$request->hasData('balance'))
            || ($val['code'] = !$request->hasData('code'))
            || ($val['content'] = !$request->hasData('content'))
        ) {
            return $val;
        }

        return [];
    }

    /**
     * Method to create account from request.
     *
     * @param RequestAbstract $request Request
     *
     * @return BalanceElement
     *
     * @since 1.0.0
     */
    private function createBalanceElementFromRequest(RequestAbstract $request) : BalanceElement
    {
        $element = new BalanceElement();
        $element->code = $request->getDataString('code') ?? '';
        $element->balance = $request->getDataInt('balance') ?? 0;
        $element->order = $request->getDataInt('order') ?? 0;

        $element->setL11n($request->getDataString('content') ?? '', $request->getDataString('language') ?? ISO639x1Enum::_EN);

        return $element;
    }

    /**
     * Api method to create item attribute l11n
     *
     * @param RequestAbstract  $request  Request
     * @param ResponseAbstract $response Response
     * @param array            $data     Generic data
     *
     * @return void
     *
     * @api
     *
     * @since 1.0.0
     */
    public function apiBalanceElementL11nCreate(RequestAbstract $request, ResponseAbstract $response, array $data = []) : void
    {
        if (!empty($val = $this->validateBalanceElementL11nCreate($request))) {
            $response->header->status = RequestStatusCode::R_400;
            $this->createInvalidCreateResponse($request, $response, $val);

            return;
        }

        $elementL11n = $this->createBalanceElementL11nFromRequest($request);
        $this->createModel($request->header->account, $elementL11n, BalanceElementL11nMapper::class, 'balance_element_l11n', $request->getOrigin());
        $this->createStandardCreateResponse($request, $response, $elementL11n);
    }

    /**
     * Method to create item attribute l11n from request.
     *
     * @param RequestAbstract $request Request
     *
     * @return BaseStringL11n
     *
     * @since 1.0.0
     */
    private function createBalanceElementL11nFromRequest(RequestAbstract $request) : BaseStringL11n
    {
        $elementL11n      = new BaseStringL11n();
        $elementL11n->ref = $request->getDataInt('ref') ?? 0;
        $elementL11n->setLanguage(
            $request->getDataString('language') ?? $request->header->l11n->language
        );
        $elementL11n->content = $request->getDataString('content') ?? '';

        return $elementL11n;
    }

    /**
     * Validate item attribute l11n create request
     *
     * @param RequestAbstract $request Request
     *
     * @return array<string, bool>
     *
     * @since 1.0.0
     */
    private function validateBalanceElementL11nCreate(RequestAbstract $request) : array
    {
        $val = [];
        if (($val['content'] = !$request->hasData('content'))
            || ($val['ref'] = !$request->hasData('ref'))
        ) {
            return $val;
        }

        return [];
    }
}