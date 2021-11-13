<form action="{{ $url_destroy }}" method="POST">
    @method('DELETE') @csrf
    <div class="btn-group" role="group" aria-label="Basic example">
        <a href="{{ $url_add_stock }}" class="btn btn-sm btn-outline-primary modal-show edit" title="Add Stock">
            <i class="mdi mdi-package-variant"></i>
        </a>
        <a href="{{ $url_add_distribution }}" class="btn btn-sm btn-outline-success modal-show edit" title="Add Distribution">
            <i class="mdi mdi-truck-fast"></i>
        </a>
        <a href="{{ $url_show }}" class="btn btn-sm btn-outline-info modal-show" title="Show Data">
            <i class="mdi mdi-eye-outline"></i>
        </a>
        <a href="{{ $url_edit }}" class="btn btn-sm btn-outline-secondary modal-show edit" title="Edit Data">
            <i class="mdi mdi-pencil-plus-outline"></i>
        </a>
        <button title="Delete Data" type="submit" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-outline-danger btn-delete">
            <i class="mdi mdi-trash-can-outline"></i>
        </button>
    </div>
</form>
