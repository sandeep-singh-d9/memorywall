<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Promocode;
use Auth;
use DB;
use Illuminate\Http\Request;

class PromocodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promocodes = Promocode::get();

        return view('Admin.promocode.index', compact('promocodes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.promocode.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            Promocode::create([
                'promocode' => $request->get('promocode'),
                'discount' => $request->get('discount'),
                'discount_type' => $request->get('discount_type'),
                'status' => $request->get('status'),
                'created_by' => Auth::id(),
            ]);
            DB::commit();

            return redirect()->to('promocodes')->with('success', 'Promocode created successfully');

        } catch (\Throwable $th) {
            return redirect()->to('promocodes')->with('error', 'Internal server error');

        }
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
        $promocode = Promocode::whereId($id)->first();

        return view('Admin.promocode.edit', compact('promocode'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            Promocode::whereId($id)->update([
                'promocode' => $request->get('promocode'),
                'discount' => $request->get('discount'),
                'discount_type' => $request->get('discount_type'),
                'status' => $request->get('status'),
                'updated_by' => Auth::id(),
            ]);
            DB::commit();

            return redirect()->to('promocodes')->with('success', 'Promocode updated successfully');

        } catch (\Throwable $th) {
            return redirect()->to('promocodes')->with('error', 'Internal server error');

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            Promocode::whereId($id)->destroy();

            DB::commit();

            return redirect()->to('promocodes')->with('success', 'Promocode deleted successfully');

        } catch (\Throwable $th) {
            return redirect()->to('promocodes')->with('error', 'Internal server error');

        }

    }
}
