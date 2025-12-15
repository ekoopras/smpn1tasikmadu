

<div class="container">
    <div class="col-md-4">
    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="fw-bold mb-3">Sidebar</h5>
            <ul class="list-unstyled">
                <li><a href="#">Artikel Terbaru</a></li>
                <li><a href="#">Kategori</a></li>
                <li><a href="#">Tag</a></li>
            </ul>
        </div>
    </div>
</div>
</div>


{{-- <!-- SIDEBAR -->
        

            <!-- SEARCH -->
            <div class="mb-4">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search...">
                    <button class="btn btn-primary"><i class="bi bi-search"></i></button>
                </div>
            </div>

            <!-- RECENT POSTS -->
            <h5 class="fw-bold mb-3">Recent Posts</h5>

            <div class="recent-post d-flex mb-3">
                <img src="{{ asset('storage/' . $post->thumbnail) }}" class="me-3">
                <div>
                    <p class="m-0 fw-semibold">
                        {{ implode(' ', array_slice(explode(' ', $post->title), 0, 8)) }}
                            {{ str_word_count($post->title) > 8 ? '...' : '' }}
                    </p>
                    <small class="text-muted"><i class="bi bi-calendar"></i> {{ $post->created_at->format('d M Y') }}</small>
                </div>
            </div>

            <!-- CATEGORIES -->
            <h5 class="fw-bold mt-4">Categories</h5>
            <ul class="list-unstyled mt-3">
                @foreach ($categorys as $ct)
                <li class="d-flex justify-content-between mb-2">{{ $ct->name }} <span>(3)</span></li>
                @endforeach
                
            </ul> --}}

