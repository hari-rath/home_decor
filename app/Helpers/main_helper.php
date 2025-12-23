<?php

use App\Models\Admin\CategoryModel;
use App\Models\Admin\UserModel;

if (!function_exists('category_name')) {

    function category_name($categoryId): string
    {
        if (empty($categoryId)) {
            return 'N/A';
        }

        static $categoryMap = null;

        if ($categoryMap === null) {

            $model = new CategoryModel(); // ✅ now works

            $rows = $model->findAll();

            $categoryMap = [];
            foreach ($rows as $row) {
                $categoryMap[$row['id']] = $row['category_name'];
            }
        }

        return $categoryMap[$categoryId] ?? 'N/A';
    }
}

if (!function_exists('username')) {

    function username($id): string
    {
        if (empty($id)) {
            return 'N/A';
        }

        static $usermap = null;

        if ($usermap === null) {

            $model = new UserModel(); // ✅ now works

            $rows = $model->findAll();

            $usermap = [];
            foreach ($rows as $row) {
                $usermap[$row['id']] = $row['name'];
            }
        }

        return $usermap[$id] ?? 'N/A';
    }
}
