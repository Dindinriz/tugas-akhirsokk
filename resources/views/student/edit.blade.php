@extends ("layouts.main")

@section("first.content")
    <div class="col-md-8 offset-md-2">
        <h3>Edit Mahasiswa</h3>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>        
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
  ﻿
        <form action="" method="post" >
            @csrf
            <div class="form-group">
                <label for="id"></label>
                <input type="hidden" class="form-control" name="id" value="{{$student->id}}"> 
            </div>

            <div class="form-group">
                <label for="code">NRP</label>
                <input type="text" class="form-control" name="code" value="{{$student->code}}"> 
            </div> <br>

            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" class="form-control" name="name" value="{{$student->name}}">
            </div> <br>
            
            <div class="form-group">
                <label for="gender">Jenis Kelamin</label>
                <input type="radio" class="form-control-inline" name="gender" Value="P"> Pria <input type="radio" class="form-control-inline" name="gender" Value="W" value="{{$student->gender}}"> Wanita
            </div> <br>
            <div class="form-group">
                <label for="birth_place">Tempat Lahir</label>
                <input type="text" class="form-control" name="birth_place" value="{{$student->birth_place}}">
            </div> <br>
            <div class="form-group">
                <label for="birth_date">Tanggal Lahir</label>
                <input type="date" class="form-control" name="birth_date" value="{{$student->birth_date}}">
            </div> <br>
            <button type="submit" class="btn btn-primary">Update</button> 
        </form>
    </div>
@stop