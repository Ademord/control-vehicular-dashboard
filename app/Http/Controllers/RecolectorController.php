<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Recolector;
use  Illuminate\Support\Facades\Redis;

// Redis::set('name', 'Jeffrey');
// return Redis::get('name');
// return view('welcome');\
// 1. Publish event with redis
// $data = [
//     'event' => 'PlateRegistered',
//     'data' => [
//         'username' => 'JohnDoe'
//     ]
// ];
// Redis::publish('test-channel', json_encode($data));
// 2. Node.js  + redis subcribes to the event
// done!
// 3. Use socket.io to emit to all clients.

class RecolectorController extends Controller
{
    public function solicitarImagen($img='image.jpg'){
        $model = new Recolector();
        $model->solicitarImagen($img);
        return redirect()->route('home_path')->with('message','Recolector de imagen iniciado exitosamente!');
    }
    public function solicitarVideo($vid='video1.avi'){
        $model = new Recolector();
        $model->solicitarVideo($vid);
        return redirect()->route('home_path')->with('message','Recolector de video iniciado exitosamente!');
    }

    public function solicitarIP($ip='123.123.111'){
        $model = new Recolector();
        $model->solicitarIP($ip);
        return redirect()->route('home_path')->with('message','Camara conectada exitosamente!');
    }

    public function postUpload(Request $request)
    {
        // Guardar archivo
        $file= $request->file('file');
        $fileMimeType = $file->getMimeType();
        $fileName = time().$file->getClientOriginalName();
        $file->move(storage_path('media/'),$fileName);

        // Enviar Datos segun el Mimetype
        $model = new Recolector();
        if (strpos($fileMimeType, 'image') !== false) {
            $model->solicitarImagen('/media/' . $fileName);
        }

        if (strpos($fileMimeType, 'video') !== false) {
            $model->solicitarVideo('/media/' . $fileName);
        }

        return response()->json(['success'=>$fileName]);
    }

//    public function postUpload(){
//
//        $input = Input::all();
//        return "hello";
//
//        $rules = array(
//            'file' => 'mimes:mp4,ogx,oga,ogv,ogg,webm,jpg,jpeg,png',
//        );
//
//        $validation = Validator::make($input, $rules);
//
//        if ($validation->fails())
//        {
//            return Response::make($validation->errors->first(), 400);
//        }
//
//        $file = Input::file('file');
//
//        $file     = request()->file('file');
//        $fileName = rand(1, 999) . $file->getClientOriginalName();
//        $filePath = "/uploads/" . date("Y") . '/' . date("m") . "/" . $fileName;
//
//        $file->storeAs('media/'. date("Y") . '/' . date("m") . '/', $fileName, 'uploads');
//
//        return File::create(['file_name' => $fileName, 'path' => $filePath, 'file_extension' => $file->getClientOriginalExtension()]);
//        return back()->with('success','Image Upload successful');
////        $extension = File::extension($file['name']);
////        $directory = path('public').'media/'.sha1(time());
////        $filename = sha1(time().time()).".{$extension}";
//
////        $upload_success = Input::upload('file', $directory, $filename);
//
//        if( $upload_success ) {
//            return Response::json('success', 200);
//        } else {
//            return Response::json('error', 400);
//        }
//    }
}

