<style>
   .custom-title {
      text-align: center;
      margin-bottom: 1.5rem;
      font-size: 2rem;
      font-weight: bold;
   }

   .custom-img-container {
      max-width: 300px; /* Ubah lebar sesuai kebutuhan */
      max-height: 500px; /* Ubah tinggi sesuai kebutuhan */
      overflow: hidden;
      position: relative;
      border-radius: 0.5rem; /* Opsional: menambahkan border radius */
   }

   .custom-img {
      width: 100%;
      height: 100%;
      object-fit: contain; /* Atur agar gambar menyesuaikan dengan kontainer */
   }
</style>

<div class="container my-5">
   <h1 class="custom-title">Full Page</h1>
   <div class="row">
      <div class="col-md-4">
         <div class="custom-img-container">
            <img src="<?= base_url('/assets/uploads/coverBook/1724420818_cover.jpg') ?>" alt="Image Error" class="custom-img">
         </div>
      </div>
      <div class="col-md-8">
         <div class="card-body">
            <p>
               Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex non doloremque fugit?
               Hic, veritatis quas praesentium saepe corporis quia quibusdam facere deleniti
               aspernatur exercitationem aperiam accusantium eos odit aliquam quidem.
            </p>
         </div>
      </div>
   </div>
</div>