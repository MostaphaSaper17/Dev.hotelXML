@extends('layouts.agent')
@section('content')
<div class="clearfix"></div>
<div id="st-content-wrapper" class="search-result-page">
    <div class="container-lg">
        <!--Top Horizontal Search-->

        <div  class="modal fade modal-map st-modal-show-map2 "  id="st2"  role="dialog1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Map View Hotels</h4>
                        <button type="button" class="btn-close close "  data-dismiss="modal" style="padding: 0;margin: 0;display: flex;justify-content: center;align-items: center;">
                            <span>x</span></button>


                    </div>
                    <div class="modal-body">
                        <div class="st-map">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3473006.9447390377!2d-9.393883143804752!3d31.78116652402345!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd0b88619651c58d%3A0xd9d39381c42cffc3!2sMorocco!5e0!3m2!1sen!2sin!4v1561371930612!5m2!1sen!2sin"
                                width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div  class="modal fade modal-map st1-modal-show-map2" style=""  id="st1"  role="dialog1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Hotel Name</h4>
                        <button type="button" class="btn-close close "  data-dismiss="modal" style="padding: 0;margin: 0;display: flex;justify-content: center;align-items: center;">
                            <span>x</span></button>


                    </div>
                    <div class="modal-body">
                        <div class="st-map">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3473006.9447390377!2d-9.393883143804752!3d31.78116652402345!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd0b88619651c58d%3A0xd9d39381c42cffc3!2sMorocco!5e0!3m2!1sen!2sin!4v1561371930612!5m2!1sen!2sin"
                                width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class=" row change-search-goggle-area">
            <div class="col-md-12">
                <div class="d-flex box-content">
                    <div class="d-flex">
                        <div class="form-group form-extra-field dropdown clearfix field-detination has-icon">
                            <i class="fas fa-map-marker-alt input-icon field-icon" ></i>
                            <div class="dropdown">
                                <label>Destination / Property Name</label>
                                <div class="inputg check-in-render">Cairo</div>

                            </div>
                        </div>
                        <div class="form-group form-date-field form-date-search clearfix  has-icon " data-format="DD/MM/YYYY">
                            <i class="far fa-calendar-alt input-icon field-icon"></i>
                            <div class="date-wrapper clearfix">
                                <div class="check-in-wrapper">
                                    <label>Stay Dates</label>
                                    <div class="inputg check-in-render">Sep 13 2023 - Sep 19 2023</div>
                                </div>
                            </div>

                        </div>
                        <div class="form-group form-date-field form-date-search clearfix  has-icon " data-format="DD/MM/YYYY">
                            <i class="fa-solid fa-people-group"></i>
                            <div class="date-wrapper clearfix">
                                <div class="check-in-wrapper">
                                    <label>Guests</label>
                                    <div class="inputg check-in-render"> 2 Adults - 0 Child -  1 Room</div>
                                </div>
                            </div>

                        </div>
                        <div class="form-group form-date-field form-date-search clearfix  has-icon " data-format="DD/MM/YYYY">
                            <i class="fa-regular fa-flag"></i>
                            <div class="date-wrapper clearfix">
                                <div class="check-in-wrapper">
                                    <label>Nationality </label>
                                    <div class="inputg check-in-render">Egypt</div>
                                </div>
                            </div>

                        </div>
                    </div>
                        <button type="button" class="btn-show-price btn btn-secondary uppe" data-toggle="modal" data-target="#openFilter">
                        Change Search
                      </button>
                </div>
            </div>
            <div class="col-md-2">

            </div>
        </div>
    </div>
    <div class="container">
        <div class="clearfix"></div>

        <div class="clearfix"></div>
        <!-- Modal -->
        <div id="openFilter" class="modal fade hotel-popUp" role="dialog3">
            <div class="modal-dialog">
              <div class="modal-content">

                <div class="modal-footer form-en-modal" style="border: none;">

                    <div class="">
                         <!-- form complex example -->
                         <div class=" row form-row mt-4">
                            <!-- Account section -->
                            <div class="col-sm-6 pb-3">
                                <label for="name_hotel">Destination / Hotel Name*</label>
                                <input type="text" class="form-control" id="name_hotel" placeholder="Enter City Destination / Hotel name">
                            </div>

                            <div class="col-sm-5 pb-3">
                                <div class="d-flex container-chek">
                                    <div class="w-100 col-2">
                                        <label for="exampleCtrl">Check In -Check Out</label>
                                        <!-- Hidden input to store the selected date range -->
                                        <input type="hidden" name="hiddendaterange" id="hiddendaterange">
                                        <input type="text" id="daterange1" class="form-control" name="daterange" value="" />
                                    </div>
                                    <!-- <div>
                                        <label for="check_out">Check Out</label>
                                        <input type="date" class="form-control" id="check_out" placeholder="Check Out">
                                    </div> -->
                                </div>
                            </div>
                            <div class="col-sm-1 pb-3">
                                <label for="">Nights</label>
                                <input type="text" class="form-control" disabled id="nights" placeholder="1">
                            </div>
                            <div class="col-sm-6 pb-3" style="position: relative;">
                                <label for="">Room & Guests</label>
                                <div id="output" class="output-room"></div>
                                <div class="filter-booking">
                                    <div id="rooms-container">
                                        <!-- Room template that will be cloned for each new room -->
                                        <div class="room" id="room-template">
                                            <div class="room-header">
                                                <span class="room-title">Room 1</span>
                                                <button class="remove-room"  style="display: none;">Remove</button>
                                            </div>
                                            <div class="guests">
                                                <div class="adults">
                                                    <label>Adults</label>
                                                    <div class="d-flex">
                                                        <button class="minus">-</button>
                                                        <input type="text" value="2" readonly class="form-control">
                                                        <button class="plus">+</button>
                                                    </div>
                                                </div>
                                                <div class="children">
                                                    <label>Children</label>
                                                    <div class="children-ages"></div>
                                                    <button class="add-child">Add a child</button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End of Room template -->
                                        <button id="add-room">+ Add a room</button>
                                    </div>
                                    <button id="done">Done</button>

                                </div>


                            </div>
                            <div class="col-sm-3 pb-3">
                                <label for="nationality">Nationality</label>
                                <select name="nationality "  id="select">
                                    <option value="egypt">Egypt</option>
                                    <option value="italy">Italy</option>
                                </select>
                            </div>
                            <div class="col-sm-3 pb-3">
                                <label for="hotel_name">Hotel Name <span>(Optional)</span></label>
                                <input type="text" class="form-control" id="hotel_name" placeholder="Place Hotel Name">
                            </div>
                            <div class="col-sm-12 pb-3 d-flex justify-content-center">
                                <button class="btn btn-primary"><i class="fas fa-search"></i> Search Hotel</button>

                            </div>
                        </div>
                        </div>

                    <!-- <div class="search-result-page">
                        <div class="search-form-wrapper index-slider-form horizontal-search-area ">
             <div class="search-form hotel-service">

                 <form action="" class="form" method="">

                 <div class="row">


                         <div class="col-md-11">
                             <div class="form-group form-extra-field dropdown clearfix field-detination has-icon">
                                 <i class="fas fa-map-marker-alt input-icon field-icon" style=" margin-left: 5px;"></i>
                                 <div class="dropdown">
                                     <label>Destination / Property Name</label>
                                     <input type="text" id="" name="" value="" class="inputg" placeholder="Search By City Or Hotel" autocomplete="off">
                                 </div>
                             </div>
                         </div>
                         <div class="col-md-1">
                            <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close"></button>


                         </div>
                         <div class="col-md-4  border-right">
                             <div class="form-group form-date-field form-date-search clearfix  has-icon " data-format="DD/MM/YYYY">
                                 <i class="far fa-calendar-alt input-icon field-icon"></i>
                                 <div class="date-wrapper clearfix">
                                     <div class="check-in-wrapper">
                                         <label>Check In</label>
                                         <div class="inputg check-in-render">01/07/2019</div>
                                     </div>
                                 </div>
                                 <input type="hidden" class="check-in-input" value="01/07/2019" name="start">
                                 <input type="text" class="check-in-out" value="01/07/2019 10:11 am-02/07/2019 10:11 am" name="date">
                             </div>
                         </div>
                         <div class="col-md-4 border-right">
                             <div class="form-group form-date-field form-date-search clearfix  has-icon " data-format="DD/MM/YYYY">
                                 <i class="far fa-calendar-alt input-icon field-icon"></i>
                                 <div class="date-wrapper clearfix">
                                     <div class="check-in-wrapper">
                                         <label>Check Out</label>
                                         <div class="inputg check-out-render">02/07/2019</div>
                                     </div>
                                 </div>
                                 <input type="hidden" class="check-out-input" value="02/07/2019" name="end">
                                 <input type="text" class="check-in-out" value="01/07/2019 10:11 am-02/07/2019 10:11 am" name="date">
                             </div>
                         </div>

                         <div class="col-md-4">
                             <div class="form-group form-extra-field dropdown clearfix field-detination has-icon">
                                 <i class="fas fa-bed input-icon field-icon"></i>
                                 <div class="dropdown">
                                     <label>Nights</label>
                                     <input type="text" id="" name="" value="" class="inputg" placeholder="1 night" autocomplete="off">
                                 </div>
                             </div>
                         </div>

                         <div class="clearfix"></div>
                         <div class="col-md-12 mobile-hide-hr"><hr></div>
                         <div class="clearfix"></div>

                         <div class="col-md-2 border-right">
                             <div class="form-group form-extra-field dropdown clearfix field-detination">
                                 <div class="dropdown">
                                     <label>Rooms</label>
                                     <select name="" id="" class="inputg" required="">
                                        <option value="1" selected="">1</option>
                                         <option value="2">2</option>
                                         <option value="3">3</option>
                                         <option value="4">4</option>
                                     </select>

                                 </div>
                             </div>
                         </div>

                         <div class="col-md-2 border-right">
                             <div class="form-group form-extra-field dropdown clearfix field-detination">
                                 <div class="dropdown">
                                     <label>Adult</label>
                                     <select name="" id="" class="inputg" required="">
                                         <option value="1" selected="">1</option>
                                         <option value="2">2</option>
                                         <option value="3">3</option>
                                         <option value="4">4</option>
                                         <option value="5">5</option>
                                         <option value="6">6</option>
                                     </select>

                                 </div>
                             </div>
                         </div>
                         <div class="col-md-2 border-right">
                             <div class="form-group form-extra-field dropdown clearfix field-detination">
                                 <div class="dropdown">
                                     <label>Child</label>
                                     <select name="" id="" class="inputg" required="">
                                         <option value="1" selected="">1</option>
                                         <option value="2">2</option>
                                         <option value="3">3</option>
                                     </select>

                                 </div>
                             </div>
                         </div>


                         <div class="clearfix"></div>
                         <div class="col-md-12 mobile-hide-hr"><hr></div>
                         <div class="clearfix"></div>

                         <div class="col-md-4 border-right">
                             <div class="form-group form-extra-field dropdown clearfix field-detination">
                                 <div class="dropdown">
                                     <label>Hotel Name <span>(optional)</span></label>
                                     <input type="text" id="" name="" value="" class="inputg" placeholder="Place hotel name" autocomplete="off">
                                 </div>
                             </div>
                         </div>
                         <div class="col-md-4 border-right">
                             <div class="form-group form-extra-field dropdown clearfix field-detination">
                                 <div class="dropdown">
                                     <label>Nationality</label>
                                     <select name="" id="" class="inputg" required="">
                                         <option value="1">Afghanistan</option>
                                         <option value="2">Albania</option>
                                         <option value="3" selected="">Algeria</option>
                                     </select>

                                 </div>
                             </div>
                         </div>
                         <div class="col-md-4">
                             <button class="btn btn-secondary btn-search full-width-btn mt20" type="submit">Search</button>
                             </div>






                 </div>
                </form>

             </div>
         </div>
                     </div> -->
                </div>
              </div>
            </div>
        </div>







            <div class="search-form-wrapper horizontal-search-area collapse" id="change-search-goggle">
            <div class="search-form hotel-service">
                <!--Address-->

                <div class="row">
                    <form action="" class="form" method="">
                        <div class="col-md-3 border-right">
                            <div class="form-group form-extra-field dropdown clearfix field-detination has-icon">
                                <i class="fas fa-map-marker-alt input-icon field-icon" style=" margin-left: 5px;"></i>
                                <div class="dropdown">
                                    <label>Destination / Property Name</label>
                                    <input type="text" id="" name="" value="" class="inputg" placeholder="Search By City Or Hotel" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 border-right">
                            <div class="form-group form-date-field form-date-search clearfix  has-icon "
                                data-format="DD/MM/YYYY">
                                <i class="far fa-calendar-alt input-icon field-icon"></i>

                                <div class="date-wrapper clearfix">
                                    <div class="check-in-wrapper">
                                        <label>Check In</label>
                                        <div class="inputg check-in-render">01/07/2019</div>
                                    </div>
                                </div>
                                <input type="hidden" class="check-in-input" value="01/07/2019" name="start">
                                <input type="text" class="check-in-out" value="01/07/2019 10:11 am-02/07/2019 10:11 am" name="date">
                            </div>
                        </div>
                        <div class="col-md-3 border-right">
                            <div class="form-group form-date-field form-date-search clearfix  has-icon " data-format="DD/MM/YYYY">
                                <i class="far fa-calendar-alt input-icon field-icon"></i>
                                <div class="date-wrapper clearfix">
                                    <div class="check-in-wrapper">
                                        <label>Check Out</label>
                                        <div class="inputg check-out-render">02/07/2019</div>
                                    </div>
                                </div>
                                <input type="hidden" class="check-out-input" value="02/07/2019" name="end">
                                <input type="text" class="check-in-out" value="01/07/2019 10:11 am-02/07/2019 10:11 am" name="date">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group form-extra-field dropdown clearfix field-detination has-icon">
                                <i class="fas fa-bed input-icon field-icon"></i>

                                <div class="dropdown">
                                    <label>Nights</label>
                                    <input type="text" id="" name="" value="" class="inputg" placeholder="1 night" autocomplete="off">
                                </div>
                            </div>
                        </div>

                        <div class="clearfix"></div>
                        <div class="col-md-12 mobile-hide-hr"><hr></div>
                        <div class="clearfix"></div>

                        <div class="col-md-2 border-right">
                            <div class="form-group form-extra-field dropdown clearfix field-detination">
                                <div class="dropdown">
                                    <label>Rooms</label>
                                    <select name="" id="" class="inputg" required="">
                                       <option value="1" selected="">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-2 border-right">
                            <div class="form-group form-extra-field dropdown clearfix field-detination">
                                <div class="dropdown">
                                    <label>Adult</label>
                                    <select name="" id="" class="inputg" required="">
                                        <option value="1" selected="">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                    </select>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-2 border-right">
                            <div class="form-group form-extra-field dropdown clearfix field-detination">
                                <div class="dropdown">
                                    <label>Child</label>
                                    <select name="" id="" class="inputg" required="">
                                        <option value="1" selected="">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>

                                </div>
                            </div>
                        </div>


                        <div class="clearfix"></div>
                        <div class="col-md-12 mobile-hide-hr"><hr></div>
                        <div class="clearfix"></div>

                        <div class="col-md-4 border-right">
                            <div class="form-group form-extra-field dropdown clearfix field-detination">
                                <div class="dropdown">
                                    <label>Hotel Name</label>
                                    <input type="text" id="" name="" value="" class="inputg" placeholder="Place hotel name" autocomplete="off">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 border-right">
                            <div class="form-group form-extra-field dropdown clearfix field-detination">
                                <div class="dropdown">
                                    <label>Nationality</label>
                                    <select name="" id="" class="inputg" required="">
                                        <option value="1">Afghanistan</option>
                                        <option value="2">Albania</option>
                                        <option value="3" selected="">Algeria</option>
                                    </select>

                                </div>
                            </div>
                        </div>



                        <div class="col-md-4">
                        <button class="btn btn-primary btn-search full-width-btn mt20" type="submit">Search</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
        <!--Top Horizontal Search End-->
        <div class="clearfix"></div>
        <div class="st-hotel-result">
            <div class="row">
                <!--Filter on Mobile-->
                <div class="col-md-12 mobile-filter-btn"><a href="#!"><h3 class="sidebar-title">VIEW FILTERS</h3></a></div>
                <!--Filter on Mobile End-->

                <div class="col-lg-3 col-md-3 sidebar-filter">

                    <div class="clearfix"></div>
                   <!--Map view btn-->
                   <div class="sidebar-item map-view-wrapper hidden-xs hidden-sm mt20">
                    <div class="map-view">
                        <a href="#!" class="st-link font-medium btn btn-secondary" style="color: #fff;"  data-toggle="modal" data-target="#st2" role="button"><i class="fas fa-map-marker-alt " ></i> <span>MAPS VIEW </span></a>
                    </div>
                </div>

                    <div class="sidebar-item pag st-icheck">
                        <a  class="item-title" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                            <h4>Search by hotel name</h4>
                            <i class="fas fa-angle-up" aria-hidden="true"></i>
                        </a>
                        <div class="clearfix"></div>
                        <div class="item-content collapse show" id="collapseExample">
                        <div class="hotel-search-input"><input type="text" placeholder="Search by hotel"></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                    <h3 class="sidebar-title">FILTER BY </h3>
                    <!--Filter on Mobile Close btn-->
                    <span class="hidden-lg hidden-md close-filter"><i class="input-icon field-icon"><img src="{{ asset('website/hotel-support/images/close-icon-dark.png') }}" alt=""></i></span>
                    <!--Filter on Mobile Close btn end-->
                    <!--Filter on Mobile-->
                    <div class="sidebar-item range-slider">
                    <div class="item-title"><h4>Filter Price</h4><i class="fas fa-angle-up" aria-hidden="true"></i></div>
                    <div class="item-content">
                        <!--Price Range Slider-->
                        <div class="item-content range-slider">
                            <input type="text" class="price_range" name="price_range" value="171;499" data-symbol="$" data-min="171" data-max="499" data-step="0" />
                        </div>
                        <button class="btn btn-link btn-apply-price-range">APPLY</button>
                    </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="sidebar-item st-icheck">
                        <div class="item-title"><h4>Hotel Star</h4><i class="fas fa-angle-up" aria-hidden="true"></i></div>
                        <div class="item-content">
                            <ul>
                                <li class="st-icheck-item"><label><i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <input type="checkbox" name="review_score" data-type="hotel_rate" value="5" class="filter-item"><span class="checkmark fcheckbox"></span></label></li>
                                <li class="st-icheck-item"><label><i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <input type="checkbox" name="review_score" data-type="hotel_rate" value="4" class="filter-item"><span class="checkmark fcheckbox"></span></label></li>
                                <li class="st-icheck-item"><label><i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <input type="checkbox" name="review_score" data-type="hotel_rate" value="3" class="filter-item"><span class="checkmark fcheckbox"></span></label></li>
                                <li class="st-icheck-item"><label><i class="fas fa-star"></i> <i class="fas fa-star"></i> <input type="checkbox" name="review_score" data-type="hotel_rate" value="2" class="filter-item"><span class="checkmark fcheckbox"></span></label></li>
                                <li class="st-icheck-item"><label><i class="fas fa-star"></i> <input type="checkbox" name="review_score" data-type="hotel_rate" value="1" class="filter-item"><span class="checkmark fcheckbox"></span></label></li>
                           </ul>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="sidebar-item st-icheck">
                        <div class="item-title"><h4>Board Type</h4><i class="fas fa-angle-up" aria-hidden="true"></i></div>
                        <div class="item-content">
                            <ul>
                                <li class="st-icheck-item"><label>Room Only<input type="checkbox" name="board_type" value="4" class="filter-item" data-type="star_rate"><span class="checkmark fcheckbox"></span></label></li>
                                <li class="st-icheck-item"><label>Breakfast Included<input type="checkbox" name="board_type" value="3" class="filter-item" data-type="star_rate"><span class="checkmark fcheckbox"></span></label></li>
                                <li class="st-icheck-item"><label>Half Board<input type="checkbox" name="board_type" value="2" class="filter-item" data-type="star_rate"><span class="checkmark fcheckbox"></span></label></li>
                                <li class="st-icheck-item"><label>Full Board<input type="checkbox" name="board_type" value="1" class="filter-item" data-type="star_rate"><span class="checkmark fcheckbox"></span></label></li>
                                <li class="st-icheck-item"><label>All Inclusive<input type="checkbox" name="board_type" value="zero" class="filter-item" data-type="star_rate"><span class="checkmark fcheckbox"></span></label></li>
                            </ul>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="sidebar-item pag st-icheck">
                        <div class="item-title"><h4>Location</h4><i class="fas fa-angle-up" aria-hidden="true"></i></div>
                        <div class="item-content">
                            <ul>
                                <li class=" st-icheck-item" style="margin-left: 0px"><label>Central Street<input data-tax="taxonomy" data-type="hotel_theme" value="27" type="checkbox" name="taxonomy" class="filter-tax"><span class="checkmark fcheckbox"></span></label></li>
                                <li class=" st-icheck-item" style="margin-left: 0px"><label>Main Road<input data-tax="taxonomy" data-type="hotel_theme" value="28" type="checkbox" name="taxonomy" class="filter-tax"><span class="checkmark fcheckbox"></span></label></li>
                            </ul>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="sidebar-item pag st-icheck">
                        <div class="item-title"><h4>Facilities</h4><i class="fas fa-angle-up" aria-hidden="true"></i></div>
                        <div class="item-content">
                            <ul>
                                <li class=" st-icheck-item" style="margin-left: 0px"><label>Air Conditioning<input data-tax="taxonomy" data-type="hotel_facilities" value="80" type="checkbox" name="taxonomy" class="filter-tax"><span class="checkmark fcheckbox"></span></label></li>
                                <li class=" st-icheck-item" style="margin-left: 0px"><label>Airport Transport<input data-tax="taxonomy" data-type="hotel_facilities" value="78" type="checkbox" name="taxonomy" class="filter-tax"><span class="checkmark fcheckbox"></span></label></li>
                                <li class=" st-icheck-item" style="margin-left: 0px"><label>Fitness Center<input data-tax="taxonomy" data-type="hotel_facilities" value="82" type="checkbox" name="taxonomy" class="filter-tax"><span class="checkmark fcheckbox"></span></label></li>
                                <li class="hidden st-icheck-item" style="margin-left: 0px"><label>Flat Tv<input data-tax="taxonomy" data-type="hotel_facilities" value="83" type="checkbox" name="taxonomy" class="filter-tax"><span class="checkmark fcheckbox"></span></label></li>
                                <li class="hidden st-icheck-item" style="margin-left: 0px"><label>Heater<input data-tax="taxonomy" data-type="hotel_facilities" value="84" type="checkbox" name="taxonomy" class="filter-tax"><span class="checkmark fcheckbox"></span></label></li>
                                <li class="hidden st-icheck-item" style="margin-left: 0px"><label>Internet – Wifi<input data-tax="taxonomy" data-type="hotel_facilities" value="85" type="checkbox" name="taxonomy" class="filter-tax"><span class="checkmark fcheckbox"></span></label></li>
                                <li class="hidden st-icheck-item" style="margin-left: 0px"><label>Parking<input data-tax="taxonomy" data-type="hotel_facilities" value="86" type="checkbox" name="taxonomy" class="filter-tax"><span class="checkmark fcheckbox"></span></label></li>
                                <li class="hidden st-icheck-item" style="margin-left: 0px"><label>Pool<input data-tax="taxonomy" data-type="hotel_facilities" value="87" type="checkbox" name="taxonomy" class="filter-tax"><span class="checkmark fcheckbox"></span></label></li>
                                <li class="hidden st-icheck-item" style="margin-left: 0px"><label>Restaurant<input data-tax="taxonomy" data-type="hotel_facilities" value="88" type="checkbox" name="taxonomy" class="filter-tax"><span class="checkmark fcheckbox"></span></label></li>
                                <li class="hidden st-icheck-item" style="margin-left: 0px"><label>Smoking Room<input data-tax="taxonomy" data-type="hotel_facilities" value="89" type="checkbox" name="taxonomy" class="filter-tax"><span class="checkmark fcheckbox"></span></label></li>
                                <li class="hidden st-icheck-item" style="margin-left: 0px"><label>Spa &amp; Sauna<input data-tax="taxonomy" data-type="hotel_facilities" value="90" type="checkbox" name="taxonomy" class="filter-tax"><span class="checkmark fcheckbox"></span></label></li>
                                <li class="hidden st-icheck-item" style="margin-left: 0px"><label>Washer &amp; Dryer<input data-tax="taxonomy" data-type="hotel_facilities" value="91" type="checkbox" name="taxonomy" class="filter-tax"><span class="checkmark fcheckbox"></span></label></li>
                            </ul>
                        <button class="btn btn-link btn-more-item" style="display: inline-block;">More <i class="fas fa-caret-down"></i></button>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                </div><!--col-3 end-->

                <div class="col-lg-9 col-md-9">
                    <div class="d-flex align-items-center justify-content-between mb-4 header-title ">
                        <h3>Result Found: 15 Hotels</h3>
                        <!--- Sort by area -->
                        <div class="custom-dropdown">
                            <div class="segmented_btn custom-dropdown-toggle">Sort <i class="fas fa-caret-down"></i></div>
                            <div class="custom-dropdown-options">
                                <div class="custom-dropdown-option" data-value="featured">Featured <i class="fas fa-star"></i></div>
                                <div class="custom-dropdown-option" data-value="A-to-Z">A to Z <i class="fas fa-sort-alpha-up"></i></div>
                                <div class="custom-dropdown-option" data-value="z-to-A">Z to A <i class="fas fa-sort-amount-down"></i></div>
                                <div class="custom-dropdown-option" data-value="price-low">Price Low To High <i class="fas fa-sort-amount-up"></i></div>
                                <div class="custom-dropdown-option" data-value="price-high">Price High To Low <i class="fas fa-sort-amount-down-alt"></i></div>
                            </div>
                        </div>
                    </div>


                        <div class="clearfix"></div>
                    <div class="style-list custom-style-list">

                        <!--- single hotel data -->
                        <div class="item-service rectangle-hotel-list-area">
                            <div class="row item-service-wrapper matchHeight">
                                <div class="col-sm-4 thumb-wrapper">
                                    <div class="thumb">
                                        <!--- wishlist link icon -->
                                        <a href="#!" class="login"><div class="service-add-wishlist" title="Add to wishlist"><i class="fas fa-heart"></i></div></a>
                                        <!--- featured tag-->
                                        <div class="service-tag bestseller"><div class="feature_class st_featured featured">Featured</div></div>
                                        <!--- hotel img-->
                                        <div class="flexslider sliderhotelimg" id="">
                                            <ul class="slides">
                                              <li>
                                                <img src="{{ asset('website/hotel-support/images/hotel-list-img-1.jpg') }}" alt="">
                                              </li>
                                              <li>
                                                <img src="{{ asset('website/hotel-support/images/hotel-list-img-1.jpg') }}" alt="">
                                              </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-5 item-content">
                                    <div class="item-content-w">
                                        <!--- hotel stars-->
                                        <ul class="icon-list icon-group booking-item-rating-stars">
                                            <li><i class="fas  fa-star"></i></li>
                                            <li><i class="fas  fa-star"></i></li>
                                            <li><i class="fas  fa-star"></i></li>
                                            <li><i class="fas  fa-star"></i></li>
                                            <li><i class="fas  fa-star"></i></li>
                                        </ul>
                                        <h4 class="service-title"><a href="#!">Hyatt Centric Times Square</a></h4>
                                        <p class="service-location">
                                            <a href="#!" class="st-link font-medium" >123 Main Street City, State ZIP</a>
                                            <a href="#!" class="st-link font-medium"   data-toggle="modal" data-target="#st1" role="button"><i class="fa-solid fa-location-dot"></i> view map</a>
                                        </p>
                                        <!--- facilities-->
                                        <div class="d-flex container-facilities">
                                            <ul class="facilities list-left-room">
                                                <li>Deluxe</li>
                                                <li>Quadruple room</li>
                                                <li></li>
                                            </ul>
                                            <ul class="facilities list-left-room">
                                                <li>Room only </li>
                                                <li>Free cancellation, 20 Sep</li>
                                                <li>Pay Later</li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-sm-3 section-footer">
                                    <div class="service-star-text-review hidden-xs"><p><span class="bold-text">Total Starts</span></p></div>
                                    <div class="service-price"><span class="price bold-text"> 150 <span class="usd">USD</span></span></div>
                                    <div class="select-room-area"><a class="btn-show-price btn btn-primary upper mt5" href="{{ route('agent.hotel-details') }}">Show More Rooms</a></div>
                                </div>
                            </div>

                    </div>
                    <!--- single hotel data -->
                    <div class="clearfix"></div>
                        <div class="item-service rectangle-hotel-list-area">
                                <div class="row item-service-wrapper matchHeight">
                                    <div class="col-sm-4 thumb-wrapper">
                                        <div class="thumb">
                                            <!--- wishlist link icon -->
                                            <a href="#!" class="login"><div class="service-add-wishlist" title="Add to wishlist"><i class="fas fa-heart"></i></div></a>
                                            <!--- featured tag-->
                                            <div class="service-tag bestseller"><div class="feature_class st_featured featured">Featured</div></div>
                                            <!--- hotel img-->
                                            <div class="flexslider sliderhotelimg" id="">
                                                <ul class="slides">
                                                  <li>
                                                    <img src="{{ asset('website/hotel-support/images/hotel-list-img-2.jpg') }}">
                                                  </li>
                                                  <li>
                                                    <img src="{{ asset('website/hotel-support/images/hotel-list-img-2.jpg') }}" >
                                                  </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-5 item-content">
                                        <div class="item-content-w">
                                            <!--- hotel stars-->
                                            <ul class="icon-list icon-group booking-item-rating-stars">
                                                <li><i class="fas  fa-star"></i></li>
                                                <li><i class="fas  fa-star"></i></li>
                                                <li><i class="fas  fa-star"></i></li>
                                                <li><i class="fas  fa-star"></i></li>
                                                <li><i class="fas  fa-star"></i></li>
                                            </ul>
                                            <h4 class="service-title"><a href="#!">The May Fair Hotel</a></h4>
                                            <p class="service-location">
                                                <a href="#!" class="st-link font-medium" >123 Main Street City, State ZIP</a>
                                                <a href="#!" class="st-link font-medium"  data-toggle="modal" data-target="#2" role="button"><i class="fa-solid fa-location-dot"></i> view map</a>                                            </p>
                                            <!--- facilities-->
                                            <div class="d-flex container-facilities">
                                                <ul class="facilities list-left-room">
                                                    <li>Deluxe</li>
                                                    <li>Quadruple room</li>
                                                    <li></li>
                                                </ul>
                                                <ul class="facilities list-left-room">
                                                    <li>Breakfast incl </li>
                                                    <li>Non-Refundable </li>
                                                    <li>Pay Now </li>
                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-sm-3 section-footer">
                                        <div class="service-star-text-review hidden-xs"><p><span class="bold-text">Total Starts</span></p></div>
                                        <div class="service-price"><span class="price bold-text"> 150 <span class="usd">USD</span></span></div>
                                        <div class="select-room-area"><a class="btn-show-price btn btn-primary upper mt5"  href="{{ route('agent.hotel-details') }}" >Show More Rooms</a></div>
                                    </div>
                                </div>

                        </div>
                        <!--- single hotel data -->
                        <div class="clearfix"></div>

                        <!--- pagination  -->
                        <div id="st-content-wrapper">
                            <div class="pagination moderm-pagination">
                                <ul class="page-numbers">
                                    <li><a aria-current="page" class="page-numbers current">1</a></li>
                                    <li><a class="page-numbers" href="#!">2</a></li>
                                    <li><a class="page-numbers" href="#!">3</a></li>
                                    <li><a class="next page-numbers" href="#!"><i class="fas fa-angle-right"></i></a></li>
                                </ul>
                                <span class="count-string">1 - 4 of 15 Hotels </span>
                            </div>
                        </div>
                    </div>
                </div><!--col-9 end-->
            </div><!--row end-->
        </div><!--st-hotel-result end-->
    </div><!--container end-->
</div><!--search-result-page end-->
<div class="clearfix"></div>
@endsection
