<?php
session_start();
include("../conx.php");

if(!isset($_SESSION['usuario'])){
    // Si querés depurar:
    echo "<pre>";
    var_dump($_POST);
    echo "</pre>";
}

// Verificar que lleguen todos los campos
if(isset($_POST['servicio'], $_POST['pago'], $_POST['horario'], $_POST['fecha'])){
    $Servicio = $_POST['servicio'];
    $MetodoPago = $_POST['pago'];
    $date = $_POST['fecha'];
    $hora = $_POST['horario'];
    $estado = "ocupado";

    if(!$conx){
        die("Conexión fallida");
    }

    // Preparar INSERT
    $stmt = $conx->prepare("INSERT INTO turnos (servicio, metodo_pago, fecha, hora, estado) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $Servicio, $MetodoPago, $date, $hora, $estado);

  if($stmt->execute()){
    header("Location: pagina.php?ok=1#form");
    exit();
} else {
    header("Location: pagina.php?error=1#form");
    exit();
}
}

?>
 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
    <header>
        <nav>
            <img src="../imagenes/download.jpg">
            <ul>
                <li><a href="#infot">Quien soy</a></li>
                <li><a href="#form">Nuevo turno</a></li>
                <li><a href="#">FAQ</a></li>
                <li><a href="#social">Contacto</a></li>
            </ul>
            <a href="../login/logout.php" class="aaa"><i class="fa-solid fa-arrow-right-to-bracket"></i></a>
        </nav>
    </header>
   <p style="color: white"> Hola <?= $_SESSION['name']; ?>, bienvenido 👋</p>

        <div class="cont0" id="infot">
        <div class="info">
            <h1 style="color:bisque">Mi historia</h1>
            <p style="color:bisque">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Possimus mollitia praesentium adipisci dolore molestias, debitis molestiae et delectus, esse facere, voluptate quaerat dolorem soluta ab quos assumenda animi totam aperiam.
            Amet, consectetur hic temporibus necessitatibus enim cum officia inventore pariatur nihil omnis cupiditate assumenda quaerat saepe sit perspiciatis officiis recusandae possimus? Itaque repudiandae exercitationem, illo rem eaque eius hic iure?
            Sapiente, beatae. Dolore tempore dolor impedit architecto. Nulla perspiciatis molestiae deserunt suscipit harum sapiente ab tempore repellendus repudiandae, assumenda facere nostrum adipisci nihil accusamus quos tenetur recusandae alias ipsum placeat, aliquam quia, odio tempora exercitationem repudiandae nam quas vitae et quibusdam ratione. Facere reiciendis molestias voluptatem voluptatibus iste minus accusantium, reprehenderit facilis perspiciatis animi!
            Cum sunt, placeat neque quasi ducimus dolorem deleniti repellat adipisci sint dolore asperiores vel. Earum dicta aspernatur quasi maiores maxime, odio iusto adipisci dolorem ipsa consequuntur accusamus laboriosam sequi neque.
            Beatae, blanditiis ipsam veritatis nobis impedit similique ex voluptates culpa harum cumque. Porro tempora id, voluptatem facere voluptates similique molestiae recusandae doloremque obcaecati error. Accusantium voluptatem repellendus magnam dolore! Atque?
            </p>
        </div>
        <div class="img1">
            <img src="../imagenes/barbero.webp">
        </div>
    </div>


    <div class="titulo">
        <h1>Debajo se muestran los servicios que realizamos</h1>
        <p>Podes elegir 1 o mas servicios que quieras realizarte, te esperamos</p>
    </div>

    
        <div class="contenedor-cards">

    <div class="formulario" id="form">
        <form action="pagina.php" method="POST">

            <h2>Reservar turno</h2>

            <label>Elegi que queres hacerte</label>
            <select name="servicio" required>
                <option value="">Seleccionar...</option>
                <option value="corte clasico">Corte clasico</option>
                <option value="corte y barba">Corte y barba</option>
                <option value="cejas">Cejas</option>
                <option value="corte y cejas">Corte clasico y cejas</option>
                <option value="completo">Corte clasico, barba y cejas</option>
            </select>

            <label>Metodo de pago</label>
            <select name="pago" required>
                <option value="">Seleccionar...</option>
                <option value="efectivo">Efectivo</option>
                <option value="transferencia">Transferencia</option>
                <option value="tarjeta">Tarjeta</option>
            </select>

                <label>Elegí fecha:</label>
                <input type="date" id="fecha" name="fecha" class="fechita" required>

                <label>Elegí horario:</label>
                <select id="horario" name="horario" required>
                    <option value="">Seleccionar...</option>
                </select>
                    </select>

            <button type="submit" class="reserva">
                <span class="spansito">Reservar turno</span>
            </button>

        </form>
    </div>

    <div class="servicios">
        <div class="cards">
            <img src="../imagenes/diego.jpg">
            <h1>Corte clasico</h1>
            <p>Lorem ipsum dolor sit amet...</p>
            <span>$10.000</span>
            <span>Tiempo aproximado: 30'</span>
        </div>

        <div class="cards">
            <img src="../imagenes/messi.jpg">
            <h1>Corte y barba</h1>
            <p>Lorem ipsum dolor sit amet...</p>
            <span>$20.000</span>
            <span>Tiempo aproximado: 60'</span>
        </div>

        <div class="cards">
            <img src="../imagenes/cejas.jpg">
            <h1>Cejas</h1>
            <p>Lorem ipsum dolor sit amet...</p>
            <span>$3.000</span>
            <span>Tiempo aproximado: 15'</span>
        </div>

    </div>
</div>

    <h1 style="color: white">Preguntas frecuentes</h1>
    <button class="acordeon" id="acordeon">Seccion 1</button>
    <div class="panel">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque autem voluptatibus blanditiis saepe harum? Libero repellendus voluptatem iure fugiat quis odit, velit adipisci possimus eligendi, consequuntur beatae sunt, impedit magnam.</p>
    </div>
    
    <button class="acordeon" id="acordeon">Seccion 2</button>
    <div class="panel">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque autem voluptatibus blanditiis saepe harum? Libero repellendus voluptatem iure fugiat quis odit, velit adipisci possimus eligendi, consequuntur beatae sunt, impedit magnam.</p>
    </div>
    
    <button class="acordeon" id="acordeon">Seccion 3</button>
    <div class="panel">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque autem voluptatibus blanditiis saepe harum? Libero repellendus voluptatem iure fugiat quis odit, velit adipisci possimus eligendi, consequuntur beatae sunt, impedit magnam.</p>
    </div>

</body>


<footer>
    <div class="contenedor-footer">
        <div class="social" id="social">
            <a href="#"><i class="fa-brands fa-facebook"></i></a>
            <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
            <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
            <a href="#"><i class="fa-brands fa-telegram"></i></a>
            <a href="#"><i class="fa-brands fa-instagram"></i></a>
        </div>

        <div class="names">
            <ul>
                <li><a href="#cont0">Quien soy</a></li>
                <li><a href="#form">Nuevo turno</a></li>
                <li><a href="#">FAQ</a></li>
                <li><a href="#">Contacto</a></li>
            </ul>
            <div class="copy">
                Copyright 2025
            </div>
        </div>
    </div>
</footer>
    
</html>

<script src="https://unpkg.com/scrollreveal"></script>
<script src="reveal.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
const botones = document.querySelectorAll(".acordeon");

botones.forEach(boton =>{
  boton.addEventListener("click", function(){
    const panel = this.nextElementSibling;
    this.classList.toggle("activo");
    panel.classList.toggle("activo");
  });
});

document.addEventListener("click", function(e) {
    if (!e.target.closest(".acordeon")) {
        botones.forEach(function(boton){
            boton.classList.remove("activo");
            boton.nextElementSibling.classList.remove("activo");

        });
    }
});

document.getElementById("fecha").addEventListener("change", function() {
    const fecha = this.value;
        console.log("Fecha elegida:", fecha); // <-- debug

    fetch("buscarTurno.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "fecha=" + fecha
    })
    .then(res => res.json())
    .then(data => {
        const select = document.getElementById("horario");
        select.innerHTML = '<option value="">Seleccionar...</option>';
        data.forEach(hora => {
            const option = document.createElement("option");
            option.value = hora;
            option.textContent = hora;
            select.appendChild(option);
        });
    });
});

</script>

<?php if(isset($_GET['ok'])){ ?>
<script>
Swal.fire({
  title: 'Turno confirmado',
  text: 'Tu turno fue guardado correctamente',
  icon: 'success'
}).then(() => {
  window.history.replaceState({}, document.title, "pagina.php");
});
</script>
<?php } ?>