@extends('layouts.app')
<link rel="icon" href="{{asset('images/LOGO_SAMS.png') }}"/>
<link rel="stylesheet" href="{{ asset('css/custom.css') }}">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<style>

* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

#section-1{
    display: flex;
    justify-content: space-between;
    margin: 80px auto;
    width: 90%;
    height: 70vh;
    background-color: #FEEA77;
    border-radius: 50px;
    align-content: center;
}

.teks-kiri{
    margin-left: 50px;
    margin-top: 50px;
}

.teks-kiri h1{
    font-family: 'poppins', sans-serif;
    font-size: 70px;
}

.teks-kiri p{
    font-family: 'poppins', sans-serif;
    font-weight: 400;
    font-size: 20px;
}

.teks-kiri button{
    font-family: 'poppins', sans-serif;
    font-weight: 700;
    font-size: 15px;
    margin-top: 30px;
    cursor: pointer;
    border-radius: 50px;
    border: none;
    width: 200px;
    height: 50px;
    color: #fff;
    background-color: #FD785B;
    transition: .5s;
    box-shadow: 0 2px 5px 0 rgb(82, 80, 80);
}

.teks-kiri button:hover{
    background-color: #be3f23;
}


#section-2 {
    margin: 200px 100px;
    height: 100vh;
}

.header-menu{
    font-family: 'poppins', sans-serif;
    font-weight: 700;
    font-size: 25px;
    text-align: center;
}

.gambar-card{
    margin-top: 50px;
    display: flex;
    flex-wrap: wrap;
    grid-auto-flow: column;
    gap: 30px;
    justify-content: center;
}
.isi-gambar{
    position: relative;
    margin: auto;

}
.isi-gambar img{
    height: 350px;
    border-radius: 20px;
    box-shadow: 0 5px 5px 2px rgb(167, 166, 166);
    transition: .5s;
    transform: scale(1);
}

.isi-gambar:hover img {
    transform: scale(1.1);
    border-radius: 20px;
    box-shadow: 0 5px 5px 2px rgb(167, 166, 166);
}

#section-3{
    margin-top: 450px;
    width: 100%;
    height: 100vh;
    background-color: #FD785B;
    display: flex;
    justify-content: space-between;
    padding: 20px 50px;
    align-items: center;
}



.gambar-kiri img{
    width: 600px;
}

.teks-kanan h1{
    font-family: 'poppins', sans-serif;
    font-size: 50px;
    color: #fff;
}

.teks-kanan p{
    font-family: 'poppins', sans-serif;
    font-size: 20px;
    color: #fff;
}

.teks-kanan button{
    margin-top: 20px;
    font-family: 'poppins', sans-serif;
    font-weight: 700;
    font-size: 15px;
    color: #FD785B;
    width: 200px;
    height: 60px;
    border-radius: 20px;
    border: none;
    cursor: pointer;
    transition: .5s;
    box-shadow: 0 2px 5px 0 #8d2d18;
}



.teks-kanan button:hover{
    background-color: #c2300f;
    color: #fff;
}


#konten-3{
    position: absolute;
    top: 2530px;
    left: 50%;
    transform: translate(-50%, -50%);
}

.card{
    align-items: center;
    text-align: center;
    width: 500px;
    height: 200px;
    background-color: #fff;
    box-shadow: 0 2px 15px 0 rgb(82, 80, 80);
    border-radius: 20px;
    padding: 50px;
}

.card h1 {
    font-size: 20px;
    font-weight: 600;
    font-family: 'Poppins', sans-serif;
}

.card button{
    margin-top: 20px;
    width: 300px;
    height: 40px;
    border-radius: 20px;
    background-color:  #FD785B;
    box-shadow: 0 2px 5px 0 hsl(322, 35%, 31%);
    border: none;
    font-family: 'Open Sans', sans-serif;
    font-weight: 700;
    cursor: pointer;
    color: #fff;
    transition: .5s;
}

.card button:hover{
    background-color: hsl(322, 91%, 49%);
    box-shadow: 0 2px 5px 0 hsl(323, 40%, 54%);
}


