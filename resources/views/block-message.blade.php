@if(session()->has($session_flash_key))

    <div id="html-block-message"></div>

    <div class="alert alert-{{ session($session_flash_key)['type'] }}">
        <p>{{ session($session_flash_key)['message'] }}</p>
    </div>

@endif
