<div class="depo">
    <div class="modal fade deposit-modal" id="player-deposit-modal" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close"
                            data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">
                        Deposit
                    </h4>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">

                    <form class="form-horizontal" role="form" action="{{ URL::to('/deposit') }}" method="post">
                        <input type="hidden" name="payment_method" value="MBKR">
                             @if(count($bonuses)>0)
                                 <div class="form-group">
                                    <label  class="col-sm-2 control-label" for="inputEmail3">Bonus</label>
                                    <div class="col-sm-10">
                                    <select class="form-control" id="bonuses" name="bonus_id">
                                        <option value="0">Select any one of them for get Bonus</option>
                                        @foreach($bonuses as $bonus)
                                            <option value="{{ $bonus->id }}">{{ $bonus->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                </div/>
                                @endif
                        <div class="form-group">
                            <label  class="col-sm-2 control-label" for="inputEmail3">Amount</label>
                            <div class="col-sm-10">
                                {{csrf_field()}}

                                <input type="hidden" id="merchant_id" name="merchant_id" value="{{env('MERCHANT_ID')}}">
                                <input type="number" required class="form-control" id="amount" name="amount" placeholder="Enter amount to deposit">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary">Done</button>
                            </div>
                        </div>
                    </form>

                </div>


            </div>
        </div>
    </div>

</div>