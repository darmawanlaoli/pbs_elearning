@extends('hsstudent.layout')

@section('content')

<div class="container-fluid">
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">{{ $title }}</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted " href="./index.html">{{ $path }}</a></li>
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

        <div class="card col-md-8">
            
            <form action="{{ route('hsstudent.ct.upload', $cts->ids) }}" method="POST" enctype="multipart/form-data">
            @csrf

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>Subject</th>
                                <td>: {{ $cts->subject }}</td>
                            </tr>
                            
                            <tr>
                                <th>Class</th>
                                <td>: {{ $cts->class }}</td>
                            </tr>
                            
                            <?php if($cts->status_upload == 1): ?>
                            
                                <tr>
                                    <th>Download</th>
                                    <td>
                                        : <a target="_blank" class="btn btn-success" href="{{'/hs_chapter_test_responses/'.$cts->file_response}}">Download</a>
                                    </td>
                                </tr>
                                
                            <?php else : ?>
                            
                                <tr>
                                    <th>Upload</th>
                                    <td>
                                        <input type="file" name="file" class="form-control">
                                    </td>
                                </tr>
                            
                            <?php endif; ?>
                            
                        </table>
                        
                        <?php if($cts->status_upload != 1): ?>
                            
                            <button type="submit" class="btn btn-primary mx-auto">Submit</button>
                        
                        <?php endif; ?>
                            
                        
                        
                        
                    </div>
                </div>
            
            </form>
        </div>
    </div>
</div>

@endsection