<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    //Brands page load
    public function getClientsPageLoad() {
		
		$datalist = DB::table('clients')->orderBy('id','desc')
			->paginate(10);
       
        return view('pages.client', compact('datalist'));
    }
	
	//Get data for Brands Pagination
	public function getClientsTableData(Request $request){

		$search = $request->search;
        $datalist = DB::table('clients')->orderBy('id','desc')
			->paginate(10);

			return view('partials.client_table', compact('datalist'))->render();
		}
	//Save data for Brands

	public function saveClientsData(Request $request)
    {
        //dd($request->description);
        $id = $request->input('RecordId');

        $validator = Validator::make($request->all(), [
            'location' => 'required|string|max:100',
            'owner_name' => 'required|string|max:191',
            'owner_email' => 'required|email|max:191',
            'designation' => 'required|string|max:191',
            'business_cat' => 'required|string|max:191',
            'owner_phone' => 'required|string|max:20',
            'company_website' => 'nullable|string|max:255',
            'company_name' => 'required|string|max:255',
            'company_gst' => 'nullable|string|max:30',
            'company_address' => 'required|string|max:255',
            'video' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'facebook' => 'nullable|string|max:255',
            'youtube' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
            'owner_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'company_logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'company_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['msgTypes' => 'error', 'msg' => $validator->errors()->first()]);
        }

        $uploadFile = function ($field, $folder = 'uploads/image/') use ($request) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $filename = time() . '_' . $field . '.' . $file->getClientOriginalExtension();
                $file->move(public_path($folder), $filename);
                return $filename;
            }
            return null;
        };

        $client = $id ? Client::find($id) : new Client;

        if (!$client) {
            return response()->json(['msgTypes' => 'error', 'msg' => __('Client not found')]);
        }

        if (!$id && Client::where('name', $request->name)->exists()) {
            return response()->json(['msgTypes' => 'error', 'msg' => __('Client with this name already exists')]);
        }

        $client->location = $request->location;
        $client->owner_name = $request->owner_name;
        $client->owner_email = $request->owner_email;
        $client->designation = $request->designation;
        $client->business_cat = $request->business_cat;
        $client->owner_phone = $request->owner_phone;
        $client->company_website = $request->company_website;
        $client->company_name = $request->company_name;
        $client->company_gst = $request->company_gst;
        $client->company_address = $request->company_address;
        $client->video = $request->video;
        $client->description = $request->description;
        $client->facebook = $request->facebook;
        $client->youtube = $request->youtube;
        $client->instagram = $request->instagram;
        $client->linkedin = $request->linkedin;
        $client->status = $request->status; // make sure form <select name="status">

        if ($ownerImage = $uploadFile('owner_image')) {
            $client->owner_image = $ownerImage;
        }
        if ($companyLogo = $uploadFile('company_logo')) {
            $client->company_logo = $companyLogo;
        }
        if ($companyImage = $uploadFile('company_image')) {
            $client->company_image = $companyImage;
        }

        $client->save();

        return response()->json(['msgTypes' => 'success', 'msg' => $id ? __('Client updated successfully') : __('New client added successfully')]);
    }




	
	//Get data for Brand by id
    public function getClientsById(Request $request){

		$id = $request->id;
		$data = Client::where('id', $id)->first();
		
		return response()->json($data);
	}
	
	//Delete data for Brands
	public function deleteClients(Request $request){
		
		$res = array();

		$id = $request->id;

		if($id != ''){
			$response = Client::where('id', $id)->delete();
			if($response){
				$res['msgTypes'] = 'success';
				$res['msg'] = __('Data Removed Successfully');
			}else{
				$res['msgTypes'] = 'error';
				$res['msg'] = __('Data remove failed');
			}
		}
		
		return response()->json($res);
	}
		
}
