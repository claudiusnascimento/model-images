
@if($modelImages->isNotEmpty())
    <div class="model-images-container">
        <h2>Biblioteca de imagens</h2>
        <hr>

        @foreach($modelImages as $key => $image)

            <div class="image-item">

                @include('model-images::errors', [
                    'errorBagName' => 'htmlBlocksEditErrorBag_' . $image->id
                ])

                @include('model-images::image-message', [
                    'session_flash_key' => 'modelImagesEditErrorBag_' . $image->id
                ])

                <form
                    action="{{ route('model-images.update', $image->id) }}"
                    method="POST"
                    enctype="multipart/form-data">

                    <input type="hidden" name="old_image_{{ $image->id }}" value="1">
                    <input type="hidden" name="errorBag" value="modelImagesEditErrorBag_{{ $image->id }}">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    @include('model-images::inputs', ['image' => $image])

                    <button type="submit" class="btn btn-success">Salvar</button>

                </form>

            </div>

        @endforeach
    </div>
@endif

<div class="model-images-form-container">

    <h2>Adicionar Imagens</h2>
    <hr>

    @include('model-images::errors', ['errorBagName' => 'modelImagesCreateErrorBag'])

    @include('model-images::image-message', [
        'session_flash_key' => 'modelImagesCreateErrorBag'
    ])

    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-4">

            <form
                action="{{ route('model-images.store') }}"
                method="POST"
                enctype="multipart/form-data">

                <input type="hidden" name="old_block_0" value="1">

                <input type="hidden" name="errorBag" value="modelImagesCreateErrorBag">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                @include('model-images::inputs', ['image' => null])

                <button type="submit" class="btn btn-success">Salvar</button>

            </form>

        </div>
    </div>


</div>

<script>

    // var html_blocks_message_id = 'html-image-message';
    // var el = document.getElementById(html_blocks_message_id);
    // var htmlElement = document.documentElement;
    // htmlElement.style.scrollBehavior = 'smooth';

    // if(el) {
    //     el.scrollIntoView();
    //     setTimeout(function() { htmlElement.style.scrollBehavior = ""}, 1000);
    // }

</script>
