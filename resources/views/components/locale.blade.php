<form action="{{ route('set_language_locale', $lang)  }}" method="POST">
    @csrf
    <button type="submid" class="nav-link" style="border-radius: 3px; margin:0px; width: 57px;">
        <span style="height: 30px" class =" fi fi-{{$nation}} " ></span>
    </button>
</form>