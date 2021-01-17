<?php

namespace App\Http\Controllers\Admin;

use App\Categories;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\CategoryRequest;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (request()->ajax()){
            $query = Categories::query();
                return DataTables::of($query)
            ->addColumn('action', function($item){
                return '
                <div class="btn-group">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" type="button" id="action">
                    Aksi
                    </button>
                <div class="dropdown-menu">
                    <a href=" '.route('category.edit',$item->id).' " class="dropdown-item">Edit</a>
                    <form action=" '.route('category.destroy',$item->id).' " method="post">
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

        return view('pages.admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->name);
        $data['photo'] = $request->file('photo')->store('assets/category','public');

        Categories::create($data);

        return redirect()->route('category.index');
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
        $item = Categories::findOrFail($id);

        return view('pages.admin.category.edit',[
            'item'=>$item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->name);
        $data['photo'] = $request->file('photo')->store('assets/category','public');

        $item = Categories::findOrFail($id);

        $item->update($data);

        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Categories::findOrFail($id);
        $item->delete();

        return redirect()->route('category.index');
    }
}
