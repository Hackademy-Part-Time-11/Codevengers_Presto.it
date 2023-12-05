<form action="{{ route('set_language_locale', $lang)  }}" method="POST">
    @csrf
    <button type="submid" class="nav-link" style="border-radius: 3px; ">
        <span  class =" fi fi-{{$nation}} " ></span>
    </button>
</form>