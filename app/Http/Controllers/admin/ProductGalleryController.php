<?php

namespace App\Http\Controllers\Admin;


use App\ProductGallery;
use App\Product;
use App\User;
use App\Categories;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductGalleryRequest;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;


class ProductGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (request()->ajax()){
            $query = ProductGallery::with(['product']);

            return DataTables::of($query)
            ->addColumn('action', function($item){
                return '
                <div class="btn-group">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" type="button" id="action">
                    Aksi
                    </button>
                <div class="dropdown-menu">
                    <a href=" '.route('product-gallery.edit',$item->id).' " class="dropdown-item">Edit</a>
                    <form action=" '.route('product-gallery.destroy',$item->id).' " method="post">
                    '.method_field('delete') .csrf_field().'
                    <button class="text-danger dropdown-item">Hapus</button>
                    </form>
                </div>
                </div>
                </div>
                ';
            })

            ->editColumn('photos',function($items){
                return $items->photos ? '<img src="'.Storage::url($items->photos).'" alt="" style="max-height:140px;"/>' : 'kosong';
            })
            ->rawColumns(['action','photos'])
            ->make();
        }

        return view('pages.admin.product-gallery.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();

        return view('pages.admin.product-gallery.create',[
            'products'=>$products,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductGalleryRequest $request)
    {
        $data = $request->all();
        $data['photos'] = $request->file('photos')->store('assets/admin','public');

        ProductGallery::create($data);

        return redirect()->route('product-gallery.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Product::findOrFail($id);

        $users = User::all();
        $categories = Categories::all();

        // dd($item);
        return view('pages.admin.product.edit',[
            'item'=>$item,
            'users'=>$users,
            'categories'=>$categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductGalleryRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        $item = Product::findOrFail($id);
        $item->update($data);

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = ProductGallery::findOrFail($id);
        $item->delete();

        return redirect()->route('product-gallery.index');
    }
}
