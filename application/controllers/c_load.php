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

	<h3 align="center"> CHILD HEALTH COMMODITIES ASSESSMENT</h3>

	
	
	

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
		<section class="column-wide">
			<section class="row-title">
				<section class="left">
					<label class="dcah-label">Inventory Type: Labor &amp; Delivery</label>
				</section>
				<section class="center">
					<label class="dcah-label">ANSWER</label>
				</section>

			</section>
			
			<section class="row">
				<section class="left">
					4. Does the facility provide for delivery services?
				</section>
				<section class="center cloned" >

					<select name="lndq4FacilityDelivery" id="lndq4FacilityDelivery" class="cloned left-combo">
						<option value="" selected="selected">Select One</option>
						<option value="Yes">Yes</option>
						<option value="No">No</option>
					</select>
				</section>
				
				<section id="q4comm" class="right" style="display: none">
					<input type="text" name="lndq4Comment" id="lndq4Comment" class="cloned"/>

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
				
				<section id="q5comm" class="right" style="display: none">
					<input type="text" name="lndq5Comment" id="lndq5Comment" class="cloned"/>

				</section>

			</section>
			<section class="row">
				<section class="left">
					6a. Is a person skilled in conducting deliveries present  at the facility or on call 24 hours a day,
					including weekends, to provide delivery care?
				</section>
				<section class="center cloned">

					<select name="lndq6aConductingDelivery" id="lndq6aConductingDelivery" class="cloned left-combo">
						<option value="" selected="selected">Select One</option>
						<option value="Yes">Yes</option>
						<option value="No">No</option>
					</select>
				</section>
			</section>
			<section id="q6ay" class="row" style="display: none">
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
					<label for="lndq6otherProvider">Others(Specify)</label>
					<input type="text" id="lndq6otherProvider" name="lndq6otherProvider" maxlength="55" placeholder="provider1,provider2,...,"/>

				</section>
			</section>
			<section class="row">
				<section class="left">
					7. Indicate the total number of beds in the maternity ward / unit in this facility*
				</section>
				<section class="right">

					<input type="number" name="lndq7TotalBeds" id="lndq7TotalBeds" class="cloned fromZero" min="0" style="float:left"/>

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
			
			<section id="tableEquipmentList">
	    	<section class="row2">
	    	<input type="button" id="editEquipmentListTopButton" name="editEquipmentListTopButton" class="awesome myblue medium" value="Edit List"/>
	    	</section>

			<section class="row" id="tr_1">
				<section class="left">
					9a. Examination light
				</section>

				

				<section class="center">
					<select class="cloned left-combo" name="q9equipAvailability_1" id="q9equipAvailability_1">
						<option value="" selected="selected">Select One</option>
						<option>Yes </option>
						<option>No </option>
					</select>

					<input name="q9equipAQty_1" type="number" class="cloned fromZero" min="0"/>
				</section>
				<section class="right">
					<select name="q9equipFunctioning_1" id="q9equipFunctioning_1" class="cloned">
						<option value="" selected="selected">Select One</option>
						<option> Yes </option>
						<option> No </option>
						<option> Do Not Know </option>
					</select>

					<input name="q9equipFQty_1" type="number" class="cloned fromZero" min="0"/>
				</section>
                <input type="hidden"  name="q9equipCode_1" id="q9equipCode_1" value="EQP31" />
			</section>

			<section class="row" id="tr_2">
				<section class="left">
					9b. Delivery bed/ couch
				</section>

				

				<section class="center">
					<select class="cloned left-combo" name="q9equipAvailability_2" id="q9equipAvailability_2">
						<option value="" selected="selected">Select One</option>
						<option>Yes </option>
						<option>No </option>
					</select>

					<input name="q9equipAQty_2" type="number" class="cloned fromZero" min="0"/>
				</section>
				<section class="right">
					
				<select name="q9equipFunctioning_2" id="q9equipFunctioning_2" class="cloned">
						<option value="" selected="selected">Select One</option>
						<option> Yes </option>
						<option> No </option>
						<option> Do Not Know </option>
					</select>

					<input name="q9equipFQty_2" type="number" class="cloned fromZero" min="0"/>
				</section>
			<input type="hidden"  name="q9equipCode_2" id="q9equipCode_2" value="EQP32" />
			</section>


			<section class="row" id="tr_3">
				<section class="left">
					9c. Drip stand
				</section>
				
				<section class="center">
					<select class="cloned left-combo" name="q9equipAvailability_3" id="q9equipAvailability_3">
                        <option value="" selected="selected">Select One</option>
						<option>Yes </option>
						<option>No </option>
					</select>

					<input name="q9equipAQty_3" type="number" class="cloned fromZero" min="0"/>
				</section>

				<section class="right">
					<select name="q9equipFunctioning_3" id="q9equipFunctioning_3" class="cloned">
						<option value="" selected="selected">Select One</option>
						<option> Yes </option>
						<option> No </option>
						<option> Do Not Know </option>
					</select>

					<input name="q9equipFQty_3" type="number" class="cloned fromZero" min="0"/>
				</section>
			<input type="hidden"  name="q9equipCode_3" id="q9equipCode_3" value="EQP33" />
			</section>


			<section class="row" id="tr_4">
				<section class="left">
					9d.Mackintosh (On the Delivery Couch)
				</section>
				
				<section class="center">
					<select class="cloned left-combo" name="q9equipAvailability_4" id="q9equipAvailability_4">
						<option value="" selected="selected">Select One</option>
						<option>Yes </option>
						<option>No </option>
					</select>


					<input name="q9equipAQty_4" type="number" class="cloned fromZero" min="0"/>
				</section>
				<section class="right">
					<select name="q9equipFunctioning_4" id="q9equipFunctioning_4" class="cloned">
						<option value="" selected="selected">Select One</option>
						<option> Yes </option>
						<option> No </option>
						<option> Do Not Know </option>
					</select>


					<input name="q9equipFQty_4" type="number" class="cloned fromZero" min="0"/>

				</section>
			<input type="hidden"  name="q9equipCode_4" id="q9equipCode_4" value="EQP34" />
			</section>


			<section class="row" id="tr_5">
				<section class="left">
					9e. Linen(Draping)
				</section>
				
				<section class="center">
					<select class="cloned left-combo" name="q9equipAvailability_5" id="q9equipAvailability_5">
						<option value="" selected="selected">Select One</option>
						<option>Yes </option>
						<option>No </option>
					</select>


					<input name="q9equipAQty_5" type="number" class="cloned fromZero" min="0"/>
				</section>
				<section class="right">
					
				<select name="q9equipFunctioning_5" id="q9equipFunctioning_5" class="cloned">
						<option value="" selected="selected">Select One</option>
						<option> Yes </option>
						<option> No </option>
						<option> Do Not Know </option>
					</select>


				<input name="q9equipFQty_5" type="number" class="cloned fromZero" min="0"/>

				</section>
			<input type="hidden"  name="q9equipCode_5" id="q9equipCode_5" value="EQP35" />
			</section>


			<section class="row" id="tr_6">
				<section class="left">
					9f.i. Linen(Delivery Couch)
				</section>
				
				<section class="center">
					<select class="cloned left-combo" name="q9equipAvailability_6" id="q9equipAvailability_6">
						<option value="" selected="selected">Select One</option>
						<option>Yes </option>
						<option>No </option>
					</select>


					<input name="q9equipAQty_6" type="number" class="cloned fromZero" min="0"/>
				</section>
				<section class="right">
					<select name="q9equipFunctioning_6" id="q9equipFunctioning_6" class="cloned">
						<option value="" selected="selected">Select One</option>
						<option> Yes </option>
						<option> No </option>
						<option> Do Not Know </option>
					</select>


					<input name="q9equipFQty_6" type="number" class="cloned fromZero" min="0"/>

				</section>
			<input type="hidden"  name="q9equipCode_6" id="q9equipCode_6" value="EQP36" />
			</section>


			<section class="row" id="tr_7">
				<section class="left">
					9f.ii. Linen(Green Towels)
				</section>
				
				<section class="center">
					<select class="cloned left-combo" name="q9equipAvailability_7" id="q9equipAvailability_7">
						<option value="" selected="selected">Select One</option>
						<option>Yes </option>
						<option>No </option>
					</select>


					<input name="q9equipAQty_7" type="number" class="cloned fromZero" min="0"/>
				</section>
				<section class="right">
					<select name="q9equipFunctioning_7" id="q9equipFunctioning_7" class="cloned">
						<option value="" selected="selected">Select One</option>
						<option> Yes </option>
						<option> No </option>
						<option> Do Not Know </option>
					</select>


					<input name="q9equipFQty_7" type="number" class="cloned fromZero" min="0"/>

				</section>
			<input type="hidden"  name="q9equipCode_7" id="q9equipCode_7" value="EQP37" />
			</section>

			<section class="row" id="tr_8">
				<section class="left">
					9g. Sharps container
				</section>
				
				<section class="center">
					<select class="cloned left-combo" name="q9equipAvailability_8" id="q9equipAvailability_8">
						<option value="" selected="selected">Select One</option>
						<option>Yes </option>
						<option>No </option>
					</select>

					<input name="q9equipAQty_8" type="number" class="cloned fromZero" min="0"/>
				</section>
				<section class="right">

					<select name="q9equipFunctioning_8" id="q9equipFunctioning_8" class="cloned">

						<option value="" selected="selected">Select One</option>
						<option> Yes </option>
						<option> No </option>
						<option> Do Not Know </option>
					</select>

					<input name="q9equipFQty_8" type="number" class="cloned fromZero" min="0"/>
				</section>
			<input type="hidden"  name="q9equipCode_8" id="q9equipCode_8" value="EQP38" />
			</section>


			<section class="row" id="tr_9">
				<section class="left">
					9h. At least five or more 2-ml or 5-ml disposable syringes
				</section>
				
				<section class="center">
					<select class="cloned left-combo" name="q9equipAvailability_9" id="q9equipAvailability_9">
						<option value="" selected="selected">Select One</option>
						<option>Yes </option>
						<option>No </option>
					</select>

				</section>
				<input type="hidden"  name="q9equipCode_9" id="q9equipCode_9" value="EQP39" />
				</section>

				<section class="row" id="tr_10">
					<section class="left">
						9i. Three properly labeled or colour coded IP buckets
					</section>
					

					<section class="center">
						<select class="cloned left-combo" name="q9equipAvailability_10" id="q9equipAvailability_10">
							<option value="" selected="selected">Select One</option>
							<option>Yes </option>
							<option>No </option>
						</select>

					</section>
				<input type="hidden"  name="q9equipCode_10" id="q9equipCode_10" value="EQP40" />
				</section>

				<section class="row" id="tr_11">
					<section class="left">
						9j. High Level Chemical Disinfectant (Jik, Cidex)
					</section>
					

					<section class="center">
						<select class="cloned left-combo" name="q9equipAvailability_11" id="q9equipAvailability_11">
							<option value="" selected="selected">Select One</option>
							<option>Always </option>
							<option>Sometimes </option>
							<option>Never </option>
						</select>

					</section>
					<input type="hidden"  name="q9equipCode_11" id="q9equipCode_11" value="EQP41" />
					</section>

					<section class="row" id="tr_12">
						<section class="left">
							9k. Soap for washing instruments (constantly available)
						</section>
						

						<section class="center">
							<select class="cloned left-combo" name="q9equipAvailability_12" id="q9equipAvailability_12">
								<option value="" selected="selected">Select One</option>
								<option>Always Available</option>
								<option>Sometimes Available</option>
								<option>Never Available</option>
							</select>

						</section>
						<section class="right">
							<select name="q9equipFunctioning_12" id="q9equipFunctioning_12" class="cloned">
								<option value="" selected="selected">Select One</option>
								<option> Yes </option>
								<option> No </option>
								<option> Do Not Know </option>
							</select>

						</section>
					<input type="hidden"  name="q9equipCode_12" id="q9equipCode_12" value="EQP42" />
					</section>

					<section class="row" id="tr_13">
						<section class="left">
							9l.Soap for handwashing (constantly available)
						</section>
						<section class="center">
							<select class="cloned left-combo" name="q9equipAvailability_13" id="q9equipAvailability_13">
								<option value="" selected="selected">Select One</option>
								<option>Always Available</option>
								<option>Sometimes Available</option>
								<option>Never Available</option>
							</select>

						</section>
						<section class="right">
							<select name="q9equipFunctioning_13" id="q9equipFunctioning_13" class="cloned">
								<option value="" selected="selected">Select One</option>
								<option> Yes </option>
								<option> No </option>
								<option> Do Not Know </option>
							</select>

						</section>
					<input type="hidden"  name="q9equipCode_13" id="q9equipCode_13" value="EQP43" />
					</section>


					<section class="row" id="tr_14">
						<section class="left">
							9m.Properly Labelled or colour coded waste segragation bins
						</section>
						

						<section class="center">

							<select class="cloned left-combo" name="q9equipAvailability_14" id="q9equipAvailability_14">
								<option value="" selected="selected">Select One</option>

								<option>Yes </option>
								<option>No </option>
							</select>

							<input name="q9equipAQty_14" type="number" class="cloned fromZero" min="0"/>
						<input type="hidden"  name="q9equipCode_14" id="q9equipCode_14" value="EQP44" />
						</section>
						</section>
					

						<section class="row" id="tr_15">
							<section class="left">
								9o. Single-use hand-drying towels (constantly available)
							</section>
							

							<section class="center">

								<select class="cloned left-combo" name="q9equipAvailability_15" id="q9equipAvailability_15">
									<option value="" selected="selected">Select One</option>

									<option>Always Available</option>
									<option>Sometimes Available</option>
									<option>Never Available</option>
								</select>

							</section>
							<section class="right">

								<select name="q9equipFunctioning_15" id="q9equipFunctioning_15" class="cloned">

									<option value="" selected="selected">Select One</option>
									<option> Yes </option>
									<option> No </option>
									<option> Do Not Know </option>
								</select>

							</section>
						<input type="hidden"  name="q9equipCode_15" id="q9equipCode_15" value="EQP45" />
						</section>
						
						<section class="row" id="tr_16">
							<section class="left">
								9p. Running  Water for handwashing (constantly available)
							</section>
							

							<section class="center">

								<select class="cloned left-combo" name="q9equipAvailability_16" id="q9equipAvailability_16">
									<option value="" selected="Selected">Select One</option>

									<option>Always Available</option>
									<option>Sometimes Available</option>
									<option>Never Available</option>
								</select>

							</section>
							<section class="right">
								<select name="q9equipFunctioning_16" id="q9equipFunctioning_16" class="cloned">

									<option value="" selected="selected">Select One</option>
									<option> Yes </option>
									<option> No </option>
									<option> Do Not Know </option>
								</select>

							</section>
						<input type="hidden"  name="q9equipCode_16" id="q9equipCode_16" value="EQP46" />
						</section>
					
					</section> <!--close editTable-->

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
								<section class="center">
									<input type="number" class="cloned fromZero" name="q10equipAQty_1" id="q10equipAQty_1" min="0"/>
								</section>
                               <input type="hidden"  name="q10equipCode_1" id="q10equipCode_1" value="EQP47"/>
							</section>

							<section class="row">
								<section class="left">
									10b. Long artery Forceps (straight, lockable)
								</section>
								<section class="center">
									<input type="number" class="cloned fromZero" name="q10equipAQty_2" id="q10equipAQty_2" min="0"/>
								</section>
								<input type="hidden"  name="q10equipCode_2" id="q10equipCode_2" value="EQP48" />
							</section>

							<section class="row">
								<section class="left">
									10c. Episiotomy scissors
								</section>


								<section class="center">
									<input type="number" class="cloned fromZero" name="q10equipAQty_3" id="q10equipAQty_3" min="0"/>
								</section>
								<input type="hidden"  name="q10equipCode_3" id="q10equipCode_3" value="EQP49" />
							   
							</section>

							<section class="row">
								<section class="left">
									10d. Kidney dishes
								</section>

								

								<section class="center">
									<input type="number" class="cloned fromZero" name="q10equipAQty_4" id="q10equipAQty_4" min="0"/>
								</section>
							   <input type="hidden"  name="q10equipCode_4" id="q10equipCode_4" value="EQP50" />
							</section>

							<section class="row">
								<section class="left">
									10e. Gallipots
								</section>
								<section class="center">
									<input type="number" class="cloned fromZero" name="q10equipAQty_5" id="q10equipAQty_5" min="0"/>
								</section>
							   <input type="hidden"  name="q10equipCode_5" id="q10equipCode_5" value="EQP51" />
							</section>

							<section class="row">
								<section class="left">
									10f. Sponge-holding forceps
								</section>

								<section class="center">
								<input type="number" class="cloned fromZero" name="q10equipAQty_6" id="q10equipAQty_6" min="0"/>
								</section>
								<input type="hidden"  name="q10equipCode_6" id="q10equipCode_6" value="EQP52" />
							</section>

							<section class="row">
								<section class="left">
									10g. Needle holder
								</section>

								

								<section class="center">
									<input type="number" class="cloned fromZero" name="q10equipAQty_7" id="q10equipAQty_7" min="0"/>
								</section>
								<input type="hidden"  name="q10equipCode_7" id="q10equipCode_7" value="EQP53" />
							</section>

							<section class="row">
								<section class="left">
									10h. Dissecting forceps -toothed
								</section>

								<section class="center">
									<input type="number" class="cloned fromZero" name="q10equipAQty_8" id="q10equipAQty_8" min="0"/>
								</section>
								<input type="hidden"  name="q10equipCode_8" id="q10equipCode_8" value="EQP54" />
							</section>

							<section class="row">
								<section class="left">
									10i. Instrument tray
								</section>

								<section class="center">
									<input type="number" class="cloned fromZero" name="q10equipAQty_9" id="q10equipAQty_9" min="0"/>
								</section>
								<input type="hidden"  name="q10equipCode_9" id="q10equipCode_9" value="EQP55" />

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
							
							
							<section id="tableEquipmentList_2">
					    	<section class="row2">
					    	<input type="button" id="editEquipmentListTopButton_2" name="editEquipmentListTopButton_2" class="awesome myblue medium" value="Edit List"/>
					    	</section>

							<section class="row" id="tr_17">
								<section class="left">
									11a. Stethoscopes (Adult)
								</section>
								

								<section class="center">
									<select class="cloned left-combo" name="q11equipAvailability_17" id="q11equipAvailability_17">
										<option value="" selected="selected">Select One</option>

										<option>Yes </option>
										<option>No </option>
									</select>


									<input name="q11equipAQty_17" type="number" class="cloned fromZero" min="0"/>
								</section>
								<section class="right">
									<select name="q11equipFunctioning_17" id="q11equipFunctioning_17" class="cloned">

										<option value="" selected="selected">Select One</option>
										<option> Yes </option>
										<option> No </option>
										<option> Do Not Know </option>
									</select>

									<input name="q11equipFQty_17" type="number" class="cloned fromZero" min="0"/>
								</section>
							<input type="hidden"  name="q11equipCode_17" id="q11equipCode_17" value="EQP56" />
							</section>

							<section class="row" id="tr_18">
								<section class="left">
									11b. Stethoscopes (Paediatric)
								</section>
			
								<section class="center">
									<select class="cloned left-combo" name="q11equipAvailability_18" id="q11equipAvailability_18">
										<option value="" selected="selected">Select One</option>

										<option>Yes </option>
										<option>No </option>
									</select>


									<input name="q11equipAQty_18" type="number" class="cloned fromZero" min="0"/>

								</section>
								<section class="right">

								<select name="q11equipFunctioning_18" id="q11equipFunctioning_18" class="cloned">
										<option value="" selected="selected">Select One</option>
										<option> Yes </option>
										<option> No </option>
										<option> Do Not Know </option>
									</select>

									<input name="q11equipFQty_18" type="number" class="cloned fromZero" min="0"/>
								</section>
                            <input type="hidden"  name="q11equipCode_18" id="q11equipCode_18" value="EQP57" />
							</section>


							<section class="row" id="tr_19">
								<section class="left">
									11c. BP machine
								</section>
								
								<section class="center">
									<select class="cloned left-combo" name="q11equipAvailability_19" id="q11equipAvailability_19">
										<option value="" selected="selected">Select One</option>

										<option>Yes </option>
										<option>No </option>
									</select>

								</section>
								<section class="right">

									
									<select name="q11equipFunctioning_19" id="q11equipFunctioning_19" class="cloned">

										<option value="" selected="selected">Select One</option>
										<option> Yes </option>
										<option> No </option>
										<option> Do Not Know </option>
									</select>

								</section>
							<input type="hidden"  name="q11equipCode_19" id="q11equipCode_19" value="EQP58" />
							</section>

							<section class="row" id="tr_20">
								<section class="left">
									11d.i. Clinical Thermometer
								</section>
								
								<section class="center">
									<select class="cloned left-combo" name="q11equipAvailability_20" id="q11equipAvailability_20">
										<option value="" selected="selected">Select One</option>

										<option>Yes </option>
										<option>No </option>
									</select>


									<input name="q11equipAQty_20" type="number" class="cloned fromZero" min="0"/>
								</section>
								<section class="right">
									<select name="q11equipFunctioning_20" id="q11equipFunctioning_20" class="cloned">

										<option value="" selected="selected">Select One</option>
										<option> Yes </option>
										<option> No </option>
										<option> Do Not Know </option>
									</select>

									<input name="q11equipFQty_20" type="number" class="cloned fromZero" min="0"/>
								</section>
								<input type="hidden"  name="q11equipCode_20" id="q11equipCode_20" value="EQP59" />
								</section>

								<section class="row" id="tr_21">
									<section class="left">
										11d.ii. Room Thermometer
									</section>
									
									<section class="center">
										<select class="cloned left-combo" name="q11equipAvailability_21" id="q11equipAvailability_21">
											<option value="" selected="selected">Select One</option>

											<option>Yes </option>
											<option>No </option>
										</select>



										<input name="q11equipAQty_21" type="number" class="cloned fromZero" min="0"/>
									</section>
									<section class="right">
										<select name="q11equipFunctioning_21" id="q11equipFunctioning_21" class="cloned">
										<option value="" selected="selected">Select One</option>

											<option> Yes </option>
											<option> No </option>
											<option> Do Not Know </option>
										</select>

										<input name="q11equipFQty_21" type="number" class="cloned fromZero" min="0"/>
									</section>
								<input type="hidden"  name="q11equipCode_21" id="q11equipCode_21" value="EQP60" />
								</section>

								<section class="row" id="tr_22">
									<section class="left">
										11e. Fetoscope
									</section>
									
									<section class="center">
										<select class="cloned left-combo" name="q11equipAvailability_22" id="q11equipAvailability_22">
											<option value="" selected="selected">Select One</option>

											<option>Yes </option>
											<option>No </option>
										</select>


										<input name="q11equipAQty_22" type="number" class="cloned fromZero" min="0"/>
									</section>
									<section class="right">
										<select name="q11equipFunctioning_22" id="q11equipFunctioning_22" class="cloned">

											<option value="" selected="selected">Select One</option>
											<option> Yes </option>
											<option> No </option>
											<option> Do Not Know </option>
										</select>

										<input name="q11equipFQty_22" type="number" class="cloned fromZero" min="0"/>
									</section>
								<input type="hidden"  name="q11equipCode_22" id="q11equipCode_22" value="EQP61" />
								</section>

								<section class="row" id="tr_23">
									<section class="left">
										11f. Sonicaid
									</section>
									
									<section class="center">
										<select class="cloned left-combo" name="q11equipAvailability_23" id="q11equipAvailability_23">
											<option value="" selected="selected">Select One</option>

											<option>Yes </option>
											<option>No </option>
										</select>


										<input name="q11equipAQty_23" type="number" class="cloned fromZero" min="0"/>
									</section>
									<section class="right">
										<select name="q11equipFunctioning_23" id="q11equipFunctioning_23" class="cloned">

											<option value="" selected="selected">Select One</option>
											<option> Yes </option>
											<option> No </option>
											<option> Do Not Know </option>
										</select>

										<input name="q11equipFQty_23" type="number" class="cloned fromZero" min="0"/>
									</section>
								<input type="hidden"  name="q11equipCode_23" id="q11equipCode_23" value="EQP62" />
								</section>

								<section class="row" id="tr_24">
									<section class="left">
										11g. Suction Machine
									</section>
									
									<section class="center">
										<select class="cloned left-combo" name="q11equipAvailability_24" id="q11equipAvailability_24">
											<option value="" selected="selected">Select One</option>
											<option>Yes </option>
											<option>No </option>
										</select>

										<input name="q11equipAQty_24" type="number" class="cloned fromZero" min="0"/>
									</section>
									<section class="right">
										<select name="q11equipFunctioning_24" id="q11equipFunctioning_24" class="cloned">
											<option value="" selected="selected">Select One</option>
											<option> Yes </option>
											<option> No </option>
											<option> Do Not Know </option>
										</select>

										<input name="q11equipFQty_24" type="number" class="cloned fromZero" min="0"/>
									</section>
								<input type="hidden"  name="q11equipCode_24" id="q11equipCode_24" value="EQP63" />
								</section>


								<section class="row" id="tr_25">
									<section class="left">
										11h. Weighing Scale for babies
									</section>
									
									<section class="center">
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
									</section>
									<section class="right">
										<select name="q11equipFunctioning_25" id="q11equipFunctioning_25" class="cloned">
											<option value="" selected="selected">Select One</option>
											<option> Yes </option>
											<option> No </option>
											<option> Do Not Know </option>
										</select>

										<input name="q11equipFQty_25" type="number" class="cloned fromZero" min="0"/>
									</section>
								<input type="hidden"  name="q11equipCode_25" id="q11equipCode_25" value="EQP64" />
								</section>


								<section class="row" id="tr_26">
									<section class="left">
										11i. Adult resuscitation tray
									</section>
									
									<section class="center">
										<select class="cloned left-combo" name="q11equipAvailability_26" id="q11equipAvailability_26">
											<option value="" selected="selected">Select One</option>
											<option>Yes </option>
											<option>No </option>
										</select>

										<input name="q11equipAQty_26" type="number" class="cloned fromZero" min="0"/>
									</section>
									<section class="right">
										
										<select name="q11equipFunctioning_26" id="q11equipFunctioning_26" class="cloned">
											<option value="" selected="selected">Select One</option>
											<option> Yes </option>
											<option> No </option>
											<option> Do Not Know </option>
										</select>

										<input name="q11equipFQty_26" type="number" class="cloned fromZero" min="0"/>
									</section>
								<input type="hidden"  name="q11equipCode_26" id="q11equipCode_26" value="EQP65" />
								</section>


								<section class="row" id="tr_27a">
									<section class="left">
										11j. Indicate the Sterilization Method(s) used or avaialable in this facility
									</section>
									
									<section class="center">
										<select name="sterilizationMethod" id="sterilizationMethod" class="cloned">

											<option selected="selected" value="">Select One</option>
											<option>Autoclave</option>
											<option>HLD</option>
											<option value="other">Other(specify)</option>

										</select>
										

										<input type="text" style="display:none" name="sterilizationMethodOther" id="sterilizationMethodOther"/>

									</section>
								</section>
							


							<section class="row" id="tr_27">
								<section class="left">
									11k. Indicate if a Manual Vacuum Aspiration kit is available in this unit or else where in the facility
								</section>
								
								<section class="center">
									<select class="cloned left-combo" name="q11equipAvailability_27" id="q11equipAvailability_27">
										<option value="" selected="selected">Select One</option>
										<option>Yes </option>
										<option>No </option>
									</select>

									<input name="q11equipAQty_27" type="number" class="cloned fromZero" min="0"/>
								</section>
								<section class="right">
									<select name="q11equipFunctioning_27" id="q11equipFunctioning_27" class="cloned">
										<option value="" selected="selected">Select One</option>
										<option> Yes </option>
										<option> No </option>
										<option> Do Not Know </option>
									</select>

									<input name="q11equipFQty_27" type="number" class="cloned fromZero" min="0"/>

								</section>
							<input type="hidden"  name="q11equipCode_27" id="q11equipCode_27" value="EQP66" />
							</section>

							<section class="row" id="tr_29a">
								<section class="left">
									11l. Indicate the Vacuum Extractors available in this unit/facility
								</section>
								<section class="center">
									<select class="cloned left-combo" name="q1_1_equipCode_28" id="q1_1_equipCode_28">
										<option value="">Select One</option>
										<option value="EQP67">Ventouse </option>
										<option value="EQP68">Kiwi Vacuum Extractor </option>
									</select>

									<input name="q11equipAQty_28" type="number" class="cloned fromZero" min="0"/>
								</section>
								<section class="right">
									<select name="q11equipFunctioning_28" id="q11equipFunctioning_28" class="cloned">
										<option value="" selected="selected">Select One</option>
										<option> Yes </option>
										<option> No </option>
										<option> Do Not Know </option>
									</select>

									<input name="q11equipFQty_28" type="number" class="cloned fromZero" min="0"/>
								</section>
							<input type="hidden"  name="q11equipCode_28" id="q11equipCode_28" />
							</section>

							<section class="row" id="tr_29">
								<section class="left">
									11n. Dilatation and curretage kit
								</section>
								
								<section class="center">
									<select class="cloned left-combo" name="q11equipAvailability_29" id="q11equipAvailability_29">
										<option value="" selected="selected">Select One</option>
										<option>Yes </option>
										<option>No </option>
									</select>

									<input name="q11equipAQty_29" type="number" class="cloned fromZero" min="0"/>
								</section>
								<section class="right">
									<select name="q11equipFunctioning_29" id="q11equipFunctioning_29" class="cloned">
										<option value="" selected="selected">Select One</option>
										<option> Yes </option>
										<option> No </option>
										<option> Do Not Know </option>
									</select>

									<input name="q11equipFQty_29" type="number" class="cloned fromZero" min="0"/>
								</section>
							<input type="hidden"  name="q11equipCode_29" id="q11equipCode_29" value="EQP69" />
							</section>

							<section class="row" id="tr_30">
								<section class="left">
									11o. Sterile gauze
								</section>
								
								<section class="center">
									<select class="cloned left-combo" name="q11equipAvailability_30" id="q11equipAvailability_30">
										<option value="" selected="selected">Select One</option>
										<option>Always Available</option>
										<option>Sometimes Available</option>
										<option>Never Available</option>
									</select>

								</section>
								<input type="hidden"  name="q11equipCode_30" id="q11equipCode_30" value="EQP70" />
								</section>

								<section class="row" id="tr_31">
									<section class="left">
										11p. Sanitary pads
									</section>
									
									<section class="center">
										<select class="cloned left-combo" name="q11equipAvailability_31" id="q11equipAvailability_31">
											<option value="" selected="selected">Select One</option>
											<option>Always Available</option>
											<option>Sometimes Available</option>
											<option>Never Available</option>
										</select>

									</section>
								<input type="hidden"  name="q11equipCode_31" id="q11equipCode_31" value="EQP71" />
								</section>

								<section class="row" id="tr_32">
									<section class="left">
										11q. Elbow length gloves
									</section>
									
									<section class="center">
										<select class="cloned left-combo" name="q11equipAvailability_32" id="q11equipAvailability_32">
											<option value="" selected="selected">Select One</option>
											<option>Yes </option>
											<option>No </option>
										</select>

										<input name="q11equipAQty_32" type="number" class="cloned fromZero" min="0"/>
									</section>
									<section class="right">
										<select name="q11equipFunctioning_32" id="q11equipFunctioning_32" class="cloned">
											<option value="" selected="selected">Select One</option>
											<option> Yes </option>
											<option> No </option>
											<option> Do Not Know </option>
										</select>

										<input name="q11equipFQty_32" type="number" class="cloned fromZero" min="0"/>
									</section>
								<input type="hidden"  name="q11equipCode_32" id="q11equipCode_32" value="EQP72" />
								</section>

								<section class="row" id="tr_33">
									<section class="left">
										11r. Patellar Hammer
									</section>
									
									<section class="center">
										<select class="cloned left-combo" name="q11equipAvailability_33" id="q11equipAvailability_33">
											<option value="" selected="selected">Select One</option>
											<option>Always Available</option>
											<option>Sometimes Available</option>
											<option>Never Available</option>
										</select>

									</section>
									<section class="right">
										<select name="q11equipFunctioning_33" id="q11equipFunctioning_33" class="cloned">
											<option value="" selected="selected">Select One</option>
											<option> Yes </option>
											<option> No </option>
											<option> Do Not Know </option>
										</select>

									</section>
								<input type="hidden"  name="q11equipCode_33" id="q11equipCode_33" value="EQP73" />
								</section>

								<section class="row" id="tr_34">
									<section class="left">
										11s. Sutures
									</section>
									
									<section class="center">
										<select name="q11equipAvailability_34" id="q11equipAvailability_34" class="cloned">
											<option value="" selected="selected">Select One</option>
											<option>Yes </option>
											<option>No </option>
										</select>

										<input name="q11equipAQty_34" type="number" class="cloned fromZero" min="0"/>
							
									</section>
									<section class="right">
										<select name="q11equipFunctioning_34" id="q11equipFunctioning_34" class="cloned">
											<option value="" selected="selected">Select One</option>
											<option> Yes </option>
											<option> No </option>
											<option> Do Not Know </option>
										</select>

										<input name="q11equipFQty_34" type="number" class="cloned fromZero" min="0"/>
									</section>
								<input type="hidden"  name="q11equipCode_34" id="q11equipCode_34" value="EQP74" />
								</section>

								<section class="row" id="tr_35">
									<section class="left">
										11s.i. Oxygen-Cylinder
									</section>
									
									<section class="center">
										<select name="q11equipAvailability_35" id="q11equipAvailability_35" class="cloned">
											<option value="" selected="selected">Select One</option>
											<option>Always Available</option>
											<option>Sometimes Available</option>
											<option>Never Available</option>
										</select>

										<input name="q11equipAQty_35" type="number" class="cloned fromZero" min="0"/>
									</section>
								<input type="hidden"  name="q11equipCode_35" id="q11equipCode_35" value="EQP75" />
								</section>

								<section class="row" id="tr_36">
									<section class="left">
										11s.ii. Oxygen-Concentrator
									</section>
									
									<section class="center">
										<select name="q11equipAvailability_36" id="q11equipAvailability_36" class="cloned">
											<option value="" selected="selected">Select One</option>
											<option>Always Available</option>
											<option>Sometimes Available</option>
											<option>Never Available</option>
										</select>

										<input name="q11equipAQty_36" type="number" class="cloned fromZero" min="0"/>
									</section>
										<input type="hidden"  name="q11equipCode_36" id="q11equipCode_36" value="EQP76" />
								</section>
							
							</section> <!--close editList_2-->
							<section class="column-wide">

																<section class="row-title">
									<section class="left">
										<label class="dcah-label">12. Medications in the Maternity/Labour ward</label>
									</section>
									<section class="center">
										<label class="dcah-label" style="float:left;width:45%">Availability</label>
										<label class="dcah-label" style="float:right;width:45%">Quantity</label>
									</section>

								</section>

								<section class="row" id="tr_37">
									<section class="left">
										12a.i. Injectable-Oxytocin
									</section>
									<input type="hidden"  name="q12mnhCommodityName_1" id="q12mnhCommodityName_1" value="Injectable-Oxytocin" />

									<section class="center">
										<select class="cloned left-combo" name="q12equipAvailability_1" id="q12equipAvailability_1">
											<option value="" selected="selected">Select One</option>
											<option>Always Available</option>
											<option>Sometimes Available</option>
											<option>Never Available</option>
										</select>

										<input name="q12equipAQty_1" type="number" class="cloned fromZero" min="0"/>
									</section>

								</section>

								<section class="row" id="tr_39">
									<section class="left">
										12a.ii. Injectable-Syntocin
									</section>
									<input type="hidden"  name="q12mnhCommodityName_2" id="q12mnhCommodityName_2" value="Injectable-Syntocin" />
									<section class="center">
										<select class="cloned left-combo" name="q12equipAvailability_2" id="q12equipAvailability_2">
											<option value="" selected="selected">Select One</option>
											<option>Always Available</option>
											<option>Sometimes Available</option>
											<option>Never Available</option>
										</select>


										<input name="q12equipAQty_2" type="number" class="cloned fromZero" min="0"/>

									</section>

								</section>


								<section class="row" id="tr_40">
									<section class="left">
										12b.i. Indicate the available Intravenous solutions
									</section>
									
									<section class="center">
										<select class="cloned left-combo" name="q12mnhCommodityName_3" id="q12mnhCommodityName_3">
											<option value="" selected="selected">Select Type</option>
											<option value="Intravenous solution-Ringers Lactate">Ringers Lactate</option>
											<option value="Intravenous solution-D5NS">D5NS</option>
											<option value="Intravenous solution-NS Infusion">NS Infusion</option>

										</select>
										<input name="q12equipAQty_3" type="number" class="cloned fromZero" min="0"/>
									</section>

								</section>


								<section class="row" id="tr_41">
									<section class="left">
										12b.ii. Intravenous Metronidazole
									</section>
									<input type="hidden"  name="q12mnhCommodityName_4" id="q12mnhCommodityName_4" value="Intravenous Metronidazole"/>
									<section class="center">
										<select class="cloned left-combo" name="q12equipAvailability_4" id="q12equipAvailability_4">
											<option value="" selected="selected">Select One</option>
											<option>Always Available</option>
											<option>Sometimes Available</option>
											<option>Never Available</option>
										</select>

										<input name="q12equipAQty_4" type="number" class="cloned fromZero" min="0"/>
								</section>

								</section>


								<section class="row" id="tr_42">
									<section class="left">
										12c. Injectable methergine
									</section>
									<input type="hidden"  name="q12mnhCommodityName_5" id="q12mnhCommodityName_5" value="Injectable methergine"/>

									<section class="center">
										<select class="cloned left-combo" name="q12equipAvailability_5" id="q12equipAvailability_5">
											<option value="" selected="selected">Select One</option>
											<option>Always Available</option>
											<option>Sometimes Available</option>
											<option>Never Available</option>
										</select>
										<input name="q12equipAQty_5" type="number" class="cloned fromZero" min="0"/>
									</section>

								</section>


								<section class="row" id="tr_43i">
									<section class="left">
										12di. Injectable Hydralazine
									</section>
									<input type="hidden"  name="q12mnhCommodityName_6" id="q12mnhCommodityName_6" value="Injectable Hydralazine"/>

									<section class="center">
										<select class="cloned left-combo" name="q12equipAvailability_6" id="q12equipAvailability_6">
											<option value="" selected="selected">Select One</option>
											<option>Always Available</option>
											<option>Sometimes Available</option>
											<option>Never Available</option>
										</select>
									
										<input name="q12equipAQty_6" type="number" class="cloned fromZero" min="0"/>
									</section>

								</section>
								<section class="row" id="tr_43ii">
									<section class="left">
										12dii. Injectable Apresoline
									</section>
									<input type="hidden"  name="q12mnhCommodityName_7" id="q12mnhCommodityName_7" value="Injectable Apresoline"/>

									<section class="center">
										<select class="cloned left-combo" name="q12equipAvailability_7" id="q12equipAvailability_7">
											<option value="" selected="selected">Select One</option>
											<option>Always Available</option>
											<option>Sometimes Available</option>
											<option>Never Available</option>
										</select>
										
										<input name="q12equipAQty_7" type="number" class="cloned fromZero" min="0"/>
									</section>

								</section>


								<section class="row" id="tr_44">
									<section class="left">
										12e. Injectable diazepam
									</section>
									<input type="hidden"  name="q12mnhCommodityName_8" id="q12mnhCommodityName_8" value="Injectable diazepam"/>

									<section class="center">
										<select class="cloned left-combo" name="q12equipAvailability_8" id="q12equipAvailability_8">
											<option value="" selected="selected">Select One</option>
											<option>Always Available</option>
											<option>Sometimes Available</option>
											<option>Never Available</option>
										</select>
										<input name="q12equipAQty_8" type="number" class="cloned fromZero" min="0"/>
									</section>

								</section>


								<section class="row" id="tr_45">
									<section class="left">
										12f. Injectable magnesium sulfate
									</section>
									<input type="hidden"  name="q12mnhCommodityName_9" id="q12mnhCommodityName_9" value="Injectable magnesium sulfate"/>

									<section class="center">
										<select class="cloned left-combo" name="q12equipAvailability_9" id="q12equipAvailability_9">
											<option value="" selected="selected">Select One</option>
											<option>Always Available</option>
											<option>Sometimes Available</option>
											<option>Never Available</option>
										</select>
										<input name="q12equipAQty_9" type="number" class="cloned fromZero" min="0"/>
									</section>

								</section>


								<section class="row" id="tr_46">
									<section class="left">
										12g. Injectable amoxicillin or ampicillin
										
									</section>
									<input type="hidden"  name="q12mnhCommodityName_10" id="q12mnhCommodityName_10" value="Injectable amoxicillin/ampicillin"/>

									<section class="center">
										<select class="cloned left-combo" name="q12equipAvailability_10" id="q12equipAvailability_10">
											<option value="" selected="selected">Select One</option>
											<option>Always Available</option>
											<option>Sometimes Available</option>
											<option>Never Available</option>
										</select>
									
										<input name="q12equipAQty_10" type="number" class="cloned fromZero" min="0"/>
									</section>

								</section>


								<section class="row" id="tr_47">
									<section class="left">
										12h. Injectable gentamicin
									</section>
									<input type="hidden"  name="q12mnhCommodityName_11" id="q12mnhCommodityName_11" value="Injectable gentamicin"/>

									<section class="center">
										<select class="cloned left-combo" name="q12equipAvailability_11" id="q12equipAvailability_11">
											<option value="" selected="selected">Select One</option>
											<option>Always Available</option>
											<option>Sometimes Available</option>
											<option>Never Available</option>
										</select>
										<input name="q12equipAQty_11" type="number" class="cloned fromZero" min="0"/>
									</section>

								</section>


								<section class="row" id="tr_48">
									<section class="left">
										12i. Calcium gluconate
									</section>
									<input type="hidden"  name="q12mnhCommodityName_12" id="q12mnhCommodityName_12" value="Calcium gluconate"/>

									<section class="center">
										<select class="cloned left-combo" name="q12equipAvailability_12" id="q12equipAvailability_12">
											<option value="" selected="selected">Select One</option>
											<option>Always Available</option>
											<option>Sometimes Available</option>
											<option>Never Available</option>
										</select>
										<input name="q12equipAQty_12" type="number" class="cloned fromZero" min="0"/>
									</section>

								</section>


								<section class="row" id="tr_49">
									<section class="left">
										12j. Methyldopa/Aldomet
									</section>
									<input type="hidden"  name="q12mnhCommodityName_13" id="q12mnhCommodityName_13" value="Methyldopa/Aldomet"/>

									<section class="center">
										<select class="cloned left-combo" name="q12equipAvailability_13" id="q12equipAvailability_13">
											<option value="" selected="selected">Select One</option>
											<option>Always Available</option>
											<option>Sometimes Available</option>
											<option>Never Available</option>
										</select>
										<input name="q12equipAQty_13" type="number" class="cloned fromZero" min="0"/>
									</section>

								</section>


								<section class="row" id="tr_50">
									<section class="left">
										12k. Lidocaine (lignocaine) or other local anesthetic
									</section>
									<input type="hidden"  name="q12mnhCommodityName_14" id="q12mnhCommodityName_14" value="Lidocaine(lignocaine)/other local anesthetic"/>

									<section class="center">
										<select class="cloned left-combo" name="q12equipAvailability_14" id="q12equipAvailability_14">
											<option value="" selected="selected">Select One</option>
											<option>Always Available</option>
											<option>Sometimes Available</option>
											<option>Never Available</option>
										</select>
										<input name="q12equipAQty_14" type="number" class="cloned fromZero" min="0"/>
									</section>

								</section>


								<section class="row" id="tr_51">
									<section class="left">
										12l. Nifedipine Tablets
									</section>
									<input type="hidden"  name="q12mnhCommodityName_15" id="q12mnhCommodityName_15" value="Nifedipine Tablets"/>

									<section class="center">
										<select class="cloned left-combo" name="q12equipAvailability_15" id="q12equipAvailability_15">
											<option value="" selected="selected">Select One</option>
											<option>Always Available</option>
											<option>Sometimes Available</option>
											<option>Never Available</option>
										</select>
										<input name="q12equipAQty_15" type="number" class="cloned fromZero" min="0"/>
									</section>

								</section>


								<section class="row" id="tr_52">
									<section class="left">
										12m. Vitamin A
									</section>
									<input type="hidden"  name="q12mnhCommodityName_16" id="q12mnhCommodityName_16" value="Vitamin A"/>

									<section class="center">
										<select class="cloned left-combo" name="q12equipAvailability_16" id="q12equipAvailability_16">
											<option value="" selected="selected">Select One</option>
											<option>Always Available</option>
											<option>Sometimes Available</option>
											<option>Never Available</option>
										</select>
										<input name="q12equipAQty_16" type="number" class="cloned fromZero" min="0"/>
									</section>

								</section>


								<section class="row" id="tr_53">
									<section class="left">
										12n. Vitamin K
									</section>
									<input type="hidden"  name="q12mnhCommodityName_17" id="q12mnhCommodityName_17" value="Vitamin K"/>

									<section class="center">
										<select class="cloned left-combo" name="q12equipAvailability_17" id="q12equipAvailability_17">
											<option value="" selected="selected">Select One</option>
											<option>Always Available</option>
											<option>Sometimes Available</option>
											<option>Never Available</option>
										</select>
										<input name="q12equipAQty_17" type="number" class="cloned fromZero" min="0"/>
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


							<section id="tableEquipmentList_3">
					    	<section class="row2">
					    	<input type="button" id="editEquipmentListTopButton_3" name="editEquipmentListTopButton_3" class="awesome myblue medium" value="Edit List"/>
					    	</section>
								<section class="row" id="tr_54">
									<section class="left">
										14a. Self inflating Neonatal Ambu bag ( 500 mls)
									</section>
									<section class="center">
										<select class="cloned left-combo" name="q14equipAvailability_54" id="q12equipAvailability_54">
											<option value="" selected="selected">Select One</option>
											<option>Yes </option>
											<option>No </option>
										</select>

										<input name="q14equipAQty_54" type="number" class="cloned fromZero" min="0"/>
									</section>
									<section class="right">
										<select name="q14equipFunctioning_54" id="q14equipFunctioning_54" class="cloned">
											<option value="" selected="selected">Select One</option>
											<option> Yes </option>
											<option> No </option>
											<option> Do Not Know </option>
										</select>

										<input name="q14equipFQty_54" type="number" class="cloned fromZero" min="0"/>
										
									</section>
										<input type="hidden"  name="q14equipCode_54" id="q14equipCode_54" value="EQP78" />
								</section>

								<section class="row" id="tr_55">
									<section class="left">
										14b.i. Infant masks-Size 0
									</section>
									<section class="center">
										<select class="cloned left-combo" name="q14equipAvailability_55" id="q12equipAvailability_55">
											<option value="" selected="selected">Select One</option>
											<option>Always Available</option>
											<option>Sometimes Available</option>
											<option>Never Available</option>
										</select>

										<input name="q14equipAQty_55" type="number" class="cloned fromZero" min="0"/>
										
									</section>
										<input type="hidden"  name="q14equipCode_55" id="q14equipCode_55" value="EQP79" />
								</section>

								<section class="row" id="tr_56">
									<section class="left">
										14b.ii. Infant masks-Size 1
									</section>
									
									<section class="center">
										<select class="cloned left-combo" name="q14equipAvailability_56" id="q12equipAvailability_56">
											<option value="" selected="selected">Select One</option>
											<option>Always Available</option>
											<option>Sometimes Available</option>
											<option>Never Available</option>
										</select>


										<input name="q14equipAQty_56" type="number" class="cloned fromZero" min="0"/>
									</section>
										<input type="hidden"  name="q14equipCode_56" id="q14equipCode_56" value="EQP80" />
								</section>

								<section class="row" id="tr_57">
									<section class="left">
										14b.iii. Infant masks-Size 2
									</section>
									
									<section class="center">
										<select class="cloned left-combo" name="q14equipAvailability_57" id="q12equipAvailability_57">
											<option value="" selected="selected">Select One</option>
											<option>Always Available</option>
											<option>Sometimes Available</option>
											<option>Never Available</option>
										</select>

										<input name="q14equipAQty_57" type="number" class="cloned fromZero" min="0"/>

									</section>
									<input type="hidden"  name="q14equipCode_57" id="q14equipCode_57" value="EQP81" />
								</section>
								
								<section class="row">
									<h3> Neonatal Unit</h3>
								</section>

								<section class="row" id="tr_58">
									<section class="left">
										14c. Clock  with seconds arm
									</section>
									
									<section class="center">
										<select class="cloned left-combo" name="q14equipAvailability_58" id="q14equipAvailability_58">
											<option value="" selected="selected">Select One</option>
											<option>Yes </option>
											<option>No </option>
										</select>

									</section>
									<input type="hidden"  name="q14equipCode_58" id="q14equipCode_58" value="EQP82" />
								</section>

								<section class="row" id="tr_59">
									<section class="left">
										14d. Neonatal Incubator
									</section>
									
									<section class="center">
										<select class="cloned left-combo" name="q14equipAvailability_59" id="q14equipAvailability_59">
											<option value="" selected="selected">Select One</option>
											<option>Yes </option>
											<option>No </option>
										</select>
										<input name="q14equipAQty_59" type="number" class="cloned fromZero" min="0"/>
									</section>
									<section class="right">
										<select name="q14equipFunctioning_59" id="q14equipFunctioning_59" class="cloned">
											<option value="" selected="selected">Select One</option>
											<option> Yes </option>
											<option> No </option>
											<option> Do Not Know </option>
										</select>

										<input name="q14equipFQty_59" type="number" class="cloned fromZero" min="0"/>
									</section>
									<input type="hidden"  name="q14equipCode_59" id="q14equipCode_59" value="EQP83" />
								</section>

								<section class="row" id="tr_60">
									<section class="left">
										14e. A Radiant Heater
									</section>

									<section class="center">
										<select class="cloned left-combo" name="q14equipAvailability_60" id="q14equipAvailability_60">
											<option value="" selected="selected">Select One</option>
											<option>Yes </option>
											<option>No </option>
										</select>
										<input name="q14equipAQty_60" type="number" class="cloned fromZero" min="0"/>
									</section>
									<section class="right">
										<select name="q14equipFunctioning_60" id="q14equipFunctioning_60" class="cloned">
											<option value="" selected="selected">Select One</option>
											<option> Yes </option>
											<option> No </option>
											<option> Do Not Know </option>
										</select>

										<input name="q14equipFQty_60" type="number" class="cloned fromZero" min="0"/>
									</section>
									<input type="hidden"  name="q14equipCode_60" id="q14equipCode_60" value="EQP84" />
								</section>

								<section class="row" id="tr_61">
									<section class="left">
										14f. Infant Scale
									</section>
									
									<section class="center">
										<select class="cloned left-combo" name="q14equipAvailability_61" id="q14equipAvailability_61">
											<option value="" selected="selected">Select One</option>
											<option>Yes </option>
											<option>No </option>
										</select>
										<input name="q14equipAQty_61" type="number" class="cloned fromZero" min="0"/>
									</section>
									<section class="right">
										<select name="q14equipFunctioning_61" id="q14equipFunctioning_61" class="cloned">
											<option value="" selected="selected">Select One</option>
											<option> Yes </option>
											<option> No </option>
											<option> Do Not Know </option>
										</select>

										<input name="q14equipFQty_61" type="number" class="cloned fromZero" min="0"/>

									</section>
									<input type="hidden"  name="q14equipCode_61" id="q14equipCode_61" value="EQP85" />
								</section>

								<section class="row" id="tr_62">
									<section class="left">
										14g. Suction bulb for mucus extraction
									</section>
									
									<section class="center">
										<select class="cloned left-combo" name="q14equipAvailability_62" id="q14equipAvailability_62">
											<option value="" selected="selected">Select One</option>
											<option>Yes </option>
											<option>No </option>
										</select>

										<input name="q14equipAQty_62" type="number" class="cloned fromZero" min="0"/>
									</section>
									<section class="right">

										<select name="q14equipFunctioning_62" id="q14equipFunctioning_62" class="cloned">
											<option value="" selected="selected">Select One</option>
											<option> Yes </option>
											<option> No </option>
											<option> Do Not Know </option>
										</select>

										<input name="q14equipFQty_62" type="number" class="cloned fromZero" min="0"/>

									</section>
									<input type="hidden"  name="q14equipCode_62" id="q14equipCode_62" value="EQP86" />
								</section>

						<section class="row" id="tr_63">
									<section class="left">
										14h. Suction apparatus for use with catheter
									</section>
									
									<section class="center">
										<select class="cloned left-combo" name="q14equipAvailability_63" id="q14equipAvailability_63">
											<option value="" selected="selected">Select One</option>
											<option>Yes </option>
											<option>No </option>
										</select>

										<input name="q14equipAQty_63" type="number" class="cloned fromZero" min="0"/>
									</section>
									<section class="right">
										<select name="q14equipFunctioning_63" id="q14equipFunctioning_63" class="cloned">
											<option value="" selected="selected">Select One</option>
											<option> Yes </option>
											<option> No </option>
											<option> Do Not Know </option>
										</select>

										<input name="q14equipFQty_63" type="number" class="cloned fromZero" min="0"/>
									</section>
									<input type="hidden"  name="q14equipCode_63" id="q14equipCode_63" value="EQP87" />
								</section>

								<section class="row" id="tr_64">
									<section class="left">
										14i. A flat, clean, dry and warm newborn resuscitation surface
									</section>

									<section class="center">
										<select class="cloned left-combo" name="q14equipAvailability_64" id="q14equipAvailability_64">
											<option value="" selected="selected">Select One</option>
											<option>Yes </option>
											<option>No </option>
										</select>

									</section>
									<input type="hidden"  name="q14equipCode_64" id="q14equipCode_64" value="EQP88" />
								</section>


								<section class="row" id="tr_65">
									<section class="left">
										14j. Disposable cord ties or clamps
									</section>
									
									<section class="center">
										<select class="cloned left-combo" name="q14equipAvailability_65" id="q14equipAvailability_65">
											<option value="" selected="selected">Select One</option>
											<option>Yes</option>
											<option>No</option>
										</select>

									</section>
									<section class="right">
										<select name="q14equipFunctioning_65" id="q14equipFunctioning_65" class="cloned">
											<option value="" selected="selected">Select One</option>
											<option>Always Available</option>
											<option>Sometimes Available</option>
											<option>Never Available</option>
										</select>

									</section>
									<input type="hidden"  name="q14equipCode_65" id="q14equipCode_65" value="EQP89" />
								</section>


								<section class="row" id="tr_66">
									<section class="left">
										14k. Clean and warm towels/cloths for drying / warming / wrapping baby
									</section>
									

									<section class="center">
										<select class="cloned left-combo" name="q14equipAvailability_66" id="q14equipAvailability_66">
											<option value="" selected="selected">Select One</option>
											<option>Select One</option>
											<option>Yes</option>
											<option>No</option>

										</select>

									</section>
									<section class="right">
										<select name="q14equipFunctioning_66" id="q14equipFunctioning_66" class="cloned">
											<option value="" selected="selected">Select One</option>
											<option>Always Available</option>
											<option>Sometimes Available</option>
											<option>Never Available</option>
										</select>

									</section>
									<input type="hidden"  name="q14equipCode_66" id="q14equipCode_66" value="EQP90" />
								</section>
								</section> <!--close section tableEquipmentList_3-->

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
											<option value="" selected="selected">Select One</option>
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
										16. Does this facility ever perform caesarean sections?
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
												<label class="dcah-label" style="width:45%">Functioning(b)</label>
												<label class="dcah-label" style="float:right;width:45%">Quantity</label>
											</section>
										</section>

									<section id="tableEquipmentList_4">
							    	<section class="row2">
							    	<input type="button" id="editEquipmentListTopButton_4" name="editEquipmentListTopButton_4" class="awesome myblue medium" value="Edit List"/>
							    	</section>
										<section class="row" id="tr_67">
										<section class="left">
											18a. Operating Table
										</section>

										<section class="center">
											<select class="cloned left-combo" name="q18equipAvailability_67" id="q18equipAvailability_67">
												<option value="" selected="selected">Select One</option>
												<option>Yes </option>
												<option>No </option>
											</select>

											<input name="q18equipAQty_67" type="number" class="cloned fromZero" min="0"/>
										</section>
										<section class="center">
											<select name="q18equipFunctioning_67" id="q18equipFunctioning_67" class="cloned">
												<option value="" selected="selected">Select One</option>
												<option> Yes </option>
												<option> No </option>
												<option> Dont Know </option>
											</select>

											<input name="q18equipFQty_67" type="number" class="cloned fromZero" min="0"/>
										</section>
										<input type="hidden"  name="q18equipCode_67" id="q18equipCode_67" value="EQP91" />
									</section>

									<section class="row" id="tr_68">
										<section class="left">
											18b. Operating Light
										</section>

										<section class="center">
											<select class="cloned left-combo" name="q18equipAvailability_68" id="q18equipAvailability_68">
												<option value="" selected="selected">Select One</option>
												<option>Yes </option>
												<option>No </option>
											</select>

											<input name="q18equipAQty_68" type="number" class="cloned fromZero" min="0"/>
										</section>
										<section class="center">
											<select name="q18equipFunctioning_68" id="q18equipFunctioning_68" class="cloned">
												<option value="" selected="selected">Select One</option>
												<option> Yes </option>
												<option> No </option>
												<option> Dont Know </option>
											</select>

											<input type="number" class="cloned fromZero" />
										</section>
										<input type="hidden"  name="q18equipCode_68" id="q18equipCode_68" value="EQP92" />
									</section>

									<section class="row" id="tr_69">
										<section class="left">
											18c. Anaesthetic machine
										</section>

										<section class="center">
											<select class="cloned left-combo" name="q18equipAvailability_69" id="q18equipAvailability_69">
												<option value="" selected="selected">Select One</option>
												<option>Yes </option>
												<option>No </option>
											</select>

											<input name="q18equipAQty_69" type="number" class="cloned fromZero" min="0"/>
										</section>
										<section class="center">
											<select name="q18equipFunctioning_69" id="q18equipFunctioning_69" class="cloned">
												<option value="" selected="selected">Select One</option>
												<option> Yes </option>
												<option> No </option>
												<option> Dont Know </option>
											</select>

											<input name="q18equipFQty_69" type="number" class="cloned fromZero" min="0"/>
										</section>
										<input type="hidden"  name="q18equipCode_69" id="q18equipCode_69" value="EQP93" />
									</section>

									<section class="row" id="tr_70">
										<section class="left">
											18d. Laryngoscopes
										</section>

										<section class="center">
											<select class="cloned left-combo" name="q18equipAvailability_70" id="q18equipAvailability_70">
												<option value="" selected="selected">Select One</option>
												<option>Yes </option>
												<option>No </option>
											</select>

											<input name="q18equipAQty_70" type="number" class="cloned fromZero" min="0"/>
										</section>
										<section class="center">
											<select name="q18equipFunctioning_70" id="q18equipFunctioning_70" class="cloned">
												<option value="" selected="selected">Select One</option>
												<option> Yes </option>
												<option> No </option>
												<option> Dont Know </option>
											</select>

											<input name="q18equipFQty_70" type="number" class="cloned fromZero" min="0"/>
										</section>
										<input type="hidden"  name="q18equipCode_70" id="q18equipCode_70" value="EQP94" />
									</section>


									<section class="row" id="tr_71">
										<section class="left">
											18e. Endotracheal tubes
										</section>
										
										<section class="center">
											<select class="cloned left-combo" name="q18equipAvailability_71" id="q18equipAvailability_71">
												<option value="" selected="selected">Select One</option>
												<option>Yes </option>
												<option>No </option>
											</select>

											<input name="q18equipAQty_71" type="number" class="cloned fromZero" min="0"/>
										</section>
										<section class="center">
											<select name="q18equipFunctioning_71" id="q18equipFunctioning_71" class="cloned">
												<option value="" selected="selected">Select One</option>
												<option> Yes </option>
												<option> No </option>
												<option> Dont Know </option>
											</select>

											<input name="q18equipFQty_71" type="number" class="cloned fromZero" min="0"/>
										</section>
										<input type="hidden"  name="q18equipCode_71" id="q18equipCode_71" value="EQP95" />
									</section>


									<section class="row" id="tr_72">
										<section class="left">
											18f. Anaesthetic drugs e.g ketamine
										</section>
										
										<section class="center">
											<select class="cloned left-combo" name="q18equipAvailability_72" id="q18equipAvailability_72">
												<option value="" selected="selected">Select One</option>
												<option>Yes </option>
												<option>No </option>
											</select>

											<input name="q18equipAQty_72" type="number" class="cloned fromZero" min="0"/>
										</section>
										<section class="center">
											<select name="q18equipFunctioning_72" id="q18equipFunctioning_72" class="cloned">
												<option value="" selected="selected">Select One</option>
												<option>Always Available</option>
												<option>Sometimes Available</option>
												<option>Never Available</option>
											</select>

											<input name="q18equipFQty_72" type="number" class="cloned fromZero" min="0"/>
										</section>
										<input type="hidden"  name="q18equipCode_72" id="q18equipCode_72" value="EQP96" />
									</section>


									<section class="row" id="tr_73">
										<section class="left">
											18g. Anaesthetic gases (halothane, NO2, Oxygen, etc)
										</section>
										

										<section class="center">
											<select class="cloned left-combo" name="q18equipAvailability_73" id="q18equipAvailability_73">
												<option value="" selected="selected">Select One</option>
												<option>Yes </option>
												<option>No </option>
											</select>

											<input name="q18equipAQty_73" type="number" class="cloned fromZero" min="0"/>
										</section>
										<section class="center">
											<select name="q18equipFunctioning_73" id="q18equipFunctioning_73" class="cloned">
												<option value="" selected="selected">Select One</option>
												<option>Always Available</option>
												<option>Sometimes Available</option>
												<option>Never Available</option>
											</select>

											<input name="q18equipFQty_73" type="number" class="cloned fromZero" min="0"/>
										</section>
										<input type="hidden"  name="q18equipCode_73" id="q18equipCode_73" value="EQP97" />
									</section>


									<section class="row" id="tr_74">
										<section class="left">
											18h. Drugs and supplies for spinal anesthesia (e.g. Spinal needle)
										</section>
										

										<section class="center">
											<select class="cloned left-combo" name="q18equipAvailability_74" id="q18equipAvailability_74">
												<option value="" selected="selected">Select One</option>
												<option>Yes </option>
												<option>No </option>
											</select>

											<input name="q18equipAQty_74" type="number" class="cloned fromZero" min="0"/>
										</section>
										<section class="center">
											<select name="q18equipFunctioning_74" id="q18equipFunctioning_74" class="cloned">
												<option value="" selected="selected">Select One</option>
												<option>Always Available</option>
												<option>Sometimes Available</option>
												<option>Never Available</option>
											</select>

											<input name="q18equipFQty_74" type="number" class="cloned fromZero" min="0"/>
										</section>
										<input type="hidden"  name="q18equipCode_74" id="q18equipCode_74" value="EQP98" />
									</section>


									<section class="row" id="tr_75">
										<section class="left">
											18i. Scrub area adjacent to or in the operating room
										</section>
							
										<section class="center">
											<select class="cloned left-combo" name="q18equipAvailability_75" id="q18equipAvailability_75">
												<option value="" selected="selected">Select One</option>
												<option>Yes </option>
												<option>No </option>
											</select>

											<input name="q18equipAQty_75" type="number" class="cloned fromZero" min="0"/>
										</section>
										<section class="center">
											<select name="q18equipFunctioning_75" id="q18equipFunctioning_75" class="cloned">
												<option value="" selected="selected">Select One</option>
												<option> Yes </option>
												<option> No </option>
												<option> Dont Know </option>
											</select>

											<input name="q18equipFQty_75" type="number" class="cloned fromZero" min="0"/>
										</section>
										<input type="hidden"  name="q18equipCode_75" id="q18equipCode_75" value="EQP99" />
									</section>


									<section class="row" id="tr_76">
										<section class="left">
											18j. Running Water
										</section>
									
										<section class="center">
											<select class="cloned left-combo" name="q18equipAvailability_76" id="q18equipAvailability_76">
												<option value="" selected="selected">Select One</option>
												<option>Yes </option>
												<option>No </option>
											</select>

											<input name="q18equipAQty_76" type="number" class="cloned fromZero" min="0"/>
										</section>
										<section class="center">
											<select name="q18equipFunctioning_76" id="q18equipFunctioning_76" class="cloned">
												<option value="" selected="selected">Select One</option>
												<option> Yes </option>
												<option> No </option>
												<option> Dont Know </option>
											</select>

											<input name="q18equipFQty_76" type="number" class="cloned fromZero" min="0"/>
										</section>
										<input type="hidden"  name="q18equipCode_76" id="q18equipCode_76" value="EQP100" />
									</section>


									<section class="row" id="tr_77">
										<section class="left">
											18k. Suction Machine
										</section>
										

										<section class="center">
											<select class="cloned left-combo" name="q18equipAvailability_77" id="q18equipAvailability_77">
												<option value="" selected="selected">Select One</option>
												<option>Yes </option>
												<option>No </option>
											</select>

											<input name="q18equipAQty_77" type="number" class="cloned fromZero" min="0"/>
										</section>
										<section class="center">
											<select name="q18equipFunctioning_77" id="q18equipFunctioning_77" class="cloned">
												<option value="" selected="selected">Select One</option>
												<option> Yes </option>
												<option> No </option>
												<option> Dont Know </option>
											</select>

											<input name="q18equipFQty_77" type="number" class="cloned fromZero" min="0"/>
										</section>
										<input type="hidden"  name="q18equipCode_77" id="q18equipCode_77" value="EQP101" />
									</section>


									<section class="row" id="tr_78">
										<section class="left">
											18l. Standard Cesaerian section kit
										</section>

										<section class="center">
											<select class="cloned left-combo" name="q18equipAvailability_78" id="q18equipAvailability_78">
												<option value="" selected="selected">Select One</option>
												<option>Yes </option>
												<option>No </option>
											</select>

											<input name="q18equipAQty_78" type="number" class="cloned fromZero" min="0"/>
										</section>
										<section class="center">
											<select name="q18equipFunctioning_78" id="q18equipFunctioning_78" class="cloned">
												<option value="" selected="selected">Select One</option>
												<option> Yes </option>
												<option> No </option>
												<option> Dont Know </option>
											</select>

											<input name="q18equipFQty_78" type="number" class="cloned fromZero" min="0"/>
										</section>
										<input type="hidden"  name="q18equipCode_78" id="q18equipCode_78" value="EQP102" />
									</section>


									<section class="row" id="tr_79">
										<section class="left">
											18m. Sterile operation gowns
										</section>

										<section class="center">
											<select class="cloned left-combo" name="q18equipAvailability_79" id="q18equipAvailability_79">
												<option value="" selected="selected">Select One</option>
												<option>Yes </option>
												<option>No </option>
											</select>

											<input name="q18equipAQty_79" type="number" class="cloned fromZero" min="0"/>
										</section>
										<section class="center">
											<select name="q18equipFunctioning_79" id="q18equipFunctioning_79" class="cloned">
												<option value="" selected="selected">Select One</option>
												<option> Yes </option>
												<option> No </option>
												<option> Dont Know </option>
											</select>

											<input name="q18equipFQty_79" type="number" class="cloned fromZero" min="0"/>
										</section>
										<input type="hidden"  name="q18equipCode_79" id="q18equipCode_79" value="EQP103" />
									</section>


									<section class="row" id="tr_80">
										<section class="left">
											18n. Sterile Drapes
										</section>

										<section class="center">
											<select class="cloned left-combo" name="q18equipAvailability_80" id="q18equipAvailability_80">
												<option value="" selected="selected">Select One</option>
												<option>Yes </option>
												<option>No </option>
											</select>

											<input name="q18equipAQty_80" type="number" class="cloned fromZero" min="0"/>
										</section>
										<section class="center">
											<select name="q18equipFunctioning_80" id="q18equipFunctioning_80" class="cloned">
												<option value="" selected="selected">Select One</option>
												<option> Yes </option>
												<option> No </option>
												<option> Dont Know </option>
											</select>

											<input name="q18equipFQty_80" type="number" class="cloned fromZero" min="0"/>
										</section>
										<input type="hidden"  name="q18equipCode_80" id="q18equipCode_80" value="EQP104" />
									</section>


									<section class="row" id="tr_81">
										<section class="left">
											18o. Sterile gloves in various sizes
										</section>

										<section class="center">
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
										</section>
										<section class="center">
											<select name="q18equipFunctioning_81" id="q18equipFunctioning_81" class="cloned">
												<option value="" selected="selected">Select One</option>
												<option> Yes </option>
												<option> No </option>
												<option> Dont Know </option>
											</select>

											<input name="q18equipFQty_81" type="number" class="cloned fromZero" min="0"/>
										</section>
										<input type="hidden"  name="q18equipCode_81" id="q18equipCode_81" value="EQP105" />
									</section>


									<section class="row" id="tr_82">
										<section class="left">
											18p. IV canulas
										</section>

										<section class="center">
											<select class="cloned left-combo" name="q18equipAvailability_82" id="q18equipAvailability_82">
												<option value="" selected="selected">Select One</option>
												<option>Yes </option>
												<option>No </option>
											</select>

											<input name="q18equipAQty_82" type="number" class="cloned fromZero" min="0"/>
										</section>
										<section class="center">
											<select name="q18equipFunctioning_82" id="q18equipFunctioning_82" class="cloned">
												<option value="" selected="selected">Select One</option>
												<option> Yes </option>
												<option> No </option>
												<option> Dont Know </option>
											</select>

											<input name="q18equipFQty_82" type="number" class="cloned fromZero" min="0"/>
										</section>
										<input type="hidden"  name="q18equipCode_82" id="q18equipCode_82" value="EQP106" />
									</section>

									<section class="row" id="tr_83">
										<section class="left">
											18q. Drip Stand
										</section>
										<input type="hidden"  name="q18equipCode_105" id="q18equipCode_105" value="EQP107" />

										<section class="center">
											<select class="cloned left-combo" name="q18equipAvailability_83" id="q18equipAvailability_83">
												<option value="" selected="selected">Select One</option>
												<option>Yes </option>
												<option>No </option>
											</select>

											<input name="q18equipAQty_83" type="number" class="cloned fromZero" min="0"/>
										</section>
										<section class="center">
											<select name="q18equipFunctioning_83" id="q18equipFunctioning_83" class="cloned">
												<option value="" selected="selected">Select One</option>
												<option> Yes </option>
												<option> No </option>
												<option> Dont Know </option>
											</select>
											<input name="q18equipFQty_83" type="number" class="cloned fromZero" min="0"/>
										</section>
									</section>


									<section class="row" id="tr_84">
										<section class="left">
											18r. Blood transfusion set
										</section>
										
										<section class="center">
											<select class="cloned left-combo" name="q18equipAvailability_84" id="q18equipAvailability_4">
												<option value="" selected="selected">Select One</option>
												<option>Yes </option>
												<option>No </option>
											</select>

											<input name="q18equipAQty_84" type="number" class="cloned fromZero" min="0"/>
										</section>
										<section class="center">
											<select name="q18equipFunctioning_84" id="q18equipFunctioning_84" class="cloned">
												<option value="" selected="selected">Select One</option>
												<option> Yes </option>
												<option> No </option>
												<option> Dont Know </option>
											</select>

											<input name="q18equipFQty_84" type="number" class="cloned fromZero" min="0"/>
										</section>
										<input type="hidden"  name="q18equipCode_84" id="q18equipCode_84" value="EQP108" />
									</section>


									<section class="row" id="tr_85">
										<section class="left">
											18s. Recovery room/ recovery area
										</section>

										<section class="center">
											<select class="cloned left-combo" name="q18equipAvailability_85" id="q18equipAvailability_85">
												<option value="" selected="selected">Select One</option>
												<option>Yes </option>
												<option>No </option>
											</select>

											<input name="q18equipAQty_85" type="number" class="cloned fromZero" min="0"/>
										</section>
										<section class="center">
											<select name="q18equipFunctioning_85" id="q18equipFunctioning_85" class="cloned">
												<option value="" selected="selected">Select One</option>
												<option> Yes </option>
												<option> No </option>
												<option> Dont Know </option>
											</select>
											
											<input name="q18equipFQty_85" type="number" class="cloned fromZero" min="0"/>
										</section>
										<input type="hidden"  name="q18equipCode_85" id="q18equipCode_85" value="EQP109" />
										</section> <!--close section tableEquipmentList_4-->
									</section>
									
									<label class="dcah-label" style="text-align:center">End of Questionnaire</label>
								</section>
							</section><!--close section level-hide-->
						</form>';
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
		<section class="form-instructions a">
			<ol>
				<li>
					Instructions for the User page
				</li>
				<ol>
					<li>
						Upload the  signed letter by the Head of the two divisions- I will send you a soft copy of this
					</li>
					<li>
						Section the instructions as per the following
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
						Complete the facility-in-charge information section with the following: name, telephone contact & email contact
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
		</section>
		<li class="form-link c">
			Child Assessment Form
		</li>
		<section class="form-instructions c" >
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
					Please note you cannot proceed to the next tab, the next section or the next form without fully
					completing all the section in the 6 tabs.  Where stocks are not available, indicate zero (o) quantities and proceed to the next step.
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
		</section>
		<li class="form-link m">
			Maternal & New-Born Health Assessment
		</li>
		<section class="form-instructions m" >
			<ol>
				<li>
					The assessment will focus on the following:
				</li>
				<ol>
					<li>
						Basic emergency obstetric and new born care commodities, supplies & equipment
					</li>
					<li>
						Some sections of the tool will
						have a provision for definite answers- YES/NO – these will limit you to choose only one response
					</li>
					<li>
						Some sections in the tool may allow for multiple sections.
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
		</section>
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
				In Charge Contact Information
			</section>
			<section class="row2">
				<section class="left">
					<label>Name:</label>
				</section>
				<section class="right">
					<input type="text" name="facilityContactPerson" id="facilityContactPerson"/>
				</section>
			</section>
			<section class="row2">
				<section class="left">
					<label>Telephone:</label>
				</section>
				<section class="right">

				</section>

			</section>

			<section class="row2">
				<section class="left">
					<label>Cell 1:</label>
				</section>
				<section class="right">
					<input type="text" name="facilityTelephone" id="facilityTelephone" maxlength="14"/>
				</section>

			</section>

			<section class="row2">
				<section class="left">
					<label>Cell 2:</label>
				</section>
				<section class="right">
					<input type="text" name="facilityAltTelephone" id="facilityAltTelephone" maxlength="14"/>
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
	<section class="block">
		<section class="column" style="margin-bottom:30px">
			<section class="row-title">
				MCH Contanct
			</section>
			<section class="row2">
				<section class="left">
					<label>Name:</label>
				</section>
				<section class="right">
					<input type="text" name="MCHContactPerson" id="MCHContactPerson"/>
				</section>
			</section>
			<section class="row2">
				<section class="left">
					<label>Telephone:</label>
				</section>
				<section class="right">

				</section>

			</section>

			<section class="row2">
				<section class="left">
					<label>Cell 1:</label>
				</section>
				<section class="right">
					<input type="text" name="MCHTelephone" id="MCHTelephone" maxlength="14"/>
				</section>

			</section>

			<section class="row2">
				<section class="left">
					<label>Cell 2:</label>
				</section>
				<section class="right">
					<input type="text" name="MCHAltTelephone" id="MCHAltTelephone" maxlength="14"/>
				</section>

			</section>

			<section class="row2">
				<section class="left">
					<label>Email:</label>
				</section>
				<section class="right">
					<input type="email" name="MCHEmail" id="MCHEmail" maxlength="90"/>
					<input type="hidden"  name="MCHMFC" id="MCHMFC"/>
				</section>
			</section>
		</section>
	</section>

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

