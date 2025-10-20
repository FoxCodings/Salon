

@include('plantilla.header')
@include('plantilla.nav')
<style media="screen">
   .booking{
      position: relative;
      width: 100%;
      margin-bottom: 45px;
      background: rgba(0, 0, 0, .04);
   }
   h1#the_title {
    font-size: 2.5em;
    text-transform: uppercase;
    font-weight: 600;
    line-height: 45px;
    color: #0064a7;
}
.about {
    position: relative;
    width: 100%;
    padding: 45px 0;
}
.about .about-img {
    position: relative;
}
.about .btn-play {
    position: absolute;
    /* z-index: 1;
    top: 50%;
    left: 50%;
    transform: translateX(-50%) translateY(-50%);*/
    box-sizing: content-box;
    display: block;
    width: 32px;
    height: 44px;
    border-radius: 50%;
    border: none;
    outline: none;
    padding: 18px 20px 18px 28px;
}
.about .about-content {
    position: relative;
}
.about .section-header {
    margin-bottom: 30px;
    margin-left: 0;
}
.section-header {
    position: relative;
    margin-bottom: 45px;
}
.about .about-text p {
    font-size: 16px;
}
.wrap {
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
}

.button {
  /* min-width: 300px;
  min-height: 60px; */
  font-family: 'Nunito', sans-serif;
  font-size: 22px;
  text-transform: uppercase;
  letter-spacing: 1.3px;
  font-weight: 700;
  color: #313133;
  background: #4FD1C5;
  background: linear-gradient(90deg, rgba(129,230,217,1) 0%, rgba(79,209,197,1) 100%);
  border: none;
  border-radius: 1000px;
  box-shadow: 12px 12px 24px rgba(79,209,197,.64);
  transition: all 0.3s ease-in-out 0s;
  cursor: pointer;
  outline: none;
  position: relative;
  padding: 10px;


  }

.efectobtn::before {
  content: '';
  width: 30px; height: 30px;
  border-radius: 100%;
  border: 6px solid #00FFCB;
  position: absolute;
  z-index: -1;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  animation: ring 1.5s infinite;
}

.button:hover, .button:focus {
  color: #313133;
  transform: translateY(-6px);
}

.efectobtn:hover::before, .efectobtn:focus::before {
  opacity: 1;
}

.efectobtn::after {
  content: '';
  width: 30px; height: 30px;
  border-radius: 100%;
  border: 6px solid #00FFCB;
  position: absolute;
  z-index: -1;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  animation: ring 1.5s infinite;
}

.efectobtn:hover::after, .efectobtn:focus::after {
  animation: none;
  display: none;
}

@keyframes ring {
  0% {
    width: 30px;
    height: 30px;
    opacity: 1;
  }
  100% {
    width: 300px;
    height: 300px;
    opacity: 0;
  }
}

.videopromocional{
    position: relative;
    width: 80%;
    border-radius: 15px;
}
.personajestext{
    text-align: center;
    font-size: 20px;
    font-weight: bold;
    font-family: 'Roboto Condensed', 'Roboto Condensed';
}
.imgpers:hover{
    text-decoration: none;
    margin-top: -3px;
}
</style>
<div class="container"><br>
  <div class="a-header col-lg-12">
    <h1 class="a-title">Video promocional</h1>
  </div>
  <div class="col-lg-12  a-container">
    <div class="row">
      <div class="col-lg-6">
        <div class="a-img-position">
             <img src="/template/img/video_promocion.png" alt="Image" class="videopromocional">
             <button type="button" class="btn-play efectobtn button" data-toggle="modal" data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-target="#videoModal">
                <span class="glyphicon glyphicon-play" aria-hidden="true"></span>
             </button>
        </div>
      </div>
      <div class="col-lg-6">
        <p class="a-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id gravida condimentum, viverra quis sem.</p>
        <p class="a-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id gravida condimentum, viverra quis sem. Curabitur non nisl nec nisi scelerisque maximus. Aenean consectetur convallis porttitor. Aliquam interdum at lacus non blandit.</p>
      </div>
    </div>
  </div>
