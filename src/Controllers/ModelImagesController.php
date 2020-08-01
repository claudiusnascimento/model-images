<?php

namespace ClaudiusNascimento\ModelImages\Controllers;

use Illuminate\Routing\Controller as BaseController;

use Exception;
use ClaudiusNascimento\ModelImages\Models\ModelImage;
use ClaudiusNascimento\ModelImages\Requests\ModelImageRequest;

class ModelImagesController extends BaseController
{
    //use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function store(ModelImageRequest $request)
    {



        try {

            $errorBag = $request->get('errorBag');

            $uploaded = $request->file('file_image');

            $request->merge($this->getSizeFields($uploaded));

            $disk = $request->getIfHas('disk', config('filesystems.default'));

            $src = $request->file('file_image')->store($request->get('rel'), $disk);

            $request->merge(['src' => $src]);

            $image = ModelImage::create($request->all());

        } catch (Exception $e) {

            //dd($e->getMessage());
            \Log::error('MODEL_IMAGE_ERROR::');
            \Log::error($e->getTraceAsString());

            $error = env('APP_DEBUG', false) ?
                                $e->getMessage() :
                                'Erro ao salvar imagem(s)';

            return redirect()
                    ->back()
                    ->withInput()
                    ->withErrors($error, $errorBag);
        }

        session()->flash('image_message', [
                'type' => 'success',
                'message' => 'Imagem criada com sucesso'
            ]
        );

        return redirect()->back();

    }

    public function update(ModelImageRequest $request, $id)
    {

        $block = ModelImage::where('rel', $request->get('rel'))->find($id);

        $errorBag = $request->get('errorBag');

        if(!$block) {

            return redirect()
                    ->back()
                    ->withInput()
                    ->withErrors('Bloco não encontrado', $errorBag);
        }

        try {

            $block = $block->update($request->all());

        } catch (Exception $e) {

            \Log::error('MODEL_IMAGE_ERROR::');
            \Log::error($e->getTraceAsString());

            $error = env('APP_DEBUG', false) ?
                                $e->getMessage() :
                                'Model Image create error';

            return redirect()
                    ->back()
                    ->withInput()
                    ->withErrors($error, $errorBag);
        }

        session()->flash($errorBag, [
                'type' => 'success',
                'message' => 'Successful edit model image'
            ]
        );

        return redirect()->back();
    }

    public function destroy($id)
    {

        if($block = ModelGallery::where('rel', $rel)->find($id))
        {
            $block->delete();
            session()->flash('image_message', [
                    'type' => 'success',
                    'message' => 'Image deleted successfuly'
                ]
            );

            return redirect()->back();
        }

        session()->flash('image_message', [
                'type' => 'danger',
                'message' => 'Model Image dont finded'
            ]
        );

        return redirect()->back();
    }

    private function getSizeFields($uploaded) {

        $size = $uploaded->getSize();

        list($width, $height) = getimagesize($uploaded->getRealPath());

        return [
            'weight' => $size,
            'width' => $width,
            'height' => $height,
        ];
    }

}
