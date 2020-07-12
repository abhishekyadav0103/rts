<div class="form-group row">
    <label for="" class="col-sm-5 col-form-label">Date of Loss</label>
    <div class="col-sm-7">
        <input type="text" class="form-control datepicker" placeholder="mm-dd-yyyy" name='date_of_loss' id="date_of_loss" value='' required> 
    </div>
</div>

<div class="form-group row">
    <label for="" class="col-sm-5 col-form-label">Client Date of Birth </label>
    <div class="col-sm-7">
        <input type="text" class="form-control datepicker" placeholder="mm-dd-yyyy" name='client_dob' id="client_dob" value='' required>
    </div>
</div>
<div class="form-group row">
    <label for="" class="col-sm-5 col-form-label">Attorney First Name </label>
    <div class="col-sm-7">
        <input type="text" class="form-control" placeholder="Attorney Name" name="attorney_first_name" value="" required>
    </div>
</div>
<div class="form-group row">
    <label for="" class="col-sm-5 col-form-label">Attorney Last Name </label>
    <div class="col-sm-7">
        <input type="text" class="form-control" placeholder="Attorney Last Name" name="attorney_last_name" value="" required>
    </div>
</div>
<div class="form-group row">
    <label for="" class="col-sm-5 col-form-label">Law Firm Name </label>
    <div class="col-sm-7">
        <input type="text" class="form-control" placeholder="Law Firm Name" name="law_firm_name" id="law_firm_name" value="" required>
    </div>
</div>
<div class="form-group row">
    <label for="" class="col-sm-5 col-form-label">Law Firm Email 
    </label>
    <div class="col-sm-7">
        <input type="text" class="form-control" placeholder="example@example.com" name="law_firm_email" id="law_firm_email" value="" required>
    </div>
</div>
<div class="form-group row">
    <label for="" class="col-sm-5 col-form-label">Brief summary of case </label>
    <div class="col-sm-7">
        <textarea class="form-control" name='summary_of_case' required></textarea>
    </div>
</div>
<div class="form-group row">
    <label for="" class="col-sm-5 col-form-label">Personal injury sustained
       </label>
    <div class="col-sm-7">
        <input type="text" class="form-control" placeholder="Personal injury sustained" name="personal_injury_sustained" value="">
    </div>
</div>
<div class="form-group row">
    <label for="" class="col-sm-5 col-form-label">Plan for case sustained
       </label>
    <div class="col-sm-7">
        <input type="radio" name="plan_for_case" value="Pre-litigation"> Pre-litigation <br />
        <input type="radio" name="plan_for_case" value="Litigation / file suit"> Litigation / file suit <br />
        <input type="radio" name="plan_for_case" value="Trial"> Trial <br />
        <input type="radio" name="plan_for_case" value="Other"> Other
        <input type="text" class="form-control" placeholder="Other" name="plan_for_case_other" value="">
    </div>
</div>
<div class="form-group row">
    <label for="" class="col-sm-5 col-form-label">Amount of relief sought
       </label>
    <div class="col-sm-7">
        <input type="text" class="form-control" placeholder="Amount of relief sought" name="amount_of_releif" value="">
    </div>
</div>
<div class="form-group row">
    <label for="" class="col-sm-5 col-form-label">Defendant's Insurance Carrier 
       </label>
    <div class="col-sm-7">
        <input type="text" class="form-control" placeholder="Defendant's Insurance Carrier" name="insurance_carrier" value="">
    </div>
</div>
<div class="form-group row">
    <label for="" class="col-sm-5 col-form-label">Commercial or Personal Insurance
       </label>
    <div class="col-sm-7">
        <input type="radio" name="insurance_type" value="Commercial"> Commercial <br />
        <input type="radio" name="insurance_type" value="Personal"> Personal <br />
        <input type="radio" name="insurance_type" value="Other"> Other
        <input type="text" class="form-control" placeholder="Other" name="insurance_type_other" value="">
    </div>
</div>
<div class="form-group row">
    <label for="" class="col-sm-5 col-form-label">Defendant's Insurance Coverage
       </label>
    <div class="col-sm-7">
        <input type="text" class="form-control" placeholder="Defendant's Insurance Coverage" name="insurance_coverage" value=""><br />
        <small>(Coverage amount(s) and type(s))</small>
    </div>
</div>
<div class="form-group row">
    <label for="" class="col-sm-5 col-form-label">Defendant Insurance Declaration Page (file upload) 
       </label>
    <div class="col-sm-7">
        <input type="file" class="form-control" name="insurance_declaration_file_path">
    </div>
</div>
<div class="form-group row">
    <label for="" class="col-sm-5 col-form-label">Was a police report filed?
       </label>
    <div class="col-sm-7">
        <input type="radio" name="police_report_filed" value="Yes"> Yes <br />
        <input type="radio" name="police_report_filed" value="No"> No
    </div>
</div>
<div class="form-group row">
    <label for="" class="col-sm-5 col-form-label">Was the defendant issued a ticket by the police?
       </label>
    <div class="col-sm-7">
        <input type="radio" name="issued_ticket_by_police" value="Yes"> Yes <br />
        <input type="radio" name="issued_ticket_by_police" value="No"> No <br />
        <input type="radio" name="issued_ticket_by_police" value="Other"> Other
        <input type="text" class="form-control" placeholder="Other" name="issued_ticket_by_police_other" value="">
    </div>
</div>
<div class="form-group row">
    <label for="" class="col-sm-5 col-form-label">Has the defendant admitted fault?
       </label>
    <div class="col-sm-7">
        <input type="radio" name="admitted_fault" value="Yes"> Yes <br />
        <input type="radio" name="admitted_fault" value="No"> No <br />
        <input type="radio" name="admitted_fault" value="Other"> Other
        <input type="text" class="form-control" placeholder="Other" name="admitted_fault_other" value="">
    </div>
