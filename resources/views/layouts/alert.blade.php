@if(session()->has('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <strong>Berhasil</strong>, {{session()->get('success')}}
        </div>
        <script>
            $('.alert').alert();
        </script>
        @endif
        @if(session()->has('warning'))
        <div class="alert alert-warning alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
            {{session()->get('warning')}}
        </div>
        <script>
            $('.alert').alert();
        </script>
        @endif
        @if(session()->has('danger'))
        <div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <strong>Opss..</strong>, {{session()->get('danger')}}
        </div>
        <script>
            $('.alert').alert();
        </script>
        @endif
