<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



Route::get('/', function () {
    return view('welcome');
}); 


// =============== Slides Routes ======================
Route::get('/admin/slides', function() {
    $slides = DB::table('slides')->get();
    return view('admin.slides.index', ['slides' => $slides]);
});

Route::get('/admin/slides/create', function() {
    return view('admin.slides.create');
}); 

Route::post('/admin/slides', function(Request $request) {
    $input = $request->all();

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $imagePath = $file->move(public_path().'/images/slides/', $fileName);
        $input['image'] = $fileName;
    }

    DB::table('slides')->insert([
        'name' => $input['name'],
        'image' => $input['image']
    ]);

    return redirect('admin/slides');
});

Route::put('/admin/slides/{id}', function($id, Request $request) {
    $input = $request->all();
    $slide = DB::table('slides')->where('id', $id)->first();

    if ($slide) {
        DB::table('slides')
            ->where('id', $id)
            ->update(['name' => $input['name']]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $imagePath = $file->move(public_path().'/images/slides/', $fileName);

            DB::table('slides')
                ->where('id', $id)
                ->update(['image' => $fileName]);
        }
    }

    return redirect('admin/slides');
}); 

Route::get('/admin/slides/{id}/edit', function($id) {
    $slide = DB::table('slides')->where('id', $id)->first();
    return view('admin.slides.edit', ['slide' => $slide]);
});
Route::get('/admin/slides/{id}/delete', function($id) {
    DB::table('slides')->where('id', $id)->delete();
    return redirect()->back();
});
// =============== End Slides Routes ======================



// =============== Categories Routes ======================
Route::get('/admin/categories', function() {
    $categories = DB::table('categories')->get();
    return view('admin.categories.index', ['categories' => $categories]);
});

Route::get('/admin/categories/create', function() {
    return view('admin.categories.create');
}); 

Route::post('/admin/categories', function(Request $request) {
    $input = $request->all();

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $imagePath = $file->move(public_path().'/images/categories/', $fileName);
        $input['image'] = $fileName;
    }

    DB::table('categories')->insert([
        'name' => $input['name'],
        'image' => $input['image']
    ]);

    return redirect('admin/categories');
});

Route::put('/admin/categories/{id}', function($id, Request $request) {
    $input = $request->all();
    $category = DB::table('categories')->where('id', $id)->first();

    if ($category) {
        DB::table('categories')
            ->where('id', $id)
            ->update(['name' => $input['name']]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $imagePath = $file->move(public_path().'/images/categories/', $fileName);

            DB::table('categories')
                ->where('id', $id)
                ->update(['image' => $fileName]);
        }
    }

    return redirect('admin/categories');
}); 

Route::get('/admin/categories/{id}/edit', function($id) {
    $category = DB::table('categories')->where('id', $id)->first();
    return view('admin.categories.edit', ['category' => $category]);
});
Route::get('/admin/categories/{id}/delete', function($id) {
    DB::table('categories')->where('id', $id)->delete();
    return redirect()->back();
});
// =============== End Categories Routes ======================



// =============== Products Routes ======================
Route::get('/admin/products', function() {
    $products = DB::table('products')->get();
    return view('admin.products.index', ['products' => $products]);
});

Route::get('/admin/products/create', function() {
    $categories = DB::table('categories')->get();
    return view('admin.products.create', ['categories' => $categories]);
}); 

Route::post('/admin/products', function(Request $request) {
    $input = $request->all();

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $imagePath = $file->move(public_path().'/images/products/', $fileName);
        $input['image'] = $fileName;
    }

    DB::table('products')->insert([
        'name' => $input['name'],
        'image' => $input['image'],
        'brand' => $input['brand'],
        'price' => $input['price'],
        'category_id' => $input['category_id'],
        'description' => $input['description'],
    ]);

    return redirect('admin/products');
});

Route::put('/admin/products/{id}', function($id, Request $request) {
    $input = $request->all();
    $product = DB::table('products')->where('id', $id)->first();

    if ($product) {
        DB::table('products')
            ->where('id', $id)
            ->update([
                'name' => $input['name'],
                'brand' => $input['brand'],
                'price' => $input['price'],
                'category_id' => $input['category_id'],
                'description' => $input['description'],
            ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $imagePath = $file->move(public_path().'/images/products/', $fileName);

            DB::table('products')
                ->where('id', $id)
                ->update(['image' => $fileName]);
        }
    }

    return redirect('admin/products');
}); 

Route::get('/admin/products/{id}/edit', function($id) {
    $product = DB::table('products')->where('id', $id)->first();
    $categories = DB::table('categories')->get();
    return view('admin.products.edit', ['product' => $product, 'categories' => $categories]);
});

Route::get('/admin/products/{id}/view', function($id) {
    $product = DB::table('products')->where('id', $id)->first();
    $categories = DB::table('categories')->get();
    return view('admin.products.view', ['product' => $product, 'categories' => $categories]);
});

Route::get('/admin/products/{id}/delete', function($id) {
    DB::table('products')->where('id', $id)->delete();
    return redirect()->back();
});
// =============== End products Routes ======================