
<input type="hidden" name="rel" value="{{ $relationString }}">
<input type="hidden" name="rel_id" value="{{ $model_id }}">

@php
    $htmlBlocksFields = [
                'key' => 'Chave',
                'title' => 'Título',
                'sub_title' => 'Sub Título',
                'order' => 'Ordem'
            ];
@endphp

@php
    $old = old('old_block_' . ($block ? $block->id : '0'), false);
    $activeChecked = $old ? old('active') : optional($block)->active;

@endphp

<div class="checkbox">
    <label>
      <input
        name="active"
        value="1" {{ empty($activeChecked) ? '' : 'checked="checked"' }} type="checkbox"> Ativo
    </label>
</div>

@foreach($htmlBlocksFields as $key => $field)

    <div class="form-group">
        <label for="{{ $key }}">{{ $field }}:</label>
        <input
            type="text"
            name="{{ $key }}"
            value="{{ $old ? old($key) : optional($block)->{$key} }}"
            class="form-control">
    </div>

@endforeach

<div class="form-group">
    <textarea
        name="content"
        class="{{ config('model-images.wysisyg_class') }}"
        cols="30"
        rows="10"
        data-upload-dir="{{ $relationString }}">{{ $old ? old('content') : optional($block)->content }}
    </textarea>
</div>
