<div id="videos-list">
        @if(count($videos) >= 1)
            @foreach($videos as $video)
                <div class="video-item col-md-10 float-left card">
                    <div class="card-body">
                        <!-- imagen del video -->
                        @if (Storage::disk('images')->has($video->image))
                            <div class="video-image-thumb col-md-3 float-left">
                                <div class="video-image-mask">
                                    <img src="{{ url('/miniatura/'.$video->image) }}" alt="" class="video-image">
                                </div>
                            </div>
                        @endif

                        <div class="data">
                        <h4 class="video-title"><a href="{{ route('detailVideo', ['video_id' => $video->id]) }}">{{ $video->title }}</a></h4>
                            <p><a href="{{ route('channel', ['user_id' => $video->user->id]) }}">{{ $video->user->name.' '.$video->user->surname }}</a> | {{ \FormatTime::LongTimeFilter($video->created_at) }}</p>
                        </div>
                        <!-- botones de acción -->
                        <a href="{{ route('detailVideo', ['video_id' => $video->id]) }}" class="btn btn-success">Ver</a>
                        @if(Auth::check() && Auth::user()->id == $video->user->id)
                            <a href="{{ route('videoEdit', ['video_id' => $video->id]) }}" class="btn btn-warning">Editar</a>
                            <a href="#videosModal{{$video->id}}" role="button" class="btn btn-primary" data-toggle="modal">Eliminar</a>

                            <!-- Modal / Ventana / Overlay en HTML -->
                            <div id="videosModal{{$video->id}}" class="modal fade">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">¿Estás seguro?</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <p>¿Seguro que quieres borrar este video?</p>
                                            <p class="text-warning"><small>{{$video->title}}</small></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                            <a href="{{ url('/delete-video/'.$video->id) }}" type="button" class="btn btn-danger">Eliminar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        @else
            <div class="alert alert-warning">No hay vídeos actualmente</div>
        @endif
        <div class="clearfix"></div>
        {{ $videos->links() }}
    </div>
