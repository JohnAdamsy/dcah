<?php
class C_Load extends MY_Controller {
	var $rows;
	
	public function __construct() {
		parent::__construct();
		//print var_dump($this->tValue); exit;
		$rows='';
    
	}
	
	public function getFacilityDetails(){
    	/*retrieve files under this form if any*/
		$this->load->model('m_zinc_ors_inventory');
		if(($this->m_zinc_ors_inventory->retrieveFacilityInfo($this -> session -> userdata('fCode')))==true){
			//retrieve existing data..else just load a blank form
			print $this->m_zinc_ors_inventory->formRecords;
		}
    }
	
	public function suggestFacilityName(){
		$this->load->model('m_autocomplete');
		$facilityName=strtolower($this->input->get_post('term',TRUE)); //term is obtained from the ajax call
		
		//echo $facilityName; exit;
		
		//$facilityName='Keri';
		
		if (!strlen($facilityName)<2)
		
		//echo $facilityName; 
		
		try{
		$this->rows=$this->m_autocomplete->getAutocomplete(array('keyword'=>$facilityName));
		//die (var_dump($this->rows));
		$json_data=array();
		
		//foreach($this->rows as $key=>$value)
		//array_push($json_data,$value['facilityName']);
		foreach($this->rows as $value){
			array_push($json_data,$value->facilityName);
		  
			//print $key.' '.$value.'<br />';
			//$json_data=array('code'=>$value->facilityMFC,'name'=>$value->facilityName);
		}
			print json_encode($json_data);//die;
		
		}catch(exception $ex){
			//ignore
			//$ex->getMessage();
		}
		
	}
	
	public function suggest(){
		$this->load->model('m_autocomplete');
		//$facilityName=$this->input->post('username',TRUE);
		
		try{
		$this->rows=$this->m_autocomplete->getAllFacilityNames();
		//die(var_dump($this->rows));
		$json_data=array();
		
		foreach($this->rows as $key=>$value)
			//array_push($json_names,$value['facilityName']);
			$json_data=array('code'=>$value['facilityMFC'],'name'=>$value['facilityName']);
			print json_encode($json_data);
		}catch(exception $ex){
			//ignore
			$ex->getMessage();
		}
		
	}

