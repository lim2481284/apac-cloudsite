

<div class='contactSection'>
  
  <div class='contactOverlay contactClose'></div>
  <div class='contactContainer '>
      <div class='container'>
          <div class='containerCloseBtn contactClose'><i class='ti ti-close'></i> </div>
          <h1 class='title'> Contact </h1>
          <p class='subtitle'> Cloudsite love to hear from you <i class='ti ti-heart'></i> </p>
          <div class='contact-section row'>

              <div class='col-sm-6'>
                  <div class='contact-box'>
                      <h1> Get in touch </h1>
                      <p> <i class='ti ti-mobile'></i> +6011-58814566 </p>
                      <p> <i class='ti ti-email'></i> support@cloudsite.com.my </p>
                  </div>
              </div>
              <div class='col-sm-6'>
                  <div class='contact-box'>
                      <h1> Social media </h1>
                      <a href='https://www.facebook.com/Cloudsite-Solution-107670497624233/'><button class='btn btn-primary social-btn'> <i class='ti ti-facebook'></i> </button></a>
                      <a href='https://www.instagram.com/cloudsite.solution/'><button class='btn btn-primary social-btn'> <i class='ti ti-instagram'></i> </button></a>
                  </div>
              </div>
          </div>
          <div class='row'>
              <div class='col-12'>
                  <div class='form-section'>
                      {!! Form::open(['route' => 'feedback.submit','class'=>'hero-subscribe-from']) !!}
                          <input type='hidden' value='1' name='type'/>
                          <div class="form-row">
                              <div class="form-group col-12">
                                  <label>Name</label>
                                  <input type="text" class="form-control" name='name' placeholder="Your full name" required>
                              </div>
                          </div>
                          <div class="form-row">
                              <div class="form-group col-sm-6">
                                  <label>Phone</label>
                                  <input type="text" class="form-control" name='phone'  placeholder="Your phone number" required>
                              </div>
                              <div class="form-group col-sm-6">
                                  <label>Email</label>
                                  <input type="email" class="form-control" name='email' placeholder="Your email address" required>
                              </div>
                          </div>
                          <div class="form-row">
                              <div class="form-group col-12">
                                  <label>Message</label>
                                  <textarea  class="form-control" name='content'  placeholder="Drop us a message" required></textarea>
                              </div>
                          </div>
                          <div class="form-row button-row">
                              <button type='button' class='btn btn-link contactClose'>back</button>
                              <button type="submit" class="btn btn-primary submit-btn">Send us message</button>
                          </div>
                         
                      {!! Form::close() !!}
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>

