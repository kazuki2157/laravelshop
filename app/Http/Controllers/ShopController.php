<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        // 初期クエリ
        $query = Shop::query();

        // 検索機能
        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        // ソート機能
        if ($request->has('sort_by')) {
            $query->orderBy($request->sort_by, $request->sort_order ?? 'asc');
        }

        // ページネーション（5件ごと）
        $shops = $query->paginate(5);

        // ビューに渡す
        return view('shops.index', ['shops' => $shops]);
    }

    public function detail($shop_id)
    {
        $shop = Shop::findOrFail($shop_id);
        return view('shops.detail', ['shop' => $shop]);
    }

    public function create()
    {
        return view('shops.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Shop::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('shop.index');
    }

    public function edit($shop_id)
    {
        $shop = Shop::findOrFail($shop_id);
        return view('shops.edit', ['shop' => $shop]);
    }

    public function update(Request $request, $shop_id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $shop = Shop::findOrFail($shop_id);
        $shop->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('shop.index');
    }

    public function destroy($shop_id)
    {
        $shop = Shop::findOrFail($shop_id);
        $shop->delete();

        return redirect()->route('shop.index');
    }
}
