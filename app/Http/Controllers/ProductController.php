<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Repositories\ProductRepository as Product;
use Illuminate\Support\Facades\DB;

/**
 * Class ProductController
 * @package App\Http\Controllers
 */
class ProductController extends Controller
{
    /**
     * @var
     */
    private $product;

    /**
     * ProductController constructor.
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            return view('products.index')->with(['products' => $this->product->paginate()]);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return back()->with('error', 'Something was wrong, please contact the administrator!');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProductRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $this->product->create($request->all());
            });
            return redirect()->route('products.index')->with('info', 'Product created with success!');
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return back()->with('error', 'Something was wrong, please contact the administrator!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $product = $this->product->findOrFail($id);
            if (empty($product)) {
                return redirect()->route('products.index')->with('error', 'Product not found');
            }
            return view('products.show')->with(['product' => $product]);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return back()->with('error', 'Something was wrong, please contact the administrator!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $product = $this->product->findOrFail($id);
            if (empty($product)) {
                return redirect()->route('products.index')->with('error', 'Product not found');
            }
            return view('products.edit')->with(['product' => $product]);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return back()->with('error', 'Something was wrong, please contact the administrator');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateProductRequest $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        try {
            $product = $this->product->findOrFail($id);
            if (empty($product)) {
                return redirect()->route('products.index')->with('error', 'Product not found');
            }
            DB::transaction(function () use ($request, $id) {
                $this->product->update(
                    $request->only('name', 'code', 'price', 'category_id'),
                    $id
                );
            });
            return redirect()->route('products.index')->with('info', 'Product updated with success!');
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return back()->with('error', 'Something was wrong, please contact the administrator!');
        }
    }

    /**
     * \Illuminate\Http\Response
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $product = $this->product->findOrFail($id);
            if (empty($product)) {
                return redirect()->route('products.index')->with('error', 'Product not found');
            }
            DB::transaction(function () use ($id) {
                $this->product->delete($id);
            });
            return back()->with('info', 'Product destroyed with success!');
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return back()->with('error', 'Something was wrong, please contact the administrator!');
        }
    }
}
