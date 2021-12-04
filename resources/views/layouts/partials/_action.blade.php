<form action="{{ $url_destroy }}" method="POST">
    @method('DELETE') @csrf
    <div class="btn-group" role="group" aria-label="Basic example">
        <a href="{{ $url_show }}" class="btn btn-sm btn-outline-info modal-show" title="Show Data">
            <i class="mdi mdi-eye-outline"></i>
        </a>
        @if (in_array(auth()->user()->role->id, [1, 2]))
        <a href="{{ $url_edit }}" class="btn btn-sm btn-outline-secondary modal-show edit">
            <i class="mdi mdi-pencil-plus-outline"></i>
        </a>
        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-outline-danger btn-delete">
            <i class="mdi mdi-trash-can-outline"></i>
        </button>
        @endif
    </div>
</form>
