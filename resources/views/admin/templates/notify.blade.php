<script>
  toastr.options.closeButton = true;
  toastr.options.timeOut = 3000;
  toastr.options.progressBar = true;
  
  @if (session('success'))
    toastr.success('{{session("success")}}');
  @endif

  @if (session('info'))
    toastr.info('{{session("info")}}');
  @endif

  @if (session('danger'))
    toastr.error('{{session("danger")}}');
  @endif
</script>