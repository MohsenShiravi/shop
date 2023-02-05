<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * categories permissions
         */


        /**
         * products permissions
         */
        Permission::query()->insert([
            [
                'title' => 'read-product',
                'label' => 'مشاهده محصول'
            ],
            [
                'title' => 'create-product',
                'label' => 'ایجاد محصول'
            ],
            [
                'title' => 'update-product',
                'label' => 'ویرایش محصول'
            ],
            [
                'title' => 'delete-product',
                'label' => 'حذف محصول'
            ],
        ]);

        /**
         * discounts permissions
         */
        Permission::query()->insert([
            [
                'title' => 'read-discounts',
                'label' => 'مشاهده تخفیف'
            ],
            [
                'title' => 'create-discounts',
                'label' => 'ایجاد تخفیف'
            ],
            [
                'title' => 'update-discounts',
                'label' => 'ویرایش تخفیف'
            ],
            [
                'title' => 'delete-discounts',
                'label' => 'حذف تخفیف'
            ],
        ]);

        /**
         * offers permissions
         */
        Permission::query()->insert([
            [
                'title' => 'read-offer',
                'label' => 'مشاهده کد تخفیف'
            ],
            [
                'title' => 'create-offer',
                'label' => 'ایجاد کد تخفیف'
            ],
            [
                'title' => 'update-offer',
                'label' => 'ویرایش کد تخفیف'
            ],
            [
                'title' => 'delete-offer',
                'label' => 'حذف کد تخفیف'
            ],
        ]);

        /**
         * roles permissions
         */
        Permission::query()->insert([
            [
                'title' => 'read-role',
                'label' => 'مشاهده نقش'
            ],
            [
                'title' => 'create-role',
                'label' => 'ایجاد نقش'
            ],
            [
                'title' => 'update-role',
                'label' => 'ویرایش نقش'
            ],
            [
                'title' => 'delete-role',
                'label' => 'حذف نقش'
            ],
        ]);

        /**
         * dashboard permissions
         */
        Permission::query()->insert(
            [
                'title' => 'view-dashboard',
                'label' => 'مشاهده داشبورد'
            ]
        );

    }
}
