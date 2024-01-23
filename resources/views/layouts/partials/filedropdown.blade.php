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
        <form action="{{ route('file.destroy', $file) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Впевнені що хочете видалити?')">Видалити</button>
        </form>
    @endcan
</div>
