window.sr = ScrollReveal();

sr.reveal('.info', {
  duration: 1000,
  origin: 'left',
  distance: '100px',
  opacity: 0,
  delay: 300,
  easing: 'ease-out',
  reset: false
}
);

sr.reveal('.img1', {
  duration: 1000,
  origin: 'right',
  distance: '100px',
  opacity: 0,
  delay: 300,
  easing: 'ease-out',
  reset: false
}
);

const parametros = new URLSearchParams(window.location.search);
const ok = parametros.get('ok');

if(ok == 1){

Swal.fire({
  title: 'Turno confirmado',
  text: 'Tu turno fue guardado correctamente',
  icon: 'success'
});

};