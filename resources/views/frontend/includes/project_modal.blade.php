<!-- Modal Window-->
<div class="apo-modal apo-modal-photo-info">
    <header class="apo-modal-photo-info-header">
        <h2 class="apo-modal-photo-info-title">{{ $project->project_title }}</h2>
        <em class="apo-photo-stream-category">{{ $project->category_name }}</em>
    </header>
    <div class="apo-modal-photo-info-body">
        <div class="apo-extended-info-list apo-grid apo-cols-4">

            @foreach( (array)$project as $key=>$projectprop)
                @if( !in_array($key, array('id', 'project_title', 'category_id', 'category_name', 'publication_status', 'updated_at', 'created_at')))
                    <div class="apo-grid-col">
                        <div class="apo-extended-info-list-item">
                            <div class="apo-extended-info-list-name">{{str_replace("_", " ", $key)}}:</div>
                            <div class="apo-extended-info-list-value">{{$projectprop}}</div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    <div class="arctic-modal-close-container">
        <button type="button" class="apo-close-btn arcticmodal-close"><i class="icon icon-cross"></i> Close</button>
    </div>
</div>
<!-- End Modal Window-->
