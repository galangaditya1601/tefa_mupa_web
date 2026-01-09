<x-backoffice.layout.main>
    <x-backoffice.partials.breadcrumb title="Profile / Sejarah" pretitle="Profile / Sejarah" />
    <div class="col-12">
        <div class="card">
            <div class="row row-cards">
                <div class="col-12">
                    <form class="card" method="POST" action="{{ route('history.update',$history) }}">
                        @csrf @method('PUT')
                        <div class="card-body">
                            <h3 class="card-title">Edit Profile/Sejarah</h3>
                            <div class="row row-cards">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Judul</label>
                                        <input type="text" class="form-control" name="title" placeholder="title"
                                            value="{{ $history->title ?? '-' }}">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-label">Gambar</div>
                                    <input type="file" class="form-control" name="file" />
                                </div>
                                @if(!empty($history->image) && $history->image !== '-')
                                    <div class="mb-3">
                                        <label class="form-label">Current Image</label>
                                        <br>
                                        <img src="{{ asset('storage/images/history/' . $history->image) }}" alt="History Image" style="max-width: 200px;">
                                    </div>
                                @endif
                                <div class="col-md-12">
                                    <div class="mb-3 mb-0">
                                        <label class="form-label">Body</label>
                                        <textarea rows="5" class="form-control" placeholder="Here can be your description" name="body">{!! $history->body !!}</textarea>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-primary">Update Profile</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-backoffice.layout.main>
