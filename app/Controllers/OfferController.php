<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class OfferController extends BaseController
{
    public function index()
    {

        $params = $this->request->getGet();

        $offerModel = model('OfferModel');

        $offerModel->setTable('offers AS o');

        $offers = $offerModel->select([
            'o.hotel_id',
            'o.hotel_name',
            'o.country',
            'o.city',
            'o.star',
            'IF(o.image IS NULL,(SELECT o2.image FROM offers AS o2 WHERE o2.hotel_id = o.hotel_id AND o2.image IS NOT NULL LIMIT 1),o.image) as offerImage',
            'CEIL(MIN(o.price)) AS price',
        ])
            ->when(isset($params['search']), function ($query) use ($params) {
                $query->like('o.country', $params['search'])
                    ->orLike('o.city', $params['search']);
            })
            ->when(isset($params['order_by_country']), function ($query) use ($params) {
                $query->orderBy('o.country', $params['order_by_country']);
            })
            ->when(isset($params['order_by_city']), function ($query) use ($params) {
                $query->orderBy('o.city', $params['order_by_city']);
            })
            ->when(isset($params['order_by_price']), function ($query) use ($params) {
                $query->orderBy('o.price', $params['order_by_price']);
            })
            ->groupBy('o.hotel_id')
            ->paginate(21);

        $data = [
            'offers' => $offers,
            'pager' => $offerModel->pager,
        ];

        return view('offers/list', $data);
    }
}
