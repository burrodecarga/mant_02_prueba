@csrf

<input type="hidden" name="id" value="{{$equipo->id}}">
<input type="hidden" name="sistema_id" value="{{$sistema->id}}">
<input type="hidden" name="subsistema_id" value="{{$subsistema->id}}">
<input type="hidden" name="validador">
<input type="hidden" name="ruta" value="ruta">

<div class="row">

    <div class="form-group col-12 mb-0">
        <label for="sistema_id"><strong></strong></label>
        <h4>{{$sistema->name}} </h4>
    </div>

    <div class="form-group col-12">
        <label for="subsistema_id"><strong></strong></label>
        <h4>{{$subsistema->name}} </h4>
    </div>


    <div class="form-group col-12 col-md-4">
        <label for="tipo" class="text-capitalize font-weight-bold">Tipo de equipo</label>
        <select class="form-control text-capitalize" name="tipo" id="tipo" title="{{__('select tipo')}}">
            @foreach ($tipos as $tipo)
            <option value="{{$tipo->id}}" @if($tipo->name==$tipoN) selected @endif>{{$tipo->name}}</option>
            @endforeach
        </select>
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


    <div class="col-12 col-md-4">
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
            <textarea id="description" name="description" rows="5"
                class="form-control bg-light shadow-ed  @error('description')is-invalid @else border-0 @enderror">{{old('description', $equipo->description)}}</textarea>
            @error('description')
            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
            @enderror
        </div>

        <div class="form-group col-12">
            <button class="btn btn-success text-capitalize">{{__($btn)}}</button>
            <a href="{{route('subsistemas.index')}}" class="btn btn-info mt-2 mb-2 text-capitalize">{{__('back')}} </a>
        </div>
    </div>
