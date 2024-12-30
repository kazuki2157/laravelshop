<?php

namespace Tests\Feature;

use App\Models\Shop;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShopTest extends TestCase
{
    use RefreshDatabase; // 各テストの後にデータベースをリフレッシュ

    /** @test */
    public function a_shop_can_be_created()
    {
        // 新しい店舗を作成
        $response = $this->post('/store', [
            'name' => 'Test Shop',
            'description' => 'Test Description',
        ]);

        // 店舗作成後、トップページにリダイレクトされること
        $response->assertRedirect('/');
        
        // データベースに新しい店舗が保存されていることを確認
        $this->assertDatabaseHas('shops', [
            'name' => 'Test Shop',
            'description' => 'Test Description',
        ]);
    }

    /** @test */
    public function shop_list_page_is_accessible()
    {
        // 店舗一覧ページへのGETリクエストを送信
        $response = $this->get('/');
        
        // ステータスコードが200（OK）でページが表示されることを確認
        $response->assertStatus(200);
        
        // ページ内に特定のテキストが含まれていることを確認
        $response->assertSee('飲食店一覧ページ');
    }

    /** @test */
    public function a_shop_can_be_deleted()
    {
        // ダミー店舗を作成
        $shop = Shop::factory()->create();

        // 削除リクエストを送信
        $response = $this->post("/delete/{$shop->id}");

        // 店舗削除後、一覧ページにリダイレクトされること
        $response->assertRedirect('/');

        // データベースから店舗が削除されていることを確認
        $this->assertDatabaseMissing('shops', ['id' => $shop->id]);
    }
}
