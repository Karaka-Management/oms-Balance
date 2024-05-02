<?php
/**
 * Jingga
 *
 * PHP Version 8.2
 *
 * @package   Modules\Balance
 * @copyright Dennis Eichhorn
 * @license   OMS License 2.0
 * @version   1.0.0
 * @link      https://jingga.app
 */
declare(strict_types=1);

namespace Modules\Balance\Controller;

use Modules\Balance\Models\BalanceElementL11nMapper;
use Modules\Balance\Models\BalanceElementMapper;
use Modules\Balance\Models\BalanceMapper;
use phpOMS\Contract\RenderableInterface;
use phpOMS\DataStorage\Database\Query\OrderType;
use phpOMS\Message\RequestAbstract;
use phpOMS\Message\ResponseAbstract;
use phpOMS\Views\View;

/**
 * Budgeting controller class.
 *
 * @package Modules\Balance
 * @license OMS License 2.0
 * @link    https://jingga.app
 * @since   1.0.0
 *
 * @todo Create comparison feature for Balance, Asset, P&L, Cash
 *      https://github.com/Karaka-Management/oms-Accounting/issues/3
 */
final class BackendController extends Controller
{
    /**
     * Routing end-point for application behavior.
     *
     * @param RequestAbstract  $request  Request
     * @param ResponseAbstract $response Response
     * @param array            $data     Generic data
     *
     * @return RenderableInterface
     *
     * @since 1.0.0
     * @codeCoverageIgnore
     */
    public function viewBalanceDashboard(RequestAbstract $request, ResponseAbstract $response, $data = null) : RenderableInterface
    {
        $view = new View($this->app->l11nManager, $request, $response);
        $view->setTemplate('/Modules/Balance/Theme/Backend/balance-dashboard');
        $view->data['nav'] = $this->app->moduleManager->get('Navigation')->createNavigationMid(1006501001, $request, $response);

        $view->data['elements'] = BalanceElementMapper::getAll()
            ->with('l11n')
            ->with('accounts')
            ->with('accounts/l11n')
            ->where('balance', $request->getDataInt('structure') ?? 1)
            ->where('l11n/language', $request->getDataString('language') ?? $response->header->l11n->language)
            ->where('accounts/l11n/language', $request->getDataString('language') ?? $response->header->l11n->language)
            ->sort('order', OrderType::ASC)
            ->executeGetArray();

        $view->data['structures'] = BalanceMapper::getAll()
            ->executeGetArray();

        $view->data['languages'] = [];
        if (!empty($view->data['elements'])) {
            /** @var \phpOMS\Localization\BaseStringL11n[] $tempL11ns */
            $tempL11ns = BalanceElementL11nMapper::getAll()
                ->where('ref', \reset($view->data['elements'])->id)
                ->executeGetArray();

            foreach ($tempL11ns as $l11n) {
                $view->data['languages'][] = $l11n->language;
            }
        }

        return $view;
    }
}
