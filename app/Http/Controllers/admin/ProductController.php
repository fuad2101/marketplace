<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use App\User;
use App\Categories;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\ProductRequest;
use Illuminate\Hashing\BcryptHasher;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (request()->ajax()){
            $query = Product::with(['user','categories']);

            return DataTables::of($query)
            ->addColumn('action', function($item){
                return '
                <div class="btn-group">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" type="button" id="action">
                    Aksi
                    </button>
                <div class="dropdown-menu">
                    <a href=" '.route('product.edit',$item->id).' " class="dropdown-item">Edit</a>
                    <form action=" '.route('product.destroy',$item->id).' " method="post">
                    '.method_field('delete') .csrf_field().'
                    <button class="text-danger dropdown-item">Hapus</button>
                    </form>
                </div>
                </div>
                </div>
                ';
            })

            ->editColumn('photo',function($item){
                return $item->photo ? '<img src=" '. Storage::url($item->photo).' " alt="" style="max-height:40px;" />' : '';
            })
            ->rawColumns(['action','photo'])
            ->make();
        }

        return view('pages.admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $categories = Categories::all();

        return view('pages.admin.product.create',[
            'users'=>$users,
            'categories'=>$categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $data = $request->all();

        // dd($data);
        $data['slug'] = Str::slug($request->name);

        Product::create($data);

        return redirect()->route('product.index');
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
    public function update(ProductRequest $request, $id)
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
        $item = Product::findOrFail($id);
        $item->delete();

        return redirect()->route('product.index');
    }
}