</div>
<div class="form-group row">
    <label for="" class="col-sm-5 col-form-label">Venue of Incident (County)
       </label>
    <div class="col-sm-7">
        <input type="text" class="form-control" placeholder="Country" name="incident_country" value="">
    </div>
</div>
<div class="form-group row">
    <label for="" class="col-sm-5 col-form-label">Venue of Incident (State)
       </label>
    <div class="col-sm-7">
        <select class="form-control" name="incident_state" required>
          <option selected="" value=""> Please Select </option>
          <option value="Alabama"> Alabama </option>
          <option value="Alaska"> Alaska </option>
          <option value="Arizona"> Arizona </option>
          <option value="Arkansas"> Arkansas </option>
          <option value="California"> California </option>
          <option value="Colorado"> Colorado </option>
          <option value="Connecticut"> Connecticut </option>
          <option value="Delaware"> Delaware </option>
          <option value="District of Columbia"> District of Columbia </option>
          <option value="Florida"> Florida </option>
          <option value="Georgia"> Georgia </option>
          <option value="Hawaii"> Hawaii </option>
          <option value="Idaho"> Idaho </option>
          <option value="Illinois"> Illinois </option>
          <option value="Indiana"> Indiana </option>
          <option value="Iowa"> Iowa </option>
          <option value="Kansas"> Kansas </option>
          <option value="Kentucky"> Kentucky </option>
          <option value="Louisiana"> Louisiana </option>
          <option value="Maine"> Maine </option>
          <option value="Maryland"> Maryland </option>
          <option value="Massachusetts"> Massachusetts </option>
          <option value="Michigan"> Michigan </option>
          <option value="Minnesota"> Minnesota </option>
          <option value="Mississippi"> Mississippi </option>
          <option value="Missouri"> Missouri </option>
          <option value="Montana"> Montana </option>
          <option value="Nebraska"> Nebraska </option>
          <option value="Nevada"> Nevada </option>
          <option value="New Hampshire"> New Hampshire </option>
          <option value="New Jersey"> New Jersey </option>
          <option value="New Mexico"> New Mexico </option>
          <option value="New York"> New York </option>
          <option value="North Carolina"> North Carolina </option>
          <option value="North Dakota"> North Dakota </option>
          <option value="Ohio"> Ohio </option>
          <option value="Oklahoma"> Oklahoma </option>
          <option value="Oregon"> Oregon </option>
          <option value="Pennsylvania"> Pennsylvania </option>
          <option value="Rhode Island"> Rhode Island </option>
          <option value="South Carolina"> South Carolina </option>
          <option value="South Dakota"> South Dakota </option>
          <option value="Tennessee"> Tennessee </option>
          <option value="Texas"> Texas </option>
          <option value="Utah"> Utah </option>
          <option value="Vermont"> Vermont </option>
          <option value="Virginia"> Virginia </option>
          <option value="Washington"> Washington </option>
          <option value="West Virginia"> West Virginia </option>
          <option value="Wisconsin"> Wisconsin </option>
          <option value="Wyoming"> Wyoming </option>
        </select>
    </div>
</div>
<div class="form-group row">
    <label for="" class="col-sm-5 col-form-label">Total initial medical $ available
       </label>
    <div class="col-sm-7">
        <input type="text" class="form-control" placeholder="ex: $50,000" name="initial_medical" value="">
    </div>
</div>
<div class="form-group row">
    <label for="" class="col-sm-5 col-form-label">How much medical $ have been spent?
       </label>
    <div class="col-sm-7">
        <input type="text" class="form-control" placeholder="ex: $50,000" name="medical_spent" value="">
    </div>
</div>
<div class="col-lg-12 p-0">
    <div class="form-group">Medical Services Provided to Client to Date (if none, please type N/A in first cell)
    </div>
</div>
<div class="form-group row">
    <table style="width:100%;" id="mdical_service_table">
        <tr>
            <th class="md_th" style="width:30px;"></th>
            <th class="md_th">Medical Provider</th>
            <th class="md_th">Service Provided</th>
            <th class="md_th">Cost</th>
        </tr>
        @for ($i = 1; $i <= 10; $i++)
        <tr>
            <td class="md_td">{{ $i }}</td>
            <td><input type="text" name="medical_provider[]"></td>
            <td><input type="text" name="service_provided[]"></td>
            <td><input type="text" name="cost[]"></td>
        </tr>
        @endfor
    </table>
</div>
<div class="sub_title"></div>
<div class="col-lg-12 p-0">
    <div class="form-group">
    <p>By entering information on this form, signature below, and the submission of this information, I hereby certify that I, {{ Auth::user()->firstname }} {{ Auth::user()->lastname }} and/or staff of represent in the matter of a personal injury sustained on </p>

    <p>I, {{ Auth::user()->firstname }} {{ Auth::user()->lastname }} and/or staff of also certify that all information provided herein is true and correct to the best of my knowledge, and that I will provide Ruby Legal Group updated information as necessary.</p>
    </div>
</div>
<div class="form-group row">
    <label for="" class="col-sm-5 col-form-label">Signature <span class="red">*</span></label>
    <div class="col-sm-7">
        <section class="signature-component">
            <canvas class="sign" id="signature-pad" name ="signature" height="200"></canvas>
        </section>
        <br/>
        <div class="text-right">
            <!--<a href="#" id="save">Save</a>--> 
            <!--<a href="#" id="clear">Clear</a>-->
            <button type="button" id="clear">Clear</button>
        </div>
    </div>
</div>



