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
<<<<<<< HEAD
//print 'mfc: '.$this -> session -> userdata('mfCode'); exit;
		//if(($this->m_zinc_ors_inventory->retrieveFacilityInfo($this -> session -> userdata('mfCode')))==true){

			if(($this->m_zinc_ors_inventory->retrieveFacilityInfo('16532'))==true){
=======
		if(($this->m_zinc_ors_inventory->retrieveFacilityInfo($this -> session -> userdata('fCode')))==true){
>>>>>>> upstream/master
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
		$form_zinc_ors.='
<form name="zinc_ors_inventory" id="zinc_ors_inventory" method="POST" action="' . base_url() . 'submit/c_form/form_zinc_ors_inventory' . '" >
	<!-- form for collecting inventory status information -->
	<h3 align="center"> ZINC &amp; ORS INVENTORY STATUS</h3>
	<p align="center">
	   <section class="row-title">
			<label class="dcah-label">FACILITY DETAILS</label>
	   </section
	</p>
	<section class="block">
		<section class="column">
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
					<label>Facility Contact Person:</label>
				</section>
				<section class="right">
					<input type="text" name="facilityContactPerson" id="facilityContactPerson"/>
				</section>
			</section>
			<section class="row2">
				<!--section class="left">
					<label>Drugs Dispensed From</label>
				</section>
				<section class="right">
					<input type="text" name="facilityZincOrsDispensedFrom" id="facilityZincOrsDispensedFrom"/>
				</section-->
			</section>
		</section>
		<section class="column" style="margin-bottom:30px">
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
			<section class="row2">
				<section class="left">
					<label>Telephone Contact:</label>
				</section>
				<section class="right">
					<input type="text" name="facilityTelephone" id="facilityTelephone" maxlength="15"/>
				</section>
			</section>
			<section class="row2">
				<section class="left">
					<label>Email:</label>
				</section>
				<section class="right">
					<input type="email" name="facilityEmail" id="facilityEmail" maxlength="100"/>
					<input type="hidden"  name="facilityMFC" id="facilityMFC"/>
				</section>
			</section>
		</section>
	</section>
	
	<h3 align="center"> Zinc and ORS Stock at Hand Assessment</h3>
		<p style="text-align: center" style="color:#872300">
			Indicate the quantities of the Zinc &ORS available in this facility at the following units
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
		

		<table>
			<thead>
				<tr>
					<td style="color:#872300">Zinc Sulphate 20mg</td>
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
					<td style="color:#872300;font-weight:bold">Oral Rehydration Salts (ORS)</td>
				</tr>
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
	</div>
	<div id="tabs-2" class="tab PEDS">
		
		<table>
			<thead>
				<tr>
					<td style="color:#872300">Zinc Sulphate 20mg</td>
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
					<td style="color:#872300;font-weight:bold">Oral Rehydration Salts (ORS)</td>
				</tr>
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
	</div>
	
	<div id="tabs-3" class="tab OPD">
		
		<table>
			<thead>
				<tr>
					<td style="color:#872300">Zinc Sulphate 20mg</td>
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
					<td style="color:#872300;font-weight:bold">Oral Rehydration Salts (ORS)</td>
				</tr>
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
	</div>
	
	
	<div id="tabs-4" class="tab Pharmacy">
		<table>
			<thead>
				<tr>
					<td style="color:#872300">Zinc Sulphate 20mg</td>
				</tr>
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
					<td style="color:#872300;font-weight:bold">Oral Rehydration Salts (ORS)</td>
				</tr>
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
	</div>
	
	<div id="tabs-5" class="tab Stores">
		<table>
			<thead>
				<tr>
					<td style="color:#872300">Zinc Sulphate 20mg</td>
				</tr>
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
					<td style="color:#872300;font-weight:bold">Oral Rehydration Salts (ORS)</td>
				</tr>
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
	</div>
	
	<div id="tabs-6" class="tab Others">
		<table>
			<thead>
				<tr>
					<td style="color:#872300">Zinc Sulphate 20mg</td>
				</tr>
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
					<td style="color:#872300;font-weight:bold">Oral Rehydration Salts (ORS)</td>
				</tr>
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
	</div>
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

<<<<<<< HEAD
					
					
					
					
					
public function form_mnh_equipment_assessment() {
		$form_mnh_assessment = '';
		$form_mnh_assessment.= '
<form name="form_assessment_equiqment" id="form_assessment_equiqment" method="POST" action="' . base_url() . 'submit/c_form/form_assessment_equiqment' . '" >
	<!-- form for collecting inventory status information -->
	<h3 align="center"> ASSESSMENT OF EQUIPMENT AND SUPPLIES FOR EmONC</h3>

	<section class="block">
		<section class="column">
			<section class="row2">
				<section class="left">
					<label>Date:</label>
				</section>
				<section class="right">
					<input type="date" name="facilityDateOfInventory" id="facilityDateOfInventory" readonly="readonly" class="autoDate" placeholder="click for date"/>
				</section>
			</section>
			<section class="row2">
<<<<<<< HEAD
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
					<input type="text" name="facilityType" id="facilityType"/>
=======
				<section class="left">
					<label>Facility Name:</label>
				</section>
				<section class="right">
					<input type="text" name="facilityName" id="facilityName"/>
>>>>>>> upstream/master
				</section>
			</section>
			<section class="row2">
				<section class="left">
<<<<<<< HEAD
					<label>Facility Level:</label>
				</section>
				<section class="right">
=======
					<label>Facility Type:</label>
				</section>
				<section class="right">
					<input type="text" name="facilityType" id="facilityType"/>
				</section>
			</section>
			<section class="row2">
				<section class="left">
					<label>Facility Level:</label>
				</section>
				<section class="right">
>>>>>>> upstream/master
					<input type="text" name="facilityLevel" id="facilityLevel"/>
				</section>
			</section>

			<section class="row2">
				<!--section class="left">
				<label>Drugs Dispensed From</label>
				</section>
				<section class="right">
				<input type="text" name="facilityZincOrsDispensedFrom" id="facilityZincOrsDispensedFrom"/>
				</section-->
			</section>
		</section>
		<section class="column" style="margin-bottom:30px">
			<section class="row2">
				<section class="left">
					<label>Facility-In-Charge Contact:</label>
				</section>
				<section class="right">
					<input type="text" name="facilityContactPerson" id="facilityContactPerson"/>
				</section>
			</section>
			<section class="row2">
<<<<<<< HEAD
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
=======
				<section class="left">
					<label>District:</label>
				</section>
				<section class="right">
					<select name="facilityDistrict" id="facilityDistrict">
						<option value="" selected="selected">Select One</option>
						' . $this -> selectDistricts . '
>>>>>>> upstream/master
					</select>
				</section>
			</section>
			<section class="row2">
				<section class="left">
<<<<<<< HEAD
=======
					<label>County:</label>
				</section>
				<section class="right">
					<select name="facilityCounty" id="facilityCounty">
						<option value="" selected="selected">Select One</option>
						' . $this -> selectCounties . '
					</select>
				</section>
			</section>
			<section class="row2">
				<section class="left">
>>>>>>> upstream/master
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

	<table>

		<section class="block">
			<section class="column-wide">
				<section class="row-title">
					<section class="left">
						<label class="dcah-label">Inventory Type: Labor & Delivery</label>
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
					<section class="center" name="q5FacilityDelivery_1" id="q5FacilityDelivery_1">
						<select>
							<option>Yes</option>
							<option>No</option>
						</select>
					</section>
					<section class="right">
						<input type="text" name="q5Comment_1" id="q5Comment"/>
					</section>

				</section>
				<section class="row">
					<section class="left">
						6a. Is a person skilled in conducting deliveries present  at the facility or on call 24 hours a day,
						including weekends, to provide delivery care?
					</section>
					<section class="center">
						<select name="q6aConductingDelivery_1" id="q6aConductingDelivery_1">
							<option>Yes</option>
							<option>No</option>
						</select>
					</section>
				</section>
				<section class="row">
					<section class="left">
						6b. Which skilled providers were available?
					</section>
					<section class="center">
						<select name="q6bSkilledProviders_1" id="q6bSkilledProviders_1">
							<option>Mid-wife</option>
							<option>...</option>
						</select>
					</section>
				</section>
				<section class="row">
					<section class="left">
						7. Please tell me the total number of beds in the maternity ward / unit in this facility*
					</section>
					<section class="right">
						<input type="number" name="q7TotalBeds_1" id="q7TotalBeds_1"/>
					</section>

				</section>

				<section class="row-title">
					<label class="dcah-label">*Ask to see the room where Normal Deliveries are conducted</label>
				</section>

				<section class="row">
					<section class="left">
						8. Describe the setting of the Delivery Room
					</section>
					<section class="right">
						<select name="q8DeliveryRoom_1" id="q8DeliveryRoom_1">
							<option>private room, visual & auditory privacy</option>
							<option>non-private room, visual & auditory privacy</option>
							<option>visual privacy only</option>
							<option>no privacy</option>
						</select>
					</section>

				</section>

				<h3>NOTE THE AVAILABILITY AND CONDITION OF SUPPLIES AND EQUIPMENT REQUIRED FOR DELIVERY SERVICES. EQUIPMENT MAY BE IN DELIVERY ROOM OR AN ADJACENT ROOM.</h3>

			</section>
			<section class="column-wide">
				<section class="row">

					<section class="row-title">
=======
	
	public function form_mnh_equipment_assessment() {
		$form_mnh_assessment = '';
		$form_mnh_assessment.= '<form name="form_mnh_assessment" id="form_mnh_assessment" method="POST" action="' . base_url() . 'submit/c_form/form_mnh_equipment_assessment' . '" >
			<!-- form for collecting inventory status information -->
			<h3 align="center"> ASSESSMENT OF EQUIPMENT AND SUPPLIES FOR EmONC</h3>
		
			<section class="block">
				<section class="column">
					<section class="row2">
>>>>>>> upstream/master
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
						<!--section class="left">
						<label>Drugs Dispensed From</label>
						</section>
						<section class="right">
						<input type="text" name="facilityZincOrsDispensedFrom" id="facilityZincOrsDispensedFrom"/>
						</section-->
					</section>
				</section>
				<section class="column" style="margin-bottom:30px">
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
<<<<<<< HEAD

					</section>
					<section class="right">
						<label class="dcah-label">Functioning (B)</label>
					</section>
				</section>

				<section class="row">
					<section class="left">
						11a. Stethoscopes (Adult)
					</section>
					<section class="center">
						<select class="cloned left-combo" name="q11aStethoscopesAdult_1" id="q11aStethoscopesAdult_1">
							<option>Yes </option>
							<option>No </option>
						</select>
						<p>
							Quantity:
						<p/>
						<input type="number" name="q11aNumber_1" id="q11aNumber_1"/>
					</section>
					<section class="right">
						<select name="q11aYAD_1" id="q11aYAD_1">
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>
						<p>
							Quantity:
						<p/>
						<input type="number" />
					</section>

				</section>

				<section class="row">
					<section class="left">
						11b. Stethoscopes (Neonatal)
					</section>
					<section class="center">
						<select class="cloned left-combo" name="q11bStethoscopesNeonatal_1" id="q11bStethoscopesNeonatal_1">
							<option>Yes </option>
							<option>No </option>
						</select>
						<p>
							Quantity:
						<p/>
						<input type="number" name="q11bNumber_1" id="q11bNumber_1"/>
					</section>
					<section class="right">
						<select name="q11aYAD_1" id="q11aYAD_1">
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>
						<p>
							Quantity:
						<p/>
						<input type="number" />
					</section>

				</section>

				<section class="row">
					<section class="left">
						11c. BP machine
					</section>
					<section class="center">
						<select class="cloned left-combo" name="q11cBPMachine_1" id="q11cBPMachine_1">
							<option>Yes </option>
							<option>No </option>
						</select>

					</section>
					<section class="right">
						<select name="q11cYAD_1" id="q11cYAD_1">
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>

					</section>

				</section>
				<section class="row">
					<section class="left">
						11d. Clinical Thermometer
					</section>
					<section class="center">
						<select class="cloned left-combo" name="q11dClinicalThermometer_1" id="q11dClinicalThermometer_1">
							<option>Yes </option>
							<option>No </option>
						</select>
						<p>
							Quantity:
						<p/>
						<input type="number" name="q11dNumber_1" id="q11dNumber_1"/>
					</section>
					<section class="right">
						<select name="q11dYAD_1" id="q11dYAD_1">
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>
						<p>
							Quantity:
						<p/>
						<input type="number" />
					</section>

				</section>
				<section class="row">
					<section class="left">
						11e. Fetoscope
					</section>
					<section class="center">
						<select class="cloned left-combo" name="q11eFetoscope_1" id="q11eFetoscope_1">
							<option>Yes </option>
							<option>No </option>
						</select>
						<p>
							Quantity:
						<p/>
						<input type="number" name="q11eNumber_1" id="q11eNumber_1"/>
					</section>
					<section class="right">
						<select name="q11eYAD_1" id="q11eYAD_1">
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>
						<p>
							Quantity:
						<p/>
						<input type="number" />
					</section>

				</section>
				<section class="row">
					<section class="left">
						11f. Sonicaid
					</section>
					<section class="center">
						<select class="cloned left-combo" name="q11fFetoscope_1" id="q11fFetoscope_1">
							<option>Yes </option>
							<option>No </option>
						</select>
						<p>
							Quantity:
						<p/>
						<input type="number" name="q11fNumber_1" id="q11fNumber_1"/>
<<<<<<< HEAD
=======
					</section>
					<section class="right">
						<select name="q11fYAD_1" id="q11fYAD_1">
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>
						<p>
							Quantity:
						<p/>
						<input type="number" />
>>>>>>> upstream/master
					</section>

				</section>
				<section class="row">
					<section class="left">
						11g. Suction Machine
					</section>
					<section class="center">
						<select class="cloned left-combo" name="q11gSuctionMachine_1" id="q11gSuctionMachine_1">
							<option>Yes </option>
							<option>No </option>
						</select>
						<p>
							Quantity:
						<p/>
						<input type="number" name="q11gNumber_1" id="q11gNumber_1" />
					</section>
					<section class="right">
<<<<<<< HEAD
						<select name="q11fYAD_1" id="q11fYAD_1">
=======
						<select name="q11gYAD_1" id="q11gYAD_1">
>>>>>>> upstream/master
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>
						<p>
							Quantity:
						<p/>
						<input type="number" />
					</section>

				</section>
				<section class="row">
					<section class="left">
<<<<<<< HEAD
						11g. Suction Machine
					</section>
					<section class="center">
						<select class="cloned left-combo" name="q11gSuctionMachine_1" id="q11gSuctionMachine_1">
							<option>Yes </option>
							<option>No </option>
						</select>
						<p>
							Quantity:
						<p/>
						<input type="number" name="q11gNumber_1" id="q11gNumber_1" />
					</section>
					<section class="right">
						<select name="q11gYAD_1" id="q11gYAD_1">
=======
						11h. Weighing Scale for babies
					</section>
					<section class="center">
						<select class="cloned left-combo" name="q11hWeighingBabies_1" id="q11hWeighingBabies_1">
							<option>Yes </option>
							<option>No </option>
						</select>
						<p>
							Quantity:
						<p/>
						<input type="number" name="q11hNumber_1" id="q11hNumber_1"/>
						<select name="q11hScaleType_1" id="q11hScaleType_1">
							<option>Digital</option>
							<option>Graduated</option>
						</select>
					</section>
					<section class="right">
						<select name="q11hYAD_1" id="q11hYAD_1">
>>>>>>> upstream/master
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>
						<p>
							Quantity:
						<p/>
						<input type="number" />
					</section>

				</section>

				<section class="row">
					<section class="left">
<<<<<<< HEAD
						11h. Weighing Scale for babies
					</section>
					<section class="center">
						<select class="cloned left-combo" name="q11hWeighingBabies_1" id="q11hWeighingBabies_1">
							<option>Yes </option>
							<option>No </option>
						</select>
						<p>
							Quantity:
						<p/>
						<input type="number" name="q11hNumber_1" id="q11hNumber_1"/>
						<select name="q11hScaleType_1" id="q11hScaleType_1">
							<option>Digital</option>
							<option>Graduated</option>
						</select>
					</section>
					<section class="right">
						<select name="q11hYAD_1" id="q11hYAD_1">
=======
						11i. Adult resuscitation tray
					</section>
					<section class="center">
						<select class="cloned left-combo" name="q11iAdultResuscitation_1" id="q11iAdultResuscitation_1">
							<option>Yes </option>
							<option>No </option>
						</select>
						<p>
							Quantity:
						<p/>
						<input type="number" name="q11iNumber_1" id="q11iNumber_1"/>
					</section>
					<section class="right">
						<select name="q11iYAD_1" id="q11iYAD_1">
>>>>>>> upstream/master
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>
						<p>
							Quantity:
						<p/>
						<input type="number" />
					</section>

				</section>

				<section class="row">
					<section class="left">
<<<<<<< HEAD
						11i. Adult resuscitation tray
					</section>
					<section class="center">
						<select class="cloned left-combo" name="q11iAdultResuscitation_1" id="q11iAdultResuscitation_1">
							<option>Yes </option>
							<option>No </option>
						</select>
						<p>
							Quantity:
						<p/>
						<input type="number" name="q11iNumber_1" id="q11iNumber_1"/>
=======
						11j. Sterilization
					</section>
					<section class="center">
						<select class="cloned left-combo" name="q11jSterilization_1" id="q11jSterilization_1">
							<option>Yes </option>
							<option>No </option>
						</select>
						<p>
							Quantity:
						<p/>
						<input type="number" name="q11jNumber_1" id="q11jNumber_1"/>
						<p>
							Sterilization Methods
						</p>
						<select>
							<option>Autoclave</option>
							<option>HLD</option>

						</select>
						Others(specify)
						<input type="text" name="q11jOthers_1" id="q11jOthers_1"/>
>>>>>>> upstream/master
					</section>
					<section class="right">
						<select name="q11iYAD_1" id="q11iYAD_1">
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>
						<p>
							Quantity:
						<p/>
						<input type="number" />
					</section>

				</section>

				<section class="row">
					<section class="left">
<<<<<<< HEAD
						11j. Sterilization
					</section>
					<section class="center">
						<select class="cloned left-combo" name="q11jSterilization_1" id="q11jSterilization_1">
							<option>Yes </option>
							<option>No </option>
						</select>
						<p>
							Quantity:
						<p/>
						<input type="number" name="q11jNumber_1" id="q11jNumber_1"/>
						<p>
							Sterilization Methods
						</p>
						<select>
							<option>Autoclave</option>
							<option>HLD</option>

						</select>
						Others(specify)
						<input type="text" name="q11jOthers_1" id="q11jOthers_1"/>
					</section>
					<section class="right">
						<select name="q11iYAD_1" id="q11iYAD_1">
=======
						11k. Manual Vacuum Aspiration kit (within facility)
					</section>
					<section class="center">
						<select class="cloned left-combo" name="q11kManualVacuum_1" id="q11kManualVacuum_1">
							<option>Yes </option>
							<option>No </option>
						</select>
						<p>
							Quantity:
						<p/>
						<input type="number" />
					</section>
					<section class="right">
						<select name="q11kYAD_1" id="q11kYAD_1">
>>>>>>> upstream/master
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>
						<p>
							Quantity:
						<p/>
						<input type="number" />
					</section>

				</section>

				<section class="row">
					<section class="left">
<<<<<<< HEAD
						11k. Manual Vacuum Aspiration kit (within facility)
					</section>
					<section class="center">
						<select class="cloned left-combo" name="q11kManualVacuum_1" id="q11kManualVacuum_1">
=======
						11l. Ventouse
					</section>
					<section class="center">
						<select class="cloned left-combo" name="q11lVentouse_1" id="q11lVentouse_1">
>>>>>>> upstream/master
							<option>Yes </option>
							<option>No </option>
						</select>
						<p>
							Quantity:
						<p/>
<<<<<<< HEAD
						<input type="number" />
					</section>
					<section class="right">
						<select name="q11kYAD_1" id="q11kYAD_1">
=======
						<input type="number" name="11lNumbera_1" id="11lNumbera_1"/>
					</section>
					<section class="right">
						<select name="q11lYAD_1" id="q11lYAD_1">
>>>>>>> upstream/master
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>
						<p>
							Quantity:
						<p/>
<<<<<<< HEAD
						<input type="number" />
=======
						<input type="number" name="11lNumberb_1" id="11lNumberb_1"/>
>>>>>>> upstream/master
					</section>

				</section>

				<section class="row">
					<section class="left">
<<<<<<< HEAD
						11l. Ventouse
					</section>
					<section class="center">
						<select class="cloned left-combo" name="q11lVentouse_1" id="q11lVentouse_1">
=======
						11m. Kiwi Vacuum Extractor
					</section>
					<section class="center">
						<select class="cloned left-combo" name="q11mKiwi_1" id="q11mKiwi_1">
>>>>>>> upstream/master
							<option>Yes </option>
							<option>No </option>
						</select>
						<p>
							Quantity:
						<p/>
<<<<<<< HEAD
						<input type="number" name="11lNumbera_1" id="11lNumbera_1"/>
					</section>
					<section class="right">
						<select name="q11lYAD_1" id="q11lYAD_1">
=======
						<input type="number" name="11mNumbera_1" id="11mNumbera_1"/>
					</section>
					<section class="right">
						<select name="q11mYAD_1" id="q11mYAD_1">
>>>>>>> upstream/master
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>
						<p>
							Quantity:
						<p/>
<<<<<<< HEAD
						<input type="number" name="11lNumberb_1" id="11lNumberb_1"/>
=======
						<input type="number" name="11mNumberb_1" id="11mNumberb_1"/>
>>>>>>> upstream/master
					</section>

				</section>

				<section class="row">
					<section class="left">
<<<<<<< HEAD
						11m. Kiwi Vacuum Extractor
					</section>
					<section class="center">
						<select class="cloned left-combo" name="q11mKiwi_1" id="q11mKiwi_1">
=======
						11n. Dilatation and curretage kit
					</section>
					<section class="center">
						<select class="cloned left-combo" name="q11nDilation_1" id="q11nDilation_1">
>>>>>>> upstream/master
							<option>Yes </option>
							<option>No </option>
						</select>
						<p>
							Quantity:
						<p/>
<<<<<<< HEAD
						<input type="number" name="11mNumbera_1" id="11mNumbera_1"/>
					</section>
					<section class="right">
						<select name="q11mYAD_1" id="q11mYAD_1">
=======
						<input type="number" name="q11nNumbera_1" id="q11nNumbera_1"/>
					</section>
					<section class="right">
						<select name="q11nYAD_1" id="q11nYAD_1">
>>>>>>> upstream/master
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>
						<p>
							Quantity:
						<p/>
<<<<<<< HEAD
						<input type="number" name="11mNumberb_1" id="11mNumberb_1"/>
=======
						<input type="number" name="q11nNumberb_1" id="q11nNumberb_1"/>
>>>>>>> upstream/master
					</section>

				</section>

				<section class="row">
					<section class="left">
<<<<<<< HEAD
						11n. Dilatation and curretage kit
					</section>
					<section class="center">
						<select class="cloned left-combo" name="q11nDilation_1" id="q11nDilation_1">
=======
						11o. Sterile gauze
					</section>
					<section class="center">
						<select class="cloned left-combo" name="q11oSterileGauze_1" id="q11oSterileGauze_1">
>>>>>>> upstream/master
							<option>Yes </option>
							<option>No </option>
						</select>
						<p>
							Quantity:
						<p/>
<<<<<<< HEAD
						<input type="number" name="q11nNumbera_1" id="q11nNumbera_1"/>
					</section>
					<section class="right">
						<select name="q11nYAD_1" id="q11nYAD_1">
=======
						<input type="number" name="q11oNumbera_1" id="q11oNumbera_1"/>
					</section>
					<section class="right">
						<select name="q11oYAD_1" id="q11oYAD_1">
>>>>>>> upstream/master
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>
						<p>
							Quantity:
						<p/>
<<<<<<< HEAD
						<input type="number" name="q11nNumberb_1" id="q11nNumberb_1"/>
=======
						<input type="number" name="q11oNumberb_1" id="q11oNumberb_1"/>
>>>>>>> upstream/master
					</section>

				</section>

				<section class="row">
					<section class="left">
<<<<<<< HEAD
						11o. Sterile gauze
					</section>
					<section class="center">
						<select class="cloned left-combo" name="q11oSterileGauze_1" id="q11oSterileGauze_1">
							<option>Yes </option>
							<option>No </option>
						</select>
						<p>
							Quantity:
						<p/>
						<input type="number" name="q11oNumbera_1" id="q11oNumbera_1"/>
					</section>
					<section class="right">
						<select name="q11oYAD_1" id="q11oYAD_1">
=======
						11p. Sanitary pads
					</section>
					<section class="center">
						<select class="cloned left-combo" name="q11pSanitaryPads_1" id="q11pSanitaryPads_1">
							<option>Yes </option>
							<option>No </option>
						</select>

					</section>

				</section>

				<section class="row">
					<section class="left">
						11q. Elbow length gloves
					</section>
					<section class="center">
						<select class="cloned left-combo" name="q11qElbowGloves_1" id="q11qElbowGloves_1">
							<option>Yes </option>
							<option>No </option>
						</select>
						<p>
							Quantity:
						<p/>
						<input type="number" name="q11qNumbera_1" id="q11qNumbera_1"/>
					</section>
					<section class="right">
						<select name="q11qYAD_1" id="q11qYAD_1">
>>>>>>> upstream/master
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>
						<p>
							Quantity:
						<p/>
<<<<<<< HEAD
						<input type="number" name="q11oNumberb_1" id="q11oNumberb_1"/>
=======
						<input type="number" name="q11qNumberb_1" id="q11qNumberb_1"/>
>>>>>>> upstream/master
					</section>

				</section>

				<section class="row">
					<section class="left">
<<<<<<< HEAD
						11p. Sanitary pads
					</section>
					<section class="center">
						<select class="cloned left-combo" name="q11pSanitaryPads_1" id="q11pSanitaryPads_1">
=======
						11r. Patellar Hammer
					</section>
					<section class="center">
						<select class="cloned left-combo" name="q11rPatellarHammer_1" id="q11rPatellarHammer_1">
>>>>>>> upstream/master
							<option>Yes </option>
							<option>No </option>
						</select>

<<<<<<< HEAD
					</section>

				</section>

				<section class="row">
					<section class="left">
						11q. Elbow length gloves
					</section>
					<section class="center">
						<select class="cloned left-combo" name="q11qElbowGloves_1" id="q11qElbowGloves_1">
							<option>Yes </option>
							<option>No </option>
						</select>
						<p>
							Quantity:
						<p/>
						<input type="number" name="q11qNumbera_1" id="q11qNumbera_1"/>
					</section>
					<section class="right">
						<select name="q11qYAD_1" id="q11qYAD_1">
=======
					</section>
					<section class="right">
						<select name="q11rYAD_1" id="q11rYAD_1">
>>>>>>> upstream/master
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>
<<<<<<< HEAD
						<p>
							Quantity:
						<p/>
						<input type="number" name="q11qNumberb_1" id="q11qNumberb_1"/>
=======

>>>>>>> upstream/master
					</section>

				</section>

				<section class="row">
					<section class="left">
<<<<<<< HEAD
						11r. Patellar Hammer
					</section>
					<section class="center">
						<select class="cloned left-combo" name="q11rPatellarHammer_1" id="q11rPatellarHammer_1">
							<option>Yes </option>
							<option>No </option>
						</select>

					</section>
					<section class="right">
						<select name="q11rYAD_1" id="q11rYAD_1">
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>

					</section>

				</section>

				<section class="row">
					<section class="left">
						11s. Sutures
					</section>
					<section class="center">
						<select class="cloned left-combo" name="q11qSutures_1" id="q11qSutures_1">
							<option>Yes </option>
							<option>No </option>
						</select>
						<p>
							Quantity:
						<p/>
						<input type="number" name="q11sNumbera_1" id="q11sNumbera_1"/>
						<select>
							<option>Nylon</option>
						</select>
					</section>
					<section class="right">
=======
						11s. Sutures
					</section>
					<section class="center">
						<select class="cloned left-combo" name="q11qSutures_1" id="q11qSutures_1">
							<option>Yes </option>
							<option>No </option>
						</select>
						<p>
							Quantity:
						<p/>
						<input type="number" name="q11sNumbera_1" id="q11sNumbera_1"/>
						<select>
							<option>Nylon</option>
						</select>
					</section>
					<section class="right">
>>>>>>> upstream/master
						<select name="q11sYAD_1" id="q11sYAD_1">
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>
						<p>
							Quantity:
						<p/>
						<input type="number" name="q11sNumberb_1"  id="q11sNumberb_1"/>
=======
>>>>>>> upstream/master
					</section>
				</section>
			</section>
<<<<<<< HEAD

			<section class="column-wide">

				<section class="row-title">
					<section class="left">
						<label class="dcah-label">12. Medications in the Maternity/Labour ward</label>
					</section>
					<section class="center">
						<label class="dcah-label">Availability</label>
					</section>
					<section class="right">
						<label class="dcah-label">Comments</label>
					</section>
				</section>

				<section class="row">
					<section class="left">
<<<<<<< HEAD
						12a. Injectable
					</section>
					<section class="center">
						<select class="cloned left-combo" name="q12aInjectableOxytocina_1" id="q12aInjectableOxytocinb_1">
							<option>Yes </option>
							<option>No </option>
						</select>
						<select class="cloned left-combo" name="q12aInjectableOxytocinb_1" id="q12aInjectableOxytocinb_1">
							<option>Oxytocin</option>
							<option>Syntocin</option>
						</select>

=======
						12a. Intravenous solutions: either Ringers lactate, D5NS, or NS infusion
					</section>
					<section class="center">
						<select class="cloned left-combo" name="q12aIntravenousSolutions_1" id="q12aIntravenousSolutions_1">
							<option>Yes </option>
							<option>No </option>
						</select>
>>>>>>> upstream/master
						<input type="number" name="q12aNumber_1" id="q12aNumber_1"/>
					</section>
					<section class="right">
						<input type="text" name="q12aComment_1" id="q12aComment_1"/>
					</section>

				</section>

				<section class="row">
					<section class="left">
<<<<<<< HEAD
						12b. Intravenous solutions
					</section>
					<section class="center">
						<select class="cloned left-combo" name="q12bIntravenousSolutionsa_1" id="q12bIntravenousSolutionsa_1">
							<option>Yes </option>
							<option>No </option>
						</select>
						<select class="cloned left-combo" name="q12bIntravenousSolutionsb_1" id="q12bIntravenousSolutionsb_1">
							<option>Ringers Lactate</option>
							<option>D5NS</option>
							<option>NS Infusion</option>
						</select>
=======
						12b. Injectable ergometrine/ methergine
					</section>
					<section class="center">
						<select class="cloned left-combo" name="q12bIntectableErgomtrine_1" id="q12bIntectableErgomtrine_1">
							<option>Yes </option>
							<option>No </option>
						</select>
>>>>>>> upstream/master
						<input type="number" name="q12bNumber_1" id="q12bNumber_1"/>
					</section>
					<section class="right">
						<input type="text" name="q12bComment_1" id="q12bComment_1"/>
					</section>

				</section>

				<section class="row">
					<section class="left">
<<<<<<< HEAD
						12c. Injectable methergine
					</section>
					<section class="center">
						<select class="cloned left-combo" name="q12cIntectableErgomtrine_1" id="q12cIntectableErgomtrine_1">
=======
						12c. Injectable oxytocin/ syntocin
					</section>
					<section class="center">
						<select class="cloned left-combo" name="q12cInjectableOxytocin_1" id="q12cInjectableOxytocin_1">
>>>>>>> upstream/master
							<option>Yes </option>
							<option>No </option>
						</select>
						<input type="number" name="q12cNumber_1" id="q12cNumber_1"/>
					</section>
					<section class="right">
						<input type="text" name="q12cComment_1" id="q12cComment_1"/>
					</section>

				</section>

				<section class="row">
					<section class="left">
<<<<<<< HEAD
						12d. Injectable
					</section>
					<section class="center">
						<select class="cloned left-combo" name="q12dInjectableHydralazinea_1" id="q12dInjectableHydralazinea_1">
							<option>Yes </option>
							<option>No </option>
						</select>
						<select class="cloned left-combo" name="q12dInjectableHydralazineb_1" id="q12dInjectableHydralazineb_1">
							<option>Hydralazine</option>
							<option>Apresoline</option>
						</select>
=======
						12d. Injectable Hydralazine or Apresoline
					</section>
					<section class="center">
						<select class="cloned left-combo" name="q12dInjectableHydralazine_1" id="q12dInjectableHydralazine_1">
							<option>Yes </option>
							<option>No </option>
						</select>
>>>>>>> upstream/master
						<input type="number" name="q12dNumber_1" id="q12dNumber_1"/>
					</section>
					<section class="right">
						<input type="text" name="q12dComment_1" id="q12dComment_1" />
					</section>

				</section>

				<section class="row">
					<section class="left">
						12e. Injectable diazepam
					</section>
					<section class="center">
						<select class="cloned left-combo" name="q12eInjectableDiazepam_1" id="q12eInjectableDiazepam_1">
							<option>Yes </option>
							<option>No </option>
						</select>
						<input type="number" name="q12eNumber_1" id="q12eNumber_1"/>
					</section>
					<section class="right">
						<input type="text" name="q12eComment_1" id="q12eComment_1"/>
					</section>

				</section>

				<section class="row">
					<section class="left">
						12f. Injectable magnesium sulfate
					</section>
					<section class="center">
						<select class="cloned left-combo" name="q12fInjectableMagnesium_1" id="q12fInjectableMagnesium_1">
							<option>Yes </option>
							<option>No </option>
						</select>
						<input type="number" name="q12fNumber_1" id="q12fNumber_1"/>
					</section>
					<section class="right">
						<input type="text" name="q12fComment_1" id="q12fComment_1"/>
					</section>

				</section>

				<section class="row">
					<section class="left">
						12g. Injectable amoxicillin or ampicillin
					</section>
					<section class="center">
<<<<<<< HEAD
						<select class="cloned left-combo" name="q12gInjectableAmoxicillina_1" id="q12gInjectableAmoxicillina_1">
							<option>Yes </option>
							<option>No </option>
						</select>
						<select class="cloned left-combo" name="q12gInjectableAmoxicillinb_1" id="q12gInjectableAmoxicillinb_1">
							<option>Amoxicillin </option>
							<option>Ampicillin</option>
						</select>

=======
						<select class="cloned left-combo" name="q12gInjectableAmoxicillin_1" id="q12gInjectableAmoxicillin_1">
							<option>Yes </option>
							<option>No </option>
						</select>
>>>>>>> upstream/master
						<input type="number" name="q12gNumber_1" id="q12gNumber_1" />
					</section>
					<section class="right">
						<input type="text" name="q12Comment_1" id="q12Comment_1" />
					</section>

				</section>

				<section class="row">
					<section class="left">
						12h. Injectable gentamicin
					</section>
					<section class="center">
						<select class="cloned left-combo" name="q12hInjectableGentamicin_1" id="q12hInjectableGentamicin_1">
							<option>Yes </option>
							<option>No </option>
						</select>
						<input type="number" name="q12hNumber_1" id="q12hNumber_1"/>
					</section>
					<section class="right">
						<input type="text" name="q12hComment_1"  id="q12hComment_1"/>
					</section>

				</section>

				<section class="row">
					<section class="left">
						12i. Calcium gluconate
					</section>
					<section class="center">
						<select class="cloned left-combo" name="q12iCalciumGluconate_1" id="q12iCalciumGluconate_1">
							<option>Yes </option>
							<option>No </option>
						</select>
						<input type="number" name="q12iNumber_1" id="q12iNumber_1"/>
					</section>
					<section class="right">
						<input type="text" name="q12iComment_1" id="q12iComment_1"/>
					</section>

				</section>

				<section class="row">
					<section class="left">
						12j. Methyldopa/Aldomet
					</section>
					<section class="center">
						<select class="cloned left-combo" name="q12jMethyldopa_1" id="q12jMethyldopa_1">
							<option>Yes </option>
							<option>No </option>
						</select>
						<input type="number" name="q12jNumber_1" id="q12jNumber_1"/>
					</section>
					<section class="right">
						<input type="text" name="q12jComment_1" id="q12jComment_1"/>
					</section>

				</section>

				<section class="row">
					<section class="left">
						12k. Lidocaine (lignocaine) or other local anesthetic
					</section>
					<section class="center">
						<select class="cloned left-combo" name="q12kLidocaine_1" id="q12kLidocaine_1">
							<option>Yes </option>
							<option>No </option>
						</select>
						<input type="number" name="q12kNumber_1" id="q12kNumber_1"/>
					</section>
					<section class="right">
						<input type="text" name="q12kComment_1" id="q12kComment_1"/>
					</section>

				</section>

				<section class="row">
					<section class="left">
<<<<<<< HEAD
						12l. Nifedipine Tablets
=======
						12l. Nifedipine
>>>>>>> upstream/master
					</section>
					<section class="center">
						<select class="cloned left-combo" name="q12lNifedipine_1" id="q12lNifedipine_1">
							<option>Yes </option>
							<option>No </option>
						</select>
						<input type="number" name="q12lNumber_1" id="q12lNumber_1" />
					</section>
					<section class="right">
						<input type="text" />
					</section>

				</section>

				<section class="row">
					<section class="left">
						12m. Vitamin A
					</section>
					<section class="center">
						<select class="cloned left-combo" name="q12mVitaminA_1" id="q12mVitaminA_1">
							<option>Yes </option>
							<option>No </option>
						</select>
						<input type="number" name="q12mNumber_1" id="q12mNumber_1" />
					</section>
					<section class="right">
						<input type="text" name="q12mComment_1" id="q12mComment_1"/>
					</section>

				</section>

				<section class="row">
					<section class="left">
						12n. Vitamin K
					</section>
					<section class="center">
						<select class="cloned left-combo" name="q12nVitaminK_1" id="q12nVitaminK_1">
							<option>Yes </option>
							<option>No </option>
						</select>
						<input type="number" name="q12nNumber_1" id="q12nNumber_1"/>
					</section>
					<section class="right">
						<input type="text" name="q12nComment_1" id="q12nComment_1"/>
					</section>

				</section>

				<section class="row">
					<section class="left">
						12o. Oxygen
					</section>
					<section class="center">
<<<<<<< HEAD
						<select class="cloned left-combo" name="q12oOxygena_1" id="q12oOxygena_1">
							<option>Yes </option>
							<option>No </option>
						</select>
						<select class="cloned left-combo" name="q12oOxygenb_1" id="q12oOxygenb_1">
							<option>Cylinder</option>
							<option>Concentrator</option>
						</select>
=======
						<select class="cloned left-combo" name="q12oOxygen_1" id="q12oOxygen_1">
							<option>Yes </option>
							<option>No </option>
						</select>
>>>>>>> upstream/master
						<input type="number" name="q12oNumber_1" id="q12oNumber_1" />
					</section>
					<section class="right">
						<input type="text" name="q12oComment_1" id="q12oComment_1" />
					</section>

				</section>

				<section class="row">
<<<<<<< HEAD
					<section class="row-title">
						<section class="left">
							<label class="dcah-label">QUESTION</label>
						</section>
						<section class="center">
							<label class="dcah-label">ANSWER</label>
						</section>
=======
					<section class="left">
						12p. Other / specify
					</section>
					<section class="center">
						<input type="text" name="q12pOther_1" id="q12pOther_1" />
					</section>
					<input type="number" name="q12pNumber_1" id="q12pNumber_1" />
					<section class="right">
						<input type="text" name="q12pComment_1" id="q12pComment_1" />
>>>>>>> upstream/master
					</section>
				</section>
<<<<<<< HEAD
				<section class="left">
					13a. Does this facility perform newborn resuscitation?
				</section>
=======

				<section class="row">
					<section class="row-title">
=======
		
			<table>
		
				<section class="block">
					<section class="column-wide">
						<section class="row-title">
							<section class="left">
								<label class="dcah-label">Inventory Type: Labor & Delivery</label>
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
							<section class="center" name="q5FacilityDelivery_1" id="q5FacilityDelivery_1">
								<select>
									<option>Yes</option>
									<option>No</option>
								</select>
							</section>
							<section class="right">
								<input type="text" name="q5Comment_1" id="q5Comment"/>
							</section>
		
						</section>
						<section class="row">
							<section class="left">
								6a. Is a person skilled in conducting deliveries present  at the facility or on call 24 hours a day,
								including weekends, to provide delivery care?
							</section>
							<section class="center">
								<select name="q6aConductingDelivery_1" id="q6aConductingDelivery_1">
									<option>Yes</option>
									<option>No</option>
								</select>
							</section>
						</section>
						<section class="row">
							<section class="left">
								6b. Which skilled providers were available?
							</section>
							<section class="center">
								<select name="q6bSkilledProviders_1" id="q6bSkilledProviders_1">
									<option>Mid-wife</option>
									<option>...</option>
								</select>
							</section>
						</section>
						<section class="row">
							<section class="left">
								7. Please tell me the total number of beds in the maternity ward / unit in this facility*
							</section>
							<section class="right">
								<input type="number" name="q7TotalBeds_1" id="q7TotalBeds_1"/>
							</section>
		
						</section>
		
						<section class="row-title">
							<label class="dcah-label">*Ask to see the room where Normal Deliveries are conducted</label>
						</section>
		
						<section class="row">
							<section class="left">
								8. Describe the setting of the Delivery Room
							</section>
							<section class="right">
								<select name="q8DeliveryRoom_1" id="q8DeliveryRoom_1">
									<option>private room, visual & auditory privacy</option>
									<option>non-private room, visual & auditory privacy</option>
									<option>visual privacy only</option>
									<option>no privacy</option>
								</select>
							</section>
		
						</section>
		
						<h3>NOTE THE AVAILABILITY AND CONDITION OF SUPPLIES AND EQUIPMENT REQUIRED FOR DELIVERY SERVICES. EQUIPMENT MAY BE IN DELIVERY ROOM OR AN ADJACENT ROOM.</h3>
		
					</section>
					<section class="column-wide">
						<section class="row">
		
							<section class="row-title">
								<section class="left">
									<label class="dcah-label">9. EQUIPMENT REQUIRED FOR DELIVERY SERVICES</label>
								</section>
								<section class="center">
									<label class="dcah-label">Availability (A)</label>
								</section>
								<section class="right">
									<label class="dcah-label">Functioning (B)</label>
								</section>
							</section>
						</section>
		
						<section class="row">
							<section class="left">
								9a. Examination light
							</section>
							<section class="center">
								<select class="cloned left-combo" name="q9aExamninatioLight_1" id="q9aExamninatioLight_1">
									<option>Yes </option>
									<option>No </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
							<section class="right">
								<select name="q9aYAD_1" id="q9aYAD_1">
									<option> Yes </option>
									<option> No </option>
									<option> Do Not Know </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
		
						</section>
		
						<section class="row">
							<section class="left">
								9b. Delivery bed/ couch
							</section>
							<section class="center">
								<select class="cloned left-combo" name="q9bDeliveryBed_1" id="q9bDeliveryBed_1">
									<option>Yes </option>
									<option>No </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
							<section class="right">
								<select name="q9bYAD_1" id="q9bYAD_1">
									<option> Yes </option>
									<option> No </option>
									<option> Do Not Know </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
		
						</section>
		
						<section class="row">
							<section class="left">
								9c.Mackintosh (Delivery Couch)
							</section>
							<section class="center">
								<select class="cloned left-combo" name="qc9dMackintosh_1" id="qc9dMackintosh_1">
									<option>Yes </option>
									<option>No </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
							<section class="right">
								<select name="q9dYAD_1" id="q9dYAD_1">
									<option> Yes </option>
									<option> No </option>
									<option> Do Not Know </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
		
						</section>
		
						<section class="row">
							<section class="left">
								9d. Linen(Draping)
							</section>
							<section class="center">
								<select class="cloned left-combo" name="q9dLinenDraping_1" id="q9dLinenDraping_1">
									<option>Yes </option>
									<option>No </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
							<section class="right">
								<select name="q9dYAD_1" name="q9dYAD_1">
									<option> Yes </option>
									<option> No </option>
									<option> Do Not Know </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
		
						</section>
		
						<section class="row">
							<section class="left">
								9e. Linen(Bed)
							</section>
							<section class="center">
								<select class="cloned left-combo" name="q9eLinenBed_1" id="q9eLinenBed_1">
									<option>Yes </option>
									<option>No </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
							<section class="right">
								<select name="q9eYAD_1" name="q9eYAD_1">
									<option> Yes </option>
									<option> No </option>
									<option> Do Not Know </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
		
						</section>
		
						<section class="row">
							<section class="left">
								9g. Sharps container
							</section>
							<section class="center">
								<select class="cloned left-combo" name="q9gSharpsContainer_1" id="q9gSharpsContainer_1">
									<option>Yes </option>
									<option>No </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
							<section class="right">
								<select name="q9gYAD_1" id="q9gYAD_1">
									<option> Yes </option>
									<option> No </option>
									<option> Do Not Know </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
		
						</section>
		
						<section class="row">
							<section class="left">
								9h. At least five or more 2-ml or 5-ml disposable syringes
							</section>
							<section class="center">
								<select class="cloned left-combo" name="q9hDisposableSyringes_1" id="q9hDisposableSyringes_1">
									<option>Yes </option>
									<option>No </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
							<section class="right">
								<select name="q9hYAD_1" id="q9hYAD_1">
									<option> Yes </option>
									<option> No </option>
									<option> Do Not Know </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
		
						</section>
		
						<section class="row">
							<section class="left">
								9i. Three properly labeled or colour coded IP buckets
							</section>
							<section class="center">
								<select class="cloned left-combo" name="q9iIPBuckets_1" id="q9iIPBuckets_1">
									<option>Yes </option>
									<option>No </option>
								</select>
		
							</section>
							<section class="right">
								<select name="q9iYAD_1" id="q9iYAD_1">
									<option> Yes </option>
									<option> No </option>
									<option> Do Not Know </option>
								</select>
		
							</section>
		
						</section>
		
						<section class="row">
							<section class="left">
								9j. HLD (Jik, Cidex)
							</section>
							<section class="center">
								<select class="cloned left-combo" name="q9jJik_1" id="q9jJik_1">
									<option>Yes </option>
									<option>No </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
							<section class="right">
								<select name="q9jYAD_1" id="q9jYAD_1">
									<option> Yes </option>
									<option> No </option>
									<option> Do Not Know </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
		
						</section>
		
						<section class="row">
							<section class="left">
								9k. Soap for washing instruments (constantly available)
							</section>
							<section class="center">
								<select class="cloned left-combo" name="q9kWashingInstruments_1" id="q9kWashingInstruments_1">
									<option>Always</option>
									<option>Sometimes</option>
									<option>Never</option>
								</select>
		
							</section>
							<section class="right">
								<select name="q9kYAD_1" id="q9kYAD_1">
									<option> Yes </option>
									<option> No </option>
									<option> Do Not Know </option>
								</select>
		
							</section>
		
						</section>
		
						<section class="row">
							<section class="left">
								9l.Soap for handwashing (constantly available)
							</section>
							<section class="center">
								<select class="cloned left-combo" name="q9lSoapHandwashing_1" id="q9lSoapHandwashing_1">
									<option>Always</option>
									<option>Sometimes</option>
									<option>Never</option>
								</select>
		
							</section>
							<section class="right" name="q9lYAD_1" id="q9lYAD_1">
								<select>
									<option> Yes </option>
									<option> No </option>
									<option> Do Not Know </option>
								</select>
		
							</section>
		
						</section>
		
						<section class="row">
							<section class="left">
								9m.Properly Labelled or colour coded waste segragation bins
							</section>
							<section class="center">
								<select class="cloned left-combo" name="q9mLabelledColor_1" id="q9mLabelledColor_1">
									<option>Yes </option>
									<option>No </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
							<section class="right">
								<select name="q9mYAD_1" id="q9mYAD_1">
									<option> Yes </option>
									<option> No </option>
									<option> Do Not Know </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
		
						</section>
		
						<section class="row">
							<section class="left">
								9n. Drip stand
							</section>
							<section class="center">
								<select class="cloned left-combo" name="q9nDripStand_1" id="q9nDripStand_1">
									<option>Yes </option>
									<option>No </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
							<section class="right" name="q9nYAD_1" id="q9nYAD_1">
								<select>
									<option> Yes </option>
									<option> No </option>
									<option> Do Not Know </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
		
						</section>
		
						<section class="row">
							<section class="left">
								9o. Single-use hand-drying towels (constantly available)
							</section>
							<section class="center">
								<select class="cloned left-combo" name="q9oSingleTowels_1" id="q9oSingleTowels_1">
									<option>Always</option>
									<option>Sometimes</option>
									<option>Never</option>
								</select>
		
							</section>
							<section class="right">
								<select name="q9oYAD_1" id="q9oYAD_1">
									<option> Yes </option>
									<option> No </option>
									<option> Do Not Know </option>
								</select>
		
							</section>
		
						</section>
		
						<section class="row">
							<section class="left">
								9p. Running  Water for handwashing (constantly available)
							</section>
							<section class="center">
								<select class="cloned left-combo" name="q9pRunningWater_1" id="q9pRunningWater_1">
									<option>Always</option>
									<option>Sometimes</option>
									<option>Never</option>
								</select>
		
							</section>
							<section class="right">
								<select name="q9pYAD_1" id="q9pYAD_1">
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
									<label class="dcah-label">10. Indicate the contents of available delivery kits</label>
								</section>
								<section class="center">
									<label class="dcah-label">Quantity</label>
								</section>
								<section class="right">
									<label class="dcah-label">Comments</label>
								</section>
							</section>
		
						</section>
		
						<section class="row">
							<section class="left">
								10a. Cord scissors
							</section>
							<section class="center">
								<input type="number" name="q10aCordScissors_1" id="q10aCordScissors_1"/>
							</section>
							<section class="right">
								<input type="text" name="q10aComment_1" id="q10aComment_1"/>
							</section>
		
						</section>
		
						<section class="row">
							<section class="left">
								10b. Long artery Forceps (straight, lockable)
							</section>
		
							<section class="center">
								<input type="number" name="q10bLongArtery_1" id="q10bLongArtery_1"/>
							</section>
							<section class="right">
								<input type="text" name="q10bComment_1" id="q10bComment_1"/>
							</section>
		
						</section>
		
						<section class="row">
							<section class="left">
								10c. Episiotomy scissors
							</section>
							<section class="center">
								<input type="number" name="q10cEpisotomy_1" id="q10cEpisotomy_1"/>
							</section>
							<section class="right">
								<input type="text" name="q10cComment_1" id="q10cComment_1"/>
							</section>
		
						</section>
		
						<section class="row">
							<section class="left">
								10d. Kidney dishes
							</section>
							<section class="center">
								<input type="number" name="q10dKidneyDishes_1" id="q10dKidneyDishes_1"/>
							</section>
							<section class="right">
								<input type="text" name="q10dComment_1" id="q10dComment_1"/>
							</section>
		
						</section>
		
						<section class="row">
							<section class="left">
								10e. Gallipots
							</section>
							<section class="center">
								<input type="number" name="q10eGallipots_1" id="q10eGallipots_1"/>
							</section>
							<section class="right">
								<input type="text" name="q10eComment_1" id="q10eComment_1"/>
							</section>
		
						</section>
		
						<section class="row">
							<section class="left">
								10f. Sponge-holding forceps
							</section>
							<section class="center">
								<input type="number" name="q10fSpongeForceps_1" id="q10fSpongeForceps_1"/>
							</section>
							<section class="right">
								<input type="text" name="q10fComment_1" id="q10fComment_1"/>
							</section>
		
						</section>
		
						<section class="row">
							<section class="left">
								10g. Needle holder
							</section>
							<section class="center">
								<input type="number" name="q10gNeedleHolder_1" id="q10gNeedleHolder_1"/>
							</section>
							<section class="right">
								<input type="text" name="q10gComment_1" id="q10gComment_1"/>
							</section>
		
						</section>
		
						<section class="row">
							<section class="left">
								10h. Dissecting forceps -toothed
							</section>
							<section class="center">
								<input type="number" name="q10hDissectingForceps_1" id="q10hDissectingForceps_1"/>
							</section>
							<section class="right">
								<input type="text" name="q10hComment_1" id="q10hComment_1"/>
							</section>
		
						</section>
		
						<section class="row">
							<section class="left">
								10i. Instrument tray
							</section>
							<section class="center">
								<input type="number" name="q10iInstrumentTray_1" id="q10iInstrumentTray_1"/>
							</section>
							<section class="right">
								<input type="text" name="q10iComment_1" id="q10iComment_1"/>
							</section>
		
						</section>
		
						<section class="row">
							<section class="left">
								10j. Total number of delivery kits in the labour ward (calculated)
							</section>
							<section class="center">
								<input type="number" name="q10jDeliveryLabour_1" id="q10jDeliveryKits_1"/>
							</section>
							<section class="right">
								<input type="text" name="q10jComment_1" id="q10jComment_1"/>
							</section>
						</section>
		
						<section class="row">
							<section class="left">
								10k. Total number of delivery kits with all required items above (17C) (calculated)
							</section>
							<section class="center">
								<input type="number" name="q10kDeliveryAvailable_1" id="q10kDeliveryAvailable_1"/>
							</section>
							<section class="right">
								<input type="text" name="q10kComment_1" id="q10kComment_1"/>
							</section>
		
						</section>
						<section class="row-title">
							<section class="left">
								<label class="dcah-label">11. Other Equipment and supplies</label>
							</section>
							<section class="center">
								<section class="center">
									<label class="dcah-label">Availability (A)</label>
								</section>
		
							</section>
							<section class="right">
								<label class="dcah-label">Functioning (B)</label>
							</section>
						</section>
		
						<section class="row">
							<section class="left">
								11a. Stethoscopes (Adult)
							</section>
							<section class="center">
								<select class="cloned left-combo" name="q11aStethoscopesAdult_1" id="q11aStethoscopesAdult_1">
									<option>Yes </option>
									<option>No </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" name="q11aNumber_1" id="q11aNumber_1"/>
							</section>
							<section class="right">
								<select name="q11aYAD_1" id="q11aYAD_1">
									<option> Yes </option>
									<option> No </option>
									<option> Do Not Know </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
		
						</section>
		
						<section class="row">
							<section class="left">
								11b. Stethoscopes (Neonatal)
							</section>
							<section class="center">
								<select class="cloned left-combo" name="q11bStethoscopesNeonatal_1" id="q11bStethoscopesNeonatal_1">
									<option>Yes </option>
									<option>No </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" name="q11bNumber_1" id="q11bNumber_1"/>
							</section>
							<section class="right">
								<select name="q11aYAD_1" id="q11aYAD_1">
									<option> Yes </option>
									<option> No </option>
									<option> Do Not Know </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
		
						</section>
		
						<section class="row">
							<section class="left">
								11c. BP machine
							</section>
							<section class="center">
								<select class="cloned left-combo" name="q11cBPMachine_1" id="q11cBPMachine_1">
									<option>Yes </option>
									<option>No </option>
								</select>
		
							</section>
							<section class="right">
								<select name="q11cYAD_1" id="q11cYAD_1">
									<option> Yes </option>
									<option> No </option>
									<option> Do Not Know </option>
								</select>
		
							</section>
		
						</section>
						<section class="row">
							<section class="left">
								11d. Clinical Thermometer
							</section>
							<section class="center">
								<select class="cloned left-combo" name="q11dClinicalThermometer_1" id="q11dClinicalThermometer_1">
									<option>Yes </option>
									<option>No </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" name="q11dNumber_1" id="q11dNumber_1"/>
							</section>
							<section class="right">
								<select name="q11dYAD_1" id="q11dYAD_1">
									<option> Yes </option>
									<option> No </option>
									<option> Do Not Know </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
		
						</section>
						<section class="row">
							<section class="left">
								11e. Fetoscope
							</section>
							<section class="center">
								<select class="cloned left-combo" name="q11eFetoscope_1" id="q11eFetoscope_1">
									<option>Yes </option>
									<option>No </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" name="q11eNumber_1" id="q11eNumber_1"/>
							</section>
							<section class="right">
								<select name="q11eYAD_1" id="q11eYAD_1">
									<option> Yes </option>
									<option> No </option>
									<option> Do Not Know </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
		
						</section>
						<section class="row">
							<section class="left">
								11f. Sonicaid
							</section>
							<section class="center">
								<select class="cloned left-combo" name="q11fFetoscope_1" id="q11fFetoscope_1">
									<option>Yes </option>
									<option>No </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" name="q11fNumber_1" id="q11fNumber_1"/>
							</section>
							<section class="right">
								<select name="q11fYAD_1" id="q11fYAD_1">
									<option> Yes </option>
									<option> No </option>
									<option> Do Not Know </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
		
						</section>
						<section class="row">
							<section class="left">
								11g. Suction Machine
							</section>
							<section class="center">
								<select class="cloned left-combo" name="q11gSuctionMachine_1" id="q11gSuctionMachine_1">
									<option>Yes </option>
									<option>No </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" name="q11gNumber_1" id="q11gNumber_1" />
							</section>
							<section class="right">
								<select name="q11gYAD_1" id="q11gYAD_1">
									<option> Yes </option>
									<option> No </option>
									<option> Do Not Know </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
		
						</section>
		
						<section class="row">
							<section class="left">
								11h. Weighing Scale for babies
							</section>
							<section class="center">
								<select class="cloned left-combo" name="q11hWeighingBabies_1" id="q11hWeighingBabies_1">
									<option>Yes </option>
									<option>No </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" name="q11hNumber_1" id="q11hNumber_1"/>
								<select name="q11hScaleType_1" id="q11hScaleType_1">
									<option>Digital</option>
									<option>Graduated</option>
								</select>
							</section>
							<section class="right">
								<select name="q11hYAD_1" id="q11hYAD_1">
									<option> Yes </option>
									<option> No </option>
									<option> Do Not Know </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
		
						</section>
		
						<section class="row">
							<section class="left">
								11i. Adult resuscitation tray
							</section>
							<section class="center">
								<select class="cloned left-combo" name="q11iAdultResuscitation_1" id="q11iAdultResuscitation_1">
									<option>Yes </option>
									<option>No </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" name="q11iNumber_1" id="q11iNumber_1"/>
							</section>
							<section class="right">
								<select name="q11iYAD_1" id="q11iYAD_1">
									<option> Yes </option>
									<option> No </option>
									<option> Do Not Know </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
		
						</section>
		
						<section class="row">
							<section class="left">
								11j. Sterilization
							</section>
							<section class="center">
								<select class="cloned left-combo" name="q11jSterilization_1" id="q11jSterilization_1">
									<option>Yes </option>
									<option>No </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" name="q11jNumber_1" id="q11jNumber_1"/>
								<p>
									Sterilization Methods
								</p>
								<select>
									<option>Autoclave</option>
									<option>HLD</option>
		
								</select>
								Others(specify)
								<input type="text" name="q11jOthers_1" id="q11jOthers_1"/>
							</section>
							<section class="right">
								<select name="q11iYAD_1" id="q11iYAD_1">
									<option> Yes </option>
									<option> No </option>
									<option> Do Not Know </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
		
						</section>
		
						<section class="row">
							<section class="left">
								11k. Manual Vacuum Aspiration kit (within facility)
							</section>
							<section class="center">
								<select class="cloned left-combo" name="q11kManualVacuum_1" id="q11kManualVacuum_1">
									<option>Yes </option>
									<option>No </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
							<section class="right">
								<select name="q11kYAD_1" id="q11kYAD_1">
									<option> Yes </option>
									<option> No </option>
									<option> Do Not Know </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
		
						</section>
		
						<section class="row">
							<section class="left">
								11l. Ventouse
							</section>
							<section class="center">
								<select class="cloned left-combo" name="q11lVentouse_1" id="q11lVentouse_1">
									<option>Yes </option>
									<option>No </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" name="11lNumbera_1" id="11lNumbera_1"/>
							</section>
							<section class="right">
								<select name="q11lYAD_1" id="q11lYAD_1">
									<option> Yes </option>
									<option> No </option>
									<option> Do Not Know </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" name="11lNumberb_1" id="11lNumberb_1"/>
							</section>
		
						</section>
		
						<section class="row">
							<section class="left">
								11m. Kiwi Vacuum Extractor
							</section>
							<section class="center">
								<select class="cloned left-combo" name="q11mKiwi_1" id="q11mKiwi_1">
									<option>Yes </option>
									<option>No </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" name="11mNumbera_1" id="11mNumbera_1"/>
							</section>
							<section class="right">
								<select name="q11mYAD_1" id="q11mYAD_1">
									<option> Yes </option>
									<option> No </option>
									<option> Do Not Know </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" name="11mNumberb_1" id="11mNumberb_1"/>
							</section>
		
						</section>
		
						<section class="row">
							<section class="left">
								11n. Dilatation and curretage kit
							</section>
							<section class="center">
								<select class="cloned left-combo" name="q11nDilation_1" id="q11nDilation_1">
									<option>Yes </option>
									<option>No </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" name="q11nNumbera_1" id="q11nNumbera_1"/>
							</section>
							<section class="right">
								<select name="q11nYAD_1" id="q11nYAD_1">
									<option> Yes </option>
									<option> No </option>
									<option> Do Not Know </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" name="q11nNumberb_1" id="q11nNumberb_1"/>
							</section>
		
						</section>
		
						<section class="row">
							<section class="left">
								11o. Sterile gauze
							</section>
							<section class="center">
								<select class="cloned left-combo" name="q11oSterileGauze_1" id="q11oSterileGauze_1">
									<option>Yes </option>
									<option>No </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" name="q11oNumbera_1" id="q11oNumbera_1"/>
							</section>
							<section class="right">
								<select name="q11oYAD_1" id="q11oYAD_1">
									<option> Yes </option>
									<option> No </option>
									<option> Do Not Know </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" name="q11oNumberb_1" id="q11oNumberb_1"/>
							</section>
		
						</section>
		
						<section class="row">
							<section class="left">
								11p. Sanitary pads
							</section>
							<section class="center">
								<select class="cloned left-combo" name="q11pSanitaryPads_1" id="q11pSanitaryPads_1">
									<option>Yes </option>
									<option>No </option>
								</select>
		
							</section>
		
						</section>
		
						<section class="row">
							<section class="left">
								11q. Elbow length gloves
							</section>
							<section class="center">
								<select class="cloned left-combo" name="q11qElbowGloves_1" id="q11qElbowGloves_1">
									<option>Yes </option>
									<option>No </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" name="q11qNumbera_1" id="q11qNumbera_1"/>
							</section>
							<section class="right">
								<select name="q11qYAD_1" id="q11qYAD_1">
									<option> Yes </option>
									<option> No </option>
									<option> Do Not Know </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" name="q11qNumberb_1" id="q11qNumberb_1"/>
							</section>
		
						</section>
		
						<section class="row">
							<section class="left">
								11r. Patellar Hammer
							</section>
							<section class="center">
								<select class="cloned left-combo" name="q11rPatellarHammer_1" id="q11rPatellarHammer_1">
									<option>Yes </option>
									<option>No </option>
								</select>
		
							</section>
							<section class="right">
								<select name="q11rYAD_1" id="q11rYAD_1">
									<option> Yes </option>
									<option> No </option>
									<option> Do Not Know </option>
								</select>
		
							</section>
		
						</section>
		
						<section class="row">
							<section class="left">
								11s. Sutures
							</section>
							<section class="center">
								<select class="cloned left-combo" name="q11qSutures_1" id="q11qSutures_1">
									<option>Yes </option>
									<option>No </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" name="q11sNumbera_1" id="q11sNumbera_1"/>
								<select>
									<option>Nylon</option>
								</select>
							</section>
							<section class="right">
								<select name="q11sYAD_1" id="q11sYAD_1">
									<option> Yes </option>
									<option> No </option>
									<option> Do Not Know </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" name="q11sNumberb_1"  id="q11sNumberb_1"/>
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
							</section>
							<section class="right">
								<label class="dcah-label">Comments</label>
							</section>
						</section>
		
						<section class="row">
							<section class="left">
								12a. Injectable
							</section>
							<section class="center">
								<select class="cloned left-combo" name="q12aInjectableOxytocina_1" id="q12aInjectableOxytocinb_1">
									<option>Yes </option>
									<option>No </option>
								</select>
								<select class="cloned left-combo" name="q12aInjectableOxytocinb_1" id="q12aInjectableOxytocinb_1">
									<option>Oxytocin</option>
									<option>Syntocin</option>
								</select>
		
								<input type="number" name="q12aNumber_1" id="q12aNumber_1"/>
							</section>
							<section class="right">
								<input type="text" name="q12aComment_1" id="q12aComment_1"/>
							</section>
		
						</section>
		
						<section class="row">
							<section class="left">
								12b. Intravenous solutions
							</section>
							<section class="center">
								<select class="cloned left-combo" name="q12bIntravenousSolutionsa_1" id="q12bIntravenousSolutionsa_1">
									<option>Yes </option>
									<option>No </option>
								</select>
								<select class="cloned left-combo" name="q12bIntravenousSolutionsb_1" id="q12bIntravenousSolutionsb_1">
									<option>Ringers Lactate</option>
									<option>D5NS</option>
									<option>NS Infusion</option>
								</select>
								<input type="number" name="q12bNumber_1" id="q12bNumber_1"/>
							</section>
							<section class="right">
								<input type="text" name="q12bComment_1" id="q12bComment_1"/>
							</section>
		
						</section>
		
						<section class="row">
							<section class="left">
								12c. Injectable methergine
							</section>
							<section class="center">
								<select class="cloned left-combo" name="q12cIntectableErgomtrine_1" id="q12cIntectableErgomtrine_1">
									<option>Yes </option>
									<option>No </option>
								</select>
								<input type="number" name="q12cNumber_1" id="q12cNumber_1"/>
							</section>
							<section class="right">
								<input type="text" name="q12cComment_1" id="q12cComment_1"/>
							</section>
		
						</section>
		
						<section class="row">
							<section class="left">
								12d. Injectable
							</section>
							<section class="center">
								<select class="cloned left-combo" name="q12dInjectableHydralazinea_1" id="q12dInjectableHydralazinea_1">
									<option>Yes </option>
									<option>No </option>
								</select>
								<select class="cloned left-combo" name="q12dInjectableHydralazineb_1" id="q12dInjectableHydralazineb_1">
									<option>Hydralazine</option>
									<option>Apresoline</option>
								</select>
								<input type="number" name="q12dNumber_1" id="q12dNumber_1"/>
							</section>
							<section class="right">
								<input type="text" name="q12dComment_1" id="q12dComment_1" />
							</section>
		
						</section>
		
						<section class="row">
							<section class="left">
								12e. Injectable diazepam
							</section>
							<section class="center">
								<select class="cloned left-combo" name="q12eInjectableDiazepam_1" id="q12eInjectableDiazepam_1">
									<option>Yes </option>
									<option>No </option>
								</select>
								<input type="number" name="q12eNumber_1" id="q12eNumber_1"/>
							</section>
							<section class="right">
								<input type="text" name="q12eComment_1" id="q12eComment_1"/>
							</section>
		
						</section>
		
						<section class="row">
							<section class="left">
								12f. Injectable magnesium sulfate
							</section>
							<section class="center">
								<select class="cloned left-combo" name="q12fInjectableMagnesium_1" id="q12fInjectableMagnesium_1">
									<option>Yes </option>
									<option>No </option>
								</select>
								<input type="number" name="q12fNumber_1" id="q12fNumber_1"/>
							</section>
							<section class="right">
								<input type="text" name="q12fComment_1" id="q12fComment_1"/>
							</section>
		
						</section>
		
						<section class="row">
							<section class="left">
								12g. Injectable amoxicillin or ampicillin
							</section>
							<section class="center">
								<select class="cloned left-combo" name="q12gInjectableAmoxicillina_1" id="q12gInjectableAmoxicillina_1">
									<option>Yes </option>
									<option>No </option>
								</select>
								<select class="cloned left-combo" name="q12gInjectableAmoxicillinb_1" id="q12gInjectableAmoxicillinb_1">
									<option>Amoxicillin </option>
									<option>Ampicillin</option>
								</select>
		
								<input type="number" name="q12gNumber_1" id="q12gNumber_1" />
							</section>
							<section class="right">
								<input type="text" name="q12Comment_1" id="q12Comment_1" />
							</section>
		
						</section>
		
						<section class="row">
							<section class="left">
								12h. Injectable gentamicin
							</section>
							<section class="center">
								<select class="cloned left-combo" name="q12hInjectableGentamicin_1" id="q12hInjectableGentamicin_1">
									<option>Yes </option>
									<option>No </option>
								</select>
								<input type="number" name="q12hNumber_1" id="q12hNumber_1"/>
							</section>
							<section class="right">
								<input type="text" name="q12hComment_1"  id="q12hComment_1"/>
							</section>
		
						</section>
		
						<section class="row">
							<section class="left">
								12i. Calcium gluconate
							</section>
							<section class="center">
								<select class="cloned left-combo" name="q12iCalciumGluconate_1" id="q12iCalciumGluconate_1">
									<option>Yes </option>
									<option>No </option>
								</select>
								<input type="number" name="q12iNumber_1" id="q12iNumber_1"/>
							</section>
							<section class="right">
								<input type="text" name="q12iComment_1" id="q12iComment_1"/>
							</section>
		
						</section>
		
						<section class="row">
							<section class="left">
								12j. Methyldopa/Aldomet
							</section>
							<section class="center">
								<select class="cloned left-combo" name="q12jMethyldopa_1" id="q12jMethyldopa_1">
									<option>Yes </option>
									<option>No </option>
								</select>
								<input type="number" name="q12jNumber_1" id="q12jNumber_1"/>
							</section>
							<section class="right">
								<input type="text" name="q12jComment_1" id="q12jComment_1"/>
							</section>
		
						</section>
		
						<section class="row">
							<section class="left">
								12k. Lidocaine (lignocaine) or other local anesthetic
							</section>
							<section class="center">
								<select class="cloned left-combo" name="q12kLidocaine_1" id="q12kLidocaine_1">
									<option>Yes </option>
									<option>No </option>
								</select>
								<input type="number" name="q12kNumber_1" id="q12kNumber_1"/>
							</section>
							<section class="right">
								<input type="text" name="q12kComment_1" id="q12kComment_1"/>
							</section>
		
						</section>
		
						<section class="row">
							<section class="left">
								12l. Nifedipine Tablets
							</section>
							<section class="center">
								<select class="cloned left-combo" name="q12lNifedipine_1" id="q12lNifedipine_1">
									<option>Yes </option>
									<option>No </option>
								</select>
								<input type="number" name="q12lNumber_1" id="q12lNumber_1" />
							</section>
							<section class="right">
								<input type="text" />
							</section>
		
						</section>
		
						<section class="row">
							<section class="left">
								12m. Vitamin A
							</section>
							<section class="center">
								<select class="cloned left-combo" name="q12mVitaminA_1" id="q12mVitaminA_1">
									<option>Yes </option>
									<option>No </option>
								</select>
								<input type="number" name="q12mNumber_1" id="q12mNumber_1" />
							</section>
							<section class="right">
								<input type="text" name="q12mComment_1" id="q12mComment_1"/>
							</section>
		
						</section>
		
						<section class="row">
							<section class="left">
								12n. Vitamin K
							</section>
							<section class="center">
								<select class="cloned left-combo" name="q12nVitaminK_1" id="q12nVitaminK_1">
									<option>Yes </option>
									<option>No </option>
								</select>
								<input type="number" name="q12nNumber_1" id="q12nNumber_1"/>
							</section>
							<section class="right">
								<input type="text" name="q12nComment_1" id="q12nComment_1"/>
							</section>
		
						</section>
		
						<section class="row">
							<section class="left">
								12o. Oxygen
							</section>
							<section class="center">
								<select class="cloned left-combo" name="q12oOxygena_1" id="q12oOxygena_1">
									<option>Yes </option>
									<option>No </option>
								</select>
								<select class="cloned left-combo" name="q12oOxygenb_1" id="q12oOxygenb_1">
									<option>Cylinder</option>
									<option>Concentrator</option>
								</select>
								<input type="number" name="q12oNumber_1" id="q12oNumber_1" />
							</section>
							<section class="right">
								<input type="text" name="q12oComment_1" id="q12oComment_1" />
							</section>
		
						</section>
		
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
>>>>>>> upstream/master
						<section class="left">
							13a. Does this facility perform newborn resuscitation?
						</section>
						<section class="right">
							<select name="q13aYA_1" id="q13aYA_1">
								<option> Yes </option>
								<option> No </option>
							</select>
						</section>
						<section class="row">
							<section class="left">
								13b. Has this facility performed newborn resuscitation in the last 3 months with bag and mask?
							</section>
							<section class="right">
								<select name="q13bYAD_1" id="q13bYAD_1">
									<option> Yes </option>
									<option> No </option>
									<option> Do Not Know </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
						</section>
						<section class="row-title">
							<section class="left">
								<label class="dcah-label">14. EQUIPMENT AND SUPPLIES FOR NEWBORN CARE</label>
							</section>
							<section class="center">
								<label class="dcah-label">Availability (a)</label>
							</section>
							<section class="center">
								<label class="dcah-label">Functioning (b)</label>
							</section>
							<section class="center">
		
							</section>
						</section>
		
						<section class="row">
							<section class="left">
								14a. Self inflating Neonatal Ambu bag ( 500 mls)
							</section>
							<section class="center">
								<select class="cloned left-combo" name="q14aYA_1" id="q14aYA_1">
									<option>Yes </option>
									<option>No </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" name="q14aNumber_1" id="q14aNumber_1"/>
							</section>
							<section class="right">
								<select name="q14aYAD_1" id="q14aYAD_1">
									<option> Yes </option>
									<option> No </option>
									<option> Do Not Know </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
		
						</section>
		
						<section class="row">
							<section class="left">
								14b. Infant masks
							</section>
							<section class="center">
								<select class="cloned left-combo" name="q14bYA_1" id="q14bYA_1">
									<option>Yes </option>
									<option>No </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" name="q14bNumber_1" id="q14bNumber_1"/>
								<select name="q14bMaskSize_1" id="q14bMaskSize_1">
									<option>Size 0</option>
									<option>Size 1</option>
									<option>Size 2</option>
								</select>
							</section>
							<section class="right">
								<select name="q14bYAD_1" id="q14bYAD_1">
									<option> Yes </option>
									<option> No </option>
									<option> Do Not Know </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
		
						</section>
		
						<section class="row">
							<section class="left">
								14c. Clock  with seconds arm
							</section>
							<section class="center">
								<select class="cloned left-combo" name="q14cYA_1" id="q14cYA_1">
									<option>Yes </option>
									<option>No </option>
								</select>
		
							</section>
							<section class="right">
								<select name="q14cYAD_1" id="q14cYAD_1">
									<option> Yes </option>
									<option> No </option>
									<option> Do Not Know </option>
								</select>
		
							</section>
						</section>
		
						<section class="row">
							<section class="left">
								14d. Neonatal Incubator
							</section>
							<section class="center">
								<select class="cloned left-combo" name="q14dYA_1" id="q14dYA_1">
									<option>Yes </option>
									<option>No </option>
								</select>
								<input type="number" name="q14dNumber_1" id="q14dNumber_1"/>
							</section>
							<section class="right">
								<select name="q14dYAD_1" id="q14dYAD_1">
									<option> Yes </option>
									<option> No </option>
									<option> Do Not Know </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
						</section>
		
						<section class="row">
							<section class="left">
								14e. A Radiant Heater
							</section>
							<section class="center">
								<select class="cloned left-combo" name="q14eYA_1" id="q14eYA_1">
									<option>Yes </option>
									<option>No </option>
								</select>
								<input type="number" name="q14eNumber_1" id="q14eNumber_1"/>
							</section>
							<section class="right">
								<select name="q14eYAD_1" id="q14eYAD_1">
									<option> Yes </option>
									<option> No </option>
									<option> Do Not Know </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
						</section>
		
						<section class="row">
							<section class="left">
								14f. Infant Scale
							</section>
							<section class="center">
								<select class="cloned left-combo" name="q14fYA_1" id="q14fYA_1">
									<option>Yes </option>
									<option>No </option>
								</select>
								<input type="number" name="q14fNumbera_1" id="q14fNumbera_1"/>
							</section>
							<section class="right">
								<select name="q14fYAD_1" id="q14fYAD_1">
									<option> Yes </option>
									<option> No </option>
									<option> Do Not Know </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number"  name="q14fNumberb_1" id="q14fNumberb_1"/>
		
							</section>
						</section>
		
						<section class="row">
							<section class="left">
								14g. Suction bulb for mucus extraction
							</section>
							<section class="center">
								<select class="cloned left-combo" name="q14gYA_1" id="q14gYA_1">
									<option>Yes </option>
									<option>No </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" name="q14gNumbera_1" id="q14gNumbera_1"/>
								<section class="right">
									<select name="q14gYAD_1" id="q14gYAD_1">
										<option> Yes </option>
										<option> No </option>
										<option> Do Not Know </option>
									</select>
									<p>
										Quantity:
									<p/>
									<input type="number" name="q14gNumberb_1" id="q14gNumberb_1"/>
								</section>
							</section>
						</section>
		
						<section class="row">
							<section class="left">
								14h. Suction apparatus for use with catheter
							</section>
							<section class="center">
								<select class="cloned left-combo" name="q14jYA_1" id="q14jYA_1">
									<option>Yes </option>
									<option>No </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" name="q14hNumbera_1" id="q14hNumbera_1"/>
							</section>
							<section class="right">
								<select name="q14jYAD_1" id="q14jYAD_1">
									<option> Yes </option>
									<option> No </option>
									<option> Do Not Know </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" name="q14hNumberb_1" id="q14hNumberb_1"/>
							</section>
						</section>
		
						<section class="row">
							<section class="left">
								14i. A flat, clean, dry and warm newborn resuscitation surface
							</section>
							<section class="center">
								<select class="cloned left-combo" name="q14iYA_1" id="q14iYA_1">
									<option>Yes </option>
									<option>No </option>
								</select>
		
							</section>
							<section class="right">
								<select name="q14iYAD_1" id="q14iYAD_1">
									<option> Yes </option>
									<option> No </option>
									<option> Do Not Know </option>
								</select>
		
							</section>
						</section>
		
						<section class="row">
							<section class="left">
								14j. Disposable cord ties or clamps
							</section>
							<section class="center">
								<select class="cloned left-combo" name="q14jDisposableCord_1" id="q14jDisposableCord_1">
									<option>Yes </option>
									<option>No </option>
								</select>
		
							</section>
							<section class="right">
								<select name="q14jNumber_1" id="q14jYAD_1">
									<option> Yes </option>
									<option> No </option>
									<option> Do Not Know </option>
								</select>
		
							</section>
						</section>
		
						<section class="row">
							<section class="left">
								14k. Clean and warm towels/cloths for drying / warming / wrapping baby
							</section>
							<section class="center">
								<select class="cloned left-combo" name="q14kCleanTowels_1" id="q14kCleanTowels_1">
									<option>Yes </option>
									<option>No </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" name="q14kNumbera_1" id="q14kNumbera_1"/>
							</section>
							<section class="right">
								<select name="q14kYAD_1" id="q14kYAD_1">
									<option> Yes </option>
									<option> No </option>
									<option> Do Not Know </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" name="q14kNumberb_1" id="q14kNumberb_1"/>
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
								<select name="q15BloodTransfusions_1">
									<option>Yes</option>
									<option>No</option>
								</select>
							</section>
						</section>
		
						<section class="row">
							<section class="left">
								16. Is there a Blood Bank available?
							</section>
							<section class="center">
								<select name="q16BloodBank_1">
									<option>Yes</option>
									<option>No</option>
								</select>
							</section>
						</section>
		
						<section class="row">
							<section class="left">
								17. Does this facility ever perform caesarean sections?
							</section>
							<section class="center">
								<select>
									<option> Yes</option>
									<option> No</option>
								</select>
							</section>
							<section class="row hide" style="display:true">
								<section class="left" >
									<label class="dcah-label"> If Yes, how many caesarean sections were performed in August 2012</label>
								</section>
								<section class="right">
									<section class="col">
										<input type="number" name="ortDehydrationLocation" id="ortDehydrationLocation"  value=""/>
									</section>
								</section>
							</section>
						</section>
						<section class="row-title">
							For Level 4, 5 and 6 Facilities
						</section>
						<section class="row">
							<section class="left">
								18a. Operating Table
							</section>
							<section class="center">
								<select class="cloned left-combo" name="" id="">
									<option>Yes </option>
									<option>No </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
							<section class="center">
								<select>
									<option> Yes </option>
									<option> No </option>
									<option> Dont Know </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
		
						</section>
		
						<section class="row">
							<section class="left">
								18b. Operating Light
							</section>
							<section class="center">
								<select class="cloned left-combo" name="" id="">
									<option>Yes </option>
									<option>No </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
							<section class="center">
								<select>
									<option> Yes </option>
									<option> No </option>
									<option> Dont Know </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
						</section>
		
						<section class="row">
							<section class="left">
								18c. Anaesthetic machine
							</section>
							<section class="center">
								<select class="cloned left-combo" name="" id="">
									<option>Yes </option>
									<option>No </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
							<section class="center">
								<select>
									<option> Yes </option>
									<option> No </option>
									<option> Dont Know </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
						</section>
		
						<section class="row">
							<section class="left">
								18d. Laryngoscopes
							</section>
							<section class="center">
								<select class="cloned left-combo" name="" id="">
									<option>Yes </option>
									<option>No </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
							<section class="center">
								<select>
									<option> Yes </option>
									<option> No </option>
									<option> Dont Know </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
						</section>
		
						<section class="row">
							<section class="left">
								18e. Endotracheal tubes
							</section>
							<section class="center">
								<select class="cloned left-combo" name="" id="">
									<option>Yes </option>
									<option>No </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
							<section class="center">
								<select>
									<option> Yes </option>
									<option> No </option>
									<option> Dont Know </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
						</section>
		
						<section class="row">
							<section class="left">
								18f. Anaesthetic drugs e.g ketamine
							</section>
							<section class="center">
								<select class="cloned left-combo" name="" id="">
									<option>Yes </option>
									<option>No </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
							<section class="center">
								<select>
									<option> Yes </option>
									<option> No </option>
									<option> Dont Know </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
						</section>
		
						<section class="row">
							<section class="left">
								18g. Anaesthetic gases (halothane, NO2, Oxygen, etc)
							</section>
							<section class="center">
								<select class="cloned left-combo" name="" id="">
									<option>Yes </option>
									<option>No </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
							<section class="center">
								<select>
									<option> Yes </option>
									<option> No </option>
									<option> Dont Know </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
						</section>
		
						<section class="row">
							<section class="left">
								18h. Drugs and supplies for spinal anesthesia (e.g. Spinal needle)
							</section>
							<section class="center">
								<select class="cloned left-combo" name="" id="">
									<option>Yes </option>
									<option>No </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
							<section class="center">
								<select>
									<option> Yes </option>
									<option> No </option>
									<option> Dont Know </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
						</section>
<<<<<<< HEAD
					</section>
				</section>
				<section class="left">
					13a. Does this facility perform newborn resuscitation?
				</section>
>>>>>>> upstream/master
				<section class="right">
					<select name="q13aYA_1" id="q13aYA_1">
						<option> Yes </option>
						<option> No </option>
					</select>
				</section>
				<section class="row">
					<section class="left">
						13b. Has this facility performed newborn resuscitation in the last 3 months with bag and mask?
					</section>
					<section class="right">
						<select name="q13bYAD_1" id="q13bYAD_1">
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>
						<p>
							Quantity:
						<p/>
						<input type="number" />
					</section>
				</section>
				<section class="row-title">
					<section class="left">
						<label class="dcah-label">14. EQUIPMENT AND SUPPLIES FOR NEWBORN CARE</label>
					</section>
					<section class="center">
						<label class="dcah-label">Availability (a)</label>
					</section>
					<section class="center">
						<label class="dcah-label">Functioning (b)</label>
					</section>
					<section class="center">

					</section>
				</section>

				<section class="row">
					<section class="left">
						14a. Self inflating Neonatal Ambu bag ( 500 mls)
					</section>
					<section class="center">
						<select class="cloned left-combo" name="q14aYA_1" id="q14aYA_1">
							<option>Yes </option>
							<option>No </option>
						</select>
						<p>
							Quantity:
						<p/>
						<input type="number" name="q14aNumber_1" id="q14aNumber_1"/>
					</section>
					<section class="right">
						<select name="q14aYAD_1" id="q14aYAD_1">
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>
						<p>
							Quantity:
						<p/>
						<input type="number" />
					</section>

				</section>

				<section class="row">
					<section class="left">
						14b. Infant masks
					</section>
					<section class="center">
						<select class="cloned left-combo" name="q14bYA_1" id="q14bYA_1">
							<option>Yes </option>
							<option>No </option>
						</select>
						<p>
							Quantity:
						<p/>
						<input type="number" name="q14bNumber_1" id="q14bNumber_1"/>
						<select name="q14bMaskSize_1" id="q14bMaskSize_1">
							<option>Size 0</option>
							<option>Size 1</option>
							<option>Size 2</option>
						</select>
					</section>
					<section class="right">
						<select name="q14bYAD_1" id="q14bYAD_1">
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>
						<p>
							Quantity:
						<p/>
						<input type="number" />
					</section>

				</section>

				<section class="row">
					<section class="left">
						14c. Clock  with seconds arm
					</section>
					<section class="center">
						<select class="cloned left-combo" name="q14cYA_1" id="q14cYA_1">
							<option>Yes </option>
							<option>No </option>
						</select>

					</section>
					<section class="right">
						<select name="q14cYAD_1" id="q14cYAD_1">
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>

					</section>
				</section>

				<section class="row">
					<section class="left">
						14d. Neonatal Incubator
					</section>
					<section class="center">
						<select class="cloned left-combo" name="q14dYA_1" id="q14dYA_1">
							<option>Yes </option>
							<option>No </option>
						</select>
						<input type="number" name="q14dNumber_1" id="q14dNumber_1"/>
					</section>
					<section class="right">
						<select name="q14dYAD_1" id="q14dYAD_1">
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>
						<p>
							Quantity:
						<p/>
						<input type="number" />
					</section>
				</section>

				<section class="row">
					<section class="left">
						14e. A Radiant Heater
					</section>
					<section class="center">
						<select class="cloned left-combo" name="q14eYA_1" id="q14eYA_1">
							<option>Yes </option>
							<option>No </option>
						</select>
						<input type="number" name="q14eNumber_1" id="q14eNumber_1"/>
					</section>
					<section class="right">
						<select name="q14eYAD_1" id="q14eYAD_1">
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>
						<p>
							Quantity:
						<p/>
						<input type="number" />
					</section>
				</section>

				<section class="row">
					<section class="left">
						14f. Infant Scale
					</section>
					<section class="center">
						<select class="cloned left-combo" name="q14fYA_1" id="q14fYA_1">
							<option>Yes </option>
							<option>No </option>
						</select>
						<input type="number" name="q14fNumbera_1" id="q14fNumbera_1"/>
					</section>
					<section class="right">
						<select name="q14fYAD_1" id="q14fYAD_1">
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>
						<p>
							Quantity:
						<p/>
						<input type="number"  name="q14fNumberb_1" id="q14fNumberb_1"/>

					</section>
				</section>

				<section class="row">
					<section class="left">
						14g. Suction bulb for mucus extraction
					</section>
					<section class="center">
						<select class="cloned left-combo" name="q14gYA_1" id="q14gYA_1">
							<option>Yes </option>
							<option>No </option>
						</select>
						<p>
							Quantity:
						<p/>
						<input type="number" name="q14gNumbera_1" id="q14gNumbera_1"/>
						<section class="right">
							<select name="q14gYAD_1" id="q14gYAD_1">
								<option> Yes </option>
								<option> No </option>
								<option> Do Not Know </option>
							</select>
							<p>
								Quantity:
							<p/>
							<input type="number" name="q14gNumberb_1" id="q14gNumberb_1"/>
=======
		
						<section class="row">
							<section class="left">
								18i. Scrub area adjacent to or in the operating room
							</section>
							<section class="center">
								<select class="cloned left-combo" name="" id="">
									<option>Yes </option>
									<option>No </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
							<section class="center">
								<select>
									<option> Yes </option>
									<option> No </option>
									<option> Dont Know </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
>>>>>>> upstream/master
						</section>
		
						<section class="row">
							<section class="left">
								18j. Running Water
							</section>
							<section class="center">
								<select class="cloned left-combo" name="" id="">
									<option>Yes </option>
									<option>No </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
							<section class="center">
								<select>
									<option> Yes </option>
									<option> No </option>
									<option> Dont Know </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
						</section>
		
						<section class="row">
							<section class="left">
								18k. Suction Machine
							</section>
							<section class="center">
								<select class="cloned left-combo" name="" id="">
									<option>Yes </option>
									<option>No </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
							<section class="center">
								<select>
									<option> Yes </option>
									<option> No </option>
									<option> Dont Know </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
						</section>
		
						<section class="row">
							<section class="left">
								18l. Standard Cesaerian section kit
							</section>
							<section class="center">
								<select class="cloned left-combo" name="" id="">
									<option>Yes </option>
									<option>No </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
							<section class="center">
								<select>
									<option> Yes </option>
									<option> No </option>
									<option> Dont Know </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
						</section>
		
						<section class="row">
							<section class="left">
								18m. Sterile operation gowns
							</section>
							<section class="center">
								<select class="cloned left-combo" name="" id="">
									<option>Yes </option>
									<option>No </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
							<section class="center">
								<select>
									<option> Yes </option>
									<option> No </option>
									<option> Dont Know </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
						</section>
		
						<section class="row">
							<section class="left">
								18n. Sterile Drapes
							</section>
							<section class="center">
								<select class="cloned left-combo" name="" id="">
									<option>Yes </option>
									<option>No </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
							<section class="center">
								<select>
									<option> Yes </option>
									<option> No </option>
									<option> Dont Know </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
						</section>
		
						<section class="row">
							<section class="left">
								18o. Sterile gloves in various sizes (6.5 -9)
							</section>
							<section class="center">
								<select class="cloned left-combo" name="" id="">
									<option>Yes </option>
									<option>No </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
							<section class="center">
								<select>
									<option> Yes </option>
									<option> No </option>
									<option> Dont Know </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
						</section>
		
						<section class="row">
							<section class="left">
								18p. IV canulas
							</section>
							<section class="center">
								<select class="cloned left-combo" name="" id="">
									<option>Yes </option>
									<option>No </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
							<section class="center">
								<select>
									<option> Yes </option>
									<option> No </option>
									<option> Dont Know </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
						</section>
		
						<section class="row">
							<section class="left">
								18q. Drip Stand
							</section>
							<section class="center">
								<select class="cloned left-combo" name="" id="">
									<option>Yes </option>
									<option>No </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
							<section class="center">
								<select>
									<option> Yes </option>
									<option> No </option>
									<option> Dont Know </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
						</section>
		
						<section class="row">
							<section class="left">
								18r. Blood transfusion set
							</section>
							<section class="center">
								<select class="cloned left-combo" name="" id="">
									<option>Yes </option>
									<option>No </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
							<section class="center">
								<select>
									<option> Yes </option>
									<option> No </option>
									<option> Dont Know </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
						</section>
		
						<section class="row">
							<section class="left">
								18s. Recovery room/ recovery area
							</section>
							<section class="center">
								<select class="cloned left-combo" name="" id="">
									<option>Yes </option>
									<option>No </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
							</section>
							<section class="center">
								<select>
									<option> Yes </option>
									<option> No </option>
									<option> Dont Know </option>
								</select>
								<p>
									Quantity:
								<p/>
								<input type="number" />
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