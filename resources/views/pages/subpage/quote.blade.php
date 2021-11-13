

<div class='quoteSection'>
  
  <div class='quoteOverlay quoteClose'></div>
  <div class='quoteContainer '>
      <div class='container'>
          <div class='containerCloseBtn quoteClose'><i class='ti ti-close'></i> </div>
          <h1 class='title'> Quote Now </h1>
          <p class='subtitle'> Your cloud, your way <i class='ti ti-heart'></i> </p>
          <div class='row'>
              <div class='col-12'>
                  <div class='form-section'>
                      {!! Form::open(['route' => 'feedback.submit','class'=>'hero-subscribe-from']) !!}
                          <input type='hidden' value='2' name='type'/>
                          <div class="form-row">
                              <div class="form-group col-12">
                                  <label>Service</label>
                                  <div class="row justify-content-center">
                                      <div class="col-12">
                                          <input class="checkbox-tools" type="radio" name='service' value='Website' id="tool-1" checked>
                                          <label class="for-checkbox-tools" for="tool-1">
                                          <i class='uil uil-line-alt'></i>
                                          Website 
                                          <small> Starting from RM 25/month</small>
                                          </label>
                                          <!--
                                                                  --><input class="checkbox-tools" value='Ecommerce' type="radio" name='service' id="tool-2">
                                          <label class="for-checkbox-tools" for="tool-2">
                                          <i class='uil uil-vector-square'></i>
                                          Ecommerce 
                                          <small> Starting from RM 40/month</small>
                                          </label>
                                          <!--
                                                                  --><input class="checkbox-tools" value='Booking' type="radio" name='service' id="tool-3">
                                          <label class="for-checkbox-tools" for="tool-3">
                                          <i class='uil uil-ruler'></i>
                                          Booking  System
                                          <small> Starting from RM 35/month</small>
                                          </label>
                                          <!--
                                                                  --><input class="checkbox-tools" value='Dashboard' type="radio" name='service' id="tool-4">
                                          <label class="for-checkbox-tools" for="tool-4">
                                          <i class='uil uil-crop-alt'></i>
                                          Dashboard 
                                          <small> Starting from RM 99/month</small>
                                          </label>
                         
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class='quoteForm'>
                            <div class="form-row">
                                <div class="form-group col-sm-6">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name='name' placeholder="Your full name" required>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" name='phone'  placeholder="Your phone number" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <label>Remark / Requirement </label>
                                    <textarea  class="form-control" name='content'  placeholder="Let us know your requirement" required></textarea>
                                </div>
                            </div>
                            <div class="form-row button-row">
                                <button type='button' class='btn btn-link quoteClose'>back</button>
                                <button type="submit" class="btn btn-primary submit-btn">Quote now</button>
                            </div>
                        </div>
                         
                      {!! Form::close() !!}
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>


