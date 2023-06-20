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
        <a href="#deleteconfirm" class="btn btn-danger">Видалити</a>
        @include('layouts.popup.filedelconf')
    @endcan
</div>
