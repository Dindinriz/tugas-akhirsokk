@extends('layouts.main')

<?php $no=1 ?>
@section('first.content')
    <h3>Data Mahasisawa</h3>    
        <a href="/student/create" class="btn btn-success">Tambah Data</a>
        <div class="col-sm-12">
        
        @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success')}}
        </div>
        @endif
        </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th> No </th>
                <th> NRP </th>
                <th> Nama </th>
                <th> Jenis Kelamin </th>
                <th> Tempat Lahir </th>
                <th> Tanggal Lahir </th>
                <th colspan=2> </th>
            </tr>
        </thead>
        <tbody>
            @foreach($student as $student)
                <tr>
                    <td> {{$no++}} </td>
                    <td> {{$student->code}} </td>
                    <td> {{$student->name}} </td>
                    <td> {{$student->gender == "P" ? "Pria" : "Wanita"}} </td>
                    <td> {{$student->birth_date}} </td>
                    <td> {{$student->birth_place}} </td>
                    <td>
                        <a href="/student/edit/{{$student->id}}" method="post" class="btn btn-primary">Edit</a>
                    </td>
                    <td>
                        <form action="/student/{{$student->id}}/delete" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection

