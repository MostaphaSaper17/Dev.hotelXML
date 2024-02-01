<!--Navigation Start-->
<div id="top-header-menu-area">
    <div class="menu-area menu-sticky">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-3" >
            <div class="logo-area"> <a class="main--logo" href="{{ route('agent.home') }}"><img src="{{ asset('website/images/logo.png') }}" alt="logo"></a> </div>
          </div>
          <div class="col-sm-9" >
            <div id="main-nav" class="stellarnav">
              <ul>
                @if(Auth::guard('agent')->user())<li><a href="{{ route('agent.home') }}">Search</a></li>
                @else<li><a href="{{ route('employee.home') }}">Search</a></li>
                @endif
                @if(Auth::guard('agent')->user())<li><a href="{{ route('agent.booking-list') }}">Manage Orders</a></li>@endif
                <li>
                    <a href="#!" data-toggle="modal" data-target="#st-modal-show-statements">Reporting</a>
                </li>
              </ul>

              <ul class="list-right">
                  <li>
                      <a href="#"><i class="fas fa-language"></i> Eng</a>
                  </li>
                  @if(Auth::guard('agent')->user())<li>
                      <a href="#"><i class="fas fa-dollar-sign"></i> {{ Auth::guard('agent')->user() ? Auth::guard('agent')->user()->currency : '' }}</a>
                  </li>@endif
                  <li class="{{  \App\Models\Notification::where('user_type',Auth::guard('agent')->user()->company_name)->where('isRead','0')->count() > 0 ? 'notification-icon' : '' }}">
                    <a href="{{ route('agent.profile') }}"><i class="fas fa-headset"></i> Support</a>
                  </li>
                  <li class="line-en">
                        <a>Hi, {{ Auth::guard('agent')->user() ? Auth::guard('agent')->user()->person_name : Auth::guard('employee')->user()->first_name }}</a>
                  </li>
                  <li>
                    @if(Auth::guard('agent')->user())<a href="{{ route('agent.profile') }}"> Agent Profile</a>@endif
                    @if(Auth::guard('employee')->user())<a href="{{ route('employee.profile') }}"> Staff Profile</a>@endif
                      <li>
                        <a class="btn" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i>
                            logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                   </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade modal-map show-statements-modal-pop-box" id="st-modal-show-statements" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i
                        class="input-icon field-icon page-small-icon"><img src="images/close-icon.svg"
                            alt=""></i></button>
                <h4 class="modal-title">Download Historical Statement</h4>
            </div>
            <div class="modal-body">

                <form method="post" action="{{ route('agent.generateReport') }}" target="_blank">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-extra-field dropdown clearfix field-detination">
                                <div class="dropdown">
                                    <label>Order</label>
                                    <select name="order" id="order" class="inputg" required="">
                                        <option value="">Select Order</option>
                                        <option value="Booking">Booking</option>
                                        <option value="Transaction">Transaction</option>
                                        <option value="Sales">Sales</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 border-right">
                            <div class="form-group form-extra-field dropdown clearfix field-detination">
                                <label>Type</label>
                                <div class="dropdown" id="TypeDiv">
                                    <!-- Type select will be dynamically added here -->
                                </div>
                            </div>
                        </div>


                        <div class="clearfix"></div>
                        <div class="col-md-12 mobile-hide-hr"><hr></div>
                        <div class="clearfix"></div>
                        <div class="col-md-6 border-right">
                            <h5 class="sp-mar-20"></h5>
                            <div class="search-form-wrapper mobile-form-gap">
                            <div class="search-form horizontal-search-area">
                                    <div class="form-group form-date-field form-date-search clearfix  has-icon " data-format="DD/MM/YYYY">
                                        <i class="input-icon field-icon"><img src="hotel-support/images/calandar-icon.png" alt=""></i>
                                        <div class="date-wrapper clearfix">
                                            <div class="check-in-wrapper">

                                                <label>Specific Date</label>
                                                <div class="inputg check-in-render">Place Specific Date</div>
                                            </div>
                                        </div>
                                        <!-- <input type="hidden" class="check-in-input" value="01/07/2019" name="start">
                                        <input type="text" class="check-in-out" value="01/07/2019 10:11 am-02/07/2019 10:11 am" name="date"> -->
                                        <input type="hidden" name="hiddendaterange5" id="hiddendaterange5">
                                        <input type="text" id="daterange5" class="form-control" name="daterange5" value="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6"><h5 class="sp-mar-20">OR</h5></div>
                        <div class="clearfix"></div>
                        <div class="col-md-12 mobile-hide-hr"><hr></div>
                        <div class="clearfix"></div>
                        <div class="col-md-6 border-right">
                            <div class="search-form-wrapper mobile-form-gap">
                                <div class="search-form horizontal-search-area">
                                    <div class="form-group form-date-field form-date-search clearfix  has-icon " data-format="DD/MM/YYYY">
                                        <i class="input-icon field-icon"><img src="hotel-support/images/calandar-icon.png" alt=""></i>
                                        <div class="date-wrapper clearfix">
                                            <div class="check-in-wrapper">

                                                <label>Date Range From</label>
                                                <div class="inputg check-in-render">Place Date Range From</div>
                                            </div>
                                        </div>
                                    <input type="hidden" name="hiddendaterange6" id="hiddendaterange6">
                                    <input type="text" id="daterange6" class="form-control" name="daterange6" value="" />
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="search-form-wrapper mobile-form-gap">
                                <div class="search-form horizontal-search-area">
                                    <div class="form-group form-date-field form-date-search clearfix  has-icon " data-format="DD/MM/YYYY">
                                        <i class="input-icon field-icon"><img src="hotel-support/images/calandar-icon.png" alt=""></i>
                                        <div class="date-wrapper clearfix">
                                            <div class="check-in-wrapper">
                                                <label>Date Range To</label>
                                            </div>
                                        </div>
                                        <input type="hidden" name="hiddendaterange7" id="hiddendaterange7">
                                    <input type="text" id="daterange7" class="form-control" name="daterange7" value="" />
                                    </div>
                                    </div>
                                    </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-12 mobile-hide-hr"><hr></div>
                        <div class="clearfix"></div>

                        {{-- <div class="col-md-4 border-right">
                            <div class="form-group form-extra-field dropdown clearfix field-detination">
                                <div class="dropdown">
                                    <label>Download Format</label>
                                    <select name="" id="" class="inputg" required="">
                                        <option value="PDF">PDF</option>
                                        <option value="Print">Print</option>
                                        <option value="Excel">Excel</option>
                                    </select>

                                </div>
                            </div>
                        </div> --}}



                        <div class="col-md-4 border-right">
                            <button class="btn btn-success btn-search full-width-btn mt20" type="submit">Fetch Statement</button>
                        </div>
                        <div class="col-md-4">
                                <button class="btn btn-danger btn-search full-width-btn mt20" type="submit">Cancel</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Add an event listener to the "Order" dropdown
    document.getElementById('order').addEventListener('change', function() {
        var selectedOrder = this.value; // Get the selected value

        // Define the options based on the selected order
        var typeOptions = '';

        if (selectedOrder === 'Booking') {
            typeOptions = '<select name="type" id="type" class="inputg" required=""><option value="">Select Type</option><option value="all">All</option><option value="confirm">Confirm</option><option value="complete">Complete</option><option value="cancel">Cancel</option></select>';
        } else if (selectedOrder === 'Transaction') {
            typeOptions = '<select name="type" id="type" class="inputg" required=""><option value="">Select Type</option><option value="all">All</option><option value="debit">Debit</option><option value="credit">Credit</option></select>';
        } else if (selectedOrder === 'Sales') {
            typeOptions = '<select name="type" id="type" class="inputg" required=""><option value="">Select Type</option><option value="complete">Complete - Paid</option></select>';
        }

        // Replace the content of TypeDiv with the dynamically generated select
        document.getElementById('TypeDiv').innerHTML = typeOptions;
    });
</script>
<!-- Popup Statements End-->
  <!--Navigation End-->
