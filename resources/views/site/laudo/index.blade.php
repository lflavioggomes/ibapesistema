@extends('adminlte::page')
@section('content_header')
@section('plugins.Datatables', true)

<h1>Análise dos trabalhos</h1>
@stop

@section('content')
<div class="row">
    
    <div class="col-sm-6 col-md-6 ">
        <a class="btn btn-app bg-success mt-3 float-sm-left">
            <i class="fas">0</i> Pontos
        </a>
    </div>
    <div class="card">
        <div class="card-header">
            <!-- <h3 class="card-title"></h3> -->
        </div>


        <div class="container pt-4">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header text-center">
                            <h5>Upload de Trabalhos</h5>
                        </div>
        
                        <div class="card-body">
                            <div id="upload-container" class="text-center">
                                <button id="browseFile" class="btn btn-primary">Procurar</button>
                            </div>
                            <div  style="display: none" class="progress mt-3" style="height: 25px">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%; height: 100%">75%</div>
                            </div>
                        </div>
        
                        <div class="card-footer p-4" style="display: none">
                            {{-- <video id="videoPreview" src="" controls style="width: 100%; height: auto"></video> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12 col-md-6"></div>
                    <div class="col-sm-12 col-md-6"></div>
                </div>
                <div class="row" id="tabelatrabalho">
                    <div class="col-sm-12">
                        <table id="example1" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                            <thead>
                                <tr>
                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Trabalho</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Arquivo</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Status</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Pontos</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Excluir</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $cont = 1; @endphp
                                @foreach($laudo as $value)
                                <tr class="odd">
                                    <td>{{$cont}}</td>
                                    <td><a target="_blank" href="{{ url('storage/laudo/'.$value->arquivo) }}">{{$value->arquivo}}</a></td>
                                    <td>{{$value->status}}</td>
                                    @if ($value->previaponto)
                                    <td>{{$value->previaponto}}</td>
                                    @else
                                    <td align="center">-</td>    
                                    @endif

                                    <td><i style="cursor: pointer;" data-id="@php echo $value->idtabela @endphp" data-table="laudos" data-caminho="laudo"  data-toggle="modal" data-target="#modalexcluitrabalho" class="fas fa-fw fa-trash"></i></td>
                                </tr>
                                @php $cont++; @endphp
                               @endforeach 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @include('layouts.aviso')
</div>


@include('layouts.footer')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/resumablejs@1.1.0/resumable.min.js"></script>

<script type="text/javascript">

    let browseFile = $('#browseFile');
         let resumable = new Resumable({
             target: 'laudo/uploadlargefiles',
             query:{_token:'{{ csrf_token() }}'} ,// CSRF token
             fileType: ['pdf'],
             chunkSize: 10*1024*1024, // default is 1*1024*1024, this should be less than your maximum limit in php.ini
             headers: {
                 'Accept' : 'application/json'
             },
             testChunks: false,
             throttleProgressCallbacks: 1,
         });
     
         resumable.assignBrowse(browseFile[0]);
         
         resumable.on('fileAdded', function (file) { // trigger when file picked
             showProgress();
             resumable.upload() // to actually start uploading.
         });
     
         resumable.on('fileProgress', function (file) { // trigger when file progress update
             updateProgress(Math.floor(file.progress() * 100)); 
             
            });
            
            resumable.on('fileSuccess', function (file, response) { // trigger when file upload complete
                response = JSON.parse(response)

                if(response.error != 1)
                {
                    $.get( "laudo/trabalho", function( data ) {
                    $("#tabelatrabalho").html(data);
                    });
                }else{
                    let progress = $('.progress');
                    progress.find('.progress-bar').css('width', '0%');
                    progress.find('.progress-bar').html('0%');
                    $("#alert").html("Só é possível cadastrar 5 trabalhos");
                    $("#modalalert").modal();
                }

                
                // $('#videoPreview').attr('src', response.path);
           //  $('.card-footer').show();
         });
     
         resumable.on('fileError', function (file, response) { // trigger when there is any error
             alert(file)
         });
     
            
         let progress = $('.progress');
         function showProgress() {
             progress.find('.progress-bar').css('width', '0%');
             progress.find('.progress-bar').html('0%');
             progress.find('.progress-bar').removeClass('bg-success');
             progress.show();
         }
         
         function updateProgress(value) {
             progress.find('.progress-bar').css('width', `${value}%`);
             progress.find('.progress-bar').html(`${value}%`);
         }
         
         function hideProgress() {
             progress.hide();
         }
</script>


@stop