<div id="fileupload" class="overlay">
    <div class="popup">
        <h2 class="mt-3 fs-2 fw-bold text-secondary">Додати новий файл</h2>
        <a class="close" href="#">&times;</a>

        <div class="content">
            <form method="POST" action="{{ route('file.upload',$folder->id) }}" enctype="multipart/form-data"class="mt-3 w-75">
                @csrf
                <div class="input-group">
                    <input multiple type="file" class="form-control mw-100" name="inputGroupFile04"
                        id="inputGroupFile04">
                    <button type="submit" class="btn btn-primary">Додати файл</button>
                </div>
            </form>
        </div>
    </div>
</div>