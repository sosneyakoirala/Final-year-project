

<!DOCTYPE html>
<html lang="en">
   <head>
      @include('frontend.includes.head')
   </head>
   <body>
      @include('frontend.includes.nav')
      <div class="page-header" style="background: url(frontasset/assets/img/banner1.jpg);">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="breadcrumb-wrapper">
                     <h2 class="product-title">Contact</h2>
                     <ol class="breadcrumb">
                        <li><a href="/"><i class="ti-home"></i> Home</a></li>
                        <li class="current">Contact</li>
                     </ol>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d27872.9280719231!2d87.23926569792708!3d26.662765341051735!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ef6c66e80fbfa9%3A0x38094d1a7c974283!2sItahari!5e0!3m2!1sen!2snp!4v1641352008042!5m2!1sen!2snp" width="1300" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      <section id="content">
         <div class="container">
            <div class="row">
               <div class="col-md-4">
                  <h2 class="medium-title">
                     Contact Us
                  </h2>
                  <div class="information">
                     <div class="contact-datails">
                        <div class="icon">
                           <i class="ti-location-pin"></i>
                        </div>
                        <div class="info">
                           <h3>Address</h3>
                           <span class="detail">Main Office: Itahari-06589 Street Name- Mahendra chowk</span>

                        </div>
                     </div>
                     <div class="contact-datails">
                        <div class="icon">
                           <i class="ti-mobile"></i>
                        </div>
                        <div class="info">
                           <h3>Phone Numbers</h3>
                           <span class="detail">Main Office: +977 9800995057</span>
                           <span class="datail">Customer Supprort: +025-580400 </span>
                        </div>
                     </div>
                     <div class="contact-datails">
                        <div class="icon">
                           <i class="ti-location-arrow"></i>
                        </div>
                        <div class="info">
                           <h3>Email Address</h3>
                           
                         
                           <span class="detail">Technical Support: Homeservices@gmail.com</span>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-8">
                  <form method="POST" action="/contact" class="contact-form" data-toggle="validator">
                     @csrf
                     <div class="row">
                        <div class="col-md-12">
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" required="" data-error="Please enter your name">
                                    <div class="help-block with-errors"></div>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <input type="text" class="form-control" id="email" name="email" placeholder="mail@gmail.com" required="" data-error="Please enter your email">
                                    <div class="help-block with-errors"></div>
                                 </div>
                              </div>
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <input type="text" placeholder="Subject" id="msg_subject" name="subject" class="form-control" required="" data-error="Please enter your subject">
                                    <div class="help-block with-errors"></div>
                                 </div>
                              </div>
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <textarea class="form-control" id="message" name="msg" placeholder="Message" rows="11" data-error="Write your message" required=""></textarea>
                                    <div class="help-block with-errors"></div>
                                 </div>
                              </div>
                              <div class="col-md-12">
                                 <button type="submit"  class="btn btn-common">Send Us</button>
                                 <div class="clearfix"></div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </section>
      @include('frontend.includes.scriptf')
      @include('frontend.includes.footer')
   </body>
</html>

