<?php

namespace Database\Factories;

use App\Models\Shop;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShopFactory extends Factory
{
    // 使用するモデル
    protected $model = Shop::class;

    // ダミーデータの定義
    public function definition()
    {
        return [
            'name' => $this->faker->company,  // ランダムな会社名
            'description' => $this->faker->text,  // ランダムな説明文
        ];
    }
}
