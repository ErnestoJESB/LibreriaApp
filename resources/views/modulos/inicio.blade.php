<link rel="stylesheet" href="http://localhost/LibreriaAppM/resources/css/app.css">

@extends('plantilla')

@section('contenido')
<div class="content-wrapper" style="background-color:#0000">
    <section class="content">
        <div class="box">
            <div class="box-body">
              <div class="centrar">
                 <!-- home section starts  -->
                 <section class="home" id="home">
                    <div class="contenido">
                        <span>Bienvenidos a M WOLD ADIMNINISTRADORES</span>
                        <h3>Administradores de Condominios</h3>
                        <p>Proporcionamos ideas prácticas y objetivas, que nos convierte en la
                            mejor opción dentro del sector de administración de condominios del sureste
                            mexicano.</p>
                        <a href="#popular" class="button">Conócenos</a>
                    </div>

                    <div class="image">
                        <img src="http://localhost/LibreriaAppM/storage/app/public/img/edificio.png" alt="" class="home-img">
                    </div>
                </section>

                <!-- home section ends  -->

                  <!-- category section starts  -->
                  <section class="category">
                    <a href="#" class="box">
                        <img src="http://localhost/LibreriaAppM/storage/app/public/img/manos.png" alt="">
                        <h3>Administradores de condominios</h3>
                    </a>

                    <a href="#" class="box">
                        <img src="http://localhost/LibreriaAppM/storage/app/public/img/alberca.png" alt="">
                        <h3>Real Estate</h3>
                    </a>

                    <a href="#" class="box">
                        <img src="http://localhost/LibreriaAppM/storage/app/public/img/asesoría.png" alt="">
                        <h3>Asesoría</h3>
                    </a>
                  </section>

                  <!-- category section ends -->
              </div>
            </div>
        </div>
    </section>
</div>
@endsection