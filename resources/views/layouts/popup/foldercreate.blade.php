<div id="foldercreate" class="overlay">
    <div class="popup">
        <h2 class="mt-3 fs-2 fw-bold text-secondary">Додати нову папку</h2>
        <a class="close" href="#">&times;</a>

        <div class="content">
            <form method="POST" action="{{ route('folder.create' , $folder->id) }}" enctype="multipart/form-data" class="mt-3 w-75">
                @csrf
                <div class="input-group">
                    <input type="text" class="form-control mw-100" name="foldername" id="inputFoldername">
                    <select name="permissionselect" id="">
                        <option value="Acsess to student folder">Для студентів</option>
                        <option value="Acsess to teacher folder">Для викладачів</option>
                    </select>
                    <button type="submit" class="btn btn-primary">Додати папку</button>
                </div>
            </form>
        </div>

    </div>
</div>