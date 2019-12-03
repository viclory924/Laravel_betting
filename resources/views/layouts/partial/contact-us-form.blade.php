<!-- Contact Us Form Box -->
<div class="modal fade contact-us-form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Send Us an Email</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>You can contact our live support between 08:00 - 21:00 CET. If you need to contact us at other times please do not hesitate to call us or send us an e-mail by filling form below.</p>
                <p>Coustmer Support Monday to Friday 09.00-18.00</p>
                <div class="form-wrapper">
                    <form action="{{ URL::to('/contact-us') }}" method="post" name="contact-us-form">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" required class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" required name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control" required name="message" id="message" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary submit-button">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>