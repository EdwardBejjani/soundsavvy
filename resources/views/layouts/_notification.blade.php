@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissable auto-dismiss">
    <button type="button" class="close rounded" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4 class="mt-2"><i class="icon fa fa-ban"></i> Alert!</h4>
    {{ $message }}
</div>
@endif

@if ($message = Session::get('danger'))
<div class="alert alert-danger alert-dismissable auto-dismiss">
    <button type="button" class="close rounded" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4 class="mt-2"><i class="icon fa fa-ban"></i> Alert!</h4>
    {{ $message }}
</div>
@endif

@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-dismissable auto-dismiss">
    <button type="button" class="close rounded" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4 class="mt-2"><i class="icon fa fa-ban"></i> Alert!</h4>
    {{ $message }}
</div>
@endif

@if ($message = Session::get('info'))
<div class="alert alert-info alert-dismissable auto-dismiss">
    <button type="button" class="close rounded" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4 class="mt-2"><i class="icon fa fa-ban"></i> Alert!</h4>
    {{ $message }}
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger alert-dismissable auto-dismiss">
    <button type="button" class="close rounded" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4 class="mt-2"><i class="icon fa fa-ban"></i> Alert!</h4>

    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</div>
@endif