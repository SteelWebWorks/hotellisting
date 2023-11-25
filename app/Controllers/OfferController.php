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
            ->when(isset($params['order_by_stars']), function ($query) use ($params) {
                $query->orderBy('o.star', $params['order_by_stars']);
            })
            ->when(isset($params['order_by_price']), function ($query) use ($params) {
                $query->orderBy('o.price', $params['order_by_price']);
            })
            ->groupBy('o.hotel_id')
            ->paginate(21);

        $data = [
            'offers' => $offers,
            'pager' => $offerModel->pager,
            'orderBy' => [
                'stars' => isset($params['order_by_stars']) ? (($params['order_by_stars'] == "ASC") ? "DESC" : "ASC") : "DESC",
                'price' => isset($params['order_by_price']) ? (($params['order_by_price'] == "ASC") ? "DESC" : "ASC") : "ASC",
            ],
        ];

        return view('offers/list', $data);
    }
}
