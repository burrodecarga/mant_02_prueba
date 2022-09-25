@csrf

<input type="hidden" name="id" value="{{$equipo->id}}" />
<input type="hidden" name="validador" />



<div class="form-group">
    <label for="sistema_id" class="text-capitalize font-weight-bold">sistema</label>
    <select class="form-control text-capitalize" name="sistema_id" id="sistema_id" title="{{__('select sistema')}}"
        onchange="selectSistema()">
        @foreach ($sistemas as $sistema)
        <option value="{{$sistema->id}}" @if($sistema->id==$sistema_id) selected @endif>{{$sistema->name}}</option>
        @endforeach
    </select>
    @error('sistema_id')
    <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
    @enderror

    @error('validador')
    <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
    @enderror
</div>

<div class="form-group">
    <label for="subsistema_id"><strong>Subsistema</strong></label>
    <select class="form-control" name="subsistema_id" id="subsistema_id">
    </select>
</div>




<div class="row my-2">


    <div class="form-group col-12 col-md-4">
        <label for="tipo" class="text-capitalize font-weight-bold">Tipo de equipo</label>
        <select class="form-control text-capitalize" name="tipo" id="tipo" title="{{__('select tipo')}}">
            @foreach ($tipos as $tipo)
            <option value="{{$tipo->id}}" @if($tipo->name==$tipoN) selected @endif>{{$tipo->name}}</option>
            @endforeach
        </select>
        @error('tipo')
        <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
        @enderror
    </div>

    <div class="form-group col-12 col-md-4">
        <label for="zona_id" class="text-capitalize font-weight-bold">Ubicación de equipo</label>
        <select class="form-control text-capitalize" name="zona_id" id="zona_id" title="{{__('select zona')}}">
            @foreach ($zonas as $zona)
            <option value="{{$zona->id}}" @if($zona->name==$zona_id) selected @endif>{{$zona->name}}</option>
            @endforeach
        </select>
        @error('zona_id')
        <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
        @enderror
    </div>


    <div class="form-group col-12 col-md-4">
        <label for="servicio"><strong>Servicio</strong></label>
        <select class="form-control" name="servicio" id="servicio">
            @for ($i =1; $i <= 24; $i++) <option value="{{ $i }}">{{ $i. '  h/d' }}</option>
                @endfor
        </select>
    </div>



    <div class="form-group col-12">
        <label for="name" class="form-label text-capitalize font-weight-bold">{{__('name of equipo')}} </label>
        <input id="name" type="text" name="name" value="{{old('name', $equipo->name)}}"
            class="form-control bg-light shadow-ed  @error('name')is-invalid @else border-0 @enderror">
        @error('name')
        <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
        @enderror
    </div>


    <div class="form-group col-12">
        <label for="description" class="form-label text-capitalize font-weight-bold">{{__('description')}} </label>
        <textarea id="description" name="description"
            class="form-control bg-light shadow-ed  @error('description')is-invalid @else border-0 @enderror">{{old('description', $equipo->description)}}</textarea>
        @error('description')
        <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
        @enderror
    </div>

    <div class="form-group col-12">
    <button class="btn btn-success text-capitalize">{{__($btn)}}</button>
    <a href="{{route('equipos.index')}}" class="btn btn-info mt-2 mb-2 text-capitalize">{{__('back')}} </a>
    </div>
</div>
