<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= $this->include('layouts/header') ?>
    <?= $this->include('layouts/navbar') ?>
    <link rel="stylesheet" href="css/style3.css">
    <title>Edit Profile</title>
    
    
    
    <script>
         function triggerFileInput() {
            document.getElementById('file-input').click();
        }
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('profile-img');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

</head>
<body>
<div class="container">
    <div class="row">
        <div class="profile-nav col-md-3">
            <div class="panel">
                <div class="user-heading round">
                    
                <img id="profile-img" src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="" onclick="triggerFileInput()">
                    <div class="edit-icon" onclick="triggerFileInput()">
                        <i class="fas fa-pencil-alt"></i>
                    </div>
                    <input type="file" id="file-input" accept="image/*" onchange="previewImage(event)">
                    <h1>Moch Alfan Miftachul Huda</h1>
                    <p>deydey@theEmail.com</p>
                </div>
                
            </div>
        </div>
        <div class="profile-info col-md-9">
            <div class="panel">
                
                <div class="panel-body bio-graph-info">
                    <h1>Edit Profile</h1>
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" value="JohnDoe">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">NIK</label>
                            <input type="text" class="form-control" value="1234567890">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" value="johndoe@email.com">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control" value="John Doe">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <input type="text" class="form-control" value="Jl. Merdeka No. 10, Jakarta">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Pendidikan Terakhir</label>
                            <input type="text" class="form-control" value="S1 Teknik Informatika">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Keahlian</label>
                            <input type="text" class="form-control" value="Web Development, Data Science">
                        </div>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
<?= $this->include('layouts/footer') ?>