footer{
    padding-top: 200px;
    padding-left: 125px;
    padding-right: 125px;
    width: 100%;
    height: 700px;
    background-color: hsl(192, 100%, 9%);
    color: #fff;
    bottom: o;
    position: inherit;
}

.footer-grid{
    display: grid;
    grid-auto-flow: column;
    gap: 40px;
}

.footer-1 img{
    height: 150px;
}




.teks-icon{
    margin: 20px;
    display: flex;
    gap: 20px;
}

.teks-icon p{
    font-family: 'open sans', sans-serif;
}

.footer-2, .footer-3 {
    display: flex;
    flex-direction: column;
    gap: 20px;
    font-family: 'open sans', sans-serif;
}

.footer-4{
    display: flex;
    gap: 10px;
}




.copyright{
    position: absolute;
    margin-top: 70px;
    justify-content: flex-end;
    right: 220px;
}


.bi {
    cursor: pointer;
    transition: .5s;
}

.bi:hover{
    color: hsl(322, 100%, 66%);
}

.footer-2 a, .footer-3 a{
    text-decoration: none;
    color: #fff;
    font-family: 'Open Sans', sans-serif;
    transition: .5s;
}

.footer-2 a:hover, .footer-3 a:hover{
    color: hsl(322, 100%, 66%);
}

</style>


<section id="section-1">
    <div class="teks-kiri">
        <h1>Fresh & <br> tasty foods</h1>
        <p>Relax please, we've got you <br> covered every day of the week</p>
        <button>Discover Menu</button>
    </div>
    <div class="gambar-kanan">
        <img src="images/makanan-02.png" alt="">
    </div>
</section>

<section id="section-2">
    <div class="header-menu">
        <h1>Popular Menu</h1>
    </div>

    <div class="gambar-card">
        <div class="isi-gambar">
            <img src="images/makanan-01.jpg" alt="">
        </div>

        <div class="isi-gambar">
            <img src="images/makanan-02.jpg" alt="">
        </div>

        <div class="isi-gambar">
            <img src="images/makanan-03.jpg" alt="">
        </div>

        <div class="isi-gambar">
            <img src="images/makanan-04.jpg" alt="">
        </div>



        <div class="isi-gambar">
            <img src="images/minuman-01.jpg" alt="">
        </div>

        <div class="isi-gambar">
            <img src="images/minuman-02.jpg" alt="">
        </div>

        <div class="isi-gambar">
            <img src="images/minuman-04.jpg" alt="">
        </div>

        <div class="isi-gambar">
            <img src="images/minuman-05.jpg" alt="">
        </div>


    </div>
</section>

<section id="section-3">
        <div class="gambar-kiri">
            <img src="images/makanan-07.png" alt="">
        </div>
        <div class="teks-kanan">
            <h1>Make order now and get <br> 10% discount</h1>
            <p>We handpick a thoughtful lineup of trusted brands and <br>products. Then, we deliver groceries and recipes to <br>help you eat well and feel great every day.</p>
            <button>Make order</button>
        </div>
</section>


<section id="konten-3">
    <div class="card">
    <h1>Sign in to get more promotion!</h1>
    <button>Get Started For Free</button>
    </div>
</section>

    <footer>
    <div class="footer-grid">

    <div class="footer-1">
        <img src="images/footer.png" alt="">
        <div class="teks-icon">
        <i class="bi bi-geo-alt-fill"></i><p>Jl.Gedung hijau raya no.1 pertok THB 34, <br> Pondok Indah, Jakarta Selatan</p>
        </div>

        <div class="teks-icon">
        <i class="bi bi-telephone-fill"></i>
        <p>+1-543-123-4567</p>
        </div>

        <div class="teks-icon">
        <i class="bi bi-envelope-fill"></i>
        <p>SamsCorner@gmail.com</p>
        </div>

</div>

    <div class="footer-2">
    <a href="">About Us</a>
    <a href="">What We Do</a>
    <a href="">FAQ</a>
    </div>
    <div class="footer-3">
    <a href="">Career</a>
    <a href="">Blog</a>
    <a href="">Contact Us</a>
    </div>

    <div class="footer-4">
        <i class="bi bi-facebook"></i>
        <i class="bi bi-twitter"></i>
        <i class="bi bi-instagram"></i>
    </div>
    </div>
    </footer>


