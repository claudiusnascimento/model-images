@if($errors->{$errorBagName}->any())
    <div id="model-images-message"></div>
    <ul class="alert alert-danger">
        @foreach($errors->{$errorBagName}->all() as $error)
            <li style="list-style-type: none;">{{ $error }}</li>
        @endforeach
    </ul>
@endif
