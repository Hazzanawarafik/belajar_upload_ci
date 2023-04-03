<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title><?= $title; ?></title>
  </head>
  <body>
    <div class="container">
        <div class="row mt-3">
          <div class="col-sm-12">  
            <h3>Single Upload</h3>
            <h4 class="text-danger"><?= $this->session->flashdata('status'); ?></h4>
            <div class="card">
              <div class="card-header">
                Upload Image
              </div>
              <div class="card-body">
                <?= form_open_multipart('upload/file'); ?>
                  <div class="form-group row">
                    <label for="image" class="col-sm-2 col-form-label">Gambar</label>
                    <div class="col-sm-8">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image">
                        <label class="custom-file-label" for="image">Choose file</label>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                  </div>
                  <?= form_close(); ?>
              </div>
            </div>
          </div>
          <div class="col-sm-12 mt-2">  
            <div class="card">
              <div class="card-header">
                Hasil Upload
              </div>
              <div class="card-body">
                <div class="row">
                  <?php if($images): ?>
                  <?php foreach($images as $value): ?>
                    <div class="col-sm-4 p-2">
                      <img src="<?= base_url('uploads/image/'.$value['image']); ?>" class="img-thumbnail" alt="<?= $value['title']; ?>">
                    </div>
                  <?php endforeach ?>
                  <?php else: ?>
                    <div class="col-sm-4">
                      <h3 class="text-danger">Data Masih Kosong</h3>
                    </div>
                  <?php endif;  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
    <script>
      $('.custom-file-input').on('change',function(){
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass('selected').html(fileName);
      });
    </script>
  </body>
</html>