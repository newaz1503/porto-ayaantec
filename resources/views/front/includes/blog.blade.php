<div class="modal fade" id="blog_{{ $blog->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">{{ $blog->name }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <img src="{{ asset($blog->photo) }}" alt="{{ $blog->photo }}" class="img-fluid" width="100%">
            <div class="meta pt-3" >
              <span><a href="javascript:void(0)"><i class="fas fa-user"></i> by: {{ $blog->user->name }}</a></span>
              <span><a href="javascript:void(0)"><i class="fas fa-tags"></i>
                @php
                $tages = json_decode($blog->tage, true);
                $tage_data = '';
                 @endphp
                 @foreach($tages as $tage)
                 @php
                     print_r($tage.' ');
                 @endphp
                 @endforeach  
            </a></span>
          </div>
            <p>{{ $blog->description }}</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>