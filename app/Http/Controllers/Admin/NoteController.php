<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Note;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('note.notes');
    }

    public function getNoteDatatable(Request $request)
    {
        $notes = Note::orderBy('id', 'DESC')->get();
        return Datatables::of($notes)
            ->editColumn('date_string', function ($data) {
                return strtotime($data->created_at);
            })
            ->editColumn('date', function ($data) {
                return date('d/m/Y',strtotime($data->created_at));
            })
            ->editColumn('product_nr', function ($data) {
              
                return $data->product->product_nr;
            })
            ->editColumn('cross_ref', function ($data) {
                return $data->cross_ref;
            })
            ->editColumn('crossref_buy_price', function ($data) {
                return $data->crossref_buy_price;
            })
            ->editColumn('grades', function ($data) {
                return $data->grades;
            })
            ->editColumn('delivery_time', function ($data) {
                return $data->delivery_time;
            })
            ->editColumn('add_to_range', function ($data) {
                return $data->add_to_range;
            })
            ->editColumn('hold_stock', function ($data) {
                return $data->hold_stock;
            })
            ->editColumn('target_buy_price', function ($data) {
                return $data->target_buy_price;
            })
            ->editColumn('description', function ($data) {
                return $data->description;
            })
            ->editColumn('user', function ($data) {
                return $data->user->name;
            })
            ->rawColumns(['date_string','date', 'product_nr', 'cross_ref', 'crossref_buy_price', 'grades', 'delivery_time', 'add_to_range', 'hold_stock', 'target_buy_price', 'description', 'user'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
