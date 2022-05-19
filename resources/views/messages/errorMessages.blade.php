{{-- @if (count($errors) > 0)
    @foreach ($errors->all() as $error)
        <button type="button" class="btn btn-danger swalDefaultError" hidden>
            {{ $error }}
        </button>
    @endforeach
@endif --}}
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <button type="button" class="btn btn-danger toastrDefaultError" onclick="toastr.error('{{ $error }}')" hidden>
        </button>
    @endforeach
@endif