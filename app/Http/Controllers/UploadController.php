<?php

namespace App\Http\Controllers;

use App\Http\Requests\Upload\StoreRequest;
use App\Http\Resources\UrlImageResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class UploadController extends Controller
{
    /**
     * upload nas imagens.
     */
    public function store(StoreRequest $request)
    {
        if (!$request->file('file')) {
            throw new BadRequestException('File not found');
        }

        $file = $request->file('file');
        $name = $file->hashName();        
        $pathName = Storage::disk('s3')->put("files/{$name}", $file);        

        return response()->json([
            'icon' => 'success',
            'message' => 'Arquivo salvo com sucesso!',
            'return' => true,
            'url' => Storage::disk('s3')->url($pathName),
        ]);
    }
}
