@extends('layouts.main')

@section('special_css')
<link rel="stylesheet" href="/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
@endsection

@section('content')
<container>
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h5>Управление заказами</h5>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Главная</a></li>
              <li class="breadcrumb-item active">Заказы</li>
            </ol>
          </div>
        </div>
      </div>
  </section>
  <section class="content">
    <div class="card">
      <div class="card-header pl-2">
        <h5 class="card-title">Новых заказов: {{ $orders->count() }}</h3>
      </div>
      <div class="card-body p-0">
        <table class="table responsive">
            <thead>
                <tr>
                    <th class="pl-2">Имя</th>
                    <th class="pl-2">Дата</th>
                    <th class="pl-2"></th>
                    <th class="pl-2"></th>
                    <th class="pl-2"></th>
                    <th class="pl-2"></th>
                </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
              @if($order->type == 'speed')
              <tr class="text-warning">
              @else
              <tr>
              @endif
                <td class="pl-2 pr-2">{{ $order->users->magazin }}</td>
                <td class="pl-2 pr-2">{{ $order->created_at }}</td>
                <td class="pl-2 pr-2">@money($order->summ)</td>
                <td width="2%" class="pl-0 pr-0"><a href="#"><i class="fa fa-eye"></i></a></td>
                <td width="2%" class="pl-1 pr-0"><a href="#"><i class="fa fa-times"></i></a></td>   
                <td width="2%" class="pl-1 pr-0"><input type="checkbox" name="client_id[]" class="add_party" value="{{ $order->id }}"></td>   
              </tr>
            @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2">Общая сумма :</td>
                    <td>@money($total)</td>
                    <td colspan="3"></td>
                </tr>
            </tfoot>
        </table>
      </div> 
      <div class="card-footer text-center">
          <button type="button" name="btn_add_party" id="btn_add_party" class="btn btn-success mb-2">Создать партию</button>
              <a href="#" class="btn btn-success mb-2"> Управление заказами</a>
            @if(!$party->isEmpty())
            <select id="party_id" class="form-control border-success mb-2">
              <option value="0" selected="selected">Партияны танда</option>
              @foreach($party as $part)
                  <option value="{{ $part->id }}" >Партия : №{{$part->id}} Дата : {{$part->date}}</option>
              @endforeach
            </select>
            @endif
      </div>   
    </div>
  </section>
</container>
@endsection
@section('custom_script')
<script>
</script>
@endsection
