{{-- Login --}}
<section class="vh-100 gradient-custom login">
  <div class="background"></div>
  
  <div class="container py-5 h-50">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <form action="/sertifikat" method="GET">
              <div class="mb-md-5 mt-md-4">
                <div class="mb-4">
                  <img src="/img/logo1.png" width="100" alt="TitiKoma" class="img-fluid">
                </div>
                <h2 class="fw-bold mb-2 text-uppercase">Validate Certificate</h2>
                <p class="text-white-50 mb-5">Please enter your id certificate!</p>
  
                <div class="input-group form-outline form-white mb-4">
                  <input type="text" placeholder="Enter Certificate ID" class="form-control form-control-lg" name="search" required/>
                  <button class="btn btn-outline-light btn-lg px-5" type="submit">Validate</button>
                </div>
                <p class="mb-0">The Certificate ID can be found at the E-Ticket of each others.
                <hr>
                <p class="mb-0">Login with id user? <a href="/login" class="text-white-50 fw-bold">Login</a>
                </p>
              </div>

            </form>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
{{-- Akhir Login --}}
