<div class="btn-group" role="group">
    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
        aria-expanded="false">
        •••
    </button>
    <ul class="dropdown-menu">
        <li>
            <form method="POST" action="{{ route('file.download', $file) }}">
                @csrf
                <div class="modal-footer">
                    <button type="submit" class="btn "
                        style="color: green">Завантажити</button>
                </div>
            </form>
        </li>
        <li>
            <form method="POST" action="{{ route('file.destroy', $file) }}">
                @csrf
                @method('delete')
                <div class="modal-footer">
                    <button type="submit" class="btn"
                        style="color: red">Видалити</button>
                </div>
            </form>
        </li>
    </ul>
</div>