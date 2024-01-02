@extends('layouts.backend.index')
<style>
    .wide-card {
        width: 100%;
    }

    .small-card {
        width: 100%;
        max-width: 300px;
    }
</style>
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card border shadow">
            <div class="card-body pt-5">
                <form id="form-create" action="{{route('article.update',$article->id)}}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="col-lg-8 offset-lg-2">
                        <!-- Form -->
                        <div class=" row mb-3">
                            <label class="col-xl-3 col-form-label" for="judul">Judul</label>
                            <div class="col-xl-9">
                                <div class="input-group is-invalid">
                                    <input type="text" class="form-control @error('title') border-danger @enderror"
                                        id="title" placeholder="title" aria-label="title" name="title"
                                        value="{{ $article->title }}" required>
                                    @error('title')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!-- End of Form -->

                        <!-- Form -->
                        <div class=" row mb-3">
                            <label class="col-xl-3 col-form-label" for="content">Isi Blog</label>
                            <div class="col-xl-12">
                                <div class=" is-invalid">
                                    <textarea id="content" name="content">
                                        {{ $article->content }}
                                    </textarea>
                                    @error('content')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!-- End of Form -->

                        <!-- Form -->
                        <div class=" row mb-3">
                            <label class="col-xl-3 col-form-label" for="category_id">Kategori Berita:</label>
                            <div class="col-xl-9">
                                <div class="form-group">
                                    <select class="form-select" id="category_id" name="category_id" required>
                                        <option value="">Pilih Kategori</option>
                                        @foreach ($categories as $category)
                                         <option  @if ($category->id == $article->category_id) selected @endif value={{ $category->id }}> {{$category->name}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- End of Form -->

                        <!-- Form -->
                        <div class=" row mb-3">
                            <label class="col-xl-3 col-form-label" for="author">Penulis</label>
                            <div class="col-xl-9">
                                <div class="input-group is-invalid">
                                    <input type="text" class="form-control @error('author') border-danger @enderror"
                                        id="author" placeholder="author" aria-label="author" name="author"
                                        value="{{ $article->author }}" required>
                                    @error('author')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!-- End of Form -->
                        


                        <!-- Form -->
                        <div class=" row mb-3">
                            <label class="col-xl-3 col-form-label" for="date">Tanggal</label>
                            <div class="col-xl-9">
                                <div class=" is-invalid">
                                    <input class="form-control" type="date" name="date" id="date"
                                        value="{{ $article->date }}">
                                    @error('date')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!-- End of Form -->


                        <!-- Form -->
                        <div class=" row mb-3">
                            <label class="col-xl-3 col-form-label" for="thumbnails">Gambar</label>
                            <div class="col-xl-9">
                                <div class="mb-1">
                                    <input onchange="imageFunc(this)"
                                        class="form-control @error('thumbnails') is-invalid @enderror" name="thumbnails"
                                        type="file" id="formFile" accept="image/*">
                                </div>
                                @error('thumbnails')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <!-- End of Form -->

                        <!-- Form -->

                        <div class="row">
                            <img id="image-preview" src="" alt="" class="" style="display:none ">
                        </div>
                        <!-- End of Form -->

                        <div class="form-group row">
                            <div class="col-sm-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="{{url('backend/assets/vendor/jquery/jquery.min.js')}}"></script>
<script>
    const imageFunc = e => {
            const img = (URL.createObjectURL(event.target.files[0]))
            
                document.querySelector('#image-preview').src = img        
                document.querySelector('#image-preview').style.display = 'block';     
                document.querySelector('#image-preview').classList.add('img-thumbnail')
                document.querySelector('#image-preview').classList.add('mb-3')
            
        }
</script>
<script>
    $(document).ready(function(){                
        $('#content').summernote({
            height: 500,
            tabsize: 1,
            prettifyHtml:false,
            spellCheck: false,
            theme: 'monokai',
            toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'hr','video']],
            ['view', ['fullscreen', 'codeview']],
            ['highlight', ['highlight']]
          ]    
        });
    })
</script>

@endsection