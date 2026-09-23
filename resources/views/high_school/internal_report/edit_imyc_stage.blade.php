@extends('layout.' . strtolower(session('role')))

@section('content')

<style>
    /* Mengatur tinggi minimal editor CKEditor */
    .ck-editor__editable_inline {
        min-height: 200px;
    }
</style>

<div class="container-fluid">
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">{{ $title }}</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted" href="./index.html">{{ $path }}</a></li>
                            <li class="breadcrumb-item" aria-current="page">{{ $title }}</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-3">
                    <div class="text-center mb-n5">
                        <img src="../../dist/images/breadcrumb/ChatBc.png" alt="" class="img-fluid mb-n4">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="widget-content searchable-container list">
        <div class="card col-md-8 col-lg-8 mx-auto">
            <div class="card-body">

                <form action="{{ route('imyc_stage.update', $stage->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Judul Artikel -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Judul Artikel</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                            value="{{ old('title', $stage->title) }}" placeholder="Masukkan Judul Artikel">

                        @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <!-- Konten WYSIWYG -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Goal</label>
                        <textarea name="goal_geo" id="editor"
                            class="form-control @error('goal_geo') is-invalid @enderror">{{ old('goal_geo', $stage->goal_geo) }}</textarea>

                        @error('goal_geo')
                        <div class="text-danger small mt-1">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary px-4">Update Data</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<!-- CKEditor 5 CDN -->
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'), {
            toolbar: [
                'heading', '|',
                'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', '|',
                'undo', 'redo'
            ]
        })
        .catch(error => {
            console.error(error);
        });
</script>


@endsection
