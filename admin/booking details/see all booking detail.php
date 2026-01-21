<div class="recent-grid" style="margin-top: 7.5rem; margin-left: 5.5rem; grid-template-columns: 90% auto;">
                                <div class="projects">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3><?php echo $title ?></h3>

                                        </div>

                                        <div class="customers"> 

                                                <div class="card-body">
                                                    <div class="customer">
                                                        <div class="info" style="margin-left:5rem; flex-direction: column; align-items: normal;">
                                                        
                                                        <!-- Form for Submit -->
                                                        <div class="form-css">
                                                        <form method="POST">
                                                            <table >
                                                                <tr>
                                                                    <td > <label for="booking_id"><h4 style="font-size: 1.5em">Booking ID : </h4> </label></td>
                                                                    <td ><input type="text" id="booking_id" style="text-align: center; padding: 3px 1rem;" placehoder="ID" name="booking_id" size="5" value="<?php echo $booking_detail_see_id ?>" disabled></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><label for="booking_name"><h4 style="font-size: 1.5em">Booking Name : </h4> </label></td>
                                                                    <td><input type="text" id="booking_name" style="text-align: center;  padding: 3px 1rem;" placehoder="Customer Name" name="booking_name" size="20" value="<?php echo $row_user_details_sql['user_fullname'] ?>" disabled></td>
                                                                </tr>
                                                                <tr>
                                                                    <td> <label for="booking_contact"><h4 style="font-size: 1.5em">Customer Contact Number : </h4> </label></td>
                                                                    <td><input type="text" style="text-align: center;  padding: 3px 1rem;" id="booking_contact" placeholder="Contact Number" name="booking_contact" value="<?php echo $row_see['contact_no'] ?>" disabled></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><label for="booking_email"><h4 style="font-size: 1.5em">Customer Email Address : </h4> </label></td>
                                                                    <td> <input type="email" style="text-align: center;  padding: 3px 1rem;" id="booking_email" placeholder="Email Address" name="booking_email" size="30" value="<?php echo $row_see['email_address'] ?>" disabled></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><label for="booking_username"><h4 style="font-size: 1.5em">Customer Username : </h4> </label></td>
                                                                    <td><input type="text" style="text-align: center;  padding: 3px 1rem;" id="booking_username" placeholder="Username" name="booking_username" size="30" value="<?php echo $row_user_details_sql['username'] ?>" disabled></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><label for="booking_totalpay"><h4 style="font-size: 1.5em">Total Pay : RM </h4> </label></td>
                                                                    <td> <input type="text" style=" text-align: center;  padding: 3px 1rem;" id="booking_totalpay" placeholder="Total Pay" name="booking_totalpay" size="5" value="<?php echo $row_see['total_pay'] ?>" disabled></td>
                                                                </tr>
                                                                <tr>
                                                                    <td> <label for="booking_pay_method"><h4 style="font-size: 1.5em">Payment Method : </h4> </label></td>
                                                                    <td> <input type="text" style=" text-align: center;  padding: 3px 1rem;" id="booking_pay_method" placeholder="Payment Method" name="booking_pay_method" size="15" value="<?php echo $row_see['payment_method'] ?>" disabled></td>
                                                                </tr>
                                                                <tr>
                                                                    <td> <label for="booking_pay_date"><h4 style="font-size: 1.5em">Payment Date : </h4> </label></td>
                                                                    <td> <input type="datetime-local" style=" text-align: center;  padding: 3px 1rem;" id="booking_pay_date" placeholder="Payment Date" name="booking_pay_date" size="15" value="<?php echo $row_see['payment_date'] ?>" disabled></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><label for="booking_number"><h4 style="font-size: 1.5em">Booking Number : </h4> </label></td>
                                                                    <td><input type="text" style=" text-align: center;  padding: 3px 1rem;" id="booking_number" placeholder="Booking Number" name="booking_number" size="16" value="<?php echo $row_see['booking_no'] ?>" disabled></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><label for="booking_names"><h4 style="font-size: 1.5em">Booking Name for Seat : </h4> </label></td>
                                                                    <td> <input type="text" style=" text-align: center;  padding: 3px 1rem;" id="booking_names" placeholder="Booking Seat Name" name="booking_names" size="16" value="<?php echo $row_see['name_on_seat'] ?>" disabled></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><label for="booking_travel_type"><h4 style="font-size: 1.5em">Travel Type : </h4> </label></td>
                                                                    <td><input type="text" style="text-align: center; padding: 3px 1rem;" id="booking_travel_type" placeholder="Travel Type" name="booking_travel_type" size="16" value="<?php echo $return_status_get ?>" disabled></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><label for="booking_seat"><h4 style="font-size: 1.5em">Booking Seat : </h4> </label></td>
                                                                    <td><input type="text" style=" text-align: center; padding: 3px 1rem;" id="booking_seat" placeholder="Seats" name="booking_seat" size="15" value="<?php echo $row_see['bus_seat_no'] ?>" disabled></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><label for="booking_schedule_id"><h4 style="font-size: 1.5em">Booking Schedule ID : </h4> </label></td>
                                                                    <td><input type="text" style=" text-align: center; padding: 3px 1rem;" id="booking_schedule_id" placeholder="Schedule ID" name="booking_schedule_id" size="5" value="<?php echo $row_see['bus_schedule_id'] ?>" disabled></td>
                                                                </tr>
                                                                <tr>
                                                                    <td> <label for="bus_s_gate"><h4 style="font-size: 1.5em">Gate : </h4> </label></td>
                                                                    <td> <input type="text" style=" text-align: center; padding: 3px 1rem;" id="bus_s_gate" placeholder="Gate" name="bus_s_gate" size="10" value="<?php echo $row_bus_schedule_details['gate'] ?>" disabled></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><label for="booking_schedule_date"><h4 style="font-size: 1.5em">Booking Schedule Date : </h4> </label></td>
                                                                    <td><input type="date" style="text-align: center; padding: 3px 1rem;" id="booking_schedule_date" name="booking_schedule_date" size="10" value="<?php echo $row_bus_schedule_details['bus_schedule_date'] ?>" disabled></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><label for="booking_schedule_boarding"><h4 style="font-size: 1.5em">Booking Schedule Boarding Location : </h4> </label></td>
                                                                    <td> <input type="text" style=" text-align: center; padding: 3px 1rem;" id="booking_schedule_boarding" placeholder="Boarding" name="booking_schedule_boarding" size="20" value="<?php echo $row_bus_schedule_details['boarding'] ?>" disabled></td>
                                                                </tr>
                                                                <tr>
                                                                    <td> <label for="booking_schedule_alighting"><h4 style="font-size: 1.5em">Booking Schedule Alighting Location : </h4> </label></td>
                                                                    <td><input type="text" style=" text-align: center; padding: 3px 1rem;" id="booking_schedule_alighting" placeholder="Alighting" name="booking_schedule_alighting" size="20" value="<?php echo $row_bus_schedule_details['alighting'] ?>" disabled></td>
                                                                </tr>
                                                                <tr>
                                                                    <td> <label for="booking_schedule_departure"><h4 style="font-size: 1.5em">Booking Schedule Departure Time : </h4> </label></td>
                                                                    <td><input type="time" style=" text-align: center; padding: 3px 1rem;" id="booking_schedule_departure" name="booking_schedule_departure" size="10" value="<?php echo $dep_time ?>" disabled></td>
                                                                </tr>
                                                                <tr>
                                                                    <td> <label for="booking_schedule_arrival"><h4 style="font-size: 1.5em">Booking Schedule Arrival Time : </h4> </label></td>
                                                                    <td><input type="time" style=" text-align: center; padding: 3px 1rem;" id="booking_schedule_arrival" name="booking_schedule_arrival" size="10" value="<?php echo $dep_time_arrival ?>" disabled></td>
                                                                </tr>
                                                                <tr>
                                                                    <td> <label for="booking_rating"><h4 style="font-size: 1.5em">Booking Rating : </h4> </label></td>
                                                                    <td><input type="number" style=" text-align: center; padding: 3px 1rem;" id="booking_rating" placeholder="Have not been Rated" name="booking_rating" size="5" value="<?php echo $rating_points ?>" disabled></td>
                                                                </tr>
                                                            </table>
                                                            

                                                            

                                                            

                                                            <!-- Back and Save Button -->
                                                            <div style="margin-top: 3rem; flex-direction: row; display: flex; align-items: normal;">
                                                                <input type="button" onclick="confirmBack()" value="Back to List" name="backbutton" style="margin-right: 5.3rem;">
                                                                
                                                                
                                                            </div>
                                                        </form>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <br>
                                                <br>

                                        </div>

                    
                                    </div>
                                </div>
                </div>


<script>
        function confirmBack() {
            Swal.fire({
                title: "Do you want to go back to List?",
                icon: "question",
                showCancelButton: true,
                confirmButtonText: "Yes",
                cancelButtonText: "No"
            }).then((result) => {
                if (result.isConfirmed) {
                    
                    window.location.href = "/FYP/admin/booking detail.php";
                    
                }
            });
            
        }

</script>