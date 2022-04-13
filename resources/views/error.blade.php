@if (count($errors))
    
    @foreach($errors->all() as $error)
    <div class="alert alert-danger alert-dismissible " role="alert">

        <span class="alert-inner--text"><strong>Error!</strong> {{ $error }}</span>
        {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button> --}}
    </div>
    @endforeach
@endif