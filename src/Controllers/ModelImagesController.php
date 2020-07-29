<?php

namespace ClaudiusNascimento\ModelGallery\Controllers;

//use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
//use Illuminate\Foundation\Bus\DispatchesJobs;
//use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Exception;
use ClaudiusNascimento\ModelGallery\Models\ModelGallery;
use ClaudiusNascimento\ModelGallery\Requests\ModelImageRequest;

class ModelImagesController extends BaseController
{
    //use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function store(ModelImageRequest $request)
    {

        $errorBag = $request->get('errorBag');

        try {

            $block = HtmlBlock::create($request->all());

        } catch (Exception $e) {

            //dd($e->getMessage());
            \Log::error('MODEL_GALLERY_ERROR::');
            \Log::error($e->getTraceAsString());

            $error = env('APP_DEBUG', false) ?
                                $e->getMessage() :
                                'Erro ao salvar imagem(s)';

            return redirect()
                    ->back()
                    ->withInput()
                    ->withErrors($error, $errorBag);
        }

        session()->flash('block_message', [
                'type' => 'success',
                'message' => 'Bloco criado com sucesso'
            ]
        );

        return redirect()->back();

    }

    public function update(ModelImageRequest $request, $id)
    {

        $block = ModelGallery::where('rel', $request->get('rel'))->find($id);

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

            \Log::error('MODEL_GALLERY_ERROR::');
            \Log::error($e->getTraceAsString());

            $error = env('APP_DEBUG', false) ?
                                $e->getMessage() :
                                'Erro ao criar bloco de html';

            return redirect()
                    ->back()
                    ->withInput()
                    ->withErrors($error, $errorBag);
        }

        session()->flash($errorBag, [
                'type' => 'success',
                'message' => 'Bloco editado com sucesso'
            ]
        );

        return redirect()->back();
    }

    public function destroy($id)
    {

        if($block = ModelGallery::where('rel', $rel)->find($id))
        {
            $block->delete();
            session()->flash('block_message', [
                    'type' => 'success',
                    'message' => 'Bloco deletado com sucesso'
                ]
            );

            return redirect()->back();
        }

        session()->flash('block_message', [
                'type' => 'danger',
                'message' => 'Bloco não encontrado'
            ]
        );

        return redirect()->back();
    }

}
