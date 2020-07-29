
@if($blocks->isNotEmpty())
    <div class="model-images-container">
        <h2>Biblioteca de imagens</h2>
        <hr>

        @foreach($blocks as $key => $block)

            <div class="block-item">

                @include('model-images::errors', [
                    'errorBagName' => 'htmlBlocksEditErrorBag_' . $block->id
                ])

                @include('model-images::block-message', [
                    'session_flash_key' => 'htmlBlocksEditErrorBag_' . $block->id
                ])

                <form
                    action="{{ route('model-images.update', $block->id) }}"
                    method="POST"
                    enctype="multipart/form-data">

                    <input type="hidden" name="old_block_{{ $block->id }}" value="1">
                    <input type="hidden" name="errorBag" value="htmlBlocksEditErrorBag_{{ $block->id }}">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    @include('model-images::inputs', ['block' => $block])

                    <button type="submit" class="btn btn-success">Salvar</button>

                </form>

            </div>

        @endforeach
    </div>
@endif

<div class="model-images-form-container">

    <h2>Adicionar Bloco de Html</h2>
    <hr>

    @include('model-images::errors', ['errorBagName' => 'htmlBlocksCreateErrorBag'])

    @include('model-images::block-message', [
        'session_flash_key' => 'htmlBlocksCreateErrorBag'
    ])

    <form
        action="{{ route('model-images.store') }}"
        method="POST"
        enctype="multipart/form-data">

        <input type="hidden" name="old_block_0" value="1">

        <input type="hidden" name="errorBag" value="htmlBlocksCreateErrorBag">

        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        @include('model-images::inputs', ['block' => null])

        <button type="submit" class="btn btn-success">Salvar</button>

    </form>

</div>

<script>

    var html_blocks_message_id = 'html-block-message';
    var el = document.getElementById(html_blocks_message_id);
    var htmlElement = document.documentElement;
    htmlElement.style.scrollBehavior = 'smooth';

    if(el) {
        el.scrollIntoView();
        setTimeout(function() { htmlElement.style.scrollBehavior = ""}, 1000);
    }

</script>
