<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title"> @yield('modalTitle')</h4>
    </div>
    <div class="modal-body">
      @include('includes/modal-msgs')
      @yield('modalBody')
    </div>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
