@extends('layout')
@section('content')
    <div class="container">
        <div class="row">
            <form method="get" id="log_out" action="{{url('/logout')}}">
                <button form="log_out" class=" btn btn-success" type="submit">Log out</button>
            </form>
        </div>
      <div class="row">
          @if (\Session::has('success'))
              <p class="list"> {!! \Session::get('success') !!}</p>
          @endif

              @if ($errors->any())
                  <ul class="list">
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>

              @endif
      </div>
        <div class="row">
            <form action="{{url('/add')}}" method="post" enctype="multipart/form-data" id="add_medicine">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="medicine">Medicine name:</label>
                    <input type="text" class="form-control" name="medicine_name" id="medicine" required>
                </div>
                <div class="form-group">
                    <label for="medicine_weight">Medicine weight:</label>
                    <input type="text" class="form-control" name="medicine_weight" id="medicine_weight" required>
                </div>
                <div class="form-group">
                    <label for="medicine_category">Medicine category:</label>
                    <select name="medicine_category" class="form-control" id="medicine_category" required>
                    @if(isset($categories))
                            <option selected value="" disabled="disabled">Choose category</option>
                        @foreach($categories as $category)
                                <option value="{{$category['id']}}">{{$category['category_name']}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label for="medicine_producer">Medicine producer:</label>
                    <select class="form-control" name="medicine_producer" id="medicine_producer" required>

                        @if(isset($producers))
                            <option selected  value="" disabled="disabled">Choose producer</option>
                            @foreach($producers as $producer)
                                <option value="{{$producer['id']}}">{{$producer['producer_name']}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label>Upload Image</label>
                    <div class="input-group">
                        <span class="input-group-btn">
                            <span class="btn btn-default btn-file">
                                Browse… <input type="file" name="image" id="imgInp" class="validate form-control">
                            </span>
                        </span>
                        <input type="text" id="img_text" class="form-control" readonly>
                    </div>
                    <img id='img-upload'/>
                </div>
                <button type="submit" class="btn btn-info" form="add_medicine">Save</button>
            </form>
        </div>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
@endsection