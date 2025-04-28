<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Client;

class ClientsController extends Controller
{
    public function getClientsPage(Request $request) {
        $query = Client::where('status', 1);

        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('owner_name', 'like', "%{$search}%")
                ->orWhere('company_name', 'like', "%{$search}%")
                ->orWhere('location', 'like', "%{$search}%");
            });
        }

        $datalist = $query->paginate(20)->withQueryString();
       
        return view('clients', compact('datalist'));
    }

    public function ownerCompanyDetail($id) {
		
		$datalist = DB::table('clients')->where('id',$id)->first();
       
        return view('owner-details', compact('datalist'));
    }


    
}
