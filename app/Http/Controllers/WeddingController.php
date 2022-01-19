<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Wedding;
use Auth;


class WeddingController extends Controller
{
    //
    public function showform(){
        
        return view('AddWedding');
    }

    public function insert(Request $request){
        
        
        $file = $request->file('image');
            
        $filename = time() . '.' .$file->getClientOriginalExtension();
        
        Storage::putFileAS('public/image', $file, $filename);

        $filename = 'image/'.$filename;

        $wedding = new Wedding();
        $wedding->name = $request->name;
        $wedding->description = $request->description;
        $wedding->image = $filename;
    
        $wedding->save();

        return redirect()->back()->with('success', 'AddWeddingSuccess');
    }

    public function viewWedding(){
        $wedding = Wedding::all();
        return view('home', ['wedding' => $wedding]);
    }
    
    public function destroy($id){
        Wedding::destroy($id);
        return redirect()->back()->with('Success','Wedding is Deleted');
    }
}

