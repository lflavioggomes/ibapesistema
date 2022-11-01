<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;
use Illuminate\Support\Facades\DB;
use App\Models\Laudo;

/**
 * Handles the file upload
 *
 * @param Request $request
 *
 * @return \Illuminate\Http\JsonResponse
 *
 * @throws UploadMissingFileException
 * @throws \Pion\Laravel\ChunkUpload\Exceptions\UploadFailedException
 */

class LaudoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $laudo = DB::table('laudos')
        ->leftJoin('statuses', 'statuses.id', '=', 'laudos.status_id')
        ->select()
        ->where('user_id', '=', auth()->user()->id)->get();

       return view('site.laudo.index', [
        'laudo' => $laudo
        ]);
    }

    public function uploadlargefiles(Request $request) 
    {
        $laudo = DB::table('laudos')
                ->select(DB::raw('count(id) as contador'))
                ->where('user_id','=', auth()->user()->id)
                ->first();

        if($laudo->contador >= 5)
        {
            return [
                'error' => 1
            ];
            exit;
        }

        $receiver = new FileReceiver('file', $request, HandlerFactory::classFromRequest($request));

        if (!$receiver->isUploaded()) {

        return [
                'error' => 1
            ];
            exit;
            // file not uploaded   
        }

        $fileReceived = $receiver->receive(); // receive file
        if ($fileReceived->isFinished()) { // file uploading is complete / all chunks are uploaded
            $file = $fileReceived->getFile(); // get file
            $extension = $file->getClientOriginalExtension();
            $fileName = str_replace('.'.$extension, '', $file->getClientOriginalName()); //file name without extenstion
            $fileName .= '_' . md5(time()) . '.' . $extension; // a unique file name

            $disk = Storage::disk(config('filesystems.default'));
            $path = $disk->putFileAs('laudo', $file, $fileName);

            $post['arquivo'] = $fileName;
            $post['numero'] = 1;
            $post['user_id'] = auth()->user()->id;
            $post['status_id'] = 3;
            $dados = Laudo::create($post);

            // delete chunked file
            unlink($file->getPathname());
            return [
                'path' => asset('storage/' . $path),
                'filename' => $fileName
            ];
        }

        // otherwise return percentage information
        $handler = $fileReceived->handler();
        return [
            'done' => $handler->getPercentageDone(),
            'status' => true
        ];
    }

    public function trabalho()
    {
        $laudo = DB::table('laudos')
        ->leftJoin('statuses', 'statuses.id', '=', 'laudos.status_id')
        ->select()
        ->where('user_id', '=', auth()->user()->id)->get();

        return view('site.laudo.trabalho', [
                    'laudo' => $laudo
        ]);
    }

}
