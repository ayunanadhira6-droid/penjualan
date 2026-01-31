<?php
include 'header.php';
?>

<div class="container">
    <br><br><br>
    <div class ="col-md-5 col-md-offset-3">
        <div class="panel">
             <div class="panel-heading">
                <h4>EDIT User </h4>
                </div>
            <div class="panel-body">

                        <?php
                        include '../koneksi.php';
                        $id = $_GET['id'];
                        $data = mysqli_query($koneksi,"select * from user where user_id='$id'");
                         while($d=mysqli_fetch_array($data)){
                            ?>
                            
                    <form method="POST" action="user_update.php">
                    <div class="form-group">
                        <input type="hidden" name="user_id" value=" <?php echo $d['user_id'];?>">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Masukkan Username"  value="<?php echo $d['username'];?>">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Masukan password" value="<?php echo $d['password'];?>">
                    </div>
                    <div class="form-group">
                        <label>User_nama</label>
                        <input type="text" name="user_nama" class="form-control" placeholder="Masukan Nama" value="<?php echo $d['user_nama'];?>">
                    </div>
                    <div class="form-group">
                        <label>User Status</label>
                        <select name="user_status" class="form-control">
                             <option value="1" <?php if($d['user_status'] == "1"){ echo "selected"; } ?>>Admin</option>
                             <option value="2" <?php if($d['user_status'] == "2"){ echo "selected"; } ?>>User</option>
                        </select>
                    </div>
                   <br>
                    <input type="submit" class="btn btn-primary" value="Simpan"></input>
                </form>
                    <?php
                    }
                    ?>
            </div>
        </div>
    </div>
</div>
