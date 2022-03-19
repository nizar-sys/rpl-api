<?php

namespace App\Http\Controllers;

use App\Http\Libraries\BaseApi;
use App\Http\Requests\RequestStoreOrUpdateUser;
use Illuminate\Http\Request;

class UserCrudController extends Controller
{
    protected $base_api;
    public function __construct()
    {
        $this->base_api = BaseApi::getInstance();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->base_api->index('/user');
        return view('dashboard.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestStoreOrUpdateUser $request)
    {
        $response = $this->base_api->store('/user/create', $request->validated());
        if($response->failed()){
            return back()->withErrors($response->json('data'))->with('error', 'Gagal menambahkan data');
        }

        return redirect()->route('users.index')->with('success', 'Data berhasil ditambahkan');
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
        $user = $this->base_api->detail('/user', $id);
        return view('dashboard.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestStoreOrUpdateUser $request, $id)
    {
        $response = $this->base_api->update('/user', $id, $request->validated());
        if($response->failed()){
            return back()->withErrors($response->json('data'))->with('error', 'Gagal mengubah data');
        }

        return redirect()->route('users.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = $this->base_api->delete('/user', $id);
        if($response->failed()){
            return back()->withErrors($response->json('data'))->with('error', 'Gagal menghapus data');
        }

        return redirect()->route('users.index')->with('success', 'Data berhasil dihapus');
    }
}
