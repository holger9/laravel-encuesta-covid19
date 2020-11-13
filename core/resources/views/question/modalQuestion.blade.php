<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header modal-colored-header bg-primary">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Opci&oacute;n</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Por favor, agregue una opci&oacuten de respuesta para la pregunta actual.</p>
        <form id="formAnswer" action="#" method="post">
          <div class="container">
            <div class="form-group row">
              <input type="text" class="form-control" id="answer" name="answer" placeholder="Opci&oacute;n de respuesta" required>
            </div>
          </div>
        </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary" id="addAnswer">Agregar</button>
        </div>
      </div>
    </div>
  </div>
</div>

@section('js')
<script type="text/javascript">

</script>
@endsection
