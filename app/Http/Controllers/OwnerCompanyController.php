<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OwnerCompanyController extends Controller
{
    public function ownerCompanyInfo(){
        return view('inqueryForm');
    }

  
    public function ownerFormStore(Request $request)
    {
       // dd($request->all());
        // Validate form input
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
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // File upload helper
        $uploadFile = function ($field, $folder = 'uploads/image/') use ($request) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $filename = time() . '_' . $field . '.' . $file->getClientOriginalExtension();
                $file->move(public_path($folder), $filename);
                return $filename;
            }
            return null;
        };
    
        // Create new Client (or Inquiry) record
        $client = new Client();
    
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
        $client->status = 0;
    
        // Handle image uploads
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
    
        return redirect()->back()->with('success', 'Form submitted successfully!');
    }
    
}
