<!-- Modal -->

<div class="modal fade" id="moveModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @foreach($albums as $alb)
                  {{ $album->id}}
                    @if($alb->id != $album->id)

                            <h3>{{$alb->name}}</h3>
                            <button  href="javascript:void(0)" id="move" type="button" value="{{$alb->id}}" class="btn btn-danger  m-btn--pill">Move</button>

                   @endif
                @endforeach

            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-secondary  m-btn--pill" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
