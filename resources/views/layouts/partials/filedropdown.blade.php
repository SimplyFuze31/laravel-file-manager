<div class="mx-2">
    <form method="POST" action="{{ route('file.download', $file) }}">
        @csrf
        <div class="modal-footer">
            <button type="submit" class="btn btn-success">Завантажити</button>
        </div>
    </form>
</div>


<div class="ms-2">
    @can('can edit')
        <form method="POST" action="{{ route('file.destroy', $file) }}">
            @csrf
            @method('delete')
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger">Видалити</button>
            </div>
        </form>
    @endcan
</div>
