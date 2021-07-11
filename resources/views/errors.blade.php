@if($errors->any())
<div class="card-body">
    <div class="alert alert-danger alert-dismissible">
        <h7><i class="icon fas fa-ban"></i>Ошибка</h7>
            <ul>
			@foreach ($errors->all() as $error)
			    <li>{{ $error }}</li>
			@endforeach
		    </ul>
    </div>
</div>
@endif
