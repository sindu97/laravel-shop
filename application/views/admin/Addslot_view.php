  <section class="">
    <div class="">
      <div class="upload_form_wrapper">
        <h2 style="padding-left:35%;padding-top:20px;">Create Time slot</h2>
        <hr>
      </div>
      <div class="new_user_form">
        <div class="row">
          <div class="col-sm-4 col-sm-offset-4">
    
            <form action="<?php echo base_url();?>admin/Addtimeslot/timeslotdata" method="post" id="add_user">

              <div class="form-group">
                <label class="control-label" for="start_time">Available Start Time</label>
                <select class="form-control" name="start_time" id="start_time">
                <option value="8:00 AM">8:00 A.M</option>
                <option value="9:00 AM">9:00 A.M</option> 
                <option value="10:00 AM">10:00 A.M</option>   
                <option value="11:00 AM">11:00 A.M</option> 
                <option value="12:00 PM">12:00 P.M</option> 
                <option value="1:00 PM">1:00 P.M</option> 
                <option value="2:00 PM">2:00 P.M</option> 
                <option value="3:00 PM">3:00 P.M</option> 
                <option value="4:00 PM">4:00 P.M</option> 
                <option value="5:00 PM">5:00 P.M</option> 
                <option value="6:00 PM">6:00 P.M</option> 
                <option value="7:00 PM">7:00 P.M</option> 
                <option value="8:00 PM">8:00 P.M</option> 
                <option value="9:00 PM">9:00 P.M</option> 
               
                </select>  
              </div>


                <div class="form-group">
                <label class="control-label" for="end_time">Available End Time</label>
                <select class="form-control" name="end_time" id="end_time">
                <option value="8:00 AM">8:00 A.M</option>
                <option value="9:00 AM">9:00 A.M</option> 
                <option value="10:00 AM">10:00 A.M</option>   
                <option value="11:00 AM">11:00 A.M</option> 
                <option value="12:00 PM">12:00 P.M</option> 
                <option value="1:00 PM">1:00 P.M</option> 
                <option value="2:00 PM">2:00 P.M</option> 
                <option value="3:00 PM">3:00 P.M</option> 
                <option value="4:00 PM">4:00 P.M</option> 
                <option value="5:00 PM">5:00 P.M</option> 
                <option value="6:00 PM">6:00 P.M</option> 
                <option value="7:00 PM">7:00 P.M</option> 
                <option value="8:00 PM">8:00 P.M</option> 
                <option value="9:00 PM">9:00 P.M</option> 
               
                </select>  
             
               
                <br>
                <button class="btn btn-primary" name="create_user" type="submit">Add Timeslot</button>
                <span id="msg"></span>
              </div>
            </form> 
          </div>
        </div> 
      </div>
    </div>   
  </section>

<script>
