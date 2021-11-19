<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg position-fixed" data-toggle="modal" data-target="#add"
    style="right: 0; bottom: 0">
    +
</button>

<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
    <form action="{{ route('mail.post') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Write Email</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="to">To</label>
                        <input type="email" name="to" id="to" class="form-control" placeholder="To"
                            aria-describedby="to" required>
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" name="subject" id="subject" class="form-control" placeholder="Subject"
                            aria-describedby="subject" required>
                    </div>
                    <div class="form-group">
                        <label for="content">Message</label>
                        <textarea class="form-control" name="content" id="content"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="file">Attach File</label>
                        <input type="file" class="form-control-file" name="file" id="file[]" placeholder="Attach File"
                            aria-describedby="file" multiple>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Send</button>
                </div>
            </div>
        </div>
    </form>
</div>