	public function form_zinc_ors_inventory(){
		$form_zinc_ors='';
		$form_zinc_ors.='<form name="zinc_ors_inventory" id="zinc_ors_inventory" method="POST" action="' . base_url() . 'submit/c_form/form_zinc_ors_inventory' . '" >
	<!-- form for collecting inventory status information -->

	<!-- begin facility  div --->
	<div id="facility_div" class="step">
		<h3 align="center">FACILITY REGISTRATION</h3>

		<div class="block">
			<div class="column">
				<div class="row-title">
					Facility Information
				</div>
				<!--div class="row2">
				<div class="left">
				<label>Date:</label>
				</div>
				<div class="right">
				<input type="date" name="facilityDateOfInventory" id="facilityDateOfInventory" readonly="readonly" class="autoDate" placeholder="click for date"/>
				</div>

				</div-->

				<div class="row2">
					<div class="left">
						<label>Facility Name:</label>
					</div>
					<div class="right">
						<input type="text" name="facilityName" id="facilityName"/>
					</div>
				</div>
				<div class="row2">
					<div class="left">
						<label>Facility Type:</label>
					</div>
					<div class="right">
						<select name="facilityType" id="facilityType">
							<option value="" selected="selected">Select One</option>
							' . $this -> selectFacilityType . '
						</select>
					</div>
				</div>
				<div class="row2">
					<div class="left">
						<label>Facility Level:</label>
					</div>
					<div class="right">
						<select name="facilityLevel" id="facilityLevel">
							<option value="" selected="selected">Select One</option>
							' . $this -> selectFacilityLevel . '
						</select>
					</div>
				</div>
				<div class="row2">
					<div class="left">
						<label>Owned By:</label>
					</div>
					<div class="right">
						<select name="facilityOwner" id="facilityOwner">
							<option value="" selected="selected">Select One</option>
							' . $this -> selectFacilityOwner . '
						</select>
					</div>
				</div>
				<div class="row2">
					<div class="left">
						<label>Province:</label>
					</div>
					<div class="right">
						<select name="facilityProvince" id="facilityProvince">
							<option value="" selected="selected">Select One</option>
							' . $this -> selectProvince . '
						</select>
					</div>
				</div>
				<div class="row2">
					<div class="left">

						<label>District:</label>
					</div>
					<div class="right">
						<select name="facilityDistrict" id="facilityDistrict">
							<option value="" selected="selected">Select One</option>
							' . $this -> selectDistricts . '
						</select>
					</div>
				</div>
				<div class="row2">
					<div class="left">
						<label>County:</label>
					</div>
					<div class="right">
						<select name="facilityCounty" id="facilityCounty">
							<option value="" selected="selected">Select One</option>
							' . $this -> selectCounties . '
						</select>
					</div>
				</div>

			</div>
			<div class="column">
				<div class="row-title">
					In Charge Contact Information
				</div>
				<div class="row2">
					<div class="left">
						<label>Name:</label>
					</div>
					<div class="right">
						<input type="text" name="facilityContactPerson" id="facilityContactPerson"/>
					</div>
				</div>
				<div class="row2">
					<div class="left">
						<label>Telephone:</label>
					</div>
					<div class="right">

					</div>

				</div>

				<div class="row2">
					<div class="left">
						<label>Cell 1:</label>
					</div>
					<div class="right">
						<input type="text" name="facilityTelephone" id="facilityTelephone" maxlength="14"/>
					</div>

				</div>

				<div class="row2">
					<div class="left">
						<label>Cell 2:</label>
					</div>
					<div class="right">
						<input type="text" name="facilityAltTelephone" id="facilityAltTelephone" maxlength="14"/>
					</div>

				</div>

				<div class="row2">
					<div class="left">
						<label>Email:</label>
					</div>
					<div class="right">
						<input type="email" name="facilityEmail" id="facilityEmail" maxlength="90"/>
						<input type="hidden"  name="facilityMFC" id="facilityMFC"/>
					</div>
				</div>
			</div>
		</div>
		<div class="block">
			<div class="column" style="margin-bottom:30px">
				<div class="row-title">
					MCH Contact
				</div>
				<div class="row2">
					<div class="left">
						<label>Name:</label>
					</div>
					<div class="right">
						<input type="text" name="MCHContactPerson" id="MCHContactPerson"/>
					</div>
				</div>
				<div class="row2">
					<div class="left">
						<label>Telephone:</label>
					</div>
					<div class="right">

					</div>

				</div>

				<div class="row2">
					<div class="left">
						<label>Cell 1:</label>
					</div>
					<div class="right">
						<input type="text" name="MCHTelephone" id="MCHTelephone" maxlength="14"/>
					</div>

				</div>

				<div class="row2">
					<div class="left">
						<label>Cell 2:</label>
					</div>
					<div class="right">
						<input type="text" name="MCHAltTelephone" id="MCHAltTelephone" maxlength="14"/>
					</div>

				</div>

				<div class="row2">
					<div class="left">
						<label>Email:</label>
					</div>
					<div class="right">
						<input type="email" name="MCHEmail" id="MCHEmail" maxlength="90"/>
						<input type="hidden"  name="MCHMFC" id="MCHMFC"/>
					</div>
				</div>
			</div>

			<div class="column" style="margin-bottom:30px">
				<div class="row-title">
					Maternity Contact
				</div>
				<div class="row2">
					<div class="left">
						<label>Name:</label>
					</div>
					<div class="right">
						<input type="text" name="MaternityContactPerson" id="MaternityContactPerson"/>
					</div>
				</div>
				<div class="row2">
					<div class="left">
						<label>Telephone:</label>
					</div>
					<div class="right">

					</div>

				</div>

				<div class="row2">
					<div class="left">
						<label>Cell 1:</label>
					</div>
					<div class="right">
						<input type="text" name="MaternityTelephone" id="MaternityTelephone" maxlength="14"/>
					</div>

				</div>

				<div class="row2">
					<div class="left">
						<label>Cell 2:</label>
					</div>
					<div class="right">
						<input type="text" name="MaternityAltTelephone" id="MaternityAltTelephone" maxlength="14"/>
					</div>

				</div>

				<div class="row2">
					<div class="left">
						<label>Email:</label>
					</div>
					<div class="right">
						<input type="email" name="MaternityEmail" id="MaternityEmail" maxlength="90"/>
						<input type="hidden"  name="MaternityMFC" id="MaternityMFC"/>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--end facility div-->

	<!--begin diarrhoiea morbidity factor div-->
	<div id="diarrhoea_cases" class="step">
		<h3 align="center">Diarrhoea Morbidity Data </h3>
		<div class="row2">
			<div class="left">
				<lable>
					Indicate number of diarrhoea cases seen in this facility in the month of August 2012</label>
			</div>
			<div class="center">
				<input type="text" id="diarrhoeaCases" name="diarrhoeaCases" class="cloned"/>
			</div>
		</div>
	</div>

	<!--end diarrhoiea morbidity factor div-->

<!--begin child health drug section -->
     <div id="tabs-1" class="tab MCH step">
   	<h3 align="center"> CHILD HEALTH COMMODITIES ASSESSMENT</h3>
	
	<p style="text-align: center;color:#872300">
			Indicate the quantities of the Zinc,ORS,Ciprofloxacin &amp; Metronidazole (Flagyl) available in this facility at the:
	</p>
	<section align="center" class="row-title"> Unit: MCH</section>
	
		
        <h3 align="center">Zinc Sulphate 20mg Assessment</h3>
		<table>
			<thead>
				<tr>
				</tr>
				<tr>
					<!--td width="144">Batch No</td-->
					<td width="144">Quantities at Hand (Tablets)</td>
					<!--td width="144">Date Supplied to Facility</td-->
					<!--td width="144">Supplier</td-->
					<td width="144">Expiry Date</td>
					<!--td width="144">Comments</td-->
				</tr>
			</thead>
			<tr class="clonable zinc">
				<!--td width="144">
				<input type="text"  name="znStockBatchNo_1" id="znStockBatchNo_1" class="cloned" maxlength="10"/>
				</td-->
				<td width="144">
				<input type="number"  name="znMCHStockQuantity_1" id="znMCHStockQuantity_1" class="cloned fromZero" maxlength="6"/>
				<input type="hidden"  name="znMCHCommodityName_1" id="znMCHCommodityName_1" value="Zinc Sulphate (20mg) Tablet" />
				<input type="hidden"  name="znMCHUnit_1" id="znMCHUnit_1" value="MCH" />
				</td>
				<!--td width="144">
				<input type="date"  name="znStockDispensedDate_1" id="znStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
				</td-->
				<!--td width="144">
				<input type="text"  name="znStockSupplier_1" id="znStockSupplier_1" class="cloned" maxlength="45"/>
				</td-->
				<td width="144">
				<input type="text"  name="znMCHStockExpiryDate_1" id="znMCHStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<!--td width="144">
				<input type="text"  name="znStockComments_1" id="znStockComments_1" class="cloned" maxlength="255"/>
				</td-->
			</tr>
			<tr id="formbuttons_1">
				<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_1" value="Add a Batch" width="auto"/>
				<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_1" value="Remove Batch" width="auto"/>
			</tr>
		</table>

		<h3 align="center"> Low-Osmolarity Oral Rehydration Salts (ORS):</h3>
		<table>
			<thead>
				<tr>

					<!--td width="144">Batch No</td-->
					<td width="144">Quantities at Hand (Sachets)</td>
					<!--td width="144">Date Supplied to Facility</td-->
					<!--td width="144">Supplier</td-->
					<td width="144">Expiry Date</td>
					<!--td width="144">Comments</td-->

				</tr>
			</thead>
			<!--tr><td>Low-Osmolarity Oral Rehydration Salts (ORS): </td></tr-->
			<tr class="clonable ors">
				<!--td width="144">
				<input type="text"  name="orsStockBatchNo_1" id="orsStockBatchNo_1" class="cloned" maxlength="10"/>
				
				</td-->
				<td width="144">
				<input type="number"  name="orsMCHStockQuantity_1" id="orsMCHStockQuantity_1" class="cloned fromZero" maxlength="6"/>
				<input type="hidden"  name="orsMCHCommodityName_1" id="orsMCHCommodityName_1" value="Oral Rehydration Salts (ORS) Sachet" />
				<input type="hidden"  name="orsMCHUnit_1" id="orsMCHUnit_1" value="MCH" />
				</td>
				<!--td width="144">
				<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
				</td-->
				<!--td width="144">
				<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
				</td-->
				<td width="144">
				<input type="text"  name="orsMCHStockExpiryDate_1" id="orsMCHStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<!--td width="144">
				<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
				</td-->
			</tr>
			<tr id="formbuttons_2">
				<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_2" value="Add a Batch" width="12"/>
				<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_2" value="Remove Batch" width="12"/>
			</tr>
		</table>
		
		<h3 align="center"> Ciprofloxacin Assessment</h3>
		<table>
			<thead>
				<tr>

					<!--td width="144">Batch No</td-->
					<td width="144">Quantities at Hand (Sachets)</td>
					<!--td width="144">Date Supplied to Facility</td-->
					<!--td width="144">Supplier</td-->
					<td width="144">Expiry Date</td>
					<!--td width="144">Comments</td-->

				</tr>
			</thead>
			<!--tr><td>Low-Osmolarity Oral Rehydration Salts (ORS): </td></tr-->
			<tr class="clonable ors">
				<!--td width="144">
				<input type="text"  name="orsStockBatchNo_1" id="orsStockBatchNo_1" class="cloned" maxlength="10"/>
				
				</td-->
				<td width="144">
				<input type="number"  name="cipStockQuantity_1" id="cipStockQuantity_1" class="cloned fromZero" maxlength="6"/>
				<input type="hidden"  name="cipCommodityName_1" id="cipCommodityName_1" value="Ciprofloxacin" />
				<input type="hidden"  name="cipMCHUnit_1" id="cipMCHUnit_1" value="MCH" />
				</td>
				<!--td width="144">
				<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
				</td-->
				<!--td width="144">
				<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
				</td-->
				<td width="144">
				<input type="text"  name="cipStockExpiryDate_1" id="cipStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<!--td width="144">
				<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
				</td-->
			</tr>
			<tr id="formbuttons_3">
				<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_3" value="Add a Batch" width="12"/>
				<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_3" value="Remove Batch" width="12"/>
			</tr>
		</table>
		
		<h3 align="center"> Metronidazole (Flagyl) Assessment</h3>
		<table>
			<thead>
				<tr>

					<!--td width="144">Batch No</td-->
					<td width="144">Quantities at Hand (Sachets)</td>
					<!--td width="144">Date Supplied to Facility</td-->
					<!--td width="144">Supplier</td-->
					<td width="144">Expiry Date</td>
					<!--td width="144">Comments</td-->

				</tr>
			</thead>
			<!--tr><td>Low-Osmolarity Oral Rehydration Salts (ORS): </td></tr-->
			<tr class="clonable ors">
				<!--td width="144">
				<input type="text"  name="orsStockBatchNo_1" id="orsStockBatchNo_1" class="cloned" maxlength="10"/>
				
				</td-->
				<td width="144">
				<input type="number"  name="metStockQuantity_1" id="metStockQuantity_1" class="cloned fromZero" maxlength="6"/>
				<input type="hidden"  name="metCommodityName_1" id="metCommodityName_1" value="Metronidazole (Flagyl)" />
				<input type="hidden"  name="metMCHUnit_1" id="metMCHUnit_1" value="MCH" />
				</td>
				<!--td width="144">
				<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
				</td-->
				<!--td width="144">
				<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
				</td-->
				<td width="144">
				<input type="text"  name="metStockExpiryDate_1" id="metStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<!--td width="144">
				<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
				</td-->
			</tr>
			<tr id="formbuttons_4">
				<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_4" value="Add a Batch" width="12"/>
				<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_4" value="Remove Batch" width="12"/>
			</tr>
		</table>
	</div> <!--close tabs-1-->
	
	<div id="tabs-2" class="tab PEDS step">
		<h3 align="center"> CHILD HEALTH COMMODITIES ASSESSMENT</h3>
	
	<p style="text-align: center;color:#872300">
			Indicate the quantities of the Zinc,ORS,Ciprofloxacin &amp; Metronidazole (Flagyl) available in this facility at the:
	</p>
	<section align="center" class="row-title"> Unit: PEDS</section>
	     <h3 align="center">Zinc Sulphate 20mg Assessment</h3>
		<table>
			<thead>
				
				<tr>

					<!--td width="144">Batch No</td-->
					<td width="144">Quantities at Hand (Tablets)</td>
					<!--td width="144">Date Supplied to Facility</td-->
					<!--td width="144">Supplier</td-->
					<td width="144">Expiry Date</td>
					<!--td width="144">Comments</td-->

				</tr>
			</thead>
			<tr class="clonable zinc">
				<!--td width="144">
				<input type="text"  name="znStockBatchNo_1" id="znStockBatchNo_1" class="cloned" maxlength="10"/>
				</td-->
				<td width="144">
				<input type="number"  name="znPEDStockQuantity_1" id="znPEDStockQuantity_1" class="cloned fromZero" maxlength="6"/>
				<input type="hidden"  name="znPEDCommodityName_1" id="znPEDCommodityName_1" value="Zinc Sulphate (20mg) Tablet" />
				<input type="hidden"  name="znPEDUnit_1" id="znPEDUnit_1" value="PED" />
				</td>
				<!--td width="144">
				<input type="date"  name="znStockDispensedDate_1" id="znStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
				</td-->
				<!--td width="144">
				<input type="text"  name="znStockSupplier_1" id="znStockSupplier_1" class="cloned" maxlength="45"/>
				</td-->
				<td width="144">
				<input type="text"  name="znPEDStockExpiryDate_1" id="znPEDStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<!--td width="144">
				<input type="text"  name="znStockComments_1" id="znStockComments_1" class="cloned" maxlength="255"/>
				</td-->
			</tr>
			<tr id="formbuttons_5">
				<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_5" value="Add a Batch" width="auto"/>
				<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_5" value="Remove Batch" width="auto"/>
			</tr>
		</table>

		<h3 align="center"> Low-Osmolarity Oral Rehydration Salts (ORS):</h3>
		<table>
			<thead>
				<tr>

					<!--td width="144">Batch No</td-->
					<td width="144">Quantities at Hand (Sachets)</td>
					<!--td width="144">Date Supplied to Facility</td-->
					<!--td width="144">Supplier</td-->
					<td width="144">Expiry Date</td>
					<!--td width="144">Comments</td-->

				</tr>
			</thead>
			<!--tr><td>Low-Osmolarity Oral Rehydration Salts (ORS): </td></tr-->
			<tr class="clonable ors">
				<!--td width="144">
				<input type="text"  name="orsStockBatchNo_1" id="orsStockBatchNo_1" class="cloned" maxlength="10"/>
				
				</td-->
				<td width="144">
				<input type="number"  name="orsPEDStockQuantity_1" id="orsPEDStockQuantity_1" class="cloned fromZero" maxlength="6"/>
				<input type="hidden"  name="orsPEDCommodityName_1" id="orsPEDCommodityName_1" value="Oral Rehydration Salts (ORS) Sachet" />
				<input type="hidden"  name="orsPEDUnit_1" id="orsPEDUnit_1" value="PED" />
				</td>
				<!--td width="144">
				<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
				</td-->
				<!--td width="144">
				<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
				</td-->
				<td width="144">
				<input type="text"  name="orsPEDStockExpiryDate_1" id="orsPEDStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<!--td width="144">
				<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
				</td-->
			</tr>
			<tr id="formbuttons_6">
				<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_6" value="Add a Batch" width="12"/>
				<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_6" value="Remove Batch" width="12"/>
			</tr>
		</table>
		
		<h3 align="center"> Ciprofloxacin Assessment</h3>
		<table>
			<thead>
				<tr>

					<!--td width="144">Batch No</td-->
					<td width="144">Quantities at Hand (Sachets)</td>
					<!--td width="144">Date Supplied to Facility</td-->
					<!--td width="144">Supplier</td-->
					<td width="144">Expiry Date</td>
					<!--td width="144">Comments</td-->

				</tr>
			</thead>
			<!--tr><td>Low-Osmolarity Oral Rehydration Salts (ORS): </td></tr-->
			<tr class="clonable ors">
				<!--td width="144">
				<input type="text"  name="orsStockBatchNo_1" id="orsStockBatchNo_1" class="cloned" maxlength="10"/>
				
				</td-->
				<td width="144">
				<input type="number"  name="cipPEDStockQuantity_1" id="cipPEDStockQuantity_1" class="cloned fromZero" maxlength="6"/>
				<input type="hidden"  name="cipPEDCommodityName_1" id="cipPEDCommodityName_1" value="Ciprofloxacin" />
				<input type="hidden"  name="cipPEDUnit_1" id="cipPEDUnit_1" value="PED" />
				</td>
				<!--td width="144">
				<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
				</td-->
				<!--td width="144">
				<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
				</td-->
				<td width="144">
				<input type="text"  name="cipPEDStockExpiryDate_1" id="cipPEDStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<!--td width="144">
				<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
				</td-->
			</tr>
			<tr id="formbuttons_7">
				<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_7" value="Add a Batch" width="12"/>
				<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_7" value="Remove Batch" width="12"/>
			</tr>
		</table>
		
		<h3 align="center"> Metronidazole (Flagyl) Assessment</h3>
		<table>
			<thead>
				<tr>

					<!--td width="144">Batch No</td-->
					<td width="144">Quantities at Hand (Sachets)</td>
					<!--td width="144">Date Supplied to Facility</td-->
					<!--td width="144">Supplier</td-->
					<td width="144">Expiry Date</td>
					<!--td width="144">Comments</td-->

				</tr>
			</thead>
			<!--tr><td>Low-Osmolarity Oral Rehydration Salts (ORS): </td></tr-->
			<tr class="clonable ors">
				<!--td width="144">
				<input type="text"  name="orsStockBatchNo_1" id="orsStockBatchNo_1" class="cloned" maxlength="10"/>
				
				</td-->
				<td width="144">
				<input type="number"  name="metPEDStockQuantity_1" id="metPEDStockQuantity_1" class="cloned fromZero" maxlength="6"/>
				<input type="hidden"  name="metPEDCommodityName_1" id="metPEDCommodityName_1" value="Metronidazole (Flagyl)" />
				<input type="hidden"  name="metPEDUnit_1" id="metPEDUnit_1" value="PED" />
				</td>
				<!--td width="144">
				<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
				</td-->
				<!--td width="144">
				<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
				</td-->
				<td width="144">
				<input type="text"  name="metPEDStockExpiryDate_1" id="metPEDStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<!--td width="144">
				<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
				</td-->
			</tr>
			<tr id="formbuttons_8">
				<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_8" value="Add a Batch" width="12"/>
				<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_8" value="Remove Batch" width="12"/>
			</tr>
		</table>
	</div> <!--close tabs-2-->
	
	<div id="tabs-3" class="tab OPD step">
		<h3 align="center"> CHILD HEALTH COMMODITIES ASSESSMENT</h3>
	
	<p style="text-align: center;color:#872300">
			Indicate the quantities of the Zinc,ORS,Ciprofloxacin &amp; Metronidazole (Flagyl) available in this facility at the:
	</p>
	<section align="center" class="row-title"> Unit: OPD</section>
		 <h3 align="center">Zinc Sulphate 20mg Assessment</h3>
		<table>
			<thead>
				<tr>

					<!--td width="144">Batch No</td-->
					<td width="144">Quantities at Hand (Tablets)</td>
					<!--td width="144">Date Supplied to Facility</td-->
					<!--td width="144">Supplier</td-->
					<td width="144">Expiry Date</td>
					<!--td width="144">Comments</td-->

				</tr>
			</thead>
			<tr class="clonable zinc">
				<!--td width="144">
				<input type="text"  name="znStockBatchNo_1" id="znStockBatchNo_1" class="cloned" maxlength="10"/>
				</td-->
				<td width="144">
				<input type="number"  name="znOPDStockQuantity_1" id="znOPDStockQuantity_1" class="cloned fromZero" maxlength="6"/>
				<input type="hidden"  name="znOPDCommodityName_1" id="znOPDCommodityName_1" value="Zinc Sulphate (20mg) Tablet" />
				<input type="hidden"  name="znOPDUnit_1" id="znOPDUnit_1" value="OPD" />
				</td>
				<!--td width="144">
				<input type="date"  name="znStockDispensedDate_1" id="znStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
				</td-->
				<!--td width="144">
				<input type="text"  name="znStockSupplier_1" id="znStockSupplier_1" class="cloned" maxlength="45"/>
				</td-->
				<td width="144">
				<input type="text"  name="znOPDStockExpiryDate_1" id="znOPDStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<!--td width="144">
				<input type="text"  name="znStockComments_1" id="znStockComments_1" class="cloned" maxlength="255"/>
				</td-->
			</tr>
			<tr id="formbuttons_9">
				<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_9" value="Add a Batch" width="auto"/>
				<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_9" value="Remove Batch" width="auto"/>
			</tr>
		</table>

		<h3 align="center"> Low-Osmolarity Oral Rehydration Salts (ORS):</h3>
		<table>
			<thead>
				<tr>

					<!--td width="144">Batch No</td-->
					<td width="144">Quantities at Hand (Sachets)</td>
					<!--td width="144">Date Supplied to Facility</td-->
					<!--td width="144">Supplier</td-->
					<td width="144">Expiry Date</td>
					<!--td width="144">Comments</td-->

				</tr>
			</thead>
			<!--tr><td>Low-Osmolarity Oral Rehydration Salts (ORS): </td></tr-->
			<tr class="clonable ors">
				<!--td width="144">
				<input type="text"  name="orsStockBatchNo_1" id="orsStockBatchNo_1" class="cloned" maxlength="10"/>
				
				</td-->
				<td width="144">
				<input type="number"  name="orsOPDStockQuantity_1" id="orsOPDStockQuantity_1" class="cloned fromZero" maxlength="6"/>
				<input type="hidden"  name="orsOPDCommodityName_1" id="orsOPDCommodityName_1" value="Oral Rehydration Salts (ORS) Sachet" />
				<input type="hidden"  name="orsOPDUnit_1" id="orsOPDUnit_1" value="OPD" />
				</td>
				<!--td width="144">
				<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
				</td-->
				<!--td width="144">
				<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
				</td-->
				<td width="144">
				<input type="text"  name="orsOPDStockExpiryDate_1" id="orsOPDStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<!--td width="144">
				<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
				</td-->
			</tr>
			<tr id="formbuttons_10">
				<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_10" value="Add a Batch" width="12"/>
				<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_10" value="Remove Batch" width="12"/>
			</tr>
		</table>
		
		<h3 align="center"> Ciprofloxacin Assessment</h3>
		<table>
			<thead>
				<tr>

					<!--td width="144">Batch No</td-->
					<td width="144">Quantities at Hand (Sachets)</td>
					<!--td width="144">Date Supplied to Facility</td-->
					<!--td width="144">Supplier</td-->
					<td width="144">Expiry Date</td>
					<!--td width="144">Comments</td-->

				</tr>
			</thead>
			<!--tr><td>Low-Osmolarity Oral Rehydration Salts (ORS): </td></tr-->
			<tr class="clonable ors">
				<!--td width="144">
				<input type="text"  name="orsStockBatchNo_1" id="orsStockBatchNo_1" class="cloned" maxlength="10"/>
				
				</td-->
				<td width="144">
				<input type="number"  name="cipOPDStockQuantity_1" id="cipOPDStockQuantity_1" class="cloned fromZero" maxlength="6"/>
				<input type="hidden"  name="cipOPDCommodityName_1" id="cipOPDCommodityName_1" value="Ciprofloxacin" />
				<input type="hidden"  name="cipOPDUnit_1" id="cipOPDUnit_1" value="OPD" />
				</td>
				<!--td width="144">
				<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
				</td-->
				<!--td width="144">
				<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
				</td-->
				<td width="144">
				<input type="text"  name="cipOPDStockExpiryDate_1" id="cipOPDStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<!--td width="144">
				<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
				</td-->
			</tr>
			<tr id="formbuttons_11">
				<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_11" value="Add a Batch" width="12"/>
				<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_11" value="Remove Batch" width="12"/>
			</tr>
		</table>
		
		<h3 align="center"> Metronidazole (Flagyl) Assessment</h3>
		<table>
			<thead>
				<tr>

					<!--td width="144">Batch No</td-->
					<td width="144">Quantities at Hand (Sachets)</td>
					<!--td width="144">Date Supplied to Facility</td-->
					<!--td width="144">Supplier</td-->
					<td width="144">Expiry Date</td>
					<!--td width="144">Comments</td-->

				</tr>
			</thead>
			<!--tr><td>Low-Osmolarity Oral Rehydration Salts (ORS): </td></tr-->
			<tr class="clonable ors">
				<!--td width="144">
				<input type="text"  name="orsStockBatchNo_1" id="orsStockBatchNo_1" class="cloned" maxlength="10"/>
				
				</td-->
				<td width="144">
				<input type="number"  name="metOPDStockQuantity_1" id="metOPDStockQuantity_1" class="cloned fromZero" maxlength="6"/>
				<input type="hidden"  name="metOPDCommodityName_1" id="metOPDCommodityName_1" value="Metronidazole (Flagyl)" />
				<input type="hidden"  name="metOPDUnit_1" id="metOPDUnit_1" value="OPD" />
				</td>
				<!--td width="144">
				<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
				</td-->
				<!--td width="144">
				<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
				</td-->
				<td width="144">
				<input type="text"  name="metOPDStockExpiryDate_1" id="metOPDStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<!--td width="144">
				<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
				</td-->
			</tr>
			<tr id="formbuttons_12">
				<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_12" value="Add a Batch" width="12"/>
				<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_12" value="Remove Batch" width="12"/>
			</tr>
		</table>
	</div> <!--close tabs-3-->
	
	
	<div id="tabs-4" class="tab Pharmacy step">
		<h3 align="center"> CHILD HEALTH COMMODITIES ASSESSMENT</h3>
	
	<p style="text-align: center;color:#872300">
			Indicate the quantities of the Zinc,ORS,Ciprofloxacin &amp; Metronidazole (Flagyl) available in this facility at the:
	</p>	<section align="center" class="row-title"> Unit: Pharmacy</section>
		 <h3 align="center">Zinc Sulphate 20mg Assessment</h3>
		<table>
			<thead>
				<tr>

					<td width="144">Batch No</td>
					<!--td width="144">Quantities at Hand (Tablets)</td-->
					<td width="144">Date Supplied to Facility</td>
					<td width="144">Supplier</td>
					<td width="144">Expiry Date</td>
					<td width="144">Comments</td>

				</tr>
			</thead>
			<tr class="clonable zinc">
				<td width="144">
				<input type="text"  name="znStockBatchNo_1" id="znStockBatchNo_1" class="cloned" maxlength="10"/>
				<input type="hidden"  name="znCommodityName_1" id="znCommodityName_1" value="Zinc Sulphate (20mg) Tablet" />
				<input type="hidden"  name="znPHAUnit_1" id="znPHAUnit_1" value="PHA" />
				</td>
				<!--td width="144">
				<input type="number"  name="znStockQuantity_1" id="znStockQuantity_1" class="cloned fromZero" maxlength="6"/>
				</td-->
				<td width="144">
				<input type="date"  name="znPHAStockDispensedDate_1" id="znPHAStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<td width="144">
				<input type="text"  name="znPHAStockSupplier_1" id="znPHAStockSupplier_1" class="cloned" maxlength="45"/>
				</td>
				<td width="144">
				<input type="text"  name="znPHAStockExpiryDate_1" id="znPHAStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<td width="144">
				<input type="text"  name="znPHAStockComments_1" id="znPHAStockComments_1" class="cloned" maxlength="255"/>
				</td>
			</tr>
			<tr id="formbuttons_13">
				<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_13" value="Add a Batch" width="auto"/>
				<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_13" value="Remove Batch" width="auto"/>
			</tr>
		</table>

		<h3 align="center"> Low-Osmolarity Oral Rehydration Salts (ORS):</h3>
		<table>
			<thead>
				<tr>

					<td width="144">Batch No</td>
					<!--td width="144">Quantities at Hand (Sachets)</td-->
					<td width="144">Date Supplied to Facility</td>
					<td width="144">Supplier</td>
					<td width="144">Expiry Date</td>
					<td width="144">Comments</td>

				</tr>
			</thead>
			<!--tr><td>Low-Osmolarity Oral Rehydration Salts (ORS): </td></tr-->
			<tr class="clonable ors">
				<td width="144">
				<input type="text"  name="orsPHAStockBatchNo_1" id="orsPHAStockBatchNo_1" class="cloned" maxlength="10"/>
				<input type="hidden"  name="orsPHACommodityName_1" id="orsPHACommodityName_1" value="Oral Rehydration Salts (ORS) Sachet" />
				<input type="hidden"  name="orsPHAUnit_1" id="orsPHAUnit_1" value="PHA" />
				</td>
				<!--td width="144">
				<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned fromZero" maxlength="6"/>
				</td-->
				<td width="144">
				<input type="date"  name="orsPHAStockDispensedDate_1" id="orsPHAStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<td width="144">
				<input type="text"  name="orsPHAStockSupplier_1" id="orsPHAStockSupplier_1" class="cloned" maxlength="45"/>
				</td>
				<td width="144">
				<input type="text"  name="orsPHAStockExpiryDate_1" id="orsPHAStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<td width="144">
				<input type="text"  name="orsPHAStockComments_1" id="orsPHAStockComments_1" class="cloned" maxlength="255"/>
				</td>
			</tr>
			<tr id="formbuttons_14">
				<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_14" value="Add a Batch" width="12"/>
				<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_14" value="Remove Batch" width="12"/>
			</tr>
		</table>
		
		<h3 align="center"> Ciprofloxacin Assessment</h3>
		<table>
			<thead>
				<tr>

					<td width="144">Batch No</td>
					<!--td width="144">Quantities at Hand (Sachets)</td-->
					<td width="144">Date Supplied to Facility</td>
					<td width="144">Supplier</td>
					<td width="144">Expiry Date</td>
					<td width="144">Comments</td>

				</tr>
			</thead>
			<!--tr><td>Low-Osmolarity Oral Rehydration Salts (ORS): </td></tr-->
			<tr class="clonable ors">
				<td width="144">
				<input type="text"  name="cipPHAStockBatchNo_1" id="cipPHAStockBatchNo_1" class="cloned" maxlength="10"/>
				<input type="hidden"  name="cipPHACommodityName_1" id="cipPHACommodityName_1" value="Ciprofloxacin" />
				<input type="hidden"  name="cipPHAUnit_1" id="cipPHAUnit_1" value="PHA" />
				</td>
				<!--td width="144">
				<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned fromZero" maxlength="6"/>
				</td-->
				<td width="144">
				<input type="date"  name="cipPHAStockDispensedDate_1" id="cipPHAStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<td width="144">
				<input type="text"  name="cipPHAStockSupplier_1" id="cipPHAStockSupplier_1" class="cloned" maxlength="45"/>
				</td>
				<td width="144">
				<input type="text"  name="cipPHAStockExpiryDate_1" id="cipPHAStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<td width="144">
				<input type="text"  name="cipPHAStockComments_1" id="cipPHAStockComments_1" class="cloned" maxlength="255"/>
				</td>
			</tr>
			<tr id="formbuttons_15">
				<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_15" value="Add a Batch" width="12"/>
				<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_15" value="Remove Batch" width="12"/>
			</tr>
		</table>
		
		<h3 align="center"> Metronidazole (Flagyl) Assessment</h3>
		<table>
			<thead>
				<tr>

					<td width="144">Batch No</td>
					<!--td width="144">Quantities at Hand (Sachets)</td-->
					<td width="144">Date Supplied to Facility</td>
					<td width="144">Supplier</td>
					<td width="144">Expiry Date</td>
					<td width="144">Comments</td>

				</tr>
			</thead>


			<!--tr><td>Low-Osmolarity Oral Rehydration Salts (ORS): </td></tr-->
			<tr class="clonable ors">
				<td width="144">
				<input type="text"  name="metPHAStockBatchNo_1" id="metPHAStockBatchNo_1" class="cloned" maxlength="10"/>
				<input type="hidden"  name="metPHACommodityName_1" id="metPHACommodityName_1" value="Metronidazole (Flagyl)" />
				<input type="hidden"  name="metPHAUnit_1" id="metPHAUnit_1" value="PHA" />
				</td>
				<!--td width="144">
				<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned fromZero" maxlength="6"/>
				</td-->
				<td width="144">
				<input type="date"  name="metPHAStockDispensedDate_1" id="metPHAStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<td width="144">
				<input type="text"  name="metPHAStockSupplier_1" id="metPHAStockSupplier_1" class="cloned" maxlength="45"/>
				</td>
				<td width="144">
				<input type="text"  name="metPHAStockExpiryDate_1" id="metPHAStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<td width="144">
				<input type="text"  name="metPHAStockComments_1" id="metPHAStockComments_1" class="cloned" maxlength="255"/>
				</td>
			</tr>
			<tr id="formbuttons_16">
				<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_16" value="Add a Batch" width="12"/>
				<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_16" value="Remove Batch" width="12"/>
			</tr>
		</table>
	</div> <!--close tabs-4-->
	
	<div id="tabs-5" class="tab Stores step">
		<h3 align="center"> CHILD HEALTH COMMODITIES ASSESSMENT</h3>
	
	<p style="text-align: center;color:#872300">
			Indicate the quantities of the Zinc,ORS,Ciprofloxacin &amp; Metronidazole (Flagyl) available in this facility at the:
	</p>
	<section align="center" class="row-title"> Unit: Stores</section>
		 <h3 align="center">Zinc Sulphate 20mg Assessment</h3>
		<table>
			<thead>
				<tr>

					<td width="144">Batch No</td>
					<!--td width="144">Quantities at Hand (Tablets)</td-->
					<td width="144">Date Supplied to Facility</td>
					<td width="144">Supplier</td>
					<td width="144">Expiry Date</td>
					<td width="144">Comments</td>

				</tr>
			</thead>
			<tr class="clonable zinc">
				<td width="144">
				<input type="text"    name="znSTOBatchNo_1" id="znSTOStockBatchNo_1" class="cloned" maxlength="10"/>
				<input type="hidden"  name="znSTOCommodityName_1" id="znSTOCommodityName_1" value="Zinc Sulphate (20mg) Tablet" />
				<input type="hidden"  name="znSTOUnit_1" id="znSTOUnit_1" value="Store" />
				</td>
				<!--td width="144">
				<input type="number"  name="znStockQuantity_1" id="znStockQuantity_1" class="cloned fromZero" maxlength="6"/>
				</td-->
				<td width="144">
				<input type="date"  name="znSTOStockDispensedDate_1" id="znSTOStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<td width="144">
				<input type="text"  name="znSTOStockSupplier_1" id="znSTOStockSupplier_1" class="cloned" maxlength="45"/>
				</td>
				<td width="144">
				<input type="text"  name="znSTOStockExpiryDate_1" id="znStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<td width="144">
				<input type="text"  name="znSTOStockComments_1" id="znSTOStockComments_1" class="cloned" maxlength="255"/>
				</td>
			</tr>
			<tr id="formbuttons_17">
				<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_17" value="Add a Batch" width="auto"/>
				<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_17" value="Remove Batch" width="auto"/>
			</tr>
		</table>

		<h3 align="center"> Low-Osmolarity Oral Rehydration Salts (ORS):</h3>
		<table>
			<thead>
				<tr>

					<td width="144">Batch No</td>
					<!--td width="144">Quantities at Hand (Sachets)</td-->
					<td width="144">Date Supplied to Facility</td>
					<td width="144">Supplier</td>
					<td width="144">Expiry Date</td>
					<td width="144">Comments</td>

				</tr>
			</thead>
			<!--tr><td>Low-Osmolarity Oral Rehydration Salts (ORS): </td></tr-->
			<tr class="clonable ors">
				<td width="144">
				<input type="text"  name="orsSTOStockBatchNo_1" id="orsSTOStockBatchNo_1" class="cloned" maxlength="10"/>
				<input type="hidden"  name="orsSTOCommodityName_1" id="orsSTOCommodityName_1" value="Oral Rehydration Salts (ORS) Sachet" />
				<input type="hidden"  name="orsSTOUnit_1" id="orsSTOUnit_1" value="Store" />
				</td>
				<!--td width="144">
				<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned fromZero" maxlength="6"/>
				</td-->
				<td width="144">
				<input type="date"  name="orsSTOStockDispensedDate_1" id="orsSTOStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<td width="144">
				<input type="text"  name="orsSTOStockSupplier_1" id="orsSTOStockSupplier_1" class="cloned" maxlength="45"/>
				</td>
				<td width="144">
				<input type="text"  name="orsSTOStockExpiryDate_1" id="orsSTOStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<td width="144">
				<input type="text"  name="orsSTOStockComments_1" id="orsSTOStockComments_1" class="cloned" maxlength="255"/>
				</td>
			</tr>
			<tr id="formbuttons_18">
				<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_18" value="Add a Batch" width="12"/>
				<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_18" value="Remove Batch" width="12"/>
			</tr>
		</table>
		
		<h3 align="center"> Ciprofloxacin Assessment</h3>
		<table>
			<thead>
				<tr>

					<td width="144">Batch No</td>
					<!--td width="144">Quantities at Hand (Sachets)</td-->
					<td width="144">Date Supplied to Facility</td>
					<td width="144">Supplier</td>
					<td width="144">Expiry Date</td>
					<td width="144">Comments</td>

				</tr>
			</thead>
			<!--tr><td>Low-Osmolarity Oral Rehydration Salts (ORS): </td></tr-->
			<tr class="clonable ors">
				<td width="144">
				<input type="text"  name="cipSTOStockBatchNo_1" id="cipSTOStockBatchNo_1" class="cloned" maxlength="10"/>
				<input type="hidden"  name="cipSTOCommodityName_1" id="cipSTOCommodityName_1" value="Ciprofloxacin" />
				<input type="hidden"  name="cipSTOUnit_1" id="cipSTOUnit_1" value="Store" />
				</td>
				<!--td width="144">
				<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned fromZero" maxlength="6"/>
				</td-->
				<td width="144">
				<input type="date"  name="cipSTOStockDispensedDate_1" id="cipSTOStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<td width="144">
				<input type="text"  name="cipSTOStockSupplier_1" id="cipSTOStockSupplier_1" class="cloned" maxlength="45"/>
				</td>
				<td width="144">
				<input type="text"  name="cipSTOStockExpiryDate_1" id="cipSTOStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<td width="144">
				<input type="text"  name="cipSTOStockComments_1" id="cipSTOStockComments_1" class="cloned" maxlength="255"/>
				</td>
			</tr>
			<tr id="formbuttons_19">
				<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_19" value="Add a Batch" width="12"/>
				<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_19" value="Remove Batch" width="12"/>
			</tr>
		</table>
		
		<h3 align="center"> Metronidazole (Flagyl) Assessment</h3>
		<table>
			<thead>
				<tr>

					<td width="144">Batch No</td>
					<!--td width="144">Quantities at Hand (Sachets)</td-->
					<td width="144">Date Supplied to Facility</td>
					<td width="144">Supplier</td>
					<td width="144">Expiry Date</td>
					<td width="144">Comments</td>

				</tr>
			</thead>
			<!--tr><td>Low-Osmolarity Oral Rehydration Salts (ORS): </td></tr-->
			<tr class="clonable ors">
				<td width="144">
				<input type="text"  name="metSTOStockBatchNo_1" id="metSTOStockBatchNo_1" class="cloned" maxlength="10"/>
				<input type="hidden"  name="metSTOCommodityName_1" id="metSTOCommodityName_1" value="Metronidazole (Flagyl)" />
				<input type="hidden"  name="metSTOUnit_1" id="metSTOUnit_1" value="Store" />
				</td>
				<!--td width="144">
				<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned fromZero" maxlength="6"/>
				</td-->
				<td width="144">
				<input type="date"  name="metSTOStockDispensedDate_1" id="metSTOStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<td width="144">
				<input type="text"  name="metSTOStockSupplier_1" id="metSTOStockSupplier_1" class="cloned" maxlength="45"/>
				</td>
				<td width="144">
				<input type="text"  name="metSTOStockExpiryDate_1" id="metSTOStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<td width="144">
				<input type="text"  name="metSTOStockComments_1" id="metSTOStockComments_1" class="cloned" maxlength="255"/>
				</td>
			</tr>
			<tr id="formbuttons_20">
				<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_20" value="Add a Batch" width="12"/>
				<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_20" value="Remove Batch" width="12"/>
			</tr>
		</table>
		
	</div> <!--close tabs-5-->
	
	<div id="tabs-6" class="tab Others step">
		<h3 align="center"> CHILD HEALTH COMMODITIES ASSESSMENT</h3>
	
	<p style="text-align: center;color:#872300">
			Indicate the quantities of the Zinc,ORS,Ciprofloxacin &amp; Metronidazole (Flagyl) available in this facility at the:
	</p>
	<section align="center" class="row-title"> Unit: Others</section>
		 <h3 align="center">Zinc Sulphate 20mg Assessment</h3>
		<table>
			<thead>
				<tr>

					<td width="144">Batch No</td>
					<!--td width="144">Quantities at Hand (Tablets)</td-->
					<td width="144">Date Supplied to Facility</td>
					<td width="144">Supplier</td>
					<td width="144">Expiry Date</td>
					<td width="144">Comments</td>

				</tr>
			</thead>
			<div class="row2"> 
				<label>Unit Name</label>
				<input type="text"  name="otherUnit_1" id="otherUnit_1" class="cloned" maxlength="45"/>
				</div>
			<tr class="clonable zinc">
				<td width="144">
				<input type="text"  name="znOTHStockBatchNo_1" id="znOTHStockBatchNo_1" class="cloned" maxlength="10"/>
				<input type="hidden"  name="znOTHCommodityName_1" id="znOTHCommodityName_1" value="Zinc Sulphate (20mg) Tablet" />
				</td>
				<!--td width="144">
				<input type="number"  name="znStockQuantity_1" id="znStockQuantity_1" class="cloned fromZero" maxlength="6"/>
				</td-->
				<td width="144">
				<input type="date"  name="znOTHStockDispensedDate_1" id="znOTHStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<td width="144">
				<input type="text"  name="znOTHStockSupplier_1" id="znOTHStockSupplier_1" class="cloned" maxlength="45"/>
				</td>
				<td width="144">
				<input type="text"  name="znOTHStockExpiryDate_1" id="znOTHStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<!--td width="144">
				<input type="text"  name="znStockComments_1" id="znStockComments_1" class="cloned" maxlength="255"/>
				</td-->
			</tr>
			<tr id="formbuttons_21">
				<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_21" value="Add a Batch" width="auto"/>
				<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_21" value="Remove Batch" width="auto"/>
			</tr>
		</table>

		<h3 align="center"> Low-Osmolarity Oral Rehydration Salts (ORS):</h3>
		<table>
			<thead>
				<tr>

					<td width="144">Batch No</td>
					<!--td width="144">Quantities at Hand (Sachets)</td-->
					<td width="144">Date Supplied to Facility</td>
					<td width="144">Supplier</td>
					<td width="144">Expiry Date</td>
					<td width="144">Comments</td>

				</tr>
			</thead>
			<!--tr><td>Low-Osmolarity Oral Rehydration Salts (ORS): </td></tr-->
			<tr class="clonable ors">
				<td width="144">
				<input type="text"  name="orsOTHStockBatchNo_1" id="orsOTHStockBatchNo_1" class="cloned" maxlength="10"/>
				<input type="hidden"  name="orsOTHCommodityName_1" id="orsOTHCommodityName_1" value="Oral Rehydration Salts (ORS) Sachet" />
				</td>
				<!--td width="144">
				<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned fromZero" maxlength="6"/>
				</td-->
				<td width="144">
				<input type="date"  name="orsOTHStockDispensedDate_1" id="orsOTHStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<td width="144">
				<input type="text"  name="orsOTHStockSupplier_1" id="orsOTHStockSupplier_1" class="cloned" maxlength="45"/>
				</td>
				<td width="144">
				<input type="text"  name="orsOTHStockExpiryDate_1" id="orsOTHStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<!--td width="144">
				<input type="text"  name="orsOTHStockComments_1" id="orsOTHStockComments_1" class="cloned" maxlength="255"/>
				</td-->
			</tr>
			<tr id="formbuttons_22">
				<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_22" value="Add a Batch" width="12"/>
				<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_22" value="Remove Batch" width="12"/>
			</tr>
		</table>
		
		<h3 align="center"> Ciprofloxacin Assessment</h3>
		<table>
			<thead>
				<tr>

					<td width="144">Batch No</td>
					<!--td width="144">Quantities at Hand (Sachets)</td-->
					<td width="144">Date Supplied to Facility</td>
					<td width="144">Supplier</td>
					<td width="144">Expiry Date</td>
					<td width="144">Comments</td>

				</tr>
			</thead>
			<!--tr><td>Low-Osmolarity Oral Rehydration Salts (ORS): </td></tr-->
			<tr class="clonable ors">
				<td width="144">
				<input type="text"  name="cipOTHStockBatchNo_1" id="cipOTHStockBatchNo_1" class="cloned" maxlength="10"/>
				<input type="hidden"  name="cipOTHCommodityName_1" id="cipOTHCommodityName_1" value="Ciprofloxacin" />
				</td>
				<!--td width="144">
				<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned fromZero" maxlength="6"/>
				</td-->
				<td width="144">
				<input type="date"  name="cipOTHStockDispensedDate_1" id="cipOTHStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<td width="144">
				<input type="text"  name="cipOTHStockSupplier_1" id="cipOTHStockSupplier_1" class="cloned" maxlength="45"/>
				</td>
				<td width="144">
				<input type="text"  name="cipOTHStockExpiryDate_1" id="cipOTHStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<!--td width="144">
				<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
				</td-->
			</tr>
			<tr id="formbuttons_23">
				<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_23" value="Add a Batch" width="12"/>
				<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_23" value="Remove Batch" width="12"/>
			</tr>
		</table>
		
		<h3 align="center"> Metronidazole (Flagyl)</h3>
		<table>
			<thead>
				<tr>

					<td width="144">Batch No</td>
					<!--td width="144">Quantities at Hand (Sachets)</td-->
					<td width="144">Date Supplied to Facility</td>
					<td width="144">Supplier</td>
					<td width="144">Expiry Date</td>
					<td width="144">Comments</td>

				</tr>
			</thead>
			<!--tr><td>Low-Osmolarity Oral Rehydration Salts (ORS): </td></tr-->
			<tr class="clonable ors">
				<td width="144">
				<input type="text"  name="metOTHStockBatchNo_1" id="metOTHStockBatchNo_1" class="cloned" maxlength="10"/>
				<input type="hidden"  name="metOTHCommodityName_1" id="metOTHCommodityName_1" value="Metronidazole" />
				</td>
				<!--td width="144">
				<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned fromZero" maxlength="6"/>
				</td-->
				<td width="144">
				<input type="date"  name="metOTHStockDispensedDate_1" id="metOTHStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<td width="144">
				<input type="text"  name="metOTHStockSupplier_1" id="metOTHStockSupplier_1" class="cloned" maxlength="45"/>
				</td>
				<td width="144">
				<input type="text"  name="metOTHStockExpiryDate_1" id="metOTHStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<td width="144">
				<input type="text"  name="metOTHStockComments_1" id="metOTHStockComments_1" class="cloned" maxlength="255"/>
				</td>
			</tr>
			<tr id="formbuttons_24">
				<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_24" value="Add a Batch" width="12"/>
				<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_24" value="Remove Batch" width="12"/>
			</tr>
		</table>
	</div> <!--end of tabs-6-->
<!--end child health drug section -->	

<!--begin ort corner section-->
<div id="ort_part1" class="step">
<h3 align="center"> Oral Rehydration Therapy Corner Assessment </h3>
	<section class="block">
		<section class="column">
			<section class="row-title">
				<section class="left">
					ASPECTS
				</section>
				<section class="right" style="float:right">
					<section class="col">
						YES
					</section>
					<section class="col">
						NO
					</section>
				</section>
			</section>
			<section class="row">
				<section class="left">
					<label> Are dehydrated children rehydrated at this facility? </label>
				</section>
				<section class="right">
					<section class="col">
						<input type="radio" name="ortQuestion1" id="ortQuestion1_y" value="1" />
					</section>
					<section class="col">
						<input type="radio" name="ortQuestion1" id="ortQuestion1_n" value="0" />
					</section>
				</section>
			</section>
			<section class="row">
				<section class="left">
					<label> Does the facility have a designated location for oral rehydration ?</label>
				</section>
				<section class="right">
					<section class="col">
						<input type="radio" name="ortQuestion2" id="ortQuestion2_y"  value="1" />
					</section>
					<section class="col">
						<input type="radio" name="ortQuestion2" id="ortQuestion2_n" value="0" />
					</section>
				</section>
			</section>
			<section class="row hide" style="display:none">
					<label class="dcah-label"> Check the various locations where rehydration is carried out</label>
				</section>
			<section class="row hide" style="display:none">
				<section class="left" >
					<label> MCH</label>
				</section>
				<section class="right">
					<section class="col">
						<input type="checkbox" name="ortDehydrationLocation" id="ortDehydrationLocation"  value="" maxlength="50"/>
					</section>
				</section>
			</section>
			<section class="row hide" style="display:none">
				<section class="left" >
					<label> OPD</label>
				</section>
				<section class="right">
					<section class="col">
						<input type="checkbox" name="ortDehydrationLocationOPD" id="ortDehydrationLocationOPD"  value="" maxlength="50"/>
					</section>
				</section>
			</section>
			<section class="row hide" style="display:none">
				<section class="left" >
					<label> WARD </label>
				</section>
				<section class="right">
					<section class="col">
						<input type="checkbox" name="ortDehydrationLocationWard" id="ortDehydrationLocationWard"  value="" maxlength="50"/>
					</section>
				</section>
			</section>
			<section class="row hide" style="display:none">
				<section class="left" >
					<label> Other*?</label>
				</section>
				<section class="right">
					<section class="col">
						<input type="text" name="ortDehydrationLocationOther" id="ortDehydrationLocationOther"  value="" maxlength="50"/>
					</section>
				</section>
			</section>
		</section>
	</section>
	</div> <!--end of ort corner part1 -->
	
	 <div id="ort_part2" class="step">
	<div class="row-title">
		<label class="dcah-label">EQUIPMENT</label>
	</div>
	<h3 align="center"> State the availability &amp; Quantities of the following Equipment at the ORT Corner-(Assessor should ensure the interviewee responds to each of the questions). </h3>
	<div class="block">
		<table id="tableEquipmentList">
			<tr class="row2">
				<input type="button" id="editEquipmentListTopButton" name="editEquipmentListTopButton" class="awesome myblue medium" value="Edit List"/>
			</tr>
			<tr>
				<thead >
					<td width="144"><label class="dcah-label" style="font-size:1.0em">Equipment Name</label></td>
					<td width="144"><label class="dcah-label" style="font-size:1.0em">Yes/No</label></td>
					<td width="144"><label class="dcah-label" style="font-size:1.0em">Total Equipment Quantities</label></td>
					<td width="144"><label class="dcah-label" style="font-size:1.0em">Who supplied the supplies to the facility? (respond by item)</label></td>
					<td width="144"><label class="dcah-label" style="font-size:1.0em">Is there a budget for replacement of the missing, stolen or Broken ORT Corner equipment in the Current *AOP/QIP?</label></td>
				</thead>

			</tr>

			<tr class="row2" id="tr_1">
				<td width="144"><label>Tea spoons </label>
				<input type="hidden"  name="equipCode_1" id="equipCode_1" value="EQP01" />
				</td>
				<td width="144">
				<select name="equipAvailable_1" id="equipAvailable_1" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_1" id="equipQuantity_1" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_1" id="equipSupplier_1" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_1" id="equipBudgetPresent_1" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_2">
				<td width="144"><label>Table spoons </label>
				<input type="hidden"  name="equipCode_2" id="equipCode_2" value="EQP02" />
				</td>
				<td width="144">
				<select name="equipAvailable_2" id="equipAvailable_2" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_2" id="equipQuantity_2" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_2" id="equipSupplier_2" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_2" id="equipBudgetPresent_2" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_3">
				<td width="144"><label>Stirring spoon </label>
				<input type="hidden"  name="equipCode_3" id="equipCode_3" value="EQP03" />
				</td>
				<td width="144">
				<select name="equipAvailable_3" id="equipAvailable_3" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_3" id="equipQuantity_3" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_3" id="equipSupplier_3" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_3" id="equipBudgetPresent_3" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_4">
				<td width="144"><label>Plastic buckets (with lids for infection prevention) </label>
				<input type="hidden"  name="equipCode_4" id="equipCode_4" value="EQP04" />
				</td>
				<td width="144">
				<select name="equipAvailable_4" id="equipAvailable_4" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_4" id="equipQuantity_4" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_4" id="equipSupplier_4" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_4" id="equipBudgetPresent_4" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_5">
				<td width="144"><label> Buckets â€“ for storing cups, spoons </label>
				<input type="hidden"  name="equipCode_5" id="equipCode_5" value="EQP05" />
				</td>
				<td width="144">
				<select name="equipAvailable_5" id="equipAvailable_5" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_5" id="equipQuantity_5" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_5" id="equipSupplier_5" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_5" id="equipBudgetPresent_5" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_6">
				<td width="144"><label> Plastic cups (50-100mls) </label>
				<input type="hidden"  name="equipCode_6" id="equipCode_6" value="EQP06" />
				</td>
				<td width="144">
				<select name="equipAvailable_6" id="equipAvailable_6" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_6" id="equipQuantity_6" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_6" id="equipSupplier_6" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_6" id="equipBudgetPresent_6" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_7">
				<td width="144"><label> Plastic cups (101-200mls) </label>
				<input type="hidden"  name="equipCode_7" id="equipCode_7" value="EQP07" />
				</td>
				<td width="144">
				<select name="equipAvailable_7" id="equipAvailable_7" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_7" id="equipQuantity_7" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_7" id="equipSupplier_7" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_7" id="equipBudgetPresent_7" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_8">
				<td width="144"><label> Plastic cups (201mls-499mls) </label>
				<input type="hidden"  name="equipCode_8" id="equipCode_8" value="EQP08" />
				</td>
				<td width="144">
				<select name="equipAvailable_8" id="equipAvailable_8" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_8" id="equipQuantity_8" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_8" id="equipSupplier_8" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_8" id="equipBudgetPresent_8" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_9">
				<td width="144"><label> Plastic cups (500mls) </label>
				<input type="hidden"  name="equipCode_9" id="equipCode_9" value="EQP09" />
				</td>
				<td width="144">
				<select name="equipAvailable_9" id="equipAvailable_9" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_9" id="equipQuantity_9" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_9" id="equipSupplier_9" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_9" id="equipBudgetPresent_9" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_10">
				<td width="144"><label> 1 litre Calibrated measuring jars </label>
				<input type="hidden"  name="equipCode_10" id="equipCode_10" value="EQP10" />
				</td>
				<td width="144">
				<select name="equipAvailable_10" id="equipAvailable_10" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_10" id="equipQuantity_10" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_10" id="equipSupplier_10" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_10" id="equipBudgetPresent_10" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_11">
				<td width="144"><label> Table Trays </label>
				<input type="hidden"  name="equipCode_11" id="equipCode_11" value="EQP11" />
				</td>
				<td width="144">
				<select name="equipAvailable_11" id="equipAvailable_11" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_11" id="equipQuantity_11" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_11" id="equipSupplier_11" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_11" id="equipBudgetPresent_11" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_12">
				<td width="144"><label> Wash Basins </label>
				<input type="hidden"  name="equipCode_12" id="equipCode_12" value="EQP12" />
				</td>
				<td width="144">
				<select name="equipAvailable_12" id="equipAvailable_12" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_12" id="equipQuantity_12" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_12" id="equipSupplier_12" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_12" id="equipBudgetPresent_12" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_13">
				<td width="144"><label> Water heating equipment,(e.g..hot plate/Meko ) </label>
				<input type="hidden"  name="equipCode_13" id="equipCode_13" value="EQP13" />
				</td>
				<td width="144">
				<select name="equipAvailable_13" id="equipAvailable_13" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_13" id="equipQuantity_13" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_13" id="equipSupplier_13" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_13" id="equipBudgetPresent_13" class="cloned ">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_14">
				<td width="144"><label> Hot plate-Electric/Solar powered </label>
				<input type="hidden"  name="equipCode_14" id="equipCode_14" value="EQP14" />
				</td>
				<td width="144">
				<select name="equipAvailable_14" id="equipAvailable_14" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_14" id="equipQuantity_14" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_14" id="equipSupplier_14" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_14" id="equipBudgetPresent_14" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_15">
				<td width="144"><label> Heater- Gas powered </label>
				<input type="hidden"  name="equipCode_15" id="equipCode_15" value="EQP15" />
				</td>
				<td width="144">
				<select name="equipAvailable_15" id="equipAvailable_15" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_15" id="equipQuantity_15" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_15" id="equipSupplier_15" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_15" id="equipBudgetPresent_15" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_16">
				<td width="144"><label> Charcoal or Firewood  stove/Heater </label>
				<input type="hidden"  name="equipCode_16" id="equipCode_16" value="EQP16" />
				</td>
				<td width="144">
				<select name="equipAvailable_16" id="equipAvailable_16" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_16" id="equipQuantity_16" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_16" id="equipSupplier_16" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_16" id="equipBudgetPresent_16" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_17">
				<td width="144"><label> Paraffin Stove/Heater </label>
				<input type="hidden"  name="equipCode_17" id="equipCode_17" value="EQP17" />
				</td>
				<td width="144">
				<select name="equipAvailable_17" id="equipAvailable_17" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_17" id="equipQuantity_17" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_17" id="equipSupplier_17" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_17" id="equipBudgetPresent_17" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_18">
				<td width="144"><label> Sufurias  with a Lid (14 inch) </label>
				<input type="hidden"  name="equipCode_18" id="equipCode_18" value="EQP18" />
				</td>
				<td width="144">
				<select name="equipAvailable_18" id="equipAvailable_18" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_18" id="equipQuantity_18" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_18" id="equipSupplier_18" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_18" id="equipBudgetPresent_18" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_19">
				<td width="144"><label> Waste Container </label>
				<input type="hidden"  name="equipCode_19" id="equipCode_19" value="EQP19" />
				</td>
				<td width="144">
				<select name="equipAvailable_19" id="equipAvailable_19" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_19" id="equipQuantity_19" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_19" id="equipSupplier_19" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_19" id="equipBudgetPresent_19" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_20">
				<td width="144"><label> Wall Clock /Timing device </label>
				<input type="hidden"  name="equipCode_20" id="equipCode_20" value="EQP20" />
				</td>
				<td width="144">
				<select name="equipAvailable_20" id="equipAvailable_20" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_20" id="equipQuantity_20" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_20" id="equipSupplier_20" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_20" id="equipBudgetPresent_20" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_21">
				<td width="144"><label> Table- for mixing ORS </label>
				<input type="hidden"  name="equipCode_21" id="equipCode_21" value="EQP21" />
				</td>
				<td width="144">
				<select name="equipAvailable_21" id="equipAvailable_21" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_21" id="equipQuantity_21" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_21" id="equipSupplier_21" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_21" id="equipBudgetPresent_21" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_22">
				<td width="144"><label> Benches/chair(s) </label>
				<input type="hidden"  name="equipCode_22" id="equipCode_22" value="EQP22" />
				</td>
				<td width="144">
				<select name="equipAvailable_22" id="equipAvailable_22" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_22" id="equipQuantity_22" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_22" id="equipSupplier_22" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_22" id="equipBudgetPresent_22" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_23">
				<td width="144"><label> Water Storage Container ( at least 40lts)- With Tap </label>
				<input type="hidden"  name="equipCode_23" id="equipCode_23" value="EQP23" />
				</td>
				<td width="144">
				<select name="equipAvailable_23" id="equipAvailable_23" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_23" id="equipQuantity_23" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_23" id="equipSupplier_23" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_23" id="equipBudgetPresent_23" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_24">
				<td width="144"><label> Water Storage Container ( at least 40lts)- Without Tap </label>
				<input type="hidden"  name="equipCode_24" id="equipCode_24" value="EQP24" />
				</td>
				<td width="144">
				<select name="equipAvailable_24" id="equipAvailable_24" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_24" id="equipQuantity_24" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_24" id="equipSupplier_24" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_24" id="equipBudgetPresent_24" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_25">
				<td width="144"><label> Locally available measuring containers e.g. cooking fat Tins. </label>
				<input type="hidden"  name="equipCode_25" id="equipCode_25" value="EQP25" />
				</td>
				<td width="144">
				<select name="equipAvailable_25" id="equipAvailable_25" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_25" id="equipQuantity_25" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_25" id="equipSupplier_25" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_25" id="equipBudgetPresent_25" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_26">
				<td width="144"><label> Weighing scale </label>
				<input type="hidden"  name="equipCode_26" id="equipCode_26" value="EQP26" />
				</td>
				<td width="144">
				<select name="equipAvailable_26" id="equipAvailable_26" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_26" id="equipQuantity_26" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_26" id="equipSupplier_26" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_26" id="equipBudgetPresent_26" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_27">
				<td width="144"><label> Hand Washing Facility/Point e.g. tippy taps. </label>
				<input type="hidden"  name="equipCode_27" id="equipCode_27" value="EQP27" />
				</td>
				<td width="144">
				<select name="equipAvailable_27" id="equipAvailable_27" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_27" id="equipQuantity_27" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_27" id="equipSupplier_27" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_27" id="equipBudgetPresent_27" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_28">
				<td width="144"><label> Safe water source </label>
				<input type="hidden"  name="equipCode_28" id="equipCode_28" value="EQP28" />
				</td>
				<td width="144">
				<select name="equipAvailable_28" id="equipAvailable_28" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_28" id="equipQuantity_28" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_28" id="equipSupplier_28" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_28" id="equipBudgetPresent_28" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_29">
				<td width="144"><label> Thermometer </label>
				<input type="hidden"  name="equipCode_29" id="equipCode_29" value="EQP29" />
				</td>
				<td width="144">
				<select name="equipAvailable_29" id="equipAvailable_29" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_29" id="equipQuantity_29" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_29" id="equipSupplier_29" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_29" id="equipBudgetPresent_29" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_30">
				<td width="144"><label> MUAC Tape </label>
				<input type="hidden"  name="equipCode_30" id="equipCode_30" value="EQP30" />
				</td>
				<td width="144">
				<select name="equipAvailable_30" id="equipAvailable_30" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_30" id="equipQuantity_30" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_30" id="equipSupplier_30" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_30" id="equipBudgetPresent_30" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
		</table>
	</div>
	</div> <!--end of ort corner part 2 -->
<!--end ort corner section-->

	<div class="buttons">
		<input title="To move to the previous step" id="back" class="awesome magenta medium" type="reset"/>
		<input title="To move to the next step" id="next" class="awesome blue medium"  type="submit"/>
		<!--a title="To close the form." id="close_opened_form" class="awesome red medium">Close</a-->
	</div>
</form>

<p id="data"></p>
' 	;

		$data['form'] = $form_zinc_ors;
		$data['form_id'] = 'zinc_ors_inventory';

		$this -> load -> view('form', $data);
	}

public function form_mnh_equipment_assessment() {
		$form_mnh_assessment = '';
		$form_mnh_assessment.= '
     <form name="form_mnh_assessment" id="form_mnh_assessment" method="POST" action="' . base_url() . 'submit/c_form/form_mnh_equipment_assessment11' . '" >
	<!-- form for collecting inventory status information -->

    <!-- begin facility  div --->
    <div id="facility_div" class="step">
    <h3 align="center">FACILITY REGISTRATION</h3>

	<div class="block">
		<div class="column">
			<div class="row-title">
				Facility Information
			</div>
			<!--div class="row2">
			<div class="left">
			<label>Date:</label>
			</div>
			<div class="right">
			<input type="date" name="facilityDateOfInventory" id="facilityDateOfInventory" readonly="readonly" class="autoDate" placeholder="click for date"/>
			</div>

			</div-->

			<div class="row2">
				<div class="left">
					<label>Facility Name:</label>
				</div>
				<div class="right">
					<input type="text" name="facilityName" id="facilityName"/>
				</div>
			</div>
			<div class="row2">
				<div class="left">
					<label>Facility Type:</label>
				</div>
				<div class="right">
					<select name="facilityType" id="facilityType">
						<option value="" selected="selected">Select One</option>
						' . $this -> selectFacilityType . '
					</select>
				</div>
			</div>
			<div class="row2">
				<div class="left">
					<label>Facility Level:</label>
				</div>
				<div class="right">
					<select name="facilityLevel" id="facilityLevel">
						<option value="" selected="selected">Select One</option>
						' . $this -> selectFacilityLevel . '
					</select>
				</div>
			</div>
			<div class="row2">
				<div class="left">
					<label>Owned By:</label>
				</div>
				<div class="right">
					<select name="facilityOwner" id="facilityOwner">
						<option value="" selected="selected">Select One</option>
						' . $this -> selectFacilityOwner . '
					</select>
				</div>
			</div>
			<div class="row2">
				<div class="left">
					<label>Province:</label>
				</div>
				<div class="right">
					<select name="facilityProvince" id="facilityProvince">
						<option value="" selected="selected">Select One</option>
						' . $this -> selectProvince . '
					</select>
				</div>
			</div>
			<div class="row2">
				<div class="left">

					<label>District:</label>
				</div>
				<div class="right">
					<select name="facilityDistrict" id="facilityDistrict">
						<option value="" selected="selected">Select One</option>
						' . $this -> selectDistricts . '
					</select>
				</div>
			</div>
			<div class="row2">
				<div class="left">
					<label>County:</label>
				</div>
				<div class="right">
					<select name="facilityCounty" id="facilityCounty">
						<option value="" selected="selected">Select One</option>
						' . $this -> selectCounties . '
					</select>
				</div>
			</div>

		</div>
		<div class="column" style="margin-bottom:30px">
			<div class="row-title">
				In Charge Contact Information
			</div>
			<div class="row2">
				<div class="left">
					<label>Name:</label>
				</div>
				<div class="right">
					<input type="text" name="facilityContactPerson" id="facilityContactPerson"/>
				</div>
			</div>
			<div class="row2">
				<div class="left">
					<label>Telephone:</label>
				</div>
				<div class="right">

				</div>

			</div>

			<div class="row2">
				<div class="left">
					<label>Cell 1:</label>
				</div>
				<div class="right">
					<input type="text" name="facilityTelephone" id="facilityTelephone" maxlength="14"/>
				</div>

			</div>

			<div class="row2">
				<div class="left">
					<label>Cell 2:</label>
				</div>
				<div class="right">
					<input type="text" name="facilityAltTelephone" id="facilityAltTelephone" maxlength="14"/>
				</div>

			</div>

			<div class="row2">
				<div class="left">
					<label>Email:</label>
				</div>
				<div class="right">
					<input type="email" name="facilityEmail" id="facilityEmail" maxlength="90"/>
					<input type="hidden"  name="facilityMFC" id="facilityMFC"/>
				</div>
			</div>
		</div>
	</div>
	<div class="block">
		<div class="column" style="margin-bottom:30px">
			<div class="row-title">
				MCH Contanct
			</div>
			<div class="row2">
				<div class="left">
					<label>Name:</label>
				</div>
				<div class="right">
					<input type="text" name="MCHContactPerson" id="MCHContactPerson"/>
				</div>
			</div>
			<div class="row2">
				<div class="left">
					<label>Telephone:</label>
				</div>
				<div class="right">

				</div>

			</div>

			<div class="row2">
				<div class="left">
					<label>Cell 1:</label>
				</div>
				<div class="right">
					<input type="text" name="MCHTelephone" id="MCHTelephone" maxlength="14"/>
				</div>

			</div>

			<div class="row2">
				<div class="left">
					<label>Cell 2:</label>
				</div>
				<div class="right">
					<input type="text" name="MCHAltTelephone" id="MCHAltTelephone" maxlength="14"/>
				</div>

			</div>

			<div class="row2">
				<div class="left">
					<label>Email:</label>
				</div>
				<div class="right">
					<input type="email" name="MCHEmail" id="MCHEmail" maxlength="90"/>
					<input type="hidden"  name="MCHMFC" id="MCHMFC"/>
				</div>
			</div>
		</div>
	</div>
	</div> 
	<!--end facility div-->
	
	<!--begin diarrhoiea morbidity factor div-->
	<div id="diarrhoea_cases" class="step">
	<h3 align="center">Diarrhoea Morbidity Data </h3>

	<div class="row2">
	<div class="left">
	<label>Indicate number of diarrhoea cases seen in this facility in the month of August 2012</label>
	</div>
	<div class="center">

	<input type="text" id="diarrhoeaCases" name="diarrhoeaCases" class="cloned"/>
	</div>
	</div>
	</div>
	
	<!--end diarrhoiea morbidity factor div-->
    
	<!-- form for collecting inventory status information -->

	<!--begin emonc div-->
	<div id="emonc" class="step">
		<h3 align="center"> ASSESSMENT OF EQUIPMENT AND SUPPLIES FOR EmONC</h3>

		<div class="block">
			<div class="column-wide">
				<div class="row-title">
					<div class="left">
						<label class="dcah-label">Inventory Type: Labor &amp; Delivery</label>
					</div>
					<div class="center">
						<label class="dcah-label">ANSWER</label>
					</div>

				</div>

				<div class="row">
					<div class="left">
						<label>4. Does the facility provide for delivery services?</label>
					</div>
					<div class="center cloned" >

						<select name="lndq4FacilityDelivery" id="lndq4FacilityDelivery" class="cloned left-combo">
							<option value="" selected="selected">Select One</option>
							<option value="Yes">Yes</option>
							<option value="No">No</option>
						</select>
					</div>

					<div id="q4comm" class="right" style="display: none">
						<input type="text" name="lndq4Comment" id="lndq4Comment" class="cloned"/>

					</div>

				</div>

				<div class="row">
					<div class="left">
						<label>5. Does the facility provide 24 hour coverage for delivery services?</label>
					</div>
					<div class="center cloned" >

						<select name="lndq5FacilityDelivery" id="lndq5FacilityDelivery" class="cloned left-combo">
							<option value="" selected="selected">Select One</option>
							<option value="Yes">Yes</option>
							<option value="No">No</option>
						</select>
					</div>

					<div id="q5comm" class="right" style="display: none">
						<input type="text" name="lndq5Comment" id="lndq5Comment" class="cloned"/>

					</div>

				</div>
				<div class="row">
					<div class="left">
						<label>6a. Is a person skilled in conducting deliveries present  at the facility or on call 24 hours a day,
						including weekends, to provide delivery care?</label>
					</div>
					<div class="center cloned">

						<select name="lndq6aConductingDelivery" id="lndq6aConductingDelivery" class="cloned left-combo">
							<option value="" selected="selected">Select One</option>
							<option value="Yes">Yes</option>
							<option value="No">No</option>
						</select>
					</div>
				</div>
				<div id="q6ay" class="row" style="display: none">
					<div class="left">
						<label>6b. Who conducts deliveries in this facility?</label>
					</div>
					<div class="center cloned" >
						<select name="lndq6bSkilledProviders[]" multiple="multiple" id="lndq6bSkilledProviders">

							<option>Mid-wife</option>
							<option>Trained Medical Officer</option>
							<option>Clinicial Officer</option>
							<option>Nursing Officer</option>
							<option>Doctor</option>
							<option>Community Health Worker</option>

						</select>
						<label for="lndq6otherProvider">Others(Specify)</label>
						<input type="text" id="lndq6otherProvider" name="lndq6otherProvider" maxlength="55" placeholder="provider1,provider2,...,"/>

					</div>
				</div>
				<div class="row">
					<div class="left">
						<label>7. Indicate the total number of beds in the maternity ward / unit in this facility*</label>
					</div>
					<div class="right">

						<input type="number" name="lndq7TotalBeds" id="lndq7TotalBeds" class="cloned fromZero" min="0" style="float:left"/>

					</div>

				</div>
			</div>
		</div>

	</div>
	<!--end emonc div-->

	<!--begin delivery place description div-->
	<div id="delivery_div" class="step">
		<div class="block">
			<div class="row-title">
				<label class="dcah-label">*Ask to see the room where Normal Deliveries are conducted</label>
			</div>

			<div class="row">
				<div class="left">
					<label>8. What is the setting of the Delivery Room?</label>
				</div>
				<div class="right">

					<select name="lndq8DeliveryRoom" id="lndq8DeliveryRoom" class="cloned">

						<option value="" selected="selected">Select One</option>
						<option>Private Room (accomodates one client)</option>
						<option>Partitioned Shared Room</option>
						<option>Non-Partitioned Shared Room</option>
					</select>
				</div>

			</div>
		</div>
		<!--end delivery place description div-->
	</div>

         
	<!--begin delivery services equipment div-->
	<div id="delivery_serv_equip" class="step">
		<h3>NOTE THE AVAILABILITY AND FUNCTIONALITY OF SUPPLIES AND EQUIPMENT REQUIRED FOR DELIVERY SERVICES. EQUIPMENT MAY BE IN DELIVERY ROOM OR AN ADJACENT ROOM.</h3>

		<div class="column-wide">
			<div class="row">

				<div class="row-title">
					<div class="left">
						<label class="dcah-label">9. EQUIPMENT REQUIRED FOR DELIVERY SERVICES</label>
					</div>
					<div class="center">
						<label class="dcah-label" style="width:45%">Availability (A)</label>
						<label class="dcah-label" style="float:right;width:45%">Quantity</label>

					</div>
					<div class="right">
						<label class="dcah-label" style="width:45%">Functioning (b)</label>
						<label class="dcah-label" style="float:right;width:45%">Quantity</label>
					</div>
				</div>
			</div>

			<div id="tableEquipmentList">
				<div class="row2">
					<input type="button" id="editEquipmentListTopButton" name="editEquipmentListTopButton" class="awesome myblue medium" value="Edit List"/>
				</div>

				<div class="row" id="tr_1">
					<div class="left">
						<label>9a. Examination light</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q9equipAvailability_1" id="q9equipAvailability_1">
							<option value="" selected="selected">Select One</option>
							<option>Yes </option>
							<option>No </option>
						</select>

						<input name="q9equipAQty_1" type="number" class="cloned fromZero" min="0"/>
					</div>
					<div class="right">
						<select name="q9equipFunctioning_1" id="q9equipFunctioning_1" class="cloned">
							<option value="" selected="selected">Select One</option>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>

						<input name="q9equipFQty_1" type="number" class="cloned fromZero" min="0"/>
					</div>
					<input type="hidden"  name="q9equipCode_1" id="q9equipCode_1" value="EQP31" />
				</div>

				<div class="row" id="tr_2">
					<div class="left">
						<label>9b. Delivery bed/ couch</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q9equipAvailability_2" id="q9equipAvailability_2">
							<option value="" selected="selected">Select One</option>
							<option>Yes </option>
							<option>No </option>
						</select>

						<input name="q9equipAQty_2" type="number" class="cloned fromZero" min="0"/>
					</div>
					<div class="right">

						<select name="q9equipFunctioning_2" id="q9equipFunctioning_2" class="cloned">
							<option value="" selected="selected">Select One</option>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>

						<input name="q9equipFQty_2" type="number" class="cloned fromZero" min="0"/>
					</div>
					<input type="hidden"  name="q9equipCode_2" id="q9equipCode_2" value="EQP32" />
				</div>

				<div class="row" id="tr_3">
					<div class="left">
						<label>9c. Drip stand</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q9equipAvailability_3" id="q9equipAvailability_3">
							<option value="" selected="selected">Select One</option>
							<option>Yes </option>
							<option>No </option>
						</select>

						<input name="q9equipAQty_3" type="number" class="cloned fromZero" min="0"/>
					</div>

					<div class="right">
						<select name="q9equipFunctioning_3" id="q9equipFunctioning_3" class="cloned">
							<option value="" selected="selected">Select One</option>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>

						<input name="q9equipFQty_3" type="number" class="cloned fromZero" min="0"/>
					</div>
					<input type="hidden"  name="q9equipCode_3" id="q9equipCode_3" value="EQP33" />
				</div>

				<div class="row" id="tr_4">
					<div class="left">
						<label>9d.Mackintosh (On the Delivery Couch)</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q9equipAvailability_4" id="q9equipAvailability_4">
							<option value="" selected="selected">Select One</option>
							<option>Yes </option>
							<option>No </option>
						</select>

						<input name="q9equipAQty_4" type="number" class="cloned fromZero" min="0"/>
					</div>
					<div class="right">
						<select name="q9equipFunctioning_4" id="q9equipFunctioning_4" class="cloned">
							<option value="" selected="selected">Select One</option>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>

						<input name="q9equipFQty_4" type="number" class="cloned fromZero" min="0"/>

					</div>
					<input type="hidden"  name="q9equipCode_4" id="q9equipCode_4" value="EQP34" />
				</div>

				<div class="row" id="tr_5">
					<div class="left">
						<label>9e. Linen(Draping)</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q9equipAvailability_5" id="q9equipAvailability_5">
							<option value="" selected="selected">Select One</option>
							<option>Yes </option>
							<option>No </option>
						</select>

						<input name="q9equipAQty_5" type="number" class="cloned fromZero" min="0"/>
					</div>
					<div class="right">

						<select name="q9equipFunctioning_5" id="q9equipFunctioning_5" class="cloned">
							<option value="" selected="selected">Select One</option>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>

						<input name="q9equipFQty_5" type="number" class="cloned fromZero" min="0"/>

					</div>
					<input type="hidden"  name="q9equipCode_5" id="q9equipCode_5" value="EQP35" />
				</div>

				<div class="row" id="tr_6">
					<div class="left">
						<label>9f.i. Linen(Delivery Couch)</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q9equipAvailability_6" id="q9equipAvailability_6">
							<option value="" selected="selected">Select One</option>
							<option>Yes </option>
							<option>No </option>
						</select>

						<input name="q9equipAQty_6" type="number" class="cloned fromZero" min="0"/>
					</div>
					<div class="right">
						<select name="q9equipFunctioning_6" id="q9equipFunctioning_6" class="cloned">
							<option value="" selected="selected">Select One</option>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>

						<input name="q9equipFQty_6" type="number" class="cloned fromZero" min="0"/>

					</div>
					<input type="hidden"  name="q9equipCode_6" id="q9equipCode_6" value="EQP36" />
				</div>

				<div class="row" id="tr_7">
					<div class="left">
						<label>9f.ii. Linen(Green Towels)</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q9equipAvailability_7" id="q9equipAvailability_7">
							<option value="" selected="selected">Select One</option>
							<option>Yes </option>
							<option>No </option>
						</select>

						<input name="q9equipAQty_7" type="number" class="cloned fromZero" min="0"/>
					</div>
					<div class="right">
						<select name="q9equipFunctioning_7" id="q9equipFunctioning_7" class="cloned">
							<option value="" selected="selected">Select One</option>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>

						<input name="q9equipFQty_7" type="number" class="cloned fromZero" min="0"/>

					</div>
					<input type="hidden"  name="q9equipCode_7" id="q9equipCode_7" value="EQP37" />
				</div>

				<div class="row" id="tr_8">
					<div class="left">
						<label>9g. Sharps container</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q9equipAvailability_8" id="q9equipAvailability_8">
							<option value="" selected="selected">Select One</option>
							<option>Yes </option>
							<option>No </option>
						</select>

						<input name="q9equipAQty_8" type="number" class="cloned fromZero" min="0"/>
					</div>
					<div class="right">

						<select name="q9equipFunctioning_8" id="q9equipFunctioning_8" class="cloned">

							<option value="" selected="selected">Select One</option>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>

						<input name="q9equipFQty_8" type="number" class="cloned fromZero" min="0"/>
					</div>
					<input type="hidden"  name="q9equipCode_8" id="q9equipCode_8" value="EQP38" />
				</div>

				<div class="row" id="tr_9">
					<div class="left">
						<label>9h. At least five or more 2-ml or 5-ml disposable syringes</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q9equipAvailability_9" id="q9equipAvailability_9">
							<option value="" selected="selected">Select One</option>
							<option>Yes </option>
							<option>No </option>
						</select>

					</div>
					<input type="hidden"  name="q9equipCode_9" id="q9equipCode_9" value="EQP39" />
				</div>

				<div class="row" id="tr_10">
					<div class="left">
						<label>9i. Three properly labeled or colour coded IP buckets</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q9equipAvailability_10" id="q9equipAvailability_10">
							<option value="" selected="selected">Select One</option>
							<option>Yes </option>
							<option>No </option>
						</select>

					</div>
					<input type="hidden"  name="q9equipCode_10" id="q9equipCode_10" value="EQP40" />
				</div>

				<div class="row" id="tr_11">
					<div class="left">
						<label>9j. High Level Chemical Disinfectant (Jik, Cidex)</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q9equipAvailability_11" id="q9equipAvailability_11">
							<option value="" selected="selected">Select One</option>
							<option>Always </option>
							<option>Sometimes </option>
							<option>Never </option>
						</select>

					</div>
					<input type="hidden"  name="q9equipCode_11" id="q9equipCode_11" value="EQP41" />
				</div>

				<div class="row" id="tr_12">
					<div class="left">
						<label>9k. Soap for washing instruments (constantly available)</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q9equipAvailability_12" id="q9equipAvailability_12">
							<option value="" selected="selected">Select One</option>
							<option>Always Available</option>
							<option>Sometimes Available</option>
							<option>Never Available</option>
						</select>

					</div>
					<div class="right">
						<select name="q9equipFunctioning_12" id="q9equipFunctioning_12" class="cloned">
							<option value="" selected="selected">Select One</option>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>

					</div>
					<input type="hidden"  name="q9equipCode_12" id="q9equipCode_12" value="EQP42" />
				</div>

				<div class="row" id="tr_13">
					<div class="left">
						<label>9l.Soap for handwashing (constantly available)</label>
					</div>
					<div class="center">
						<select class="cloned left-combo" name="q9equipAvailability_13" id="q9equipAvailability_13">
							<option value="" selected="selected">Select One</option>
							<option>Always Available</option>
							<option>Sometimes Available</option>
							<option>Never Available</option>
						</select>

					</div>
					<div class="right">
						<select name="q9equipFunctioning_13" id="q9equipFunctioning_13" class="cloned">
							<option value="" selected="selected">Select One</option>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>

					</div>
					<input type="hidden"  name="q9equipCode_13" id="q9equipCode_13" value="EQP43" />
				</div>

				<div class="row" id="tr_14">
					<div class="left">
						<label>9m.Properly Labelled or colour coded waste segragation bins</label>
					</div>

					<div class="center">

						<select class="cloned left-combo" name="q9equipAvailability_14" id="q9equipAvailability_14">
							<option value="" selected="selected">Select One</option>

							<option>Yes </option>
							<option>No </option>
						</select>

						<input name="q9equipAQty_14" type="number" class="cloned fromZero" min="0"/>
						<input type="hidden"  name="q9equipCode_14" id="q9equipCode_14" value="EQP44" />
					</div>
				</div>

				<div class="row" id="tr_15">
					<div class="left">
						<label>9o. Single-use hand-drying towels (constantly available)</label>
					</div>

					<div class="center">

						<select class="cloned left-combo" name="q9equipAvailability_15" id="q9equipAvailability_15">
							<option value="" selected="selected">Select One</option>

							<option>Always Available</option>
							<option>Sometimes Available</option>
							<option>Never Available</option>
						</select>

					</div>
					<div class="right">

						<select name="q9equipFunctioning_15" id="q9equipFunctioning_15" class="cloned">

							<option value="" selected="selected">Select One</option>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>

					</div>
					<input type="hidden"  name="q9equipCode_15" id="q9equipCode_15" value="EQP45" />
				</div>

				<div class="row" id="tr_16">
					<div class="left">
						<label>9p. Running  Water for handwashing (constantly available)</label>
					</div>

					<div class="center">

						<select class="cloned left-combo" name="q9equipAvailability_16" id="q9equipAvailability_16">
							<option value="" selected="selected">Select One</option>

							<option>Always Available</option>
							<option>Sometimes Available</option>
							<option>Never Available</option>
						</select>

					</div>
					<div class="right">
						<select name="q9equipFunctioning_16" id="q9equipFunctioning_16" class="cloned">

							<option value="" selected="selected">Select One</option>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>

					</div>
					<input type="hidden"  name="q9equipCode_16" id="q9equipCode_16" value="EQP46" />
				</div>

			</div>
			<!--close editTable-->
		</div>

	</div>
	<!--end delivery place description div-->
			
					
	<!--begin delivery kit contents div-->
	<div id="del_kit_content" class="step">
		<div class="column-wide">
			<div class="row">

				<div class="row-title">
					<div class="left">
						<label class="dcah-label">10. Indicate the quantities available of the following delivery instruments</label>
					</div>
					<div class="center">
						<label class="dcah-label" style="float:right;width:45%">Quantity</label>
					</div>

				</div>

			</div>

			<div class="row">
				<div class="left">
					<label>10a. Cord scissors</label>
				</div>
				<div class="center">
					<input type="number" class="cloned fromZero" name="q10equipAQty_1" id="q10equipAQty_1" min="0"/>
				</div>
				<input type="hidden"  name="q10equipCode_1" id="q10equipCode_1" value="EQP47"/>
			</div>

			<div class="row">
				<div class="left">
					<label>10b. Long artery Forceps (straight, lockable)</label>
				</div>
				<div class="center">
					<input type="number" class="cloned fromZero" name="q10equipAQty_2" id="q10equipAQty_2" min="0"/>
				</div>
				<input type="hidden"  name="q10equipCode_2" id="q10equipCode_2" value="EQP48" />
			</div>

			<div class="row">
				<div class="left">
					<label>10c. Episiotomy scissors</label>
				</div>

				<div class="center">
					<input type="number" class="cloned fromZero" name="q10equipAQty_3" id="q10equipAQty_3" min="0"/>
				</div>
				<input type="hidden"  name="q10equipCode_3" id="q10equipCode_3" value="EQP49" />

			</div>

			<div class="row">
				<div class="left">
					<label>10d. Kidney dishes</label>
				</div>

				<div class="center">
					<input type="number" class="cloned fromZero" name="q10equipAQty_4" id="q10equipAQty_4" min="0"/>
				</div>
				<input type="hidden"  name="q10equipCode_4" id="q10equipCode_4" value="EQP50" />
			</div>

			<div class="row">
				<div class="left">
					<label>10e. Gallipots</label>
				</div>
				<div class="center">
					<input type="number" class="cloned fromZero" name="q10equipAQty_5" id="q10equipAQty_5" min="0"/>
				</div>
				<input type="hidden"  name="q10equipCode_5" id="q10equipCode_5" value="EQP51" />
			</div>

			<div class="row">
				<div class="left">
					<label>10f. Sponge-holding forceps</label>
				</div>

				<div class="center">
					<input type="number" class="cloned fromZero" name="q10equipAQty_6" id="q10equipAQty_6" min="0"/>
				</div>
				<input type="hidden"  name="q10equipCode_6" id="q10equipCode_6" value="EQP52" />
			</div>

			<div class="row">
				<div class="left">
					<label>10g. Needle holder</label>
				</div>

				<div class="center">
					<input type="number" class="cloned fromZero" name="q10equipAQty_7" id="q10equipAQty_7" min="0"/>
				</div>
				<input type="hidden"  name="q10equipCode_7" id="q10equipCode_7" value="EQP53" />
			</div>

			<div class="row">
				<div class="left">
					<label>
						10h. Dissecting forceps -toothed
					</label>
				</div>

				<div class="center">
					<input type="number" class="cloned fromZero" name="q10equipAQty_8" id="q10equipAQty_8" min="0"/>
				</div>
				<input type="hidden"  name="q10equipCode_8" id="q10equipCode_8" value="EQP54" />
			</div>

			<div class="row">
				<div class="left">
					<label>10i. Instrument tray</label>
				</div>

				<div class="center">
					<input type="number" class="cloned fromZero" name="q10equipAQty_9" id="q10equipAQty_9" min="0"/>
				</div>
				<input type="hidden"  name="q10equipCode_9" id="q10equipCode_9" value="EQP55" />

			</div>
		</div>

	</div>
	</div>
	<!--end delivery kit contents div-->
					
							
	<!--begin other equipments div-->
	<div id="other_equip_sec" class="step">
		<div class="column-wide">
			<div class="row-title">
				<div class="left">

					<label class="dcah-label">11. Other Equipment and supplies</label>
				</div>
				<div class="center">
					<label class="dcah-label" style="width:45%">Availability (A)</label>
					<label class="dcah-label" style="float:right;width:45%">Quantity</label>
				</div>

				<div class="right">
					<label class="dcah-label" style="width:45%">Functioning (b)</label>
					<label class="dcah-label" style="float:right;width:45%">Quantity</label>
				</div>
			</div>

			<div id="tableEquipmentList_2">
				<div class="row2">
					<input type="button" id="editEquipmentListTopButton_2" name="editEquipmentListTopButton_2" class="awesome myblue medium" value="Edit List"/>
				</div>

				<div class="row" id="tr_17">
					<div class="left">
						<label>11a. Stethoscopes (Adult)</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q11equipAvailability_17" id="q11equipAvailability_17">
							<option value="" selected="selected">Select One</option>

							<option>Yes </option>
							<option>No </option>
						</select>

						<input name="q11equipAQty_17" type="number" class="cloned fromZero" min="0"/>
					</div>
					<div class="right">
						<select name="q11equipFunctioning_17" id="q11equipFunctioning_17" class="cloned">

							<option value="" selected="selected">Select One</option>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>

						<input name="q11equipFQty_17" type="number" class="cloned fromZero" min="0"/>
					</div>
					<input type="hidden"  name="q11equipCode_17" id="q11equipCode_17" value="EQP56" />
				</div>

				<div class="row" id="tr_18">
					<div class="left">
						<label>11b. Stethoscopes (Paediatric)</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q11equipAvailability_18" id="q11equipAvailability_18">
							<option value="" selected="selected">Select One</option>

							<option>Yes </option>
							<option>No </option>
						</select>

						<input name="q11equipAQty_18" type="number" class="cloned fromZero" min="0"/>

					</div>
					<div class="right">

						<select name="q11equipFunctioning_18" id="q11equipFunctioning_18" class="cloned">
							<option value="" selected="selected">Select One</option>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>

						<input name="q11equipFQty_18" type="number" class="cloned fromZero" min="0"/>
					</div>
					<input type="hidden"  name="q11equipCode_18" id="q11equipCode_18" value="EQP57" />
				</div>

				<div class="row" id="tr_19">
					<div class="left">
						<label>11c. BP machine</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q11equipAvailability_19" id="q11equipAvailability_19">
							<option value="" selected="selected">Select One</option>

							<option>Yes </option>
							<option>No </option>
						</select>

					</div>
					<div class="right">

						<select name="q11equipFunctioning_19" id="q11equipFunctioning_19" class="cloned">

							<option value="" selected="selected">Select One</option>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>

					</div>
					<input type="hidden"  name="q11equipCode_19" id="q11equipCode_19" value="EQP58" />
				</div>

				<div class="row" id="tr_20">
					<div class="left">
						<label>11d.i. Clinical Thermometer</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q11equipAvailability_20" id="q11equipAvailability_20">
							<option value="" selected="selected">Select One</option>

							<option>Yes </option>
							<option>No </option>
						</select>

						<input name="q11equipAQty_20" type="number" class="cloned fromZero" min="0"/>
					</div>
					<div class="right">
						<select name="q11equipFunctioning_20" id="q11equipFunctioning_20" class="cloned">

							<option value="" selected="selected">Select One</option>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>

						<input name="q11equipFQty_20" type="number" class="cloned fromZero" min="0"/>
					</div>
					<input type="hidden"  name="q11equipCode_20" id="q11equipCode_20" value="EQP59" />
				</div>

				<div class="row" id="tr_21">
					<div class="left">
						<label>11d.ii. Room Thermometer</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q11equipAvailability_21" id="q11equipAvailability_21">
							<option value="" selected="selected">Select One</option>

							<option>Yes </option>
							<option>No </option>
						</select>

						<input name="q11equipAQty_21" type="number" class="cloned fromZero" min="0"/>
					</div>
					<div class="right">
						<select name="q11equipFunctioning_21" id="q11equipFunctioning_21" class="cloned">
							<option value="" selected="selected">Select One</option>

							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>

						<input name="q11equipFQty_21" type="number" class="cloned fromZero" min="0"/>
					</div>
					<input type="hidden"  name="q11equipCode_21" id="q11equipCode_21" value="EQP60" />
				</div>

				<div class="row" id="tr_22">
					<div class="left">
						<label>11e. Fetoscope</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q11equipAvailability_22" id="q11equipAvailability_22">
							<option value="" selected="selected">Select One</option>

							<option>Yes </option>
							<option>No </option>
						</select>

						<input name="q11equipAQty_22" type="number" class="cloned fromZero" min="0"/>
					</div>
					<div class="right">
						<select name="q11equipFunctioning_22" id="q11equipFunctioning_22" class="cloned">

							<option value="" selected="selected">Select One</option>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>

						<input name="q11equipFQty_22" type="number" class="cloned fromZero" min="0"/>
					</div>
					<input type="hidden"  name="q11equipCode_22" id="q11equipCode_22" value="EQP61" />
				</div>

				<div class="row" id="tr_23">
					<div class="left">
						<label>11f. Sonicaid</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q11equipAvailability_23" id="q11equipAvailability_23">
							<option value="" selected="selected">Select One</option>

							<option>Yes </option>
							<option>No </option>
						</select>

						<input name="q11equipAQty_23" type="number" class="cloned fromZero" min="0"/>
					</div>
					<div class="right">
						<select name="q11equipFunctioning_23" id="q11equipFunctioning_23" class="cloned">

							<option value="" selected="selected">Select One</option>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>

						<input name="q11equipFQty_23" type="number" class="cloned fromZero" min="0"/>
					</div>
					<input type="hidden"  name="q11equipCode_23" id="q11equipCode_23" value="EQP62" />
				</div>

				<div class="row" id="tr_24">
					<div class="left">
						<label>11g. Suction Machine</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q11equipAvailability_24" id="q11equipAvailability_24">
							<option value="" selected="selected">Select One</option>
							<option>Yes </option>
							<option>No </option>
						</select>

						<input name="q11equipAQty_24" type="number" class="cloned fromZero" min="0"/>
					</div>
					<div class="right">
						<select name="q11equipFunctioning_24" id="q11equipFunctioning_24" class="cloned">
							<option value="" selected="selected">Select One</option>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>

						<input name="q11equipFQty_24" type="number" class="cloned fromZero" min="0"/>
					</div>
					<input type="hidden"  name="q11equipCode_24" id="q11equipCode_24" value="EQP63" />
				</div>

				<div class="row" id="tr_25">
					<div class="left">
						<label>11h. Weighing Scale for babies</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q11equipAvailability_25" id="q11equipAvailability_25">
							<option value="" selected="selected">Select One</option>
							<option>Yes </option>
							<option>No </option>
						</select>

						<input name="q11equipAQty_25" type="number" class="cloned fromZero" min="0"/>

						<select name="q11equipAType_25" id="q11equipAType_25" class="cloned">
							<option value="" selected="selected">Select Type</option>
							<option>Digital</option>
							<option>Graduated</option>
						</select>
					</div>
					<div class="right">
						<select name="q11equipFunctioning_25" id="q11equipFunctioning_25" class="cloned">
							<option value="" selected="selected">Select One</option>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>

						<input name="q11equipFQty_25" type="number" class="cloned fromZero" min="0"/>
					</div>
					<input type="hidden"  name="q11equipCode_25" id="q11equipCode_25" value="EQP64" />
				</div>

				<div class="row" id="tr_26">
					<div class="left">
						<label>11i. Adult resuscitation tray</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q11equipAvailability_26" id="q11equipAvailability_26">
							<option value="" selected="selected">Select One</option>
							<option>Yes </option>
							<option>No </option>
						</select>

						<input name="q11equipAQty_26" type="number" class="cloned fromZero" min="0"/>
					</div>
					<div class="right">

						<select name="q11equipFunctioning_26" id="q11equipFunctioning_26" class="cloned">
							<option value="" selected="selected">Select One</option>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>

						<input name="q11equipFQty_26" type="number" class="cloned fromZero" min="0"/>
					</div>
					<input type="hidden"  name="q11equipCode_26" id="q11equipCode_26" value="EQP65" />
				</div>

				<div class="row" id="tr_27a">
					<div class="left">
						<label>11j. Indicate the Sterilization Method(s) used or avaialable in this facility</label>
					</div>

					<div class="center">
						<select name="sterilizationMethod" id="sterilizationMethod" class="cloned">

							<option selected="selected" value="">Select One</option>
							<option>Autoclave</option>
							<option>HLD</option>
							<option value="other">Other(specify)</option>

						</select>

						<input type="text" style="display:none" name="sterilizationMethodOther" id="sterilizationMethodOther"/>

					</div>
				</div>

				<div class="row" id="tr_27">
					<div class="left">
						<label>11k. Indicate if a Manual Vacuum Aspiration kit is available in this unit or else where in the facility</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q11equipAvailability_27" id="q11equipAvailability_27">
							<option value="" selected="selected">Select One</option>
							<option>Yes </option>
							<option>No </option>
						</select>

						<input name="q11equipAQty_27" type="number" class="cloned fromZero" min="0"/>
					</div>
					<div class="right">
						<select name="q11equipFunctioning_27" id="q11equipFunctioning_27" class="cloned">
							<option value="" selected="selected">Select One</option>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>

						<input name="q11equipFQty_27" type="number" class="cloned fromZero" min="0"/>

					</div>
					<input type="hidden"  name="q11equipCode_27" id="q11equipCode_27" value="EQP66" />
				</div>

				<div class="row" id="tr_29a">
					<div class="left">
						<label>11l. Indicate the Vacuum Extractors available in this unit/facility</label>
					</div>
					<div class="center">
						<select class="cloned left-combo" name="q1_1_equipCode_28" id="q1_1_equipCode_28">
							<option value="">Select One</option>
							<option value="EQP67">Ventouse </option>
							<option value="EQP68">Kiwi Vacuum Extractor </option>
						</select>

						<input name="q11equipAQty_28" type="number" class="cloned fromZero" min="0"/>
					</div>
					<div class="right">
						<select name="q11equipFunctioning_28" id="q11equipFunctioning_28" class="cloned">
							<option value="" selected="selected">Select One</option>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>

						<input name="q11equipFQty_28" type="number" class="cloned fromZero" min="0"/>
					</div>
					<input type="hidden"  name="q11equipCode_28" id="q11equipCode_28" />
				</div>

				<div class="row" id="tr_29">
					<div class="left">
						<label>11n. Dilatation and curretage kit</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q11equipAvailability_29" id="q11equipAvailability_29">
							<option value="" selected="selected">Select One</option>
							<option>Yes </option>
							<option>No </option>
						</select>

						<input name="q11equipAQty_29" type="number" class="cloned fromZero" min="0"/>
					</div>
					<div class="right">
						<select name="q11equipFunctioning_29" id="q11equipFunctioning_29" class="cloned">
							<option value="" selected="selected">Select One</option>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>

						<input name="q11equipFQty_29" type="number" class="cloned fromZero" min="0"/>
					</div>
					<input type="hidden"  name="q11equipCode_29" id="q11equipCode_29" value="EQP69" />
				</div>

				<div class="row" id="tr_30">
					<div class="left">
						<label>11o. Sterile gauze</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q11equipAvailability_30" id="q11equipAvailability_30">
							<option value="" selected="selected">Select One</option>
							<option>Always Available</option>
							<option>Sometimes Available</option>
							<option>Never Available</option>
						</select>

					</div>
					<input type="hidden"  name="q11equipCode_30" id="q11equipCode_30" value="EQP70" />
				</div>

				<div class="row" id="tr_31">
					<div class="left">
						<label>11p. Sanitary pads</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q11equipAvailability_31" id="q11equipAvailability_31">
							<option value="" selected="selected">Select One</option>
							<option>Always Available</option>
							<option>Sometimes Available</option>
							<option>Never Available</option>
						</select>

					</div>
					<input type="hidden"  name="q11equipCode_31" id="q11equipCode_31" value="EQP71" />
				</div>

				<div class="row" id="tr_32">
					<div class="left">
						<label>11q. Elbow length gloves</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q11equipAvailability_32" id="q11equipAvailability_32">
							<option value="" selected="selected">Select One</option>
							<option>Yes </option>
							<option>No </option>
						</select>

						<input name="q11equipAQty_32" type="number" class="cloned fromZero" min="0"/>
					</div>
					<div class="right">
						<select name="q11equipFunctioning_32" id="q11equipFunctioning_32" class="cloned">
							<option value="" selected="selected">Select One</option>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>

						<input name="q11equipFQty_32" type="number" class="cloned fromZero" min="0"/>
					</div>
					<input type="hidden"  name="q11equipCode_32" id="q11equipCode_32" value="EQP72" />
				</div>

				<div class="row" id="tr_33">
					<div class="left">
						<label>11r. Patellar Hammer</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q11equipAvailability_33" id="q11equipAvailability_33">
							<option value="" selected="selected">Select One</option>
							<option>Always Available</option>
							<option>Sometimes Available</option>
							<option>Never Available</option>
						</select>

					</div>
					<div class="right">
						<select name="q11equipFunctioning_33" id="q11equipFunctioning_33" class="cloned">
							<option value="" selected="selected">Select One</option>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>

					</div>
					<input type="hidden"  name="q11equipCode_33" id="q11equipCode_33" value="EQP73" />
				</div>

				<div class="row" id="tr_34">
					<div class="left">
						<lable>11s. Sutures</lable>
					</div>

					<div class="center">
						<select name="q11equipAvailability_34" id="q11equipAvailability_34" class="cloned">
							<option value="" selected="selected">Select One</option>
							<option>Yes </option>
							<option>No </option>
						</select>

						<input name="q11equipAQty_34" type="number" class="cloned fromZero" min="0"/>

					</div>
					<div class="right">
						<select name="q11equipFunctioning_34" id="q11equipFunctioning_34" class="cloned">
							<option value="" selected="selected">Select One</option>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>

						<input name="q11equipFQty_34" type="number" class="cloned fromZero" min="0"/>
					</div>
					<input type="hidden"  name="q11equipCode_34" id="q11equipCode_34" value="EQP74" />
				</div>

				<div class="row" id="tr_35">
					<div class="left">
						<label>11s.i. Oxygen-Cylinder</label>
					</div>

					<div class="center">
						<select name="q11equipAvailability_35" id="q11equipAvailability_35" class="cloned">
							<option value="" selected="selected">Select One</option>
							<option>Always Available</option>
							<option>Sometimes Available</option>
							<option>Never Available</option>
						</select>

						<input name="q11equipAQty_35" type="number" class="cloned fromZero" min="0"/>
					</div>
					<input type="hidden"  name="q11equipCode_35" id="q11equipCode_35" value="EQP75" />
				</div>

				<div class="row" id="tr_36">
					<div class="left">
						<label>11s.ii. Oxygen-Concentrator</label>
					</div>

					<div class="center">
						<select name="q11equipAvailability_36" id="q11equipAvailability_36" class="cloned">
							<option value="" selected="selected">Select One</option>
							<option>Always Available</option>
							<option>Sometimes Available</option>
							<option>Never Available</option>
						</select>

						<input name="q11equipAQty_36" type="number" class="cloned fromZero" min="0"/>
					</div>
					<input type="hidden"  name="q11equipCode_36" id="q11equipCode_36" value="EQP76" />
				</div>

			</div>
			<!--close editList_2-->
		</div>
		<!--close div wide-->

	</div><!--end other equipments div-->
							
	<!--begin medications in the maternity/labour ward div -->
	<div id="mlw_medication" class="step">
		<div class="column-wide">

			<div class="row-title">
				<div class="left">
					<label class="dcah-label">12. Medications in the Maternity/Labour ward</label>
				</div>
				<div class="center">
					<label class="dcah-label" style="float:left;width:45%">Availability</label>
					<label class="dcah-label" style="float:right;width:45%">Quantity</label>
				</div>

			</div>

			<div class="row" id="tr_37">
				<div class="left">
					<label>12a.i. Injectable-Oxytocin(or Injectable-Syntocin)</label>
				</div>
				<input type="hidden"  name="q12mnhCommodityName_1" id="q12mnhCommodityName_1" value="Injectable-Oxytocin" />

				<div class="center">
					<select class="cloned left-combo" name="q12equipAvailability_1" id="q12equipAvailability_1">
						<option value="" selected="selected">Select One</option>
						<option>Always Available</option>
						<option>Sometimes Available</option>
						<option>Never Available</option>
					</select>

					<input name="q12equipAQty_1" type="number" class="cloned fromZero" min="0"/>
				</div>

			</div>

			<!--div class="row" id="tr_39">
			<div class="left">
			12a.ii. Injectable-Syntocin
			</div>
			<input type="hidden"  name="q12mnhCommodityName_2" id="q12mnhCommodityName_2" value="Injectable-Syntocin" />
			<div class="center">
			<select class="cloned left-combo" name="q12equipAvailability_2" id="q12equipAvailability_2">
			<option value="" selected="selected">Select One</option>
			<option>Always Available</option>
			<option>Sometimes Available</option>
			<option>Never Available</option>
			</select>

			<input name="q12equipAQty_2" type="number" class="cloned fromZero" min="0"/>

			</div>

			</div-->

			<div class="row" id="tr_40">
				<div class="left">
					<label>12b.i. Indicate the available Intravenous fluids</label>
				</div>

				<div class="center">
					<select class="cloned left-combo" name="q12mnhCommodityName_3" id="q12mnhCommodityName_3">
						<option value="" selected="selected">Select Type</option>
						<option value="Intravenous solution-Ringers Lactate">Ringers Lactate</option>
						<option value="Intravenous solution-D5NS">D5NS</option>
						<option value="Intravenous solution-NS Infusion">NS Infusion</option>

					</select>
					<input name="q12equipAQty_3" type="number" class="cloned fromZero" min="0"/>
				</div>

			</div>

			<div class="row" id="tr_41">
				<div class="left">
					<label>12b.ii. Intravenous Metronidazole</label>
				</div>
				<input type="hidden"  name="q12mnhCommodityName_4" id="q12mnhCommodityName_4" value="Intravenous Metronidazole"/>
				<div class="center">
					<select class="cloned left-combo" name="q12equipAvailability_4" id="q12equipAvailability_4">
						<option value="" selected="selected">Select One</option>
						<option>Always Available</option>
						<option>Sometimes Available</option>
						<option>Never Available</option>
					</select>

					<input name="q12equipAQty_4" type="number" class="cloned fromZero" min="0"/>
				</div>

			</div>

			<!--div class="row" id="tr_42">
			<div class="left">
			12c. Injectable methergine
			</div>
			<input type="hidden"  name="q12mnhCommodityName_5" id="q12mnhCommodityName_5" value="Injectable methergine"/>

			<div class="center">
			<select class="cloned left-combo" name="q12equipAvailability_5" id="q12equipAvailability_5">
			<option value="" selected="selected">Select One</option>
			<option>Always Available</option>
			<option>Sometimes Available</option>
			<option>Never Available</option>
			</select>
			<input name="q12equipAQty_5" type="number" class="cloned fromZero" min="0"/>
			</div>

			</div-->

			<div class="row" id="tr_43i">
				<div class="left">
					<label>12di. Injectable Hydralazine/Apresoline</label>
				</div>
				<input type="hidden"  name="q12mnhCommodityName_6" id="q12mnhCommodityName_6" value="Injectable Hydralazine"/>

				<div class="center">
					<select class="cloned left-combo" name="q12equipAvailability_6" id="q12equipAvailability_6">
						<option value="" selected="selected">Select One</option>
						<option>Always Available</option>
						<option>Sometimes Available</option>
						<option>Never Available</option>
					</select>

					<input name="q12equipAQty_6" type="number" class="cloned fromZero" min="0"/>
				</div>

			</div>
			<!--div class="row" id="tr_43ii">
			<div class="left">
			12dii. Injectable Apresoline
			</div>
			<input type="hidden"  name="q12mnhCommodityName_7" id="q12mnhCommodityName_7" value="Injectable Apresoline"/>

			<div class="center">
			<select class="cloned left-combo" name="q12equipAvailability_7" id="q12equipAvailability_7">
			<option value="" selected="selected">Select One</option>
			<option>Always Available</option>
			<option>Sometimes Available</option>
			<option>Never Available</option>
			</select>

			<input name="q12equipAQty_7" type="number" class="cloned fromZero" min="0"/>
			</div>

			</div-->

			<div class="row" id="tr_44">
				<div class="left">
					<label>12e. Injectable diazepam</label>
				</div>
				<input type="hidden"  name="q12mnhCommodityName_8" id="q12mnhCommodityName_8" value="Injectable diazepam"/>

				<div class="center">
					<select class="cloned left-combo" name="q12equipAvailability_8" id="q12equipAvailability_8">
						<option value="" selected="selected">Select One</option>
						<option>Always Available</option>
						<option>Sometimes Available</option>
						<option>Never Available</option>
					</select>
					<input name="q12equipAQty_8" type="number" class="cloned fromZero" min="0"/>
				</div>

			</div>

			<div class="row" id="tr_45">
				<div class="left">
					<label>12f. Injectable magnesium sulfate</label>
				</div>
				<input type="hidden"  name="q12mnhCommodityName_9" id="q12mnhCommodityName_9" value="Injectable magnesium sulfate"/>

				<div class="center">
					<select class="cloned left-combo" name="q12equipAvailability_9" id="q12equipAvailability_9">
						<option value="" selected="selected">Select One</option>
						<option>Always Available</option>
						<option>Sometimes Available</option>
						<option>Never Available</option>
					</select>
					<input name="q12equipAQty_9" type="number" class="cloned fromZero" min="0"/>
				</div>

			</div>

			<div class="row" id="tr_46">
				<div class="left">
					<label>12g. Injectable penicillin</label>

				</div>
				<input type="hidden"  name="q12mnhCommodityName_10" id="q12mnhCommodityName_10" value="Injectable amoxicillin/ampicillin"/>

				<div class="center">
					<select class="cloned left-combo" name="q12equipAvailability_10" id="q12equipAvailability_10">
						<option value="" selected="selected">Select One</option>
						<option>Always Available</option>
						<option>Sometimes Available</option>
						<option>Never Available</option>
					</select>

					<input name="q12equipAQty_10" type="number" class="cloned fromZero" min="0"/>
				</div>

			</div>

			<div class="row" id="tr_47">
				<div class="left">
					<label>12h. Injectable gentamicin</label>
				</div>
				<input type="hidden"  name="q12mnhCommodityName_11" id="q12mnhCommodityName_11" value="Injectable gentamicin"/>

				<div class="center">
					<select class="cloned left-combo" name="q12equipAvailability_11" id="q12equipAvailability_11">
						<option value="" selected="selected">Select One</option>
						<option>Always Available</option>
						<option>Sometimes Available</option>
						<option>Never Available</option>
					</select>
					<input name="q12equipAQty_11" type="number" class="cloned fromZero" min="0"/>
				</div>

			</div>

			<div class="row" id="tr_48">
				<div class="left">
					<label>12i. Calcium gluconate</label>
				</div>
				<input type="hidden"  name="q12mnhCommodityName_12" id="q12mnhCommodityName_12" value="Calcium gluconate"/>

				<div class="center">
					<select class="cloned left-combo" name="q12equipAvailability_12" id="q12equipAvailability_12">
						<option value="" selected="selected">Select One</option>
						<option>Always Available</option>
						<option>Sometimes Available</option>
						<option>Never Available</option>
					</select>
					<input name="q12equipAQty_12" type="number" class="cloned fromZero" min="0"/>
				</div>

			</div>

			<div class="row" id="tr_49">
				<div class="left">
					<label>12j. Methyldopa/Aldomet</label>
				</div>
				<input type="hidden"  name="q12mnhCommodityName_13" id="q12mnhCommodityName_13" value="Methyldopa/Aldomet"/>

				<div class="center">
					<select class="cloned left-combo" name="q12equipAvailability_13" id="q12equipAvailability_13">
						<option value="" selected="selected">Select One</option>
						<option>Always Available</option>
						<option>Sometimes Available</option>
						<option>Never Available</option>
					</select>
					<input name="q12equipAQty_13" type="number" class="cloned fromZero" min="0"/>
				</div>

			</div>

			<div class="row" id="tr_50">
				<div class="left">
					<label>12k. Lidocaine (lignocaine) or other local anesthetic</label>
				</div>
				<input type="hidden"  name="q12mnhCommodityName_14" id="q12mnhCommodityName_14" value="Lidocaine(lignocaine)/other local anesthetic"/>

				<div class="center">
					<select class="cloned left-combo" name="q12equipAvailability_14" id="q12equipAvailability_14">
						<option value="" selected="selected">Select One</option>
						<option>Always Available</option>
						<option>Sometimes Available</option>
						<option>Never Available</option>
					</select>
					<input name="q12equipAQty_14" type="number" class="cloned fromZero" min="0"/>
				</div>

			</div>

			<div class="row" id="tr_51">
				<div class="left">
					<label>12l. Nifedipine Tablets</label>
				</div>
				<input type="hidden"  name="q12mnhCommodityName_15" id="q12mnhCommodityName_15" value="Nifedipine Tablets"/>

				<div class="center">
					<select class="cloned left-combo" name="q12equipAvailability_15" id="q12equipAvailability_15">
						<option value="" selected="selected">Select One</option>
						<option>Always Available</option>
						<option>Sometimes Available</option>
						<option>Never Available</option>
					</select>
					<input name="q12equipAQty_15" type="number" class="cloned fromZero" min="0"/>
				</div>

			</div>

			<div class="row" id="tr_52">
				<div class="left">
					<label>12m. Vitamin A</label>
				</div>
				<input type="hidden"  name="q12mnhCommodityName_16" id="q12mnhCommodityName_16" value="Vitamin A"/>

				<div class="center">
					<select class="cloned left-combo" name="q12equipAvailability_16" id="q12equipAvailability_16">
						<option value="" selected="selected">Select One</option>
						<option>Always Available</option>
						<option>Sometimes Available</option>
						<option>Never Available</option>
					</select>
					<input name="q12equipAQty_16" type="number" class="cloned fromZero" min="0"/>
				</div>

			</div>

			<div class="row" id="tr_53">
				<div class="left">
					<label>12n. Vitamin K</label>
				</div>
				<input type="hidden"  name="q12mnhCommodityName_17" id="q12mnhCommodityName_17" value="Vitamin K"/>

				<div class="center">
					<select class="cloned left-combo" name="q12equipAvailability_17" id="q12equipAvailability_17">
						<option value="" selected="selected">Select One</option>
						<option>Always Available</option>
						<option>Sometimes Available</option>
						<option>Never Available</option>
					</select>
					<input name="q12equipAQty_17" type="number" class="cloned fromZero" min="0"/>
				</div>

			</div>
		</div>

	</div><!--end medications in the maternity/labour ward div -->

								<!--begin newborn care div-->
								<div id="nbc_div_1" class="step">

								<h3>New-Born Care</h3>
								<div class="row">
									<div class="row-title">
										<div class="left">
											<label class="dcah-label">QUESTION</label>
										</div>
										<div class="center">
											<label class="dcah-label">ANSWER</label>
										</div>
									</div>
								</div>
								<div class="left">
									<label>13. Does this facility perform newborn resuscitation?</label>
								</div>
								<div class="right">

									<select name="nbcgqnewBornResuscitated" id="nbcgqnewBornResuscitated" class="cloned">

										<option value="" selected="selected">Select One</option>
										<option> Yes </option>
										<option> No </option>
									</select>

								</div>
								
								</div> <!--end of new born care div 1-->
								
	<!--begin neonatal unit div-->
	<div id="neonatal_unit" class="step">

		<div class="column-wide">

			<div class="row">
				<h3> Neonatal Unit</h3>
			</div>

			<div class="row-title">
				<div class="left">
					<label class="dcah-label">14. EQUIPMENT AND SUPPLIES FOR NEWBORN CARE</label>
				</div>
				<div class="center">
					<label class="dcah-label" style="width:45%">Availability (A)</label>
					<label class="dcah-label" style="float:right;width:45%">Quantity</label>
				</div>
				<div class="center">
					<label class="dcah-label" style="width:45%">Functioning (b)</label>
					<label class="dcah-label" style="float:right;width:45%">Quantity</label>
				</div>
				<div class="center">

				</div>
			</div>

			<div id="tableEquipmentList_3b">
				<div class="row2">
					<input type="button" id="editEquipmentListTopButton_3b" class="awesome myblue medium" value="Edit List"/>
				</div>

				<div class="row" id="tr_58">
					<div class="left">
						<label>14c. Clock  with seconds arm</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q14equipAvailability_58" id="q14equipAvailability_58">
							<option value="" selected="selected">Select One</option>
							<option>Yes </option>
							<option>No </option>
						</select>

					</div>
					<input type="hidden"  name="q14equipCode_58" id="q14equipCode_58" value="EQP82" />
				</div>

				<div class="row" id="tr_59">
					<div class="left">
						<label>14d. Neonatal Incubator</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q14equipAvailability_59" id="q14equipAvailability_59">
							<option value="" selected="selected">Select One</option>
							<option>Yes </option>
							<option>No </option>
						</select>
						<input name="q14equipAQty_59" type="number" class="cloned fromZero" min="0"/>
					</div>
					<div class="right">
						<select name="q14equipFunctioning_59" id="q14equipFunctioning_59" class="cloned">
							<option value="" selected="selected">Select One</option>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>

						<input name="q14equipFQty_59" type="number" class="cloned fromZero" min="0"/>
					</div>
					<input type="hidden"  name="q14equipCode_59" id="q14equipCode_59" value="EQP83" />
				</div>

				<div class="row" id="tr_60">
					<div class="left">
						<label>14e. A Radiant Heater</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q14equipAvailability_60" id="q14equipAvailability_60">
							<option value="" selected="selected">Select One</option>
							<option>Yes </option>
							<option>No </option>
						</select>
						<input name="q14equipAQty_60" type="number" class="cloned fromZero" min="0"/>
					</div>
					<div class="right">
						<select name="q14equipFunctioning_60" id="q14equipFunctioning_60" class="cloned">
							<option value="" selected="selected">Select One</option>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>

						<input name="q14equipFQty_60" type="number" class="cloned fromZero" min="0"/>
					</div>
					<input type="hidden"  name="q14equipCode_60" id="q14equipCode_60" value="EQP84" />
				</div>

				<div class="row" id="tr_61">
					<div class="left">
						<label>14f. Infant Scale</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q14equipAvailability_61" id="q14equipAvailability_61">
							<option value="" selected="selected">Select One</option>
							<option>Yes </option>
							<option>No </option>
						</select>
						<input name="q14equipAQty_61" type="number" class="cloned fromZero" min="0"/>
					</div>
					<div class="right">
						<select name="q14equipFunctioning_61" id="q14equipFunctioning_61" class="cloned">
							<option value="" selected="selected">Select One</option>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>

						<input name="q14equipFQty_61" type="number" class="cloned fromZero" min="0"/>

					</div>
					<input type="hidden"  name="q14equipCode_61" id="q14equipCode_61" value="EQP85" />
				</div>

				<div class="row" id="tr_62">
					<div class="left">
						<label>14g. Suction bulb for mucus extraction</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q14equipAvailability_62" id="q14equipAvailability_62">
							<option value="" selected="selected">Select One</option>
							<option>Yes </option>
							<option>No </option>
						</select>

						<input name="q14equipAQty_62" type="number" class="cloned fromZero" min="0"/>
					</div>
					<div class="right">

						<select name="q14equipFunctioning_62" id="q14equipFunctioning_62" class="cloned">
							<option value="" selected="selected">Select One</option>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>

						<input name="q14equipFQty_62" type="number" class="cloned fromZero" min="0"/>

					</div>
					<input type="hidden"  name="q14equipCode_62" id="q14equipCode_62" value="EQP86" />
				</div>

				<div class="row" id="tr_63">
					<div class="left">
						<label>14h. Suction apparatus for use with catheter</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q14equipAvailability_63" id="q14equipAvailability_63">
							<option value="" selected="selected">Select One</option>
							<option>Yes </option>
							<option>No </option>
						</select>

						<input name="q14equipAQty_63" type="number" class="cloned fromZero" min="0"/>
					</div>
					<div class="right">
						<select name="q14equipFunctioning_63" id="q14equipFunctioning_63" class="cloned">
							<option value="" selected="selected">Select One</option>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>

						<input name="q14equipFQty_63" type="number" class="cloned fromZero" min="0"/>
					</div>
					<input type="hidden"  name="q14equipCode_63" id="q14equipCode_63" value="EQP87" />
				</div>

				<div class="row" id="tr_64">
					<div class="left">
						<label>14i. A flat, clean, dry and warm newborn resuscitation surface</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q14equipAvailability_64" id="q14equipAvailability_64">
							<option value="" selected="selected">Select One</option>
							<option>Yes </option>
							<option>No </option>
						</select>

					</div>
					<input type="hidden"  name="q14equipCode_64" id="q14equipCode_64" value="EQP88" />
				</div>

				<div class="row" id="tr_65">
					<div class="left">
						<label>14j. Disposable cord ties or clamps</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q14equipAvailability_65" id="q14equipAvailability_65">
							<option value="" selected="selected">Select One</option>
							<option>Yes</option>
							<option>No</option>
						</select>

					</div>
					<div class="right">
						<select name="q14equipFunctioning_65" id="q14equipFunctioning_65" class="cloned">
							<option value="" selected="selected">Select One</option>
							<option>Always Available</option>
							<option>Sometimes Available</option>
							<option>Never Available</option>
						</select>

					</div>
					<input type="hidden"  name="q14equipCode_65" id="q14equipCode_65" value="EQP89" />
				</div>

				<div class="row" id="tr_66">
					<div class="left">
						<label>14k. Clean and warm towels/cloths for drying / warming / wrapping baby</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q14equipAvailability_66" id="q14equipAvailability_66">
							<option value="" selected="selected">Select One</option>
							<option>Select One</option>
							<option>Yes</option>
							<option>No</option>

						</select>

					</div>
					<div class="right">
						<select name="q14equipFunctioning_66" id="q14equipFunctioning_66" class="cloned">
							<option value="" selected="selected">Select One</option>
							<option>Always Available</option>
							<option>Sometimes Available</option>
							<option>Never Available</option>
						</select>

					</div>
					<input type="hidden"  name="q14equipCode_66" id="q14equipCode_66" value="EQP90" />

				</div>
			</div>
			<!--close div tableEquipmentList_3b-->

		</div>
		<!--close div column-wide -->
	</div>
	<!--end neonatal unit div-->

	<!--begin blood transfusion div-->
	<div id="blood_transfusion" class="step">
		<div class="column-wide">
			<h3>Blood Transfusion Services Assessment</h3>

			<div class="row-title">
				<div class="left">

					<label class="dcah-label">QUESTION</label>
				</div>
				<div class="center">
					<label class="dcah-label">ANSWER</label>
				</div>
			</div>

			<div class="row">
				<div class="left">

					<label>15. Does this facility perform blood transfusions?</label>
				</div>
				<div class="center">

					<select name="nbcgqBloodTransfusionsDone" class="cloned">
						<option value="" selected="selected">Select One</option>
						<option>Yes</option>
						<option>No</option>
					</select>
				</div>
				<div class="right">
					<label for="q15BloodTransfusions_2">Specify:</label>

					<select name="nbcgqBloodBank" class="cloned">
						<option selected="selected" value="">Select One</option>

						<option>Blood Bank available</option>
						<option>Transfusions done but no blood bank</option>
					</select>
				</div>
			</div>

			<!--div class="row">
			<div class="left">
			16. Does this facility ever perform caesarean section?
			</div>
			<div class="center">

			<select name="nbcgqCSDone" class="cloned">
			<option selected="selected" value="">Select One</option>

			<option> Yes</option>
			<option> No</option>
			</select>
			</div>
			<div class="row hide" style="display:true">
			<div class="left" >
			<label class="dcah-label"> If Yes, how many caesarean sections were performed in September 2012</label>
			</div>
			<div class="right">
			<div class="col">

			<input type="number" class="cloned fromZero" name="nbcgqNoOfDone" id="nbcgqNoOfDone"  value=""/>

			</div>
			</div>
			</div>
			</div-->
		</div>
		<!--close div column-wide -->

	</div>
	<!--end blood transfusion div-->

	<!--begin level-4-and-above-->

	<div id="level_4_above" class="step">
		<div class="column-wide">
			<div class="hide-level">
				<div class="row">
					<h3>Complete this section for Level 4, 5 and 6 Facilities</h3>
				</div>

				<div class="row">
					<div class="row-title">
						<div class="left">

							<label class="dcah-label">Supply/Equipment</label>
						</div>
						<div class="center">
							<label class="dcah-label" style="width:45%">Availability (A)</label>
							<label class="dcah-label" style="float:right;width:45%">Quantity</label>
						</div>
						<div class="right">
							<label class="dcah-label" style="width:45%">Functioning(b)</label>
							<label class="dcah-label" style="float:right;width:45%">Quantity</label>
						</div>
					</div>

					<div id="tableEquipmentList_4">
						<div class="row2">
							<input type="button" id="editEquipmentListTopButton_4" name="editEquipmentListTopButton_4" class="awesome myblue medium" value="Edit List"/>
						</div>
						<div class="row" id="tr_67">
							<div class="left">
								<label>18a. Operating Table</label>
							</div>

							<div class="center">
								<select class="cloned left-combo" name="q18equipAvailability_67" id="q18equipAvailability_67">
									<option value="" selected="selected">Select One</option>
									<option>Yes </option>
									<option>No </option>
								</select>

								<input name="q18equipAQty_67" type="number" class="cloned fromZero" min="0"/>
							</div>
							<div class="center">
								<select name="q18equipFunctioning_67" id="q18equipFunctioning_67" class="cloned">
									<option value="" selected="selected">Select One</option>
									<option> Yes </option>
									<option> No </option>
									<option> Dont Know </option>
								</select>

								<input name="q18equipFQty_67" type="number" class="cloned fromZero" min="0"/>
							</div>
							<input type="hidden"  name="q18equipCode_67" id="q18equipCode_67" value="EQP91" />
						</div>

						<div class="row" id="tr_68">
							<div class="left">
								<label>18b. Operating Light</label>
							</div>

							<div class="center">
								<select class="cloned left-combo" name="q18equipAvailability_68" id="q18equipAvailability_68">
									<option value="" selected="selected">Select One</option>
									<option>Yes </option>
									<option>No </option>
								</select>

								<input name="q18equipAQty_68" type="number" class="cloned fromZero" min="0"/>
							</div>
							<div class="center">
								<select name="q18equipFunctioning_68" id="q18equipFunctioning_68" class="cloned">
									<option value="" selected="selected">Select One</option>
									<option> Yes </option>
									<option> No </option>
									<option> Dont Know </option>
								</select>

								<input type="number" class="cloned fromZero" />
							</div>
							<input type="hidden"  name="q18equipCode_68" id="q18equipCode_68" value="EQP92" />
						</div>

						<div class="row" id="tr_69">
							<div class="left">
								<label>18c. Anaesthetic machine</label>
							</div>

							<div class="center">
								<select class="cloned left-combo" name="q18equipAvailability_69" id="q18equipAvailability_69">
									<option value="" selected="selected">Select One</option>
									<option>Yes </option>
									<option>No </option>
								</select>

								<input name="q18equipAQty_69" type="number" class="cloned fromZero" min="0"/>
							</div>
							<div class="center">
								<select name="q18equipFunctioning_69" id="q18equipFunctioning_69" class="cloned">
									<option value="" selected="selected">Select One</option>
									<option> Yes </option>
									<option> No </option>
									<option> Dont Know </option>
								</select>

								<input name="q18equipFQty_69" type="number" class="cloned fromZero" min="0"/>
							</div>
							<input type="hidden"  name="q18equipCode_69" id="q18equipCode_69" value="EQP93" />
						</div>

						<div class="row" id="tr_70">
							<div class="left">
								<label>18d. Laryngoscopes</label>
							</div>

							<div class="center">
								<select class="cloned left-combo" name="q18equipAvailability_70" id="q18equipAvailability_70">
									<option value="" selected="selected">Select One</option>
									<option>Yes </option>
									<option>No </option>
								</select>

								<input name="q18equipAQty_70" type="number" class="cloned fromZero" min="0"/>
							</div>
							<div class="center">
								<select name="q18equipFunctioning_70" id="q18equipFunctioning_70" class="cloned">
									<option value="" selected="selected">Select One</option>
									<option> Yes </option>
									<option> No </option>
									<option> Dont Know </option>
								</select>

								<input name="q18equipFQty_70" type="number" class="cloned fromZero" min="0"/>
							</div>
							<input type="hidden"  name="q18equipCode_70" id="q18equipCode_70" value="EQP94" />
						</div>

						<div class="row" id="tr_71">
							<div class="left">
								<label>18e. Endotracheal tubes</label>
							</div>

							<div class="center">
								<select class="cloned left-combo" name="q18equipAvailability_71" id="q18equipAvailability_71">
									<option value="" selected="selected">Select One</option>
									<option>Yes </option>
									<option>No </option>
								</select>

								<input name="q18equipAQty_71" type="number" class="cloned fromZero" min="0"/>
							</div>
							<div class="center">
								<select name="q18equipFunctioning_71" id="q18equipFunctioning_71" class="cloned">
									<option value="" selected="selected">Select One</option>
									<option> Yes </option>
									<option> No </option>
									<option> Dont Know </option>
								</select>

								<input name="q18equipFQty_71" type="number" class="cloned fromZero" min="0"/>
							</div>
							<input type="hidden"  name="q18equipCode_71" id="q18equipCode_71" value="EQP95" />
						</div>

						<div class="row" id="tr_72">
							<div class="left">
								<label>18f. Anaesthetic drugs e.g ketamine</label>
							</div>

							<div class="center">
								<select class="cloned left-combo" name="q18equipAvailability_72" id="q18equipAvailability_72">
									<option value="" selected="selected">Select One</option>
									<option>Yes </option>
									<option>No </option>
								</select>

								<input name="q18equipAQty_72" type="number" class="cloned fromZero" min="0"/>
							</div>
							<div class="center">
								<select name="q18equipFunctioning_72" id="q18equipFunctioning_72" class="cloned">
									<option value="" selected="selected">Select One</option>
									<option>Always Available</option>
									<option>Sometimes Available</option>
									<option>Never Available</option>
								</select>

								<input name="q18equipFQty_72" type="number" class="cloned fromZero" min="0"/>
							</div>
							<input type="hidden"  name="q18equipCode_72" id="q18equipCode_72" value="EQP96" />
						</div>

						<div class="row" id="tr_73">
							<div class="left">
								<label>18g. Anaesthetic gases (halothane, NO2, Oxygen, etc)</label>
							</div>

							<div class="center">
								<select class="cloned left-combo" name="q18equipAvailability_73" id="q18equipAvailability_73">
									<option value="" selected="selected">Select One</option>
									<option>Yes </option>
									<option>No </option>
								</select>

								<input name="q18equipAQty_73" type="number" class="cloned fromZero" min="0"/>
							</div>
							<div class="center">
								<select name="q18equipFunctioning_73" id="q18equipFunctioning_73" class="cloned">
									<option value="" selected="selected">Select One</option>
									<option>Always Available</option>
									<option>Sometimes Available</option>
									<option>Never Available</option>
								</select>

								<input name="q18equipFQty_73" type="number" class="cloned fromZero" min="0"/>
							</div>
							<input type="hidden"  name="q18equipCode_73" id="q18equipCode_73" value="EQP97" />
						</div>

						<div class="row" id="tr_74">
							<div class="left">
								<label>18h. Drugs and supplies for spinal anesthesia (e.g. Spinal needle)</label>
							</div>

							<div class="center">
								<select class="cloned left-combo" name="q18equipAvailability_74" id="q18equipAvailability_74">
									<option value="" selected="selected">Select One</option>
									<option>Yes </option>
									<option>No </option>
								</select>

								<input name="q18equipAQty_74" type="number" class="cloned fromZero" min="0"/>
							</div>
							<div class="center">
								<select name="q18equipFunctioning_74" id="q18equipFunctioning_74" class="cloned">
									<option value="" selected="selected">Select One</option>
									<option>Always Available</option>
									<option>Sometimes Available</option>
									<option>Never Available</option>
								</select>

								<input name="q18equipFQty_74" type="number" class="cloned fromZero" min="0"/>
							</div>
							<input type="hidden"  name="q18equipCode_74" id="q18equipCode_74" value="EQP98" />
						</div>

						<div class="row" id="tr_75">
							<div class="left">
								<label>18i. Scrub area adjacent to or in the operating room</label>
							</div>

							<div class="center">
								<select class="cloned left-combo" name="q18equipAvailability_75" id="q18equipAvailability_75">
									<option value="" selected="selected">Select One</option>
									<option>Yes </option>
									<option>No </option>
								</select>

								<input name="q18equipAQty_75" type="number" class="cloned fromZero" min="0"/>
							</div>
							<div class="center">
								<select name="q18equipFunctioning_75" id="q18equipFunctioning_75" class="cloned">
									<option value="" selected="selected">Select One</option>
									<option> Yes </option>
									<option> No </option>
									<option> Dont Know </option>
								</select>

								<input name="q18equipFQty_75" type="number" class="cloned fromZero" min="0"/>
							</div>
							<input type="hidden"  name="q18equipCode_75" id="q18equipCode_75" value="EQP99" />
						</div>

						<div class="row" id="tr_76">
							<div class="left">
								<label>18j. Running Water</label>
							</div>

							<div class="center">
								<select class="cloned left-combo" name="q18equipAvailability_76" id="q18equipAvailability_76">
									<option value="" selected="selected">Select One</option>
									<option>Yes </option>
									<option>No </option>
								</select>

								<input name="q18equipAQty_76" type="number" class="cloned fromZero" min="0"/>
							</div>
							<div class="center">
								<select name="q18equipFunctioning_76" id="q18equipFunctioning_76" class="cloned">
									<option value="" selected="selected">Select One</option>
									<option> Yes </option>
									<option> No </option>
									<option> Dont Know </option>
								</select>

								<input name="q18equipFQty_76" type="number" class="cloned fromZero" min="0"/>
							</div>
							<input type="hidden"  name="q18equipCode_76" id="q18equipCode_76" value="EQP100" />
						</div>

						<div class="row" id="tr_77">
							<div class="left">
								<label>18k. Suction Machine</label>
							</div>

							<div class="center">
								<select class="cloned left-combo" name="q18equipAvailability_77" id="q18equipAvailability_77">
									<option value="" selected="selected">Select One</option>
									<option>Yes </option>
									<option>No </option>
								</select>

								<input name="q18equipAQty_77" type="number" class="cloned fromZero" min="0"/>
							</div>
							<div class="center">
								<select name="q18equipFunctioning_77" id="q18equipFunctioning_77" class="cloned">
									<option value="" selected="selected">Select One</option>
									<option> Yes </option>
									<option> No </option>
									<option> Dont Know </option>
								</select>

								<input name="q18equipFQty_77" type="number" class="cloned fromZero" min="0"/>
							</div>
							<input type="hidden"  name="q18equipCode_77" id="q18equipCode_77" value="EQP101" />
						</div>

						<div class="row" id="tr_78">
							<div class="left">
								<label>18l. Standard Cesaerian Section kit</label>
							</div>

							<div class="center">
								<select class="cloned left-combo" name="q18equipAvailability_78" id="q18equipAvailability_78">
									<option value="" selected="selected">Select One</option>
									<option>Yes </option>
									<option>No </option>
								</select>

								<input name="q18equipAQty_78" type="number" class="cloned fromZero" min="0"/>
							</div>
							<div class="center">
								<select name="q18equipFunctioning_78" id="q18equipFunctioning_78" class="cloned">
									<option value="" selected="selected">Select One</option>
									<option> Yes </option>
									<option> No </option>
									<option> Dont Know </option>
								</select>

								<input name="q18equipFQty_78" type="number" class="cloned fromZero" min="0"/>
							</div>
							<input type="hidden"  name="q18equipCode_78" id="q18equipCode_78" value="EQP102" />
						</div>

						<div class="row" id="tr_79">
							<div class="left">
								<label>18m. Sterile operation gowns</label>
							</div>

							<div class="center">
								<select class="cloned left-combo" name="q18equipAvailability_79" id="q18equipAvailability_79">
									<option value="" selected="selected">Select One</option>
									<option>Yes </option>
									<option>No </option>
								</select>

								<input name="q18equipAQty_79" type="number" class="cloned fromZero" min="0"/>
							</div>
							<div class="center">
								<select name="q18equipFunctioning_79" id="q18equipFunctioning_79" class="cloned">
									<option value="" selected="selected">Select One</option>
									<option> Yes </option>
									<option> No </option>
									<option> Dont Know </option>
								</select>

								<input name="q18equipFQty_79" type="number" class="cloned fromZero" min="0"/>
							</div>
							<input type="hidden"  name="q18equipCode_79" id="q18equipCode_79" value="EQP103" />
						</div>

						<div class="row" id="tr_80">
							<div class="left">
								<label>18n. Sterile Drapes</label>
							</div>

							<div class="center">
								<select class="cloned left-combo" name="q18equipAvailability_80" id="q18equipAvailability_80">
									<option value="" selected="selected">Select One</option>
									<option>Yes </option>
									<option>No </option>
								</select>

								<input name="q18equipAQty_80" type="number" class="cloned fromZero" min="0"/>
							</div>
							<div class="center">
								<select name="q18equipFunctioning_80" id="q18equipFunctioning_80" class="cloned">
									<option value="" selected="selected">Select One</option>
									<option> Yes </option>
									<option> No </option>
									<option> Dont Know </option>
								</select>

								<input name="q18equipFQty_80" type="number" class="cloned fromZero" min="0"/>
							</div>
							<input type="hidden"  name="q18equipCode_80" id="q18equipCode_80" value="EQP104" />
						</div>

						<div class="row" id="tr_81">
							<div class="left">
								<label>18o. Sterile gloves in various sizes</label>
							</div>

							<div class="center">
								<select class="cloned left-combo" name="q18equipAvailability_81" id="q18equipAvailability_81">
									<option value="" selected="selected">Select One</option>
									<option>Yes </option>
									<option>No </option>
								</select>
								<label>Sizes (Hold down Ctrl and click to select many)</label>
								<select multiple="multiple" name="q18equipAType_81[]" id="q18equipAType_81" class="cloned">

									<option value="1">Size 1</option>

									<option value="2">Size 2</option>
									<option value="3">Size 3</option>
									<option value="4">Size 4</option>
									<option value="5">Size 5</option>
									<option value="6">Size 6</option>
									<option value="6.5">Size 6.5</option>
									<option value="7">Size 7</option>

									<option value="7.5">Size 7.5 </option>

									<option value="8">Size 8</option>
									<option value="8.5">Size 8.5</option>
									<option value="9">Size 9</option>
								</select>

								<input name="q18equipAQty_81" type="number" class="cloned fromZero" min="0"/>
							</div>
							<div class="center">
								<select name="q18equipFunctioning_81" id="q18equipFunctioning_81" class="cloned">
									<option value="" selected="selected">Select One</option>
									<option> Yes </option>
									<option> No </option>
									<option> Dont Know </option>
								</select>

								<input name="q18equipFQty_81" type="number" class="cloned fromZero" min="0"/>
							</div>
							<input type="hidden"  name="q18equipCode_81" id="q18equipCode_81" value="EQP105" />
						</div>

						<div class="row" id="tr_82">
							<div class="left">
								<label>18p. IV canulas</label>
							</div>

							<div class="center">
								<select class="cloned left-combo" name="q18equipAvailability_82" id="q18equipAvailability_82">
									<option value="" selected="selected">Select One</option>
									<option>Yes </option>
									<option>No </option>
								</select>

								<input name="q18equipAQty_82" type="number" class="cloned fromZero" min="0"/>
							</div>
							<div class="center">
								<select name="q18equipFunctioning_82" id="q18equipFunctioning_82" class="cloned">
									<option value="" selected="selected">Select One</option>
									<option> Yes </option>
									<option> No </option>
									<option> Dont Know </option>
								</select>

								<input name="q18equipFQty_82" type="number" class="cloned fromZero" min="0"/>
							</div>
							<input type="hidden"  name="q18equipCode_82" id="q18equipCode_82" value="EQP106" />
						</div>

						<div class="row" id="tr_83">
							<div class="left">
								<label>18q. Drip Stand</label>
							</div>
							<input type="hidden"  name="q18equipCode_105" id="q18equipCode_105" value="EQP107" />

							<div class="center">
								<select class="cloned left-combo" name="q18equipAvailability_83" id="q18equipAvailability_83">
									<option value="" selected="selected">Select One</option>
									<option>Yes </option>
									<option>No </option>
								</select>

								<input name="q18equipAQty_83" type="number" class="cloned fromZero" min="0"/>
							</div>
							<div class="center">
								<select name="q18equipFunctioning_83" id="q18equipFunctioning_83" class="cloned">
									<option value="" selected="selected">Select One</option>
									<option> Yes </option>
									<option> No </option>
									<option> Dont Know </option>
								</select>
								<input name="q18equipFQty_83" type="number" class="cloned fromZero" min="0"/>
							</div>
						</div>

						<div class="row" id="tr_84">
							<div class="left">
								<label>18r. Blood transfusion set</label>
							</div>

							<div class="center">
								<select class="cloned left-combo" name="q18equipAvailability_84" id="q18equipAvailability_4">
									<option value="" selected="selected">Select One</option>
									<option>Yes </option>
									<option>No </option>
								</select>

								<input name="q18equipAQty_84" type="number" class="cloned fromZero" min="0"/>
							</div>
							<div class="center">
								<select name="q18equipFunctioning_84" id="q18equipFunctioning_84" class="cloned">
									<option value="" selected="selected">Select One</option>
									<option> Yes </option>
									<option> No </option>
									<option> Dont Know </option>
								</select>

								<input name="q18equipFQty_84" type="number" class="cloned fromZero" min="0"/>
							</div>
							<input type="hidden"  name="q18equipCode_84" id="q18equipCode_84" value="EQP108" />
						</div>

						<div class="row" id="tr_85">
							<div class="left">
								<label>18s. Recovery room/ recovery area</label>
							</div>

							<div class="center">
								<select class="cloned left-combo" name="q18equipAvailability_85" id="q18equipAvailability_85">
									<option value="" selected="selected">Select One</option>
									<option>Yes </option>
									<option>No </option>
								</select>

								<input name="q18equipAQty_85" type="number" class="cloned fromZero" min="0"/>
							</div>
							<div class="center">
								<select name="q18equipFunctioning_85" id="q18equipFunctioning_85" class="cloned">
									<option value="" selected="selected">Select One</option>
									<option> Yes </option>
									<option> No </option>
									<option> Dont Know </option>
								</select>

								<input name="q18equipFQty_85" type="number" class="cloned fromZero" min="0"/>
							</div>
							<input type="hidden"  name="q18equipCode_85" id="q18equipCode_85" value="EQP109" />
						</div>
						<!--close div tableEquipmentList_4-->
					</div>

					<label class="dcah-label" style="text-align:center">End of Questionnaire</label>

				</div>
			</div><!--close div level-hide-->
		</div><!--close div column-wide-->

	</div>
	<!--end level-4-and-above-->
						 <div class="buttons">					
						<input title="To move to the previous step" id="back" class="awesome magenta medium" type="reset"/>
						<input title="To move to the next step" id="next" class="awesome blue medium"  type="submit"/>
						<!--a title="To close the form." id="close_opened_form" class="awesome red medium">Close</a-->
						</div>
						</form>
						<hr />
					    <p id="data"></p>';
		$data['form'] = $form_mnh_assessment;
		$data['form_id'] = 'form_mnh_assessment';

		$this -> load -> view('form', $data);

	}

