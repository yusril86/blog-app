@extends('layouts.backend.index')
@section('content')
<div class="clearfix"></div>
<div id="home">
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-4">
                <form action="{{route('category.store')}}" method="POST">
                    @csrf
                    <div class="card mt-4 card-rounded">
                        <div class="card-header bg-primary text-white">
                            <i class="fa fa-plus"></i> Kategori
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Nama Kategori</label>
                                <input type="text" required class="form-control mt-1" name="name" id="kategori"
                                    placeholder="">
                            </div>
                        </div>
                        <div class="card-footer text-muted">
                            <div class="float-right">
                                <button class="btn btn-primary btn-md"><i class="fa fa-save"></i> Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-8">
                <div class="card mt-4 card-rounded">
                    <div class="card-header bg-primary text-white">
                        <i class="fa fa-tags"></i> Kategori
                    </div>
                    <div class="card-body">
                        @if(count($categories) > 0)
                        <div class="table-responsive">
                            <table class="table" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kategori</th>                                        
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($categories as $category)
                                    <tr>

                                        <td scope="row">{{$loop->iteration}}</td>
                                        <td>{{$category->name}}</td>                                       
                                        <td>
                                            <a href="{{ route('category.edit', $category->id) }}"
                                                class="btn btn-primary btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="{{ route('category.destroy', $category->id) }}" method="POST"
                                                class="d-inline" onclick="return confirm('Yakin Hapus ?')">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                        <div class="d-flex justify-content-center mt-2">
                            <h4>Data kategori belum ada</h4>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
@endsection




