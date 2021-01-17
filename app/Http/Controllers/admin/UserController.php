<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\UserRequest;
use Illuminate\Hashing\BcryptHasher;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (request()->ajax()){
            $query = User::query();
                return DataTables::of($query)
            ->addColumn('action', function($item){
                return '
                <div class="btn-group">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" type="button" id="action">
                    Aksi
                    </button>
                <div class="dropdown-menu">
                    <a href=" '.route('user.edit',$item->id).' " class="dropdown-item">Edit</a>
                    <form action=" '.route('user.destroy',$item->id).' " method="post">
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

        return view('pages.admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $data = $request->all();

        $data['password'] =  bcrypt( $request->password) ;

        User::create($data);

        return redirect()->route('user.index');
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
        $item = User::findOrFail($id);

        return view('pages.admin.user.edit',[
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
    public function update(UserRequest $request, $id)
    {
        $data = $request->all();

        if ( $request->password ) {
             $data['password'] = bcrypt( $request->password );
        }else {
            unset($data['password']);
        }

        $item = User::findOrFail($id);

        $item->update($data);

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = User::findOrFail($id);
        $item->delete();

        return redirect()->route('user.index');
    }
}
