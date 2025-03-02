<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>

<body>
    <div class="card-body">
        <form action="action/process_article.php" method="post" enctype="multipart/form-data"
            onsubmit="submitEditorContent()">
            <div class="form-group">
                <label for="articleTitle">Judul</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Masukkan Judul Artikel">
            </div>
            <div class="form-group">
                <label for="articleCategory">Kategori</label>
                <select class="form-control" name="category" id="category">
                    <option>News</option>
                    <option>Article</option>
                </select>
            </div>
            <div class="form-group">
                <label for="articleContent">Konten</label>
                <input type="hidden" name="content" id="content">
                <div id="editor">
                    <p><?php
                    if (0 == 1) {
                        echo "Value konten lama";
                    } else {
                        echo "Tulis konten disini";
                    }
                    ?></p>
                </div>
            </div>
            <style>
                .ck-editor__editable[role="textbox"] {
                    min-height: 200px;
                }

                .ck-content .image {
                    max-width: 80%;
                    margin: 20px auto;
                }
            </style>
            <script>
                let editorInstance;

                ClassicEditor
                    .create(document.querySelector('#editor'))
                    .then(editor => {
                        editorInstance = editor;
                    })
                    .catch(error => {
                        console.error(error);
                    });

                function submitEditorContent() {
                    if (editorInstance) {
                        const content = editorInstance.getData();
                        document.getElementById('editorContent').value = content;
                    } else {
                        console.error('Editor instance not ready.');
                    }
                }
            </script>
            <button type="submit" class="btn btn-primary">Tambah Artikel</button>
        </form>
        </d>
    </div>
</body>