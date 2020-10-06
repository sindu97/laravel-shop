
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<section class="page-banner mt-90 bg-danger">
	<div class="banner-content w-70 pt-100 pb-100">
		<h1 class='page-title text-center'>Elite Property Service and Management: <br/> <span class='text-green'>Experience the Difference</span></h1>
		<p class="page-description text-center">Are you looking for a rental property management company? Well, you don’t need to go further. We are Elite Management with over …. years of experience in providing service to property owners and tenants. As a best property management company, we offer multi-family property management, construction management, real estate brokerage and property renovations. Our experts know the way to maximize a property’s potential.</p>
	</div>
</section>
<section>


<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<style>
* {
  box-sizing: border-box;
}

body {
  background-color: #fff;
}

#regForm {
  background-color: #ffffff;
  margin: 10px auto;
  font-family: Raleway;
  padding: 10px;
  width: 65%;
  min-width: 300px;
}

textarea{width: 50%;}

h1 {
  text-align: center;
  color:#8B191D;
}
#radio-icon{
	width:10px;
}

input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}
select,textarea{
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: #4CAF50;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}

</style>
 <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
         rel = "stylesheet">
      <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

<body>

<form id="regForm" method="post" action="<?php echo base_url();?>rental_find/datarental" enctype="multipart/form-data">
  <h1>Rental Application:</h1>
  <!-- One "tab" for each step in the form: -->
	<h2>You are applying to rent:</h2>
	
<!--<p>
  <select required name='applyingrentaladdress' style='height:45px;'><option selected disabled>Select the Rental Property</option></select></p>--->

<p><input type="text"  name="applyingrentaladdress" placeholder="Enter Property Address" required></p>
	<span style="color:red;"><?php  echo form_error('applyingrentaladdress'); ?></span>
   
    <p><input type="date"  name="moveindate" required></p>
    <span style="color:red;"><?php  echo form_error('moveindate'); ?></span>
	
	<p><input id="radio-icon" type="radio" name="tenant" value="Tenant" required />I am applying as a tenant. (I will be living on the property.)</p>
	<span style="color:red;"><?php  echo form_error('tenant'); ?></span>

	<p><input id="radio-icon" type="radio" name="tenant" value="Anotherapplicant" />I am applying as a co-signer/guarantor for another applicant. (I will not be living on the property.)</p>
	<span style="color:red;"><?php  echo form_error('tenant'); ?></span>

	<p><input type="text"  placeholder="Anticipated length of stay"  name="staylength" /></p>
	<span style="color:red;"><?php  echo form_error('staylength'); ?></span>

	<p style="font-size:25px;">Personal Information</p>
	<p class="subsection-heading">IDENTIFICATION</p>
	<p class="lockicon">We need this information to run credit and background checks. Everything submitted in this application is encrypted and stored securely.</p>
	<p><input type="text"  placeholder="Full Name"  name="fullname" required/></p>
	<span style="color:red;"><?php  echo form_error('fullname'); ?></span>
	
	<p><input type="text"  placeholder="Email Address"  name="emailaddress" required /></p>
	<span style="color:red;"><?php  echo form_error('emailaddress'); ?></span>

	<p><input type="text"  placeholder="Phone number"  name="phonenumber" required /></p>
	<span style="color:red;"><?php  echo form_error('phonenumber'); ?></span>

	<p><input type="text"  placeholder="Work Phone number"  name="workphonenumber" required /></p>
	<span style="color:red;"><?php  echo form_error('workphonenumber'); ?></span>

	<p><input type="text"  placeholder="Social Security Number"  name="socialsecuritynumber" required /></p>
	<span style="color:red;"><?php  echo form_error('socialsecuritynumber'); ?></span>

		<label>Date of Birth</label>
	<p><input type="date"  placeholder="Date of Birth"  name="dateofbirth" required /></p>
	<span style="color:red;"><?php  echo form_error('dateofbirth'); ?></span>

	<p><input type="text"  placeholder="Current Driver's License"  name="currentdriverlicense" required /></p>
	<span style="color:red;"><?php  echo form_error('currentdriverlicense'); ?></span>

	<p><input type="text"  placeholder="Permanent address"  name="permanentaddress" required /></p>
	<span style="color:red;"><?php  echo form_error('permanentaddress'); ?></span>


	<p><input type="text"  placeholder="City"  name="permanentcity" required /></p>
	<span style="color:red;"><?php  echo form_error('permanentcity'); ?></span>
	<p><select required name="permanentstate"><option value="" >State</option>
						<option value="AA">AA</option>
						<option value="AE">AE</option>
						<option value="AK">AK</option>
						<option value="AL">AL</option>
						<option value="AP">AP</option>
						<option value="AR">AR</option>
						<option value="AS">AS</option>
						<option value="AZ">AZ</option>
						<option value="CA">CA</option>
						<option value="CO">CO</option>
						<option value="CT">CT</option>
						<option value="DC">DC</option>
						<option value="DE">DE</option>
						<option value="FL">FL</option>
						<option value="FM">FM</option>
						<option value="GA">GA</option>
						<option value="GU">GU</option>
						<option value="HI">HI</option>
						<option value="IA">IA</option>
						<option value="ID">ID</option>
						<option value="IL">IL</option>
						<option value="IN">IN</option>
						<option value="KS">KS</option>
						<option value="KY">KY</option>
						<option value="LA">LA</option>
						<option value="MA">MA</option>
						<option value="MD">MD</option>
						<option value="ME">ME</option>
						<option value="MH">MH</option>
						<option value="MI">MI</option>
						<option value="MN">MN</option>
						<option value="MO">MO</option>
						<option value="MP">MP</option>
						<option value="MS">MS</option>
						<option value="MT">MT</option>
						<option value="NC">NC</option>
						<option value="ND">ND</option>
						<option value="NE">NE</option>
						<option value="NH">NH</option>
						<option value="NJ">NJ</option>
						<option value="NM">NM</option>
						<option value="NV">NV</option>
						<option value="NY">NY</option>
						<option value="OH">OH</option>
						<option value="OK">OK</option>
						<option value="OR">OR</option>
						<option value="PA">PA</option>
						<option value="PR">PR</option>
						<option value="RI">RI</option>
						<option value="SC">SC</option>
						<option value="SD">SD</option>
						<option value="TN">TN</option>
						<option value="TX">TX</option>
						<option value="UT">UT</option>
						<option value="VA">VA</option>
						<option value="VI">VI</option>
						<option value="VT">VT</option>
						<option value="WA">WA</option>
						<option value="WI">WI</option>
						<option value="WV">WV</option>
						<option value="WY">WY</option>
					</select>
	</p>
	<span style="color:red;"><?php  echo form_error('permanentstate'); ?></span>

	<p><input placeholder="Zip"  name="permanentzip" required ></p>
	<span style="color:red;"><?php  echo form_error('permanentzip'); ?></span>



	<p><input placeholder="How long"  name="presenthowlong" required ></p>
	<span style="color:red;"><?php  echo form_error('presenthowlong'); ?></span>

	<p><input placeholder="If renting, Apartment name/location"  name="presentrentlocation"></p>
	<p><input placeholder="Phone"  name="presentrentphone"></p>
	<p><input placeholder="Landlord / Manager Name"  name="presentlandlordname"></p>
	<p><input placeholder="landlordPhone"  name="presentlandlordphone"></p>
	<p><textarea placeholder="Why are you Leaving"  name="presentleavingreason"></textarea></p>
	<p><input placeholder="Current Rent"  name="presentrent"></p>
		<p class="subsection-heading">Previous Rent Details</p>
	<p><input placeholder="Previous Address"  name="previousrentaddress"></p>
	<p><input placeholder="City"  name="previousrentcity"></p>
<p><select name="previousstate"><option value="" >State</option>
						<option value="AA">AA</option>
						<option value="AE">AE</option>
						<option value="AK">AK</option>
						<option value="AL">AL</option>
						<option value="AP">AP</option>
						<option value="AR">AR</option>
						<option value="AS">AS</option>
						<option value="AZ">AZ</option>
						<option value="CA">CA</option>
						<option value="CO">CO</option>
						<option value="CT">CT</option>
						<option value="DC">DC</option>
						<option value="DE">DE</option>
						<option value="FL">FL</option>
						<option value="FM">FM</option>
						<option value="GA">GA</option>
						<option value="GU">GU</option>
						<option value="HI">HI</option>
						<option value="IA">IA</option>
						<option value="ID">ID</option>
						<option value="IL">IL</option>
						<option value="IN">IN</option>
						<option value="KS">KS</option>
						<option value="KY">KY</option>
						<option value="LA">LA</option>
						<option value="MA">MA</option>
						<option value="MD">MD</option>
						<option value="ME">ME</option>
						<option value="MH">MH</option>
						<option value="MI">MI</option>
						<option value="MN">MN</option>
						<option value="MO">MO</option>
						<option value="MP">MP</option>
						<option value="MS">MS</option>
						<option value="MT">MT</option>
						<option value="NC">NC</option>
						<option value="ND">ND</option>
						<option value="NE">NE</option>
						<option value="NH">NH</option>
						<option value="NJ">NJ</option>
						<option value="NM">NM</option>
						<option value="NV">NV</option>
						<option value="NY">NY</option>
						<option value="OH">OH</option>
						<option value="OK">OK</option>
						<option value="OR">OR</option>
						<option value="PA">PA</option>
						<option value="PR">PR</option>
						<option value="RI">RI</option>
						<option value="SC">SC</option>
						<option value="SD">SD</option>
						<option value="TN">TN</option>
						<option value="TX">TX</option>
						<option value="UT">UT</option>
						<option value="VA">VA</option>
						<option value="VI">VI</option>
						<option value="VT">VT</option>
						<option value="WA">WA</option>
						<option value="WI">WI</option>
						<option value="WV">WV</option>
						<option value="WY">WY</option>
					</select>
	</p>
	<p><input placeholder="Zip"  name="previousrentzip"></p>
	<p><input placeholder="How long"  name="previoushowlong"></p>
	<p><input placeholder="If renting, Apartment name/location"  name="previousrentlocation"></p>
	<p><input placeholder="Phone"  name="previousrentphone"></p>
	<p><input placeholder="Landlord / Manager Name"  name="previouslandlordname"></p>
	<p><input placeholder="landlordPhone"  name="previouslandlordphone"></p>
	<p><input placeholder="Why are you Leaving"  name="previousleavingreason"></p>
	<p><input placeholder="Previous Rent"  name="previousrent"></p>
	<p class="subsection-heading">PRESENT EMPLOYER</p>
	<p><input placeholder="Present Emplayer Name"  name="presentemployername" required ></p>
    <span style="color:red;"><?php  echo form_error('presentemployername'); ?></span>

    <p><input placeholder="Present Work Position"  name="presentworkposition" required ></p>
	<span style="color:red;"><?php  echo form_error('presentworkposition'); ?></span>

	<p><input placeholder="How long"  name="presentworkhowlong"  required ></p>
	<span style="color:red;"><?php  echo form_error('presentworkhowlong'); ?></span>

	<p><input placeholder="Present Work Address"  name="presentworkaddress" required ></p>
	<span style="color:red;"><?php  echo form_error('presentworkaddress'); ?></span>
	<p><input placeholder="Supervisor's Phone..."  name="presentsupervisorphone" required ></p>
	<span style="color:red;"><?php  echo form_error('presentsupervisorphone'); ?></span>

	<p><input placeholder="Gross Monthly Income before deductions $"  name="presentsalary" required ></p>
	<span style="color:red;"><?php  echo form_error('presentsalary'); ?></span>

	<p><input placeholder="Other Income $"  name="presentotherincome"></p>
	<p><input placeholder="Other Income Source"  name="presentotherincomesource"></p>
		<p class="subsection-heading">Former EMPLOYER</p>
	<p><input placeholder="Former Emplayer Name"  name="formeremployername"></p>
    <p><input placeholder="Previous Work Position"  name="formerworkposition"></p>
	<p><input placeholder="How long"  name="formerworkhowlong"></p>
	<p><input placeholder="Previous Work Address"  name="formerworkaddress"></p>
	<p><input placeholder="Phone..."  name="formersupervisorphone"></p>
	<p><textarea placeholder="Why did you leave?"  name="previousleavingworkreason"></textarea></p>

	<p style="font-size:25px;">CREDIT REFERENCES</p>
	<p>This may include store credit cards, Rental stores, car loans, small loans etc.</p>
    <p><input placeholder="Bank..."  name="bankname" required ></p>
    <span style="color:red;"><?php  echo form_error('bankname'); ?></span>

    <p><input placeholder="Account..."  name="bankaccount" required ></p>
    <span style="color:red;"><?php  echo form_error('bankaccount'); ?></span>

	<p><input placeholder="City..."  name="bankcity" required ></p>
	<span style="color:red;"><?php  echo form_error('bankcity'); ?></span>

    <p><input placeholder="State..."  name="bankstate" required ></p>
    <span style="color:red;"><?php  echo form_error('bankstate'); ?></span>

	<p><input placeholder="Approx. Balance $..."  name="approxbalance" required ></p>
	<span style="color:red;"><?php  echo form_error('approxbalance'); ?></span>

    <p><input placeholder="How long?..."  name="bankhowlong" required ></p>
    <span style="color:red;"><?php  echo form_error('bankhowlong'); ?></span>

	<p><input placeholder="Other Active Credit Ref..."  name="othercredit1" required ></p>
	<span style="color:red;"><?php  echo form_error('othercredit1'); ?></span>
	
    <p><input placeholder="Account #..."  name="otheraccount1"></p>
	<p><input placeholder="Exp. Date..."  name="otheraccountexpiry1"></p>
    <p><input placeholder="Type of Account..."  name="otheraccounttype"></p>
	 <p><input placeholder="Credit Limit $..."  name="otheraccountcreditlimit"></p>
	<p><input placeholder="How long..."  name="bankhowlong1"></p>
    <p><input placeholder="Are all payables current?..."  name="payablecurrent"></p>
	<p><input placeholder="Other Active Credit Ref..."  name="othercredit2"></p>
    <p><input placeholder="Account #..."  name="otheraccount2"></p>
	<p><input placeholder="Exp. Date..."  name="otheraccountexpiry2"></p>
	<p class="subsection-heading" style="font-size:17px; padding-top: 15px;">Have you ever been evicted?</p>
	<p><input type="radio" value="yes" name="evicted"/>YES</p>
    <p><input type="radio" value="no" name="evicted"/>NO</p>
	<p class="subsection-heading" style="font-size:17px; padding-top: 15px;">Have you ever had a foreclosure/repossession?</p>
	<p><input type="radio" value="yes" name="foreclosure"/>YES</p>
    <p><input type="radio" value="no" name="foreclosure"/>NO</p>
	<p class="subsection-heading" style="font-size:17px; padding-top: 15px;">If yes, then Enter the date and Explain Below</p>
	<p><input placeholder="Date..."  name="foreclosuredate"></p>
	<p><textarea placeholder="Explain"  name="foreclosureexplain"></textarea></p>
	<p class="subsection-heading" style="font-size:17px; padding-top: 15px;">Have you ever filled for bankruptcy?</p>
	<p><input type="radio" value="yes" name="bankruptcy"/>YES</p>
    <p><input type="radio" value="no" name="bankruptcy"/>NO</p>
	<p class="subsection-heading" style="font-size:17px; padding-top: 15px;">If yes,</p>
	<p><input type="checkbox"  name="bankruptcychapter7" value="Yes">Chapter 7</p>
	<p><input type="checkbox"  name="bankruptcychapter13" value="Yes">Chapter 13</p>
	<p><textarea placeholder="Explain"  name="bankruptcyexplain"></textarea></p>
		<p class="subsection-heading" style="font-size:17px; padding-top: 15px;">Have you ever been convicted of a crime, other than a traffic violation?</p>
	<p><input type="radio" value="yes" name="trafficviolation"/>YES</p>
    <p><input type="radio" value="no" name="trafficviolation"/>NO</p>
	<p class="subsection-heading" style="font-size:17px; padding-top: 15px;">If yes,</p>
	<p><textarea placeholder="Explain"  name="trafficviolationexplain"></textarea></p>
	

	<p style="font-size:25px;">PERSONAL REFERENCES</p>
	<p>(List 3 persons, OTHER THAN YOUR RELATIVES that we may contact to verify your character.)</p>
	<p><input placeholder="Name"  name="referencename1" required ></p>
    <p><input placeholder="Relation..."  name="referencerelation1" required ></p>
    <p><input placeholder="Phone"  name="referencephone1"></p>
	<p><input placeholder="Address"  name="referenceaddress1"></p>
    <p><input placeholder="city..."  name="referencecity1"></p>
	<p><select name="referencestate1"><option value="">State</option>
						<option value="AA">AA</option>
						<option value="AE">AE</option>
						<option value="AK">AK</option>
						<option value="AL">AL</option>
						<option value="AP">AP</option>
						<option value="AR">AR</option>
						<option value="AS">AS</option>
						<option value="AZ">AZ</option>
						<option value="CA">CA</option>
						<option value="CO">CO</option>
						<option value="CT">CT</option>
						<option value="DC">DC</option>
						<option value="DE">DE</option>
						<option value="FL">FL</option>
						<option value="FM">FM</option>
						<option value="GA">GA</option>
						<option value="GU">GU</option>
						<option value="HI">HI</option>
						<option value="IA">IA</option>
						<option value="ID">ID</option>
						<option value="IL">IL</option>
						<option value="IN">IN</option>
						<option value="KS">KS</option>
						<option value="KY">KY</option>
						<option value="LA">LA</option>
						<option value="MA">MA</option>
						<option value="MD">MD</option>
						<option value="ME">ME</option>
						<option value="MH">MH</option>
						<option value="MI">MI</option>
						<option value="MN">MN</option>
						<option value="MO">MO</option>
						<option value="MP">MP</option>
						<option value="MS">MS</option>
						<option value="MT">MT</option>
						<option value="NC">NC</option>
						<option value="ND">ND</option>
						<option value="NE">NE</option>
						<option value="NH">NH</option>
						<option value="NJ">NJ</option>
						<option value="NM">NM</option>
						<option value="NV">NV</option>
						<option value="NY">NY</option>
						<option value="OH">OH</option>
						<option value="OK">OK</option>
						<option value="OR">OR</option>
						<option value="PA">PA</option>
						<option value="PR">PR</option>
						<option value="RI">RI</option>
						<option value="SC">SC</option>
						<option value="SD">SD</option>
						<option value="TN">TN</option>
						<option value="TX">TX</option>
						<option value="UT">UT</option>
						<option value="VA">VA</option>
						<option value="VI">VI</option>
						<option value="VT">VT</option>
						<option value="WA">WA</option>
						<option value="WI">WI</option>
						<option value="WV">WV</option>
						<option value="WY">WY</option>
					</select>
	</p>
	<p><input placeholder="zip..."  name="referencezip1"></p>
	<p><input placeholder="Name"  name="referencename2"></p>
    <p><input placeholder="Relation..."  name="referencerelation2"></p>
    <p><input placeholder="Phone"  name="referencephone2"></p>
	<p><input placeholder="Address"  name="referenceaddress2"></p>
    <p><input placeholder="city..."  name="referencecity2"></p>
	<p><select name="referencestate2"><option value="">State</option>
						<option value="AA">AA</option>
						<option value="AE">AE</option>
						<option value="AK">AK</option>
						<option value="AL">AL</option>
						<option value="AP">AP</option>
						<option value="AR">AR</option>
						<option value="AS">AS</option>
						<option value="AZ">AZ</option>
						<option value="CA">CA</option>
						<option value="CO">CO</option>
						<option value="CT">CT</option>
						<option value="DC">DC</option>
						<option value="DE">DE</option>
						<option value="FL">FL</option>
						<option value="FM">FM</option>
						<option value="GA">GA</option>
						<option value="GU">GU</option>
						<option value="HI">HI</option>
						<option value="IA">IA</option>
						<option value="ID">ID</option>
						<option value="IL">IL</option>
						<option value="IN">IN</option>
						<option value="KS">KS</option>
						<option value="KY">KY</option>
						<option value="LA">LA</option>
						<option value="MA">MA</option>
						<option value="MD">MD</option>
						<option value="ME">ME</option>
						<option value="MH">MH</option>
						<option value="MI">MI</option>
						<option value="MN">MN</option>
						<option value="MO">MO</option>
						<option value="MP">MP</option>
						<option value="MS">MS</option>
						<option value="MT">MT</option>
						<option value="NC">NC</option>
						<option value="ND">ND</option>
						<option value="NE">NE</option>
						<option value="NH">NH</option>
						<option value="NJ">NJ</option>
						<option value="NM">NM</option>
						<option value="NV">NV</option>
						<option value="NY">NY</option>
						<option value="OH">OH</option>
						<option value="OK">OK</option>
						<option value="OR">OR</option>
						<option value="PA">PA</option>
						<option value="PR">PR</option>
						<option value="RI">RI</option>
						<option value="SC">SC</option>
						<option value="SD">SD</option>
						<option value="TN">TN</option>
						<option value="TX">TX</option>
						<option value="UT">UT</option>
						<option value="VA">VA</option>
						<option value="VI">VI</option>
						<option value="VT">VT</option>
						<option value="WA">WA</option>
						<option value="WI">WI</option>
						<option value="WV">WV</option>
						<option value="WY">WY</option>
					</select>
	</p>
	<p><input placeholder="zip..."  name="referencezip2"></p>
	<p><input placeholder="Name"  name="referencename3"></p>
    <p><input placeholder="Relation..."  name="referencerelation3"></p>
    <p><input placeholder="Phone"  name="referencephone3"></p>
	<p><input placeholder="Address"  name="referenceaddress3"></p>
    <p><input placeholder="city..."  name="referencecity3"></p>
	<p><select name="referencestate3"><option value="">State</option>
						<option value="AA">AA</option>
						<option value="AE">AE</option>
						<option value="AK">AK</option>
						<option value="AL">AL</option>
						<option value="AP">AP</option>
						<option value="AR">AR</option>
						<option value="AS">AS</option>
						<option value="AZ">AZ</option>
						<option value="CA">CA</option>
						<option value="CO">CO</option>
						<option value="CT">CT</option>
						<option value="DC">DC</option>
						<option value="DE">DE</option>
						<option value="FL">FL</option>
						<option value="FM">FM</option>
						<option value="GA">GA</option>
						<option value="GU">GU</option>
						<option value="HI">HI</option>
						<option value="IA">IA</option>
						<option value="ID">ID</option>
						<option value="IL">IL</option>
						<option value="IN">IN</option>
						<option value="KS">KS</option>
						<option value="KY">KY</option>
						<option value="LA">LA</option>
						<option value="MA">MA</option>
						<option value="MD">MD</option>
						<option value="ME">ME</option>
						<option value="MH">MH</option>
						<option value="MI">MI</option>
						<option value="MN">MN</option>
						<option value="MO">MO</option>
						<option value="MP">MP</option>
						<option value="MS">MS</option>
						<option value="MT">MT</option>
						<option value="NC">NC</option>
						<option value="ND">ND</option>
						<option value="NE">NE</option>
						<option value="NH">NH</option>
						<option value="NJ">NJ</option>
						<option value="NM">NM</option>
						<option value="NV">NV</option>
						<option value="NY">NY</option>
						<option value="OH">OH</option>
						<option value="OK">OK</option>
						<option value="OR">OR</option>
						<option value="PA">PA</option>
						<option value="PR">PR</option>
						<option value="RI">RI</option>
						<option value="SC">SC</option>
						<option value="SD">SD</option>
						<option value="TN">TN</option>
						<option value="TX">TX</option>
						<option value="UT">UT</option>
						<option value="VA">VA</option>
						<option value="VI">VI</option>
						<option value="VT">VT</option>
						<option value="WA">WA</option>
						<option value="WI">WI</option>
						<option value="WV">WV</option>
						<option value="WY">WY</option>
					</select>
	</p>
	<p><input placeholder="zip..."  name="referencezip3"></p>
	<p style="font-size:25px;">EMERGENCY</p>
	<p>(In an emergency you may contact- List 2 starting with nearest relative first.)</p>
	<p><input placeholder="Name"  name="emergencyname1"></p>
    <p><input placeholder="Relation..."  name="emergencyrelation1"></p>
    <p><input placeholder="Phone"  name="emergencyphone1"></p>
	<p><input placeholder="Address"  name="emergencyaddress1"></p>
    <p><input placeholder="city..."  name="emergencycity1"></p>
	<p><select name="emergencystate1"><option value="">State</option>
						<option value="AA">AA</option>
						<option value="AE">AE</option>
						<option value="AK">AK</option>
						<option value="AL">AL</option>
						<option value="AP">AP</option>
						<option value="AR">AR</option>
						<option value="AS">AS</option>
						<option value="AZ">AZ</option>
						<option value="CA">CA</option>
						<option value="CO">CO</option>
						<option value="CT">CT</option>
						<option value="DC">DC</option>
						<option value="DE">DE</option>
						<option value="FL">FL</option>
						<option value="FM">FM</option>
						<option value="GA">GA</option>
						<option value="GU">GU</option>
						<option value="HI">HI</option>
						<option value="IA">IA</option>
						<option value="ID">ID</option>
						<option value="IL">IL</option>
						<option value="IN">IN</option>
						<option value="KS">KS</option>
						<option value="KY">KY</option>
						<option value="LA">LA</option>
						<option value="MA">MA</option>
						<option value="MD">MD</option>
						<option value="ME">ME</option>
						<option value="MH">MH</option>
						<option value="MI">MI</option>
						<option value="MN">MN</option>
						<option value="MO">MO</option>
						<option value="MP">MP</option>
						<option value="MS">MS</option>
						<option value="MT">MT</option>
						<option value="NC">NC</option>
						<option value="ND">ND</option>
						<option value="NE">NE</option>
						<option value="NH">NH</option>
						<option value="NJ">NJ</option>
						<option value="NM">NM</option>
						<option value="NV">NV</option>
						<option value="NY">NY</option>
						<option value="OH">OH</option>
						<option value="OK">OK</option>
						<option value="OR">OR</option>
						<option value="PA">PA</option>
						<option value="PR">PR</option>
						<option value="RI">RI</option>
						<option value="SC">SC</option>
						<option value="SD">SD</option>
						<option value="TN">TN</option>
						<option value="TX">TX</option>
						<option value="UT">UT</option>
						<option value="VA">VA</option>
						<option value="VI">VI</option>
						<option value="VT">VT</option>
						<option value="WA">WA</option>
						<option value="WI">WI</option>
						<option value="WV">WV</option>
						<option value="WY">WY</option>
					</select>
	</p>
	<p><input placeholder="zip..."  name="emergencyzip1"></p>
	<p><input placeholder="Name"  name="emergencyname2"></p>
    <p><input placeholder="Relation..."  name="emergencyrelation2"></p>
    <p><input placeholder="Phone"  name="emergencyphone2"></p>
	<p><input placeholder="Address"  name="emergencyaddress2"></p>
    <p><input placeholder="city..."  name="emergencycity2"></p>
	<p><select name="emergencystate2"><option value="">State</option>
						<option value="AA">AA</option>
						<option value="AE">AE</option>
						<option value="AK">AK</option>
						<option value="AL">AL</option>
						<option value="AP">AP</option>
						<option value="AR">AR</option>
						<option value="AS">AS</option>
						<option value="AZ">AZ</option>
						<option value="CA">CA</option>
						<option value="CO">CO</option>
						<option value="CT">CT</option>
						<option value="DC">DC</option>
						<option value="DE">DE</option>
						<option value="FL">FL</option>
						<option value="FM">FM</option>
						<option value="GA">GA</option>
						<option value="GU">GU</option>
						<option value="HI">HI</option>
						<option value="IA">IA</option>
						<option value="ID">ID</option>
						<option value="IL">IL</option>
						<option value="IN">IN</option>
						<option value="KS">KS</option>
						<option value="KY">KY</option>
						<option value="LA">LA</option>
						<option value="MA">MA</option>
						<option value="MD">MD</option>
						<option value="ME">ME</option>
						<option value="MH">MH</option>
						<option value="MI">MI</option>
						<option value="MN">MN</option>
						<option value="MO">MO</option>
						<option value="MP">MP</option>
						<option value="MS">MS</option>
						<option value="MT">MT</option>
						<option value="NC">NC</option>
						<option value="ND">ND</option>
						<option value="NE">NE</option>
						<option value="NH">NH</option>
						<option value="NJ">NJ</option>
						<option value="NM">NM</option>
						<option value="NV">NV</option>
						<option value="NY">NY</option>
						<option value="OH">OH</option>
						<option value="OK">OK</option>
						<option value="OR">OR</option>
						<option value="PA">PA</option>
						<option value="PR">PR</option>
						<option value="RI">RI</option>
						<option value="SC">SC</option>
						<option value="SD">SD</option>
						<option value="TN">TN</option>
						<option value="TX">TX</option>
						<option value="UT">UT</option>
						<option value="VA">VA</option>
						<option value="VI">VI</option>
						<option value="VT">VT</option>
						<option value="WA">WA</option>
						<option value="WI">WI</option>
						<option value="WV">WV</option>
						<option value="WY">WY</option>
					</select>
	</p>
	<p><input placeholder="zip..."  name="emergencyzip2"></p>
	<p style="font-size:25px;">OTHER INFORMATION</p>
	<p>(Other persons, including children who will live in the dwelling unit)</p>
	<p><input placeholder="Name"  name="otherpersonname1"></p>
	<p><input placeholder="Name"  name="otherpersonname2"></p>
	<p><input placeholder="Name"  name="otherpersonname3"></p>
	<p><input placeholder="Name"  name="otherpersonname4"></p>	
	<p style="font-size:25px;">*PETS</p>
	<p><input placeholder="Name"  name="petname1"></p>
	<p><input placeholder="type"  name="pettype1"></p>
	<p><input placeholder="Weight"  name="petweight1"></p>
	<p><input placeholder="Name"  name="petname2"></p>
	<p><input placeholder="type"  name="pettype2"></p>
	<p><input placeholder="Weight"  name="petweight2"></p>
	<p>*NOTE: No pets are allowed at any time on the premises without prior Management consent and payment of fees. NO
EXCEPTIONS.</p>
	<p class="subsection-heading" style="font-size:17px; padding-top: 15px;">Do you own:</p>
	<p><input type="checkbox"  name="vacuumcleaner" value="YES">Vacuum cleaner</p>
	<p><input type="checkbox"  name="lawnmower" value="YES">Lawn mower</p>
        <p><input type="checkbox"  name="waterbed" value="YES">water bed</p>
	<p><input type="checkbox"  name="musicalinstrument" value="YES">Musical inst.</p>
	<p class="subsection-heading" style="font-size:17px; padding-top: 15px;">Smoker</p>
	<p><input type="radio" value="yes" name="smoker"/>YES</p>
    <p><input type="radio" value="no" name="smoker"/>NO</p>	
	<p style="font-size:25px;">LIST ALL MOTOR VEHICLES, INCUDING RECREATIONAL TO BE KEPT AT THE PROPERTY</p>
		<p><input placeholder="Make"  name="vehiclemake1"></p>
	<p><input placeholder="Color"  name="vehiclecolor1"></p>
	<p><input placeholder="Model"  name="vehiclemodel1"></p>
	<p><input placeholder="Year"  name="vehicleyear1"></p>
	<p><input placeholder="License Plate"  name="vehiclelicenseplate1"></p>
	<p><input placeholder="State"  name="vehiclestate1"></p>
	<p><input placeholder="Monthly Payment $"  name="vehiclemonthlypayment1"></p>
		<p><input placeholder="Make"  name="vehiclemake2"></p>
	<p><input placeholder="Color"  name="vehiclecolor2"></p>
	<p><input placeholder="Model"  name="vehiclemodel2"></p>
	<p><input placeholder="Year"  name="vehicleyear2"></p>
	<p><input placeholder="License Plate"  name="vehiclelicenseplate2"></p>
	<p><input placeholder="State"  name="vehiclestate2"></p>
	<p><input placeholder="Monthly Payment $"  name="vehiclemonthlypayment2"></p>
	
	<p style="font-size:25px;">Attach Documents</p>
	<p>Please upload all required documentation including:</p>
	<p>-Photo ID</p>
	<p>-Proof of income (e.g. recent pay stubs, bank statements, or tax returns)</p>
	<p><input type="file"  name="ufile[]" accept='application/pdf'  /></p>
    <p><input type="file"  name="ufile[]" accept='application/pdf'  /></p>
	<p><input type="file"  name="ufile[]" accept='application/pdf'  /></p>
    <p><input type="file"  name="ufile[]" accept='application/pdf'  /></p>
    <p><input type="file"  name="ufile[]" accept='application/pdf'  /></p>
		
	<p>A non-refundable application fee of $10.00 is required for processing this application, and is being paid herewith. The undersigned expressly agrees that if
this application is approved applicant herewith agrees to rent this property. Applicant further agrees that if applicant is accepted by Management and then
decides not to move into the premises, then all monies paid herewith shall be retained as liquidated damages since other prospective tenants may have
been turned away and it may be necessary for Management to re-advertise the property and evaluate other applicants. Processing of application shall be as
timely as possible and the results may be delivered via telephone, fax or mail. Once approved, applicant agrees to pay the balance of funds and complete
the paperwork within 48 hours, otherwise management will assume that applicant has decided to forfeit the reservation/earnest money payment made
herewith and will begin remarketing the property. If applicant is not approved, all monies given herewith, less application fee shown above shall be returned
to the applicant. A PHOTOSTATIC COPY OF MY DRIVER’S LICENSE OR PICTURE ID CARD, SOCIAL SECRUITY CARD, LATEST PAY CHECK
STUB(S) AND LAST YEAR’S W-2 (s) OR COPY OF LAST YEARS INCOME TAX RETURN ARE ATTACHED TO THE APPLICATION ( ), OR WILL BE
PROVIDED ( ). I declare that the application is complete, true and correct and I herewith give my permission for anyone contacted to release the credit or
personal information of the undersigned applicant to Management or their authorized agents, at any time, for the purposes of entering into and continuing to
offer or collect on any agreement and/or credit extended. I further authorize Management or their Authorized Agents to verify the application information
including but not limited to obtaining criminal records, contacting creditors, present or former landlords, employers and personal references, whether listed or
not, at the time of the application and at any time in the future, with regard to any agreement entered into with Management. Any false information will
constitute ground for rejection of the application, or Management may at any time immediately terminate any agreement entered into in reliance upon
misinformation given on this application</p>

	<p><input placeholder="Applicant Signature"  name="applicantsignature"></p>
	<p><input placeholder="Date"  name="submissiondate"></p>
	<h2>Rental Verification</h2>
	<p>Name of Applicant <input type="text"  name="name"></p>
	<p>I hereby authorize release of the information requested below for my rental address at: </p>
	<p><input type="text" placeholder="address"  name="address"></p>
	<p><input placeholder="Applicant Signature"  name="applicantsignature"></p>
	<p><input placeholder="Date"  name="submissiondate"></p>
 <button name='submit' type='submit' > Submit </button> 
    


</form>
 <div class="office"><h2>APPLICANTS DO NOT FILL THIS PART. FOR OFFICE USE ONLY.</h2>
 <p>Dates of Residency: _________________ through ________________________
Amount of Rent $____________ Has Lease Expired? YES NO
# of Late or NSF’s  none  1  2  3  4 or more
(If 4 or more, did they occur within the last twelve months?  YES  NO
Has the individual complied with all community policies?  YES  NO
Does this individual keep an animal on the premises?  YES  NO
Has the animal at any time caused a problem or been a nuisance?  YES  NO
Eligible for re-rental  YES  NO
__________________________
Date, Name and Authority
____________________</p>

 </div> 
</div>
<!--End pagewrapper-->
<section>

<!--script src="js/jquery.js"></script> 
<script src="js/bootstrap.min.js"></script-->
<script src="js/owl.js"></script>
<script src="js/validate.js"></script>
<script src="js/wow.js"></script>
<script src="js/script.js"></script>
<script src="js/appointment_script.js"></script>



