
<input type="hidden" name="rel" value="{{ $relationString }}">
<input type="hidden" name="rel_id" value="{{ $model_id }}">

@php
    $modelImageBlockFields = [
                'key' => 'Chave',
                'title' => 'Título',
                'alt' => 'Alt',
                'order' => 'Ordem'
            ];
@endphp

@php
    $old = old('old_block_' . ($image ? $image->id : '0'), false);
    $activeChecked = $old ? old('active') : optional($image)->active;

@endphp

<div class="form-group">
    <label for="inputFileImage">Imagem</label>
    <input type="file" name="file_image" id="inputFileImage">
  </div>

<div class="checkbox">
    <label>
      <input
        name="active"
        value="1" {{ empty($activeChecked) ? '' : 'checked="checked"' }} type="checkbox"> Ativo
    </label>
</div>

@foreach($modelImageBlockFields as $key => $field)

    <div class="form-group">
        <label for="{{ $key }}">{{ $field }}:</label>
        <input
            type="text"
            name="{{ $key }}"
            value="{{ $old ? old($key) : optional($image)->{$key} }}"
            class="form-control">
    </div>

@endforeach
