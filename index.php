<?php
    // WARNING!!!

    // ini adalah karya pertama saya yang dikerjakan hanya dalam waktu satu hari

    // untuk database karna saya membuatnya dengan bantuan phpMyAdmin, jadi database hanya ada di local storage

    // untuk itu dimohon untuk membuat database dengan mengisi variabel dan query berikut :
    
    // $host = "";
    // $username = "";
    // $password= "";
    // $conn = new mysqli($host, $username, $password);
        // Create database
    // $sql = "CREATE DATABASE covid";
    // mysqli_query($conn, $sql); 
        // create table
    // $conn = mysqli_connect($servername, $username, $password, $dbname);
    // $sql = "CREATE TABLE MyGuests (
    // id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    // nama VARCHAR(30) NOT NULL,
    // no_id VARCHAR(30) NOT NULL,
    // no_wa VARCHAR(50),
    // alamat VARCHAR(255),
    // jenis_vaksin VARCHAR(50)
    // )";
    // mysqli_query($conn, $sql);



    // read
    include("db.php");
    $result =  mysqli_query( $con, 'SELECT * FROM data_calon' );

    $data = [];
    while( $datum = mysqli_fetch_assoc($result) ){
            $data [] = $datum;
    };





    // create 
    if ( isset( $_POST["submit"] ) ){

        include("db.php");

        $nama = htmlspecialchars($_POST["nama"]);
        $no_id = htmlspecialchars($_POST["no_id"]);
        $no_wa = htmlspecialchars($_POST["no_wa"]);
        $alamat = htmlspecialchars($_POST["alamat"]);
        $jenis_vaksin = htmlspecialchars($_POST["jenis_vaksin"]);

        $query = "INSERT INTO data_calon VALUES( '', '$nama', '$no_id', '$no_wa', '$alamat', '$jenis_vaksin' ) ";

        if( mysqli_query( $con, $query ) ){
            echo "<script> alert('anda berhasil mendaftar!'); window.location.href = 'index.php'; </script>";
        } else {
            echo "<script> alert('gagal') </script>";
        }
    }

    // delete
    if( isset( $_GET["id"] ) ){

        include("db.php");
        $deleteId = $_GET["id"];

        if(mysqli_query( $con, "DELETE FROM data_calon WHERE no_id = $deleteId" )){
            echo "<script>alert('Hapus data sukses!'); window.location.href = 'index.php';</script>";
        } else {
            echo "<script>alert('Hapus data gagal!')</script>";
        }


    }

    

