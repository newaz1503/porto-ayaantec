
<div class="card">
    <div class="card-header bg-dark text-white">
        <h4 class="card-title justy__between"><span> Your Calendly  Information</span> <a href="" class="btn btn-success btn-sm" data-toggle="modal" data-target="#update__calendly" data-whatever="@mdo">Update your Banner</a></h4>
    </div>
    <div class="card-body">
        <div class="row m-0">
            <div class="col-lg-12">
                <div class="row m-0">
                    <div class="col-lg-12">
                            <div class="card border-dark">
                                <div class="card-body">
                                    <h4>Button Name : {{ setting()->calendly_button_name }}</h4>
                                    <br/>
                                    <p class="card-text">{{ setting()->calendly_code }}</p>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <!-- column -->
        </div>
        
        <div class="modal" id="update__calendly" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-success text-white">
                        <h4 class="modal-title" id="exampleModalLabel1">Update Calendly Information</h4>
                        <br/>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="{{ route('backend.calendly.update','info') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                    <div class="modal-body text-left">
                                                          
                                 <div class="form-group text-left">
                                    <label for="message-text" class="control-label">Button Name</label>
                                    <input class="form-control" id="message-text1" placeholder="Enter your Name" name="calendly_button_name" value="{{ setting()->calendly_button_name }}"/>
                                </div>
                                
                                <div class="form-group text-left">
                                    <label for="message-text" class="control-label">Calendly Code</label>
                                    <textarea class="form-control" id="message-text1" placeholder="Enter your Description" name="calendly_code">{{ setting()->calendly_code }}</textarea>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="sumit" class="btn btn-primary">Save and Change</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>