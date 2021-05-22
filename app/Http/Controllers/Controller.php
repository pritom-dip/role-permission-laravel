<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function breadcumbs($model, $type)
    {
        $title = [];

        if ($type == 'create') {
            $title = [
                [
                    'title' => $model . ' List',
                    'route' => strtolower($model) . '.index'
                ],
                [
                    'title' => 'Add ' . $model,
                    'route' => strtolower($model) . '.create'
                ]
            ];
        } else if ($type == 'show') {
            $title = [
                [
                    'title' =>  'View ' . $model,
                    'route' => strtolower($model) . '.index'
                ]
            ];
        } else if ($type == 'edit') {
            $title = [
                [
                    'title' => $model . ' List',
                    'route' => strtolower($model) . '.index'
                ],
                [
                    'title' => 'Edit ' . $model,
                    'route' => strtolower($model) . '.create'
                ]
            ];
        } else if ($type == 'index') {
            $title = [
                [
                    'title' => 'Add ' . $model,
                    'route' => strtolower($model) . '.create'
                ],
                [
                    'title' => $model . ' List',
                    'route' => strtolower($model) . '.index'
                ]
            ];
        }

        return $title;
    }
}