	public function instructions() {
		$instructions = '';
		$instructions.= '
<h3>Form Guide</h3>

<ol start="1" type="1|a|A|i|I">
	<li>
		Please click on one of the two forms below for instructions
	</li>
	<ol start="a">
		<li class="form-link a">
			MNCH Commodity Assessment Tool Instructions
		</li>
		<div class="form-instructions a">
			<ol>
				<li>
					Instructions for the User page
				</li>
				<ol>
					<li>
						Upload the  signed letter by the Head of the two divisions- I will send you a soft copy of this
					</li>
					<li>
						div the instructions as per the following
					</li>
				</ol>
				<li>
					Start
				</li>
				<ol>
					<li>
						To begin with the data entry, type in the name of the facility you are entering data for. Select the correct facility from the list that the system will provide.
					</li>
					<li>
						The system will upload the Master Facility Code (MFL) for the facility you have selected automatically. Confirm if this is your MFL code. If it is not, ensure that the facility name you have selected is the correct one.
					</li>
				</ol>
				<li>
					Facility Registration
				</li>
				<ol>
					<li>
						Once you entered the facility name, the facility registration page will load.
					</li>
					<li>
						The system will automatically upload the following information:  facility type, level of care, ownership/management, and district, county. If this information is not uploaded automatically, complete with the correct information.
					</li>
					<li>
						Complete the facility-in-charge information div with the following: name, telephone contact & email contact
					</li>
				</ol>

				<li>
					Assessment Tools Page
				</li>
				<ol>
					<li>
						The MNCH tools should be completed one at a time. You cannot move to the next tool without fully completing the first one.
					</li>
					<li>
						The system will load on two tabs at the top
					</li>
					<li>
						Child Health Commodities, Supplies & Equipment Assessment
					</li>
					<li>
						Maternal and Newborn health commodities, supplies & equipment assessment
					</li>
					<li>
						The two tools should be completed by ALL facilities.
					</li>
					<li>
						Select the assessment tool you would like to begin with then when done move to the next one.
					</li>
				</ol>
			</ol>
		</div>
		<li class="form-link c">
			Child Assessment Form
		</li>
		<div class="form-instructions c" >
			<ol>
				<li>
					The assessment will focus on the following:
				</li>
				<ol>
					<li>
						Commodities: Zinc sulphate 20mg, low –Osmolarity oral rehydration salts (ORS), Ciprofloxacin, and Metronidazole
					</li>
					<li>
						Supplies & Equipment:  Supplies and equipment available at the oral rehydration therapy corners in the facility
					</li>
				</ol>
				<li>
					The tool has 6 tabs from which data on the commodities should be collected from.
					These are points where children are managed or where the commodities are stored and which might have stocks.
				</li>
				<li>
					Please note you cannot proceed to the next tab, the next div or the next form without fully
					completing all the div in the 6 tabs.  Where stocks are not available, indicate zero (o) quantities and proceed to the next step.
				</li>
				<li>
					In the case of the options, there are two possible scenarios (YES or NO).
				</li>

				<ol>
					<li>
						If YES
					</li>
					<ol>
						<li>
							All dependent fields remain active or selectable.
						</li>
					</ol>
					<li>
						If NO
					</li>
					<ol>
						<li>
							All dependent fields become inactive or unselectable.
						</li>
					</ol>
				</ol>

			</ol>
			<li>Click link -> <a id="dcah_tool_instructions_li" class="awesome blue large" style="font-size:1em;display:inline-block">Child Health Commodity Assessment</a></li>
		</div>
		<li class="form-link m">
			Maternal & New-Born Health Assessment
		</li>
		<div class="form-instructions m" >
			<ol>
				<li>
					The assessment will focus on the following:
				</li>
				<ol>
					<li>
						Basic emergency obstetric and new born care commodities, supplies & equipment
					</li>
					<li>
						Some divs of the tool will
						have a provision for definite answers- YES/NO – these will limit you to choose only one response
					</li>
					<li>
						Some divs in the tool may allow for multiple divs.
					</li>
				</ol>
				<li>
					The <b><em>Facility Details</em></b> are pre-filled.
				</li>
				<li>
					Please fill the Facility Contact details.
				</li>
				<li>
					In the case of the options, there are two possible scenarios (YES or NO).
				</li>

				<ol>
					<li>
						If YES
					</li>
					<ol>
						<li>
							All dependent fields remain active or selectable.
						</li>
					</ol>
					<li>
						If NO
					</li>
					<ol>
						<li>
							All dependent fields become inactive or unselectable.
						</li>
					</ol>
				</ol>

			</ol>
			<li>Click link -> <a id="mnh_inventory_li" class="awesome blue large" style="font-size:1em;display:inline-block">Maternal and New-born Health Assessment</a></li>
		</div>
	</ol>

</ol>



';
						
						$data['form'] = $instructions;
		$data['form_id'] = 'instructions';

		$this -> load -> view('form', $data);
		}
		
