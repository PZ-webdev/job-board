@extends('layouts.app')

@section('content')
 <!-- bradcam_area  -->
 <div class="bradcam_area bradcam_bg_1">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text">
                    <h3>Create Your CV</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ bradcam_area  -->
<div class="container my-5">
<div class="row flex-lg-nowrap">
  <div class="col-12 col-lg-auto mb-3" style="width: 200px;">
    <div class="card p-3">
      <div class="e-navlist e-navlist--active-bg">
        @include('account.includes.nav')
      </div>
    </div>
  </div>

  <div class="col">
    <div class="row">
      <div class="col mb-3">
        <div class="card">
          <div class="card-body">

            <form id="save_cv_form" method="POST">
                <textarea id="editor">
                    {!! $cv->text !!}
                </textarea>
    
                <div class="justify-content-end">
                    <button class="btn btn-success mt-3" type="submit" id="save_cv">Zapisz CV</button>
                    <button class="btn btn-info mt-3" id="">Stwórz PDF</button>
                </div>
            </form>

          </div>
        </div>
      </div>

      <div class="col-12 col-md-3 mb-3">
        <div class="card mb-3">
          <div class="card-body">
                <a href="#" class="genric-btn info circle arrow">Dodaj Ofertę</a>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <h6 class="card-title font-weight-bold">Potrzeujesz pomocy?</h6>
            <p class="card-text">Skontaktuj się z naszym administratorem.</p>
            <a href="#" class="genric-btn default radius">Kontakt</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection

@section('script')
    <script src="https://cdn.ckeditor.com/ckeditor5/26.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );

            // Update sv
        $("#save_cv_form").submit(function(){  

            var cv_text = $('#editor').val();
            console.log(cv_text);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
            $.ajax({
                method: 'POST',
                url: "{{ route('store.cv') }}",
                data: {
                    text: cv_text,
                },
                cache:false,
                contentType: false,
                processData: false,
                success: function(data){
                    console.log(data.message);
                    // $('#message').text(data.message);
                },
                error: function(e){
                    console.error("Error: " + e);
                }
            });
        });
    </script>
@endsection
