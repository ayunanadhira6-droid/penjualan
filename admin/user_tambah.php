<?php
include 'header.php';
?>

<div class="container">
    <br><br><br>
    <div class ="col-md-5 col-md-offset-3">
        <div class="panel">
             <div class="panel-heading">
                <h4>Tambah User Baru</h4>
                </div>
            <div class="panel-body">
                <form method="POST" action="user_aksi.php">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Masukkan Username">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Masukan Password">
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="user_nama" class="form-control" placeholder="Masukan Nama">
                    </div>
                    <div class="form-group">
                         <label>User Status</label>
                         <select name="user_status" class="form-control">
                             <option value="1">Admin</option>
                             <option value="2">User</option>
                         </select>
                    </div>
                    <br>
                    <input type="submit" class="btn btn-primary" value="Simpan"></input>
                </form>
            </div>
        </div>
    </div>
</div>
