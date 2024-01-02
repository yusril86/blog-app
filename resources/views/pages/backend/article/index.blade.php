@extends('layouts.backend.index')
@section('content')
<section class="section">
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('article.create') }}" class="btn btn-primary btn-sm shadow-sm ">
            <i class="fas fa-plus"></i>
            <span>Tambah</span>
        </a>
    </div>   
    <!-- Search form -->
    <form action="{{ route('article.search') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="query" class="form-control" placeholder="Cari artikel... title, author">
            <button type="submit" class="btn btn-primary">Cari</button>
            
        </div>
    </form>

    <form action="{{ route('article.filter') }}" method="GET" class="mb-3">
        <div class="input-group">            
            <select name="category" class="form-select">
                <option value="">Pilih Kategori</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary">Filter</button>
        </div>
    </form>

    {{-- @if (session()->has('message')) --}}
    @if ($articles->isEmpty())
        <p style="text-align: center; margin-top: 10%">Belum ada data</p>
    @else
        <div class="card">
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle  table-nowrap mb-4  table-borderless">
                            <thead>
                                <tr class="bg-secondary bg-opacity-25">
                                    <th class="ps-3"
                                        style="border-top-left-radius: 10px; border-bottom-left-radius: 10px">
                                        No
                                    </th>
                                    <th>Judul</th>
                                    <th>Kategori</th>
                                    <th>Penulis</th>                                    
                                    <th>Tanggal</th>
                                    <th style="text-align: center">
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($articles as $article)
                                    <tr>
                                        <td style="text-align: center">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            <div style="width: max-content">{{ $article->title }}</div>
                                        </td>
                                        <td>
                                            <div>{{ $article->category->name }}</div>
                                        </td>
                                        <td>
                                            <div>{{ $article->author }}</div>
                                        </td>
                                    
                                        <td>
                                            <div>{{ $article->date }}</div>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2"><a href="{{ route('article.edit', $article->id) }}"
                                                    class="btn btn-info">
                                                    <i class="fa fa-pencil-alt"></i>
                                                </a>
                                                <form action="{{ route('article.destroy', $article->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                                {{-- <a href="{{ route('article.show', $post->id) }}" class="btn btn-info">
                                                    <i class="fa fa-eye"></i>
                                                </a> --}}
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- {!! $posts->links() !!} --}}
                    </div>
                </div>
            </div>
    @endif
</section>
@endsection