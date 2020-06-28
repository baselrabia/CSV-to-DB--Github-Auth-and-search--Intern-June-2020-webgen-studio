<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\ClientDealsDataTable;
use App\ClientDeal;

class ClientDealsController extends Controller
{
    public function index( ClientDealsDataTable $dataTable)
    {
        return $dataTable->render('clientDeals.index',['title'=>  'clientDeals']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ClientDeal::find($id)->delete();
		session()->flash('success', 'ClientDeal.deleted_record');
		return redirect('/clientdeal');
	}

	public function multi_delete() {
		if (is_array(request('item'))) {

			ClientDeal::destroy(request('item'));
		} else {

            dd(request('item'));

			ClientDeal::find(request('item'))->delete();
		}
		session()->flash('success', trans('ClientDeal.deleted_record'));
		return redirect('/clientdeal');
	}
}
