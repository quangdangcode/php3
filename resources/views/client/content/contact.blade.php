@extends('client.layouts.master')

@section('content')
<div class="container-fluid py-3">
    <div class="container">
        <div class="bg-light py-2 px-4 mb-3">
            <h3 class="m-0">Liên hệ với chúng tôi nếu có bất kỳ thắc mắc nào</h3>
        </div>
        <div class="row">
            <div class="col-md-5">
                <div class="bg-light mb-3" style="padding: 30px;">
                    <h6 class="font-weight-bold">Liên lạc</h6>
                    <p>Labore ipsum ipsum rebum erat amet nonumy, nonumy erat justo sit dolor ipsum sed, kasd lorem sit et duo dolore justo lorem stet labore, diam dolor et diam dolor eos magna, at vero lorem elitr</p>
                    <div class="d-flex align-items-center mb-3">
                        <i class="fa fa-2x fa-map-marker-alt text-primary mr-3"></i>
                        <div class="d-flex flex-column">
                            <h6 class="font-weight-bold">
                                Văn phòng của chúng tôi</h6>
                            <p class="m-0">123 Street, New York, USA</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <i class="fa fa-2x fa-envelope-open text-primary mr-3"></i>
                        <div class="d-flex flex-column">
                            <h6 class="font-weight-bold">Gửi email cho chúng tôi</h6>
                            <p class="m-0">info@example.com</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="fas fa-2x fa-phone-alt text-primary mr-3"></i>
                        <div class="d-flex flex-column">
                            <h6 class="font-weight-bold">Gọi cho chúng tôi</h6>
                            <p class="m-0">+012 345 6789</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="contact-form bg-light mb-3" style="padding: 30px;">
                    <div id="success"></div>
                    <form name="sentMessage" id="contactForm" novalidate="novalidate">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="control-group">
                                    <input type="text" class="form-control p-4" id="name" placeholder="Tên của bạn" required="required" data-validation-required-message="Please enter your name" />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="control-group">
                                    <input type="email" class="form-control p-4" id="email" placeholder="Email của bạn" required="required" data-validation-required-message="Please enter your email" />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <input type="text" class="form-control p-4" id="subject" placeholder="Chủ thể" required="required" data-validation-required-message="Please enter a subject" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <textarea class="form-control" rows="4" id="message" placeholder="Tin nhắn" required="required" data-validation-required-message="Please enter your message"></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div>
                            <button class="btn btn-primary font-weight-semi-bold px-4" style="height: 50px;" type="submit" id="sendMessageButton">Gửi tin nhắn</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection