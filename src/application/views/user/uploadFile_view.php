<div class="container mt-5 text-center">
    <div class="card w-50 mx-auto">
        <div class="card-body">
            <h5 class="card-title">Upload bukti pembayaran</h5>
            <?= $this->session->flashdata('message'); ?>
            <?= form_open_multipart('user/do-upload'); ?>
            <div class="custom-file mb-3">
                <input type="file" class="custom-file-input" id="customFile" name="file">
                <label class="custom-file-label" for="customFile">Choose file</label>
            </div>

            <button type="submit" class="btn btn-primary">Upload</button>
            </form><br>
            <a href='../user' class='btn btn-primary'>Back</a>
        </div>
    </div>
</div>