</div>
<div class="container"><br>
  <div class="a-header col-lg-12">
    <h1 class="a-title">Conoce a los Guardianes de la Tierra</h1>
  </div>
  <div class="col-lg-12  a-container">
    <div class="row">
      <div class="col-sm-6 col-md-3">
        <div class="thumbnail contenedor-gds" >
          <a href="#" class="imgpers">
            <img class="imagen-gds" src="/template/img/1-cambio-climatico.png" alt="Image" >
          </a>

          <div class="caption">
            <h3 class="personajestext">Cambio Climatico</h3>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="thumbnail">
          <img src="/template/img/2-peligro-de-extinción.png" alt="Image">
          <div class="caption">
            <h3 class="personajestext">Peligro de extinción</h3>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="thumbnail">
          <img src="/template/img/3-reciclaje.png" alt="Image">
          <div class="caption">
            <h3 class="personajestext">Reciclaje</h3>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="thumbnail">
          <img src="/template/img/4-reforestación.png" alt="Image">
          <div class="caption">
            <h3 class="personajestext">Reforestación</h3>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="jumbotron">
  <div class="container">
    <div class="section-header">
      <div class="col-lg-8">
        <h1 id="the_title">Bienvenido al Repositorio<br>Guardianes de la Tierra</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id gravida condimentum, viverra quis sem.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id gravida condimentum, viverra quis sem. Curabitur non nisl nec nisi scelerisque maximus. Aenean consectetur convallis porttitor. Aliquam interdum at lacus non blandit.</p>
      </div>
      <div class="col-lg-4">
        <img src="/template/img/guardianes.png" alt="Image" style="width: 100%;">
      </div>
   </div>
  </div>
</div>

<div class="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="wrap ">

                     <img src="/template/img/video_promocion.png" alt="Image" class="videopromocional">

                     <button type="button" class="btn-play efectobtn button" data-toggle="modal" data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-target="#videoModal">
                        <span class="glyphicon glyphicon-play" aria-hidden="true"></span>
                     </button>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="">
                    <div class="section-header">
                         <h1 id="the_title">Video promocional</h1>
                    </div>
                    <div class="about-text">
                         <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id gravida condimentum, viverra quis sem.</p>
                         <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id gravida condimentum, viverra quis sem. Curabitur non nisl nec nisi scelerisque maximus. Aenean consectetur convallis porttitor. Aliquam interdum at lacus non blandit.</p>

                    </div>
                </div>
             </div>
        </div>
    </div>
</div>

<div class="container">
  <h1 id="the_title">Conoce a los Guardianes de la Tierra</h1>
  <div class="row">
    <div class="col-sm-6 col-md-3">
      <div class="thumbnail contenedor-gds" >
        <a href="#" class="imgpers">
          <img class="imagen-gds" src="/template/img/1-cambio-climatico.png" alt="Image" >
        </a>

        <div class="caption">
          <h3 class="personajestext">Cambio Climatico</h3>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-md-3">
      <div class="thumbnail">
        <img src="/template/img/2-peligro-de-extinción.png" alt="Image">
        <div class="caption">
          <h3 class="personajestext">Peligro de extinción</h3>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-md-3">
      <div class="thumbnail">
        <img src="/template/img/3-reciclaje.png" alt="Image">
        <div class="caption">
          <h3 class="personajestext">Reciclaje</h3>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-md-3">
      <div class="thumbnail">
        <img src="/template/img/4-reforestación.png" alt="Image">
        <div class="caption">
          <h3 class="personajestext">Reforestación</h3>
        </div>
      </div>
    </div>
  </div>
</div>



<div class="footer">
    <div class="container">
        <h1 id="the_title">Contacto</h1>
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="footer-contact">
                            <p>Mtra. María Eugenia Díaz Trinidad <br> <small>Coordinadora del proyecto</small></p>
                            <p>eugenia.diaz@set.edu.mx <br>
                            marudiaz09@hotmail.com <br><small>Correo electrónico</small> </p>
                            <p>Maru Diaz<br>
                            <small>Facebook</small> </p>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

</div>


<div class="container"></div>

@include('plantilla.footer')
