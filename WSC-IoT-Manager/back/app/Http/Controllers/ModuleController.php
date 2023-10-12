<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use ZipArchive;

class ModuleController extends Controller
{
    public function modules(Request $request) {
        if (auth()->user()){
            $modules = Module::where('user_id', auth()->user()->id)->get();
        } else {
            $modules = [];
            return redirect('/xxx-m2.wsr.ru/login');
        }
        return view('module/modules',[
            'modules' => $modules
        ] );
    }

    public function create_module(Request $request) {
        if (auth()->user()) {
            return view('module/create_module');
        } else {
            return redirect('/xxx-m2.wsr.ru/login');
        }
    }

    public function store(Request $request) {
        $zip = $request->zip;

        $standarzipnamewithouextension = substr($request->zip->getClientOriginalName(), 0, -4);
        $zipname = Str::random(32).'.'.$request->zip->getClientOriginalName(); 
        // $zipnamewithoutextension = substr($zipname, 0, -4);

        // ! add to database
        $file = Module::create([
            'name' => $zipname,
            'user_id' => $request->user()->id,
            'archive' => $zipname
        ]);

        $path = public_path('uploads/');
        $zip->move($path, $zipname);

        // ! unpucking
        $ziparchive = new ZipArchive;
        $ziparchive->open('uploads/'.$zipname);
        $ziparchive->extractTo($path);
        $ziparchive->close();

        $json = file_get_contents('uploads/'.$standarzipnamewithouextension.'/'.'modinfo.json');
        $data = json_decode($json);

        $dataname = $data->configItem[0]->name;

        $file->name = $dataname;
        $file->save();

        return redirect('/xxx-m2.wsr.ru/modules');
    }

    public function storeApi(Request $request) {
        $zip = $request->zip;

        $standarzipnamewithouextension = substr($request->zip->getClientOriginalName(), 0, -4);
        $zipname = Str::random(32).'.'.$request->zip->getClientOriginalName(); 
        // $zipnamewithoutextension = substr($zipname, 0, -4);

        // ! add to database
        $file = Module::create([
            'name' => $zipname,
            'user_id' => $request->user_id,
            'archive' => $zipname
        ]);

        $path = public_path('uploads/');
        $zip->move($path, $zipname);

        // ! unpucking
        $ziparchive = new ZipArchive;
        $ziparchive->open('uploads/'.$zipname);
        $ziparchive->extractTo($path);
        $ziparchive->close();

        $json = file_get_contents('uploads/'.$standarzipnamewithouextension.'/'.'modinfo.json');
        $data = json_decode($json);

        $dataname = $data->configItem[0]->name;

        $file->name = $dataname;
        $file->save();

        return response()->json([
            'file' => $file,
            'data' => $data,
        ], 201);
    }

    public function delete(Request $request, $id) {
        $file = Module::find($id);
        $file ->delete();
        return redirect('/xxx-m2.wsr.ru/modules');
    }
}
