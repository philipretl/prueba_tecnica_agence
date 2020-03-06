function eliminar(id){
  //console.log(id.id);
  event.preventDefault();
  swal({
    title: "Estas Seguro?",
    text: "Esta accion no se puede deshacer",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {

      swal("será eliminado", {
        icon: "success",
        timer: 4000,
      });
      var eliminar = document.getElementById(id.id);
      eliminar.submit()
    } else {
      swal("Accion cancelada",{
        icon: "error",
      });

    }
  });
}

function eliminarCritico(id){
  //console.log(id.id);
  event.preventDefault();
  swal({
    title: "Estas Seguro?",
    text: "Esta accion no se puede deshacer jamas por nada del mundo de los jamases",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {

      swal("será eliminado", {
        icon: "success",
        timer: 4000,
      });
      var eliminar = document.getElementById(id.id);
      eliminar.submit()
    } else {
      swal("Accion cancelada",{
        icon: "error",
      });

    }
  });
}
