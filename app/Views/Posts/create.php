<?= $this->include('layouts/header') ?>
<?= $this->include('layouts/navbar') ?>
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>

<body>
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">

    <?php
    $isEdit = isset($post); // Cek apakah ini mode edit atau tambah
    $formAction = $isEdit ? base_url('/posts/update/' . $post['id']) : base_url('/posts');
    ?>

    <div class="card-body">
        <form action="<?= $formAction ?>" method="post" enctype="multipart/form-data" onsubmit="submitEditorContent()">
            <?php if ($isEdit): ?>
                <input type="hidden" name="_method" value="PUT"> <!-- Gunakan PUT untuk edit -->
                <input type="hidden" name="id" value="<?= esc($post['id']) ?>">
            <?php endif; ?>

            <div class="form-group">
                <label for="title">Judul</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Masukkan Judul Artikel"
                    value="<?= $isEdit ? esc($post['title']) : '' ?>">
            </div>

            <div class="form-group">
                <label for="category">Kategori</label>
                <select class="form-control" name="category" id="category">
                    <option value="news" <?= $isEdit && $post['category'] == 'news' ? 'selected' : '' ?>>News</option>
                    <option value="article" <?= $isEdit && $post['category'] == 'article' ? 'selected' : '' ?>>Article
                    </option>
                </select>
            </div>

            <div class="form-group">
                <label for="content">Konten</label>
                <input type="hidden" name="content" id="content">
                <div id="editor"><?= $isEdit ? $post['content'] : 'Tulis Konten Anda Disini'; ?></div>
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
                class MyUploadAdapter {
                    constructor(loader) {
                        this.loader = loader;
                    }

                    upload() {
                        return this.loader.file
                            .then(file => new Promise((resolve, reject) => {
                                const data = new FormData();
                                data.append('upload', file);

                                fetch("<?= base_url('post/upload-image') ?>", {
                                    method: "POST",
                                    body: data
                                })
                                    .then(response => response.json())
                                    .then(result => {
                                        if (result.url) {
                                            resolve({ default: result.url });
                                        } else {
                                            reject(result.error || "Upload failed");
                                        }
                                    })
                                    .catch(error => reject(error));
                            }));
                    }

                    abort() { }
                }

                function MyCustomUploadAdapterPlugin(editor) {
                    editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
                        return new MyUploadAdapter(loader);
                    };
                }

                let editorInstance;
                ClassicEditor
                    .create(document.querySelector('#editor'), {
                        extraPlugins: [MyCustomUploadAdapterPlugin],
                        placeholder: "Tulis Konten Anda Disini"
                    })
                    .then(editor => {
                        editorInstance = editor;
                    })
                    .catch(error => {
                        console.error(error);
                    });

                function submitEditorContent() {
                    if (editorInstance) {
                        document.getElementById('content').value = editorInstance.getData();
                    }
                }
            </script>



            <button type="submit" class="btn btn-primary"><?= $isEdit ? 'Update' : 'Tambah' ?> Artikel</button>
        </form>
    </div>
</body>

<?= $this->include('layouts/footer') ?>