?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="main.css">
        <link href="http://fonts.cdnfonts.com/css/heavitas" rel="stylesheet">
        <link href="http://fonts.cdnfonts.com/css/evogria" rel="stylesheet">
        <link href="http://fonts.cdnfonts.com/css/gill-sans-mt" rel="stylesheet">
        <link href="http://fonts.cdnfonts.com/css/agency-fb" rel="stylesheet">
                
        <title>yogvid</title>
    </head>
    <body>

        <!-- menu navigasi -->
        <nav>
            <div class="container pt-4">
                <div class="row">
                    <div class="col-5">
                        <h1>Y<span>ogvid</span></h1>
                    </div>
                    <div class="col-7 d-flex flex-row justify-content-between ">
                        <div class="data d-flex justify-content-center align-items-center" id="data-covid"> <h2>Data Covid</h2> </div>
                        <div class="rs d-flex justify-content-center align-items-center" id="data-rs"> <h2>Data Rumah Sakit</h2> </div>
                        <div class="vaksin d-flex justify-content-center align-items-center" id="data-vaksin"> <h2>Daftar Vaksin</h2> </div>
                    </div>
                </div>
            </div>
        </nav>
        <!-- akhir menu navigasi -->

        <!-- hero section -->
        <section class="hero">
            <div class="container text-center">
                <h1>Data Covid-19, rumah sakit, dan vaksin
                    DI.Yogyakarta
                </h1>
            </div>
        </section>
        <!-- akhir hero section -->
        
        <!-- content : data covid -->
        <section class="data-covid">
            <div class="container">
                <div class="inner-content">
                    <div class="inner-container">
                        
                        <!--judul  -->
                        <div class="row">
                            <div class="col text-center data-h1">
                                <h1>Data Covid-19 DI.Yogyakarta</h1>
                            </div>
                        </div>
                        <!-- akhir judul -->

                        <!-- isi -->
                        <div class="row pt-4">
                            <div class="col">
                                <div class="row">

                                    <!-- jumlah kasus -->
                                    <div class="col-6 d-flex justify-content-center p-4">
                                        <div class="jumlah-kasus">
                                            <div class="row">
                                                <div class="col py-2 px-5 text-center">
                                                    <h4>jumlah kasus</h5>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col pt-2 d-flex justify-content-center align-items-center" >
                                                    <h1 class="text-danger">
                                                        <span class="text-body" id="kasus">
                                                            <!-- --------- -->
                                                            <!-- api here -->
                                                            <!-- ---------- -->
                                                        </span>
                                                        kasus
                                                    </h1>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- akhir jumlah kasus -->

                                    <!-- jumlah sembuh -->
                                    <div class="col-6 d-flex justify-content-center p-4">
                                        <div class="jumlah-sembuh">
                                            <div class="row">
                                                    <div class="col py-2 px-5 text-center">
                                                        <h4>jumlah sembuh</h5>
                                                    </div>
                                            </div>
                                            <div class="row">
                                                    <div class="col pt-2 d-flex justify-content-center align-items-center" >
                                                        <h1 class="text-danger">
                                                            <span class="text-body" id="sembuh">
                                                                <!-- --------- -->
                                                                <!-- api here -->
                                                                <!-- ---------- -->
                                                            </span>
                                                            kasus
                                                        </h1>
                                                        
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- akhir jumlah sembuh -->
                                </div>
                                    
                                <div class="row">
                                        <!-- jumlah meninggal -->
                                        <div class="col-6 d-flex justify-content-center p-4">
                                            <div class="jumlah-meninggal">
                                                <div class="row">
                                                        <div class="col py-2 px-5 text-center">
                                                            <h4>jumlah meninggal</h5>
                                                        </div>
                                                </div>
                                                <div class="row">
                                                        <div class="col pt-2 d-flex justify-content-center align-items-center" >
                                                            <h1 class="text-warning">
                                                                <span class="text-light" id="meninggal">
                                                                    <!-- --------- -->
                                                                    <!-- api here -->
                                                                    <!-- ---------- -->
                                                                </span>
                                                                kasus
                                                            </h1>
                                                            
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- akhir humlah meninggal -->

                                        <!-- jumlah dirawat -->
                                        <div class="col-6 d-flex justify-content-center p-4">
                                            <div class="jumlah-dirawat">
                                                <div class="row">
                                                        <div class="col py-2 px-5 text-center">
                                                            <h4>jumlah dirawat</h5>
                                                        </div>
                                                </div>
                                                <div class="row">
                                                        <div class="col pt-2 d-flex justify-content-center align-items-center" >
                                                            <h1 class="text-body">
                                                                <span class="text-light" id="dirawat">
                                                                    <!-- --------- -->
                                                                    <!-- api here -->
                                                                    <!-- ---------- -->
                                                                </span>
                                                                kasus
                                                            </h1>
                                                            
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- akhir jumlah dirawat -->

                                </div>
                            </div>
                        </div>
                        <!-- akhir isi -->

                    </div>
                </div>
            </div>
        </section>
        <!-- akhir content : data covid -->

        <!-- content : daftar rs -->
        <section class="data-rs">
            <div class="container">
                <div class="inner-content">
                    <div class="inner-container">

                        <!--judul  -->
                        <div class="row">
                            <div class="col text-center data-h1">
                                <h1>Data rumah sakit rujukan DI.Yogyakarta</h1>
                            </div>
                        </div>
                        <!-- akhir judul -->

                        <!-- tabel rs -->
                        <div class="row pt-5">
                            <div class="col">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Nama Rumah Sakit</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">No. Telp</th>
                                        </tr>
                                    </thead>
                                    <tbody id="rs">
                                        <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                        </tr>
                                        <!-- ------- -->
                                        <!-- api here -->
                                        <!-- ------- -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- akhir tabel rs -->
                    </div>
                </div>
            </div>
        </section>
        <!-- akhir content : daftar rs -->

        <!-- content : daftar vaksin -->
        <section class="daftar-vaksin">
            <div class="container">
                <div class="inner-content">
                    <div class="inner-container">

                        <!--judul  -->
                        <div class="row">
                            <div class="col text-center data-h1">
                                <h1>Daftar Vaksin Pertama</h1>
                            </div>
                        </div>
                        <!-- akhir judul -->

                        <!-- form daftar -->
                        <div class="row">
                            <div class="col-6">
                                <form action="#" method="POST">
                                    <div class="input-group">
                                        <input class="input" type="text" id="name" name="nama" autocomplete="off" required />
                                        <label data-css="label" for="name"><span>Nama Lengkap</span></label>
                                    </div>
                                    <div class="input-group">
                                        <input class="input" type="number" id="name" name="no_id" autocomplete="off" required />
                                        <label data-css="label" for="name"><span>No. Identitas</span></label>
                                    </div>
                                    <div class="input-group">
                                        <input class="input" type="number" id="name" name="no_wa" autocomplete="off" required />
                                        <label data-css="label" for="name"><span>No. WA</span></label>
                                    </div>
                                    <div class="input-group">
                                        <input class="input" type="text" id="name" name="alamat" autocomplete="off" required />
                                        <label data-css="label" for="name"><span>Alamat</span></label>
                                    </div>

                                    <div class="pt-3">
                                    <label><span>Jenis Vaksin</span></label>
                                    <select class="form-control form-control-sm" name="jenis_vaksin">
                                        <option value="sinovac">Sinovac</option>
                                        <option value="astra-zeneca">Astra Zeneca</option>
                                        <option value="Pfizer">Pfizer</option>
                                    </select>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-primary">Daftar</button>
                                </form>

                                <!-- nb -->
                                <div class="nb mt-4 d-flex justify-content-center align-items-center text-center p-3"  >
                                    <p>Setelah mendapat persetujuan pihak rumah sakit
                                    kami akan segera menghubungi anda untuk memperoleh
                                    jadwal vaksin.
                                    </p>
                                </div>
                                <!-- akhir nb -->
                            </div>

                            <div class="col-6 persyaratan mt-4">
                                <div class="container">
                                    <div class="row">
                                        <div class="col text-center">
                                            <h4>Persyaratan</h4>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col">
                                            <p>1. Vaksin hanya diperuntukan rentang usia 18-60 th;</p>
                                            <p>2. Tekanan darah harus di bawah 180/110 mmHg;</p>
                                            <p>3. Jika sedang mendapat terapi kanker, maka diwajibkan
                                                untuk membawa surat keterangan layak divaksinasi dari
                                                dokter yang merawat;
                                            </p>
                                            <p>4. para pengidap penyakit kronik, seperti PPOK, asthma,
                                                penyakit jantung, penyakit gangguan ginjal, penyakit hati
                                                yang sedang dalam kondisi akut atau belum terkendali,
                                                vaksinasi ditunda dan tidak bisa diberikan;
                                            </p>
                                            <p>5. Vaksinasi hanya untuk orang yang belum pernah
                                                mendapat vaksin.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- akhir form daftar -->

                    </div>
                </div>
            </div>
        </section>
        <!-- akhir content : daftar vaksin -->

        <!-- content : daftar peserta vaksin -->
        <section class="data-orang">
            <div class="container">
                <div class="inner-content">
                    <div class="inner-container">
                        <!--judul  -->
                        <div class="row">
                            <div class="col text-center data-h1">
                                <h1>Daftar peserta vaksin</h1>
                            </div>
                        </div>
                        <!-- akhir judul -->

                        <!-- tabel rs -->
                        <div class="row pt-5">
                            <div class="col">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Nama Peserta</th>
                                        <th scope="col">Alamat Peserta</th>
                                        <th scope="col">Ajukan batal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $count = 0; foreach( $data as $datum ) : ?>
                                        <tr>
                                        <th scope="row"><?= ++$count; ?></th>
                                        <td><?= $datum["nama"]; ?></td>
                                        <td><?= $datum["alamat"]; ?></td>
                                        <td> 
                                            <form action="#" method="get">
                                                <input type="hidden" name="id" value="<?= $datum['no_id'] ?>">
                                                <button type="submit" class="btn btn-danger">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                    </svg>
                                                </button>
                                            </form>
                                        </td>
                                        </tr>
                                        <!-- ------- -->
                                        <!-- api here -->
                                        <!-- ------- -->
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- akhir tabel rs -->
                    </div>
                </div>
            </div>
        </section>
        <!-- akhir content : daftar peserta vaksin -->


        <!-- footer -->
        <footer class="d-flex justify-content-center align-items-center text-center" >
            <div class="container ">
                <h6>&copy; Copyright 2021-2021 | by Mukhamad Khusaini. All right reserved.</h6>
            </div>
        </footer>
        <!-- akhir footer -->


        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script >
            // target scrolling
            const data_covid = document.querySelector("#data-covid").addEventListener("click", () => document.documentElement.scrollTop = 700); 
            const data_rs = document.querySelector("#data-rs").addEventListener("click", () => document.documentElement.scrollTop = 1700); 
            const data_vaksin = document.querySelector("#data-vaksin").addEventListener("click", () => document.documentElement.scrollTop = 2750); 

                                            console.log(window.pageYOffset);
                                            

            // request data covid
            const xhr = new XMLHttpRequest();
            xhr.open("get", "https://indonesia-covid-19.mathdro.id/api/provinsi/");
            xhr.send();

            xhr.onload = () => {
                if (xhr.status == 200) {
                    let temp = JSON.parse(xhr.responseText);
                    let data = temp.data[9];

                    document.querySelector("#kasus").innerHTML = data["kasusPosi"];
                    document.querySelector("#sembuh").innerHTML = data["kasusSemb"];
                    document.querySelector("#meninggal").innerHTML = data["kasusMeni"];
                } else {
                    alert("gagal merequest ke data.covid19");
                }
            };


            // request data sedang dirawat
            const xhr2 = new XMLHttpRequest();
            xhr2.open("get", "https://apicovid19indonesia-v2.vercel.app/api/indonesia/provinsi");
            xhr2.send();

            xhr2.onload = () => {
                if (xhr2.status == 200) {
                    let temp = JSON.parse(xhr2.responseText);
                    let data = temp[5];

                    document.querySelector("#dirawat").innerHTML = data["dirawat"];
                    
                } else {
                    alert("gagal merequest ke data.covid19");
                }
            };
            
            // request data rumah sakit. 
            // maaf saya menggunakan extension tambahan untuk allow CORS
            const xhr3 = new XMLHttpRequest();
            xhr3.open("get", "https://dekontaminasi.com/api/id/covid19/hospitals");
            xhr3.send();

            xhr3.onload = () => {
                if (xhr3.status == 200) {
                    let temp = JSON.parse(xhr3.responseText);
                    let rs = [temp[11], temp[12], temp[13], temp[14]];
                    let append = "";
                    for ( let i = 0; i < rs.length; i++ ){
                        append += injecHTML( i+1, rs[i].name, rs[i].address, rs[i].phone );
                    }
                    
                    document.querySelector("#rs").innerHTML = append;
                    
                } else {
                    alert("gagal merequest ke data.covid19");
                }
            }

            function injecHTML( no, nama, alamat, noTelp ){
                return `
                                        <tr>
                                            <th scope="row">${no}</th>
                                            <td>${nama}</td>
                                            <td>${alamat}</td>
                                            <td>${noTelp}</td>
                                        </tr>
                `;
            }
        </script>
    </body>
</html>