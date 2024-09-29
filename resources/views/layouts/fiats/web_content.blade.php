@include('layouts.fiats.web_header')

<div class="light-wrapper" style="display: none;">
    <div class="container inner">
        <div class="row story">
            <div  class="text-center">
                <div class="col-xs-12 home-extra">
                    
                    <div class="col-xs-12"><span class="home-heading">Fiat Scriptura</span></div>
                    
                </div>
                <div class="col-xs-12">
                    <div class="col-xs-4"></div>
                    <div class="col-xs-4"><span class="home-heading-line"></span></div>
                    <div class="col-xs-4"></div>
                </div>

            </div>
            <div class="col-sm-12">
                <div class="col-wrapper" >
                    <p>Proudly presenting the portal fiatscriptura.org for the registration of the book writing competition, “Fiat Scriptura” which is entering to the fourth season in the year of 2017. We thank all our past participants for making the competition a big success.</p>
                    <p>Fiat scriptura is an a endeavor by Fiat Mission started in the year 2013. To familiarise the ability of writing to the people. It appeared to many as a great opportunity to get closer to the writing practises. The overwhelming success of the program promote us to take forward the competition to the coming years and better heights.</p>
                    <p>Our past competitions proved the need of a competition and its importance with the participation of more than 3000 participants in the years before. We are expecting a minimum 30% growth a year and be one of the leading competition of its kind in the country soon in coming years.</p>
                </div>
            </div>
        </div>
        <!-- /.services -->
    </div>
    <!-- /.container -->
</div><!-- #about -->

<div id="about" class="home-anchor-temp">Ywllow Donw</div>
<div class="light-wrapper" style="background-color:#EFF0F1;">
    <div class="container inner">
        <div class="row story">
            <div  class="text-center">
                <div  class="text-center">
                    <div class="col-xs-12 home-extra">
                        
                        <div class="col-xs-12"><span class="home-heading">About Us</span></div>
                        
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-4"></div>
                        <div class="col-xs-4"><span class="home-heading-line"></span></div>
                        <div class="col-xs-4"></div>
                    </div>

                </div>
            </div>
            <div class="col-sm-12">
                <div class="col-wrapper" >
                    <p>Proudly presenting the portal fiatscriptura.org for the registration of the book writing competition, “Fiat Scriptura” which is entering to the fourth season in the year of 2017. We thank all our past participants for making the competition a big success.</p>
                    <p>Fiat scriptura is an a endeavor by Fiat Mission started in the year 2013. To familiarise the ability of writing to the people. It appeared to many as a great opportunity to get closer to the writing practises. The overwhelming success of the program promote us to take forward the competition to the coming years and better heights.</p>
                    <p>Our past competitions proved the need of a competition and its importance with the participation of more than 3000 participants in the years before. We are expecting a minimum 30% growth a year and be one of the leading competition of its kind in the country soon in coming years.</p>
                </div>
            </div>
        </div>
        <!-- /.services -->
    </div>
    <!-- /.container -->
</div><!-- #about -->


<div id="contactus" class="home-anchor">Blue Down</div>


<div class="light-wrapper">
    <div class="container inner">
        
        <div class="row story">
            

            <div  class="row text-center">
                <div  class="col-xs-12">
                    <div class="col-xs-12 home-extra" >
                        <div class="col-xs-12"><span class="home-heading">Contact Us</span></div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-4"></div>
                        <div class="col-xs-4"><span class="home-heading-line"></span></div>
                        <div class="col-xs-4"></div>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="well well-sm">
                    <form id="idContactUs" method="post" action="<?php echo action('HomeController@send');?>" >
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">
                                        Name</label>
                                    <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
                                </span>
                                        <input name="name" type="text" class="form-control" id="name" placeholder="Enter your name" required="required" /></div>
                                        <label id="eName" />
                                </div>
                                <div class="form-group">
                                    <label for="email">
                                        Email Address</label>
                                    <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                        <input name="email" type="email" class="form-control" id="email" placeholder="Enter your email" required="required" /></div>
                                        <label id="eEmail" />
                                </div>
                                <div class="form-group">
                                    <label for="subject">
                                        Mobile No.</label>
                                    <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span>
                                </span>
                                        <input name="phone" type="phone" class="form-control" id="phone" placeholder="Enter your phone no." required="required" /></div>
                                        <label id="ePhone" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">
                                        Message</label>
                                    <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required"
                                              placeholder="Message"></textarea>
                                    <label id="eMessage" />
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-md-6" id="idSuccessFailureMsgWrap">
                                    <div id="idSuccessMsg"></div>
                                    <div id="idFailureMsg"></div>
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-warning pull-right">Send <span class="glyphicon glyphicon-send"></span></button>
                                </div>
                            </div>
                        </div>
                        <input id="token" type="hidden" value="{{ csrf_token() }}" name="_token">
                    </form>
                </div>
            </div>
            <div class="col-md-4" >
                <form>
                    <legend><span class="glyphicon glyphicon-globe"></span> Our Location</legend>
                    <address>
                        <strong>Fiat Scriptura,</strong><br>
                        TC 7/501, St. Antony's Street, <br>
                        Kuriachira, Thrissur - 680006<br>
                        
                    </address>
                    <address>
                        Email : fiatscriptura@gmail.com <a href="mailto:fiatscriptura@gmail.com"></a>
                    </address>
                </form>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript">

function doValidation() {
    return true ;
}

submitForm('idContactUs', doValidation, function (data) {

}, '', true, {} );
</script>

@include('layouts.fiats.web_footer')