		public function facility_registration() {
		$facility_registration = '';
		$facility_registration.= '
	<form name="facility_registration" id="facility_registration" method="POST" action="' . base_url() . 'submit/c_form/form_mnh_equipment_assessment' . '" >

	<h3 align="center">FACILITY REGISTRATION</h3>

	<div class="block">
		<div class="column">
			<div class="row-title">
				Facility Information
			</div>
			<!--div class="row2">
			<div class="left">
			<label>Date:</label>
			</div>
			<div class="right">
			<input type="date" name="facilityDateOfInventory" id="facilityDateOfInventory" readonly="readonly" class="autoDate" placeholder="click for date"/>
			</div>

			</div-->

			<div class="row2">
				<div class="left">
					<label>Facility Name:</label>
				</div>
				<div class="right">
					<input type="text" name="facilityName" id="facilityName"/>
				</div>
			</div>
			<div class="row2">
				<div class="left">
					<label>Facility Type:</label>
				</div>
				<div class="right">
					<select name="facilityType" id="facilityType">
						<option value="" selected="selected">Select One</option>
						' . $this -> selectFacilityType . '
					</select>
				</div>
			</div>
			<div class="row2">
				<div class="left">
					<label>Facility Level:</label>
				</div>
				<div class="right">
					<select name="facilityLevel" id="facilityLevel">
						<option value="" selected="selected">Select One</option>
						' . $this -> selectFacilityLevel . '
					</select>
				</div>
			</div>
			<div class="row2">
				<div class="left">
					<label>Owned By:</label>
				</div>
				<div class="right">
					<select name="facilityOwner" id="facilityOwner">
						<option value="" selected="selected">Select One</option>
						' . $this -> selectFacilityOwner . '
					</select>
				</div>
			</div>
			<div class="row2">
				<div class="left">
					<label>Province:</label>
				</div>
				<div class="right">
					<select name="facilityProvince" id="facilityProvince">
						<option value="" selected="selected">Select One</option>
						' . $this -> selectProvince . '
					</select>
				</div>
			</div>
			<div class="row2">
				<div class="left">

					<label>District:</label>
				</div>
				<div class="right">
					<select name="facilityDistrict" id="facilityDistrict">
						<option value="" selected="selected">Select One</option>
						' . $this -> selectDistricts . '
					</select>
				</div>
			</div>
			<div class="row2">
				<div class="left">
					<label>County:</label>
				</div>
				<div class="right">
					<select name="facilityCounty" id="facilityCounty">
						<option value="" selected="selected">Select One</option>
						' . $this -> selectCounties . '
					</select>
				</div>
			</div>

		</div>
		<div class="column" style="margin-bottom:30px">
			<div class="row-title">
				In Charge Contact Information
			</div>
			<div class="row2">
				<div class="left">
					<label>Name:</label>
				</div>
				<div class="right">
					<input type="text" name="facilityContactPerson" id="facilityContactPerson"/>
				</div>
			</div>
			<div class="row2">
				<div class="left">
					<label>Telephone:</label>
				</div>
				<div class="right">

				</div>

			</div>

			<div class="row2">
				<div class="left">
					<label>Cell 1:</label>
				</div>
				<div class="right">
					<input type="text" name="facilityTelephone" id="facilityTelephone" maxlength="14"/>
				</div>

			</div>

			<div class="row2">
				<div class="left">
					<label>Cell 2:</label>
				</div>
				<div class="right">
					<input type="text" name="facilityAltTelephone" id="facilityAltTelephone" maxlength="14"/>
				</div>

			</div>

			<div class="row2">
				<div class="left">
					<label>Email:</label>
				</div>
				<div class="right">
					<input type="email" name="facilityEmail" id="facilityEmail" maxlength="90"/>
					<input type="hidden"  name="facilityMFC" id="facilityMFC"/>
				</div>
			</div>
		</div>
	</div>
	<div class="block">
		<div class="column" style="margin-bottom:30px">
			<div class="row-title">
				MCH Contanct
			</div>
			<div class="row2">
				<div class="left">
					<label>Name:</label>
				</div>
				<div class="right">
					<input type="text" name="MCHContactPerson" id="MCHContactPerson"/>
				</div>
			</div>
			<div class="row2">
				<div class="left">
					<label>Telephone:</label>
				</div>
				<div class="right">

				</div>

			</div>

			<div class="row2">
				<div class="left">
					<label>Cell 1:</label>
				</div>
				<div class="right">
					<input type="text" name="MCHTelephone" id="MCHTelephone" maxlength="14"/>
				</div>

			</div>

			<div class="row2">
				<div class="left">
					<label>Cell 2:</label>
				</div>
				<div class="right">
					<input type="text" name="MCHAltTelephone" id="MCHAltTelephone" maxlength="14"/>
				</div>

			</div>

			<div class="row2">
				<div class="left">
					<label>Email:</label>
				</div>
				<div class="right">
					<input type="email" name="MCHEmail" id="MCHEmail" maxlength="90"/>
					<input type="hidden"  name="MCHMFC" id="MCHMFC"/>
				</div>
			</div>
		</div>
	</div>

</form>
		';
		
			$data['form'] = $facility_registration;
		$data['form_id'] = 'facility_registration';

		$this -> load -> view('form', $data);
		
		}

public function form_ort() {
		$ort = '';
		$ort.= '
	  
	<h3 align="center"> Oral Rehydration Therapy Corner Assessment </h3>
	<div class="block">
		<div class="column">
			<div class="row-title">
				<div class="left">
					ASPECTS
				</div>
				<div class="right" style="float:right">
					<div class="col">
						YES
					</div>
					<div class="col">
						NO
					</div>
				</div>
			</div>
			<div class="row">
				<div class="left">
					<label> Are dehydrated children rehydrated at this facility? </label>
				</div>
				<div class="right">
					<div class="col">
						<input type="radio" name="ortQuestion1" id="ortQuestion1_y" value="1" />
					</div>
					<div class="col">
						<input type="radio" name="ortQuestion1" id="ortQuestion1_n" value="0" />
					</div>
				</div>
			</div>
			<div class="row">
				<div class="left">
					<label> Does the facility have a designated location for oral rehydration ?</label>
				</div>
				<div class="right">
					<div class="col">
						<input type="radio" name="ortQuestion2" id="ortQuestion2_y"  value="1" />
					</div>
					<div class="col">
						<input type="radio" name="ortQuestion2" id="ortQuestion2_n" value="0" />
					</div>
				</div>
			</div>
			<div class="row hide" style="display:none">
					<label class="dcah-label"> Check the various locations where rehydration is carried out</label>
				</div>
			<div class="row hide" style="display:none">
				<div class="left" >
					<label> MCH</label>
				</div>
				<div class="right">
					<div class="col">
						<input type="checkbox" name="ortDehydrationLocation" id="ortDehydrationLocation"  value="" maxlength="50"/>
					</div>
				</div>
			</div>
			<div class="row hide" style="display:none">
				<div class="left" >
					<label> OPD</label>
				</div>
				<div class="right">
					<div class="col">
						<input type="checkbox" name="ortDehydrationLocation" id="ortDehydrationLocation"  value="" maxlength="50"/>
					</div>
				</div>
			</div>
			<div class="row hide" style="display:none">
				<div class="left" >
					<label> WARD </label>
				</div>
				<div class="right">
					<div class="col">
						<input type="checkbox" name="ortDehydrationLocation" id="ortDehydrationLocation"  value="" maxlength="50"/>
					</div>
				</div>
			</div>
			<div class="row hide" style="display:none">
				<div class="left" >
					<label> Other*?</label>
				</div>
				<div class="right">
					<div class="col">
						<input type="text" name="ortDehydrationLocation" id="ortDehydrationLocation"  value="" maxlength="50"/>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row-title">
		<label class="dcah-label">EQUIPMENT</label>
	</div>
	<h3 align="center"> State the availability &amp; Quantities of the following Equipment at the ORT Corner-(Assessor should ensure the interviewee responds to each of the questions). </h3>
	<div class="block">
		<table id="tableEquipmentList">
			<tr class="row2">
				<input type="button" id="editEquipmentListTopButton" name="editEquipmentListTopButton" class="awesome myblue medium" value="Edit List"/>
			</tr>
			<tr>
				<thead >
					<td width="144"><label class="dcah-label" style="font-size:1.0em">Equipment Name</label></td>
					<td width="144"><label class="dcah-label" style="font-size:1.0em">Yes/No</label></td>
					<td width="144"><label class="dcah-label" style="font-size:1.0em">Total Equipment Quantities</label></td>
					<td width="144"><label class="dcah-label" style="font-size:1.0em">Who supplied the supplies to the facility? (respond by item)</label></td>
					<td width="144"><label class="dcah-label" style="font-size:1.0em">Is there a budget for replacement of the missing, stolen or Broken ORT Corner equipment in the Current *AOP/QIP?</label></td>
				</thead>

			</tr>

			<tr class="row2" id="tr_1">
				<td width="144"><label>Tea spoons </label>
				<input type="hidden"  name="equipCode_1" id="equipCode_1" value="EQP01" />
				</td>
				<td width="144">
				<select name="equipAvailable_1" id="equipAvailable_1" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_1" id="equipQuantity_1" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_1" id="equipSupplier_1" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_1" id="equipBudgetPresent_1" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_2">
				<td width="144"><label>Table spoons </label>
				<input type="hidden"  name="equipCode_2" id="equipCode_2" value="EQP02" />
				</td>
				<td width="144">
				<select name="equipAvailable_2" id="equipAvailable_2" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_2" id="equipQuantity_2" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_2" id="equipSupplier_2" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_2" id="equipBudgetPresent_2" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_3">
				<td width="144"><label>Stirring spoon </label>
				<input type="hidden"  name="equipCode_3" id="equipCode_3" value="EQP03" />
				</td>
				<td width="144">
				<select name="equipAvailable_3" id="equipAvailable_3" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_3" id="equipQuantity_3" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_3" id="equipSupplier_3" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_3" id="equipBudgetPresent_3" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_4">
				<td width="144"><label>Plastic buckets (with lids for infection prevention) </label>
				<input type="hidden"  name="equipCode_4" id="equipCode_4" value="EQP04" />
				</td>
				<td width="144">
				<select name="equipAvailable_4" id="equipAvailable_4" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_4" id="equipQuantity_4" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_4" id="equipSupplier_4" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_4" id="equipBudgetPresent_4" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_5">
				<td width="144"><label> Buckets â€“ for storing cups, spoons </label>
				<input type="hidden"  name="equipCode_5" id="equipCode_5" value="EQP05" />
				</td>
				<td width="144">
				<select name="equipAvailable_5" id="equipAvailable_5" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_5" id="equipQuantity_5" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_5" id="equipSupplier_5" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_5" id="equipBudgetPresent_5" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_6">
				<td width="144"><label> Plastic cups (50-100mls) </label>
				<input type="hidden"  name="equipCode_6" id="equipCode_6" value="EQP06" />
				</td>
				<td width="144">
				<select name="equipAvailable_6" id="equipAvailable_6" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_6" id="equipQuantity_6" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_6" id="equipSupplier_6" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_6" id="equipBudgetPresent_6" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_7">
				<td width="144"><label> Plastic cups (101-200mls) </label>
				<input type="hidden"  name="equipCode_7" id="equipCode_7" value="EQP07" />
				</td>
				<td width="144">
				<select name="equipAvailable_7" id="equipAvailable_7" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_7" id="equipQuantity_7" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_7" id="equipSupplier_7" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_7" id="equipBudgetPresent_7" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_8">
				<td width="144"><label> Plastic cups (201mls-499mls) </label>
				<input type="hidden"  name="equipCode_8" id="equipCode_8" value="EQP08" />
				</td>
				<td width="144">
				<select name="equipAvailable_8" id="equipAvailable_8" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_8" id="equipQuantity_8" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_8" id="equipSupplier_8" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_8" id="equipBudgetPresent_8" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_9">
				<td width="144"><label> Plastic cups (500mls) </label>
				<input type="hidden"  name="equipCode_9" id="equipCode_9" value="EQP09" />
				</td>
				<td width="144">
				<select name="equipAvailable_9" id="equipAvailable_9" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_9" id="equipQuantity_9" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_9" id="equipSupplier_9" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_9" id="equipBudgetPresent_9" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_10">
				<td width="144"><label> 1 litre Calibrated measuring jars </label>
				<input type="hidden"  name="equipCode_10" id="equipCode_10" value="EQP10" />
				</td>
				<td width="144">
				<select name="equipAvailable_10" id="equipAvailable_10" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_10" id="equipQuantity_10" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_10" id="equipSupplier_10" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_10" id="equipBudgetPresent_10" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_11">
				<td width="144"><label> Table Trays </label>
				<input type="hidden"  name="equipCode_11" id="equipCode_11" value="EQP11" />
				</td>
				<td width="144">
				<select name="equipAvailable_11" id="equipAvailable_11" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_11" id="equipQuantity_11" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_11" id="equipSupplier_11" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_11" id="equipBudgetPresent_11" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_12">
				<td width="144"><label> Wash Basins </label>
				<input type="hidden"  name="equipCode_12" id="equipCode_12" value="EQP12" />
				</td>
				<td width="144">
				<select name="equipAvailable_12" id="equipAvailable_12" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_12" id="equipQuantity_12" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_12" id="equipSupplier_12" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_12" id="equipBudgetPresent_12" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_13">
				<td width="144"><label> Water heating equipment,(e.g..hot plate/Meko ) </label>
				<input type="hidden"  name="equipCode_13" id="equipCode_13" value="EQP13" />
				</td>
				<td width="144">
				<select name="equipAvailable_13" id="equipAvailable_13" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_13" id="equipQuantity_13" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_13" id="equipSupplier_13" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_13" id="equipBudgetPresent_13" class="cloned ">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_14">
				<td width="144"><label> Hot plate-Electric/Solar powered </label>
				<input type="hidden"  name="equipCode_14" id="equipCode_14" value="EQP14" />
				</td>
				<td width="144">
				<select name="equipAvailable_14" id="equipAvailable_14" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_14" id="equipQuantity_14" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_14" id="equipSupplier_14" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_14" id="equipBudgetPresent_14" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_15">
				<td width="144"><label> Heater- Gas powered </label>
				<input type="hidden"  name="equipCode_15" id="equipCode_15" value="EQP15" />
				</td>
				<td width="144">
				<select name="equipAvailable_15" id="equipAvailable_15" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_15" id="equipQuantity_15" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_15" id="equipSupplier_15" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_15" id="equipBudgetPresent_15" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_16">
				<td width="144"><label> Charcoal or Firewood  stove/Heater </label>
				<input type="hidden"  name="equipCode_16" id="equipCode_16" value="EQP16" />
				</td>
				<td width="144">
				<select name="equipAvailable_16" id="equipAvailable_16" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_16" id="equipQuantity_16" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_16" id="equipSupplier_16" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_16" id="equipBudgetPresent_16" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_17">
				<td width="144"><label> Paraffin Stove/Heater </label>
				<input type="hidden"  name="equipCode_17" id="equipCode_17" value="EQP17" />
				</td>
				<td width="144">
				<select name="equipAvailable_17" id="equipAvailable_17" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_17" id="equipQuantity_17" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_17" id="equipSupplier_17" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_17" id="equipBudgetPresent_17" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_18">
				<td width="144"><label> Sufurias  with a Lid (14 inch) </label>
				<input type="hidden"  name="equipCode_18" id="equipCode_18" value="EQP18" />
				</td>
				<td width="144">
				<select name="equipAvailable_18" id="equipAvailable_18" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_18" id="equipQuantity_18" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_18" id="equipSupplier_18" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_18" id="equipBudgetPresent_18" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_19">
				<td width="144"><label> Waste Container </label>
				<input type="hidden"  name="equipCode_19" id="equipCode_19" value="EQP19" />
				</td>
				<td width="144">
				<select name="equipAvailable_19" id="equipAvailable_19" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_19" id="equipQuantity_19" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_19" id="equipSupplier_19" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_19" id="equipBudgetPresent_19" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_20">
				<td width="144"><label> Wall Clock /Timing device </label>
				<input type="hidden"  name="equipCode_20" id="equipCode_20" value="EQP20" />
				</td>
				<td width="144">
				<select name="equipAvailable_20" id="equipAvailable_20" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_20" id="equipQuantity_20" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_20" id="equipSupplier_20" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_20" id="equipBudgetPresent_20" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_21">
				<td width="144"><label> Table- for mixing ORS </label>
				<input type="hidden"  name="equipCode_21" id="equipCode_21" value="EQP21" />
				</td>
				<td width="144">
				<select name="equipAvailable_21" id="equipAvailable_21" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_21" id="equipQuantity_21" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_21" id="equipSupplier_21" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_21" id="equipBudgetPresent_21" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_22">
				<td width="144"><label> Benches/chair(s) </label>
				<input type="hidden"  name="equipCode_22" id="equipCode_22" value="EQP22" />
				</td>
				<td width="144">
				<select name="equipAvailable_22" id="equipAvailable_22" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_22" id="equipQuantity_22" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_22" id="equipSupplier_22" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_22" id="equipBudgetPresent_22" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_23">
				<td width="144"><label> Water Storage Container ( at least 40lts)- With Tap </label>
				<input type="hidden"  name="equipCode_23" id="equipCode_23" value="EQP23" />
				</td>
				<td width="144">
				<select name="equipAvailable_23" id="equipAvailable_23" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_23" id="equipQuantity_23" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_23" id="equipSupplier_23" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_23" id="equipBudgetPresent_23" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_24">
				<td width="144"><label> Water Storage Container ( at least 40lts)- Without Tap </label>
				<input type="hidden"  name="equipCode_24" id="equipCode_24" value="EQP24" />
				</td>
				<td width="144">
				<select name="equipAvailable_24" id="equipAvailable_24" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_24" id="equipQuantity_24" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_24" id="equipSupplier_24" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_24" id="equipBudgetPresent_24" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_25">
				<td width="144"><label> Locally available measuring containers e.g. cooking fat Tins. </label>
				<input type="hidden"  name="equipCode_25" id="equipCode_25" value="EQP25" />
				</td>
				<td width="144">
				<select name="equipAvailable_25" id="equipAvailable_25" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_25" id="equipQuantity_25" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_25" id="equipSupplier_25" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_25" id="equipBudgetPresent_25" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_26">
				<td width="144"><label> Weighing scale </label>
				<input type="hidden"  name="equipCode_26" id="equipCode_26" value="EQP26" />
				</td>
				<td width="144">
				<select name="equipAvailable_26" id="equipAvailable_26" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_26" id="equipQuantity_26" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_26" id="equipSupplier_26" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_26" id="equipBudgetPresent_26" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_27">
				<td width="144"><label> Hand Washing Facility/Point e.g. tippy taps. </label>
				<input type="hidden"  name="equipCode_27" id="equipCode_27" value="EQP27" />
				</td>
				<td width="144">
				<select name="equipAvailable_27" id="equipAvailable_27" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_27" id="equipQuantity_27" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_27" id="equipSupplier_27" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_27" id="equipBudgetPresent_27" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_28">
				<td width="144"><label> Safe water source </label>
				<input type="hidden"  name="equipCode_28" id="equipCode_28" value="EQP28" />
				</td>
				<td width="144">
				<select name="equipAvailable_28" id="equipAvailable_28" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_28" id="equipQuantity_28" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_28" id="equipSupplier_28" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_28" id="equipBudgetPresent_28" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_29">
				<td width="144"><label> Thermometer </label>
				<input type="hidden"  name="equipCode_29" id="equipCode_29" value="EQP29" />
				</td>
				<td width="144">
				<select name="equipAvailable_29" id="equipAvailable_29" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_29" id="equipQuantity_29" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_29" id="equipSupplier_29" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_29" id="equipBudgetPresent_29" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_30">
				<td width="144"><label> MUAC Tape </label>
				<input type="hidden"  name="equipCode_30" id="equipCode_30" value="EQP30" />
				</td>
				<td width="144">
				<select name="equipAvailable_30" id="equipAvailable_30" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_30" id="equipQuantity_30" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_30" id="equipSupplier_30" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_30" id="equipBudgetPresent_30" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<!--tr class="row2">
			<input type="button" id="editEquipmentListBottomButton" name="editEquipmentList" class="awesome myblue medium" value="Edit List"/-->
			</tr>
		</table>
	</div>

';
						
						$data['form'] = $ort;
		$data['form_id'] = 'ORT';

		$this -> load -> view('form', $data);
		}
}

