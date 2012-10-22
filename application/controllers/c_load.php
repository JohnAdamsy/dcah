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
		$facilityName=$this->input->post('username',TRUE);
		
		//$facilityName='Afya';
		
		if (!strlen($facilityName)<2)
		
		//echo $facilityName; exit;
		
		try{
		$this->rows=$this->m_autocomplete->getAutocomplete(array('keyword'=>$facilityName));
		//die(var_dump($this->rows));
		$json_names=array();
		
		foreach($this->rows as $key=>$value)
			array_push($json_names,$value['facilityName']);
			print json_encode($json_names);//die;
		}catch(exception $ex){
			//ignore
			$ex->getMessage();
		}
		
	}
	
	public function suggest(){
		$this->load->model('m_autocomplete');
		//$facilityName=$this->input->post('username',TRUE);
		
		try{
		$this->rows=$this->m_autocomplete->getAllFacilityNames();
		//die(var_dump($this->rows));
		$json_names=array();
		
		foreach($this->rows as $key=>$value)
			array_push($json_names,$value['facilityName']);
			print json_encode($json_names);
		}catch(exception $ex){
			//ignore
			$ex->getMessage();
		}
		
	}

	public function form_zinc_ors_inventory(){
		$form_zinc_ors='';
		$form_zinc_ors.='<form name="zinc_ors_inventory" id="zinc_ors_inventory" method="POST" action="' . base_url() . 'submit/c_form/form_zinc_ors_inventory' . '" >
	<!-- form for collecting inventory status information -->

	<h3 align="center"> CHILD HEALTH COMMODITIES ASSESSMENT</h3>

	
	<section class="block">
		<section class="column">
			<section class="row-title">
				Facility Information
			</section>
			<section class="row2">
				<section class="left">
					<label>Date:</label>
				</section>
				<section class="right">
					<input type="date" name="facilityDateOfInventory" id="facilityDateOfInventory" readonly="readonly" class="autoDate" placeholder="click for date"/>
				</section>
			</section>
			<section class="row2">
				<section class="left">
					<label>Facility Name:</label>
				</section>
				<section class="right">
					<input type="text" name="facilityName" id="facilityName"/>
				</section>
			</section>
			<section class="row2">
				<section class="left">
					<label>Facility Type:</label>
				</section>
				<section class="right">
					<select name="facilityType" id="facilityType">
						<option value="" selected="selected">Select One</option>
						' . $this -> selectFacilityType . '
					</select>
				</section>
			</section>
			<section class="row2">
				<section class="left">
					<label>Facility Level:</label>
				</section>
				<section class="right">
					<select name="facilityLevel" id="facilityLevel">
						<option value="" selected="selected">Select One</option>
						' . $this -> selectFacilityLevel . '
					</select>
				</section>
			</section>
			<section class="row2">
				<section class="left">
					<label>District:</label>
				</section>
				<section class="right">
					<select name="facilityDistrict" id="facilityDistrict">
						<option value="" selected="selected">Select One</option>
						' . $this -> selectDistricts . '
					</select>
				</section>
			</section>
			<section class="row2">
				<section class="left">
					<label>County:</label>
				</section>
				<section class="right">
					<select name="facilityCounty" id="facilityCounty">
						<option value="" selected="selected">Select One</option>
						' . $this -> selectCounties . '
					</select>
				</section>
			</section>

		</section>
		<section class="column" style="margin-bottom:30px">
			
			
			<section class="row-title">
				Contact Information
			</section>
			<section class="row2">
				<section class="left">
					<label>Facility-In-Charge Contact:</label>
				</section>
				<section class="right">
					<input type="text" name="facilityContactPerson" id="facilityContactPerson"/>
				</section>
			</section>
			<section class="row2">
				<section class="left">
					<label>Telephone Contact(s):</label>
				</section>
				<section class="right">
					<input type="text" name="facilityTelephone" id="facilityTelephone" maxlength="14"/>
				</section>
			</section>
			<section class="row2">
				<section class="left">
					<label>Email:</label>
				</section>
				<section class="right">
					<input type="email" name="facilityEmail" id="facilityEmail" maxlength="90"/>
					<input type="hidden"  name="facilityMFC" id="facilityMFC"/>
				</section>
			</section>
		</section>
	</section>
	

	<h3 align="center"> Commodities Assessment </h3>
		<p style="text-align: center;color:#872300">
			Indicate the quantities of the Zinc,ORS,Ciprofloxacin &amp; Metronidazole (Flagyl) available in this facility at the following units

		</p>
	  <div id="tabs">
	<ul>
		<li><a href="#tabs-1">MCH</a></li>
		<li><a href="#tabs-2">PEDS WARD</a></li>
		<li><a href="#tabs-3">OPD</a></li>
		<li><a href="#tabs-4">PHARMACY</a></li>
		<li><a href="#tabs-5">STORES</a></li>
		<li><a href="#tabs-6">Others*</a></li>
	</ul>
	<div id="tabs-1" class="tab MCH">
		
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
				<input type="number"  name="znStockQuantity_1" id="znStockQuantity_1" class="cloned fromZero" maxlength="6"/>
				<input type="hidden"  name="znCommodityName_1" id="znCommodityName_1" value="Zinc Sulphate (20mg) Tablet" />
				</td>
				<!--td width="144">
				<input type="date"  name="znStockDispensedDate_1" id="znStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
				</td-->
				<!--td width="144">
				<input type="text"  name="znStockSupplier_1" id="znStockSupplier_1" class="cloned" maxlength="45"/>
				</td-->
				<td width="144">
				<input type="text"  name="znStockExpiryDate_1" id="znStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
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
				<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned fromZero" maxlength="6"/>
				<input type="hidden"  name="orsCommodityName_1" id="orsCommodityName_1" value="Oral Rehydration Salts (ORS) Sachet" />
				</td>
				<!--td width="144">
				<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
				</td-->
				<!--td width="144">
				<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
				</td-->
				<td width="144">
				<input type="text"  name="orsStockExpiryDate_1" id="orsStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
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
				<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned fromZero" maxlength="6"/>
				<input type="hidden"  name="orsCommodityName_1" id="orsCommodityName_1" value="Oral Rehydration Salts (ORS) Sachet" />
				</td>
				<!--td width="144">
				<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
				</td-->
				<!--td width="144">
				<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
				</td-->
				<td width="144">
				<input type="text"  name="orsStockExpiryDate_1" id="orsStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
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
				<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned fromZero" maxlength="6"/>
				<input type="hidden"  name="orsCommodityName_1" id="orsCommodityName_1" value="Oral Rehydration Salts (ORS) Sachet" />
				</td>
				<!--td width="144">
				<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
				</td-->
				<!--td width="144">
				<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
				</td-->
				<td width="144">
				<input type="text"  name="orsStockExpiryDate_1" id="orsStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
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
	</div> <!--close tabs-1-->
	
	<div id="tabs-2" class="tab PEDS">
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
				<input type="number"  name="znStockQuantity_1" id="znStockQuantity_1" class="cloned fromZero" maxlength="6"/>
				<input type="hidden"  name="znCommodityName_1" id="znCommodityName_1" value="Zinc Sulphate (20mg) Tablet" />
				</td>
				<!--td width="144">
				<input type="date"  name="znStockDispensedDate_1" id="znStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
				</td-->
				<!--td width="144">
				<input type="text"  name="znStockSupplier_1" id="znStockSupplier_1" class="cloned" maxlength="45"/>
				</td-->
				<td width="144">
				<input type="text"  name="znStockExpiryDate_1" id="znStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
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
				<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned fromZero" maxlength="6"/>
				<input type="hidden"  name="orsCommodityName_1" id="orsCommodityName_1" value="Oral Rehydration Salts (ORS) Sachet" />
				</td>
				<!--td width="144">
				<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
				</td-->
				<!--td width="144">
				<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
				</td-->
				<td width="144">
				<input type="text"  name="orsStockExpiryDate_1" id="orsStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
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
				<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned fromZero" maxlength="6"/>
				<input type="hidden"  name="orsCommodityName_1" id="orsCommodityName_1" value="Oral Rehydration Salts (ORS) Sachet" />
				</td>
				<!--td width="144">
				<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
				</td-->
				<!--td width="144">
				<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
				</td-->
				<td width="144">
				<input type="text"  name="orsStockExpiryDate_1" id="orsStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
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
				<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned fromZero" maxlength="6"/>
				<input type="hidden"  name="orsCommodityName_1" id="orsCommodityName_1" value="Oral Rehydration Salts (ORS) Sachet" />
				</td>
				<!--td width="144">
				<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
				</td-->
				<!--td width="144">
				<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
				</td-->
				<td width="144">
				<input type="text"  name="orsStockExpiryDate_1" id="orsStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
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
	</div> <!--close tabs-2-->
	
	<div id="tabs-3" class="tab OPD">
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
				<input type="number"  name="znStockQuantity_1" id="znStockQuantity_1" class="cloned fromZero" maxlength="6"/>
				<input type="hidden"  name="znCommodityName_1" id="znCommodityName_1" value="Zinc Sulphate (20mg) Tablet" />
				</td>
				<!--td width="144">
				<input type="date"  name="znStockDispensedDate_1" id="znStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
				</td-->
				<!--td width="144">
				<input type="text"  name="znStockSupplier_1" id="znStockSupplier_1" class="cloned" maxlength="45"/>
				</td-->
				<td width="144">
				<input type="text"  name="znStockExpiryDate_1" id="znStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
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
				<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned fromZero" maxlength="6"/>
				<input type="hidden"  name="orsCommodityName_1" id="orsCommodityName_1" value="Oral Rehydration Salts (ORS) Sachet" />
				</td>
				<!--td width="144">
				<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
				</td-->
				<!--td width="144">
				<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
				</td-->
				<td width="144">
				<input type="text"  name="orsStockExpiryDate_1" id="orsStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
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
				<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned fromZero" maxlength="6"/>
				<input type="hidden"  name="orsCommodityName_1" id="orsCommodityName_1" value="Oral Rehydration Salts (ORS) Sachet" />
				</td>
				<!--td width="144">
				<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
				</td-->
				<!--td width="144">
				<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
				</td-->
				<td width="144">
				<input type="text"  name="orsStockExpiryDate_1" id="orsStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
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
				<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned fromZero" maxlength="6"/>
				<input type="hidden"  name="orsCommodityName_1" id="orsCommodityName_1" value="Oral Rehydration Salts (ORS) Sachet" />
				</td>
				<!--td width="144">
				<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
				</td-->
				<!--td width="144">
				<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
				</td-->
				<td width="144">
				<input type="text"  name="orsStockExpiryDate_1" id="orsStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
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
	</div> <!--close tabs-3-->
	
	
	<div id="tabs-4" class="tab Pharmacy">
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
				</td>
				<!--td width="144">
				<input type="number"  name="znStockQuantity_1" id="znStockQuantity_1" class="cloned fromZero" maxlength="6"/>
				</td-->
				<td width="144">
				<input type="date"  name="znStockDispensedDate_1" id="znStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<td width="144">
				<input type="text"  name="znStockSupplier_1" id="znStockSupplier_1" class="cloned" maxlength="45"/>
				</td>
				<td width="144">
				<input type="text"  name="znStockExpiryDate_1" id="znStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<td width="144">
				<input type="text"  name="znStockComments_1" id="znStockComments_1" class="cloned" maxlength="255"/>
				</td>
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
				<input type="text"  name="orsStockBatchNo_1" id="orsStockBatchNo_1" class="cloned" maxlength="10"/>
				<input type="hidden"  name="orsCommodityName_1" id="orsCommodityName_1" value="Oral Rehydration Salts (ORS) Sachet" />
				</td>
				<!--td width="144">
				<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned fromZero" maxlength="6"/>
				</td-->
				<td width="144">
				<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<td width="144">
				<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
				</td>
				<td width="144">
				<input type="text"  name="orsStockExpiryDate_1" id="orsStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<td width="144">
				<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
				</td>
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
				<input type="text"  name="orsStockBatchNo_1" id="orsStockBatchNo_1" class="cloned" maxlength="10"/>
				<input type="hidden"  name="orsCommodityName_1" id="orsCommodityName_1" value="Oral Rehydration Salts (ORS) Sachet" />
				</td>
				<!--td width="144">
				<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned fromZero" maxlength="6"/>
				</td-->
				<td width="144">
				<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<td width="144">
				<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
				</td>
				<td width="144">
				<input type="text"  name="orsStockExpiryDate_1" id="orsStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<td width="144">
				<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
				</td>
			</tr>
			<tr id="formbuttons_2">
				<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_2" value="Add a Batch" width="12"/>
				<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_2" value="Remove Batch" width="12"/>
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
				<input type="text"  name="orsStockBatchNo_1" id="orsStockBatchNo_1" class="cloned" maxlength="10"/>
				<input type="hidden"  name="orsCommodityName_1" id="orsCommodityName_1" value="Oral Rehydration Salts (ORS) Sachet" />
				</td>
				<!--td width="144">
				<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned fromZero" maxlength="6"/>
				</td-->
				<td width="144">
				<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<td width="144">
				<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
				</td>
				<td width="144">
				<input type="text"  name="orsStockExpiryDate_1" id="orsStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<td width="144">
				<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
				</td>
			</tr>
			<tr id="formbuttons_2">
				<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_2" value="Add a Batch" width="12"/>
				<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_2" value="Remove Batch" width="12"/>
			</tr>
		</table>
	</div> <!--close tabs-4-->
	
	<div id="tabs-5" class="tab Stores">
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
				</td>
				<!--td width="144">
				<input type="number"  name="znStockQuantity_1" id="znStockQuantity_1" class="cloned fromZero" maxlength="6"/>
				</td-->
				<td width="144">
				<input type="date"  name="znStockDispensedDate_1" id="znStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<td width="144">
				<input type="text"  name="znStockSupplier_1" id="znStockSupplier_1" class="cloned" maxlength="45"/>
				</td>
				<td width="144">
				<input type="text"  name="znStockExpiryDate_1" id="znStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<td width="144">
				<input type="text"  name="znStockComments_1" id="znStockComments_1" class="cloned" maxlength="255"/>
				</td>
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
				<input type="text"  name="orsStockBatchNo_1" id="orsStockBatchNo_1" class="cloned" maxlength="10"/>
				<input type="hidden"  name="orsCommodityName_1" id="orsCommodityName_1" value="Oral Rehydration Salts (ORS) Sachet" />
				</td>
				<!--td width="144">
				<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned fromZero" maxlength="6"/>
				</td-->
				<td width="144">
				<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<td width="144">
				<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
				</td>
				<td width="144">
				<input type="text"  name="orsStockExpiryDate_1" id="orsStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<td width="144">
				<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
				</td>
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
				<input type="text"  name="orsStockBatchNo_1" id="orsStockBatchNo_1" class="cloned" maxlength="10"/>
				<input type="hidden"  name="orsCommodityName_1" id="orsCommodityName_1" value="Oral Rehydration Salts (ORS) Sachet" />
				</td>
				<!--td width="144">
				<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned fromZero" maxlength="6"/>
				</td-->
				<td width="144">
				<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<td width="144">
				<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
				</td>
				<td width="144">
				<input type="text"  name="orsStockExpiryDate_1" id="orsStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<td width="144">
				<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
				</td>
			</tr>
			<tr id="formbuttons_2">
				<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_2" value="Add a Batch" width="12"/>
				<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_2" value="Remove Batch" width="12"/>
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
				<input type="text"  name="orsStockBatchNo_1" id="orsStockBatchNo_1" class="cloned" maxlength="10"/>
				<input type="hidden"  name="orsCommodityName_1" id="orsCommodityName_1" value="Oral Rehydration Salts (ORS) Sachet" />
				</td>
				<!--td width="144">
				<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned fromZero" maxlength="6"/>
				</td-->
				<td width="144">
				<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<td width="144">
				<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
				</td>
				<td width="144">
				<input type="text"  name="orsStockExpiryDate_1" id="orsStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<td width="144">
				<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
				</td>
			</tr>
			<tr id="formbuttons_2">
				<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_2" value="Add a Batch" width="12"/>
				<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_2" value="Remove Batch" width="12"/>
			</tr>
		</table>
		
	</div> <!--close tabs-5-->
	
	<div id="tabs-6" class="tab Others">
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
				</td>
				<!--td width="144">
				<input type="number"  name="znStockQuantity_1" id="znStockQuantity_1" class="cloned fromZero" maxlength="6"/>
				</td-->
				<td width="144">
				<input type="date"  name="znStockDispensedDate_1" id="znStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<td width="144">
				<input type="text"  name="znStockSupplier_1" id="znStockSupplier_1" class="cloned" maxlength="45"/>
				</td>
				<td width="144">
				<input type="text"  name="znStockExpiryDate_1" id="znStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<td width="144">
				<input type="text"  name="znStockComments_1" id="znStockComments_1" class="cloned" maxlength="255"/>
				</td>
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
				<input type="text"  name="orsStockBatchNo_1" id="orsStockBatchNo_1" class="cloned" maxlength="10"/>
				<input type="hidden"  name="orsCommodityName_1" id="orsCommodityName_1" value="Oral Rehydration Salts (ORS) Sachet" />
				</td>
				<!--td width="144">
				<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned fromZero" maxlength="6"/>
				</td-->
				<td width="144">
				<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<td width="144">
				<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
				</td>
				<td width="144">
				<input type="text"  name="orsStockExpiryDate_1" id="orsStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<td width="144">
				<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
				</td>
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
				<input type="text"  name="orsStockBatchNo_1" id="orsStockBatchNo_1" class="cloned" maxlength="10"/>
				<input type="hidden"  name="orsCommodityName_1" id="orsCommodityName_1" value="Oral Rehydration Salts (ORS) Sachet" />
				</td>
				<!--td width="144">
				<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned fromZero" maxlength="6"/>
				</td-->
				<td width="144">
				<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<td width="144">
				<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
				</td>
				<td width="144">
				<input type="text"  name="orsStockExpiryDate_1" id="orsStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<td width="144">
				<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
				</td>
			</tr>
			<tr id="formbuttons_2">
				<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_2" value="Add a Batch" width="12"/>
				<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_2" value="Remove Batch" width="12"/>
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
				<input type="text"  name="orsStockBatchNo_1" id="orsStockBatchNo_1" class="cloned" maxlength="10"/>
				<input type="hidden"  name="orsCommodityName_1" id="orsCommodityName_1" value="Oral Rehydration Salts (ORS) Sachet" />
				</td>
				<!--td width="144">
				<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned fromZero" maxlength="6"/>
				</td-->
				<td width="144">
				<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<td width="144">
				<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
				</td>
				<td width="144">
				<input type="text"  name="orsStockExpiryDate_1" id="orsStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<td width="144">
				<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
				</td>
			</tr>
			<tr id="formbuttons_2">
				<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_2" value="Add a Batch" width="12"/>
				<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_2" value="Remove Batch" width="12"/>
			</tr>
		</table>
	</div> <!--end of tabs-6-->
</div><!--end of div tabs-->
	  
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
						<input type="checkbox" name="ortDehydrationLocation" id="ortDehydrationLocation"  value="" maxlength="50"/>
					</section>
				</section>
			</section>
			<section class="row hide" style="display:none">
				<section class="left" >
					<label> WARD </label>
				</section>
				<section class="right">
					<section class="col">
						<input type="checkbox" name="ortDehydrationLocation" id="ortDehydrationLocation"  value="" maxlength="50"/>
					</section>
				</section>
			</section>
			<section class="row hide" style="display:none">
				<section class="left" >
					<label> Other*?</label>
				</section>
				<section class="right">
					<section class="col">
						<input type="text" name="ortDehydrationLocation" id="ortDehydrationLocation"  value="" maxlength="50"/>
					</section>
				</section>
			</section>
		</section>
	</section>
	
	<section class="row-title">
			<label class="dcah-label">EQUIPMENT</label>
	</section>
	<h3 align="center"> State the availability &amp; Quantities of the following Equipment at the ORT Corner-(Assessor should ensure the interviewee responds to each of the questions). </h3>
	<section class="block">
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
>>>>>>> upstream/master
	   </tr>
	   
	   <tr class="row2" id="tr_1">
			<td width="144">
				<label>Tea spoons </label>
				<input type="hidden"  name="equipCode_1" id="equipCode_1" value="EQP01" />
			</td>
			<td width="144">
				<select name="equipAvailable_1" id="equipAvailable_1" class="cloned left-combo">
						<option value="" selected="selected">Select One</option>
					    <option value="1">Yes</option>
					    <option value="0">No</option>
				</select>
			</td>
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
				</select>
			</td>
	 </tr>
	  <tr class="row2" id="tr_2">
			<td width="144">
				<label>Table spoons </label>
				<input type="hidden"  name="equipCode_2" id="equipCode_2" value="EQP02" />
			</td>
			<td width="144">
				<select name="equipAvailable_2" id="equipAvailable_2" class="cloned left-combo">
						<option value="" selected="selected">Select One</option>
					    <option value="1">Yes</option>
					    <option value="0">No</option>
				</select>
			</td>
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
				</select>
			</td>
	 </tr>
	  <tr class="row2" id="tr_3">
			<td width="144">
				<label>Stirring spoon </label>
				<input type="hidden"  name="equipCode_3" id="equipCode_3" value="EQP03" />
			</td>
			<td width="144">
				<select name="equipAvailable_3" id="equipAvailable_3" class="cloned left-combo">
						<option value="" selected="selected">Select One</option>
					    <option value="1">Yes</option>
					    <option value="0">No</option>
				</select>
			</td>
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
				</select>
			</td>
	 </tr>
	 <tr class="row2" id="tr_4">
			<td width="144">
				<label>Plastic buckets (with lids for infection prevention) </label>
				<input type="hidden"  name="equipCode_4" id="equipCode_4" value="EQP04" />
			</td>
			<td width="144">
				<select name="equipAvailable_4" id="equipAvailable_4" class="cloned left-combo">
						<option value="" selected="selected">Select One</option>
					    <option value="1">Yes</option>
					    <option value="0">No</option>
				</select>
			</td>
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
				</select>
			</td>
	 </tr>
	 <tr class="row2" id="tr_5">
			<td width="144">
				<label> Buckets – for storing cups, spoons </label>
				<input type="hidden"  name="equipCode_5" id="equipCode_5" value="EQP05" />
			</td>
			<td width="144">
				<select name="equipAvailable_5" id="equipAvailable_5" class="cloned left-combo">
						<option value="" selected="selected">Select One</option>
					    <option value="1">Yes</option>
					    <option value="0">No</option>
				</select>
			</td>
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
				</select>
			</td>
	 </tr>
	 <tr class="row2" id="tr_6">
			<td width="144">
				<label> Plastic cups (50-100mls) </label>
				<input type="hidden"  name="equipCode_6" id="equipCode_6" value="EQP06" />
			</td>
			<td width="144">
				<select name="equipAvailable_6" id="equipAvailable_6" class="cloned left-combo">
						<option value="" selected="selected">Select One</option>
					    <option value="1">Yes</option>
					    <option value="0">No</option>
				</select>
			</td>
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
				</select>
			</td>
	 </tr>  
	  <tr class="row2" id="tr_7">
			<td width="144">
				<label> Plastic cups (101-200mls) </label>
				<input type="hidden"  name="equipCode_7" id="equipCode_7" value="EQP07" />
			</td>
			<td width="144">
				<select name="equipAvailable_7" id="equipAvailable_7" class="cloned left-combo">
						<option value="" selected="selected">Select One</option>
					    <option value="1">Yes</option>
					    <option value="0">No</option>
				</select>
			</td>
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
				</select>
			</td>
	 </tr>
	 <tr class="row2" id="tr_8">
			<td width="144">
				<label> Plastic cups (201mls-499mls) </label>
				<input type="hidden"  name="equipCode_8" id="equipCode_8" value="EQP08" />
			</td>
			<td width="144">
				<select name="equipAvailable_8" id="equipAvailable_8" class="cloned left-combo">
						<option value="" selected="selected">Select One</option>
					    <option value="1">Yes</option>
					    <option value="0">No</option>
				</select>
			</td>
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
				</select>
			</td>
	 </tr>
	 <tr class="row2" id="tr_9">
			<td width="144">
				<label> Plastic cups (500mls) </label>
				<input type="hidden"  name="equipCode_9" id="equipCode_9" value="EQP09" />
			</td>
			<td width="144">
				<select name="equipAvailable_9" id="equipAvailable_9" class="cloned left-combo">
						<option value="" selected="selected">Select One</option>
					    <option value="1">Yes</option>
					    <option value="0">No</option>
				</select>
			</td>
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
				</select>
			</td>
	 </tr>
	 <tr class="row2" id="tr_10">
			<td width="144">
				<label> 1 litre Calibrated measuring jars  </label>
				<input type="hidden"  name="equipCode_10" id="equipCode_10" value="EQP10" />
			</td>
			<td width="144">
				<select name="equipAvailable_10" id="equipAvailable_10" class="cloned left-combo">
						<option value="" selected="selected">Select One</option>
					    <option value="1">Yes</option>
					    <option value="0">No</option>
				</select>
			</td>
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
				</select>
			</td>
	 </tr>
	 <tr class="row2" id="tr_11">
			<td width="144">
				<label> Table Trays  </label>
				<input type="hidden"  name="equipCode_11" id="equipCode_11" value="EQP11" />
			</td>
			<td width="144">
				<select name="equipAvailable_11" id="equipAvailable_11" class="cloned left-combo">
						<option value="" selected="selected">Select One</option>
					    <option value="1">Yes</option>
					    <option value="0">No</option>
				</select>
			</td>
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
				</select>
			</td>
	 </tr>
	 <tr class="row2" id="tr_12">
			<td width="144">
				<label> Wash Basins </label>
				<input type="hidden"  name="equipCode_12" id="equipCode_12" value="EQP12" />
			</td>
			<td width="144">
				<select name="equipAvailable_12" id="equipAvailable_12" class="cloned left-combo">
						<option value="" selected="selected">Select One</option>
					    <option value="1">Yes</option>
					    <option value="0">No</option>
				</select>
			</td>
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
				</select>
			</td>
	 </tr>
	 <tr class="row2" id="tr_13">
			<td width="144">
				<label>  Water heating equipment,(e.g..hot plate/Meko )  </label>
				<input type="hidden"  name="equipCode_13" id="equipCode_13" value="EQP13" />
			</td>
			<td width="144">
				<select name="equipAvailable_13" id="equipAvailable_13" class="cloned left-combo">
						<option value="" selected="selected">Select One</option>
					    <option value="1">Yes</option>
					    <option value="0">No</option>
				</select>
			</td>
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
				</select>
			</td>
	 </tr>
	 <tr class="row2" id="tr_14">
			<td width="144">
				<label>  Hot plate-Electric/Solar powered  </label>
				<input type="hidden"  name="equipCode_14" id="equipCode_14" value="EQP14" />
			</td>
			<td width="144">
				<select name="equipAvailable_14" id="equipAvailable_14" class="cloned left-combo">
						<option value="" selected="selected">Select One</option>
					    <option value="1">Yes</option>
					    <option value="0">No</option>
				</select>
			</td>
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
				</select>
			</td>
	 </tr>
	 <tr class="row2" id="tr_15">
			<td width="144">
				<label>  Heater- Gas powered  </label>
				<input type="hidden"  name="equipCode_15" id="equipCode_15" value="EQP15" />
			</td>
			<td width="144">
				<select name="equipAvailable_15" id="equipAvailable_15" class="cloned left-combo">
						<option value="" selected="selected">Select One</option>
					    <option value="1">Yes</option>
					    <option value="0">No</option>
				</select>
			</td>
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
				</select>
			</td>
	 </tr>
	 <tr class="row2" id="tr_16">
			<td width="144">
				<label>  Charcoal or Firewood  stove/Heater  </label>
				<input type="hidden"  name="equipCode_16" id="equipCode_16" value="EQP16" />
			</td>
			<td width="144">
				<select name="equipAvailable_16" id="equipAvailable_16" class="cloned left-combo">
						<option value="" selected="selected">Select One</option>
					    <option value="1">Yes</option>
					    <option value="0">No</option>
				</select>
			</td>
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
				</select>
			</td>
	 </tr>
	 <tr class="row2" id="tr_17">
			<td width="144">
				<label>  Paraffin Stove/Heater </label>
				<input type="hidden"  name="equipCode_17" id="equipCode_17" value="EQP17" />
			</td>
			<td width="144">
				<select name="equipAvailable_17" id="equipAvailable_17" class="cloned left-combo">
						<option value="" selected="selected">Select One</option>
					    <option value="1">Yes</option>
					    <option value="0">No</option>
				</select>
			</td>
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
				</select>
			</td>
	 </tr>
	 <tr class="row2" id="tr_18">
			<td width="144">
				<label>  Sufurias  with a Lid (14 inch) </label>
				<input type="hidden"  name="equipCode_18" id="equipCode_18" value="EQP18" />
			</td>
			<td width="144">
				<select name="equipAvailable_18" id="equipAvailable_18" class="cloned left-combo">
						<option value="" selected="selected">Select One</option>
					    <option value="1">Yes</option>
					    <option value="0">No</option>
				</select>
			</td>
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
				</select>
			</td>
	 </tr>
	 <tr class="row2" id="tr_19">
			<td width="144">
				<label>  Waste Container </label>
				<input type="hidden"  name="equipCode_19" id="equipCode_19" value="EQP19" />
			</td>
			<td width="144">
				<select name="equipAvailable_19" id="equipAvailable_19" class="cloned left-combo">
						<option value="" selected="selected">Select One</option>
					    <option value="1">Yes</option>
					    <option value="0">No</option>
				</select>
			</td>
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
				</select>
			</td>
	 </tr>
	 <tr class="row2" id="tr_20">
			<td width="144">
				<label>  Wall Clock /Timing device </label>
				<input type="hidden"  name="equipCode_20" id="equipCode_20" value="EQP20" />
			</td>
			<td width="144">
				<select name="equipAvailable_20" id="equipAvailable_20" class="cloned left-combo">
						<option value="" selected="selected">Select One</option>
					    <option value="1">Yes</option>
					    <option value="0">No</option>
				</select>
			</td>
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
				</select>
			</td>
	 </tr>
	 <tr class="row2" id="tr_21">
			<td width="144">
				<label> Table- for mixing ORS </label>
				<input type="hidden"  name="equipCode_21" id="equipCode_21" value="EQP21" />
			</td>
			<td width="144">
				<select name="equipAvailable_21" id="equipAvailable_21" class="cloned left-combo">
						<option value="" selected="selected">Select One</option>
					    <option value="1">Yes</option>
					    <option value="0">No</option>
				</select>
			</td>
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
				</select>
			</td>
	 </tr>
	  <tr class="row2" id="tr_22">
			<td width="144">
				<label> Benches/chair(s) </label>
				<input type="hidden"  name="equipCode_22" id="equipCode_22" value="EQP22" />
			</td>
			<td width="144">
				<select name="equipAvailable_22" id="equipAvailable_22" class="cloned left-combo">
						<option value="" selected="selected">Select One</option>
					    <option value="1">Yes</option>
					    <option value="0">No</option>
				</select>
			</td>
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
				</select>
			</td>
	 </tr>
	  <tr class="row2" id="tr_23">
			<td width="144">
				<label> Water Storage Container ( at least 40lts)- With Tap </label>
				<input type="hidden"  name="equipCode_23" id="equipCode_23" value="EQP23" />
			</td>
			<td width="144">
				<select name="equipAvailable_23" id="equipAvailable_23" class="cloned left-combo">
						<option value="" selected="selected">Select One</option>
					    <option value="1">Yes</option>
					    <option value="0">No</option>
				</select>
			</td>
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
				</select>
			</td>
	 </tr>
	 <tr class="row2" id="tr_24">
			<td width="144">
				<label> Water Storage Container ( at least 40lts)- Without Tap </label>
				<input type="hidden"  name="equipCode_24" id="equipCode_24" value="EQP24" />
			</td>
			<td width="144">
				<select name="equipAvailable_24" id="equipAvailable_24" class="cloned left-combo">
						<option value="" selected="selected">Select One</option>
					    <option value="1">Yes</option>
					    <option value="0">No</option>
				</select>
			</td>
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
				</select>
			</td>
	 </tr>
	 <tr class="row2" id="tr_25">
			<td width="144">
				<label> Locally available measuring containers – e.g. cooking fat Tins. </label>
				<input type="hidden"  name="equipCode_25" id="equipCode_25" value="EQP25" />
			</td>
			<td width="144">
				<select name="equipAvailable_25" id="equipAvailable_25" class="cloned left-combo">
						<option value="" selected="selected">Select One</option>
					    <option value="1">Yes</option>
					    <option value="0">No</option>
				</select>
			</td>
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
				</select>
			</td>
	 </tr>
	 <tr class="row2" id="tr_26">
			<td width="144">
				<label> Weighing scale </label>
				<input type="hidden"  name="equipCode_26" id="equipCode_26" value="EQP26" />
			</td>
			<td width="144">
				<select name="equipAvailable_26" id="equipAvailable_26" class="cloned left-combo">
						<option value="" selected="selected">Select One</option>
					    <option value="1">Yes</option>
					    <option value="0">No</option>
				</select>
			</td>
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
				</select>
			</td>
	 </tr>
	 <tr class="row2" id="tr_27">
			<td width="144">
				<label> Hand Washing Facility/Point e.g. tippy taps. </label>
				<input type="hidden"  name="equipCode_27" id="equipCode_27" value="EQP27" />
			</td>
			<td width="144">
				<select name="equipAvailable_27" id="equipAvailable_27" class="cloned left-combo">
						<option value="" selected="selected">Select One</option>
					    <option value="1">Yes</option>
					    <option value="0">No</option>
				</select>
			</td>
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
				</select>
			</td>
	 </tr>
	 <tr class="row2" id="tr_28">
			<td width="144">
				<label>  Safe water source  </label>
				<input type="hidden"  name="equipCode_28" id="equipCode_28" value="EQP28" />
			</td>
			<td width="144">
				<select name="equipAvailable_28" id="equipAvailable_28" class="cloned left-combo">
						<option value="" selected="selected">Select One</option>
					    <option value="1">Yes</option>
					    <option value="0">No</option>
				</select>
			</td>
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
				</select>
			</td>
	 </tr>
	 <tr class="row2" id="tr_29">
			<td width="144">
				<label>  Thermometer  </label>
				<input type="hidden"  name="equipCode_29" id="equipCode_29" value="EQP29" />
			</td>
			<td width="144">
				<select name="equipAvailable_29" id="equipAvailable_29" class="cloned left-combo">
						<option value="" selected="selected">Select One</option>
					    <option value="1">Yes</option>
					    <option value="0">No</option>
				</select>
			</td>
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
				</select>
			</td>
	 </tr>
	 <tr class="row2" id="tr_30">
			<td width="144">
				<label>  MUAC Tape  </label>
				<input type="hidden"  name="equipCode_30" id="equipCode_30" value="EQP30" />
			</td>
			<td width="144">
				<select name="equipAvailable_30" id="equipAvailable_30" class="cloned left-combo">
						<option value="" selected="selected">Select One</option>
					    <option value="1">Yes</option>
					    <option value="0">No</option>
				</select>
			</td>
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
				</select>
			</td>
	 </tr>
	 <!--tr class="row2">
	 <input type="button" id="editEquipmentListBottomButton" name="editEquipmentList" class="awesome myblue medium" value="Edit List"/-->
	 </tr>
    </table>
	</section>
	
	</form>';

		$data['form'] = $form_zinc_ors;
		$data['form_id'] = 'zinc_ors_inventory';

		$this -> load -> view('form', $data);
	}

	
	public function form_mnh_equipment_assessment() {
		$form_mnh_assessment = '';
		$form_mnh_assessment.= '
		<form name="form_mnh_assessment" id="form_mnh_assessment" method="POST" action="' . base_url() . 'submit/c_form/form_mnh_equipment_assessment' . '" >
	<!-- form for collecting inventory status information -->
	<h3 align="center"> ASSESSMENT OF EQUIPMENT AND SUPPLIES FOR EmONC</h3>

	<section class="block">
		<section class="column">
			<section class="row-title">
				Facility Information
			</section>


			<!--section class="row2">


				<section class="left">
					<label>Date:</label>
				</section>
				<section class="right">
					<input type="date" name="facilityDateOfInventory" id="facilityDateOfInventory" readonly="readonly" class="autoDate" placeholder="click for date"/>
				</section>

			</section-->

			<section class="row2">
				<section class="left">
					<label>Facility Name:</label>
				</section>
				<section class="right">
					<input type="text" name="facilityName" id="facilityName"/>
				</section>
			</section>
			<section class="row2">
				<section class="left">
					<label>Facility Type:</label>
				</section>
				<section class="right">
					<select name="facilityType" id="facilityType">
						<option value="" selected="selected">Select One</option>
						' . $this -> selectFacilityType . '
					</select>
				</section>
			</section>
			<section class="row2">
				<section class="left">
					<label>Facility Level:</label>
				</section>
				<section class="right">
					<select name="facilityLevel" id="facilityLevel">
						<option value="" selected="selected">Select One</option>
						' . $this -> selectFacilityLevel . '
					</select>
				</section>
			</section>
			<section class="row2">
				<section class="left">
		<label>Owned By:</label>
				</section>
				<section class="right">
					<select name="facilityOwner" id="facilityOwner">
						<option value="" selected="selected">Select One</option>
						' . $this -> selectFacilityOwner . '
					</select>
				</section>
			</section>
			<section class="row2">
				<section class="left">
					<label>Province:</label>
				</section>
				<section class="right">
					<select name="facilityProvince" id="facilityProvince">
						<option value="" selected="selected">Select One</option>
						' . $this -> selectProvince . '
					</select>
				</section>
			</section>
			<section class="row2">
				<section class="left">

					<label>District:</label>
				</section>
				<section class="right">
					<select name="facilityDistrict" id="facilityDistrict">
						<option value="" selected="selected">Select One</option>
						' . $this -> selectDistricts . '
					</select>
				</section>
			</section>
			<section class="row2">
				<section class="left">
					<label>County:</label>
				</section>
				<section class="right">
					<select name="facilityCounty" id="facilityCounty">
						<option value="" selected="selected">Select One</option>
						' . $this -> selectCounties . '
					</select>
				</section>
			</section>

		</section>
		<section class="column" style="margin-bottom:30px">
			
			
			<section class="row-title">
				Contact Information
			</section>
			<section class="row2">
				<section class="left">
					<label>Facility-In-Charge Contact:</label>
				</section>
				<section class="right">
					<input type="text" name="facilityContactPerson" id="facilityContactPerson"/>
				</section>
			</section>
			<section class="row2">
				<section class="left">
					<label>Telephone Contact(s):</label>
				</section>
				<section class="right">

					<label>1:</label>
					<input type="text" name="facilityTelephone" id="facilityTelephone" maxlength="14"/>
				</section>
				<section class="right">
					<label>2:</label>
					<input type="text" name="facilityAltTelephone" id="facilityAltTelephone" maxlength="14"/>
				</section>
>>>>>>> upstream/master
			</section>
			<section class="row2">
				<section class="left">
					<label>Email:</label>
				</section>
				<section class="right">
					<input type="email" name="facilityEmail" id="facilityEmail" maxlength="90"/>
					<input type="hidden"  name="facilityMFC" id="facilityMFC"/>
				</section>
			</section>
		</section>
	</section>

	<section class="block">
		<section class="column-wide">
			<section class="row-title">
				<section class="left">
					<label class="dcah-label">Inventory Type: Labor &amp; Delivery</label>
				</section>
				<section class="center">
					<label class="dcah-label">ANSWER</label>
				</section>
				<section class="right">
					<label class="dcah-label">COMMENTS (On Why NOT)</label>
				</section>

			</section>

			<section class="row">
				<section class="left">
					5. Does the facility provide 24 hour coverage for delivery services?
				</section>
				<section class="center cloned" >

					<select name="lndq5FacilityDelivery" id="lndq5FacilityDelivery" class="cloned left-combo">
						<option value="" selected="selected">Select One</option>
						<option value="Yes">Yes</option>
						<option value="No">No</option>
					</select>
				</section>

				<section class="right q5 hide cloned" style="display: none">
					<input type="text" name="lndq5Comment" id="lndq5Comment"/>

				</section>

			</section>
			<section class="row">
				<section class="left">
					6a. Is a person skilled in conducting deliveries present  at the facility or on call 24 hours a day,
					including weekends, to provide delivery care?
				</section>
				<section class="center cloned">

					<select name="lndq6aConductingDelivery" id="lndq6aConductingDelivery">
						<option value="" selected="selected">Select One</option>
						<option value="Yes">Yes</option>
						<option value="No">No</option>
					</select>
				</section>
			</section>
			<section class="row q6 hide" style="display: none">
				<section class="left">
					6b. Who conducts deliveries in this facility?
				</section>
				<section class="center cloned" >
					<select name="lndq6bSkilledProviders[]" multiple="multiple" id="lndq6bSkilledProviders">

						<option>Mid-wife</option>
						<option>Trained Medical Officer</option>
						<option>Clinicial Officer</option>
						<option>Nursing Officer</option>
						<option>Doctor</option>
						<option>Community Health Worker</option>

						
					</select>
					<label for="otherProvider">Others(Specify)</label>
					<input type="text" id="lndotherProvider" name="lndotherProvider" maxlength="55" placeholder="provider1,provider2,...,"/>

				</section>
			</section>
			<section class="row">
				<section class="left">
					7. Indicate the total number of beds in the maternity ward / unit in this facility*
				</section>
				<section class="right">

					<input type="number" name="lndq7TotalBeds" id="lndq7TotalBeds" class="cloned fromZero" min="0"/>

				</section>

			</section>

			<section class="row-title">
				<label class="dcah-label">*Ask to see the room where Normal Deliveries are conducted</label>
			</section>

			<section class="row">
				<section class="left">
					8. What is the setting of the Delivery Room?
				</section>
				<section class="right">

					<select name="lndq8DeliveryRoom" id="lndq8DeliveryRoom" class="cloned">

						<option value="" selected="selected">Select One</option>
						<option>private room, visual &amp; auditory privacy</option>
						<option>non-private room, visual &amp; auditory privacy</option>
						<option>visual privacy only</option>
						<option>no privacy</option>
					</select>
				</section>

			</section>

			<h3>NOTE THE AVAILABILITY AND FUNCTIONALITY OF SUPPLIES AND EQUIPMENT REQUIRED FOR DELIVERY SERVICES. EQUIPMENT MAY BE IN DELIVERY ROOM OR AN ADJACENT ROOM.</h3>

		</section>
		<section class="column-wide">
			<section class="row">

				<section class="row-title">
					<section class="left">
						<label class="dcah-label">9. EQUIPMENT REQUIRED FOR DELIVERY SERVICES</label>
					</section>
					<section class="center">
						<label class="dcah-label" style="width:45%">Availability (A)</label>
						<label class="dcah-label" style="float:right;width:45%">Quantity</label>

					</section>
					<section class="right">
						<label class="dcah-label" style="width:45%">Functioning (b)</label>
						<label class="dcah-label" style="float:right;width:45%">Quantity</label>
					</section>
				</section>
			</section>

			<section class="row" id="tr_1">
				<section class="left">
					9a. Examination light
				</section>

				<input type="hidden"  name="q9equipCode_31" id="q9equipCode_31" value="EQP31" />

				<section class="center">
					<select class="cloned left-combo" name="q9aExamninatioLightAvailability_1" id="q9aExamninatioLightAvailability_1">
						<option value="" selected="selected">Select One</option>
						<option>Yes </option>
						<option>No </option>
					</select>

					<input name="q9aExamninatioLightAQty_1" type="number" class="cloned fromZero"/>
				</section>
				<section class="right">
					<select name="q9aFunctioning_1" id="q9aFunctioning_1" class="cloned">
						<option value="" selected="selected">Select One</option>
						<option> Yes </option>
						<option> No </option>
						<option> Do Not Know </option>
					</select>

					<input name="q9aExamninatioLightFQty_1" type="number" class="cloned fromZero" min="0"/>
				</section>

			</section>

			<section class="row" id="tr_2">
				<section class="left">
					9b. Delivery bed/ couch
				</section>

				<input type="hidden"  name="q9equipCode_32" id="q9equipCode_32" value="EQP32" />

				<section class="center">
					<select class="cloned left-combo" name="q9bDeliveryBedAvailability_2" id="q9bDeliveryBedAvailability_2">
						<option>Yes </option>
						<option>No </option>
					</select>

					<input name="q9bDeliveryBedAQty_1" type="number" class="cloned fromZero"/>
				</section>
				<section class="right">
					<select name="q9bFunctioning_2" id="q9bFunctioning_2" class="cloned">
						<option value="" selected="selected">Select One</option>
						<option> Yes </option>
						<option> No </option>
						<option> Do Not Know </option>
					</select>

					<input name="q9bDeliveryBedFQty_1" type="number" class="cloned fromZero" min="0"/>
				</section>

			</section>


			<section class="row" id="tr_3">
				<section class="left">
					9c. Drip stand
				</section>
				<input type="hidden"  name="q9equipCode_33" id="q9equipCode_33" value="EQP33" />
				<section class="center">
					<select class="cloned left-combo" name="q9cDripStand_3" id="q9cDripStand_3">

						<option>Yes </option>
						<option>No </option>
					</select>

					<input type="number" class="cloned fromZero" min="0"/>
				</section>

				<section class="right" name="q9cFunctioning_3" id="q9cFunctioning_3" class="cloned">

					<select>
						<option value="" selected="selected">Select One</option>
						<option> Yes </option>
						<option> No </option>
						<option> Do Not Know </option>
					</select>

					<input type="number" class="cloned fromZero" min="0" />
				</section>

			</section>


			<section class="row" id="tr_4">
				<section class="left">
					9d.Mackintosh (On the Delivery Couch)
				</section>
				<input type="hidden"  name="q9equipCode_34" id="q9equipCode_34" value="EQP34" />
				<section class="center">
					<select class="cloned left-combo" name="qc9dMackintoshAvailability_4" id="qc9dMackintoshAvailability_4" class="cloned">

						<option value="" selected="selected">Select One</option>
						<option>Yes </option>
						<option>No </option>
					</select>


					<input type="number" name="qc9dMackintoshAQty_4" class="cloned fromZero" min="0"/>
				</section>
				<section class="right">
					<select name="q9dFunctioning_4" id="q9dFunctioning_4" class="cloned">

						<option value="" selected="selected">Select One</option>
						<option> Yes </option>
						<option> No </option>
						<option> Do Not Know </option>
					</select>


					<input name="qc9dMackintoshFQty_4" type="number" class="cloned fromZero" min="0"/>

				</section>

			</section>


			<section class="row" id="tr_5">
				<section class="left">
					9e. Linen(Draping)
				</section>
				<input type="hidden"  name="q9equipCode_35" id="q9equipCode_35" value="EQP35" />
				<section class="center">
					<select class="cloned left-combo" name="q9eLinenDrapingAvailability_5" id="q9eLinenDrapingAvailability_5">

						<option>Yes </option>
						<option>No </option>
					</select>


					<input name="q9eLinenDrapingAQty_5" type="number" class="cloned fromZero" />
				</section>
				<section class="right">
					<select name="q9eFunctioning_5" name="q9eFunctioning_5" class="cloned">

						<option value="" selected="selected">Select One</option>
						<option> Yes </option>
						<option> No </option>
						<option> Do Not Know </option>
					</select>


					<input name="q9eLinenDrapingFQty_5" type="number" class="cloned fromZero" min="0"/>

				</section>

			</section>


			<section class="row" id="tr_6">
				<section class="left">
					9f.i. Linen(Delivery Couch)
				</section>
				<input type="hidden"  name="q9equipCode_36" id="q9equipCode_36" value="EQP36" />
				<section class="center">
					<select class="cloned left-combo" name="q9eLinenBedAvailability_6" id="q9eLinenBedAvailability_6">

						<option value="" selected="selected">Select One</option>
						<option>Yes </option>
						<option>No </option>
					</select>


					<input name="q9eLinenBedAQty_6" type="number" class="cloned fromZero" />
				</section>
				<section class="right">
					<select name="q9eFunctioning_6" name="q9eFunctioning_6" class="cloned">

						<option value="" selected="selected">Select One</option>
						<option> Yes </option>
						<option> No </option>
						<option> Do Not Know </option>
					</select>


					<input name="q9eLinenBedFQty_6" type="number" class="cloned fromZero" min="0"/>

				</section>

			</section>


			<section class="row" id="tr_7">
				<section class="left">
					9f.ii. Linen(Green Towels)
				</section>
				<input type="hidden"  name="q9equipCode_37" id="q9equipCode_37" value="EQP37" />
				<section class="center">
					<select class="cloned left-combo" name="q9eLinenBedAvailability_7" id="q9eLinenBedAvailability_7">

						<option value="" selected="selected">Select One</option>
						<option>Yes </option>
						<option>No </option>
					</select>


					<input name="q9eLinenBedAQty_7" type="number" class="cloned fromZero" />
				</section>
				<section class="right">
					<select name="q9eFunctioning_7" name="q9eFunctioning_7" class="cloned">

						<option value="" selected="selected">Select One</option>
						<option> Yes </option>
						<option> No </option>
						<option> Do Not Know </option>
					</select>


					<input name="q9eLinenBedFQty_7" type="number" class="cloned fromZero" min="0"/>

				</section>

			</section>

	<section class="row" id="tr_8">
				<section class="left">
					9g. Sharps container
				</section>
				<input type="hidden"  name="q9equipCode_38" id="q9equipCode_38" value="EQP38" />
				<section class="center">
					<select class="cloned left-combo" name="q9gSharpsContainer_8" id="q9gSharpsContainer_8">

						<option>Yes </option>
						<option>No </option>
					</select>

					<input type="number" class="cloned fromZero" min="0"/>
				</section>
				<section class="right">

					<select name="q9gFunctioning_8" id="q9gFunctioning_8" class="cloned">

						<option value="" selected="selected">Select One</option>
						<option> Yes </option>
						<option> No </option>
						<option> Do Not Know </option>
					</select>

					<input type="number" class="cloned fromZero" min="0"/>
				</section>

			</section>


			<section class="row" id="tr_9">
				<section class="left">
					9h. At least five or more 2-ml or 5-ml disposable syringes
				</section>
				<input type="hidden"  name="q9equipCode_39" id="q9equipCode_39" value="EQP39" />
				<section class="center">
					<select class="cloned left-combo" name="q9hDisposableSyringes_9" id="q9hDisposableSyringes_9">

						<option>Yes </option>
						<option>No </option>
					</select>

				</section>

				</section>

				<section class="row" id="tr_10">
					<section class="left">
						9i. Three properly labeled or colour coded IP buckets
					</section>
					<input type="hidden"  name="q9equipCode_40" id="q9equipCode_40" value="EQP40" />

					<section class="center">
						<select class="cloned left-combo" name="q9iIPBuckets_1" id="q9iIPBuckets_1">
							<option>Yes </option>
							<option>No </option>
						</select>

					</section>

				</section>

				<section class="row" id="tr_11">
					<section class="left">
						9j. High Level Chemical Disinfectant (Jik, Cidex)
					</section>
					<input type="hidden"  name="q9equipCode_41" id="q9equipCode_41" value="EQP41" />

					<section class="center">
						<select class="cloned left-combo" name="q9jJik_1" id="q9jJik_1">
							<option>Always </option>
							<option>Sometimes </option>
							<option>Never </option>
						</select>

					</section>

					</section>

					<section class="row" id="tr_12">
						<section class="left">
							9k. Soap for washing instruments (constantly available)
						</section>
						<input type="hidden"  name="q9equipCode_42" id="q9equipCode_42" value="EQP42" />

						<section class="center">
							<select class="cloned left-combo" name="q9kWashingInstruments_1" id="q9kWashingInstruments_1">
								<option>Always Available</option>
								<option>Sometimes Available</option>
								<option>Never Available</option>
							</select>

						</section>
						<section class="right">
							<select name="q9kFunctioning_1" id="q9kFunctioning_1">
								<option value="" selected="selected">Select One</option>
								<option> Yes </option>
								<option> No </option>
								<option> Do Not Know </option>
							</select>

						</section>

					</section>

					<section class="row" id="tr_13">
						<section class="left">
							9l.Soap for handwashing (constantly available)
						</section>
						<input type="hidden"  name="q9equipCode_43" id="q9equipCode_43" value="EQP43" />

						<section class="center">
							<select class="cloned left-combo" name="q9lSoapHandwashing_1" id="q9lSoapHandwashing_1">
								<option>Always Available</option>
								<option>Sometimes Available</option>
								<option>Never Available</option>
							</select>

						</section>
						<section class="right" name="q9lFunctioning_1" id="q9lFunctioning_1">
							<select>
								<option value="" selected="selected">Select One</option>
								<option> Yes </option>
								<option> No </option>
								<option> Do Not Know </option>
							</select>

						</section>

					</section>


					<section class="row" id="tr_14">
						<section class="left">
							9m.Properly Labelled or colour coded waste segragation bins
						</section>
						<input type="hidden"  name="q9equipCode_44" id="q9equipCode_44" value="EQP44" />

						<section class="center">
							<select class="cloned left-combo" name="q9mLabelledColor_1" id="q9mLabelledColor_1">
								<option>Yes </option>
								<option>No </option>
							</select>

							<input type="number" class="cloned fromZero" min="0" />
						</section>
					

						<section class="row" id="tr_15">
							<section class="left">
								9o. Single-use hand-drying towels (constantly available)
							</section>
							<input type="hidden"  name="q9equipCode_45" id="q9equipCode_45" value="EQP45" />

							<section class="center">
								<select class="cloned left-combo" name="q9oSingleTowels_1" id="q9oSingleTowels_1">
									<option>Always Available</option>
									<option>Sometimes Available</option>
									<option>Never Available</option>
								</select>

							</section>
							<section class="right">
								<select name="q9oFunctioning_1" id="q9oFunctioning_1">
									<option value="" selected="selected">Select One</option>
									<option> Yes </option>
									<option> No </option>
									<option> Do Not Know </option>
								</select>

							</section>

						</section>
						<section class="row" id="tr_16">
							<section class="left">
								9p. Running  Water for handwashing (constantly available)
							</section>
							<input type="hidden"  name="q9equipCode_46" id="q9equipCode_46" value="EQP46" />

							<section class="center">
								<select class="cloned left-combo" name="q9pRunningWater_1" id="q9pRunningWater_1">
									<option>Always Available</option>
									<option>Sometimes Available</option>
									<option>Never Available</option>
								</select>

							</section>
							<section class="right">
								<select name="q9pFunctioning_1" id="q9pFunctioning_1">
									<option value="" selected="selected">Select One</option>
									<option> Yes </option>
									<option> No </option>
									<option> Do Not Know </option>
								</select>

							</section>

						</section>
					</section>

					<section class="column-wide">
						<section class="row">

							<section class="row-title">
								<section class="left">
									<label class="dcah-label">10. Indicate the quantities of the contents of the Delivery Kits available in this facility</label>
								</section>
								<section class="center">
									<label class="dcah-label" style="float:right;width:45%">Quantity</label>
								</section>

							</section>

							</section>


							<section class="row">
								<section class="left">
									10a. Cord scissors
								</section>

									<input type="hidden"  name="q9equipCode_47" id="q9equipCode_47" value="EQP47" />	

								<section class="center">
									<input type="number" class="cloned fromZero" name="q10aCordScissors_1" id="q10aCordScissors_1" min="0"/>
								</section>

							</section>

							<section class="row">
								<section class="left">
									10b. Long artery Forceps (straight, lockable)
								</section>

								<input type="hidden"  name="q9equipCode_48" id="q9equipCode_48" value="EQP48" />

								<section class="center">
									<input type="number" class="cloned fromZero" name="q10bLongArtery_1" id="q10bLongArtery_1" min="0"/>
								</section>

							</section>

							<section class="row">
								<section class="left">
									10c. Episiotomy scissors
								</section>

								<input type="hidden"  name="q9equipCode_49" id="q9equipCode_49" value="EQP49" />

								<section class="center">
									<input type="number" class="cloned fromZero" name="q10cEpisotomy_1" id="q10cEpisotomy_1" min="0"/>
								</section>

							</section>

							<section class="row">
								<section class="left">
									10d. Kidney dishes
								</section>

								<input type="hidden"  name="q9equipCode_50" id="q9equipCode_50" value="EQP50" />

								<section class="center">
									<input type="number" class="cloned fromZero" name="q10dKidneyDishes_1" id="q10dKidneyDishes_1" min="0"/>
								</section>

							</section>

							<section class="row">
								<section class="left">
									10e. Gallipots
								</section>

								<input type="hidden"  name="q9equipCode_51" id="q9equipCode_51" value="EQP51" />

								<section class="center">
									<input type="number" class="cloned fromZero" name="q10eGallipots_1" id="q10eGallipots_1" min="0"/>
								</section>

							</section>

							<section class="row">
								<section class="left">
									10f. Sponge-holding forceps
								</section>

								<input type="hidden"  name="q9equipCode_52" id="q9equipCode_52" value="EQP52" />
								<section class="center">
									<input type="number" class="cloned fromZero" name="q10fSpongeForceps_1" id="q10fSpongeForceps_1" min="0"/>
								</section>

							</section>

							<section class="row">
								<section class="left">
									10g. Needle holder
								</section>

								<input type="hidden"  name="q9equipCode_53" id="q9equipCode_53" value="EQP53" />

								<section class="center">
									<input type="number" class="cloned fromZero" name="q10gNeedleHolder_1" id="q10gNeedleHolder_1" min="0"/>
								</section>

							</section>

							<section class="row">
								<section class="left">
									10h. Dissecting forceps -toothed
								</section>

								<input type="hidden"  name="q9equipCode_54" id="q9equipCode_54" value="EQP54" />

								<section class="center">
									<input type="number" class="cloned fromZero" name="q10hDissectingForceps_1" id="q10hDissectingForceps_1" min="0"/>
								</section>

							</section>

							<section class="row">
								<section class="left">
									10i. Instrument tray
								</section>

								<input type="hidden"  name="q9equipCode_55" id="q9equipCode_55" value="EQP55" />
								<section class="center">
									<input type="number" class="cloned fromZero" name="q10iInstrumentTray_1" id="q10iInstrumentTray_1" min="0"/>
								</section>

							</section>

							<section class="row-title">
								<section class="left">
									<label class="dcah-label">11. Other Equipment and supplies</label>
								</section>
								<section class="center">
									<label class="dcah-label" style="width:45%">Availability (A)</label>
									<label class="dcah-label" style="float:right;width:45%">Quantity</label>
								</section>

								<section class="right">
									<label class="dcah-label" style="width:45%">Functioning (b)</label>
									<label class="dcah-label" style="float:right;width:45%">Quantity</label>
								</section>
							</section>


							<section class="row" id="tr_17">
								<section class="left">
									11a. Stethoscopes (Adult)
								</section>
								<input type="hidden"  name="q9equipCode_56" id="q9equipCode_56" value="EQP56" />

								<section class="center">
									<select class="cloned left-combo" name="q11aStethoscopesAdult_1" id="q11aStethoscopesAdult_1">
										<option>Yes </option>
										<option>No </option>
									</select>

									<input type="number" class="cloned fromZero" name="q11aNumber_1" id="q11aNumber_1" min="0"/>
								</section>
								<section class="right">
									<select name="q11aFunctioning_1" id="q11aFunctioning_1">
										<option value="" selected="selected">Select One</option>
										<option> Yes </option>
										<option> No </option>
										<option> Do Not Know </option>
									</select>

									<input type="number" class="cloned fromZero" min="0"/>
								</section>

							</section>


							<section class="row" id="tr_18">
								<section class="left">
									11b. Stethoscopes (Paediatric)
								</section>
								<input type="hidden"  name="q9equipCode_57" id="q9equipCode_57" value="EQP57" />

								<section class="center">
									<select class="cloned left-combo" name="q11bStethoscopesNeonatal_1" id="q11bStethoscopesNeonatal_1">
										<option>Yes </option>
										<option>No </option>
									</select>

									<input type="number" class="cloned fromZero" name="q11bNumber_1" id="q11bNumber_1" min="0"/>
								</section>
								<section class="right">


										<option value="" selected="selected">Select One</option>
										<option> Yes </option>
										<option> No </option>
										<option> Do Not Know </option>
									</select>

									<input type="number" class="cloned fromZero" min="0"/>
								</section>

							</section>


							<section class="row" id="tr_19">
								<section class="left">
									11c. BP machine
								</section>
								<input type="hidden"  name="q9equipCode_58" id="q9equipCode_58" value="EQP58" />

								<section class="center">
									<select class="cloned left-combo" name="q11cBPMachine_1" id="q11cBPMachine_1">
										<option>Yes </option>
										<option>No </option>
									</select>

								</section>
								<section class="right">
									<select name="q11cFunctioning_1" id="q11cFunctioning_1">
										<option value="" selected="selected">Select One</option>
										<option> Yes </option>
										<option> No </option>
										<option> Do Not Know </option>
									</select>

								</section>

							</section>

							<section class="row" id="tr_20">
								<section class="left">
									11d.i. Clinical Thermometer
								</section>
								<input type="hidden"  name="q9equipCode_59" id="q9equipCode_59" value="EQP59" />

								<section class="center">
									<select class="cloned left-combo" name="q11dClinicalThermometer_1" id="q11dClinicalThermometer_1">
										<option>Yes </option>
										<option>No </option>
									</select>

									<input type="number" class="cloned fromZero" name="q11dNumber_1" id="q11dNumber_1" min="0"/>
								</section>
								<section class="right">
									<select name="q11dFunctioning_1" id="q11dFunctioning_1">
										<option value="" selected="selected">Select One</option>
										<option> Yes </option>
										<option> No </option>
										<option> Do Not Know </option>
									</select>

									<input type="number" class="cloned fromZero" />
								</section>


								<section class="row" id="tr_21">
									<section class="left">
										11d.ii. Room Thermometer
									</section>
									<input type="hidden"  name="q9equipCode_60" id="q9equipCode_60" value="EQP60" />
									<section class="center">
										<select class="cloned left-combo" name="q11d2ClinicalThermometer_1" id="q11d2ClinicalThermometer_1">

											<option>Yes </option>
											<option>No </option>
										</select>


										<input type="number" class="cloned fromZero" name="q11d2Number_1" id="q11d2Number_1" min="0"/>
									</section>
									<section class="right">
										<select name="q11d2Functioning_1" id="q11d2Functioning_1">
					<option value="" selected="selected">Select One</option>
											<option> Yes </option>
											<option> No </option>
											<option> Do Not Know </option>
										</select>

										<input type="number" class="cloned fromZero" />
									</section>

								</section>

								<section class="row" id="tr_22">
									<section class="left">
										11e. Fetoscope
									</section>
									<input type="hidden"  name="q9equipCode_61" id="q9equipCode_61" value="EQP61" />

									<section class="center">
										<select class="cloned left-combo" name="q11eFetoscope_1" id="q11eFetoscope_1">
											<option>Yes </option>
											<option>No </option>
										</select>

										<input type="number" class="cloned fromZero" name="q11eNumber_1" id="q11eNumber_1" min="0"/>
									</section>
									<section class="right">
										<select name="q11eFunctioning_1" id="q11eFunctioning_1">
											<option value="" selected="selected">Select One</option>
											<option> Yes </option>
											<option> No </option>
											<option> Do Not Know </option>
										</select>

										<input type="number" class="cloned fromZero" />
									</section>

								</section>

								<section class="row" id="tr_23">
									<section class="left">
										11f. Sonicaid
									</section>
									<input type="hidden"  name="q9equipCode_62" id="q9equipCode_62" value="EQP62" />

									<section class="center">
										<select class="cloned left-combo" name="q11fFetoscope_1" id="q11fFetoscope_1">
											<option>Yes </option>
											<option>No </option>
										</select>

										<input type="number" class="cloned fromZero" name="q11fNumber_1" id="q11fNumber_1" min="0"/>
									</section>
									<section class="right">
										<select name="q11fFunctioning_1" id="q11fFunctioning_1">
											<option value="" selected="selected">Select One</option>
											<option> Yes </option>
											<option> No </option>
											<option> Do Not Know </option>
										</select>

										<input type="number" class="cloned fromZero" />
									</section>

								</section>

								<section class="row" id="tr_24">
									<section class="left">
										11g. Suction Machine
									</section>
									<input type="hidden"  name="q9equipCode_63" id="q9equipCode_63" value="EQP63" />

									<section class="center">
										<select class="cloned left-combo" name="q11gSuctionMachine_1" id="q11gSuctionMachine_1">
											<option>Yes </option>
											<option>No </option>
										</select>

										<input type="number" class="cloned fromZero" name="q11gNumber_1" id="q11gNumber_1" min="0"/>
									</section>
									<section class="right">
										<select name="q11gFunctioning_1" id="q11gFunctioning_1">
											<option value="" selected="selected">Select One</option>
											<option> Yes </option>
											<option> No </option>
											<option> Do Not Know </option>
										</select>

										<input type="number" class="cloned fromZero" min="0"/>
									</section>

								</section>


								<section class="row" id="tr_25">
									<section class="left">
										11h. Weighing Scale for babies
									</section>
									<input type="hidden"  name="q9equipCode_64" id="q9equipCode_64" value="EQP64" />

									<section class="center">
										<select class="cloned left-combo" name="q11hWeighingBabies_1" id="q11hWeighingBabies_1">
											<option>Yes </option>
											<option>No </option>
										</select>

										<input type="number" class="cloned fromZero" name="q11hNumber_1" id="q11hNumber_1"/>
										<select name="q11hScaleType_1" id="q11hScaleType_1">
											<option>Digital</option>
											<option>Graduated</option>
										</select>
									</section>
									<section class="right">
										<select name="q11hFunctioning_1" id="q11hFunctioning_1">
											<option value="" selected="selected">Select One</option>
											<option> Yes </option>
											<option> No </option>
											<option> Do Not Know </option>
										</select>

										<input type="number" class="cloned fromZero" min="0" />
									</section>

								</section>


								<section class="row" id="tr_26">
									<section class="left">
										11i. Adult resuscitation tray
									</section>
									<input type="hidden"  name="q9equipCode_65" id="q9equipCode_65" value="EQP65" />

									<section class="center">
										<select class="cloned left-combo" name="q11iAdultResuscitation_1" id="q11iAdultResuscitation_1">
											<option>Yes </option>
											<option>No </option>
										</select>

										<input type="number" class="cloned fromZero" name="q11iNumber_1" id="q11iNumber_1" min="0"/>
									</section>
									<section class="right">
										<select name="q11iFunctioning_1" id="q11iFunctioning_1">
											<option value="" selected="selected">Select One</option>
											<option> Yes </option>
											<option> No </option>
											<option> Do Not Know </option>
										</select>

										<input type="number" class="cloned fromZero" min="0" />
									</section>

								</section>


								<section class="row" id="tr_27">
									<section class="left">
										11j. Indicate the Sterilization Method(s) used or avaialable in this facility
									</section>
									
									<section class="center">
										Sterilization Methods
										<select name="sterilizationMethod" id="sterilizationMethod" class="cloned">

											<option selected="selected" value="">Select One</option>
											<option>Autoclave</option>
											<option>HLD</option>

										</select>
										Others(specify)

										<input type="text" name="q11jOthers_27" id="q11jOthers_27"/>

									</section>
								</section>
							</section>


							<section class="row" id="tr_28">
								<section class="left">
									11k. Indicate if a Manual Vacuum Aspiration kit is available in this unit or else where in the facility
								</section>
								<input type="hidden"  name="q11equipCode_66" id="q11equipCode_66" value="EQP66" />

								<section class="center">
									<select class="cloned left-combo" name="q11kManualVacuum_1" id="q11kManualVacuum_1">
										<option>Yes </option>
										<option>No </option>
									</select>

									<input type="number" class="cloned fromZero" />
								</section>
								<section class="right">
									<select name="q11kFunctioning_1" id="q11kFunctioning_1">
										<option value="" selected="selected">Select One</option>
										<option> Yes </option>
										<option> No </option>
										<option> Do Not Know </option>
									</select>

									<input type="number" class="cloned fromZero" min="0" />

								</section>

							</section>

							<section class="row" id="tr_29">
								<section class="left">
									11l. Indicate the Vacuum Extractors available in this unit/facility
								</section>
								<section class="center">
									<select class="cloned left-combo" name="q11equipCode_67" id="q11equipCode_67">
										<option value="">Select One</option>
										<option value="EQP67">Ventouse </option>
										<option value="EQP68">Kiwi Vacuum Extractor </option>
									</select>

									<input type="number" class="cloned fromZero" name="11lNumbera_1" id="11lNumbera_1" min="0"/>
								</section>
								<section class="right">
									<select name="q11lFunctioning_1" id="q11lFunctioning_1">
										<option value="" selected="selected">Select One</option>
										<option> Yes </option>
										<option> No </option>
										<option> Do Not Know </option>
									</select>

									<input type="number" class="cloned fromZero" name="11lNumberb_1" id="11lNumberb_1" min="0"/>
								</section>

							</section>

							<section class="row" id="tr_30">
								<section class="left">
									11n. Dilatation and curretage kit
								</section>
								<input type="hidden"  name="q11equipCode_68" id="q11equipCode_68" value="EQP69" />
								<section class="center">
									<select class="cloned left-combo" name="q11nDilation_1" id="q11nDilation_1">
										<option>Yes </option>
										<option>No </option>
									</select>

									<input type="number" class="cloned fromZero" name="q11nNumbera_1" id="q11nNumbera_1" min="0"/>
								</section>
								<section class="right">
									<select name="q11nFunctioning_1" id="q11nFunctioning_1">
										<option value="" selected="selected">Select One</option>
										<option> Yes </option>
										<option> No </option>
										<option> Do Not Know </option>
									</select>

									<input type="number" class="cloned fromZero" name="q11nNumberb_1" id="q11nNumberb_1" min="0"/>
								</section>

							</section>

							<section class="row" id="tr_31">
								<section class="left">
									11o. Sterile gauze
								</section>
								<input type="hidden"  name="q11equipCode_69" id="q11equipCode_69" value="EQP70" />
								<section class="center">
									<select class="cloned left-combo" name="q11oSterileGauze_1" id="q11oSterileGauze_1">
										<option>Always Available</option>
										<option>Sometimes Available</option>
										<option>Never Available</option>
									</select>

								</section>
								
								</section>

								<section class="row" id="tr_32">
									<section class="left">
										11p. Sanitary pads
									</section>
									<input type="hidden"  name="q11equipCode_70" id="q11equipCode_70" value="EQP71" />
									<section class="center">
										<select class="cloned left-combo" name="q11pSanitaryPads_1" id="q11pSanitaryPads_1">
											<option>Always Available</option>
											<option>Sometimes Available</option>
											<option>Never Available</option>
										</select>

									</section>

								</section>

								<section class="row" id="tr_33">
									<section class="left">
										11q. Elbow length gloves
									</section>
									<input type="hidden"  name="q11equipCode_71" id="q11equipCode_71" value="EQP72" />
									<section class="center">
										<select class="cloned left-combo" name="q11qElbowGloves_1" id="q11qElbowGloves_1">
											<option>Yes </option>
											<option>No </option>
										</select>

										<input type="number" class="cloned fromZero" name="q11qNumbera_1" id="q11qNumbera_1" min="0"/>
									</section>
									<section class="right">
										<select name="q11qFunctioning_1" id="q11qFunctioning_1">
											<option value="" selected="selected">Select One</option>
											<option> Yes </option>
											<option> No </option>
											<option> Do Not Know </option>
										</select>

										<input type="number" class="cloned fromZero" name="q11qNumberb_1" id="q11qNumberb_1" min="0"/>
									</section>

								</section>

								<section class="row" id="tr_34">
									<section class="left">
										11r. Patellar Hammer
									</section>
									<input type="hidden"  name="q11equipCode_72" id="q11equipCode_72" value="EQP73" />
									<section class="center">
										<select class="cloned left-combo" name="q11rPatellarHammer_1" id="q11rPatellarHammer_1">
											<option>Always Available</option>
											<option>Sometimes Available</option>
											<option>Never Available</option>
										</select>

									</section>
									<section class="right">
										<select name="q11rFunctioning_1" id="q11rFunctioning_1">
											<option value="" selected="selected">Select One</option>
											<option> Yes </option>
											<option> No </option>
											<option> Do Not Know </option>
										</select>

									</section>

								</section>

								<section class="row" id="tr_35">
									<section class="left">
										11s. Sutures
									</section>
									<input type="hidden"  name="q11equipCode_73" id="q11equipCode_73" value="EQP74" />
									<section class="center">
										<select class="cloned left-combo" name="q11qSutures_1" id="q11qSutures_1">
											<option>Yes </option>
											<option>No </option>
										</select>

										<input type="number" class="cloned fromZero" name="q11sNumbera_1" id="q11sNumbera_1" min="0"/>
										<!--select>
											<option>Nylon</option>
										</select-->
									</section>
									<section class="right">
										<select name="q11sFunctioning_1" id="q11sFunctioning_1">
											<option value="" selected="selected">Select One</option>
											<option> Yes </option>
											<option> No </option>
											<option> Do Not Know </option>
										</select>

										<input type="number" class="cloned fromZero" name="q11sNumberb_1"  id="q11sNumberb_1" min="0"/>
									</section>

								</section>

								<section class="row" id="tr_36">
									<section class="left">
										11s.i. Oxygen-Cylinder
									</section>
									<input type="hidden"  name="q11equipCode_74" id="q11equipCode_74" value="EQP75" />
									<section class="center">
										<select class="cloned left-combo" name="q11sOxygena_1" id="q11sOxygena_1">
											<option>Always Available</option>
											<option>Sometimes Available</option>
											<option>Never Available</option>
										</select>

										<input type="number" class="cloned fromZero" name="q12sNumber_1" id="q12sNumber_1" min="0"/>
									</section>

								</section>

								<section class="row" id="tr_37">
									<section class="left">
										11s.ii. Oxygen-Concentrator
									</section>
									<input type="hidden"  name="q11equipCode_75" id="q11equipCode_75" value="EQP76" />
									<section class="center">
										<select class="cloned left-combo" name="q11s2Oxygena_1" id="q11s2Oxygena_1">
											<option>Always Available</option>
											<option>Sometimes Available</option>
											<option>Never Available</option>
										</select>

										<input type="number" class="cloned fromZero" name="q11s2Number_1" id="q11s2Number_1" min="0"/>
									</section>

								</section>

							</section>
							<section class="column-wide">

								<section class="row-title">
									<section class="left">
										<label class="dcah-label">12. Medications in the Maternity/Labour ward</label>
									</section>
									<section class="center">
										<label class="dcah-label">Availability</label>
										<label class="dcah-label" style="float:right;width:45%">Quantity</label>
									</section>

								</section>

								<section class="row" id="tr_38">
									<section class="left">
										12a.i. Injectable-Oxytocin
									</section>
									<input type="hidden"  name="mnhCommodityName_1" id="mnhCommodityName_1" value="Injectable-Oxytocin" />

									<section class="center">
										<select class="cloned left-combo" name="q12aInjectableOxytocina_1" id="q12aInjectableOxytocinb_1">
											<option>Always Available</option>
											<option>Sometimes Available</option>
											<option>Never Available</option>
										</select>

										<input type="number" class="cloned fromZero" name="q12aNumber_1" id="q12aNumber_1" min="0"/>
									</section>

								</section>


								<section class="row" id="tr_39">
									<section class="left">
										12a.ii. Injectable-Syntocin
									</section>
									<input type="hidden"  name="mnhCommodityName_2" id="mnhCommodityName_2" value="Injectable-Syntocin" />
									<section class="center">
										<select class="cloned left-combo" name="q12a2InjectableOxytocina_1" id="q12a2InjectableOxytocinb_1">

											<option>Always Available</option>
											<option>Sometimes Available</option>
											<option>Never Available</option>
										</select>


										<input type="number" class="cloned fromZero" name="q12a2Number_1" id="q12a2Number_1" min="0"/>

									</section>

								</section>


								<section class="row" id="tr_40">
									<section class="left">
										12b.i. Indicate the available Intravenous solutions
									</section>
									<input type="hidden"  name="mnhCommodityName_3" id="mnhCommodityName_3" />
									<section class="center">
										<select class="cloned left-combo" name="q12bIntravenousSolutionsb_1" id="q12bIntravenousSolutionsb_1">
											<option value="Intravenous solution-Ringers Lactate">Ringers Lactate</option>
											<option value="Intravenous solution-D5NS">D5NS</option>
											<option value="Intravenous solution-NS Infusion">NS Infusion</option>

										</select>
										<input type="number" class="cloned fromZero" name="q12bNumber_1" id="q12bNumber_1" min="0"/>
									</section>

								</section>


								<section class="row" id="tr_41">
									<section class="left">
										12b.ii. Intravenous Metronidazole
									</section>
									<input type="hidden"  name="mnhCommodityName_4" id="mnhCommodityName_4" value="Intravenous Metronidazole"/>
									<section class="center">
										<select class="cloned left-combo" name="q12b2IntravenousSolutionsb_1" id="q12b2IntravenousSolutionsb_1">

											<option>Always Available</option>
											<option>Sometimes Available</option>
											<option>Never Available</option>
										</select>

										<input type="number" class="cloned fromZero" name="q12b2Number_1" id="q12b2Number_1" min="0"/>
			</section>

								</section>


								<section class="row" id="tr_42">
									<section class="left">
										12c. Injectable methergine
									</section>
									<input type="hidden"  name="mnhCommodityName_5" id="mnhCommodityName_5" value="Injectable methergine"/>

									<section class="center">
										<select class="cloned left-combo" name="q12cIntectableErgomtrine_1" id="q12cIntectableErgomtrine_1">
											<option>Always Available</option>
											<option>Sometimes Available</option>
											<option>Never Available</option>
										</select>
										<input type="number" class="cloned fromZero" name="q12cNumber_1" id="q12cNumber_1" min="0"/>
									</section>

								</section>


								<section class="row" id="tr_43">
									<section class="left">
										12d. Injectable
									</section>
									<input type="hidden"  name="mnhCommodityName_6" id="mnhCommodityName_6"/>

									<section class="center">
										<select class="cloned left-combo" name="q12dInjectableHydralazinea_1" id="q12dInjectableHydralazinea_1">
											<option>Always Available</option>
											<option>Sometimes Available</option>
											<option>Never Available</option>
										</select>
										<select class="cloned left-combo" name="q12dInjectableHydralazineb_1" id="q12dInjectableHydralazineb_1">

											<option value="Injectable Hydralazine">Hydralazine</option>
											<option value="Injectable Apresoline">Apresoline</option>

										</select>
										<input type="number" class="cloned fromZero" name="q12dNumber_1" id="q12dNumber_1" min="0"/>
									</section>

								</section>


								<section class="row" id="tr_44">
									<section class="left">
										12e. Injectable diazepam
									</section>
									<input type="hidden"  name="mnhCommodityName_7" id="mnhCommodityName_7" value="Injectable diazepam"/>

									<section class="center">
										<select class="cloned left-combo" name="q12eInjectableDiazepam_1" id="q12eInjectableDiazepam_1">
											<option>Always Available</option>
											<option>Sometimes Available</option>
											<option>Never Available</option>
										</select>
										<input type="number" class="cloned fromZero" name="q12eNumber_1" id="q12eNumber_1" min="0"/>
									</section>

								</section>


								<section class="row" id="tr_45">
									<section class="left">
										12f. Injectable magnesium sulfate
									</section>
									<input type="hidden"  name="mnhCommodityName_8" id="mnhCommodityName_8" value="Injectable magnesium sulfate"/>

									<section class="center">
										<select class="cloned left-combo" name="q12fInjectableMagnesium_1" id="q12fInjectableMagnesium_1">
											<option>Always Available</option>
											<option>Sometimes Available</option>
											<option>Never Available</option>
										</select>
										<input type="number" class="cloned fromZero" name="q12fNumber_1" id="q12fNumber_1" min="0"/>
									</section>

								</section>


								<section class="row" id="tr_46">
									<section class="left">
										12g. Injectable amoxicillin or ampicillin
									</section>
									<input type="hidden"  name="mnhCommodityName_9" id="mnhCommodityName_9"/>

									<section class="center">
										<select class="cloned left-combo" name="q12gInjectableAmoxicillina_1" id="q12gInjectableAmoxicillina_1">
											<option>Always Available</option>
											<option>Sometimes Available</option>
											<option>Never Available</option>
										</select>
										<p></p>
										<select class="cloned left-combo" name="q12gInjectableAmoxicillinb_1" id="q12gInjectableAmoxicillinb_1">

											<option value="Injectable amoxicillin">Amoxicillin </option>
											<option value="Injectable ampicillin">Ampicillin</option>

										</select>

										<input type="number" class="cloned fromZero" name="q12gNumber_1" id="q12gNumber_1" min="0" />
									</section>

								</section>


								<section class="row" id="tr_47">
									<section class="left">
										12h. Injectable gentamicin
									</section>
									<input type="hidden"  name="mnhCommodityName_10" id="mnhCommodityName_10" value="Injectable gentamicin"/>

									<section class="center">
										<select class="cloned left-combo" name="q12hInjectableGentamicin_1" id="q12hInjectableGentamicin_1">
											<option>Always Available</option>
											<option>Sometimes Available</option>
											<option>Never Available</option>
										</select>
										<input type="number" class="cloned fromZero" name="q12hNumber_1" id="q12hNumber_1" min="0"/>
									</section>

								</section>


								<section class="row" id="tr_48">
									<section class="left">
										12i. Calcium gluconate
									</section>
									<input type="hidden"  name="mnhCommodityName_11" id="mnhCommodityName_11" value="Calcium gluconate"/>

									<section class="center">
										<select class="cloned left-combo" name="q12iCalciumGluconate_1" id="q12iCalciumGluconate_1">
											<option>Always Available</option>
											<option>Sometimes Available</option>
											<option>Never Available</option>
										</select>
										<input type="number" class="cloned fromZero" name="q12iNumber_1" id="q12iNumber_1" min="0"/>
									</section>

								</section>


								<section class="row" id="tr_49">
									<section class="left">
										12j. Methyldopa/Aldomet
									</section>
									<input type="hidden"  name="mnhCommodityName_12" id="mnhCommodityName_12" value="Methyldopa/Aldomet"/>

									<section class="center">
										<select class="cloned left-combo" name="q12jMethyldopa_1" id="q12jMethyldopa_1">
											<option>Always Available</option>
											<option>Sometimes Available</option>
											<option>Never Available</option>
										</select>
										<input type="number" class="cloned fromZero" name="q12jNumber_1" id="q12jNumber_1" min="0"/>
									</section>

								</section>


								<section class="row" id="tr_50">
									<section class="left">
										12k. Lidocaine (lignocaine) or other local anesthetic
									</section>
									<input type="hidden"  name="mnhCommodityName_13" id="mnhCommodityName_13" value="Lidocaine(lignocaine)/other local anesthetic"/>

									<section class="center">
										<select class="cloned left-combo" name="q12kLidocaine_1" id="q12kLidocaine_1">
											<option>Always Available</option>
											<option>Sometimes Available</option>
											<option>Never Available</option>
										</select>
										<input type="number" class="cloned fromZero" name="q12kNumber_1" id="q12kNumber_1" min="0"/>
									</section>

								</section>


								<section class="row" id="tr_51">
									<section class="left">
										12l. Nifedipine Tablets
									</section>
									<input type="hidden"  name="mnhCommodityName_14" id="mnhCommodityName_14" value="Nifedipine Tablets"/>

									<section class="center">
										<select class="cloned left-combo" name="q12lNifedipine_1" id="q12lNifedipine_1">
											<option>Always Available</option>
											<option>Sometimes Available</option>
											<option>Never Available</option>
										</select>
										<input type="number" class="cloned fromZero" name="q12lNumber_1" id="q12lNumber_1" min="0"/>
									</section>

								</section>


								<section class="row" id="tr_52">
									<section class="left">
										12m. Vitamin A
									</section>
									<input type="hidden"  name="mnhCommodityName_15" id="mnhCommodityName_15" value="Vitamin A"/>

									<section class="center">
										<select class="cloned left-combo" name="q12mVitaminA_1" id="q12mVitaminA_1">
											<option>Always Available</option>
											<option>Sometimes Available</option>
											<option>Never Available</option>
										</select>
										<input type="number" class="cloned fromZero" name="q12mNumber_1" id="q12mNumber_1" min="0"/>
									</section>

								</section>


								<section class="row" id="tr_53">
									<section class="left">
										12n. Vitamin K
									</section>
									<input type="hidden"  name="mnhCommodityName_16" id="mnhCommodityName_16" value="Vitamin K"/>

									<section class="center">
										<select class="cloned left-combo" name="q12nVitaminK_1" id="q12nVitaminK_1">
											<option>Always Available</option>
											<option>Sometimes Available</option>
											<option>Never Available</option>
										</select>
										<input type="number" class="cloned fromZero" name="q12nNumber_1" id="q12nNumber_1" min="0"/>
									</section>

								</section>

								<h3>New-Born Care</h3>
								<section class="row">
									<section class="row-title">
										<section class="left">
											<label class="dcah-label">QUESTION</label>
										</section>
										<section class="center">
											<label class="dcah-label">ANSWER</label>
										</section>
									</section>
								</section>
								<section class="left">
									13. Does this facility perform newborn resuscitation?
								</section>
								<section class="right">

									<select name="nbcgqnewBornResuscitated" id="nbcgqnewBornResuscitated" class="cloned">

										<option value="" selected="selected">Select One</option>
										<option> Yes </option>
										<option> No </option>
									</select>
								</section>

								<section class="row-title">
									<section class="left">
										<label class="dcah-label">14. EQUIPMENT AND SUPPLIES FOR NEWBORN CARE</label>
									</section>
									<section class="center">
										<label class="dcah-label" style="width:45%">Availability (A)</label>
										<label class="dcah-label" style="float:right;width:45%">Quantity</label>
									</section>
									<section class="center">
										<label class="dcah-label" style="width:45%">Functioning (b)</label>
										<label class="dcah-label" style="float:right;width:45%">Quantity</label>
									</section>
									<section class="center">

									</section>
								</section>


								<section class="row" id="tr_54">
									<section class="left">
										14a. Self inflating Neonatal Ambu bag ( 500 mls)
									</section>
									<input type="hidden"  name="q11equipCode_76" id="q11equipCode_76" value="EQP78" />

									<section class="center">
										<select class="cloned left-combo" name="q14aYA_1" id="q14aYA_1">
											<option>Yes </option>
											<option>No </option>
										</select>

										<input type="number" class="cloned fromZero" name="q14aNumber_1" id="q14aNumber_1" min="0"/>
									</section>
									<section class="right">
										<select name="q14aFunctioning_1" id="q14aFunctioning_1">
											<option value="" selected="selected">Select One</option>
											<option> Yes </option>
											<option> No </option>
											<option> Do Not Know </option>
										</select>

										<input type="number" class="cloned fromZero" />
									</section>

								</section>


								<section class="row" id="tr_55">
									<section class="left">
										14b.i. Infant masks-Size 0
									</section>
									<input type="hidden"  name="q11equipCode_77" id="q11equipCode_77" value="EQP79" />

									<section class="center">
										<select class="cloned left-combo" name="q14bYA_1" id="q14bYA_1">
											<option>Always Available</option>
											<option>Sometimes Available</option>
											<option>Never Available</option>
										</select>

										<input type="number" class="cloned fromZero" name="q14bNumber_1" id="q14bNumber_1" min="0"/>

									</section>

								</section>


								<section class="row" id="tr_56">
									<section class="left">
										14b.ii. Infant masks-Size 1
									</section>
									<input type="hidden"  name="q11equipCode_78" id="q11equipCode_78" value="EQP80" />
									<section class="center">
										<select class="cloned left-combo" name="q14b2YA_1" id="q14b2YA_1">

											<option>Always Available</option>
											<option>Sometimes Available</option>
											<option>Never Available</option>
										</select>


										<input type="number" class="cloned fromZero" name="q14b2Number_1" id="q14b2Number_1" min="0"/>


									</section>

								</section>


								<section class="row" id="tr_57">
									<section class="left">
										14b.iii. Infant masks-Size 2
									</section>
									<input type="hidden"  name="q11equipCode_79" id="q11equipCode_79" value="EQP81" />
									<section class="center">
										<select class="cloned left-combo" name="q14b3YA_1" id="q14b3YA_1">

											<option>Always Available</option>
											<option>Sometimes Available</option>
											<option>Never Available</option>
										</select>


										<input type="number" class="cloned fromZero" name="q14b3Number_1" id="q14b3Number_1" min="0"/>


									</section>

								</section>
								<section class="row">
									<h3> Neonatal Unit</h3>
								</section>

								<section class="row" id="tr_58">
									<section class="left">
										14c. Clock  with seconds arm
									</section>
									<input type="hidden"  name="q11equipCode_80" id="q11equipCode_80" value="EQP82" />

									<section class="center">
										<select class="cloned left-combo" name="q14cYA_1" id="q14cYA_1">
											<option>Yes </option>
											<option>No </option>
										</select>

									</section>

								</section>


								<section class="row" id="tr_59">
									<section class="left">
										14d. Neonatal Incubator
									</section>
									<input type="hidden"  name="q14equipCode_81" id="q14equipCode_81" value="EQP83" />

									<section class="center">
										<select class="cloned left-combo" name="q14dYA_1" id="q14dYA_1">
											<option>Yes </option>
											<option>No </option>
										</select>
										<input type="number" class="cloned fromZero" name="q14dNumber_1" id="q14dNumber_1" min="0"/>
									</section>
									<section class="right">
										<select name="q14dFunctioning_1" id="q14dFunctioning_1">
											<option value="" selected="selected">Select One</option>
											<option> Yes </option>
											<option> No </option>
											<option> Do Not Know </option>
										</select>

										<input type="number" class="cloned fromZero" />
									</section>
								</section>


								<section class="row" id="tr_60">
									<section class="left">
										14e. A Radiant Heater
									</section>
									<input type="hidden"  name="q14equipCode_82" id="q14equipCode_82" value="EQP84" />

									<section class="center">
										<select class="cloned left-combo" name="q14eYA_1" id="q14eYA_1">
											<option>Yes </option>
											<option>No </option>
										</select>

									</section>
									<section class="right">
										<select name="q14eFunctioning_1" id="q14eFunctioning_1">
											<option value="" selected="selected">Select One</option>
											<option> Yes </option>
											<option> No </option>
											<option> Do Not Know </option>
										</select>

										<input type="number" class="cloned fromZero" min="0" />
									</section>
								</section>


								<section class="row" id="tr_61">
									<section class="left">
										14f. Infant Scale
									</section>
									<input type="hidden"  name="q14equipCode_83" id="q14equipCode_83" value="EQP85" />

									<section class="center">
										<select class="cloned left-combo" name="q14fYA_1" id="q14fYA_1">
											<option>Yes </option>
											<option>No </option>
										</select>
										<input type="number" class="cloned fromZero" name="q14fNumbera_1" id="q14fNumbera_1" min="0" />
									</section>
									<section class="right">
										<select name="q14fFunctioning_1" id="q14fFunctioning_1">
											<option value="" selected="selected">Select One</option>
											<option> Yes </option>
											<option> No </option>
											<option> Do Not Know </option>
										</select>

										<input type="number" class="cloned fromZero"  name="q14fNumberb_1" id="q14fNumberb_1" min="0" />

									</section>
								</section>


								<section class="row" id="tr_62">
									<section class="left">
										14g. Suction bulb for mucus extraction
									</section>
									<input type="hidden"  name="q14equipCode_84" id="q14equipCode_84" value="EQP86" />

									<section class="center">
										<select class="cloned left-combo" name="q14gYA_1" id="q14gYA_1">
											<option>Yes </option>
											<option>No </option>
										</select>

										<input type="number" class="cloned fromZero" name="q14gNumbera_1" id="q14gNumbera_1" min="0" />
									</section>
									<section class="right">

										<select name="q14gFunctioning_1" id="q14gFunctioning_1">
											<option value="" selected="selected">Select One</option>
											<option> Yes </option>
											<option> No </option>
											<option> Do Not Know </option>
										</select>


										<input type="number" class="cloned fromZero" name="q14gNumberb_1" id="q14gNumberb_1" min="0" />

									</section>
								</section>

						<section class="row" id="tr_63">
									<section class="left">
										14h. Suction apparatus for use with catheter
									</section>
									<input type="hidden"  name="q14equipCode_85" id="q14equipCode_85" value="EQP87" />

									<section class="center">
										<select class="cloned left-combo" name="q14jYA_1" id="q14jYA_1">
											<option>Yes </option>
											<option>No </option>
										</select>

										<input type="number" class="cloned fromZero" name="q14hNumbera_1" id="q14hNumbera_1" min="0" />
									</section>
									<section class="right">
										<select name="q14jFunctioning_1" id="q14jFunctioning_1">
											<option value="" selected="selected">Select One</option>
											<option> Yes </option>
											<option> No </option>
											<option> Do Not Know </option>
										</select>

										<input type="number" class="cloned fromZero" name="q14hNumberb_1" id="q14hNumberb_1" min="0" />
									</section>
								</section>


								<section class="row" id="tr_64">
									<section class="left">
										14i. A flat, clean, dry and warm newborn resuscitation surface
									</section>
									<input type="hidden"  name="q14equipCode_86" id="q14equipCode_86" value="EQP88" />

									<section class="center">
										<select class="cloned left-combo" name="q14iYA_1" id="q14iYA_1">
											<option>Yes </option>
											<option>No </option>
										</select>

									</section>

								</section>


								<section class="row" id="tr_65">
									<section class="left">
										14j. Disposable cord ties or clamps
									</section>
									<input type="hidden"  name="q14equipCode_87" id="q14equipCode_87" value="EQP89" />

									<section class="center">
										<select class="cloned left-combo" name="q14jDisposableCord_1" id="q14jDisposableCord_1">
											<option>Select One</option>
											<option>Yes</option>
											<option>No</option>
										</select>

									</section>
									<section class="right">
										<select name="q14jNumber_1" id="q14jFunctioning_1" min="0" >
											<option>Always Available</option>
											<option>Sometimes Available</option>
											<option>Never Available</option>
										</select>

									</section>
								</section>


								<section class="row" id="tr_66">
									<section class="left">
										14k. Clean and warm towels/cloths for drying / warming / wrapping baby
									</section>
									<input type="hidden"  name="q14equipCode_88" id="q14equipCode_88" value="EQP90" />

									<section class="center">
										<select class="cloned left-combo" name="q14kCleanTowels_1" id="q14kCleanTowels_1">
											<option>Select One</option>
											<option>Yes</option>
											<option>No</option>

										</select>

									</section>
									<section class="right">
										<select name="q14kFunctioning_1" id="q14kFunctioning_1">
											<option>Always Available</option>
											<option>Sometimes Available</option>
											<option>Never Available</option>
										</select>

									</section>
								</section>

								<section class="row-title">
									<section class="left">
										<label class="dcah-label">QUESTION</label>
									</section>
									<section class="center">
										<label class="dcah-label">ANSWER</label>
									</section>
								</section>

								<section class="row">
									<section class="left">
										15. Does this facility perform blood transfusions?
									</section>
									<section class="center">

										<select name="nbcgqBloodTransfusionsDone" class="cloned">

											<option>Yes</option>
											<option>No</option>
										</select>
									</section>
									<section class="right">
										<label for="q15BloodTransfusions_2">Specify:</label>

										<select name="nbcgqBloodBank" class="cloned">
											<option selected="selected" value="">Select One</option>

											<option>Blood Bank available</option>
											<option>Transfusions done but no blood bank</option>
										</select>
									</section>
								</section>

								<section class="row">
									<section class="left">
										17. Does this facility ever perform caesarean sections?
									</section>
									<section class="center">

										<select name="nbcgqCSDone" class="cloned">
											<option selected="selected" value="">Select One</option>

											<option> Yes</option>
											<option> No</option>
										</select>
									</section>
									<section class="row hide" style="display:true">
										<section class="left" >
											<label class="dcah-label"> If Yes, how many caesarean sections were performed in September 2012</label>
										</section>
										<section class="right">
											<section class="col">

												<input type="number" class="cloned fromZero" name="nbcgqNoOfDone" id="nbcgqNoOfDone"  value=""/>

											</section>
										</section>
									</section>
								</section>
								<section class="hide-level" style="display: true">
									<section class="row">
										<h3>Complete this section for Level 4, 5 and 6 Facilities</h3>
									</section>

									<section class="row">
										<section class="row-title">
											<section class="left">
												<label class="dcah-label">Supply/Equipment</label>
											</section>
											<section class="center">
												<label class="dcah-label" style="width:45%">Availability (A)</label>
												<label class="dcah-label" style="float:right;width:45%">Quantity</label>
											</section>
											<section class="right">
												<label class="dcah-label" style="width:45%">Functioning/Status (b)</label>
												<label class="dcah-label" style="float:right;width:45%">Quantity</label>
											</section>
										</section>


										<section class="row" id="tr_67">
										<section class="left">
											18a. Operating Table
										</section>
										<input type="hidden"  name="q18equipCode_89" id="q18equipCode_89" value="EQP91" />

										<section class="center">
											<select class="cloned left-combo" name="" id="">
												<option>Yes </option>
												<option>No </option>
											</select>

											<input type="number" class="cloned fromZero" />
										</section>
										<section class="center">
											<select>
												<option value="" selected="selected">Select One</option>
												<option> Yes </option>
												<option> No </option>
												<option> Dont Know </option>
											</select>

											<input type="number" class="cloned fromZero" />
										</section>

									</section>


									<section class="row" id="tr_68">


										<section class="left">
											18b. Operating Light
										</section>

										<input type="hidden"  name="q18equipCode_90" id="q18equipCode_90" value="EQP92" />

										<section class="center">
											<select class="cloned left-combo" name="" id="">
												<option>Yes </option>
												<option>No </option>
											</select>

											<input type="number" class="cloned fromZero" />
										</section>
										<section class="center">
											<select>
												<option value="" selected="selected">Select One</option>
												<option> Yes </option>
												<option> No </option>
												<option> Dont Know </option>
											</select>

											<input type="number" class="cloned fromZero" />
										</section>
									</section>


									<section class="row" id="tr_69">
										<section class="left">
											18c. Anaesthetic machine
										</section>
										<input type="hidden"  name="q18equipCode_91" id="q18equipCode_91" value="EQP93" />

										<section class="center">
											<select class="cloned left-combo" name="" id="">
												<option>Yes </option>
												<option>No </option>
											</select>

											<input type="number" class="cloned fromZero" />
										</section>
										<section class="center">
											<select>
												<option value="" selected="selected">Select One</option>
												<option> Yes </option>
												<option> No </option>
												<option> Dont Know </option>
											</select>

											<input type="number" class="cloned fromZero" />
										</section>
									</section>


									<section class="row" id="tr_70">
										<section class="left">
											18d. Laryngoscopes
										</section>
										<input type="hidden"  name="q18equipCode_92" id="q18equipCode_92" value="EQP94" />

										<section class="center">
											<select class="cloned left-combo" name="" id="">
												<option>Yes </option>
												<option>No </option>
											</select>

											<input type="number" class="cloned fromZero" />
										</section>
										<section class="center">
											<select>
												<option value="" selected="selected">Select One</option>
												<option> Yes </option>
												<option> No </option>
												<option> Dont Know </option>
											</select>

											<input type="number" class="cloned fromZero" />
										</section>
									</section>


									<section class="row" id="tr_71">
										<section class="left">
											18e. Endotracheal tubes
										</section>
										<input type="hidden"  name="q18equipCode_93" id="q18equipCode_93" value="EQP95" />

										<section class="center">
											<select class="cloned left-combo" name="" id="">
												<option>Yes </option>
												<option>No </option>
											</select>

											<input type="number" class="cloned fromZero" />
										</section>
										<section class="center">
											<select>
												<option value="" selected="selected">Select One</option>
												<option> Yes </option>
												<option> No </option>
												<option> Dont Know </option>
											</select>

											<input type="number" class="cloned fromZero" />
										</section>
									</section>


									<section class="row" id="tr_72">
										<section class="left">
											18f. Anaesthetic drugs e.g ketamine
										</section>
										<input type="hidden"  name="q18equipCode_94" id="q18equipCode_94" value="EQP96" />

										<section class="center">
											<select class="cloned left-combo" name="" id="">
												<option>Yes </option>
												<option>No </option>
											</select>

											<input type="number" class="cloned fromZero" />
										</section>
										<section class="center">
											<select>
												<option value="" selected="selected">Select One</option>
												<option>Always Available</option>
												<option>Sometimes Available</option>
												<option>Never Available</option>
											</select>

											<input type="number" class="cloned fromZero" />
										</section>
									</section>


									<section class="row" id="tr_73">
										<section class="left">
											18g. Anaesthetic gases (halothane, NO2, Oxygen, etc)
										</section>
										<input type="hidden"  name="q18equipCode_95" id="q18equipCode_95" value="EQP97" />

										<section class="center">
											<select class="cloned left-combo" name="" id="">
												<option>Yes </option>
												<option>No </option>
											</select>

											<input type="number" class="cloned fromZero" />
										</section>
										<section class="center">
											<select>
												<option value="" selected="selected">Select One</option>
												<option>Always Available</option>
												<option>Sometimes Available</option>
												<option>Never Available</option>
											</select>

											<input type="number" class="cloned fromZero" />
										</section>
									</section>


									<section class="row" id="tr_74">
										<section class="left">
											18h. Drugs and supplies for spinal anesthesia (e.g. Spinal needle)
										</section>
										<input type="hidden"  name="q18equipCode_96" id="q18equipCode_96" value="EQP98" />

										<section class="center">
											<select class="cloned left-combo" name="" id="">
												<option>Yes </option>
												<option>No </option>
											</select>

											<input type="number" class="cloned fromZero" />
										</section>
										<section class="center">
											<select>
												<option value="" selected="selected">Select One</option>
												<option>Always Available</option>
												<option>Sometimes Available</option>
												<option>Never Available</option>
											</select>

											<input type="number" class="cloned fromZero" />
										</section>
									</section>


									<section class="row" id="tr_75">
										<section class="left">
											18i. Scrub area adjacent to or in the operating room
										</section>
										<input type="hidden"  name="q18equipCode_97" id="q18equipCode_97" value="EQP99" />

										<section class="center">
											<select class="cloned left-combo" name="" id="">
												<option>Yes </option>
												<option>No </option>
											</select>

											<input type="number" class="cloned fromZero" />
										</section>
										<section class="center">
											<select>
												<option value="" selected="selected">Select One</option>
												<option> Yes </option>
												<option> No </option>
												<option> Dont Know </option>
											</select>

											<input type="number" class="cloned fromZero" />
										</section>
									</section>


									<section class="row" id="tr_76">
										<section class="left">
											18j. Running Water
										</section>
										<input type="hidden"  name="q18equipCode_98" id="q18equipCode_98" value="EQP100" />

										<section class="center">
											<select class="cloned left-combo" name="" id="">
												<option>Yes </option>
												<option>No </option>
											</select>

											<input type="number" class="cloned fromZero" />
										</section>
										<section class="center">
											<select>
												<option value="" selected="selected">Select One</option>
												<option> Yes </option>
												<option> No </option>
												<option> Dont Know </option>
											</select>

											<input type="number" class="cloned fromZero" />
										</section>
									</section>


									<section class="row" id="tr_77">
										<section class="left">
											18k. Suction Machine
										</section>
										<input type="hidden"  name="q18equipCode_99" id="q18equipCode_99" value="EQP101" />

										<section class="center">
											<select class="cloned left-combo" name="" id="">
												<option>Yes </option>
												<option>No </option>
											</select>

											<input type="number" class="cloned fromZero" />
										</section>
										<section class="center">
											<select>
												<option value="" selected="selected">Select One</option>
												<option> Yes </option>
												<option> No </option>
												<option> Dont Know </option>
											</select>

											<input type="number" class="cloned fromZero" />
										</section>
									</section>


									<section class="row" id="tr_78">
										<section class="left">
											18l. Standard Cesaerian section kit
										</section>
										<input type="hidden"  name="q18equipCode_100" id="q18equipCode_100" value="EQP102" />

										<section class="center">
											<select class="cloned left-combo" name="" id="">
												<option>Yes </option>
												<option>No </option>
											</select>

											<input type="number" class="cloned fromZero" />
										</section>
										<section class="center">
											<select>
												<option value="" selected="selected">Select One</option>
												<option> Yes </option>
												<option> No </option>
												<option> Dont Know </option>
											</select>

											<input type="number" class="cloned fromZero" />
										</section>
									</section>


									<section class="row" id="tr_79">
										<section class="left">
											18m. Sterile operation gowns
										</section>
										<input type="hidden"  name="q18equipCode_101" id="q18equipCode_101" value="EQP103" />

										<section class="center">
											<select class="cloned left-combo" name="" id="">
												<option>Yes </option>
												<option>No </option>
											</select>

											<input type="number" class="cloned fromZero" />
										</section>
										<section class="center">
											<select>
												<option value="" selected="selected">Select One</option>
												<option> Yes </option>
												<option> No </option>
												<option> Dont Know </option>
											</select>

											<input type="number" class="cloned fromZero" />
										</section>
									</section>


									<section class="row" id="tr_80">
										<section class="left">
											18n. Sterile Drapes
										</section>
										<input type="hidden"  name="q18equipCode_102" id="q18equipCode_102" value="EQP104" />

										<section class="center">
											<select class="cloned left-combo" name="" id="">
												<option>Yes </option>
												<option>No </option>
											</select>

											<input type="number" class="cloned fromZero" />
										</section>
										<section class="center">
											<select>
												<option value="" selected="selected">Select One</option>
												<option> Yes </option>
												<option> No </option>
												<option> Dont Know </option>
											</select>

											<input type="number" class="cloned fromZero" />
										</section>
									</section>


									<section class="row" id="tr_81">
										<section class="left">
											18o. Sterile gloves in various sizes
										</section>
										<input type="hidden"  name="q18equipCode_103" id="q18equipCode_103" value="EQP105" />

										<section class="center">
											<select class="cloned left-combo" name="" id="">
												<option>Yes </option>
												<option>No </option>
											</select>
											<label>Sizes (Hold down Ctrl and click to select many)</label>
											<select multiple="multiple" name="sterileGloveSizes[]">

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

											<input type="number" class="cloned fromZero" />
										</section>
										<section class="center">
											<select>
												<option value="" selected="selected">Select One</option>
												<option> Yes </option>
												<option> No </option>
												<option> Dont Know </option>
											</select>

											<input type="number" class="cloned fromZero" />
										</section>
									</section>


									<section class="row" id="tr_82">
										<section class="left">
											18p. IV canulas
										</section>
										<input type="hidden"  name="q18equipCode_104" id="q18equipCode_104" value="EQP106" />

										<section class="center">
											<select class="cloned left-combo" name="" id="">
												<option>Yes </option>
												<option>No </option>
											</select>

											<input type="number" class="cloned fromZero" />
										</section>
										<section class="center">
											<select>
												<option value="" selected="selected">Select One</option>
												<option> Yes </option>
												<option> No </option>
												<option> Dont Know </option>
											</select>

											<input type="number" class="cloned fromZero" />
										</section>
									</section>


									<section class="row" id="tr_83">
										<section class="left">
											18q. Drip Stand
										</section>
										<input type="hidden"  name="q18equipCode_105" id="q18equipCode_105" value="EQP107" />

										<section class="center">
											<select class="cloned left-combo" name="" id="">
												<option>Yes </option>
												<option>No </option>
											</select>

											<input type="number" class="cloned fromZero" />
										</section>
										<section class="center">
											<select>
												<option value="" selected="selected">Select One</option>
												<option> Yes </option>
												<option> No </option>
												<option> Dont Know </option>
											</select>

											<input type="number" class="cloned fromZero" />
										</section>
									</section>


									<section class="row" id="tr_84">
										<section class="left">
											18r. Blood transfusion set
										</section>
										<input type="hidden"  name="q18equipCode_106" id="q18equipCode_106" value="EQP108" />

										<section class="center">
											<select class="cloned left-combo" name="" id="">
												<option>Yes </option>
												<option>No </option>
											</select>

											<input type="number" class="cloned fromZero" />
										</section>
										<section class="center">
											<select>
												<option value="" selected="selected">Select One</option>
												<option> Yes </option>
												<option> No </option>
												<option> Dont Know </option>
											</select>

											<input type="number" class="cloned fromZero" />
										</section>
									</section>


									<section class="row" id="tr_85">
										<section class="left">
											18s. Recovery room/ recovery area
										</section>
										<input type="hidden"  name="q18equipCode_107" id="q18equipCode_107" value="EQP109" />

										<section class="center">
											<select class="cloned left-combo" name="" id="">
												<option>Yes </option>
												<option>No </option>
											</select>

											<input type="number" class="cloned fromZero" />
										</section>
										<section class="center">
											<select>
												<option value="" selected="selected">Select One</option>
												<option> Yes </option>
												<option> No </option>
												<option> Dont Know </option>
											</select>

											<input type="number" class="cloned fromZero" />
										</section>
									</section>
									<label class="dcah-label" style="text-align:center">End of Questionnaire</label>
								</section>



							</section>
						</form>';
		$data['form'] = $form_mnh_assessment;
		$data['form_id'] = 'form_mnh_assessment';

		$this -> load -> view('form', $data);

	}

}