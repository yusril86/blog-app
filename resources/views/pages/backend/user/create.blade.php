@extends('layouts.backend.index')

@section('content')
<div class="row ">
    <div class="col-12">
        <div class="card">
            <div class="card-body pt-5">
                <form method="POST" action="{{ route('users.store') }}">
                    @csrf

                    <div class="row mb-4">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nama') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    
                    <!-- Form -->
                          <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end" for="roles">{{ __('Posisi') }} </label>
                            <div class="col-md-6">

                                <select class="form-select" name="roles" id="roles">                                                                        
                                        <option  selected value="Penulis">Penulis</option>
                                </select>
                            </div>
                            </div>
                        <!-- End of Form -->

                  

                    <div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Sandi') }}</label>
                        <div class="col-md-6 d-flex align-items-center position-relative">
                            <input id="password" style="padding-right: 2rem !important" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password">
                            <span role="button" class="position-absolute" style="right:20px !important"
                                onclick="showPassword(this)">
                                <i class="fas fa-eye"></i>
                                <i class="fas fa-eye-slash" style="display: none"></i>
                            </span>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>                    


                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4 d-flex justify-content-end">
                            <a class="btn btn-outline-danger" href="{{route('users.index')}}">
                                Batal
                            </a>
                            <button type="submit" class="btn btn-primary ms-2">
                                {{ __('Daftar') }}
                            </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    function showPassword(self) {
        var x = document.getElementById("password");
        if (x.type === "password") {
        x.type = "text";
        self.firstElementChild.style.display = "none"
        self.lastElementChild.style.display = "inline"
        } else {
            x.type = "password";
            self.firstElementChild.style.display = "inline"
            self.lastElementChild.style.display = "none"
        }
    }
    

</script>
@endsection