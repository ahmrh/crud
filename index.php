<?php 
    $vnama = $vid = $vkota = "";
    $conn = mysqli_connect("localhost", "root", "", "crud");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    if(isset($_POST['submit'])){
        $action = isset($_GET['action']) ? $_GET['action'] : '';
        if($action == 'edit'){
            $sql = "UPDATE pengunjung SET nama = '$_POST[nama]', kota = '$_POST[kota]' WHERE id = '$_GET[id]'";
            if ($conn->query($sql) === TRUE) {
                echo "<script>
                            alert('Data Telah Terupdate');
                            document.location='index.php';
                         </script>";
            }
            else{
                echo "<script>
                            alert('Operasi Gagal');
                            document.location='index.php';
                         </script>";
            }
        }

        else{
            $sql = "INSERT INTO pengunjung (id, nama, kota)
                VALUES ('$_POST[id]', '$_POST[nama]', '$_POST[kota]')";

            if ($conn->query($sql) === TRUE) {
                echo "<script> alert('Data berhasil disimpan'); </script>";
            } else {
                $sql = "CREATE TABLE pengunjung (
                        id VARCHAR(10) NOT NULL PRIMARY KEY,
                        nama VARCHAR(30) NOT NULL,
                        kota VARCHAR(50),
                        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                        )";
                if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Table Pengunjung created successfully'); </script>";
                $sql = "INSERT INTO pengunjung (id, nama, kota)
                        VALUES ('$_POST[id]', '$_POST[nama]', '$_POST[kota]')";
                    if ($conn->query($sql) === TRUE) {
                        echo "<script> alert('Data berhasil disimpan'); </script>";
                    }
                } 
            } 
        }
        
    }
    
    else if(isset($_GET['action'])){
        if($_GET['action'] == 'delete'){
            $sql = "DELETE FROM pengunjung WHERE id = '$_GET[id]'";
            if ($conn->query($sql) === TRUE) {
                echo "<script>
                        alert('Data Telah Terhapus');
                        document.location='index.php';
                      </script>";
            }
            else{
                echo "<script>
                        alert('Operasi Gagal');
                        document.location='index.php';
                      </script>";
            }
        }
        else if($_GET['action'] == 'edit'){
            $tampil = mysqli_query($conn, "SELECT * FROM pengunjung WHERE id = '$_GET[id]' ");
            $data = mysqli_fetch_array($tampil);
            if ($data) {
                $vid= $data['id'];
                $vnama = $data['nama'];
                $vkota = $data['kota'];
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body{
            font-family: Helvetica;
            font-weight: normal;
            background-color: #3b3a3a;
        }
        .container{
            margin: auto;
            background-color: white;
        }
        h1,h2{
            text-align: center;
        }
        .title{
            font-size : 40px;
            font-family : Work-Sans, sans-serif;
            font-weight : bold;
        }
        thead{
            font-size : 20px;
            
        }
        .border{
            padding : 10px;
        }
    </style>

</head>
<body>

    <!-- data pengunjung -->
    <div class="container">

        <div class="border rounded" style="padding : 10px; margin-bottom : 10px;">
            <h1 class="title" > DATA PENGUNJUNG </h1> 
        </div>
        <div class="border rounded" style="padding : 30px;">
            <p style="background-color: #53BB04; color: white; padding: 15px; font-size: 20px;">FORM INPUT DATA PENGUNJUNG</p>

            <form class="needs-validation" method="post" name="input" novalidate>
                <div class="mb-3">
                    <label for="id" class="form-label">Nomor ID</label>
                    <input type="text" class="form-control" name="id" value = "<?php echo $vid; ?>" required>
                </div>    
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama" value = "<?php echo $vnama; ?>"  required>
                    
                </div>
                <div class="mb-3">
                    <label for="kota" class="form-label">Kota</label>
                    <input type="text" class="form-control" name="kota" value = "<?php echo $vkota; ?>" required>
                </div>
                <div class="text-right">
                    <br>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    <button type="reset" class="btn btn-danger" name="reset">Reset</button>
                </div>
            </form>
            
        </div>
        
    </div>
    
    <!-- crud database -->
    <div class="container" style="padding-top: 40px;" >
        
        <div class="border rounded" style="padding : 30px;">
            <?php
                $query = "SELECT * FROM pengunjung";
                $query_run = mysqli_query($conn, $query);
            ?>
            <table class="table table-light table-striped">
                
                <?php
                    if($query_run){
                ?>
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">Nomor ID</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Kota</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <?php
                        while($row = mysqli_fetch_array($query_run)){
                ?>
                <tbody>
                    <td><span id="id"> <?php echo $row['id']; ?> </span> </td>
                    <td><span id="nama"> <?php echo $row['nama'];?> </span> </td>
                    <td><span id="kota"> <?php echo $row['kota']; ?></span> </td>
                    <td> 
                        <a href="index.php?action=edit&id=<?php echo $row['id'] ?>" class="btn btn-success edit"> Edit </button> 
                        <a href="index.php?action=delete&id=<?php echo $row['id'] ?>" onclick="return confirm('Apakah yakin ingin menghapus data ini?')" class="btn btn-danger tombol"> Delete </a>
                     </td>
                </tbody>

                <?php   
                                   
                        }
                    }
                ?>
            </table>
        </div>
    </div>

    <!-- script -->
    <script>
        (function () {
            'use strict'
            var forms = document.querySelectorAll('.needs-validation')
        
            Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }
        
                form.classList.add('was-validated')
                }, false)
            })
        })()


    </script>
    
</body>
</html>