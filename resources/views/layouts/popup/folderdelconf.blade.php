<div id="deleteconfirm" class="overlay">
    <div class="popup">
        <h2 class="mt-3 fs-2 fw-bold text-secondary">Ви точно хочете видалити папку?</h2>

        <div class="content">
            <form method="POST" action="{{ route('folder.destroy', $folder) }}">
                @csrf
                @method('delete')
                <div class="d-flex justify-content-evenly py-3">
                    <button type="submit" class="btn btn-danger">Видалити</button>
                    <a class="btn btn-success" href="#">Повернутись назад</a>
                </div>
            </form>
        </div>
    </div>
</div>