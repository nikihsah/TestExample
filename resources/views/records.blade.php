@extends('catalog')

@section('main_content')

    <div class="row">
        <form class="form-group col-sm-7" action="newRecords" method="POST" style="float: none; margin: 0 auto;">
        @csrf
            @if(isset($_SESSION['user']))
                <input value="{{$_SESSION['user']->id}}" name="idUser" type="hidden">
            @else
                <input value="2" name="idUser" type="hidden">
            @endif


            <div class="mb-3">
                <label class="mb-1" for="text">Текст</label>
                <textarea name="text" class="form-control" placeholder="Введите текст" id="text" style="height: 100px"></textarea>
            </div>
            <button type="submit" class="btn btn-dark right">Submit</button>
        </form>
    </div>

    <hr>
    @foreach($records as $record)
        <div class="row mb-4" >
            <div class="col-sm-7 bg-light rounded" style="float: none; margin: 0 auto;">

                <div class="text-white" >
                    <text class="bg-dark rounded">
                        <text class="m-1">{{App\Http\Controllers\RecordsController::userName($record->user)}}</text>
                    </text>
                </div>

                <div class="" style="float: none; margin: 0 auto;">
                    <p>{{$record->text}}</p>
                </div>

                @if($record->user!=2)



                @endif
            </div>
        </div>
    @endforeach
@endsection
