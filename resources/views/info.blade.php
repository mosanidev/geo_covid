<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pencegahan Covid</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

    <div class="card">
        <div class="card-header">
          <p class="h3 text-center p-3">Inilah Cara Pencegahan COVID-19</p>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-center">
                {{-- <img class="d-inline-block" src="https://d1bpj0tv6vfxyp.cloudfront.net/articles/83939_2-3-2021_11-20-13.webp" style="height: 430px"> --}}

                <p class="text-justify w-50">
                    Halodoc, Jakarta - Sudah setahun lebih sejak kasus pertama dari COVID-19 tercatat di Indonesia. Total kasus dari penyakit yang disebabkan oleh virus corona ini sudah lebih dari satu juta dengan jumlah yang meninggal sebanyak 35 ribu orang. Dengan tingginya angka sebaran yang ada, tentu setiap orang harus berusaha yang terbaik untuk mencegah tidak terjangkit COVID-19. Untuk mengetahui cara yang efektif, baca di sini!
                    <br><br>
                    <b>Cara Ampuh untuk Cegah COVID-19</b><br><br>
                    Ada banyak bukti yang menunjukkan jika SARS-CoV-2, atau COVID-19, dapat menular dengan mudah ke banyak orang. Penyakit ini menyebabkan penyakit yang dapat mengancam nyawa saat menyerang beberapa orang. Selain itu, virus corona juga dapat bertahan beberapa saat di udara dan lebih lama lagi, ketika menempel di permukaan suatu benda. Risiko untuk terpapar lebih tinggi saat menyentuh benda tersebut, setelah itu menyentuh mulut, hidung, atau mata. 
                    <br><br>
                    Diketahui juga jika virus corona berkembang biak lebih cepat di dalam tubuh, meskipun tidak menimbulkan gejala apa pun. Potensi untuk menularkan banyak orang karena merasa diri sehat lebih tinggi dibandingkan seseorang dengan gejala. Maka dari itu, penting untuk mengetahui cara yang paling tepat sebagai pencegahan dari COVID-19. 5M adalah metode gagasan pemerintah untuk menekan kenaikan angka dari COVID-19, antara lain:
                    <br><br>
                    <b>1. Menggunakan Masker</b><br>
                    Cara pencegahan COVID-19 yang paling efektif untuk dilakukan adalah dengan menggunakan masker. Alat ini harus digunakan terutama saat berada di tempat umum atau berinteraksi dengan orang lain. Penutupan pada mulut dan hidung ampuh untuk menurunkan risiko penyebaran virus corona dengan memblokir tetesan air liur, agar tidak masuk ke tubuh. Sebaran dari udara juga dapat terjadi, sehingga perlu digunakan saat kamu berada di dalam ruangan, terutama yang ber-AC.
                    <br><br>
                    <b>2. Mencuci Tangan secara Rutin</b><br>
                    Kamu juga dapat mencegah risiko terserang COVID-19 dengan mencuci tangan secara rutin. Cobalah untuk lebih sering mencuci tangan dengan sabun dan air selama 20 detik setelah melakukan beberapa aktivitas, seperti menyentuh suatu benda, memegang bagian depan masker, hingga menyentuh hewan. Kamu juga perlu mencuci tangan sebelum makan dan juga menyentuh wajah. Jika air dan sabun tidak memungkinkan, gunakan hand sanitizer dengan kandungan minimal 60 persen alkohol.
                    <br><br>
                    <b>3. Menjaga Jarak</b><br>
                    5M lainnya yang harus dilakukan untuk pencegahan COVID-19, yaitu menjaga jarak. Saat berada di luar rumah, pastikan untuk menjauhkan diri sekitar 1–2 meter. Pastikan untuk selalu ingat jika beberapa orang tidak memiliki gejala, meski telah terserang virus corona. Selain itu, hindari juga ruangan tertutup dan lebih banyak aktivitas di ruangan terbuka yang menyediakan udara segar.
                    <br><br>
                    <b>4. Menjauhi Kerumunan</b><br>
                    Saat berada di keramaian atau kerumunan, risiko untuk tertular COVID-19 menjadi lebih tinggi. Jika ingin melakukan interaksi dengan beberapa orang, pastikan berada di luar ruangan, menggunakan masker, dan tidak lebih dari 5 orang. Intensitas dan jumlah orang sangat berpengaruh terhadap tingkat risiko yang dapat terjadi.
                    <br><br>
                    <b>5. Mengurangi Mobilitas</b><br>
                    Setiap orang harus benar-benar menanamkan pemahaman jika keperluannya tidak terlalu mendesak, ada baiknya untuk tetap di rumah. Meskipun merasa sehat, belum tentu saat berada di rumah tetap dalam keadaan yang sama atau menyebarkan virusnya pada keluarga di rumah. Tingkatkan perhatian terlebih lagi jika terdapat orang tua atau anak-anak di rumah yang masih rentan terhadap COVID-19.
                </p>
            </div>
        </div>
      </div>

      <div class="row form-group col-md-8 mx-auto">
          
        <div class="col-md-6 mt-3 mb-5 mx-auto">
            <form action="{{ route('insert_komen') }}" method="post">
            @csrf
              <div class="form-group">
                <label><b>Nama</b></label>
                <input type="text" class="form-control mb-2" placeholder="Enter Name" name="nama">
                <label><b>Email</b></label>
                <input type="email" class="form-control mb-2" placeholder="Enter Email" name="email">
                <label><b>Komentar</b></label>
                <textarea class="form-control" rows="3" name="isi"></textarea>
              </div>
              <input type="submit" class="btn btn-block w-25 btn-primary mx-auto" href="#" value="Submit">
            </form>
        </div>

        <div class="col-md-12">
            @foreach ($arr_komentar as $komen)
              <div class="card mx-auto w-75 my-3" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">{{$komen->nama}}</h5>
                  <h6 class="card-subtitle mb-2 text-muted">{{$komen->email}}</h6>
                  <p class="card-text">{{$komen->isi}}</p>
                  <a href="#" class="card-link">{{$komen->waktu}}</a>
                </div>
              </div>                  
            @endforeach
          <span>
        </div>

      </div>
</body>
</html>