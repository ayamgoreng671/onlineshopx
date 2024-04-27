<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $products = Product::where("seller_id", Auth::id())->get();
        return view("admin.products.index", [
            "products" => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $categories = Category::all();
        return view("admin.products.create", [
            "categories" => $categories
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => ["required", "string", "max:255"],
            "category_id" => ["required", "numeric", "min:0"],
            "image" => ["image", "mimes:png,jpg,jpeg"],
            "about" => ["required", "string"],
            "price" => ["required", "numeric", "min:0"],
        ]);

        DB::beginTransaction();
        try {

            $validated["slug"] = Str::slug($request->name);
            $validated["seller_id"] = Auth::id();


            if ($request->hasFile("image")) {
                $imagePath = $request->file("image")->store("product_image", "public");
                $imagePath["image"] = $imagePath;
            } else {
                $imagePath["image"] = "product_image/default-image.png";
            }

            $newproduct = Product::create($validated);
            DB::commit();

            return redirect()->route("admin.products.index")->with("success", "Product created successfully !");
        } catch (Exception $e) {
            DB::rollBack();

            $error = ValidationException::withMessages([
                "system_error" => ["system_error", $e->getMessage()]
            ]);

            throw $error;

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     */
    public function show(Product $product)
    {
        $selected_product = Product::where("id", $product->id)->get();
        return view("admin.products.show", [
            "product" => $selected_product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     */
    public function edit(Product $product)
    {
        $selected_product = Product::where("id", $product->id)->get();
        return view("admin.products.edit", [
            "product" => $selected_product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            "name" => ["required", "string", "max:255"],
            "category_id" => ["required", "numeric", "min:0"],
            "image" => ["image", "mimes:png,jpg,jpeg"],
            "about" => ["required", "string"],
            "price" => ["required", "numeric", "min:0"],
        ]);

        DB::beginTransaction();
        try {

            $validated["slug"] = Str::slug($request->name);
            $validated["seller_id"] = Auth::id();


            if ($request->hasFile("image")) {
                $imagePath = $request->file("image")->store("product_image", "public");
                $imagePath["image"] = $imagePath;
            } else {
                $imagePath["image"] = "product_image/default-image.png";
            }

            $product->update($validated);
            DB::commit();
            return redirect()->route("admin.products.index")->with("success", "Product updated successfully !");


        } catch (Exception $e) {
            DB::rollBack();

            $error = ValidationException::withMessages([
                "system_error" => ["system_error", $e->getMessage()]
            ]);

            throw $error;

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     */
    public function destroy(Product $product)
    {

        try {

            $product->delete();
            return redirect()->route("admin.products.index")->with("success", "Product deleted successfully !");


        } catch (Exception $e) {

            $error = ValidationException::withMessages([
                "system_error" => ["system_error", $e->getMessage()]
            ]);

            throw $error;

        }
    }
}
